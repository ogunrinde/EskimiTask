<?php

namespace App\Providers;

use App\Repository\AdvertisingCampaignRepositoryInterface;
use App\Repository\BaseRepositoryInterface;
use App\Repository\Eloquent\AdvertisingCampaignRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\ImageRepository;
use App\Repository\ImageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AdvertisingCampaignRepositoryInterface::class, AdvertisingCampaignRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
