<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\StoreGempaRequest as StoreRequest;
use App\Http\Requests\UpdateGempaRequest as UpdateRequest;
use App\Models\Infogempa;
use App\Models\Gempa;
use App\Models\Satudatagempa;

/**
 * Class GempaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class GempaCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Gempa');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/gempa');
        $this->crud->setEntityNameStrings('gempa', 'gempa');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        // */
        // $this->crud->addColumn('delta');
        // $this->crud->setColumnDetails('delta', ['label' => 'PENGIRIMAN']);
        $this->crud->setFromDb();
        $this->crud->addColumn('delta');
        $this->crud->setColumnDetails('delta', ['label' => 'PENGIRIMAN']);
        $fields = [
            [
                'name' => 'tanggal',
                'labe;' => 'Tanggal',
                'type' => 'date'
            ], [    
                'name' => 'origin',
                'label' => 'Origin',
                'type' => 'text'
            ], [
                'name' => 'lintang',
                'label' => 'Lintang',
                'type' => 'text'
            ], [
                'name' => 'bujur',
                'label' => 'Bujur',
                'type' => 'text'
            ], [
                'name' => 'magnitudo',
                'label' => 'Magnitudo'
            ], [
                'name' => 'type',
                'label' => 'Tipe Magnitudo',
                'type' => 'select_from_array',
                'options' => ['M'=>'M', 'MLv' => 'MLv', 'Mw'=>'Mw', 'Mwp'=> 'Mwp'],
                'default' => 'M'
            ], [
                'name' => 'depth',
                'label' => 'Kedalaman',
                'type' => 'text'
            ], [
                'name' => 'ket',
                'label' => 'Keterangan',
                'type' => 'text'
            ], [
                'name' => 'terasa',
                'label' => 'dirasakan',
                'type' => 'checkbox',
                'default' => '0',
            ], [
                'name' => 'terdampak',
                'label' => 'daerah yang merasakan',
                'type' => 'textarea'
            ], [
                'name' => 'narasi',
                'label' => 'narasi',
                'type' => 'tinymce'
            ], [
                'name' => 'sumber',
                'label' => 'Sumber',
                'type' => 'select_from_array',
                'options' => ['angkasa'=>'Angkasa', 'pgr v' => 'PGR V', 'pgn'=>'PGN', 'bmkg' => 'BMKG', 'usgs' => 'USGS'],
                'default' => 'angkasa'
            ], [
                'name' => 'petugas',
                'label' => 'On Duty',
                'type' => 'select_from_array',
                'options' => ['alif' => 'Alif','berlian' => 'Berlian', 'canggih'=>'Canggih',
                    'danang' => 'Danang' ,'gogo' => 'Gogo', 'jambari' => 'Jambari',
                    'lidya' => 'Lidya', 'netty' => 'Netty','prasetia'=>'Prasetia', 'purnama' => 'Purnama',
                    'rosi' => 'Rosi','rivaldo' => 'Rivaldo', 'syawal' => 'Syawal'
                ],
                'default' => 'umum'
            ]
        ];
        // ------ CRUD COLUMNS
        // $this->crud->addColumn('terasa');
        // $this->crud->addColumn('terdampak');
        $this->crud->addColumn('created_at');
        $this->crud->addColumn('updated_at');

        // add a single column, at the end of the stack
        //$this->crud->addColumns('terasa','terdampak'); // add multiple columns, at the end of the stack
        $this->crud->removeColumn('narasi'); // remove a column from the stack
        $this->crud->removeColumn('type'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        $this->crud->setColumnDetails('terdampak', ['label' => 'Dampak']);
        $this->crud->setColumnDetails('terasa', ['label' => 'Terasa']); // adjusts the properties of the passed in column (by name)
        $this->crud->setColumnsDetails(['origin'], ['label' => 'Origin (UTC)']);

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        $this->crud->addFields($fields, 'update/create/both');
        $this->crud->removeField('tanggal', 'update');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // add asterisk for fields that are required in GempaRequest
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
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete', 'press','angkasatemplatebalai']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);
        $this->crud->addButtonFromView('line', 'press' , 'press', 'beginning');
        $this->crud->addButtonFromView('line', 'angkasatemplatebalai' , 'angkasatemplatebalai', 'end');
        $this->crud->allowAccess('kirimsdgjay');
        $this->crud->addButtonFromView('line', 'kirimsdgjay' , 'kirimsdgjay', 'end');
        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
        if (backpack_auth()->user()->name == 'balai5') {
            $this->crud->allowAccess('kirimsdgjay');
            $this->crud->addButtonFromView('line', 'kirimsdgjay' , 'kirimsdgjay', 'end');
            $this->crud->removeColumn('narasi'); // remove a column from the stack
            $this->crud->removeColumn('petugas'); // remove a column from the stack
            $this->crud->removeColumn('created_at'); // remove a column from the stack
            $this->crud->removeColumn('terdampak'); // remove a column from the stack
            $this->crud->removeColumn('sumber'); // remove a column from the stack
            $this->crud->removeColumn('terasa'); // remove a column from the stack
            $this->crud->removeColumn('updated_at'); // remove a column from the stack
            $this->crud->denyAccess('create'); // remove a column from the stack
            $this->crud->denyAccess('update'); // remove a column from the stack
            $this->crud->denyAccess('delete'); // remove a column from the stack
        } 

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
        $this->crud->orderBy('tanggal','desc');
        $this->crud->orderBy('origin','desc');

        //filter magnitudo
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

        //filter lintang
        $this->crud->addFilter([
          'name' => 'lintang',
          'type' => 'range',
          'label'=> 'Lintang',
          'label_from' => 'min lintang',
          'label_to' => 'max lintang'
        ],
        false,
        function($value) { // if the filter is active
            $range = json_decode($value);
            if ($range->from) {
                $this->crud->addClause('where', 'lintang', '>=', (float) $range->from);
            }
            if ($range->to) {
                $this->crud->addClause('where', 'lintang', '<=', (float) $range->to);
            }
        });
        //filter bujur
        $this->crud->addFilter([
          'name' => 'bujur',
          'type' => 'range',
          'label'=> 'Bujur',
          'label_from' => 'min bujur',
          'label_to' => 'max bujur'
        ],
        false,
        function($value) { // if the filter is active
            $range = json_decode($value);
            if ($range->from) {
                $this->crud->addClause('where', 'bujur', '>=', (float) $range->from);
            }
            if ($range->to) {
                $this->crud->addClause('where', 'bujur', '<=', (float) $range->to);
            }
        });
        //filter Magnitudo
        $this->crud->addFilter([
          'name' => 'magnitudo',
          'type' => 'range',
          'label'=> 'Magnitudo',
          'label_from' => 'min mag',
          'label_to' => 'max mag'
        ],
        false,
        function($value) { // if the filter is active
            $range = json_decode($value);
            if ($range->from) {
                $this->crud->addClause('where', 'magnitudo', '>=', (float) $range->from);
            }
            if ($range->to) {
                $this->crud->addClause('where', 'magnitudo', '<=', (float) $range->to);
            }
        });

        //filter kedalaman
        $this->crud->addFilter([
          'name' => 'depth',
          'type' => 'range',
          'label'=> 'Kedalaman',
          'label_from' => 'min depth',
          'label_to' => 'max depth'
        ],
        false,
        function($value) { // if the filter is active
            $range = json_decode($value);
            if ($range->from) {
                $this->crud->addClause('where', 'depth', '>=', (float) $range->from);
            }
            if ($range->to) {
                $this->crud->addClause('where', 'depth', '<=', (float) $range->to);
            }
        });


        //filter terasa

        $this->crud->addFilter([ // select2 filter
          'name' => 'terasa',
          'type' => 'select2',
          'label'=> 'Dirasakan'
        ], function() {
            return [
                    0 => 'Tidak dirasakan',
                    1 => 'Dirasakan',
                    ];
        }, function($value) { // if the filter is active
            $this->crud->addClause('where', 'terasa', $value);
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

    //filter

    //details row
    public function showDetailsRow($id) {
        $event = $this->crud->getEntry($id);
        return view('vendor.backpack.crud.gempa_details_row', compact('event'));
    }

    //detail eq on frontend
    public function showmap($id) {
        $event = $this->crud->getEntry($id);
        //Penanggalan
        //array bulan
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        //wilayah yang diguncang gempa
        // $wilayah = $event['ket'];
        // $ket = explode(" ", $wilayah);
        // $wilayah = $ket[3];
        // $arah = $ket[2];
        // $jarak = $ket[0];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }
        return view('gempa.detail_gempa', compact('lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms'));
    }
    //recent eq statistik
    public function press($id) //rilis media
    {
        $event = Gempa::find($id);
        //Penanggalan
        //array bulan
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        //wilayah yang diguncang gempa
        $wilayah = $event['ket'];
        $ket = explode(" ", $wilayah);
        $wilayah = $ket[3];
        $originalString = $wilayah;
        $wilayah = str_replace("-", ", ", $wilayah);
        // Split the string at the hyphen
        $parts = explode("-", $originalString);
        // Take the first part (before the hyphen)
        $firstWord = $parts[0];
        // Capitalize the first letter and make the rest lowercase
        $formattedWord = ucfirst(strtolower($firstWord));
        $wilayah1 = 
        $arah = $ket[2];
        $jarak = $ket[0];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }
        return view('gempa.press')->with(compact('lat', 'lon', 'mag','wilayah','formattedWord', 'depth','event', 'arah', 'jarak', 'tanggalindo', 'hari', 'jamwit', 'jamsusulan'));
    }

    public function kirimsdgjay($id)
    {
      $event = Gempa::find($id);
      $gempa = new Satudatagempa;
      $tanggal = $event['tanggal'];
      $gempa->tanggal = date("Y-m-d", strtotime($tanggal));
      $gempa->origin = $event['origin'];
      $gempa->lintang = $event['lintang'];
      $gempa->bujur = $event['bujur'];
      $gempa->magnitudo = $event['magnitudo'];
      $gempa->depth = $event['depth'];
      $gempa->ket = '.';
      $gempa->sumber = 'BMKG-JAY';
      $gempa->save();
      return redirect('/admin/satudatagempa');
    }

    public function angkasatemplatebalai($id) {
        $event = $this->crud->getEntry($id);
        //Penanggalan
        //array bulan
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        $koma =',';
        //wilayah yang diguncang gempa
        // $wilayah = $event['ket'];
        // $ket = explode(" ", $wilayah);
        // $wilayah = $ket[3];
        // $arah = $ket[2];
        // $jarak = $ket[0];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }
        return view('gempa.angkasatemplatebalai', compact('lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms','koma'));
    }
}
