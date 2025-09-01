<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // Add this line
use App\Http\Controllers\Api\EarthquakeController;
use App\Http\Controllers\Api\BalaigempaController;
use App\Http\Controllers\Api\AngkasagempaController;
use App\Http\Controllers\Api\SoronggempaController;
use App\Http\Controllers\Api\NabiregempaController;
use App\Http\Controllers\Api\HujanController;
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
Route::get('/data/balaigempas', [BalaigempaController::class, 'index']);
Route::get('/data/yesterday/balaigempas', [BalaigempaController::class, 'yesterday']);

// Gempa Angkasa

Route::get('/data/angkasagempas', [AngkasagempaController::class, 'index']);
Route::get('/data/yesterday/angkasagempas', [AngkasagempaController::class, 'yesterday']);

//sorong
Route::get('/data/soronggempas', [SoronggempaController::class, 'index']);
Route::get('/data/yesterday/soronggempas', [SoronggempaController::class, 'yesterday']);

//nabire
Route::get('/data/nabiregempas', [NabiregempaController::class, 'index']);
Route::get('/data/yesterday/nabiregempas', [NabiregempaController::class, 'yesterday']);    

//hujan
Route::get('/data/hujans', [HujanController::class, 'index']);
Route::get('/data/yesterday/hujans', [HujanController::class, 'yesterday']);

// for shakemap
Route::get('/angkasa/forshakemap', [AngkasagempaController::class, 'forshakemap']);
Route::get('/nabire/forshakemap', [AngkasagempaController::class, 'forshakemap']);
Route::get('/sorong/forshakemap', [SoronggempaController::class, 'forshakemap']);
