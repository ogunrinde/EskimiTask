<?php

namespace Database\Factories;

use App\Models\AdvertisingCampaign;
use App\Models\CampaignImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampaignImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' => $this->faker->image('storage/app/images',400, 300, null, false),
            'campaignId' => AdvertisingCampaign::factory()->create()->id
        ];
    }
}
