<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gempa;
use App\Models\Balaigempa;
use App\Models\Gempasorong;
use App\Models\Gempanabire;
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
                $sumber = 'Stasiun Geofisika Jayapura';
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
                $sumber = 'PGR 5';
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
                $sumber = 'Stasiun Geofisika Sorong';
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
                $sumber = 'Stasiun Geofisika Nabire';
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
}
