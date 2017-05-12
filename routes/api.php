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

Route::group(['middleware' => 'auth:api', 'prefix' => 'v1'], function(){
    Route::group(['prefix' => 'databases'], function(){
        Route::name('blobs.show')->get('/{database}', 'BlobController@show');
        Route::name('blobs.update')->put('/{database}', 'BlobController@update');
    });
});
