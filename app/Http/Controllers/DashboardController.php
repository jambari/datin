<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gempa;

class DashboardController extends Controller
{
    public function index()
    {
    	$gempa = Gempa::latest()->first();
    	return view('vendor.backpack.base.dashboard')->with(compact('gempa'));
    }
}
