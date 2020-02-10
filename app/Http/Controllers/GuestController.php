<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGuestRequest as StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Guest;
use Carbon\Carbon;

class GuestController extends Controller
{
    // Buku Tamu home
    public function index () {
        $guests = Guest::latest()->paginate(6);
        return view('guests.index',compact('guests'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    //create
    public function create() {
        return view('guests.create');
    }

    //store
    public function store(StoreRequest $request) {
        $requestData = $request->all();
 
            if(!empty($_POST['foto'])){
                  $encoded_data = $_POST['foto'];
                    $binary_data = base64_decode( $encoded_data );
 
                    // save to server (beware of permissions // set ke 775 atau 777)
                    $namafoto = uniqid().".png";
                    //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
                    Storage::disk('public')->put('photos'.'/'.$namafoto, $binary_data);
                    //if (!$result) die("Could not save image!  Check file permissions.");
                }
        $guest = new Guest;
        $guest->nama = $request->input('nama');
        $guest->dari = $request->input('dari');
        $guest->dari = $request->input('dari');
        $guest->keperluan = $request->input('keperluan');
        $guest->keterangan = $request->input('keterangan');
        $guest->foto = $namafoto;
        $guest->save();
        Session::flash('success', 'Data berhasil ditambahkan'); 
        return redirect()->route('guests.index');

    }

    //show
    public function show(Guest $guest) {

        return view('guests.show',compact('guest'));
    }

    //edit
    public function edit(Guest $guest) {

        return view('guests.edit',compact('guest'));
    }

    //update
    public function update(StoreRequest $request, Guest $guest) {

        $requestData = $request->all();
 
        //     if(!empty($_POST['foto'])){
        //           $encoded_data = $_POST['foto'];
        //             $binary_data = base64_decode( $encoded_data );
 
        //             // save to server (beware of permissions // set ke 775 atau 777)
        //             $namafoto = uniqid().".png";
        //             //$result = file_put_contents( 'uploads/'.$namafoto, $binary_data );
        //             Storage::disk('public')->put('photos'.'/'.$namafoto, $binary_data);
        //             //if (!$result) die("Could not save image!  Check file permissions.");
        //         }
        // // $guest = Guest;
        $guest->nama = $request->input('nama');
        $guest->dari = $request->input('dari');
        $guest->dari = $request->input('dari');
        $guest->keperluan = $request->input('keperluan');
        $guest->keterangan = $request->input('keterangan');
        $guest->foto = $request->input('foto');
        $guest->update();

        Session::flash('success', 'Data berhasil diupdate'); 
        return redirect()->route('guests.index');
    }

    //destroy
    public function destroy(Guest $guest) {
        $guest->delete();
        Session::flash('warning', 'Data berhasil dihapus'); 
        return redirect()->route('guests.index');

    }

    //update entry

    public function search (Request $request) {
        $q = $request->input( 'q' );
        if($q != ""){
        $guests = Guest::where( 'nama', 'LIKE', '%' . $q . '%' )->orWhere ( 'dari', 'LIKE', '%' . $q . '%' )->paginate (5);

        if (count ( $guests ) > 0)

	        Session::flash('info', 'Beberapa tamu yang mungkin anda cari !'); 
	        return view('guests.searchresult',compact('guests'))
	            ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
        $guests = 0;
        Session::flash('warning', 'Tidak ada tamu yang anda cari !'); 
        return view ( 'guests.searchresult' )->with(compact('guests'));
    	}
    }
}
