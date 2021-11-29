<?php

use Illuminate\Http\Request;
use Illuminate\Http\Middleware;
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
Route::get('dis-region/{id}', 'api\DisController@getWithRegion');
Route::get('regName/{id}', 'api\RegController@regName');

Route::post('ministry1','api\LicApiController@licence');
Route::post('ministry2','api\LicApiController@licence381');

//Certified Students
Route::get('certifiedstudents','api\CertifiedStudentController@index');
