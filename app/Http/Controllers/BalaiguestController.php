<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBalaiguestRequest as StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Balaiguest;
use Carbon\Carbon;

class BalaiguestController extends Controller
{
    // Buku Tamu home
    public function index () {
        $guests = Balaiguest::latest()->paginate(6);
        return view('balaiguests.index',compact('guests'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    //create
    public function create() {
        return view('balaiguests.create');
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
        $balaiguest = new Balaiguest;
        $balaiguest->nama = $request->input('nama');
        $balaiguest->dari = $request->input('dari');
        $balaiguest->dari = $request->input('dari');
        $balaiguest->keperluan = $request->input('keperluan');
        $balaiguest->keterangan = $request->input('keterangan');
        $balaiguest->foto = $namafoto;
        $balaiguest->save();
        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('balaiguests.index');

    }

    //show
    public function show(Balaiguest $guest) {

        return view('balaiguests.show',compact('guest'));
    }

    //edit
    public function edit(Balaiguest $guest) {

        return view('balaiguests.edit',compact('guest'));
    }

    //update
    public function update(StoreRequest $request, Balaiguest $guest) {

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
        return redirect()->route('balaiguests.index');
    }

    //destroy
    public function destroy(Balaiguest $guest) {
        $guest->delete();
        Session::flash('warning', 'Data berhasil dihapus');
        return redirect()->route('balaiguests.index');

    }

    //update entry

    public function search (Request $request) {
        $q = $request->input( 'q' );
        if($q != ""){
        $guests = Balaiguest::where( 'nama', 'LIKE', '%' . $q . '%' )->orWhere ( 'dari', 'LIKE', '%' . $q . '%' )->paginate (5);

        if (count ( $guests ) > 0)

	        Session::flash('info', 'Beberapa tamu yang mungkin anda cari !');
	        return view('balaiguests.searchresult',compact('guests'))
	            ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
        $guests = 0;
        Session::flash('warning', 'Tidak ada tamu yang anda cari !');
        return view ( 'balaiguests.searchresult' )->with(compact('guests'));
    	}
    }
}
