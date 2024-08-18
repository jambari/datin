<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Petir extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'petirs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggaljam', 'longitude', 'latitude', 'type'];
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
    |route SCOPES
    |--------------------------------------------------------------------------
    */
    public function getTypeAttribute($value)
    {
        if ($value==0) {
            $value = 'CG+';
            return $value;
        }

        if ($value==1) {
            $value = 'CG-';
            return $value;
        }
        if ($value==2) {
            $value = 'Intraclouds';
            return $value;
        }
    }

    public function getTanggaljamAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
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
