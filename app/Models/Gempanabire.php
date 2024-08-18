<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use Backpack\CRUD\CrudTrait;
use DateTime;


class Gempanabire extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'gempanabires';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'tanggal', 'origin', 'lintang', 'bujur', 'magnitudo', 'type','depth', 'ket','terasa','terdampak'
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
    public function getTerasaAttribute($value)
    {
        if ($value==0) {
            $value = 'tidak';
            return $value;
        } else {
            $value = 'dirasakan';
            return $value;
        }
    }

    public function getOriginAttribute($value)
    {
        $tanggal = $this->attributes['tanggal'];
        $currentTime = $value; // Get the current timestamp
        $currentTime = $tanggal." ".$currentTime;
        // $value = $currentTime;

        // Format the seconds without decimal value
        $dateTime = strtotime($currentTime);
        $formattedTime = date("H:i:s", $dateTime);
        //$secondsWithoutDecimal = date('s', $dateTime);
        $value = $formattedTime;

        return $value;
    }

    public function getDeltaAttribute($value)
    {

        $tanggal = $this->attributes['tanggal'];
        $origin = $this->attributes['origin'];
        $originTime = $tanggal." ".$origin;
        $originTime = new DateTime($originTime);
        //$originTime = $formattedTime = date("H:i:s", $originTime);

        $createdTime = $this->attributes['created_at'];
        $createdTime = new DateTime($createdTime);
        $delta = $originTime->diff($createdTime);
        $hours = $delta->h;
        $minutes = $delta->i;
        $seconds = $delta->s;
        $totalMinutes = $delta->days * 24 * 60 + $delta->h * 60 + $delta->i;
        $ril = $hours.":".$minutes.":".$seconds;

        if ($totalMinutes <= 10) {
            $value = $ril." ".'ONTIME';
            return $value;
        } else {
            $value = $ril." ".'LATE';
            return $value;
        }

    }

    public function getTanggalAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
    public function getKetAttribute($value)
    {
        $latitude = $this->attributes['lintang'];
        $longitude = $this->attributes['bujur'];
        $cities = City::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance'))
            // ->having('distance', '<', 25)
            ->orderBy('distance')
            ->get();

        //BaratDaya
        if ($latitude < $cities[0]['latitude'] && $longitude < $cities[0]['longitude']) {
            $arah = 'BaratDaya';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
        //BaratLaut
        if ($latitude > $cities[0]['latitude'] && $longitude < $cities[0]['longitude']) {
            $arah = 'BaratLaut';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
        //TimurLaut
        if ($latitude > $cities[0]['latitude'] && $longitude > $cities[0]['longitude']) {
            $arah = 'TimurLaut';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
        //Tenggara
        if ($latitude < $cities[0]['latitude'] && $longitude > $cities[0]['longitude']) {
            $arah = 'Tenggara';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
        //Utara
        if ($latitude > $cities[0]['latitude'] && $longitude == $cities[0]['longitude']) {
            $arah = 'Utara';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }

        //Selatan
        if ($latitude < $cities[0]['latitude'] && $longitude == $cities[0]['longitude']) {
            $arah = 'Utara';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }

        //Barat
        if ($latitude == $cities[0]['latitude'] && $longitude < $cities[0]['longitude']) {
            $arah = 'Utara';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
        //Timur
        if ($latitude == $cities[0]['latitude'] && $longitude > $cities[0]['longitude']) {
            $arah = 'Utara';
            $jarak = round($cities[0]['distance']).' km'.' '.$arah.' '.$cities[0]['name'];
            $value = $jarak;
            return $value;
        }
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}