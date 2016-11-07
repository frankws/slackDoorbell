<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'locale'], function () {
    Route::get('', 'DoorbellController@index')->name('index');

    Route::get('/ring', 'DoorbellController@ringForm')->name('ringform');
    Route::get('/setLocale/{lang}', "DoorbellController@changeLocale")->name('setLocale');

    Route::post('/ring', "DoorbellController@ringRing")->name('ringDoorbell');
});