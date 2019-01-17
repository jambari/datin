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
Route::resource('/guests', 'GuestController');
// Route::get('/bukutamu/tambah', 'GuestController@show');
// // Route::post('/bukutamu/store', 'GuestController@storeTamu');
// // Route::put('/bukutamu/update/{id}', 'GuestController@update');
// // Route::get('/bukutamu/update/entri/{id}', 'GuestController@updateTamu');
// Route::get('/bukutamu/hapus/{id}', 'GuestController@hapusTamu');