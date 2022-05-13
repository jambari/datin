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
        if (preg_match("/(\d{1,2})\-(\w{3})\-(\d{1,2})\s(\d{2}:\d{2}:\d{2})/", $value, $m)) {
        $month = ["Jan"=>1,"Feb"=>2,"Mar"=>3,"Apr"=>4,"May"=>5,"Mei"=>5,"Jun"=>6,"Jul"=>7,"Aug"=>8,"Sep"=>9,"Oct"=>10,"Nov"=>11,"Dec"=>12];
        $fixed = sprintf("20%02d-%02d-%02d %s", $m[3], $month[$m[2]], $m[1], $m[4]); //tanggal lama dengan bulan berupa angka
        $oldtime = date("d-M-y H:i:s", strtotime($fixed)); //tanggal lama dengan bulan berupa Huruf
        $date = date("d-M-y H:i:s", strtotime($fixed) + 7200); //Tanggal baru dengan format WIT
        $value = str_replace($oldtime,$date,$value);
          return $value;
        } else {
            $value = str_replace('WIT','WIB',$value);
          return $value;
        }

    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
