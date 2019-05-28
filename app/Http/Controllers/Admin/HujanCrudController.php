<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreHujanRequest as StoreRequest;
use App\Http\Requests\UpdateHujanRequest as UpdateRequest;

/**
 * Class HujanCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class HujanCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Hujan');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/hujan');
        $this->crud->setEntityNameStrings('hujan', 'hujan');

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
                'type' => 'date'
            ], [
                'name' => 'hilman',
                'label' => 'Jumlah Hilman',
                'hint' => 'Jika Curah Hujan TTU Silahkan diisi 9999',
                'type' => 'text'
            ], [
                'name' => 'obs',
                'label' => 'Jumlah Obs',
                'hint' => 'Jika Curah Hujan TTU Silahkan diisi 9999',
                'type' => 'text'
            ], [
                'name' => 'kategori',
                'label' => 'Kategori',
                'hint'       => '0 = nihil, < 10 = sangat ringan, < 20 = ringan, <30 = sedang, <50 = lebat, >50 = sangat lebat',
                'type' => 'select_from_array',
                'options' => [
                    'nihil' => 'Nihil',
                    'sangat ringan' => 'Sangat ringan',
                    'ringan' => 'Ringan',
                    'sedang' => 'Sedang',
                    'lebat' => 'Lebat',
                    'sangat lebat' => 'Sangat Lebat',
                    'tak terukur' => 'TTU'
                ],
                'allows_null' => false, 
            ], [
                'name' => 'keterangan',
                'label' => 'Keterangan',
                'type' => 'textarea'
            ],[
                'name' => 'petugas',
                'label' => 'On Duty',
                'type' => 'select_from_array',
                'options' => ['akram'=>'Akram', 'berlian' => 'Berlian', 'canggih'=>'Canggih',
                    'danang' => 'Danang' ,'dedy' => 'Dedy', 'jambari' => 'Jambari',
                    'lidya' => 'Lidya', 'netty' => 'Netty', 'purnama' => 'Purnama', 'risma' => 'Risma',
                    'rosi' => 'Rosi', 'syawal' => 'Syawal' 
                ],
                'default' => 'umum'
            ]
        ];

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // add asterisk for fields that are required in HujanRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');

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
        $this->crud->enableExportButtons();

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
        $this->crud->orderBy('tanggal','desc');
        // $this->crud->groupBy();
        // $this->crud->limit();

        //filter tanggal

        $this->crud->addFilter([ // daterange filter
           'type' => 'date_range',
           'name' => 'tanggal',
           'label'=> 'Tanggal'
         ],
         false,
         function($value) { // if the filter is active, apply these constraints
           $dates = json_decode($value);
           $this->crud->addClause('where', 'tanggal', '>=', $dates->from);
           $this->crud->addClause('where', 'tanggal', '<=', $dates->to);
         });

        //filter obs

        $this->crud->addFilter([
          'name' => 'obs',
          'type' => 'range',
          'label'=> 'Obs',
          'label_from' => 'min obs',
          'label_to' => 'max obs'
        ],
        false,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'obs', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'obs', '<=', (float) $range->to);
                    }
        });

        //filter hilman

        $this->crud->addFilter([
          'name' => 'hilman',
          'type' => 'range',
          'label'=> 'Hilman',
          'label_from' => 'min hilman',
          'label_to' => 'max hilman'
        ],
        false,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'hilman', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'hilman', '<=', (float) $range->to);
                    }
        });

        //kategori
        $this->crud->addFilter([ // select2 filter
          'name' => 'kategori',
          'type' => 'select2',
          'label'=> 'Kategori'
        ], function() {
            return [
                    'nihil' => 'Nihil',
                    'sangat ringan' => 'Sangat ringan',
                    'ringan' => 'Ringan',
                    'sedang' => 'Sedang',
                    'lebat' => 'Lebat',
                    'sangat lebat' => 'Sangat lebat'
                    ];
        }, function($value) { // if the filter is active
            $this->crud->addClause('where', 'kategori', $value);
        });
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
