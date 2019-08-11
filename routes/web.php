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

Route::resource('/mercallies', 'MercallyController');

Route::get('/seismisitas/{id}', 'MercallyController@seismisitas')->name('seismisitas');

Route::get('/', 'HomeController@index'); //home
Route::get('/home', 'HomeController@index'); // home
Route::get('/about', 'HomeController@about'); // about us
Route::get('/gempa/terkini', 'HomeController@terkini'); // table of up recent eqs
Route::get('/gempa/recentmap', 'HomeController@recentmap'); //several latest eqs map
Route::get('/gempa/statistik', 'HomeController@statistik'); // statistik and earthquake
Route::get('/admin/dashboard', 'DashboardController@index'); // dashboard page
Route::get('/charts', 'HomeController@charts' ); // charts
Route::get('/magnet', 'HomeController@magnet' ); // charts
//api
//Website Kantor
Route::get('/news', 'Admin\ArticleCrudController@news'); // list semua berita
Route::get('/berita/{id}', 'Admin\ArticleCrudController@show');
//Bulletin
Route::get('/bulletins', 'Admin\BulletinCrudController@bulletin'); // list semua bulletin
Route::get('/bulletins/{id}', 'Admin\BulletinCrudController@show');
//Siaran Press
Route::get('/siarans', 'Admin\SiaranCrudController@siarans'); //daftar semua press release
Route::get('/siarans/{id}', 'Admin\SiaranCrudController@show'); //detail press release
//Gempabumi //list of recent earthquake
Route::get('/gempa/{id}', 'Admin\GempaCrudController@showmap'); // detail earthquake
Route::resource('/mercallies', 'MercallyController');// Indeks Seismisitas

//simimi
Route::get('/rasagempa', 'HomeController@simimi');



//buku tamu
Route::get('/bukutamu', 'GuestController@index' );

Route::resource('/guests', 'GuestController');
//cari tamu
Route::any( '/guests/search', 'GuestController@search');

//layanan data
Route::get('/datald', 'LayanandataController@indexpetir' );