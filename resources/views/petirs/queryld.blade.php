@extends('main')
@section('title')
<title>Sambaran Petir - Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>


<style type="text/css" media="screen">

</style>
@section('content')
@include('guests.pesan')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/petir/query" class="text-primary" >Query Sambaran Petir</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
        <form action="/petir/query" method="POST" role="search">
            {{ csrf_field() }}
             
            <div class="form-group">
                <label for="start">Tanggal awal / Start date</label>
                <input type="date" class="form-control" name="start" required >
            </div>
            <div class="form-group">
                <label for="akhir">Tanggal akhir / End date</label>
                <input type="date" class="form-control" name="end" required >
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-secondary btn-block btn-lg">
                <span class="glyphicon glyphicon-search">Cari</span>
            </button>
            </div>
        </form>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="map" style="width:100%; height: 750px; border-radius: 5px; "></div>
        </div>
    </div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			            <table class="table">
                <tr>
                    <td class="text-center"><img src="/images/cgplus.png" alt="" width="27" height="35"> <span>CG+ </span> </td>
                    <td class="text-center"><img src="/images/cgminus.png" alt="" width="27" height="35"> <span>CG- </span> </td>
                    <td class="text-center"><img src="/images/intraclouds.png" alt="" width="27" height="35"> <span>IC</span> </td>
                </tr>
            </table>
		</div>
	</div>
</div>
<!-- <br class="" >
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Sambaran Petir
                </div>
                <div class="card-body">

                    <canvas id="Mag-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Mag-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["M<3", "3>M<5", "M>5"],
                        datasets: [
                            {
                            label: "Sambaran",
                            backgroundColor: ["#804715", "#D49C6A","#FFD2AA"],
                            data: [ 20 ,30, 50]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gempabumi periode {{ $start }} s.d {{ $end }}'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div> -->
<br>

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
<script>

var mymap = L.map('map').setView([-2.5104, 140.714], 9);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(mymap);

    var cgplus = L.icon({
        iconUrl: '/images/cgplus.png',
        iconSize:     [27, 27], // size of the icon

    });

    var cgminus = L.icon({
        iconUrl: '/images/cgminus.png',
        iconSize:     [27, 27], // size of the icon

    });

    var intraclouds = L.icon({
        iconUrl: '/images/intraclouds.png',
        iconSize:     [27, 27], // size of the icon

    });

    @if ($sambarans->count() > 0)
        @foreach ($sambarans as $sambaran)
        	@if ($sambaran->type == 0)
            marker = new L.marker([{{ $sambaran->latitude }}, {{ $sambaran->longitude }}], { icon: cgplus}).addTo(mymap)
            .bindPopup(
                `Cloud to ground positives`);
            @endif
        	@if ($sambaran->type == 1)
            marker = new L.marker([{{ $sambaran->latitude }}, {{ $sambaran->longitude }}], { icon: cgminus}).addTo(mymap)
            .bindPopup(
                `Cloud to ground negatives`);
            @endif

        	@if ($sambaran->type == 2)
            marker = new L.marker([{{ $sambaran->latitude }}, {{ $sambaran->longitude }}], { icon: intraclouds}).addTo(mymap)
            .bindPopup(
                `Intraclouds`);
            @endif

        @endforeach
    @endif
</script>
@endsection