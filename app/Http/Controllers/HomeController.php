<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
use App\Models\Pengumuman;
use App\Models\Siaran;


class HomeController extends Controller
{
    
	public function index() 
	{
		
		$gempas = Gempa::take(3)->orderBy('id','desc')->get();
		$articles = Article::take(5)->orderBy('id','desc')->get();
		$galleries = Article::take(8)->orderBy('id','desc')->get();
		$pengumumans = Gempa::orderBy('id','desc')->first();
		$siarans = Siaran::take(3)->orderBy('id','desc')->get();

		$datas = [
			// 'terasa' => $terasa,
			// 'tidakterasa' => $tidakterasa,
			'gempas' => $gempas,
			'articles' => $articles,
			'galleries' => $galleries,
			'pengumumans' => $pengumumans,
			'siarans' => $siarans
        ];

    	return view('welcome', compact('datas'));
	}

    //recent earthquakes tables
    public function terkini() {
        $date = \Carbon\Carbon::today()->subDays(7);//get last 7 day record order by datetime
        $gempas = Gempa::where('created_at', '>=', $date)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->paginate(10);
        return view('gempa.terkini',compact('gempas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    //recent eq map
    public function recentmap() {
        $eqs = Gempa::take(60)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        return view('gempa.recentmap', compact('eqs'));
    }

    //Statistik eq map
    public function statistik() {
        $gempa = Gempa::orderBy('id', 'DESC')->first();
        $Mbelowthree = Gempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mthreefive = Gempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mabovefive = Gempa::where('magnitudo','>=', 5)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //depth\
        $Dshallow = Gempa::where('depth','<', 70)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dverydeep = Gempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        return view('gempa.statistik', compact('gempa', 'Mbelowthree', 'Mthreefive', 'Mabovefive',
        	'Dshallow', 'Dmediate', 'Dverydeep'
    ));
    }
}