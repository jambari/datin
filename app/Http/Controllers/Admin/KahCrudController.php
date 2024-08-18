<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreKahRequest as StoreRequest;
use App\Http\Requests\UpdateKahRequest as UpdateRequest;

/**
 * Class KahCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class KahCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Kah');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/kah');
        $this->crud->setEntityNameStrings('kah', 'kahs');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();
                $fields = [
            [
                'name' => 'tahun',
                'label' => 'Tahun',
                'type' => 'select_from_array',
                'options' => ['2000'=>'2000','2001'=>'2001','2002'=>'2002', '2003'=>'2003', '2004'=> '2004',
                    '2005'=>'2005', '2006'=> '2006', '2007'=>'2007', '2008' => '2008', '2009' => '2009',
                    '2010' => '2010', '2011' => '2011', '2012' => '2012', '2013' => '2013', '2014' => '2014',
                    '2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019',
                    '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024',
                    '2025' => '2025' ]
            ], [
                'name' => 'bulan', 
                'label' => 'Bulan',
                'type' => 'select_from_array',
                'options' => ['01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12']
            ], [
                'name' => 'minggu',
                'label' => 'Minggu',
                'type' => 'select_from_array',
                'options' => ['1' => '1', '2' => '2', '3' => '3', '4' => '4']
            ], [
                    'name' => 'stasiun',
                    'label' => 'Stasiun',
                    'type' => 'text',
                    'value' => 'ANGKASAPURA'
            ], [
                'name' => 'lokasi',
                'label' => 'Lokasi',
                'type' => 'text',
                'value' => 'PAPUA'
            ], [
                'name' => 'peha',
                'label' => 'pH',
                'type' => 'text'
            ], [
                'name' => 'deha',
                'label' => 'DH',
                'type' => 'text'
            ], [
                'name' => 'ce_a',
                'label' => 'CA',
                'type' => 'text'
            ], [
                'name' => 'emge',
                'label' => 'emge',
                'type' =>'text'
            ], [
                'name' => 'en_a',
                'label' => 'NA',
                'type' => 'text'
            ], [
                'name' => 'K',
                'label' => 'K',
                'type' => 'text'
            ], [
                'name' => 'enha_empat',
                'label' => 'NH4',
                'type' => 'text'
            ], [
                'name' => 'ce_el',
                'label' => 'CL',
                'type' => 'text'
            ], [
                'name' => 'so_empat',
                'label' => 'SO4',
                'type' => 'text'
            ], [
                'name' => 'no_tiga',
                'label' => 'NO3',
                'type' => 'text'
            ], [
                'name' => 'ka_te',
                'label' => 'KT',
                'type' => 'text'
            ], [
                'name' => 'ac_ac',
                'label' => 'AC',
                'type' => 'text'
            ], [
                'name' => 'al_al',
                'label' => 'AL',
                'type' => 'text'
            ], [
                'name' => 'ce_ha',
                'label' => 'CH',
                'type' => 'text'
            ], [
                'name' => 'ox_ox',
                'label' => 'OX',
                'type' => 'text'
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

        // add asterisk for fields that are required in KahRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        $this->crud->setColumnDetails('peha', ['label' => 'pH']); // adjusts the properties of the passed in column (by name)
        $this->crud->setColumnDetails('deha', ['label' => 'DH']);
        $this->crud->setColumnDetails('ce_a', ['label' => 'CH']);
        $this->crud->setColumnDetails('emge', ['label' => 'MG']);
        $this->crud->setColumnDetails('en_a', ['label' => 'NA']);
        $this->crud->setColumnDetails('ka_a', ['label' => 'K']);
        $this->crud->setColumnDetails('enha_empat', ['label' => 'NH4']);
        $this->crud->setColumnDetails('ce_el', ['label' => 'CL']);
        $this->crud->setColumnDetails('so_empat', ['label' => 'SO4']);
        $this->crud->setColumnDetails('no_tiga', ['label' => 'NO3']);
        $this->crud->setColumnDetails('ka_te', ['label' => 'KT']);
        $this->crud->setColumnDetails('ac_ac', ['label' => 'AC']);
        $this->crud->setColumnDetails('al_al', ['label' => 'AL']);
        $this->crud->setColumnDetails('ce_ha', ['label' => 'CH']);
        $this->crud->setColumnDetails('ox_ox', ['label' => 'OX']);
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
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

        //filter
        $this->crud->addFilter([
          'name' => 'tahun',
          'type' => 'range',
          'label'=> 'Tahun',
          'label_from' => 'min tahun',
          'label_to' => 'max tahun'
        ],
        false,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'tahun', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'tahun', '<=', (float) $range->to);
                    }
        });

        //filter bulan

        $this->crud->addFilter([
          'name' => 'bulan',
          'type' => 'range',
          'label'=> 'Bulan',
          'label_from' => 'min bulan',
          'label_to' => 'max bulan'
        ],
        false,
        function($value) { // if the filter is active
                    $range = json_decode($value);
                    if ($range->from) {
                        $this->crud->addClause('where', 'bulan', '>=', (float) $range->from);
                    }
                    if ($range->to) {
                        $this->crud->addClause('where', 'bulan', '<=', (float) $range->to);
                    }
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
