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
Route::get('/gempa/terkini', 'HomeController@terkini');
Route::get('/gempa/recentmap', 'HomeController@recentmap');
Route::get('/gempa/statistik', 'HomeController@statistik');
Route::get('/admin/dashboard', 'DashboardController@index');
//api
//Website Kantor
Route::get('/news', 'Admin\ArticleCrudController@news'); // list semua berita
Route::get('/berita/{id}', 'Admin\ArticleCrudController@show');
//Siaran Press
Route::get('/siarans', 'Admin\SiaranCrudController@siarans'); //daftar semua press release
Route::get('/siarans/{id}', 'Admin\SiaranCrudController@show'); //detail press release
//Gempabumi //list of recent earthquake
Route::get('/gempa/{id}', 'Admin\GempaCrudController@showmap'); // detail earthquake

