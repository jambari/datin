<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
Use App\Infogempa;
class infobaruController extends Controller
{
    public function index () {
        // $infos = DB::table('infogempas')->all()->paginate(7);
        // return view('infos.index',compact('infos'))

        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        $infos = DB::table('infogempas')->all()->paginate(7);

    }

    public function peta () {
        $info = Infogempa::latest('id')->first();;
        return view('infos.show',compact('info'));

    }
}
