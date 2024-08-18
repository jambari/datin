<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\Hujan;
use App\Models\Gempa;
use Carbon\Carbon;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\LogbookRequest as StoreRequest;
use App\Http\Requests\LogbookRequest as UpdateRequest;

/**
 * Class LogbookCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class LogbookCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Logbook');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/logbook');
        $this->crud->setEntityNameStrings('logbook', 'logbooks');
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setFromDb();
        $operasionals = [
            [ // select_from_array
                'name' => 'seiscomp',
                'label' => "SeiscomP4",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [ // select_from_array
                'name' => 'nexstorm_petir',
                'label' => "Nexstorm Petir",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'accelero_system',
                'label' => "Accelerometer Sistem",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'dvb',
                'label' => "DVB",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'jamstec',
                'label' => "JAMSTEC",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'jiesview',
                'label' => "JIESVIEW",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'diseminasi',
                'label' => "Diseminasi",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'esdx',
                'label' => "ESDX",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'magdas',
                'label' => "Magnet MAGDAS",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ], [
                'name' => 'lemi',
                'label' => "Magnet Lemi-008",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem Peralatan Operasional',
            ]
        ];
        $kuklims = [
            [
                'name' => 'hillman',
                'label' => "Penakar Hujan Hillman",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem KU dan KLIM',
            ], [
                'name' => 'obs',
                'label' => "Penakar Hujan Obs",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem KU dan KLIM',
            ], [
                'name' => 'arws',
                'label' => "ARWS",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem KU dan KLIM',
            ], [
                'name' => 'hv_sampler',
                'label' => "HV Sampler",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sistem KU dan KLIM',
            ]
        ];
        $pendukungopss = [
            [
                'name' => 'listrik_genset',
                'label' => "Listrik & Genset",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ], [
                'name' => 'internet',
                'label' => "Internet",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ], [
                'name' => 'telefon',
                'label' => "Telefon",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ], [
                'name' => 'ac',
                'label' => "AC",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ], [
                'name' => 'air',
                'label' => "Air",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ], [
                'name' => 'cctv',
                'label' => "CCTV",
                'type' => 'select_from_array',
                'options' => [
                    'baik' => 'Baik',
                    'sedang' => 'Sedang',
                    'buruk' => 'Buruk'
                ],
                'allows_null' => false,
                'tab' => 'Sarana Pendukung Operasional',
            ]
        ];
        $rawdatas = [
            [
                'name' => 'intensitas_hujan',
                'label' => 'Intensitas Hujan (BMKGSoft)',
                'type' => 'select_from_array',
                'options' => [
                    'terkirim' => 'Terkirim',
                    'belum' => 'Belum',
                ],
                'allows_null' => false,
                'tab' => 'Raw Data Pengumpulan dan Penyebaran',
            ], [
                'name' => 'data_nexstorm',
                'label' => 'Data Nexstorm',
                'type' => 'select_from_array',
                'options' => [
                    'terkirim' => 'Terkirim',
                    'belum' => 'Belum',
                ],
                'allows_null' => false,
                'tab' => 'Raw Data Pengumpulan dan Penyebaran',
            ], [
                'name' => 'data_jamstec',
                'label' => 'Data JAMSTEC',
                'type' => 'select_from_array',
                'options' => [
                    'terkirim' => 'Terkirim',
                    'belum' => 'Belum',
                ],
                'allows_null' => false,
                'tab' => 'Raw Data Pengumpulan dan Penyebaran',
            ], [
                'name' => 'data_seismisitas',
                'label' => 'Data Seismisitas (Local Database)',
                'type' => 'select_from_array',
                'options' => [
                    'terkirim' => 'Terkirim',
                    'belum' => 'Belum',
                ],
                'allows_null' => false,
                'tab' => 'Raw Data Pengumpulan dan Penyebaran',
            ]
        ];
        $rekamandatas = [
            [
                'name' => 'berat_kertas',
                'label' => 'Berat Kertas',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ], [
                'name' => 'counter_awal',
                'label' => 'Counter Awal (PS)',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ], [
                'name' => 'counter_akhir',
                'label' => 'Counter Akhir (AK)',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ], [
                'name' => 'flow_rate_awal',
                'label' => 'Flow Rate Awal',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ], [
                'name' => 'flow_rate_akhir',
                'label' => 'Flow Rate Akhir',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ], [
                'name' => 'kah',
                'label' => 'Sampel Air Hujan (KAH)',
                'type' => 'text',
                'tab' => 'Rekaman Data HV Sampler, Hillman, Obs',
                // 'allows_null' => true
            ]
        ];
        $sites1 = [
            [
                'name' => 'armi',
                'label' => "ARMI (2019)",
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'arpi',
                'label' => "ARPI(2019)",
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'baki',
                'label' => "BAKI (LIBRA)",
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'bndi',
                'label' => 'BNDI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'dypi',
                'label' => 'DYPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'erpi',
                'label' => 'ERPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'faki',
                'label' => 'FAKI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'fkmpm',
                'label' => 'FKPMP (2020)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'geni',
                'label' => 'GENI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'glmi',
                'label' => 'GLMI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'iwpi',
                'label' => 'IWPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'jay',
                'label' => 'JAY (CTBTO)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'kmpi',
                'label' => 'KMPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'kmsi',
                'label' => 'KMSI (KMSI)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'krai',
                'label' => 'KRAI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'ljpi',
                'label' => 'LJPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'mbpi',
                'label' => 'MBPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'mipi',
                'label' => 'MIPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'mmpi',
                'label' => 'MMPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ], [
                'name' => 'msai',
                'label' => 'MSAI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 1',
            ],
        ];
        $sites2 = [
            [
                'name' => 'mtn',
                'label' => 'MTN (AU)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'nbpi',
                'label' => 'NBPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'rapi',
                'label' => 'RAPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'rkpi',
                'label' => 'RKPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'sani',
                'label' => 'SANI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'saui',
                'label' => 'SAUI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'sjpm',
                'label' => 'SJPM (2020)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'skpm',
                'label' => 'SKPM (2020)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'smpi',
                'label' => 'SMPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'srpi',
                'label' => 'SRPI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'stpi',
                'label' => 'STPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'swi',
                'label' => 'SWI (LIBRA)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'tami',
                'label' => 'TAMI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'tle2',
                'label' => 'TLE2 (Js)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'tnti',
                'label' => 'TNTI (GFZ)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'tspi',
                'label' => 'TSPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'wami',
                'label' => 'WAMI (Js)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ], [
                'name' => 'wwpi',
                'label' => 'WWPI (2019)',
                'type' => 'select_from_array',
                'options' => [
                    'normal' => 'Normal',
                    'gaps' => 'Gaps',
                    'spike' => 'Spike',
                    'blank' => 'Blank'
                ],
                'allows_null' => false,
                'tab' => 'SeiscomP Site Monitoring 2',
            ]
        ];
        $websosmeds = [
            [
                'name' => 'website',
                'label' => "Website",
                'type' => 'select_from_array',
                'options' => [
                    'update' => 'Update',
                    'off' => 'Off',
                ],
                'allows_null' => false,
                'tab' => 'Sistem Website dan Media Sosial',
            ], [
                'name' => 'media_sosial',
                'label' => "Media Sosial",
                'type' => 'select_from_array',
                'options' => [
                    'update' => 'Update',
                    'off' => 'Off',
                ],
                'allows_null' => false,
                'tab' => 'Sistem Website dan Media Sosial',
            ]
        ];
        $keterangans = [
            [
                'name' => 'keterangan',
                'label' => "Keterangan/ Catatan Operasional",
                'type' => 'textarea',
                'tab' => 'Keterangan Tambahan',
                // 'allows_null' => true
            ]
        ];
        $fields = [
            [
                'name' => 'jadwal_dinas',
                'label' => 'Jadwal Dinas',
                'type' => 'select_from_array',
                'options' => [
                    'Pagi Siang' => 'Pagi Siang',
                    'malam Tengah Malam' => 'Malam Tengah Malam',
                    'Pagi' => 'Pagi',
                    'Siang' => 'Siang',
                    'Malam' => 'Malam'
                ], 
                'allows null' => false
            ],[
                'name' => 'tanggal',
                'label' => 'Tanggal',
                'type' => 'date'
            ], [
                'name' => 'petugas',
                'label' => 'On Duty',
                'type' => 'select_from_array',
                'options' => [
                    'Alif Muhammad Annabal' => 'Alif Muhammad Annabal','Berlian Y Andrianto' => 'Berlian Y Andrianto',
                    'Gogo Diego Y. Silalahi' => 'Gogo Diego Y. Silalahi', 'Jambari' => 'Jambari','Lidya N. Hutapea' => 'Lidya N. Hutapea', 
                    'Netty Y. Baru' => 'Netty Y. Baru','Achmad Prasetia Budi'=>'Achmad Prasetia Budi', 'Purnama David Anwar' => 'Purnama David Anwar', 'Rivaldo M. Sihombing' => 'Rivaldo M. Sihombing'
                ], 
                'allows null' => false
            ]
        ];
        // ------ CRUD COLUMNS
        $this->crud->setColumnDetails('petugas', ['label' => 'On Duty']);
        $this->crud->setColumnDetails('seiscomp', ['label' => 'SeiscomP4']);
        $this->crud->setColumnDetails('nexstorm_petir', ['label' => 'Nexstorm Petir']);
        $this->crud->setColumnDetails('accelero_system', ['label' => 'Accelerometer Sistem']);
        $this->crud->setColumnDetails('dvb', ['label' => 'DVB']);
        $this->crud->setColumnDetails('jamstec', ['label' => 'JAMSTEC']);
        $this->crud->setColumnDetails('jiesview', ['label' => 'JIESVIEW']);
        $this->crud->setColumnDetails('diseminasi', ['label' => 'Diseminasi']);
        $this->crud->setColumnDetails('esdx', ['label' => 'ESDX']);
        $this->crud->setColumnDetails('magdas', ['label' => 'Magnet MAGDAS']);
        $this->crud->setColumnDetails('lemi', ['label' => 'Magnet Lemi-008']);
        $this->crud->setColumnDetails('hillman', ['label' => 'Penakar Hujan Hillman']);
        $this->crud->setColumnDetails('obs', ['label' => 'Penakar Hujan Obs']);
        $this->crud->setColumnDetails('arws', ['label' => 'ARWS']);
        $this->crud->setColumnDetails('hv_sampler', ['label' => 'HV Sampler']);
        $this->crud->setColumnDetails('listrik_genset', ['label' => 'Listrik & Genset']);
        $this->crud->setColumnDetails('cctv', ['label' => 'CCTV']);
        $this->crud->setColumnDetails('intensitas_hujan', ['label' => 'Intensitas Hujan (BMKGSoft)']);
        $this->crud->setColumnDetails('data_nexstorm', ['label' => 'Data Nexstorm']);
        $this->crud->setColumnDetails('data_jamstec', ['label' => 'Data JAMSTEC']);
        $this->crud->setColumnDetails('data_seismisitas', ['label' => 'Data Seisimisitas']);
        $this->crud->setColumnDetails('berat_kertas', ['label' => 'Berat Kertas']);
        $this->crud->setColumnDetails('counter_awal', ['label' => 'Counter Awal (PS)']);
        $this->crud->setColumnDetails('counter_akhir', ['label' => 'Counter Akhir (AK)']);
        $this->crud->setColumnDetails('flow_rate_awal', ['label' => 'Flow Rate Awal']);
        $this->crud->setColumnDetails('flow_rate_akhir', ['label' => 'Flow Rate Akhir']);
        $this->crud->setColumnDetails('hillman_intensitas', ['label' => 'Hillman Intensitas (mm)']);
        $this->crud->setColumnDetails('obs_intensitas', ['label' => 'Obs Intensitas (mm)']);
        $this->crud->setColumnDetails('kah', ['label' => 'Sampel Air Hujan (KAH)']);
        $this->crud->setColumnDetails('armi', ['label' => 'ARMI (2019)']);
        $this->crud->setColumnDetails('arpi', ['label' => 'ARPI (2019)']);
        $this->crud->setColumnDetails('baki', ['label' => 'BAKI (LIBRA)']);
        $this->crud->setColumnDetails('bndi', ['label' => 'BNDI (GFZ)']);
        $this->crud->setColumnDetails('dypi', ['label' => 'DYPI (GFZ)']);
        $this->crud->setColumnDetails('erpi', ['label' => 'ERPI (LIBRA)']);
        $this->crud->setColumnDetails('faki', ['label' => 'FAKI (GFZ)']);
        $this->crud->setColumnDetails('fkmpm', ['label' => 'FKMPM (2020)']);
        $this->crud->setColumnDetails('geni', ['label' => 'GENI (GFZ)']);
        $this->crud->setColumnDetails('glmi', ['label' => 'GLMI (LIBRA)']);
        $this->crud->setColumnDetails('iwpi', ['label' => 'IWPI (2019)']);
        $this->crud->setColumnDetails('jay', ['label' => 'JAY (CTBTO)']);
        $this->crud->setColumnDetails('kmpi', ['label' => 'KMPI (LIBRA)']);
        $this->crud->setColumnDetails('krai', ['label' => 'KRAI (LIBRA)']);
        $this->crud->setColumnDetails('ljpi', ['label' => 'LJPI (2019)']);
        $this->crud->setColumnDetails('mbpi', ['label' => 'MBPI (2019)']);
        $this->crud->setColumnDetails('mipi', ['label' => 'MIPI (2019)']);
        $this->crud->setColumnDetails('mmpi', ['label' => 'MMPI (LIBRA)']);
        $this->crud->setColumnDetails('msai', ['label' => 'MSAI (LIBRA)']);
        $this->crud->setColumnDetails('mtn', ['label' => 'MTN (AU)']);
        $this->crud->setColumnDetails('nbpi', ['label' => 'NBPI (LIBRA)']);
        $this->crud->setColumnDetails('rapi', ['label' => 'RAPI (LIBRA)']);
        $this->crud->setColumnDetails('rkpi', ['label' => 'RKPI (LIBRA)']);
        $this->crud->setColumnDetails('sani', ['label' => 'SANI (GFZ)']);
        $this->crud->setColumnDetails('saui', ['label' => 'SAUI (GFZ)']);
        $this->crud->setColumnDetails('sjpm', ['label' => 'SJPM (2020)']);
        $this->crud->setColumnDetails('skpm', ['label' => 'SKPM (2020)']);
        $this->crud->setColumnDetails('smpi', ['label' => 'SMPI (LIBRA)']);
        $this->crud->setColumnDetails('srpi', ['label' => 'SRPI (LIBRA)']);
        $this->crud->setColumnDetails('stpi', ['label' => 'STPI (2019)']);
        $this->crud->setColumnDetails('swi', ['label' => 'SWI (LIBRA)']);
        $this->crud->setColumnDetails('tami', ['label' => 'TAMI (2019)']);
        $this->crud->setColumnDetails('tle2', ['label' => 'TLE2 (Js)']);
        $this->crud->setColumnDetails('tnti', ['label' => 'TNTI (GFZ)']);
        $this->crud->setColumnDetails('tspi', ['label' => 'TSPI (2019)']);
        $this->crud->setColumnDetails('wami', ['label' => 'WAMI (Js)']);
        $this->crud->setColumnDetails('wwpi', ['label' => 'WWPI (2019)']);
        $this->crud->setColumnDetails('media_sosial', ['label' => 'Media Sosial']);
        // ------ CRUD FIELDS
        $this->crud->addFields($fields, 'update/create/both');
        $this->crud->addFields($operasionals, 'update/create/both');
        $this->crud->addFields($kuklims, 'update/create/both');
        $this->crud->addFields($pendukungopss, 'update/create/both');
        $this->crud->addFields($rawdatas, 'update/create/both');
        $this->crud->addFields($rekamandatas, 'update/create/both');
        $this->crud->addFields($sites1, 'update/create/both');
        $this->crud->addFields($sites2, 'update/create/both');
        $this->crud->addFields($websosmeds, 'update/create/both');
        $this->crud->addFields($keterangans, 'update/create/both');

        // add asterisk for fields that are required in LogbookRequest
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
        // $this->crud->addButtonFromView('line', 'unduh', 'unduh', 'beginning');
        $this->crud->allowAccess('unduh');
        $this->crud->addButtonFromView('line', 'unduh' , 'unduh', 'beginning');

        // ------ CRUD ACCESS

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
        // $this->crud->allowAccess('unduh');

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
        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'tanggal',
            'label'=> 'Tanggal'
         ],
         false,
         function($value) { // if the filter is active, apply these constraints
            $dates = json_decode($value);
            $this->crud->addClause('where', 'tanggal', '>=', $dates->from);
            $this->crud->addClause('where', 'tanggal', '<=', $dates->to . ' 23:59:59');
         });
         $this->crud->addFilter([ // daterange filter
            'type' => 'select2',
            'name' => 'petugas',
            'label'=> 'On Duty'
         ],
         function(){
            return [
                'Alif Muhammad Annabal' => 'Alif Muhammad Annabal','Berlian Y Andrianto' => 'Berlian Y Andrianto',
                    'Gogo Diego Y. Silalahi' => 'Gogo Diego Y. Silalahi', 'Jambari' => 'Jambari','Lidya N. Hutapea' => 'Lidya N. Hutapea', 
                    'Netty Y. Baru' => 'Netty Y. Baru','Achmad Prasetia Budi'=>'Achmad Prasetia Budi', 'Purnama David Anwar' => 'Purnama David Anwar', 'Rivaldo M. Sihombing' => 'Rivaldo M. Sihombing'
            ];
         },
         function($value) { // if the filter is active
            $this->crud->addClause('where', 'petugas', $value);
        });
        // $this->crud->addFilter([ // daterange filter
        //     'type' => 'select2',
        //     'name' => 'jadwal_dinas',
        //     'label'=> 'Jadwal Dinas'
        //  ],
        //  function(){
        //     return [
        //         'pagi_siang' => 'Pagi Siang',
        //         'malam' => 'Malam'
        //     ];
        //  },
        //  function($value) { // if the filter is active
        //     $this->crud->addClause('where', 'jadwal_dinas', $value);
        // });
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
        // $this->crud->groupBy('tanggal');
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
public function unduh($id)
{
    $logbook = $this->crud->getEntry($id);
    $logbookdate = $logbook['tanggal'];
    $jadwal_dinas = $logbook['jadwal_dinas'];
    if ($jadwal_dinas == "malam Tengah Malam") {
        $hujanmt = Carbon::parse($logbookdate)->addDay();
        $hujan = Hujan::whereDate('tanggal', $hujanmt)->first();
        $seismisitas = Gempa::whereDate('tanggal', $logbookdate)->count();
        return view('logbooks.layout', compact('logbook','hujan', 'seismisitas'));
    } else {
        $hujan = Hujan::whereDate('tanggal', $logbookdate)->first();
        $seismisitas = Gempa::whereDate('tanggal', $logbookdate)->count();
        return view('logbooks.layout', compact('logbook','hujan','seismisitas'));
    }

}

}
