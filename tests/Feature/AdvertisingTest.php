<?php

namespace Tests\Feature;

use App\Models\AdvertisingCampaign;
use App\Models\CampaignImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdvertisingTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_adverting_campaign()
    {
        Storage::fake('images');

        $response = $this->postJson('/api/advertising/store',
        [
            'name' => 'ST Stop',
            'from_date' => '2021-10-05',
            'to_date' => '2021-10-31',
            'total_budget' => 23.90,
            'daily_budget' => 12.90,
            'images' => [
                    UploadedFile::fake()->image('avatar1.jpg'),
                    UploadedFile::fake()->image('avatar2.jpg')
            ]
        ]);

        $response->assertStatus(201);

    }

    public function test_get_all_advertising_campaigns()
    {

        $response = $this->getJson('/api/advertising');

        $response->assertStatus(200);
    }

    public function test_update_advertising_campaign()
    {
        $ad = AdvertisingCampaign::factory()->has(CampaignImage::factory()->count(3), 'campaignImage')->create();
        $response = $this->putJson("/api/advertising/update/".$ad->id."",['name' => 'ST Stop','from_date' => '2021-10-05', 'to_date' => '2021-10-31','total_budget' => 23.90,'daily_budget' => 12.90]);
        $response->assertSee('ST Stop',$escaped=true);
    }

    public function test_delete_advertising_campaign()
    {
        $ad = AdvertisingCampaign::factory()->create();
        $response = $this->deleteJson("/api/advertising/delete/".$ad->id."");
        $response->assertOk();
    }
}
