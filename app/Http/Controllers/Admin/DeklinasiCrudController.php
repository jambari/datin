<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreDeklinasiRequest as StoreRequest;
use App\Http\Requests\UpdateDeklinasiRequest as UpdateRequest;

/**
 * Class DeklinasiCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DeklinasiCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Deklinasi');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/deklinasi');
        $this->crud->setEntityNameStrings('deklinasi', 'deklinasis');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();
       $fields = [
            [
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'type' => 'date',
            ], [
                'name' => 'jam00',
                'label' => '00-01',
                'type' => 'text',
                
            ], [
                'name' => 'jam01',
                'label' => '01-02',
                'type' => 'text',
                
            ], [
                'name' => 'jam02',
                'label' => '02-03',
                'type' => 'text',
                
            ], [
                'name' => 'jam03',
                'label' => '03-04',
                'type' => 'text',
                
            ], [
                'name' => 'jam04',
                'label' => '04-05',
                'type' => 'text',
                
            ], [
                'name' => 'jam05',
                'label' => '05-06',
                'type' => 'text',
                
            ], [
                'name' => 'jam06',
                'label' => '06-07',
                'type' => 'text',
                
            ], [
                'name' => 'jam07',
                'label' => '07-08',
                'type' => 'text',
                
            ], [
                'name' => 'jam08',
                'label' => '08-09',
                'type' => 'text',
                
            ], [
                'name' => 'jam09',
                'label' => '09-10',
                'type' => 'text',
                
            ], [
                'name' => 'jam10',
                'label' => '10-11',
                'type' => 'text',
                
            ], [
                'name' => 'jam11',
                'label' => '11-12',
                'type' => 'text',
                
            ], [
                'name' => 'jam12',
                'label' => '12-13',
                'type' => 'text',
                
            ], [
                'name' => 'jam13',
                'label' => '13-14',
                'type' => 'text',
                
            ], [
                'name' => 'jam14',
                'label' => '14-15',
                'type' => 'text',
                
            ], [
                'name' => 'jam15',
                'label' => '15-16',
                'type' => 'text',
                
            ], [
                'name' => 'jam16',
                'label' => '16-17',
                'type' => 'text',
                
            ], [
                'name' => 'jam17',
                'label' => '17-18',
                'type' => 'text',
                
            ], [
                'name' => 'jam18',
                'label' => '18-19',
                'type' => 'text',
                
            ], [
                'name' => 'jam19',
                'label' => '19-20',
                'type' => 'text',
                
            ], [
                'name' => 'jam20',
                'label' => '20-21',
                'type' => 'text',
                
            ], [
                'name' => 'jam21',
                'label' => '21-22',
                'type' => 'text',
                
            ], [
                'name' => 'jam22',
                'label' => '22-23',
                'type' => 'text',
                
            ], [
                'name' => 'jam23',
                'label' => '23-24',
                'type' => 'text',
                
            ]
        ]; 

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);
        $this->crud->addColumn('avg');
        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // add asterisk for fields that are required in DeklinasiRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        //$this->crud->removeColumns(['jam08', 'jam09', 'jam10', 'jam11', 'jam12', 'jam13', 'jam14', 'jam15', 'jam16', 'jam17', 'jam18', 'jam19', 'jam20', 'jam21', 'jam22', 'jam23']);
        $this->crud->setColumnDetails('avg', ['label' => 'rata-rata']);
        $this->crud->setColumnDetails('jam00', ['label' => '00']); 
        $this->crud->setColumnDetails('jam01', ['label' => '01']);
        $this->crud->setColumnDetails('jam02', ['label' => '02']);
        $this->crud->setColumnDetails('jam03', ['label' => '03']);
        $this->crud->setColumnDetails('jam04', ['label' => '04']);
        $this->crud->setColumnDetails('jam05', ['label' => '05']);
        $this->crud->setColumnDetails('jam06', ['label' => '06']);
        $this->crud->setColumnDetails('jam07', ['label' => '07']);
        $this->crud->setColumnDetails('jam08', ['label' => '08']);
        $this->crud->setColumnDetails('jam09', ['label' => '09']);
        $this->crud->setColumnDetails('jam10', ['label' => '10']);
        $this->crud->setColumnDetails('jam11', ['label' => '11']);
        $this->crud->setColumnDetails('jam12', ['label' => '12']);
        $this->crud->setColumnDetails('jam13', ['label' => '13']);
        $this->crud->setColumnDetails('jam14', ['label' => '14']);
        $this->crud->setColumnDetails('jam15', ['label' => '15']);
        $this->crud->setColumnDetails('jam16', ['label' => '16']);
        $this->crud->setColumnDetails('jam17', ['label' => '17']);
        $this->crud->setColumnDetails('jam18', ['label' => '18']);
        $this->crud->setColumnDetails('jam19', ['label' => '19']);
        $this->crud->setColumnDetails('jam20', ['label' => '20']);
        $this->crud->setColumnDetails('jam21', ['label' => '21']);
        $this->crud->setColumnDetails('jam22', ['label' => '22']);
        $this->crud->setColumnDetails('jam23', ['label' => '23']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '=', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
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
}
