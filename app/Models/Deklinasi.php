<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Deklinasi extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'deklinasis';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'tanggal','jam00', 'jam01', 'jam02', 'jam03', 'jam04', 'jam05', 'jam06', 'jam07', 'jam08', 'jam09','jam10', 'jam11', 'jam12', 'jam13', 'jam14', 'jam15', 'jam16', 'jam17', 'jam18', 'jam19', 'jam20',
        'jam21', 'jam22', 'jam23'
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
    public function getAvgAttribute ($value) 
    {
        $jam00 = $this->attributes['jam00'];
        $jam01 = $this->attributes['jam01'];
        $jam02 = $this->attributes['jam02'];
        $jam03 = $this->attributes['jam03'];
        $jam04 = $this->attributes['jam04'];
        $jam05 = $this->attributes['jam05'];
        $jam06 = $this->attributes['jam06'];
        $jam07 = $this->attributes['jam07'];
        $jam08 = $this->attributes['jam08'];
        $jam09 = $this->attributes['jam09'];
        $jam10 = $this->attributes['jam10'];
        $jam11 = $this->attributes['jam11'];
        $jam12 = $this->attributes['jam12'];
        $jam13 = $this->attributes['jam13'];
        $jam14 = $this->attributes['jam14'];
        $jam15 = $this->attributes['jam15'];
        $jam16 = $this->attributes['jam16'];
        $jam17 = $this->attributes['jam17'];
        $jam18 = $this->attributes['jam18'];
        $jam19 = $this->attributes['jam19'];
        $jam20 = $this->attributes['jam20'];
        $jam21 = $this->attributes['jam21'];
        $jam22 = $this->attributes['jam22'];
        $jam23 = $this->attributes['jam23'];
        $value = ($jam00 + $jam01 + $jam02 + $jam03 + $jam04 + $jam05 + $jam06 + $jam07 + $jam08 +$jam09
        + $jam10 + $jam11 + $jam12 + $jam13 + $jam14 + $jam15 + $jam16 + $jam17 + $jam18 + $jam19 + $jam20 + $jam21 + $jam22 + $jam23)/24 ;
        return round($value);
    }

    public function getTanggalAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
