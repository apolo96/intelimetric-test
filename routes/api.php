<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\RestaurantController;
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

Route::prefix('v1')->namespace('API')->group(function(){
    Route::get('restaurants/statistics',[RestaurantController::class, 'statistic']);
    Route::get('restaurants', [RestaurantController::class, 'index']);
    Route::get('restaurants/{restaurant}', [RestaurantController::class, 'show']);
    Route::post('restaurants', [RestaurantController::class, 'store']);
    Route::put('restaurants/{restaurant}', [RestaurantController::class, 'update']);
    Route::delete('restaurants/{restaurant}', [RestaurantController::class, 'destroy']);
});

