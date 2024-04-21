<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Latency extends Model
{
    use CrudTrait;
    protected $table = 'latencies';
    protected $fillable = [
        'number_code', 'site', 'latency',
        'status'
    ];
}
