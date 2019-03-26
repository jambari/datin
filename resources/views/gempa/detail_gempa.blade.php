@extends('main') @section('title')
<title>Gempabumi - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
<style type="text/css" media="screen">
    #streetmap {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column; 
    }

    
    .css-icon {}
    
    .gps_ring {
        border: 3px solid #FF0000;
        -webkit-border-radius: 100px;
        height: 100px;
        width: 100px;
        -webkit-animation: pulsate 1s ease-out;
        -webkit-animation-iteration-count: infinite;
        /*opacity: 0.0*/
    }
    
    @-webkit-keyframes pulsate {
        0% {
            -webkit-transform: scale(0.1, 0.1);
            opacity: 0.0;
        }
        50% {
            opacity: 1.0;
        }
        100% {
            opacity: 1.0;
        }
    }
    
</style>
@endsection @endsection @section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-none d-sm-block">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/gempa" class="text-primary">Gempabumi</a></li>
            </ol>
        </div>
    </div>
</div>
<br>
<br>
<!-- this is eq map -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div id="streetmap">
                <img class="d-none d-sm-block" src=" {{ asset('images') }}/logo.jpg " alt="logo" width="100%" height="20%" style="margin-bottom: 15px">
                <div id="map" style="width:85%;height:500px; border-radius: 5px;"></div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- eq parameter -->
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <img src="http://inatews.bmkg.go.id/light/images/clock.png" alt="waktu gempa" aria-hidden="true"> Waktu Gempa
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $event['tanggal'] }} {{ $event['origin'] }} UTC</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="fa fa-map-marker text-danger" style="font-size: 2.5em;" aria-hidden="true"></i> Lokasi
                </div>
                <div class="card-body">
                    <p class="card-text">Lokasi: {{ $event['lintang'] }} , {{ $event['bujur'] }} BT</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <img src="https://inatews.bmkg.go.id/light/images/mag.png" alt="Magnitude" aria-hidden="true"> Kekuatan
                </div>
                <div class="card-body">
                    <p class="card-text">M <span class="badge badge-primary">{{ $event['magnitudo'] }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <img src="http://inatews.bmkg.go.id/light/images/kedalaman.png" alt="depth" aria-hidden="true"> Kedalaman
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $event['depth'] }} Km</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="fa fa-file-text-o text-primary" aria-hidden="true" style="font-size: 2.5em;"></i> Keterangan
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $event['ket'] }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="wi wi-earthquake text-danger" aria-hidden="true" style="font-size: 2.5em;"></i> Dirasakan
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $event['terdampak'] or ' Tidak dirasakan '}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br> @endsection @section('script')
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script src="{{ asset('gjson') }}/patahan.js">
</script>
<script src="{{ asset('gjson') }}/subduksi.js">
</script>
<script src="{{ asset('gjson') }}/plates.js">
</script>

<script>
    var mymap = L.map('map').setView([ {{$event['lintang']}}, {{ $event['bujur']}}], 7);
    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox.satellite'
    }).addTo(mymap);

    var eqIcon = L.icon({
        iconUrl: '/images/icongempa.png',

        iconSize: [40, 40], // size of the icon
    });
    L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {
        icon: eqIcon
    }).addTo(mymap);
    //style for subduksi and patahan
    var patahanStyle = {
        "color": "#2C4B48",
        "weight": 0.7,
        "opacity": 0.9
    };

    //style for subduksi

    var subduksiStyle = {
        "color": "#0A70C4",
        "weight": 1,
        "opacity": 0.5,
        "fillColor": 'transparent',
    }

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties && feature.properties.PlateName) {
            layer.bindPopup(feature.properties.PlateName);
        }
    }

    L.geoJSON(pataHan, {
        style: patahanStyle,
    }).addTo(mymap); //add patahan symbol

    //plot subduction
    L.geoJSON(subDuksi, {
        style: subduksiStyle
    }).addTo(mymap);

    // Define an icon called cssIcon
    var cssIcon = L.divIcon({
        // Specify a class name we can refer to in CSS.
        className: 'css-icon',
        html: '<div class="gps_ring"></div>'
            // Set marker width and height
            ,
        iconSize: [100, 100]
            // ,iconAnchor: [11,11]
    });

    //add css icon as gps ring
    L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {
        icon: cssIcon
    }).addTo(mymap);
</script>
@endsection