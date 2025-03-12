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
Route::get('/gempa/jay', 'HomeController@terkini'); // table of up recent eqs

Route::get('/gempa/terupdate', 'HomeController@terupdate'); // table of up recent eqs from satu data gempa repository


Route::get('/gempa/recentmap', 'HomeController@recentmap'); //several latest eqs map
Route::get('/gempa/statistik', 'HomeController@statistik'); // statistik and earthquake

//Reminder page
Route::get('/reminder', 'HomeController@reminder'); // statistik and earthquake
Route::any('/statistik/search', 'HomeController@searcheq'); // statistik and earthquake

//Cari Petir
Route::any('/caripetir', 'HomeController@caripetir');
Route::any('/caripetir/query', 'HomeController@querypetir');
//caraousel
Route::get('/slideshow', 'HomeController@slideshow');
Route::get('/admin/dashboard', 'DashboardController@index'); // dashboard page
Route::get('/charts', 'HomeController@charts' ); // charts
Route::get('/magnet', 'HomeController@magnet' ); // charts

//api
//Website Kantor
Route::get('/news', 'Admin\ArticleCrudController@news'); // list semua berita
Route::get('/berita/{slug}', 'Admin\ArticleCrudController@show');
//Bulletin
Route::get('/bulletins', 'Admin\BulletinCrudController@bulletin'); // list semua bulletin
Route::get('/bulletins/{id}', 'Admin\BulletinCrudController@show');
//Siaran Press
Route::get('/siarans', 'Admin\SiaranCrudController@siarans'); //daftar semua press release
Route::get('/siarans/{id}', 'Admin\SiaranCrudController@show'); //detail press release
//Gempabumi //list of recent earthquake
Route::get('/gempa/{id}', 'HomeController@detailgempajay'); // detail earthquake
Route::get('/balaigempa/{id}', 'Admin\GempaCrudController@showmap'); // sms balai
Route::resource('/mercallies', 'MercallyController');// Indeks Seismisitas

Route::get('/satudatagempa/{id}', 'Admin\SatudatagempaCrudController@showmap'); // detail earthquake satudatagempa

//simimi
Route::get('/rasagempa', 'HomeController@simimi');
//seismisitas / aktivitas kegempaan
Route::get('/kegempaan', 'Admin\ArticleCrudController@seismisitas'); // list semua bulletin
Route::get('/kegempaan/{slug}', 'Admin\ArticleCrudController@seismisitasShow');
//Populer
Route::get('/populer', 'Admin\ArticleCrudController@populer'); // list semua bulletin
Route::get('/populer/{slug}', 'Admin\ArticleCrudController@populerShow');

//buku tamu
Route::get('/bukutamu', 'GuestController@index' );

Route::resource('/guests', 'GuestController');
//cari tamu
Route::any( '/guests/search', 'GuestController@search');

//Buku Tamu balai
Route::get('/bukutamubalai', 'BalaiguestController@index' );

Route::resource('/balaiguests', 'BalaiguestController');
//cari tamu
Route::any( '/balaiguests/search', 'BalaiguestController@search');

//layanan data
Route::get('/layanandata', 'LayanandataController@index',['name' => 'layanan.data']);
Route::get('/layanandata/tentang', 'LayanandataController@tentang' );
Route::get('/layanandata/tarif', 'LayanandataController@tarif' );
Route::get('/layanandata/magang', 'LayanandataController@magang' );
Route::get('/layanandata/gts', 'LayanandataController@gts' );
Route::get('/layanandata/data', 'LayanandataController@data' );
Route::get('/layanandata/jasa', 'LayanandataController@jasa' );
Route::get('/layanandata/formulir/{id}', 'LayanandataController@formulir' );
Route::get('/layanandata/daftar', 'LayanandataController@daftar' );
Route::get('/layanandata/alur', 'LayanandataController@alur' );

//crud Layanan
Route::resource('/layanans', 'LayananController');
//cari tamu

//latency dan availability
//Buku Tamu balai
Route::get('/latency', 'DashboardController@latencyform');
Route::get('/latency/daily', 'DashboardController@daily')->name('latencies.fetch');;
Route::get('/avalilability', 'DashboardController@avalilabilityform');


//lapbul dan buletin
Route::get('/lapbul/ttm', 'DashboardController@ttmform');
Route::any('/lapbul/get/ttm', 'DashboardController@getttm');
Route::get('/sampel/hujan', 'DashboardController@sampelhujanform');
Route::any('/get/sampel/hujan/', 'DashboardController@getsampelhujan');
Route::get('/bahan/buletin/hujan/', 'DashboardController@bahanbuletinhujan');
Route::any('/get/bahan/buletin/hujan/', 'DashboardController@getbahanbuletinhujan');
Route::any('/bahan/lapbul/gempa/', 'DashboardController@bahanlapbulgempa');
Route::any('/get/bahan/buletin/gempa/', 'DashboardController@getbahanlapbulgempa');
Route::get('/get/bahan/buletin/magnet', 'DashboardController@variasi' ); // charts

//SLA OLA
Route::any('/admin/nyusahin', 'DashboardController@nyusahin');
Route::any('/absolut', 'DashboardController@absolut');
