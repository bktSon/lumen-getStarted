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

$app->get('/', function () {
	return view('addForm');
});

$app->get('/hotel/{id}', 'HotelController@getHotel');

$app->get('/hotel', 'HotelController@getList');

$app->delete('/hotel/{id}', 'HotelController@destroy');

$app->post('/hotel', [
	'middleware' => 'store',
  	'uses' => 'HotelController@store'
]);
