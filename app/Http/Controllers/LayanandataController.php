<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayanandataController extends Controller
{
    public function index()
    {
    	return view('layanans.landing');
    }


    //Permintaan Data dan Informasi
    public function data()
    {
    	return view('layanans.data');
    }
    //Permintaan Jasa
    public function jasa()
    {
    	return view('layanans.jasa');
    }

    //Permintaan tentang
    public function tentang()
    {
    	return view('layanans.tentang');
    }
    //Permintaan tarif
    public function tarif()
    {
    	return view('layanans.tarif');
    }
    //Permintaan magang
    public function magang()
    {
    	return view('layanans.magang');
    }
    //Permintaan magang
    public function gts()
    {
    	return view('layanans.gts');
    }

}
