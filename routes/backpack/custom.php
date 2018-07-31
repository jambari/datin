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

	//Hujan 

	CRUD::resource('hujan', 'HujanCrudController');

	//KAH
	CRUD::resource('kah', 'KahCrudController');

	//SPM
	CRUD::resource('spm', 'SpmCrudController');
}); // this should be the absolute last line of this file
