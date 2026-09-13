<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['cors'])->group(function () {

    Route::prefix('v1')->group(function () {

        Route::get('get_all_consultants', 'Client\AuthController@get_all_consultants')->name('get_all_consultants');
        Route::get('get_all_cities', 'Client\AuthController@get_all_cities')->name('get_all_cities');
        Route::post('client/register', 'Client\AuthController@post_register')->name('client.post_register');
        Route::post('store-contact', 'Client\ClientController@store_contact')->name('client.store-contact');


        Route::middleware(['auth:sanctum'])->group(function () {

        });

    });

});