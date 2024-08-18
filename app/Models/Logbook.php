<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Logbook extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'logbooks';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'tanggal', 'petugas', 'jadwal_dinas', 'seiscomp', 'nexstorm_petir', 'accelero_system',
        'dvb', 'jamstec', 'jiesview', 'diseminasi', 'esdx', 'magdas', 'lemi', 'hillman', 'obs',
        'arws', 'hv_sampler', 'listrik_genset', 'internet', 'telefon', 'ac', 'air', 'cctv', 
        'intensitas_hujan', 'data_nexstorm', 'data_jamstec', 'data_seismisitas', 'berat_kertas', 
        'counter_awal', 'counter_akhir', 'flow_rate_awal', 'flow_rate_akhir', 'hillman_intensitas',
        'obs_intensitas', 'armi', 'arpi', 'baki', 'bndi', 'dypi', 'erpi', 'faki', 'fkmpm', 'geni', 
        'glmi', 'iwpi', 'jay', 'kmpi', 'kmsi', 'krai', 'ljpi', 'mbpi', 'mipi', 'mmpi', 'msai', 'mtn',
        'nbpi', 'rapi', 'rkpi', 'sani', 'saui', 'sjpm', 'skpm', 'smpi', 'srpi', 'stpi', 'swi', 'tami',
        'tle2', 'tnti', 'tspi', 'wami', 'wwpi', 'website', 'media_sosial', 'keterangan'
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
