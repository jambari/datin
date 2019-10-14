<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LayananRequest as StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Layanan;
use Carbon\Carbon;

class LayananController extends Controller
{
    public function store(StoreRequest $request) {
        // $requestData = $request->all();
 
        //     if(!empty($_POST['foto'])){
        //           $encoded_data = $_POST['foto'];
        //             $binary_data = base64_decode( $encoded_data );
 
        //             // save to server (beware of permissions // set ke 775 atau 777)
        //             $namafoto = uniqid().".png";
        //             //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
        //             Storage::disk('public')->put('photos'.'/'.$namafoto, $binary_data);
        //             //if (!$result) die("Could not save image!  Check file permissions.");
        //         }
        $file = $request->file('surat');
   
      // Mendapatkan Nama File
      	$nama_file = $file->getClientOriginalName();
   
      // Mendapatkan Extension File
      	$extension = $file->getClientOriginalExtension();
  
      // Mendapatkan Ukuran File
      	$ukuran_file = $file->getSize();
   
      // Proses Upload File
     	$destinationPath = 'uploads';
      	$file->move($destinationPath,$file->getClientOriginalName());
        $layanan = new Layanan;
        $layanan->nama = $request->input('nama');
        $layanan->instansi = $request->input('instansi');
        $layanan->alamat = $request->input('alamat');
        $layanan->email = $request->input('email');
        $layanan->handphone = $request->input('handphone');
        $layanan->jenis_data = $request->input('jenis_data');
        $layanan->surat = $file->getClientOriginalName();
        $layanan->save();
        // Session::flash('success', 'Data berhasil ditambahkan'); 
        return redirect('/layanandata/daftar');

    }
}
