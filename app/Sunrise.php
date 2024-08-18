<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sunrise extends Model
{
    protected $table = 'sunrises';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tanggal', 'kota', 'terbit', 'terbenam'];
}
