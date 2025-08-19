<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hujan;
use App\Http\Resources\HujanResource;
use Carbon\Carbon; // Make sure to import Carbon

class HujanController extends Controller
{
    // Ambil semua data hujan
    public function index()
    {
        return HujanResource::collection(Hujan::orderBy('tanggal', 'asc')->get());
    }

    // Ambil detail data hujan by id
    public function yesterday()
    {


        $hujan = Hujan::whereDate('tanggal', Carbon::yesterday())->get();

        return HujanResource::collection($hujan);
    }
}

