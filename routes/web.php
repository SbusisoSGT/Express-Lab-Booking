<?php

use Illuminate\Support\Facades\Route;
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
    return response()->json(session('data'));
});

Auth::routes();

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function(){
    Route::resource('buildings', 'BuildingsController');
    Route::resource('labs', 'LabsController');
    Route::get('buildings/{id}/labs/', 'LabsController@showBuildingLabs');
    
    //Lab bookings API
    Route::get('bookings/day-bookings/{date}', 'BookingController@dayBookings');
    Route::get('bookings/periods/', 'BookingController@periods');
    
});

//Lab booking Routes
Route::get('/lab-booking', 'BookingController@index');
Route::get('/lab-booking/book', 'BookingController@create');
Route::post('/lab-booking/book', 'BookingController@store');
Route::get('lab-booking/week-bookings', 'BookingController@weekBookings');
Route::get('/booking/{lab_id}/{date}/{start_time}/{end_time}/{purpose}/{module}/', 'BookingController@bookings');

//Account Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/lab-booking/account/', 'AccountController@index');
    Route::get('/lab-booking/account/create', 'AccountController@create');
    Route::post('/lab-booking/account/', 'AccountController@store');
    Route::get('/lab-booking/account/edit', 'AccountController@edit');
    Route::put('/lab-booking/account/update', 'AccountController@update');
    Route::delete('/lab-booking/account/', 'AccountController@destroy');
});

//Admin Routes
Route::group(['middleware' => 'auth'], function(){
    Route::get('/lab-booking/admin/', 'AdminController@index')->middleware('can:manage-users');
});

Route::get('/home', 'HomeController@index')->name('home');
