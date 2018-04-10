<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list all locations for testing purposes only
Route::get('all-locations', 'API\LocationController@index');

//list specific location based on latitude and longitude
Route::get('nearest-location', 'API\LocationController@nearest');