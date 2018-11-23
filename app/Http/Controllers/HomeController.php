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

class HomeController extends Controller
{
    
	public function index() 
	{
		
		$terasa = Gempa::orderBy('id', 'desc')
		->whereBetween('lintang',[-8, 1])
		->whereBetween('bujur',[134,142])
		->where('terasa', '=',1)
		->orderBy('tanggal', 'desc')
		->take(60)->get();
		$tidakterasa = Gempa::orderBy('id', 'desc')
		->whereBetween('lintang',[-8, 1])
		->whereBetween('bujur',[134,142])
		->where('terasa', '=',0)
		->orderBy('tanggal', 'desc')
		->take(60)->get();

		$datas = [
			'terasa' => $terasa,
			'tidakterasa' => $tidakterasa,
        ];

    	return view('welcome')->with(compact('datas'));
	}

}