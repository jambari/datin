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
use App\Models\Article;


class HomeController extends Controller
{
    
	public function index() 
	{
		
		$gempa = Gempa::orderBy('id', 'DESC')->first();
		$kindeks = Kindek::latest()->first();
		$articles = Article::take(5)->get();

		$datas = [
			// 'terasa' => $terasa,
			// 'tidakterasa' => $tidakterasa,
			'gempa' => $gempa,
			'kindeks' => $kindeks,
			'articles' => $articles
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