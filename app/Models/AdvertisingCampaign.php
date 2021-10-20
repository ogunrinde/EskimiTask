<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvertisingCampaign extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $fillable = ['name','from_date','to_date','total_budget','daily_budget'];

    public function campaignImage()
    {
        return $this->hasMany(\App\Models\CampaignImage::class, 'campaignId','id');
    }
}

