@extends('main')
@section('title')
<title>Pencarian Gempabumi - Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>

<style type="text/css" media="screen">

  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    margin: 3px; 
    margin-right: 10px;
  }
  #basemaps {
  }

    .red-circle-icon {
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.7); /* Solid red border */
        background-color: rgba(255, 0, 0, 1); /* 50% opacity red background */
    }

    .yellow-circle-icon {
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.7); /* Solid red border */
        background-color: rgba(255, 255, 0, 1); /* 50% opacity red background */
    }

    .green-circle-icon {
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.7); /* Solid red border */
        background-color: rgba(0, 255, 0, 1); /* 50% opacity red background */
    }
</style>
@endsection
@section('content')
@include('guests.pesan')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/gempa/statistik" class="text-primary" >Statistik</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
        <form action="/statistik/search" method="POST" role="search">
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

<br class="" >
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Magnitudo
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
                            label: "Gempabumi",
                            backgroundColor: ["#804715", "#D49C6A","#FFD2AA"],
                            data: [ {{ $Mbelowthree }} ,{{ $Mthreefive }}, {{ $Mabovefive }} ]
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/kedalaman.png') }} " alt="depth" aria-hidden="true">
                    Kedalaman
                </div>
                <div class="card-body">
                <canvas id="Depth-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Depth-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["Depth<60", "60>Depth<300", "Depth>300"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#013034", "#0E494E","#417C81"],
                            data: [ {{ $Dshallow }} ,{{ $Dmediate }}, {{ $Dverydeep }} ]
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
</div>
{{-- {{ $lintangmax }} {{ $lintangmin }} --}}
<br>

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
    <script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
<script src="{{ asset('gjson') }}/indofaults.js">
   <script src="{{ asset('gjson') }}/plates.js" > </script>
<script>

var map = L.map('map').setView([-2.5104, 140.714], 6);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)

L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(map);
//  var layer = L.esri.basemapLayer('Streets').addTo(map);
  var layerLabels;

  function setBasemap(basemap) {
    if (layer) {
      map.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    map.addLayer(layer);

    if (layerLabels) {
      map.removeLayer(layerLabels);
    }

    if (basemap === 'ShadedRelief'
     || basemap === 'Oceans'
     || basemap === 'Gray'
     || basemap === 'DarkGray'
     || basemap === 'Terrain'
   ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      map.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      map.addLayer(layerLabels);
    }
  }

  function changeBasemap(basemaps){
    var basemap = basemaps.value;
    setBasemap(basemap);
  }

    var terasa = L.divIcon({
    className: 'star-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="orange"><path d="M12 2l2.37 7.25h7.63l-6.18 4.5 2.37 7.25-6.18-4.5-6.18 4.5 2.37-7.25-6.18-4.5h7.63z " stroke="black" fill="orange"/></svg>',
    iconSize: [30, 30],
    iconAnchor: [12, 12],
});


    var red1 = L.divIcon({
        className: 'red-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 10 10" fill="red"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [10, 10],
        iconAnchor: [0, 0],
    });


    var red2 = L.divIcon({
        className: 'red-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 20 20" fill="red"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [15, 15],
        iconAnchor: [0, 0],

    });

    var red3 = L.divIcon({
        className: 'red-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="red"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [20, 20],
        iconAnchor: [0, 0],

    });

    var yellow1 = L.divIcon({
        className: 'yellow-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="yellow"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [10, 10],
        iconAnchor: [0, 0],

    });

    var yellow2 = L.divIcon({
        className: 'yellow-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="yellow"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [15, 15],
        iconAnchor: [0, 0],

    });

    var yellow3 = L.divIcon({
        className: 'yellow-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="yellow"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [20, 20],
        iconAnchor: [0, 0],

    });

    var green1 = L.divIcon({
        className: 'green-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="green"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [10, 10],
        iconAnchor: [0, 0],

    });

    var green2 = L.divIcon({
        className: 'green-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="green"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [15, 15],
        iconAnchor: [0, 0],

    });

    var green3 = L.divIcon({
        className: 'green-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" viewBox="0 0 24 24" fill="green"><circle cx="12" cy="12" r="10" /></svg>',
        iconSize: [20, 20],
        iconAnchor: [0, 0],

    });

        var patahanStyle = {
            "color": "#2C4B48",
            "weight": 0.7,
            "opacity": 0.9
        };

        //style for subduksi

        var subduksiStyle = {
            "color": "#ffff00",
            "weight": 1,
            "opacity": 0.5,
            "fillColor": 'transparent',
        };

        var indoFaultsStyle = {
            "color": "#ff0000",
            "weight": 1,
            "opacity": 1,
            "fillColor": '#E04D01',
        }

        function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
            if (feature.properties && feature.properties.PlateName) {
                layer.bindPopup(feature.properties.PlateName);
            }
        }

        L.geoJSON(pataHan, {
            style : patahanStyle,
        }).addTo(map); //add patahan symbol

        // //plot subduction
        // L.geoJSON(subDuksi, {
        //     style: subduksiStyle
        // }).addTo(map);

        //plot subduction
        L.geoJSON(indoFaults, {
            style: indoFaultsStyle
        }).addTo(map);

    @if ($eq1s->count() > 0)
        @foreach ($eq1s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: red1}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq2s->count() > 0)
        @foreach ($eq2s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: red2}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq3s->count() > 0)
        @foreach ($eq3s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: red3}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif


    //yellow
    @if ($eq4s->count() > 0)
        @foreach ($eq4s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: yellow1}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq5s->count() > 0)
        @foreach ($eq5s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: yellow2}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq6s->count() > 0)
        @foreach ($eq6s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: yellow3}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

        //green
    @if ($eq7s->count() > 0)
        @foreach ($eq7s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: green1}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq8s->count() > 0)
        @foreach ($eq8s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: green2}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    @if ($eq9s->count() > 0)
        @foreach ($eq9s as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: green3}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endforeach
    @endif

    //terasa

    @if ($felts->count() > 0)
        @foreach ($felts as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: terasa}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }},
                {{ $eq->terdampak }}`);
        @endforeach
    @endif
    //felt from significant
    @if ($feltfromsignficants->count() > 0)
        @foreach ($feltfromsignficants as $eq)
            marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: terasa}).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} WIT, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->lokasi }}`);
        @endforeach
    @endif
</script>
@endsection