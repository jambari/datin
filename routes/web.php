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

Route::get('/', 'HomeController@index');
Route::get('/admin/dashboard', 'DashboardController@index');
Route::get('/bukutamu', 'GuestController@index');
Route::get('/bukutamu/tambah', 'GuestController@tambah');
Route::post('/bukutamu/store', 'GuestController@storeTamu');