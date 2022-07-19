<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreSignificantRequest as StoreRequest;
use App\Http\Requests\StoreSignificantRequest as UpdateRequest;
Use App\Models\Significant;
/**
 * Class SignificantCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SignificantCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Significant');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/significant');
        $this->crud->setEntityNameStrings('signifikan', 'signifikan');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();
        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'tanggal',
           'label'=> 'Tanggal',
           'hint' => 'isi tanggal sesuai format sms, ex: 09-Jun-19'
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'tanggal',
           'label'=> 'Tanggal',
         ]);

        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'jam',
           'label'=> 'Jam',
           'hint' => 'isi jam sesuai format sms, ex: 09:24:59'
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'jam',
           'label'=> 'Jam',
         ]);

        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'lintang',
           'label'=> 'Lintang',
           'hint' => 'contoh: -2.57 '
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'lintang',
           'label'=> 'Lintang',
         ]);


        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'bujur',
           'label'=> 'Bujur',
           'hint' => 'contoh: 139.45 '
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'bujur',
           'label'=> 'Bujur',
         ]);

        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'magnitudo',
           'label'=> 'Magnitudo',
           'hint' => 'contoh: 5.5 '
         ]);


        $this->crud->addColumn([ // daterange filter
           'name' => 'magnitudo',
           'label'=> 'Magnitudo',
         ]);


        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'depth',
           'label'=> 'Kedalaman',
           'hint' => 'contoh: 10 '
         ]);



        $this->crud->addColumn([ // daterange filter
           'name' => 'depth',
           'label'=> 'Kedalaman',
         ]);

        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'lokasi',
           'label'=> 'Lokasi',
           'hint' => 'contoh: 58 Km TimurLaut SARMI-PAPUA '
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'lokasi',
           'label'=> 'Lokasi',
         ]);

        $this->crud->addField([ // daterange filter
           'type' => 'text',
           'name' => 'dirasakan',
           'label'=> 'Daerah yang merasakan',
           'hint' => 'contoh: II-III MMI di Jayapura, I-II MMI di Sentani '
         ]);


        $this->crud->addColumn([ // daterange filter
           'name' => 'dirasakan',
           'label'=> 'Daerah yang merasakan',
         ]);

        $this->crud->addColumn([ // daterange filter
           'name' => 'created_at',
           'label'=> 'created_at',
         ]);


        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // add asterisk for fields that are required in SignificantRequest
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
        $this->crud->addButtonFromView('line', 'peta' , 'peta', 'beginning');
        $this->crud->addButtonFromView('line', 'peta' , 'peta', 'beginning');

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete', 'peta']);
        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');
        // $this->crud->addFilter([ // daterange filter
        //    'type' => 'date_range',
        //    'name' => 'created_at',
        //    'label'=> 'Tanggal'
        //  ],
        //  false,
        //  function($value) { // if the filter is active, apply these constraints
        //    $dates = json_decode($value);
        //    $this->crud->addClause('where', 'created_at', '>=', $dates->from);
        //    $this->crud->addClause('where', 'created_at', '<=', $dates->to);
        // });
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
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        $this->crud->orderBy('id','desc');
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

    public function peta($id)
    {   
        $event = Significant::find($id);
        $lat = $event['lintang'];
        $lon = $event['bujur'];

        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            if (count($lat) > 4 ) {
              $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
            } else {
              $lat = $lat[1].$lat[2].$lat[3].' LS';
            }
            
        } else {
            if (count($lat) >3  ) {
              $lat = $lat[0].$lat[1].$lat[2].$lat[3].' LU'; //2.53
            } else {
              $lat = $lat[0].$lat[1].$lat[2].' LU'; //2.5 or 2.50
            }
            // $lat = $lat[0].$lat[1].$lat[2].$lat[3].' LU';
        }
        
        return view('gempa.significant')->with(compact('event', 'lat', 'lon'));
    }
}
