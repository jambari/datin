<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gempasorong; // 1. Change this line
use App\Http\Resources\SoronggempaResource;
use Carbon\Carbon;

class SoronggempaController extends Controller
{
    public function index()
    {
        // 2. And change this line to use the new model
        $earthquakes = Gempasorong::all();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => SoronggempaResource::collection($earthquakes)
        ]);
    }

    public function yesterday()
    {

        $earthquakes = Gempasorong::whereDate('tanggal', Carbon::yesterday())->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => SoronggempaResource::collection($earthquakes)
        ]);
    }
}




