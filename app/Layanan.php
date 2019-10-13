<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    
    protected $fillable = ['nama', 'instansi', 'alamat', 'email','handphone', 'jenis_data', 'surat', 'status'];
}
