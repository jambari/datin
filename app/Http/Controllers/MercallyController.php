<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MercallyRequest as StoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadTrait;
use App\Mercally;
use App\Models\Gempa;

class MercallyController extends Controller
{

	use UploadTrait;
	public function index () {
         // $mercallies = Mercally::latest()->paginate(6);
        return view('mercallies.index');
    }



    public function store(StoreRequest $request) {

        $requestData = $request->all();
 
        // if ($request->has('gambar')) {
        //     // Get image file
        //     $image = $request->file('gambar');
        //     // Make a image name based on user name and current timestamp
        //     $name = str_slug($request->input('gempabalai_id')).'_'.time();
        //     // Define folder path
        //     $folder = '/mmis/';
        //     // Make a file path where image will be stored [ folder path + file name + file extension]
        //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        //     // Upload image
        //     $this->uploadOne($image, $folder, 'public', $name);
        //     // Set user profile image path in database to filePath
        //     $mercally->profile_image = $filePath;
        // }

        $mercally = new Mercally;
        $mercally->nama = $request->input('nama');
        $mercally->lokasi = $request->input('lokasi');
        $mercally->gempabalai_id = $request->input('gempabalai_id');
        $mercally->mmi = $request->input('mmi');
        $mercally->lintang = $request->input('lintang');
        $mercally->bujur = $request->input('bujur');
        // $mercally->gambar = $namafoto;
        $mercally->save();
        Session::flash('success', 'Data berhasil ditambahkan');
        $id = $mercally->gempabalai_id;

		return redirect('/seismisitas/'.$id);
    }




    public function show(Mercally $mercally) {

    	$mmis = Mercally::where('gempabalai_id',$mercally)->get();
        $event = Gempa::find($mercally);

		return view('mercallies.show', compact('mmis','event'));
    }

    public function seismisitas($id) {

    	$mmis = Mercally::where('gempabalai_id',$id)->get();
        $event = Gempa::find($id);

		return view('mercallies.show', compact('mmis','event'));
    }

    public function create(Mercally $mercally) {
        return view('gempa.simimi');
    }


    public function edit(Mercally $mercally) {
        return view('mercallies.edit',compact('guest'));
    }

    public function destroy(Mercally $mercally) {

    }
}
