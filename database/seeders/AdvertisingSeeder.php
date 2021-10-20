<?php

namespace Database\Seeders;

use App\Models\AdvertisingCampaign;
use App\Models\CampaignImage;
use Illuminate\Database\Seeder;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertisingCampaign::factory()->has(CampaignImage::factory()->count(3), 'campaignImage')->create();

    }
}
