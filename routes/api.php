<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('regions', 'api\RegionController@all');
Route::get('regions/{regionId}','api\RegionController@district');
Route::apiResource('reg', 'api\RegController');
Route::get('regs/{reg_id}','api\RegController@dis');
Route::apiResource('dis', 'api\DisController');
