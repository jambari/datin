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
        //Gempa dari seiscomp Balai
        $Bgempa = Balaigempa::orderBy('id', 'DESC')->first();
        $BMbelowthree = Balaigempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Bthreefive = Balaigempa::whereBetween('magnitudo',[3, 4.9])
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
            'Bgempa' => $gempa,
            'BMbelowthree' => $Mbelowthree,
            'BMthreefive' => $Mthreefive,
            'BMabovefive' => $Mabovefive,
            'BDshallow' => $Dshallow,
            'BDmediate'  => $Mmediate,
            'BDverydeep' => $Mverydeep,
        ];
        return view('vendor.backpack.base.dashboard')->with(compact('data'));
    }
}
