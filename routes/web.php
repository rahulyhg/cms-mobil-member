<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('home');
});

Route::get('test', function () {
	return view('verifikasi');
});

Auth::routes();
Route::get('register/{token}', 'HomeController@token');
Route::post('change_password', 'HomeController@chgpwd')->name('chgpwd');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('verifikasi', 'HomeController@form_data')->name('form-data');

Route::post( '/get/states', 'HomeController@states' )->name( 'loadStates' );
Route::post( '/get/cities', 'HomeController@cities' )->name( 'loadCities' );

Route::get('json-regencies','HomeController@regencies');
Route::get('json-model','HomeController@model');
Route::get('json-variant','HomeController@variant');
Route::get('json-transmission','HomeController@transmission');
Route::get('json-tenor','HomeController@tenor');
Route::get('json-fuel','HomeController@fuel');

Route::get('car-choose', 'CustomerController@car')->name('car');