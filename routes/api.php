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

Route::get('profiles', 'Api\ProfilesController@index');

Route::group(['prefix' => 'site'], function(){
    Route::post('login-agenciado', 'Api\HelperController@getLoginAgenciado');
    Route::post('register-agenciado', 'Api\HelperController@getRegisterAgenciado');
    Route::post('resend-agenciado', 'Api\HelperController@getResendAgenciado');
    
    Route::post('edit-agenciado-data', 'Api\HelperController@getEditAgenciadoData');
    
    Route::post('edit-agenciado-media-main', 'Api\HelperController@getEditAgenciadoMediaMain');
    Route::post('add-agenciado-media-images', 'Api\HelperController@getAddAgenciadoMediaImages');
    Route::post('remove-agenciado-media-images/{id}', 'Api\HelperController@getRemoveAgenciadoMediaImages');
    
    Route::post('add-agenciado-media-videos', 'Api\HelperController@getAddAgenciadoMediaVideos');
    Route::post('remove-agenciado-media-videos/{id}', 'Api\HelperController@getRemoveAgenciadoMediaVideos');
    
    Route::post('favoritar', 'Api\HelperController@postFavorito')->name('favoritar');

//    Cliente
    Route::post('login-cliente', 'Api\HelperController@getLoginCliente')->name('login.cliente');

    Route::post('link-sanitizer', 'Api\HelperController@linkSanatizer');

});

