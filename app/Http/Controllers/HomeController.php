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
use App\Models\Petir;
use App\Models\Queryld;
use DatePeriod;
use DateTime;
use DateInterval;

class HomeController extends Controller
{

    public function index()
    {

        $gempas = Gempa::orderBy('id','desc')->first();
        $articles = Article::take(8)->where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('id','desc')->get();
        $galleries = Article::take(3)->where('category_id','=', 10)->orderBy('id','desc')->get();
        $pengumuman = Pengumuman::orderBy('id','desc')->first();
        $sms = Infogempa::orderBy('id','desc')->first();
        $siarans = Siaran::take(3)->orderBy('id','desc')->get();
        $bulletin = Bulletin::orderBy('id','desc')->first();
        $kegempaans = Article::take(3)->where('category_id', 8)->orderBy('id','desc')->get();

        //INFO GEMPA DI DEPAN

        //Penanggalan
        //array bulan
        $event = $gempas;
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

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
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
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }

        //'lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms'

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
            'lat' => $lat,
            'lon' => $lon,
            'mag' => $mag,
            'depth' => $depth,
            'event' => $event,
            'tanggalindo' => $tanggalindo,
            'hari' => $hari,
            'jamwit' => $jamwit,
            'tanggalindosms' => $tanggalindosms,
            'kegempaans' => $kegempaans
        ];

        return view('welcome', compact('datas'));
    }

    //recent earthquakes tables
    public function terkini() {
        $gempas = Gempa::take(10)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        foreach ($gempas as $eq) {
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
    //Search eq statistik
    public function searcheq (Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        if($start != "" and $start < $end ){
        // m < 3 and depth < 70 icon small red
        $eq1s = Gempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->where('depth', '<=', 60)->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth < 70 icon small red
        $eq2s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->where('depth', '<=', 60)->where('terasa', '=',0)->get();
        // m >= 5 and depth < 70 icon small red
        $eq3s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->where('depth', '<=', 60)->where('terasa', '=',0)->get();

        // depth 70-300

        $eq4s = Gempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth 71-300 icon small red
        $eq5s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();
        // m >= 5 and depth 71-300 icon small red
        $eq6s = Gempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();

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
        $Dshallow = Gempa::where('depth','<', 60)
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dmediate = Gempa::whereBetween('depth',[60, 249])
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dverydeep = Gempa::where('depth','>=', 300)
                    ->whereBetween('tanggal', [$start, $end])->count();

        Session::flash('info', 'Data Gempabumi Periode '.$start.' s.d '.$end); 
        return view ( 'gempa.searchresult' )->with(compact('start', 'end', 'eq1s', 'eq2s', 'eq3s', 'eq4s', 'eq5s', 'eq6s', 'eq7s', 'eq8s', 'eq9s', 'felts', 'Mbelowthree', 'Mthreefive', 'Mabovefive', 'Dshallow', 'Dmediate', 'Dverydeep'));
        }
    }
    //Tentang Kami

    public function about () {
        return view('abouts.about');
    }

    public function caripetir() {
        return view('petirs.caripetir');
    }

    public function querypetir(Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        if($start != "" and $start < $end ) {

        $intraclouds = Petir::where('type','=', 2)
                    ->whereBetween('tanggaljam', [$start, $end])->count();
        $cgpositives = Petir::where('type','=',0)
                    ->whereBetween('tanggaljam', [$start, $end])->count();
        $cgnegatives = Petir::where('type','=', 1)
                    ->whereBetween('tanggaljam', [$start, $end])->count();
        //plot ke peta
        $sambarans = Queryld::whereBetween('tanggaljam', [$start, $end])->get();
        $all = Queryld::whereBetween('tanggaljam', [$start, $end])->count();
        $alltanpaic = (int)$all-((int)$cgpositives+(int)$cgnegatives);
        //per sambaran per hari
        // sambaran tertinggi per hari
        // $tertinggi = DB::table('petirs')->select(
        //             DB::raw('DATE(tanggaljam) as date'), DB::raw('count(*) as harian'))
        //             ->groupBy('date')->get();


        // Queryld::select([
        //         // This aggregates the data and makes available a 'count' attribute
        //         DB::raw('count(id) as count'),
        //         // This throws away the timestamp portion of the date
        //         DB::raw('DATE(tanggaljam) as day')
        //         // Group these records according to that day
        //         ])->groupBy('day')->whereBetween('tanggaljam', [$start, $end])->get();
        //sambaran terendah per hari

        //rata-rata sambaran per hari
        $icdails =  Queryld::select([
                // This aggregates the data and makes available a 'count' attribute
                DB::raw('count(id) as count'),
                // This throws away the timestamp portion of the date
                DB::raw('DATE(tanggaljam) as day')
                // Group these records according to that day
                ])->groupBy('day')->where('type', '=',2)->whereBetween('tanggaljam', [$start, $end])->orderBy('day','ASC')->get();
        $cgplusdails =  Queryld::select([
                // This aggregates the data and makes available a 'count' attribute
                DB::raw('count(id) as count'),
                // This throws away the timestamp portion of the date
                DB::raw('DATE(tanggaljam) as day')
                // Group these records according to that day
                ])->groupBy('day')->where('type', '=',0)->whereBetween('tanggaljam', [$start, $end])->orderBy('day','ASC')->get();
        $cgminusdails = Queryld::select([
                // This aggregates the data and makes available a 'count' attribute
                DB::raw('count(id) as count'),
                // This throws away the timestamp portion of the date
                DB::raw('DATE(tanggaljam) as day')
                // Group these records according to that day
                ])->groupBy('day')->where('type', '=',1)->whereBetween('tanggaljam', [$start, $end])->orderBy('day','ASC')->get();
        Session::flash('info', 'Data Sambaran '.$start.' s.d '.$end); 
        return view('petirs.queryld')->with(compact('intraclouds','cgpositives', 'cgnegatives', 'sambarans', 'icdails', 'cgplusdails', 'cgminusdails', 'start', 'end','all','alltanpaic'));
        } else {

            Session::flash('warning', 'Tanggal awal harus lebih kecil dari tanggal akhir '); 
            return view('petirs.caripetir');
        }
        
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



    public function slideshow () {
        $articles = Article::take(8)->where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('id','desc')->get();
        return view('slideshow')->with(compact('articles'));
    }

}