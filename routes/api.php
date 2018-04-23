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

Route::get('/shipper', 'ShipperController@index')->name('shipper_index');
Route::post('/shipper', 'ShipperController@store')->name('shipper_store');
Route::get('/shipper/{shipper}', 'ShipperController@show')->name('shipper_show');
Route::put('/shipper/{shipper}', 'ShipperController@update')->name('shipper_update');
Route::delete('/shipper/{shipper}', 'ShipperController@destroy')->name('shipper_destroy');

