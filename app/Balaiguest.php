<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balaiguest extends Model
{
    protected $table = 'balaiguests';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'nama', 'dari', 'keperluan', 'tanggal','keterangan', 'foto'
    ];
}
