<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gempa;
use App\Models\Balaigempa;
use Carbon\Carbon;
use App\Models\Kindek;
use App\Models\Hujan;
use App\Models\Spm;
use App\Models\Kah;
use App\Models\Infogempa;
use App\Models\Logbook;


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
}
