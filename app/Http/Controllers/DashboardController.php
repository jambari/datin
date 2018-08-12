<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


//Models
use App\Models\Absolut;
use App\Models\Deklinasi;
use App\Models\Gempa;
use App\Models\Hujan;
use App\Models\Inklinasi;
use App\Models\Kah;
use App\Models\Kindek;
use App\Models\Spm;
use App\Models\Summary;

class DashboardController extends Controller
{
    public function index()
    {
    	$gempa = Gempa::latest()->first(); //get the latest record of earthquake
    	$date = new Date();
    	$month = date('m');
    	return view('vendor.backpack.base.dashboard')->with(compact('gempa'));
    }
}
