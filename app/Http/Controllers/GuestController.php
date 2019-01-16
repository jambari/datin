<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGuestRequest as StoreRequest;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    // Buku Tamu home
    public function index () {
        return view('guests.guestmain');
    }

    public function tambah() {
        return view('guests.form');
    }

    public function storeTamu(StoreRequest $request) {
        $nama = $request->input('nama');
        $dari = $request->input('dari');
        $keperluan = $request->input('keperluan');
        $keterangan = $request->input('keterangan');
        $foto = $request->input('foto');
        Session::flash('success', 'Data berhasil ditambahkan'); 
        $haha = 'satu.png';
        return redirect('/bukutamu')->with(compact('haha'));
    }
}
