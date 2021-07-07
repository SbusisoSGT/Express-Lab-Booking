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
    return view('welcome');
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
Route::get('/lab-booking/dashboard/', 'BookingController@dashboard');
Route::get('/lab-booking/dashboard/filter/{building?}/{purpose}/{computers}/{date}/', 'BookingController@filter');
Route::get('/lab-booking/create/', 'BookingController@create');
Route::post('/lab-booking', 'BookingController@store');
Route::get('lab-booking/week-bookings', 'BookingController@weekBookings');
Route::get('lab-booking/anything', 'BookingController@anything');
Route::get('/slots/{start_time}/{end_time}/', 'BookingController@slots');
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


// Route::group(['prefix' => 'api', 'namespace' => 'Api', function(){
//     Route::resource('building', 'BuildingsController');
//     Route::resource('labs', 'LabsController')->excerpt('create', 'edit');
// }]);

//Lecturer registration routes

Route::get('/lecturer/register', 'LecturerController@create');
Route::post('/lecturer/register', 'LecturerController@store');

// Route::get('/lecturer', 'LecturerController@index');

// Route::post('/register', 'RegisterController@create');
Route::get('/lecturer/{id}', 'LecturerController@show');

Route::get('/lecturer/login', function(){
    return "Hey do something please";
});

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('lecturer', 'LecturerController');

// Route::resource('lab-booking/account', 'AccountController')
//         ->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
