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
Route::post("login", 'AuthController@getToken');
Route::delete("logout", 'AuthController@logout')->middleware("auth");
Route::post("freshtoken", 'AuthController@freshToken')->middleware("auth");
Route::prefix("admin")->namespace('Admin')->group(function () {
    Route::apiResource('class', 'TitleController')->except(['show']);
    Route::apiResource('store', 'StoreController')->except(["show"]);
    Route::apiResource('commodity', 'CommodityController')->except(['show', 'destroy']);
    Route::apiResource('recordin', 'RecordInController')->except(["store", "show"]);
    Route::apiResource('recordout', 'RecordOutController')->except(["store", "show"]);
});
