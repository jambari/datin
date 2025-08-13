<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // Add this line
use App\Http\Controllers\Api\EarthquakeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/earthquakes', [EarthquakeController::class, 'index']);