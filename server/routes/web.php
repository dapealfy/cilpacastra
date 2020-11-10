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

Route::get('', 'AuthenticationController@index');

Route::post('', 'AuthenticationController@login')->name('login');

// Route::prefix('reset-password')->name('reset-password.')->group(function () {

//     Route::post('request-email', 'ResetPasswordController@requestEmail')->name('request-email');

//     Route::get('redirect', 'ResetPasswordController@redirect')->name('redirect');

//     Route::get('{id}', 'ResetPasswordController@index')->name('index');

//     Route::put('{id}', 'ResetPasswordController@update')->name('update');
// });

Route::middleware('auth')->group(function () {

    Route::get('logout', 'AuthenticationController@logout')->name('logout');

    Route::resource('dashboard', 'DashboardController')->only('index');

    Route::resource('user', 'UserController')->only('index', 'edit', 'update');

    Route::resource('internal', 'InternalController');

    Route::resource('eksternal', 'EksternalController');

    Route::resource('databidang-hotel', 'DataBidangHotelController');
    Route::post('databidang-hotel-import', 'DataBidangHotelController@dataBidangHotelImport');

    Route::resource('databidang-guesthouse', 'DataBidangGuestHouseController');
    Route::post('databidang-guesthouse-import', 'DataBidangGuestHouseController@dataBidangGuestHouseImport');

    Route::resource('databidang-wisma', 'DataBidangWismaController');
    Route::post('databidang-wisma-import', 'DataBidangWismaController@dataBidangWismaImport');

    Route::resource('databidang-kost', 'DataBidangKostController');
    Route::post('databidang-kost-import', 'DataBidangKostController@dataBidangKostImport');

    Route::resource('databidang-resto', 'DataBidangRestoController');
    Route::post('databidang-resto-import', 'DataBidangRestoController@dataBidangRestoImport');
});
