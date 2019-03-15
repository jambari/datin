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
//api
//Website Kantor
Route::get('/news', 'Admin\ArticleCrudController@news');
Route::get('/berita/{id}', 'Admin\ArticleCrudController@show');
//Gempabumi
Route::get('/gempa', 'Admin\GempaCrudController@recenteqs'); //list of recent earthquake
Route::get('/gempa/{id}', 'Admin\GempaCrudController@showmap'); // detail earthquake
