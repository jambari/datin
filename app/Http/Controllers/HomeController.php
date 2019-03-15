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
		
		$gempas = Gempa::take(3)->orderBy('id','desc')->get();
		$articles = Article::take(5)->orderBy('id','desc')->get();
		$galleries = Article::take(8)->orderBy('id','desc')->get();

		$datas = [
			// 'terasa' => $terasa,
			// 'tidakterasa' => $tidakterasa,
			'gempas' => $gempas,
			'articles' => $articles,
			'galleries' => $galleries,
        ];

    	return view('welcome', compact('datas'));
	}

}