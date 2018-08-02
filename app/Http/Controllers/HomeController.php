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
		
		$gempa = Gempa::latest();

		$event = DB::table('gempas')->latest()->first();

    	return view('welcome')->with(compact('gempa','event'));
	}

}
