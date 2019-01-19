<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infogempa extends Model
{
    protected $table = 'infogempas';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['lintang', 'bujur', 'sms'];
}
