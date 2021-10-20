<?php

    namespace App\Services;

use App\Models\CampaignImage;
use Illuminate\Support\Str;

    class UploadFileService {

        public function UploadFile($images, $modelId): array
        {
            $saveimages = [];
            foreach($images as $image)
            {
                $filename = Str::random(8).'.'.$image->getClientOriginalExtension();
                $image->storeAs('public/images', $filename);
                $saveimages[] = array ( 'filename' => $filename, 'campaignId' => $modelId, 'created_at' => now(), 'updated_at' => now() );
            }

            return $saveimages;


        }
    }

?>

