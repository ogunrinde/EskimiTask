<?php

namespace App\Http\Controllers\API\Advertising;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingCampaign;
use App\Http\Resources\AdvertisingCampaignResource;
use Illuminate\Http\Request;
use App\Repository\AdvertisingCampaignRepositoryInterface;
use App\Repository\ImageRepositoryInterface;
use App\Services\UploadFileService;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use DB;

class AdvertisingCampaignController extends Controller
{
    /**
     * AdvertisingCampaignController Constructor
     *
     */
    private $adInterface;
    private $imgInterface;
    private $uploadservice;

    public function __construct(AdvertisingCampaignRepositoryInterface $adInterface,
                                ImageRepositoryInterface $imgInterface,
                                UploadFileService $uploadservice
                                )
    {
        $this->adInterface = $adInterface;
        $this->imgInterface = $imgInterface;
        $this->uploadservice = $uploadservice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $collection = $this->adInterface->all();
            return (AdvertisingCampaignResource::collection($collection))->additional(["message" => "Data Retrieved Successfully", "success" => true]);
        }catch(Exception $ex)
        {
            return (new JsonResource(null))->additional(["message" => $ex->getMessage(), "success" => false ]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingCampaign $request)
    {
        try{
            DB::beginTransaction();

            $model = $this->adInterface->create($request->all());

            if($request->hasFile('images'))
            {
                $images = $this->uploadservice->UploadFile($request->file('images'), $model->id);
                $this->imgInterface->massInsertion($images);
            }
            DB::commit();

            return (new AdvertisingCampaignResource($model))->additional(["message" => "Data Added Successfully", "success" => true]);

        }catch(Exception $ex)
        {
            DB::rollback();
            return (new JsonResource(null))->additional(["message" => $ex->getMessage(), "success" => false ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $model = $this->adInterface->find($id);
            return (new AdvertisingCampaignResource($model))->additional(["message" => "Data Retrieved Successfully", "success" => true]);
        }catch(Exception $ex)
        {
            return (new JsonResource(null))->additional(["message" => $ex->getMessage(), "success" => false ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $input = $request->all();
            $model_exist = $this->adInterface->find($id);

            if(!$model_exist)
                return (new JsonResource(null))->additional(["message" => "Data not Found", "success" => false ]);

            $model = $this->adInterface->update($id, $input);
            return (new AdvertisingCampaignResource($model))->additional(["message" => "Data Added Successfully", "success" => true]);

        }catch(Exception $ex)
        {
            return (new JsonResource(null))->additional(["message" => $ex->getMessage(), "success" => false ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $model_exist = $this->adInterface->find($id);

            if(!$model_exist)
                return (new JsonResource(null))->additional(["message" => "Data not Found", "success" => false ]);

            $this->adInterface->delete($id);
            return (new JsonResource(null))->additional(["message" => "Data Deleted Successfully", "success" => true]);

        }catch(Exception $ex)
        {
            return (new JsonResource(null))->additional(["message" => $ex->getMessage(), "success" => false ]);

        }
    }
}
