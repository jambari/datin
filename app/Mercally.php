<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\CrudTrait;
use App\Models\Balaigempa;

class Mercally extends Model
{
    // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mercallis';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['gempabalai_id', 'nama', 'lokasi', 'mmi', 'gambar', 'lintang', 'bujur'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $casts = [
        'lokasi' => 'array',
    ];


    public function balaigempa()
    {
        return $this->belongsTo('App\Models\Balaigempa');
    } 
}
