<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gempa;
use App\Models\Balaigempa;
use App\Models\Gempasorong;
use App\Models\Gempanabire;
use App\Models\Gempanganjuk;
use App\Models\Satudatagempa;
use Carbon\Carbon;
use App\Models\Kindek;
use App\Models\Hujan;
use App\Models\Spm;
use App\Models\Kah;
use App\Models\Infogempa;
use App\Models\Logbook;
use App\Models\Latency;
use App\Models\Availability;
use App\Sunrise;
use App\Models\Magnet;



class DashboardController extends Controller
{
    public function index()
    {
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
        $Mmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mverydeep = Gempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        $aindeks = Kindek::select(['tanggal','aindex'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $kindeks = Kindek::orderBy('id','desc')->first();
        //Hujan
        $hujans = Hujan::select(['tanggal','obs'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //darat

        $darat = Infogempa::where('sms','like', '%darat%')->count();
        //Laut
        $laut = Infogempa::where('sms','like', '%laut%')->count();
        //logbook
        $logbookJadwal = Logbook::orderBy('id', 'DESC')->first();
        $alif = Logbook::where('petugas', '=', 'alif')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $berlian = Logbook::where('petugas', '=', 'berlian')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $gogo = Logbook::where('petugas', '=', 'gogo')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $jambari = Logbook::where('petugas', '=', 'jambari')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $lidya = Logbook::where('petugas', '=', 'lidya')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $netty = Logbook::where('petugas','=','netty')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $prasetia = Logbook::where('petugas', '=', 'prasetia')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $purnama = Logbook::where('petugas', '=', 'purnama')
                ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //Gempa dari seiscomp Balai
        $Bgempa = Balaigempa::orderBy('id', 'DESC')->first();
        $BMbelowthree = Balaigempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $BMthreefive = Balaigempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $BMabovefive = Balaigempa::where('magnitudo','>=', 5)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //depth\
        $BDshallow = Balaigempa::where('depth','<', 70)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $BMmediate = Balaigempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $BMverydeep = Balaigempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $data = [
            'gempa' => $gempa,
            'Mbelowthree' => $Mbelowthree,
            'Mthreefive' => $Mthreefive,
            'Mabovefive' => $Mabovefive,
            'Dshallow' => $Dshallow,
            'Dmediate'  => $Mmediate,
            'Dverydeep' => $Mverydeep,
            'aindeks' => $aindeks,
            'kindeks' => $kindeks,
            'hujans' => $hujans,
            'darat' => $darat,
            'laut' => $laut,
            'Bgempa' => $Bgempa,
            'BMbelowthree' => $BMbelowthree,
            'BMthreefive' => $BMthreefive,
            'BMabovefive' => $BMabovefive,
            'BDshallow' => $BDshallow,
            'BDmediate'  => $BMmediate,
            'BDverydeep' => $BMverydeep,
            'logbookJadwal' => $logbookJadwal,
            'alif' => $alif,
            'berlian' => $berlian,
            'gogo' => $gogo,
            'jambari' => $jambari,
            'lidya' => $lidya,
            'netty' => $netty,
            'prasetia' => $prasetia,
            'purnama' => $purnama,
        ];
        return view('vendor.backpack.base.dashboard')->with(compact('data'));
    }

    public function latencyform () 
    {
        return view('monitorings.latencyform');

    }

    public function daily(Request $request)
    {
        $date = $request->tanggal;

        $latencies = Latency::whereDate('created_at', $date)
        ->select('site', DB::raw('AVG(latency) as average_latency'))
        ->groupBy('site', 'status')
        ->get();
        return view('monitorings.dailylatency')->with(compact('latencies'));
    }


    //Controler for lapbul dan buletin
    public function ttmform() {
        return view('lapbuls.terbit');
    }

    public function getttm(Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        $kota = $request->input('kota');

        if($start != "" and $start < $end ){
                $ttms = Sunrise::whereBetween('tanggal', [$start, $end])->where('kota', '=', $kota)->get();
                return view('lapbuls.getttm')->with(compact('ttms', 'kota'));
        }
    }

    public function sampelhujanform() {
        return view('lapbuls.sampel_hujan');
    }

    public function getsampelhujan(Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );

        if($start != "" and $start < $end ){
                $hujans = Hujan::whereBetween('tanggal', [$start, $start])->get();
                $totalObs = Hujan::whereBetween('tanggal', [$start, $end])->sum('obs');
                return view('lapbuls.resultsampelhujan')->with(compact('hujans', 'totalObs'));
        }
    }

    public function bahanbuletinhujan() {
        return view('lapbuls.bahanbuletinhujan');
    }

    public function getbahanbuletinhujan(Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );

        if($start != "" and $start < $end ){
            $carbonDate = Carbon::parse($start);

            $monthValue = $carbonDate->month;
            $year = $carbonDate->year;
            $hujans = Hujan::whereBetween('tanggal', [$start, $end])->get();
            $totalObs = Hujan::whereBetween('tanggal', [$start, $end])->sum('obs');
            $hujanMax = Hujan::selectRaw('MAX(CAST(Obs AS UNSIGNED)) AS max_obs')
                        ->whereBetween('tanggal', [$start, $end])
                        ->where('Obs', '!=', '9999')
                        ->first();
            $maxObs = $hujanMax->max_obs;
            $tanggalMax = Hujan::whereBetween('tanggal', [$start, $end])
                    ->whereRaw('CAST(obs AS UNSIGNED) = ?', [$maxObs])
                    ->first();
            $hariHujan = Hujan::where('obs', '!=', '0') // Compare as strings
                            ->where('obs', '!=', '9999') // Compare as strings
                            ->whereBetween('tanggal', [$start, $end]) // Adjust date range
                            ->count();

            $rainRecords = Hujan::whereBetween('tanggal', [$start, $end])
                ->where('obs', '!=', 9999)
                ->selectRaw('kategori, SUM(obs) as total_amount')
                ->groupBy('kategori')
                ->get();
                            
            return view('lapbuls.resultbahanbuletinhujan')->with(compact('hujans', 'totalObs', 'maxObs'
                        , 'hariHujan', 'tanggalMax', 'year','monthValue', 'rainRecords'));
        }
    }

    //Bahan lapbul gempa
    public function bahanlapbulgempa() {
        return view('lapbuls.bahanlapbulgempa');
    }
    public function getbahanlapbulgempa(Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        $sumber = $request->input('sumber');
        $minlat = (float) $request->input('minlat');
        $maxlat = (float) $request->input('maxlat');
        $minlon = (float) $request->input('minlon');
        $maxlon = (float) $request->input('maxlon');
        $mindepth = (float) $request->input('mindepth');
        $maxdepth = (float) $request->input('maxdepth');

        if($start != "" and $start < $end ){
            if($sumber=='1'){
                $sumber = 'STASIUN GEOFISIKA JAYAPURA';
                $events = Gempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->get();
                $totalevents = $events->count();
                $feltevents = Gempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Gempa::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Mthreefive = Gempa::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Mabovefive = Gempa::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();

                //depth\
                $Dshallow = Gempa::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Dmediate = Gempa::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Dverydeep = Gempa::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();


                //Jumlah gempabumi per hari berdasarkan magnitudo
                $dailyevents = Gempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, 
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                             // Hitung per hari
                $eventCounts = Gempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->selectRaw('tanggal, COUNT(*) as event_count')
                            ->groupBy('tanggal')
                            ->orderBy('tanggal')
                            ->get();
               
                $felts = Gempa::whereBetween('tanggal', [$start, $end])->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')
                        ->whereBetween('lintang', [$minlat, $maxlat])
                        ->whereBetween('bujur', [$minlon, $maxlon])
                        ->whereBetween('depth', [$mindepth, $maxdepth])
                        ->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));



            } elseif($sumber=='2'){
                $sumber = 'PUSAT GEMPABUMI REGIONAL V';
                $events = Balaigempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])->get();
                $totalevents = $events->count();
                $feltevents = Balaigempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->whereNotNull('terdampak')
                ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Balaigempa::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Mthreefive = Balaigempa::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mabovefive = Balaigempa::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                //depth\
                $Dshallow = Balaigempa::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dmediate = Balaigempa::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dverydeep = Balaigempa::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                $dailyevents = Balaigempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, 
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                $eventCounts = Balaigempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->selectRaw('tanggal, COUNT(*) as event_count')
                            ->groupBy('tanggal')
                            ->orderBy('tanggal')
                            ->get();
                $felts = Balaigempa::whereBetween('tanggal', [$start, $end])->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')
                        ->whereBetween('lintang', [$minlat, $maxlat])
                        ->whereBetween('bujur', [$minlon, $maxlon])
                        ->whereBetween('depth', [$mindepth, $maxdepth])
                        ->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));
            } elseif($sumber=='3') {
                $sumber = 'STASIUN GEOFISIKA SORONG';
                $events = Gempasorong::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])->get();
                $totalevents = $events->count();
                $feltevents = Gempasorong::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->whereNotNull('terdampak')
                ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Gempasorong::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mthreefive = Gempasorong::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mabovefive = Gempasorong::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                //depth\
                $Dshallow = Gempasorong::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dmediate = Gempasorong::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dverydeep = Gempasorong::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                $dailyevents = Gempasorong::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal,  
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                        $eventCounts = Gempasorong::whereBetween('tanggal', [$start, $end])
                             ->whereBetween('lintang', [$minlat, $maxlat])
                             ->whereBetween('bujur', [$minlon, $maxlon])
                             ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, COUNT(*) as event_count')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();
                         
                $felts = Gempasorong::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->whereNotNull('terdampak')
                            ->where('terdampak', '<>', '')->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));                
            } elseif($sumber=='4'){
                $sumber = 'STASIUN GEOFISIKA NABIRE';
                $events = Gempanabire::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->get();
                $totalevents = $events->count();
                $feltevents = Gempanabire::whereBetween('tanggal', [$start, $end])
                        ->whereBetween('lintang', [$minlat, $maxlat])
                        ->whereBetween('bujur', [$minlon, $maxlon])
                        ->whereBetween('depth', [$mindepth, $maxdepth])
                        ->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Gempanabire::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mthreefive = Gempanabire::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Mabovefive = Gempanabire::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                //depth\
                $Dshallow = Gempanabire::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dmediate = Gempanabire::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dverydeep = Gempanabire::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                $dailyevents = Gempanabire::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, 
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                $eventCounts = Gempanabire::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->selectRaw('tanggal, COUNT(*) as event_count')
                            ->groupBy('tanggal')
                            ->orderBy('tanggal')
                            ->get();
                $felts = Gempanabire::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->whereNotNull('terdampak')
                            ->where('terdampak', '<>', '')->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));                  
            } elseif($sumber=='6'){
                $sumber = 'STASIUN GEOFISIKA NGANJUK';
                $events = Gempanganjuk::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])
                ->get();
                $totalevents = $events->count();
                $feltevents = Gempanganjuk::whereBetween('tanggal', [$start, $end])
                        ->whereBetween('lintang', [$minlat, $maxlat])
                        ->whereBetween('bujur', [$minlon, $maxlon])
                        ->whereBetween('depth', [$mindepth, $maxdepth])
                        ->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Gempanganjuk::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mthreefive = Gempanganjuk::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->count();
                $Mabovefive = Gempanganjuk::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                //depth\
                $Dshallow = Gempanganjuk::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dmediate = Gempanganjuk::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dverydeep = Gempanganjuk::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                $dailyevents = Gempanganjuk::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, 
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                $eventCounts = Gempanganjuk::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->selectRaw('tanggal, COUNT(*) as event_count')
                            ->groupBy('tanggal')
                            ->orderBy('tanggal')
                            ->get();
                $felts = Gempanganjuk::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->whereNotNull('terdampak')
                            ->where('terdampak', '<>', '')->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));                  
            } else {
                $sumber = 'Satu Data Gempa';
                $events = Satudatagempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])->get();
                $totalevents = $events->count();
                $feltevents = Satudatagempa::whereBetween('tanggal', [$start, $end])
                ->whereBetween('lintang', [$minlat, $maxlat])
                ->whereBetween('bujur', [$minlon, $maxlon])
                ->whereBetween('depth', [$mindepth, $maxdepth])->whereNotNull('terdampak')
                        ->where('terdampak', '<>', '')->count();

                $Mbelowthree = Satudatagempa::where('magnitudo','<', 3)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mthreefive = Satudatagempa::whereBetween('magnitudo',[3, 4.9])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Mabovefive = Satudatagempa::where('magnitudo','>=', 5)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                //depth\
                $Dshallow = Satudatagempa::where('depth','<', 60)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dmediate = Satudatagempa::whereBetween('depth',[60, 249])
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();
                $Dverydeep = Satudatagempa::where('depth','>=', 300)
                            ->whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])->count();

                $dailyevents = Satudatagempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                             ->selectRaw('tanggal, 
                                 SUM(CASE WHEN magnitudo < 3 THEN 1 ELSE 0 END) as mag_below_3,
                                 SUM(CASE WHEN magnitudo >= 3 AND magnitudo < 5 THEN 1 ELSE 0 END) as mag_3_to_5,
                                 SUM(CASE WHEN magnitudo >= 5 THEN 1 ELSE 0 END) as mag_above_5,
                                 SUM(CASE WHEN depth < 60 THEN 1 ELSE 0 END) as depth_below_60,
                                 SUM(CASE WHEN depth >= 60 AND depth < 300 THEN 1 ELSE 0 END) as depth_60_to_300,
                                 SUM(CASE WHEN depth >= 300 THEN 1 ELSE 0 END) as depth_above_300,
                                 SUM(CASE WHEN terdampak IS NOT NULL THEN 1 ELSE 0 END) as felt_events,
                                 SUM(CASE WHEN terdampak IS NULL THEN 1 ELSE 0 END) as not_felt_events')
                             ->groupBy('tanggal')
                             ->orderBy('tanggal')
                             ->get();

                $eventCounts = Satudatagempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->selectRaw('tanggal, COUNT(*) as event_count')
                            ->groupBy('tanggal')
                            ->orderBy('tanggal')
                            ->get();
                $felts = Satudatagempa::whereBetween('tanggal', [$start, $end])
                            ->whereBetween('lintang', [$minlat, $maxlat])
                            ->whereBetween('bujur', [$minlon, $maxlon])
                            ->whereBetween('depth', [$mindepth, $maxdepth])
                            ->whereNotNull('terdampak')
                                    ->where('terdampak', '<>', '')->get();
                return view('lapbuls.resultbahanbuletingempa')->with(compact('start','end',
                'totalevents','feltevents','sumber','Mbelowthree','Mthreefive','Mabovefive',
                'Dshallow','Dmediate','Dverydeep','dailyevents','eventCounts','felts','events'));                 
            }
            
        }
    }

    public function nyusahin() {
        return view('monitorings.nyusahin');
    }

    public function absolut() {
        return view('magnets.absolut');
    }

    public function variasi(Request $request) {
        // Get user input for date range
        $start_date = $request->input('start'); 
        $end_date = $request->input('end'); 
    
        $kompxs = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompx END) AS kompx_00,
            MAX(CASE WHEN jam = 1 THEN kompx END) AS kompx_01,
            MAX(CASE WHEN jam = 2 THEN kompx END) AS kompx_02,
            MAX(CASE WHEN jam = 3 THEN kompx END) AS kompx_03,
            MAX(CASE WHEN jam = 4 THEN kompx END) AS kompx_04,
            MAX(CASE WHEN jam = 5 THEN kompx END) AS kompx_05,
            MAX(CASE WHEN jam = 6 THEN kompx END) AS kompx_06,
            MAX(CASE WHEN jam = 7 THEN kompx END) AS kompx_07,
            MAX(CASE WHEN jam = 8 THEN kompx END) AS kompx_08,
            MAX(CASE WHEN jam = 9 THEN kompx END) AS kompx_09,
            MAX(CASE WHEN jam = 10 THEN kompx END) AS kompx_10,
            MAX(CASE WHEN jam = 11 THEN kompx END) AS kompx_11,
            MAX(CASE WHEN jam = 12 THEN kompx END) AS kompx_12,
            MAX(CASE WHEN jam = 13 THEN kompx END) AS kompx_13,
            MAX(CASE WHEN jam = 14 THEN kompx END) AS kompx_14,
            MAX(CASE WHEN jam = 15 THEN kompx END) AS kompx_15,
            MAX(CASE WHEN jam = 16 THEN kompx END) AS kompx_16,
            MAX(CASE WHEN jam = 17 THEN kompx END) AS kompx_17,
            MAX(CASE WHEN jam = 18 THEN kompx END) AS kompx_18,
            MAX(CASE WHEN jam = 19 THEN kompx END) AS kompx_19,
            MAX(CASE WHEN jam = 20 THEN kompx END) AS kompx_20,
            MAX(CASE WHEN jam = 21 THEN kompx END) AS kompx_21,
            MAX(CASE WHEN jam = 22 THEN kompx END) AS kompx_22,
            MAX(CASE WHEN jam = 23 THEN kompx END) AS kompx_23,
            AVG(kompx) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $kompys = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompy END) AS kompy_00,
            MAX(CASE WHEN jam = 1 THEN kompy END) AS kompy_01,
            MAX(CASE WHEN jam = 2 THEN kompy END) AS kompy_02,
            MAX(CASE WHEN jam = 3 THEN kompy END) AS kompy_03,
            MAX(CASE WHEN jam = 4 THEN kompy END) AS kompy_04,
            MAX(CASE WHEN jam = 5 THEN kompy END) AS kompy_05,
            MAX(CASE WHEN jam = 6 THEN kompy END) AS kompy_06,
            MAX(CASE WHEN jam = 7 THEN kompy END) AS kompy_07,
            MAX(CASE WHEN jam = 8 THEN kompy END) AS kompy_08,
            MAX(CASE WHEN jam = 9 THEN kompy END) AS kompy_09,
            MAX(CASE WHEN jam = 10 THEN kompy END) AS kompy_10,
            MAX(CASE WHEN jam = 11 THEN kompy END) AS kompy_11,
            MAX(CASE WHEN jam = 12 THEN kompy END) AS kompy_12,
            MAX(CASE WHEN jam = 13 THEN kompy END) AS kompy_13,
            MAX(CASE WHEN jam = 14 THEN kompy END) AS kompy_14,
            MAX(CASE WHEN jam = 15 THEN kompy END) AS kompy_15,
            MAX(CASE WHEN jam = 16 THEN kompy END) AS kompy_16,
            MAX(CASE WHEN jam = 17 THEN kompy END) AS kompy_17,
            MAX(CASE WHEN jam = 18 THEN kompy END) AS kompy_18,
            MAX(CASE WHEN jam = 19 THEN kompy END) AS kompy_19,
            MAX(CASE WHEN jam = 20 THEN kompy END) AS kompy_20,
            MAX(CASE WHEN jam = 21 THEN kompy END) AS kompy_21,
            MAX(CASE WHEN jam = 22 THEN kompy END) AS kompy_22,
            MAX(CASE WHEN jam = 23 THEN kompy END) AS kompy_23,
            AVG(kompy) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $kompzs = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompz END) AS kompz_00,
            MAX(CASE WHEN jam = 1 THEN kompz END) AS kompz_01,
            MAX(CASE WHEN jam = 2 THEN kompz END) AS kompz_02,
            MAX(CASE WHEN jam = 3 THEN kompz END) AS kompz_03,
            MAX(CASE WHEN jam = 4 THEN kompz END) AS kompz_04,
            MAX(CASE WHEN jam = 5 THEN kompz END) AS kompz_05,
            MAX(CASE WHEN jam = 6 THEN kompz END) AS kompz_06,
            MAX(CASE WHEN jam = 7 THEN kompz END) AS kompz_07,
            MAX(CASE WHEN jam = 8 THEN kompz END) AS kompz_08,
            MAX(CASE WHEN jam = 9 THEN kompz END) AS kompz_09,
            MAX(CASE WHEN jam = 10 THEN kompz END) AS kompz_10,
            MAX(CASE WHEN jam = 11 THEN kompz END) AS kompz_11,
            MAX(CASE WHEN jam = 12 THEN kompz END) AS kompz_12,
            MAX(CASE WHEN jam = 13 THEN kompz END) AS kompz_13,
            MAX(CASE WHEN jam = 14 THEN kompz END) AS kompz_14,
            MAX(CASE WHEN jam = 15 THEN kompz END) AS kompz_15,
            MAX(CASE WHEN jam = 16 THEN kompz END) AS kompz_16,
            MAX(CASE WHEN jam = 17 THEN kompz END) AS kompz_17,
            MAX(CASE WHEN jam = 18 THEN kompz END) AS kompz_18,
            MAX(CASE WHEN jam = 19 THEN kompz END) AS kompz_19,
            MAX(CASE WHEN jam = 20 THEN kompz END) AS kompz_20,
            MAX(CASE WHEN jam = 21 THEN kompz END) AS kompz_21,
            MAX(CASE WHEN jam = 22 THEN kompz END) AS kompz_22,
            MAX(CASE WHEN jam = 23 THEN kompz END) AS kompz_23,
            AVG(kompz) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $komphs = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN komph END) AS komph_00,
            MAX(CASE WHEN jam = 1 THEN komph END) AS komph_01,
            MAX(CASE WHEN jam = 2 THEN komph END) AS komph_02,
            MAX(CASE WHEN jam = 3 THEN komph END) AS komph_03,
            MAX(CASE WHEN jam = 4 THEN komph END) AS komph_04,
            MAX(CASE WHEN jam = 5 THEN komph END) AS komph_05,
            MAX(CASE WHEN jam = 6 THEN komph END) AS komph_06,
            MAX(CASE WHEN jam = 7 THEN komph END) AS komph_07,
            MAX(CASE WHEN jam = 8 THEN komph END) AS komph_08,
            MAX(CASE WHEN jam = 9 THEN komph END) AS komph_09,
            MAX(CASE WHEN jam = 10 THEN komph END) AS komph_10,
            MAX(CASE WHEN jam = 11 THEN komph END) AS komph_11,
            MAX(CASE WHEN jam = 12 THEN komph END) AS komph_12,
            MAX(CASE WHEN jam = 13 THEN komph END) AS komph_13,
            MAX(CASE WHEN jam = 14 THEN komph END) AS komph_14,
            MAX(CASE WHEN jam = 15 THEN komph END) AS komph_15,
            MAX(CASE WHEN jam = 16 THEN komph END) AS komph_16,
            MAX(CASE WHEN jam = 17 THEN komph END) AS komph_17,
            MAX(CASE WHEN jam = 18 THEN komph END) AS komph_18,
            MAX(CASE WHEN jam = 19 THEN komph END) AS komph_19,
            MAX(CASE WHEN jam = 20 THEN komph END) AS komph_20,
            MAX(CASE WHEN jam = 21 THEN komph END) AS komph_21,
            MAX(CASE WHEN jam = 22 THEN komph END) AS komph_22,
            MAX(CASE WHEN jam = 23 THEN komph END) AS komph_23,
            AVG(komph) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $kompds = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompd END) AS kompd_00,
            MAX(CASE WHEN jam = 1 THEN kompd END) AS kompd_01,
            MAX(CASE WHEN jam = 2 THEN kompd END) AS kompd_02,
            MAX(CASE WHEN jam = 3 THEN kompd END) AS kompd_03,
            MAX(CASE WHEN jam = 4 THEN kompd END) AS kompd_04,
            MAX(CASE WHEN jam = 5 THEN kompd END) AS kompd_05,
            MAX(CASE WHEN jam = 6 THEN kompd END) AS kompd_06,
            MAX(CASE WHEN jam = 7 THEN kompd END) AS kompd_07,
            MAX(CASE WHEN jam = 8 THEN kompd END) AS kompd_08,
            MAX(CASE WHEN jam = 9 THEN kompd END) AS kompd_09,
            MAX(CASE WHEN jam = 10 THEN kompd END) AS kompd_10,
            MAX(CASE WHEN jam = 11 THEN kompd END) AS kompd_11,
            MAX(CASE WHEN jam = 12 THEN kompd END) AS kompd_12,
            MAX(CASE WHEN jam = 13 THEN kompd END) AS kompd_13,
            MAX(CASE WHEN jam = 14 THEN kompd END) AS kompd_14,
            MAX(CASE WHEN jam = 15 THEN kompd END) AS kompd_15,
            MAX(CASE WHEN jam = 16 THEN kompd END) AS kompd_16,
            MAX(CASE WHEN jam = 17 THEN kompd END) AS kompd_17,
            MAX(CASE WHEN jam = 18 THEN kompd END) AS kompd_18,
            MAX(CASE WHEN jam = 19 THEN kompd END) AS kompd_19,
            MAX(CASE WHEN jam = 20 THEN kompd END) AS kompd_20,
            MAX(CASE WHEN jam = 21 THEN kompd END) AS kompd_21,
            MAX(CASE WHEN jam = 22 THEN kompd END) AS kompd_22,
            MAX(CASE WHEN jam = 23 THEN kompd END) AS kompd_23,
            AVG(kompd) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $kompis = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompi END) AS kompi_00,
            MAX(CASE WHEN jam = 1 THEN kompi END) AS kompi_01,
            MAX(CASE WHEN jam = 2 THEN kompi END) AS kompi_02,
            MAX(CASE WHEN jam = 3 THEN kompi END) AS kompi_03,
            MAX(CASE WHEN jam = 4 THEN kompi END) AS kompi_04,
            MAX(CASE WHEN jam = 5 THEN kompi END) AS kompi_05,
            MAX(CASE WHEN jam = 6 THEN kompi END) AS kompi_06,
            MAX(CASE WHEN jam = 7 THEN kompi END) AS kompi_07,
            MAX(CASE WHEN jam = 8 THEN kompi END) AS kompi_08,
            MAX(CASE WHEN jam = 9 THEN kompi END) AS kompi_09,
            MAX(CASE WHEN jam = 10 THEN kompi END) AS kompi_10,
            MAX(CASE WHEN jam = 11 THEN kompi END) AS kompi_11,
            MAX(CASE WHEN jam = 12 THEN kompi END) AS kompi_12,
            MAX(CASE WHEN jam = 13 THEN kompi END) AS kompi_13,
            MAX(CASE WHEN jam = 14 THEN kompi END) AS kompi_14,
            MAX(CASE WHEN jam = 15 THEN kompi END) AS kompi_15,
            MAX(CASE WHEN jam = 16 THEN kompi END) AS kompi_16,
            MAX(CASE WHEN jam = 17 THEN kompi END) AS kompi_17,
            MAX(CASE WHEN jam = 18 THEN kompi END) AS kompi_18,
            MAX(CASE WHEN jam = 19 THEN kompi END) AS kompi_19,
            MAX(CASE WHEN jam = 20 THEN kompi END) AS kompi_20,
            MAX(CASE WHEN jam = 21 THEN kompi END) AS kompi_21,
            MAX(CASE WHEN jam = 22 THEN kompi END) AS kompi_22,
            MAX(CASE WHEN jam = 23 THEN kompi END) AS kompi_23,
            AVG(kompi) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();

        $kompfs = Magnet::selectRaw('tanggal, 
            MAX(CASE WHEN jam = 0 THEN kompf END) AS kompf_00,
            MAX(CASE WHEN jam = 1 THEN kompf END) AS kompf_01,
            MAX(CASE WHEN jam = 2 THEN kompf END) AS kompf_02,
            MAX(CASE WHEN jam = 3 THEN kompf END) AS kompf_03,
            MAX(CASE WHEN jam = 4 THEN kompf END) AS kompf_04,
            MAX(CASE WHEN jam = 5 THEN kompf END) AS kompf_05,
            MAX(CASE WHEN jam = 6 THEN kompf END) AS kompf_06,
            MAX(CASE WHEN jam = 7 THEN kompf END) AS kompf_07,
            MAX(CASE WHEN jam = 8 THEN kompf END) AS kompf_08,
            MAX(CASE WHEN jam = 9 THEN kompf END) AS kompf_09,
            MAX(CASE WHEN jam = 10 THEN kompf END) AS kompf_10,
            MAX(CASE WHEN jam = 11 THEN kompf END) AS kompf_11,
            MAX(CASE WHEN jam = 12 THEN kompf END) AS kompf_12,
            MAX(CASE WHEN jam = 13 THEN kompf END) AS kompf_13,
            MAX(CASE WHEN jam = 14 THEN kompf END) AS kompf_14,
            MAX(CASE WHEN jam = 15 THEN kompf END) AS kompf_15,
            MAX(CASE WHEN jam = 16 THEN kompf END) AS kompf_16,
            MAX(CASE WHEN jam = 17 THEN kompf END) AS kompf_17,
            MAX(CASE WHEN jam = 18 THEN kompf END) AS kompf_18,
            MAX(CASE WHEN jam = 19 THEN kompf END) AS kompf_19,
            MAX(CASE WHEN jam = 20 THEN kompf END) AS kompf_20,
            MAX(CASE WHEN jam = 21 THEN kompf END) AS kompf_21,
            MAX(CASE WHEN jam = 22 THEN kompf END) AS kompf_22,
            MAX(CASE WHEN jam = 23 THEN kompf END) AS kompf_23,
            AVG(kompf) AS daily_avg')
        ->whereBetween('tanggal', [$start_date, $end_date])
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();
    


        // Calculate daily averages, minimums, and maximums of each component
        $dailyStats = Magnet::selectRaw('
            tanggal, 
            AVG(kompx) as avg_kompx, MIN(kompx) as min_kompx, MAX(kompx) as max_kompx,
            AVG(kompy) as avg_kompy, MIN(kompy) as min_kompy, MAX(kompy) as max_kompy,
            AVG(kompz) as avg_kompz, MIN(kompz) as min_kompz, MAX(kompz) as max_kompz,
            AVG(komph) as avg_komph, MIN(komph) as min_komph, MAX(komph) as max_komph,
            AVG(kompf) as avg_kompf, MIN(kompf) as min_kompf, MAX(kompf) as max_kompf,
            AVG(kompd) as avg_kompd, MIN(kompd) as min_kompd, MAX(kompd) as max_kompd,
            AVG(kompi) as avg_kompi, MIN(kompi) as min_kompi, MAX(kompi) as max_kompi,
            (AVG(kompx) + AVG(kompy) + AVG(kompz) + AVG(komph) + AVG(kompf) + AVG(kompd) + AVG(kompi)) / 7 as overall_avg')
            ->whereBetween('tanggal', [$start_date, $end_date])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();
    
        return view('magnets.variasi', compact('dailyStats', 'start_date', 'end_date', 'kompxs', 'kompys', 'kompzs',
            'kompds','kompis','kompfs','komphs'));
    }
    
    
}
