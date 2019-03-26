<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Bulletin extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'bulletins';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['title', 'bulan', 'tahun', 'content', 'cover'];
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
    public function getBulanAttribute($value) {
        if ($value == '1') {
            return $value = 'Januari';
        }

        if ($value == '2') {
            return $value = 'Februari';
        }

        if ($value == '3') {
            return $value = 'Maret';
        }

        if ($value == '4') {
            return $value = 'April';
        }

        if ($value == '5') {
            return $value = 'Mei';
        }

        if ($value == '6') {
            return $value = 'Juni';
        }
        if ($value == '7') {
            return $value = 'Juli';
        }

        if ($value == '8') {
            return $value = 'Agustus';
        }

        if ($value == '9') {
            return $value = 'September';
        }

        if ($value == '10') {
            return $value = 'Oktober';
        }

        if ($value == '11') {
            return $value = 'November';
        }

        if ($value == '12') {
            return $value = 'Desember';
        }
    }

    //Accecor cover

    public function getCoverAttribute() {
        if (!$this->attributes['cover']) {
            return 'berita/buletin/buletin-default.JPG';
        }


        return $this->attributes['cover'];
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
