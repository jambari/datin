<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gempa; // 1. Change this line
use App\Http\Resources\AngkasagempaResource;
use Carbon\Carbon;

class AngkasagempaController extends Controller
{
    public function index()
    {
        // 2. And change this line to use the new model
        $earthquakes = Gempa::all();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => AngkasagempaResource::collection($earthquakes)
        ]);
    }

    public function yesterday()
    {

        $earthquakes = Gempa::whereDate('tanggal', Carbon::yesterday())->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => AngkasagempaResource::collection($earthquakes)
        ]);
    }
}




