<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
//  return 'Hello world';
});

$app->get('/hotel/{id}', 'HotelController@getHotel');

$app->get('/hotel', 'HotelController@getList');

$app->get('/hotel/delete/{id}', 'HotelController@destroy');