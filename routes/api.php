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

Route::get('/log-book', 'Api\ApiController@get_sprint');
Route::get('/get-task/{id_sprint}', 'Api\ApiController@get_task');
Route::get('/get-logbook-sprint', 'Api\ApiController@get_logbook_sprint');

Route::post('/store-logbook', 'Api\ApiController@store_logbook');
Route::get('/logproject', 'Api\ApiController@get_logproject');

Route::get('/po-review/', 'Api\ApiController@get_review');
Route::post('/po-review', 'Api\ApiController@store_review');
