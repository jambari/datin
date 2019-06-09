<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Balaisms extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'balaisms';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['lintang', 'bujur', 'sms'];
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
    //accesor zonasi
    public function getZonaAttribute($value) {
        $lintang = $this->attributes['lintang'];
        $bujur = $this->attributes['bujur'];
        if ($bujur >= 132 and $bujur <= 141 and $lintang >= -7.5 and $lintang <= 5) {
                $value = "PGR V";
                return $value;
        } else {
            $value = "BUKAN PGR V";
            return $value;
        }
    }

    //accesor sms
    public function getSmsAttribute ($value) {
        // $regex = '/(\d{2})-\w[A-z][a-z]-(\d{2}) (\d{2}):(\d{2}):(\d{2})/';
        // preg_match($regex, $value, $result);
        // $tt = implode(' ',$result);
        // $oldtime = $tt[0].$tt[1].'-'.$tt[3].$tt[4].$tt[5].'-'.$tt[7].$tt[8].' '.$tt[10]
        // .$tt[11].':'.$tt[13].$tt[14].':'.$tt[16].$tt[17];
        // $new_time = strtotime($oldtime);
        // $new_time = strtotime("+2 hours", $new_time);
        // $new_time = date("d-M-y H:i:s", $new_time);
        // $value = str_replace($oldtime, $new_time, $value);
        return $value;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
