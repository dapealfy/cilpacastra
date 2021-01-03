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

Route::get('', 'AuthenticationController@index')->name('login');

Route::post('login', 'AuthenticationController@login');
Route::post('register', 'AuthenticationController@register');

Route::middleware('auth')->group(function () {

    Route::get('logout', 'AuthenticationController@logout')->name('logout');

    Route::resource('dashboard', 'DashboardController')->only('index');

    Route::resource('user', 'UserController')->only('index', 'edit', 'update');

    Route::resource('buku', 'DataBukuController');
});
