<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gempanabire; // 1. Change this line
use App\Http\Resources\NabiregempaResource;
use Carbon\Carbon;

class NabiregempaController extends Controller
{
    public function index()
    {
        // 2. And change this line to use the new model
        $earthquakes = Gempanabire::all();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => NabiregempaResource::collection($earthquakes)
        ]);
    }

    public function yesterday()
    {

        $earthquakes = Gempanabire::whereDate('tanggal', Carbon::yesterday())->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => NabiregempaResource::collection($earthquakes)
        ]);
    }
}




