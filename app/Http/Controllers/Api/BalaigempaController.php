<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balaigempa; // 1. Change this line
use App\Http\Resources\BalaigempaResource;
use Carbon\Carbon;

class BalaigempaController extends Controller
{
    public function index()
    {
        // 2. And change this line to use the new model
        $earthquakes = Balaigempa::all();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => BalaigempaResource::collection($earthquakes)
        ]);
    }

    public function yesterday()
    {

        $earthquakes = Balaigempa::whereDate('tanggal', Carbon::yesterday())->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => BalaigempaResource::collection($earthquakes)
        ]);
    }
}




