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
	Route::get('gempa/{id}/angkasa/template/balai', 'GempaCrudController@angkasatemplatebalai');
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
    Route::get('/balaigempa/{id}/sms', 'BalaigempaCrudController@sms'); // sms balai
    Route::get('/balaigempa/{id}/injectbalai', 'BalaigempaCrudController@inject'); // inject hasil analisis balai
    //Join gempa balai dan angkasa

    Route::get('joingempa', 'JoingempaCrudController@join');

    //signifikan

	CRUD::resource('significant', 'SignificantCrudController');
	Route::get('significant/{id}/peta', 'SignificantCrudController@peta');

	//LAYANAN
	CRUD::resource('layanan', 'LayananCrudController');
	Route::get('layanan/{id}/download', 'LayananCrudController@download');
	//City
	CRUD::resource('city', 'CityCrudController');
	//Nabire
	CRUD::resource('gempanabire', 'GempanabireCrudController');
	Route::get('gempanabire/{id}/infonabire', 'GempanabireCrudController@infogempa');
	Route::get('gempanabire/{id}/nabire/template/balai', 'GempanabireCrudController@nabiretemplatebalai');
    Route::get('/gempanabire/{id}/injectnabire', 'GempanabireCrudController@inject'); // inject hasil analisis nabire
	Route::get('gempanabire/{id}/press', 'GempanabireCrudController@press');


	//Gempa Sorong
	CRUD::resource('gempasorong', 'GempasorongCrudController');
	Route::get('gempasorong/{id}/infosorong', 'GempasorongCrudController@infosorong');
	Route::get('/gempasorong/{id}/injectsorong', 'GempasorongCrudController@inject'); 
	Route::get('gempasorong/{id}/sorong/template/balai', 'GempasorongCrudController@sorongtemplatebalai');
	Route::get('gempasorong/{id}/press', 'GempasorongCrudController@press');

	CRUD::resource('petir', 'PetirCrudController');

	//Logbook
	CRUD::resource('logbook', 'LogbookCrudController');
	Route::get('/logbook/{id}/logbook', 'LogbookCrudController@unduh'); 

	//satudatagempa SDG
	CRUD::resource('satudatagempa', 'SatudatagempaCrudController')->name('satudatagempa');
	Route::get('/balaigempa/{id}/kirimsdgpgr', 'BalaigempaCrudController@kirimsdgpgr'); // kirim ke SDG dari repository balai
	Route::get('gempa/{id}/kirimsdgjay', 'GempaCrudController@kirimsdgjay'); //kirim ke SDG dari repository Jay
	Route::get('gempanabire/{id}/kirimsdgnbpi', 'GempanabireCrudController@kirimsdgnbpi'); //kirim ke SDG dari repository NBPI
	Route::get('/gempasorong/{id}/kirimsdgswi', 'GempasorongCrudController@kirimsdgswi'); //kirim ke SDG dari repository SWI
	// Logbook


	//Stageof nganjuk
	CRUD::resource('gempanganjuk', 'GempanganjukCrudController');
	Route::get('gempanganjuk/{id}/infonganjuk', 'GempanganjukCrudController@infonganjuk');
	Route::get('gempanganjuk/{id}/press', 'GempanganjukCrudController@press');
}); // this should be the absolute last line of this file
