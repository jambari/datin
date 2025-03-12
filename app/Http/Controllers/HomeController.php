<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Gempa;
use App\Models\Satudatagempa;
use App\Models\Hujan;
use App\Models\Spm;
use App\Models\Kah;
use App\Models\Summary;
use App\Models\Kindek;
use App\Models\Deklinasi;
use App\Models\Inklinasi;
use App\Models\Infogempa;
use App\Models\Article;
use App\Models\Balaigempa;
use App\Models\Significant;
use App\Models\Pengumuman;
use App\Models\Siaran;
use App\Models\Bulletin;
use App\Models\Magnet;
use App\Models\Petir;
use App\Models\Queryld;
use DatePeriod;
use DateTime;
use DateInterval;

use League\Csv\Reader;

class HomeController extends Controller
{

    public function index()
    {

        $gempas = Balaigempa::orderBy('id','desc')->first();
        $articles = Article::take(8)->where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('id','desc')->get();
        $galleries = Article::take(3)->where('category_id','=', 10)->orderBy('id','desc')->get();
        $pengumuman = Pengumuman::orderBy('id','desc')->first();
        $sms = Infogempa::orderBy('id','desc')->first();
        $siarans = Siaran::take(3)->orderBy('id','desc')->get();
        $bulletin = Bulletin::orderBy('id','desc')->first();
        $kegempaans = Article::take(3)->where('category_id', 8)->orderBy('id','desc')->get();

        //INFO GEMPA DI DEPAN

        //Penanggalan
        //array bulan
        $event = $gempas;
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }

        //'lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms'

        $datas = [
            // 'terasa' => $terasa,
            // 'tidakterasa' => $tidakterasa,
            'gempas' => $gempas,
            'articles' => $articles,
            'galleries' => $galleries,
            'pengumuman' => $pengumuman,
            'siarans' => $siarans,
            'sms' => $sms,
            'bulletin' => $bulletin,
            'lat' => $lat,
            'lon' => $lon,
            'mag' => $mag,
            'depth' => $depth,
            'event' => $event,
            'tanggalindo' => $tanggalindo,
            'hari' => $hari,
            'jamwit' => $jamwit,
            'tanggalindosms' => $tanggalindosms,
            'kegempaans' => $kegempaans
        ];

        return view('welcome', compact('datas'));
    }

    //recent earthquakes tables
    public function terkini() {
        $gempas = Gempa::take(10)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->paginate(10);
        foreach ($gempas as $eq) {
            $tanggal = $eq['tanggal']; //get date of the eathquake
            $jam = $eq['origin']; // get origin time of eq
            $id = $eq['id'];
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            //array hari senin-sabtu
            $days = array (
                0 =>   'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                "Jum'at",
                'Sabtu'
            );

            $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
            $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
            $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
            $selisih = ($jamnya+ 9) - 24;
            if ($selisih >=0) {
               $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
            }
            $hari = $days[$hari];
            $pecahkan = explode('-',$tanggalbaru);
            $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
            $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
            $value = $tanggalindo.' '.$jamwit;
            $eq['origin'] = $tanggalindo;
            $eq['narasi'] = $jamwit;


            $originTime = new DateTime(date("Y-m-d H:i:s", strtotime($tanggaljam)));
            $createdTime = new DateTime($eq['created_at']);
            $delta = $originTime->diff($createdTime);
            $hours = $delta->h;
            $minutes = $delta->i;
            $seconds = $delta->s;
            $totalMinutes = $delta->days * 24 * 60 + $delta->h * 60 + $delta->i;
            $ril = $hours.":".$minutes.":".$seconds;

            if ($totalMinutes <= 10) {
                $eq['type'] = $ril." ".'ONTIME';
                $value = $ril." ".'ONTIME';
                $selisih = Gempa::find($id);
                $selisih->delta = $value;
                $selisih->save();
            } else {
                $eq['type'] = $ril." ".'LATE';
                $value = $ril." ".'LATE';
                $selisih = Gempa::find($id);
                $selisih->delta = $value;
                $selisih->save();
            }
        }
        return view('gempa.terkini',compact('gempas'));
    }

    //recent eq map
    public function recentmap() {
        $eqs = Balaigempa::take(60)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        $last = Balaigempa::orderBy('id','desc')->first();
        return view('gempa.recentmap', compact('eqs','last'));
    }

    //Statistik eq map
    public function statistik() {
        $gempa = Balaigempa::orderBy('id', 'DESC')->first();
        $Mbelowthree = Balaigempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mthreefive = Balaigempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mabovefive = Balaigempa::where('magnitudo','>=', 5)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //depth\
        $Dshallow = Balaigempa::where('depth','<', 70)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dmediate = Balaigempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dverydeep = Balaigempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        return view('gempa.statistik', compact('gempa', 'Mbelowthree', 'Mthreefive', 'Mabovefive',
            'Dshallow', 'Dmediate', 'Dverydeep'
    ));
    }
    //Search eq statistik
    public function searcheq (Request $request) {
        $start = $request->input( 'start' );
        $end = $request->input( 'end' );
        if($start != "" and $start < $end ){
        // m < 3 and depth < 70 icon small red
        $eq1s = Balaigempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->where('depth', '<=', 60)->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth < 70 icon small red
        $eq2s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->where('depth', '<=', 60)->where('terasa', '=',0)->get();
        // m >= 5 and depth < 70 icon small red
        $eq3s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->where('depth', '<=', 60)->where('terasa', '=',0)->get();

        // depth 70-300

        $eq4s = Balaigempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth 71-300 icon small red
        $eq5s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();
        // m >= 5 and depth 71-300 icon small red
        $eq6s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->whereBetween('depth', [61, 300])->where('terasa', '=',0)->get();

        // depth > 300

        $eq7s = Balaigempa::whereBetween('tanggal', [$start, $end])->where('magnitudo', '<', 3)->where('depth', '>', 300)->where('terasa', '=',0)->get();
        // m betwen 3 to 5 and depth 71-300 icon small red
        $eq8s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [3, 4.9])->where('depth', '>', 300)->where('terasa', '=',0)->get();
        // m >= 5 and depth 71-300 icon small red
        $eq9s = Balaigempa::whereBetween('tanggal', [$start, $end])->whereBetween('magnitudo', [5, 10])->where('depth', '>', 300)->where('terasa', '=',0)->get();

        $felts = Balaigempa::whereBetween('tanggal', [$start, $end])->where('terasa', '=',1)->get();
        $feltfromsignficants = Significant::whereBetween('created_at', [$start, $end])->get();



        $Mbelowthree = Balaigempa::where('magnitudo','<', 3)
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Mthreefive = Balaigempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Mabovefive = Balaigempa::where('magnitudo','>=', 5)
                    ->whereBetween('tanggal', [$start, $end])->count();

        //depth\
        $Dshallow = Balaigempa::where('depth','<', 60)
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dmediate = Balaigempa::whereBetween('depth',[60, 249])
                    ->whereBetween('tanggal', [$start, $end])->count();
        $Dverydeep = Balaigempa::where('depth','>=', 300)
                    ->whereBetween('tanggal', [$start, $end])->count();

        Session::flash('info', 'Data Gempabumi Periode '.$start.' s.d '.$end);
        return view ( 'gempa.searchresult' )->with(compact('start', 'end', 'eq1s', 'eq2s', 'eq3s', 'eq4s', 'eq5s', 'eq6s', 'eq7s', 'eq8s', 'eq9s', 'felts', 'Mbelowthree', 'Mthreefive', 'Mabovefive', 'Dshallow', 'Dmediate', 'Dverydeep','feltfromsignficants'));
        }
    }
    //Tentang Kami

    public function about () {
        return view('abouts.about');
    }

    public function caripetir() {
        return view('petirs.caripetir');
    }

    public function querypetir(Request $request) {


        $minLatitude = $request->input( 'min_lat' );
        $maxLatitude = $request->input( 'max_lat' );
        $minLongitude = $request->input( 'min_lon' );
        $maxLongitude = $request->input( 'max_lon' );
        $start = \Carbon\Carbon::parse($request->input( 'start' ))->format('Y-m-d');
        $end = \Carbon\Carbon::parse($request->input( 'end' ))->format('Y-m-d');
        $akhir = \Carbon\Carbon::parse($request->input( 'end' ))->addDays(1)->format('Y-m-d');

        $awal = \Carbon\Carbon::parse($request->input( 'start' ))->format('Ymd');
        $terakhir = \Carbon\Carbon::parse($request->input( 'end' ))->format('Ymd');

        //TEST LEAGUE/CSV

        //baca file dengan League/CSV

        $startDateObj = DateTime::createFromFormat('Ymd', $awal);
        $endDateObj = DateTime::createFromFormat('Ymd', $terakhir);

        // Initialize an empty array to hold the filtered records
        $filteredRecords = [];
        $results = [];
        $dates = [];
        $type0Data = [];
        $type1Data = [];
        // Initialize variables to hold the total counts of type 0 and type 1
        $totalType0 = 0;
        $totalType1 = 0;

            // Loop through the date range and read files with matching names
            while ($startDateObj <= $endDateObj) {
                $fileName = $startDateObj->format('Ymd') . '.csv';
                $filePath = public_path('berita/petir/' . $fileName);

                if (file_exists($filePath)) {
                    // File exists, read the CSV data
                    $csv = Reader::createFromPath($filePath, 'r');
                    $csv->setHeaderOffset(0);

                    // Filter records by coordinate boundary and 'type' value, then merge the records
                    $recordsForDate = array_filter(iterator_to_array($csv->getRecords()), function ($record) use ($minLatitude, $maxLatitude, $minLongitude, $maxLongitude) {
                        // Replace 'latitude' and 'longitude' with the actual column names in your CSV
                        $latitude = $record['latitude'];
                        $longitude = $record['longitude'];

                        // Check if the latitude and longitude are within the boundary
                        return ($latitude >= $minLatitude && $latitude <= $maxLatitude) && ($longitude >= $minLongitude && $longitude <= $maxLongitude)
                            && ($record['type'] === '0' || $record['type'] === '1');
                    });

                    // Count the occurrences of each type for the current date
                    $typeCounts = array_count_values(array_column($filteredRecords, 'type'));

                    // Add the type counts to the result array with the date as the key
                    $results[$startDateObj->format('Ymd')] = $typeCounts;

                    // Merge the records for this date into the main filteredRecords array
                    $filteredRecords = array_merge($filteredRecords, $recordsForDate);
                }

                // Move to the next date
                $startDateObj->add(new DateInterval('P1D'));
            }

            // Calculate the total counts of type 0 and type 1
            $totalType0 = count(array_filter($filteredRecords, function ($record) {
                return $record['type'] === '0';
            }));

            $totalType1 = count(array_filter($filteredRecords, function ($record) {
                return $record['type'] === '1';
            }));

            foreach ($results as $date => $types) {
                $dates[] = $date;
                $type0Data[] = isset($types['0']) ? $types['0'] : 0;
                $type1Data[] = isset($types['1']) ? $types['1'] : 0;
            }

            $totalsum = $totalType0 + $totalType1;
        //END LEAGUE/CSV


        if($start != "" and $start < $end ) {


        $sambarans = $filteredRecords;

        Session::flash('info', 'Data Sambaran '.$start.' s.d '.$end);
        return view('petirs.queryld')->with(compact('sambarans', 'start', 'end','akhir','filteredRecords','type0Data','type1Data','dates','totalType0', 'totalType1','totalsum'));
                // return response()->json($type0Data);
        } else {

            Session::flash('warning', 'Tanggal awal harus lebih kecil dari tanggal akhir ');
            return view('petirs.caripetir');
        }


    }

    // chart
    public function charts () {
        $Mbelowthree = Gempa::where('magnitudo','<', 3)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mthreefive = Gempa::whereBetween('magnitudo',[3, 4.9])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Mabovefive = Gempa::where('magnitudo','>=', 5)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        //depth\
        $Dshallow = Gempa::where('depth','<', 70)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dmediate = Gempa::whereBetween('depth',[70, 249])
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();
        $Dverydeep = Gempa::where('depth','>=', 300)
                    ->whereDate('tanggal', '>', Carbon::now()->subDays(30))->count();

        $aindeks = Kindek::select(['tanggal','aindex'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        $kindeks = Kindek::orderBy('id','desc')->first();
        //Hujan
        $hujans = Hujan::select(['tanggal','obs'])
                    ->orderBy('tanggal','desc')
                    ->take(30)->get();
        //Magnetbumi chart
        $datas = [
            'Mbelowthree' => $Mbelowthree,
            'Mthreefive' => $Mthreefive,
            'Mabovefive' => $Mabovefive,
            'Dshallow' => $Dshallow,
            'Dmediate'  => $Dmediate,
            'Dverydeep' => $Dverydeep,
            'aindeks' => $aindeks,
            'kindeks' => $kindeks,
            'hujans' => $hujans,
        ];
        return view('charts.index', compact('datas'));
    }

    //Magnetbumi Page
    public function magnet() {
        $date_raw = date("r");
        $tanggal = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
        $tahun =date('Y', strtotime($tanggal));
        $bulan =date('m', strtotime($tanggal));
        $hari = date('d', strtotime($tanggal));
        $magnets = Magnet::select()->where('tanggal', $tanggal)->get();
        return view('magnets.dailychart', compact('magnets', 'tanggal'));
    }

    public function simimi ()
    {
        $eqs = \App\Models\Gempa::take(30)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->get();
        $neweqs = array();
        foreach ($eqs as $eq) {
            $tanggal = $eq['tanggal']; //get date of the eathquake
            $jam = $eq['origin']; // get origin time of eq
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            //array hari senin-sabtu
            $days = array (
                0 =>   'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                "Jum'at",
                'Sabtu'
            );

            $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
            $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
            $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
            $selisih = ($jamnya+ 9) - 24;
            if ($selisih >=0) {
               $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
            }
            $hari = $days[$hari];
            $pecahkan = explode('-',$tanggalbaru);
            $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
            $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
            $value = $tanggalindo.' '.$jamwit;
            $eq['origin'] = $value;
        }

        $last = \App\Models\Balaigempa::orderBy('id','desc')->first();
        return view('gempa.simimi', compact('eqs','last'));
    }



    public function slideshow () {
        $articles = Article::take(8)->where('category_id','!=', 8)->where('category_id','!=', 10)->orderBy('id','desc')->get();
        return view('slideshow')->with(compact('articles'));
    }

    public function reminder()
    {
      return view('reminder');
    }

    public function terupdate() {
        $gempas = Balaigempa::take(10)->orderBy('tanggal','desc')->orderBy('origin', 'desc')->paginate(10);
        foreach ($gempas as $eq) {
            $tanggal = $eq['tanggal']; //get date of the eathquake
            $jam = $eq['origin']; // get origin time of eq
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            //array hari senin-sabtu
            $days = array (
                0 =>   'Minggu',
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                "Jum'at",
                'Sabtu'
            );

            $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
            $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
            $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
            $selisih = ($jamnya+ 9) - 24;
            if ($selisih >=0) {
               $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
            }
            $hari = $days[$hari];
            $pecahkan = explode('-',$tanggalbaru);
            $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
            $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
            $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
            $value = (string)$tanggalindo.' '.(string)$jamwit;
            $eq['origin'] = (string)$jamwit;
            $eq['type'] = (string) $tanggalindo;

        }
        return view('gempa.terupdate',compact('gempas'));
    }

    public function showmap($id) {
        // $event = $this->crud->getEntry($id);
        $event = Balaigempa::find($id);
        //Penanggalan
        //array bulan
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        //wilayah yang diguncang gempa
        // $wilayah = $event['ket'];
        // $ket = explode(" ", $wilayah);
        // $wilayah = $ket[3];
        // $arah = $ket[2];
        // $jarak = $ket[0];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }
        return view('gempa.detail_gempa', compact('lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms'));
    }

    public function detailgempajay($id) {
        // $event = $this->crud->getEntry($id);
        $event = Gempa::find($id);
        //Penanggalan
        //array bulan
            $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

            $bulansms = array (
            1 =>   'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        );

        //array hari senin-sabtu
        $days = array (
            0 =>   'Minggu',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            "Jum'at",
            'Sabtu'
    );
        $tanggal = $event['tanggal']; //get date of the eathquake
        $jam = $event['origin']; // get origin time of eq
        $tanggaljam = $tanggal." ".$jam; //susun tanggal dari kolom tanggal dan origin
        $tanggalbaru = date("d-m-Y", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $tanggalbarusms = date("d-m-y", strtotime($tanggaljam)); //mengubah ke tipe datetime untuk sms
        $hari = (int)date("w", strtotime($tanggaljam)); //ambil angka hari dalam sebuah minggu
        $jamnya = (int)date("H", strtotime($tanggaljam)); //ambil angka jam dalam sebuah minggu
        $selisih = ($jamnya+ 9) - 24;
        if ($selisih >=0) {
           $tanggalbaru = date('d-m-Y', strtotime($tanggaljam . ' +1 day'));
           $tanggalbarusms = date('d-m-y', strtotime($tanggaljam . ' +1 day'));
        }
        $hari = $days[$hari];
        $pecahkan = explode('-',$tanggalbaru); //membuat array yang terdiri dari hari index 0, bulan index 1, tahun index 2
        $pecahkansms = explode('-',$tanggalbarusms);
        $tanggalindo = $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2]; //Menggabungkan jadi tanggal format indonesia
        $tanggalindosms= $pecahkan[0] . '-' . $bulansms[ (int)$pecahkansms[1] ] . '-' . $pecahkansms[2]; //Menggabungkan jadi tanggal format indonesia
        $jamutc = date("d-m-Y H:i:s", strtotime($tanggaljam)); //mengubah ke tipe datetime
        $jamwit = date("H:i:s", strtotime($jamutc) + 32400);
        $jamsusulan = date("H:i", strtotime($jamutc) + 34200);
        $lat = $event['lintang'];
        $lon = $event['bujur'].' BT';
        $mag = round($event['magnitudo'],1);
        $depth = $event['depth'];
        //wilayah yang diguncang gempa
        // $wilayah = $event['ket'];
        // $ket = explode(" ", $wilayah);
        // $wilayah = $ket[3];
        // $arah = $ket[2];
        // $jarak = $ket[0];
        $lat = str_split($lat); //break latitude to an array
        if ($lat[0] == '-') {
            $lat = $lat[1].$lat[2].$lat[3].$lat[4].' LS';
        } else {
            $lat = $lat[1].$lat[2].'LU';
        }
        return view('gempa.detail_gempa', compact('lat', 'lon', 'mag', 'depth','event', 'tanggalindo', 'hari', 'jamwit','event','tanggalindosms'));
    }

    public function variasi() {
        $date_raw = date("r");
        $tanggal = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
        $tahun =date('Y', strtotime($tanggal));
        $bulan =date('m', strtotime($tanggal));
        $hari = date('d', strtotime($tanggal));
        $magnets = Magnet::select()->where('tanggal', $tanggal)->get();
        return view('magnets.dailychart', compact('magnets', 'tanggal'));
    }

}
