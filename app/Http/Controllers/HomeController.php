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
use App\Models\Bulletin;


class HomeController extends Controller
{

	public function index()
	{

		$gempas = Gempa::orderBy('id','desc')->first();
		$articles = Article::take(8)->orderBy('id','desc')->get();
		$galleries = Article::take(8)->orderBy('id','desc')->get();
		$pengumuman = Pengumuman::orderBy('id','desc')->first();
		$sms = Infogempa::orderBy('id','desc')->first();
		$siarans = Siaran::take(3)->orderBy('id','desc')->get();
        $bulletin = Bulletin::orderBy('id','desc')->first();

		$datas = [
			// 'terasa' => $terasa,
			// 'tidakterasa' => $tidakterasa,
			'gempas' => $gempas,
			'articles' => $articles,
			'galleries' => $galleries,
			'pengumuman' => $pengumuman,
			'siarans' => $siarans,
			'sms' => $sms,
            'bulletin' => $bulletin,
        ];

    	return view('welcome', compact('datas'));
	}

    //recent earthquakes tables
    public function terkini() {
        $gempas = Gempa::take(60)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        return view('gempa.terkini',compact('gempas'));
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

    //Tentang Kami

    public function about () {
        return view('abouts.about');
    }

    // chart
    public function charts () {
        $Mbelowthree = Gempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mthreefive = Gempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mabovefive = Gempa::where('magnitudo','>=', 5)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //depth\
        $Dshallow = Gempa::where('depth','<', 70)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mverydeep = Gempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        $aindeks = Kindek::select(['tanggal','aindex'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $kindeks = Kindek::latest()->first();
        //Hujan
        $hujans = Hujan::select(['tanggal','obs'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $datas = [
            'Mbelowthree' => $Mbelowthree,
            'Mthreefive' => $Mthreefive,
            'Mabovefive' => $Mabovefive,
            'Dshallow' => $Dshallow,
            'Dmediate'  => $Mmediate,
            'Dverydeep' => $Mverydeep,
            'aindeks' => $aindeks,
            'kindeks' => $kindeks,
            'hujans' => $hujans,
        ];
    	return view('charts.index', compact('datas')); 
    }
}