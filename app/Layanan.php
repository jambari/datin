<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    
    protected $fillable = ['nama', 'instansi', 'alamat', 'email','handphone', 'jenis_data', 'surat', 'status'];



	// public function setSuratAttribute($value)
	//     {
	//         $attribute_name = "file";
	//         $disk = "public";
	//         $destination_path = "/uploads";

	//         $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
	//     }
}
