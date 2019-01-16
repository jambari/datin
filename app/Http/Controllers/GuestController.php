<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    // Buku Tamu home
    public function index () {
        return view('guests.guestmain');
    }

    public function tambah() {
        return view('guests.form');
    }

    public function postTamu(Request $request) {

        return view('guests.guestmain')->with(['success' => 'Pesan Berhasil']);
    }
}
