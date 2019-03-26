

@extends('main')
@section('title')
<title>Tentang - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<style type="text/css" media="screen"></style>
@endsection
@endsection
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 d-none d-sm-block">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/about" class="text-primary" >Tentang Kami</a></li>
            </ol>
        </div>
    </div>
</div>
<br>
<div class="container">
<div class="row">
    <div class="col-md-8 mx-auto col-sm-12 col-xs-12" style="padding-bottom: 1%;">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Profil Stasiun
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" style="font-family: 'Abel', sans-serif;">
                        <h4 class="text-center text-primary">PROFIL STASIUN</h4>
                        <br>
                        <p class="text-justify" > <strong class="text-primary" >Stasiun 
                            Geofisika Kelas I 
                            Angkasapura  Jayapura</strong>
                            terletak  di  jalan  Drs.  Krisna 
                            Sunarya   No.   26   Kelurahan   Angkasapura   Distrik   Jayapura   Utara   Provinsi 
                            Papua.Titik   dasar   stasiun   terletak   pada   02°30
                            '
                            52,59375"Lintang   Selatan   dan 
                            140°42'15,52086"Bujur Timur
                            dengan  elevasi 444.97 meter dan gravitasi sebesar 
                            978105.39  mgal
                            .  Stasiun  Geofisika 
                            Angkasapura  Jayapura  merupakan  salah  satu 
                            dari dua Stasiun Geofisika yang terdapat di Papua dan merupakan Unit Pelaksana 
                            Teknis   (UPT)   yang   berta
                            nggung   jawab   langsung   kepada   Kepala   Badan 
                            Meteorologi, Klimatologi dan Geofisika. 
                        </p>
                        <div id="map" class="" style="width:100%;height:400px; border-radius: 5px;"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-primary" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Sejarah
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <p class="text-justify">
     						<strong class="text-primary" >Stasiun  Geofisika  Klas  I  Angkasapura  Jayapura</strong> mulai  beroperasi  sejak  tahun  1972 dibawah  Lembaga  Meteorologi  dan  Geofisika  Jakarta dan  pada tanggal  9 Pebruari 1973 diresmikan  operasionalnya  oleh Menteri  Perhubungan  Drs.   Frans   Seda. Pada   tanggal   3   Pebruari   1973 pertama kali   dioperasikan peralatan Seismograph    Fotografik    Sprengnether    3    Komponen. Melalui kerjasama Pusat  Meteorologi  dan  Geofisika  dengan  <a href="https://en.unesco.org">UNESCO</a> , pada  tahun  1977 dibantu    peralatan    operasional Visual    Seismograph    Short    Period    SPS-1 (Kinematric) dan Strong    Motion    Accelerograph    (SMA-1) untuk    deteksi gempabumi kuat. Pada tahun 1998 kerjasama BMG dengan ERI Tokyo University sebagai   bagian   dalam OHP   (Ocean Hemisphere   of   Pacific   Project) yang diprakarsai  oleh JAMSTEC  ( <a href="https://jamstec.go.jp/e/">Japan  Agency  for  Marine - Earth  Science  And Technology</a>),  mengoperasikan peralatan Digital  Broadband  Seismograph  STS-1 Very  Broadband  Seismometer.
                            </p>
                            <p class="text-justify">Kemudian pada tahun 2000, kerjasama BMG dengan <a href="https:/ctbto.org">CTBTO (Comprehensive Nuclear-Test-Ban Treaty Organization)</a> sebagai salah satu stasiun pendukung ( <em>Auxialary Station</em>) dengan kode AS041, mengoperasikan peralatan Digital Broadband Seismograph CMG - 3T,  dan pada tanggal  10 Desember 2011 digantikan  dengan <em>Digital  Broadband Seismograph Trilium</em>. Pasca gempabumi Aceh 26  Nopember 2004, pada tahun 2005 dibangun peralatan InaTEWS (Indonesia Tsunami Early Warning System) berupa peralatan <em>Digital Broadband Seismograph STS-2</em> dengan sarana komunikasi LIBRA. Duplikasi fungsi antara peralatan <a href="https:/ctbto.org">CTBTO</a> dan InaTEWS Libra maka kemudian pada tahun 2010  peralatan <em>Digital  Broadband  Seismograph  STS-2</em> dipindahkan ke Nabire. Fungsi jaringan InaTEWS di Jayapura hanya mengoperasikan peralatan <a href="https:/ctbto.org">CTBTO</a>. Pada  tahun 2010 dan 2012 berturut-turut melalui kegiatan Belanja  Modal BMKG Jakarta, <strong class="text-primary">Stasiun  Geofisika Kelas  I Angkasapura  Jayapura</strong>  mendapat  tambahan  peralatan survery berupa <em>Portable Digital Seismograph Taide  TDV-23S</em>, dan <em>Accelerograph  Titan_0077</em> untuk mengukur nilai PGA ( <em>Peak Ground Acceleration</em> ). </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-primary" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Peralatan
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                        	<div class="row">
                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://gempa.de/media/images/bg_front.png">
									  <div class="card-body">
									    <a href="https://gempa.de/" class="btn btn-block bg-primary text-light">Seiscomp3</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://i1.wp.com/www.lemisensors.com/wp-content/uploads/2016/02/LEMI-018-1.jpg?resize=300%2C235&ssl=1" alt="Card image">
									  <div class="card-body">
									    <a href="www.lemisensors.com/" class="btn btn-block bg-primary text-light">LEMI-018</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://www.astrogenic.com/img/astrogenic2.gif" alt="Card image" >
									  <div class="card-body">
									    <a href="https://www.astrogenic.com/nexstorm.html" class="btn btn-block bg-primary text-light">NextStorm</a>
									  </div>
									</div>
                        		</div>
                        	</div>
                        	<br>
                        	<div class="row">
                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="http://www.usarray.org/files/images/equipment_pix/xsts1.jpg.pagespeed.ic.XdoQXZk9mq.jpg" class="">
									  <div class="card-body">
									    <a href="http://www.usarray.org/" class="btn btn-block bg-primary text-light">Streckeisen STS-1</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://www.nanometrics.ca/sites/default/files/inline-images/Titan%20SMA%20and%20logo_1.png">
									  <div class="card-body">
									    <a href="https://www.nanometrics.ca/" class="btn btn-block bg-primary text-light">Accelerograph SMA-TITAN</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="http://magdas2.serc.kyushu-u.ac.jp/figures/logo.gif" alt="Card image" >
									  <div class="card-body">
									    <a href="http://magdas2.serc.kyushu-u.ac.jp/" class="btn btn-block bg-primary text-light">MAGDAS</a>
									  </div>
									</div>
                        		</div>
                        	</div>
                        	<br>
                        	<div class="row">
                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://www.vixenoptics.co.uk/Images/Mounts/GP2_mount_300.jpg" class="">
									  <div class="card-body">
									    <a href="https://www.vixenoptics.co.uk/Pages/gp2_mount.htm" class="btn btn-block bg-primary text-light">Teropong Hila Vixen GP-2</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="https://www.geo-instrument.ru/files/6110/p6112d300i300.16777215.jpg">
									  <div class="card-body">
									    <a href="https://www.ebay.com/p/Carl-Zeiss-Jena-Sekundentheodolit-Theo-010-B-Theodolit-Zubeh%C3%B6r-DDR/1684134860?iid=162817379031" class="btn btn-block bg-primary text-light">Theodolit DIM</a>
									  </div>
									</div>
                        		</div>

                        		<div class="col-md-4">
									<div class="card">
									  <img class="card-img-top" src="http://3.bp.blogspot.com/_Q_RzGsyonRc/TUjFB4wTYcI/AAAAAAAAABY/UFUtJLmDY2Q/s400/HV+sampler.JPG" >
									  <div class="card-body">
									    <a href="http://bmkgstaklimsampali.blogspot.com/p/alat-meteorologi-klimatologi.html" class="btn btn-block bg-primary text-light">HV Sampler</a>
									  </div>
									</div>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
@section('script')
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
</script>
<script>
    var mymap = L.map('map').setView([-2.5145, 140.704], 14);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox.streets'
    }).addTo(mymap);
    
    var eqIcon = L.icon({
        iconUrl: '/images/icongempa.png',
    
        iconSize: [40, 40], // size of the icon
    });
    L.marker([-2.5145, 140.704]).addTo(mymap);
    
</script>
@endsection

