<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreJoingempaRequest as StoreRequest;
use App\Http\Requests\StoreJoingempaRequest as UpdateRequest;
use App\Models\Joingempa;

/**
 * Class GempaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class JoinGempaCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Joingempa');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/balaigempa');
        $this->crud->setEntityNameStrings('Perbandingan paramter', 'Perbandingan paramter');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();


      //   $this->crud->setColumnsDetails(['origin'], ['label' => 'Origin (UTC)']);
      //   $this->crud->setColumnsDetails(['elip_lat'], ['label' => 'Elipsoid Lintang (+- Km)']);
      //   $this->crud->setColumnsDetails(['elip_lon'], ['label' => 'Elipsoid Bujur(+- Km)']);
      // $this->crud->setColumnsDetails(['rms'], ['label' => 'RMS']);



        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        //$this->crud->addFields($fields, 'update/create/both');
        //$this->crud->removeField('tanggal', 'update');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // add asterisk for fields that are required in GempaRequest
        // $this->crud->setRequiredFields(StoreRequest::class, 'create');
        // $this->crud->setRequiredFields(UpdateRequest::class, 'edit');



        // // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // $this->crud->allowAccess('details_row');
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php
        // $this->crud->addButtonFromView('line', 'press' , 'press', 'end');
        // $this->crud->orderBy('tanggal','desc');
        // $this->crud->orderBy('origin','desc');

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    //filter
    public function join() {
        $joingempas = Joingempa::take(2)
            ->orderBy('id','desc')
            ->orderBy('eliplat','asc')
            ->orderBy('eliplon','asc')
            ->orderBy('rms','asc')
            ->orderBy('elipdepth','asc')->get();
        return view('gempa.esdx', compact('joingempas'));
    }

}
