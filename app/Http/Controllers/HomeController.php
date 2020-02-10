<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
use App\Models\Magnet;


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
        $last = Gempa::orderBy('id','desc')->first();
        return view('gempa.recentmap', compact('eqs','last'));
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
        $Dmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dverydeep = Gempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        $aindeks = Kindek::select(['tanggal','aindex'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $kindeks = Kindek::orderBy('id','desc')->first();
        //Hujan
        $hujans = Hujan::select(['tanggal','obs'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Magnetbumi chart
        $datas = [
            'Mbelowthree' => $Mbelowthree,
            'Mthreefive' => $Mthreefive,
            'Mabovefive' => $Mabovefive,
            'Dshallow' => $Dshallow,
            'Dmediate'  => $Dmediate,
            'Dverydeep' => $Dverydeep,
            'aindeks' => $aindeks,
            'kindeks' => $kindeks,
            'hujans' => $hujans,
        ];
        return view('charts.index', compact('datas'));
    }

    //Magnetbumi Page
    public function magnet() {
        $date_raw = date("r");
        $tanggal = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
        $tahun =date('Y', strtotime($tanggal));
        $bulan =date('m', strtotime($tanggal));
        $hari = date('d', strtotime($tanggal));
        $magnets = Magnet::select()->where('tanggal', $tanggal)->get();
        return view('magnets.dailychart', compact('magnets', 'tanggal'));
    }

    public function simimi ()
    {
        $eqs = \App\Models\Gempa::take(30)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        $neweqs = array();
        foreach ($eqs as $eq) {
            $tanggal = $eq['tanggal']; //get date of the eathquake
            $jam = $eq['origin']; // get origin time of eq
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            //array hari senin-sabtu
            $days = array (
                0 =>   'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                "Jum'at",
                'Sabtu'
            );

            $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
            $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
            $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
            $selisih = ($jamnya+ 9) - 24;
            if ($selisih >=0) {
               $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
            }
            $hari = $days[$hari];
            $pecahkan = explode('-',$tanggalbaru);
            $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
            $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
            $value = $tanggalindo.' '.$jamwit;
            $eq['origin'] = $value;
        }

        $last = \App\Models\Balaigempa::orderBy('id','desc')->first();
        return view('gempa.simimi', compact('eqs','last'));
    }

    //Search eq statistik
    public function searcheq (Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        if($start != "" and $start < $end ){
        // m < 3 and depth < 70 icon small red
        $eq1s = Gempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->where('depth', '<=', 70)->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth < 70 icon small red
        $eq2s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->where('depth', '<=', 70)->where('terasa', '=',0)->get();
        // m >= 5 and depth < 70 icon small red
        $eq3s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->where('depth', '<=', 70)->where('terasa', '=',0)->get();

        // depth 70-300

        $eq4s = Gempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->whereBetween('depth', [71, 300])->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth 71-300 icon small red
        $eq5s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->whereBetween('depth', [71, 300])->where('terasa', '=',0)->get();
        // m >= 5 and depth 71-300 icon small red
        $eq6s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->whereBetween('depth', [71, 300])->where('terasa', '=',0)->get();

        // depth > 300

        $eq7s = Gempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->where('depth', '>', 300)->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth 71-300 icon small red
        $eq8s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->where('depth', '>', 300)->where('terasa', '=',0)->get();
        // m >= 5 and depth 71-300 icon small red
        $eq9s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->where('depth', '>', 300)->where('terasa', '=',0)->get();

        $felts = Gempa::whereBetween('tanggal', [$start, $end])->where('terasa', '=',1)->get();


        $Mbelowthree = Gempa::where('magnitudo','<', 3)
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Mthreefive = Gempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Mabovefive = Gempa::where('magnitudo','>=', 5)
                    ->whereBetween('tanggal', [$start, $end])->count();

        //depth\
        $Dshallow = Gempa::where('depth','<', 70)
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dverydeep = Gempa::where('depth','>=', 300)
                    ->whereBetween('tanggal', [$start, $end])->count();

        Session::flash('info', 'Data Gempabumi Periode '.$start.' s.d '.$end); 
        return view ( 'gempa.searchresult' )->with(compact('start', 'end', 'eq1s', 'eq2s', 'eq3s', 'eq4s', 'eq5s', 'eq6s', 'eq7s', 'eq8s', 'eq9s', 'felts', 'Mbelowthree', 'Mthreefive', 'Mabovefive', 'Dshallow', 'Dmediate', 'Dverydeep'));
        }
    }
}