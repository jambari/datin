<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Gempa;
use App\Models\Hujan;
use App\Models\Spm;
use App\Models\Kah;
use App\Models\Summary;
use App\Models\Kindek;
use App\Models\Deklinasi;
use App\Models\Inklinasi;
use App\Models\Infogempa;

class HomeController extends Controller
{
    
	public function index() 
	{
		
		// $terasa = Gempa::orderBy('id', 'desc')
		// ->whereBetween('lintang',[-8, 1])
		// ->whereBetween('bujur',[134,142])
		// // ->where('terasa', '=',1)
		// ->orderBy('tanggal', 'desc')
		// ->take(60)->get();
		// $tidakterasa = Gempa::orderBy('id', 'desc')
		// ->whereBetween('lintang',[-8, 1])
		// ->whereBetween('bujur',[134,142])
		// ->where('terasa', '=',0)
		// ->orderBy('tanggal', 'desc')
		// ->take(60)->get();
		$gempa = Gempa::orderBy('id', 'DESC')->first();
		$kindeks = Kindek::latest()->first();

		$datas = [
			// 'terasa' => $terasa,
			// 'tidakterasa' => $tidakterasa,
			'gempa' => $gempa,
			'kindeks' => $kindeks,
        ];

    	return view('welcome')->with(compact('datas'));
	}

	public function apigempa() {
		$gempa = Gempa::latest()->first();
		return response()->json($gempa);
	}
	public function apisms() {
		$sms = Infogempa::latest()->first();
		return response()->json($sms);
	}

}