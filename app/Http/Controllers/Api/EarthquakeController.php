<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balaigempa; // 1. Change this line
use App\Http\Resources\EarthquakeResource;

class EarthquakeController extends Controller
{
    public function index()
    {
        // 2. And change this line to use the new model
        $earthquakes = Balaigempa::orderBy('tanggal', 'desc')->take(50)->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => EarthquakeResource::collection($earthquakes)
        ]);
    }
}