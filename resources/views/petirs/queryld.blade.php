@extends('main')
@section('title')
<title>Sambaran Petir - Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>


<style type="text/css" media="screen">
.totalsambaran {
background: rgb(49,123,218);
background: linear-gradient(270deg, rgba(49,123,218,1) 0%, rgba(26,145,125,0.7959558823529411) 42%, rgba(2,0,36,1) 99%);
    display: flex; 
    flex-direction: column; 
    justify-content: center; 
    align-items: center;
}

.totalcgplus {
color: white; background-color: #1D2B38; display: flex; flex-direction: column; justify-content: center; align-items: center;
}

.totalcgminus {
color: white; background-color: #1D2B38; display: flex; flex-direction: column; justify-content: center; align-items: center;
}

.totalintraclouds {
    color: white; background-color: #1D2B38; display: flex; flex-direction: column; justify-content: center; align-items: center;
}

#logoContainer {
    position: absolute;
    z-index: 100;
    top: 0px;
    left: 0px;
    background: rgb(49,123,218);
    background: linear-gradient(270deg, rgba(49,123,218,1) 0%, rgba(26,145,125,0.7959558823529411) 42%, rgba(2,0,36,1) 99%);
    width: 1200px;
    height: 60px;
    margin-top: -1rem;
    margin-left: -1rem;

}

#medsos {
    background-color: #14222F;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    height: 50px;
    align-items: center;
}

/*tanpa ic*/

#logoContainertanpaic {
/*    position: absolute;
    z-index: 150;
    top: 0px;
    left: 0px;*/
    background: rgb(49,123,218);
    background: linear-gradient(270deg, rgba(49,123,218,1) 0%, rgba(26,145,125,0.7959558823529411) 42%, rgba(2,0,36,1) 99%);
    width: auto;
    height: 60px;
/*    margin-top: -1rem;
    margin-left: -1rem;*/

}

#medsostanpaic {
    background-color: #14222F;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    height: 50px;
    align-items: center;
}
</style>
@section('content')
@include('guests.pesan')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/caripetir" class="text-primary" >Query Sambaran Petir</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
        <form action="/caripetir/query" method="POST" role="search">
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
                <label for="start">Min Lat</label>
                <input type="text" class="form-control" name="min_lat" value='-3.014833' required >
            </div>
            <div class="form-group">
                <label for="akhir">Max Lat</label>
                <input type="text" class="form-control" name="max_lat" value='-2.014833' required>
            </div>
            <div class="form-group">
                <label for="start">Min Lon</label>
                <input type="text" class="form-control" name="min_lon" value='140.204667' required >
            </div>
            <div class="form-group">
                <label for="akhir">Max Lon</label>
                <input type="text" class="form-control" name="max_lon" value='141.204667' required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-secondary btn-block btn-lg">
                <span class="glyphicon glyphicon-search">Cari</span>
            </button>
            </div>
        </form>
</div>

<!-- Batas intraclouds -->

<div class="container" id="medsostanpaic" >
    <div>
        <i class="fa fa-facebook" style="color:white; font-size: 1em;"></i>
        <i class="fa fa-twitter" style="color:white; font-size: 1em;"></i>
        <i class="fa fa-instagram" style="color:white; font-size: 1em;"></i>
        <span style="color: white; font-size: 1em;">stageof.jayapura</span>
    </div>
    <div>
        <i class="fa fa-mobile-phone" style="color: white; font-size: 1em;"></i>
        <i class="fa fa-whatsapp" style="color: white; font-size: 1em;"></i>
        <i class="fa fa-telegram" style="color: white; font-size: 1em;"></i>
        <span style="color:white; font-size: 1em">08114891151</span>
    </div>
    <div>
        <i class="fa fa-envelope" style="color:white; font-size: 1em; margin-left: 20px;"></i>
        <span style="color: white; font-size: 1em; ">stageof.angkasa@gmail.com</span> 
    </div>
    <div>
        <i class="fa fa-globe" style="color:white; font-size: 1em; margin-left: 20px;"></i>
        <span style="color: white; font-size: 1em; ">stageof.jayapura.bmkg.go.id</span> 
    </div>
</div>
<div class="container" style="    background: rgb(49,123,218);
    background: linear-gradient(270deg, rgba(49,123,218,1) 0%, rgba(26,145,125,0.7959558823529411) 42%, rgba(2,0,36,1) 99%);">
    <div class="row">
        <div class="col-lg-12">
            <div id="logoContainertanpaic" style="display: flex; justify-content: space-around; align-items: center;">
                <span style="font-size:2em; color: white" >Peta Sebaran Petir {{ \Carbon\Carbon::parse($start)->format('d M') }} - {{ \Carbon\Carbon::parse($end)->format('d M') }} {{ \Carbon\Carbon::parse($end)->format('Y') }} </span> 
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#14222F; ">
            <div id="maptanpaic" style="width:100%; height: 600px; border-radius: 5px; ">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="display: flex; flex-direction: row; justify-content: space-between;">
            <div class="col-lg-2 col-md-2 " style="display: flex; flex-direction: column; justify-content: space-around; align-content: space-between; background-color: #14222F; ">
                <div class="totalsambaran">
                    <p style="color: white; font-size: 2.5em;" >{{ $totalsum }}</p>
                    <p style="color: white" >Sambaran</p>
                </div>
                <div class="totalcgplus">
                    <p>CG+</p>
                    <p style="font-size: 1.5em;">{{ $totalType0 }}</p>
                    <img src="/images/newcgplus.png" width="30px" height="38px" alt="Cloud to ground positive">
                </div>
            </div>
            <div class="col-lg-2 col-md-2" style="display: flex; flex-direction: column; justify-content: space-around; align-content: space-between; background-color: #14222F">
                <div class="totalcgminus">
                    <p>CG-</p>
                    <p style="font-size: 1.5em;">{{ $totalType1 }}</p>
                    <img src="/images/newcgminus.png" width="27px" height="35px" alt="Cloud to ground negative icon">
                </div>
                <div class="totalintraclouds">
                    <p></p><p></p>
                    <img src="/images/logo-bmkg.png" width="70px" height="80px" alt="Intraclouds icon">
                    <p></p>
                </div>
            </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="background-color: #14222F;">
<!--        <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Sambaran" aria-hidden="true">
                    <i class="wi wi-lightning" style="color: orange;"></i>
                    Sambaran Petir
                </div>
                <div class="card-body"> -->

                    <canvas id="chart-tanpaic" width="800" height="350" ></canvas>
                    <script>
                        // @php
                        //     $periods = new DatePeriod(
                        //     new DateTime($start),
                        //     new DateInterval('P1D'),
                        //     new DateTime($akhir));
                        // @endphp
                                var dates = @json($dates);
                                var type0Data = @json($type0Data);
                                var type1Data = @json($type1Data);
                        new Chart(document.getElementById("chart-tanpaic"), {
                            type: 'bar',
                            data: {
                              labels: [

                                    @foreach ($dates as $date)
                                        {{ $date }},
                                    @endforeach

                                ]

                              ,
                              datasets: [
                                {
                                  label: "CG+",
                                  backgroundColor:"#E62129",
                                  data: type0Data
                                }, {
                                  label: "CG-",
                                  backgroundColor: "#F08519",
                                  data: type1Data
                                },
                              ]
                            },
                            options: {
                              legend: {
                                labels: {
                                    fontColor: 'white'
                                }
                              },
                              title: {
                                display: true,
                                text: 'Jumlah Sambaran Petir Per Hari',
                                fontColor: 'white'
                              },
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            fontColor: 'white'
                                        }
                                    }],
                                    xAxes: [{
                                        ticks: {
                                            beginAtZero: true,
                                            fontColor: 'white'
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
<!--                 </div>
            </div> -->
    
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
    </div>
    
</div>
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
<script>

    //below is map without intracloud

var ic = L.map('maptanpaic').setView([-2.5104, 140.714], 11);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(ic);

    // var cgplus = L.icon({
    //     iconUrl: '/images/newcgplus.webp',
    //     iconSize:     [25, 25], // size of the icon

    // });

    var cgplus = L.divIcon({
        className: 'cg-plus',
        html: '<svg width="32px" height="32px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>thunder</title><desc>Created with Sketch.</desc><defs></defs><g id="Vivid.JS" stroke="rgb(1,1,1)" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Vivid-Icons" transform="translate(-205.000000, -723.000000)"><g id="Icons" transform="translate(37.000000, 169.000000)"><g id="thunder" transform="translate(156.000000, 546.000000)"><g transform="translate(12.000000, 8.000000)" id="Shape"><polygon fill="#E62129" points="21 0 8.842 0 2 14 8 14 0 32 24 13 15 13"></polygon><polygon fill="#E62129" points="16.421 19 0 32 5.778 19"></polygon></g></g></g></g></g></svg>'
    });

    var cgminus = L.divIcon({
        className: 'cg-minus',
        html: '<svg width="32px" height="32px" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>thunder</title><desc>Created with Sketch.</desc><defs></defs><g id="Vivid.JS" stroke="rgb(1,1,1)" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Vivid-Icons" transform="translate(-205.000000, -723.000000)"><g id="Icons" transform="translate(37.000000, 169.000000)"><g id="thunder" transform="translate(156.000000, 546.000000)"><g transform="translate(12.000000, 8.000000)" id="Shape"><polygon fill="#F08519" points="21 0 8.842 0 2 14 8 14 0 32 24 13 15 13"></polygon><polygon fill="#F08519" points="16.421 19 0 32 5.778 19"></polygon></g></g></g></g></g></svg>'
    });

    // var cgminus = L.icon({
    //     iconUrl: '/images/newcgminus.webp',
    //     iconSize:     [25, 25], // size of the icon

    // });

    var intraclouds = L.icon({
        iconUrl: '/images/newic.png',
        iconSize:     [25, 25], // size of the icon

    });


    @php
    $counter = 0;
@endphp

@foreach ($sambarans as $sambaran)
    @if ($counter < 10000)
        @if ($sambaran['type'] == 0)
            marker = new L.marker([{{ $sambaran['latitude'] }}, {{ $sambaran['longitude'] }}], { icon: cgplus}).addTo(ic)
            .bindPopup(
                `Cloud to ground positives`+' {{ $sambaran['datetime_utc'] }}');
        @endif
        @if ($sambaran['type'] == 1)
            marker = new L.marker([{{ $sambaran['latitude'] }}, {{ $sambaran['longitude'] }}], { icon: cgminus}).addTo(ic)
            .bindPopup(
                `Cloud to ground negatives`+' {{ $sambaran['datetime_utc'] }}');
        @endif
        @php
            $counter++;
        @endphp
    @else
        @break
    @endif
@endforeach


</script>
@endsection