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

    Route::resource('databidang-rumahmakan', 'DataBidangRumahMakanController');
    Route::post('databidang-rumahmakan-import', 'DataBidangRumahMakanController@dataBidangRumahMakanImport');

    Route::resource('databidang-catering', 'DataBidangCateringController');
    Route::post('databidang-catering-import', 'DataBidangCateringController@dataBidangCateringImport');

    Route::resource('databidang-cafe', 'DataBidangCafeController');
    Route::post('databidang-cafe-import', 'DataBidangCafeController@dataBidangCafeImport');

    Route::resource('databidang-warung', 'DataBidangWarungController');
    Route::post('databidang-warung-import', 'DataBidangWarungController@dataBidangWarungImport');

    Route::resource('databidang-kantin', 'DataBidangKantinController');
    Route::post('databidang-kantin-import', 'DataBidangKantinController@dataBidangKantinImport');

    Route::resource('databidang-kedai', 'DataBidangKedaiController');
    Route::post('databidang-kedai-import', 'DataBidangKedaiController@dataBidangKedaiImport');

    Route::resource('databidang-depot', 'DataBidangDepotController');
    Route::post('databidang-depot-import', 'DataBidangDepotController@dataBidangDepotImport');

    Route::resource('databidang-pub', 'DataBidangPubController');
    Route::post('databidang-pub-import', 'DataBidangPubController@dataBidangPubImport');

    Route::resource('databidang-agent', 'DataBidangAgentController');
    Route::post('databidang-agent-import', 'DataBidangAgentController@dataBidangAgentImport');

    Route::resource('databidang-biro', 'DataBidangBiroController');
    Route::post('databidang-biro-import', 'DataBidangBiroController@dataBidangBiroImport');

    Route::resource('databidang-bioskop', 'DataBidangBioskopController');
    Route::post('databidang-bioskop-import', 'DataBidangBioskopController@dataBidangBioskopImport');

    Route::resource('databidang-salon', 'DataBidangSalonController');
    Route::post('databidang-salon-import', 'DataBidangSalonController@dataBidangSalonImport');

    Route::resource('databidang-arena', 'DataBidangArenaController');
    Route::post('databidang-arena-import', 'DataBidangArenaController@dataBidangArenaImport');

    Route::resource('databidang-kebugaran', 'DataBidangKebugaranController');
    Route::post('databidang-kebugaran-import', 'DataBidangKebugaranController@dataBidangKebugaranImport');

    Route::resource('databidang-karaoke', 'DataBidangKaraokeController');
    Route::post('databidang-karaoke-import', 'DataBidangKaraokeController@dataBidangKaraokeImport');

    Route::resource('databidang-billyard', 'DataBidangBillyardController');
    Route::post('databidang-billyard-import', 'DataBidangBillyardController@dataBidangBillyardImport');

    Route::resource('sertifikasi-usaha', 'SertifikasiUsahaController');
    Route::post('sertifikasi-usaha-import', 'SertifikasiUsahaController@sertifikasiUsahaImport');

    Route::resource('sertifikasi-profesi', 'SertifikasiProfesiController');
    Route::post('sertifikasi-profesi-import', 'SertifikasiUsahaController@sertifikasiProfesiImport');
});
