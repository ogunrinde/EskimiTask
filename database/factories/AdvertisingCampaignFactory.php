<?php

namespace Database\Factories;

use App\Models\AdvertisingCampaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisingCampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvertisingCampaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "from_date" => $this->faker->date,
            "to_date" => $this->faker->date(now()),
            "total_budget" => $this->faker->numberBetween($min=10000, $max=20000),
            "daily_budget" => $this->faker->numberBetween($min=1000, $max=6000)
        ];
    }
}
