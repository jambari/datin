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

	//Infogempa
	CRUD::resource('infogempa', 'InfogempaCrudController');
	Route::get('infogempa/{id}/peta', 'InfogempaCrudController@peta');
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

}); // this should be the absolute last line of this file
