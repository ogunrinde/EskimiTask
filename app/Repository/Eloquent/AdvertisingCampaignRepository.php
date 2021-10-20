<?php

    namespace App\Repository\Eloquent;

use App\Models\AdvertisingCampaign;
use App\Repository\AdvertisingCampaignRepositoryInterface;

class AdvertisingCampaignRepository extends BaseRepository implements AdvertisingCampaignRepositoryInterface
{
    /**
     * @var Model
     */

     protected $model;

     /**
     * AdvertisingCampaignRepository constructor
     *
     * @param Model $model
     */

     public function __construct(AdvertisingCampaign $model)
     {
        $this->model = $model;
     }
}

?>
