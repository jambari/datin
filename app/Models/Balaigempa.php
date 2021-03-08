<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;

class Balaigempa extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'balaigempas';
    // protected $primaryKey = 'id';
    public $timestamps = true;
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
    // public function getWaktu ($value) {


        // $tanggal = $this->attributes['tanggal']; //get date of the eathquake
        // $jam = $this->attributes['origin']; // get origin time of eq
        // $bulan = array (
        //     1 =>   'Januari',
        //     'Februari',
        //     'Maret',
        //     'April',
        //     'Mei',
        //     'Juni',
        //     'Juli',
        //     'Agustus',
        //     'September',
        //     'Oktober',
        //     'November',
        //     'Desember'
        // );
        // //array hari senin-sabtu
        // $days = array (
        //     0 =>   'Minggu',
        //     'Senin',
        //     'Selasa',
        //     'Rabu',
        //     'Kamis',
        //     "Jum'at",
        //     'Sabtu'
        // );

        // $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        // $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        // $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        // $hari = $days[$hari];
        // $pecahkan = explode('-',$tanggalbaru);
        // $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        // $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        // $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        // $value = $tanggalindo.' '.$jamwit;
        // $value = $jam;
        // return $value;


    // }

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

    public function getTanggalAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
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
    public function mercally()
    {
        return $this->hasMany('App\Models\Mercally');
    }
}
