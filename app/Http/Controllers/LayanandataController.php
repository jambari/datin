<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;


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

    //Alur Pelayanan
    public function alur()
    {
        return view('layanans.alur');
    }

    //Daftar Permohonan
    public function daftar()
    {
        $permohonans = Layanan::latest()->paginate(10);
        return view('layanans.daftar',compact('permohonans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Permintaan magang
    public function formulir($id)
    {
    	if ($id ==1) {
    		$jenisdata = "Peta Kegempaan";
    		$jpg = "kegempaan.jpg";
    	} elseif ($id == 2) {
    		$jenisdata = "Peta Tingkat Kerawanan Petir";
    		$jpg = "kerawananpetir.jpg";
    	} elseif ($id == 3) {
    		$jenisdata = "Waktu Terbit dan Terbenam Matahari atau Bulan";
    		$jpg = "terbit.jpg";
    	} elseif ($id == 4) {
    		$jenisdata = "Peta Kejadian Petir";
    		$jpg = "petirharian.jpg";
    	} elseif ($id == 5) {
    		$jenisdata = "Teropong Rukyat (low grade)";
    		$jpg = "page06.jpg";
    	} elseif ($id == 6) {
    		$jenisdata = "Digital Portable Short Period Seismograph";
    		$jpg = "page07.jpg";
    	} elseif ($id == 7) {
    		$jenisdata = "Buku dan Peta Variasi Magnetbumi (EPOCH)";
    		$jpg = "epoch.jpeg";
    	}else {
    		$jenisdata = "Deklinasi dan Inklinasi Magnetometer";
    		$jpg = "page08.jpg";
    	}
    	return view('layanans.formulir')->with(compact('jenisdata', 'jpg'));
    }

}
