<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

	//Gempabumi
	CRUD::resource('gempa', 'GempaCrudController');
	Route::get('gempa/{id}/press', 'GempaCrudController@press');
	//Infogempa
	CRUD::resource('infogempa', 'InfogempaCrudController');
	Route::get('infogempa/{id}/peta', 'InfogempaCrudController@peta');
	CRUD::resource('mercally', 'MercallyCrudController');
	//Hujan

	CRUD::resource('hujan', 'HujanCrudController');

	//KAH
	CRUD::resource('kah', 'KahCrudController');

	//SPM
	CRUD::resource('spm', 'SpmCrudController');

	//Kindeks

	CRUD::resource('kindek', 'KindekCrudController');

	//Deklinasi

	CRUD::resource('deklinasi', 'DeklinasiCrudController');

	//Inklinasi
	CRUD::resource('inklinasi', 'InklinasiCrudController');

	//Absolut
	CRUD::resource('absolut', 'AbsolutCrudController');
	//Kegiatan
	CRUD::resource('kegiatan', 'KegiatanCrudController');
	//summary
	CRUD::resource('summary', 'SummaryCrudController');

	//Menuitem
	CRUD::resource('menu-item', 'MenuItemCrudController');

	//News
	CRUD::resource('article', 'ArticleCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('tag', 'TagCrudController');
    //Pengumuman
    CRUD::resource('pengumuman', 'PengumumanCrudController');
    //Press Release
    CRUD::resource('siaran', 'SiaranCrudController');
    //Bulletin
    CRUD::resource('bulletin', 'BulletinCrudController');
    // Gallery
    CRUD::resource('gallery', 'GalleryCrudController');
    // magnet
    CRUD::resource('magnet', 'MagnetCrudController');
    // balaigempa
    CRUD::resource('balaigempa', 'BalaigempaCrudController');
    // balaisms
    CRUD::resource('balaisms', 'BalaismsCrudController');
    //SMS Balai
    Route::get('balaisms/{id}/peta', 'BalaismsCrudController@peta');
    //Press Release
    Route::get('balaigempa/{id}/press', 'BalaigempaCrudController@press');

    //Join gempa balai dan angkasa

    Route::get('joingempa', 'JoingempaCrudController@join');

    //signifikan

	CRUD::resource('significant', 'SignificantCrudController');
	Route::get('significant/{id}/peta', 'SignificantCrudController@peta');

	//LAYANAN
	CRUD::resource('layanan', 'LayananCrudController');
	Route::get('layanan/{id}/download', 'LayananCrudController@download');

	//review seismisitas
	CRUD::resource('seismisita', 'SeismisitaCrudController');

}); // this should be the absolute last line of this file

