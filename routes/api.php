<?php

use App\Http\Controllers\API\Advertising\AdvertisingCampaignController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('advertising')->group(function(){
    Route::get('', [AdvertisingCampaignController::class, 'index']);
    Route::get('/{id}', [AdvertisingCampaignController::class, 'show']);
    Route::post('store',[AdvertisingCampaignController::class, 'store']);
    Route::put('update/{id}',[AdvertisingCampaignController::class, 'update']);
    Route::delete('delete/{id}',[AdvertisingCampaignController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
