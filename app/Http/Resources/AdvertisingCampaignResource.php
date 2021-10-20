<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisingCampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "from_date" => $this->from_date,
            "to_date" => $this->to_date,
            "daily_budget" => $this->daily_budget,
            "total_budget" => $this->total_budget,
            "images" => CampaignImage::collection($this->campaignImage)
        ];
    }
}
