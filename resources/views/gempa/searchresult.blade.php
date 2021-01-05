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
</style>
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
            <div id="basemaps-wrapper" class="leaflet-bar">
              <select name="basemaps" id="basemaps" onChange="changeBasemap(basemaps)">
                <option value="NationalGeographic"  >National Geographic</option>
                <option value="Topographic">Topographic</option>
                <option value="Streets" selected>Streets</option>
                <option value="Oceans">Oceans</option>
                <option value="Gray">Gray</option>
                <option value="DarkGray">Dark Gray</option>
                <option value="Imagery">Imagery</option>
                <option value="ImageryClarity">Imagery (Clarity)</option>
                <option value="ImageryFirefly">Imagery (Firefly)</option>
                <option value="ShadedRelief">Shaded Relief</option>
                <option value="Physical">Physical</option>
              </select>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <table class="table">
                <tr>
                    <td class="text-center"><img src="/images/redeq.png" alt="" width="9" height="9"> <span>M &#60; 3 & Depth &#8804; 70 Km </span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/redeq.png" alt="" width="18" height="18"> <span>3 &#8805; M &#60; 5 & Depth &#8804; 70 Km </span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/redeq.png" alt="" width="27" height="27"> <span>M &#8805; 5 & Depth &#8804; 70 Km </span> </td>
                </tr>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td class="text-center"><img src="/images/yelloweq.png" alt="" width="9" height="9"> <span>M &#60; 3 &  70 Km &#8805; Depth &#60; 300 Km</span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/yelloweq.png" alt="" width="18" height="18"> <span>3 &#8805; M &#60; 5 & 70 Km &#8805; Depth &#60; 300 Km </span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/yelloweq.png" alt="" width="27" height="27"> <span>M &#8805; 5 & 70 Km &#8805; Depth &#60; 300 Km </span> </td>
                </tr>
            </table>
        </div>

        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td class="text-center"><img src="/images/green.png" alt="" width="9" height="9"> <span>M &#60; 3 & Depth &#62; 300 Km </span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/green.png" alt="" width="18" height="18"> <span>3 &#8805; M &#60; 5 & Depth &#62; 300 Km </span> </td>
                </tr>
                <tr>
                    <td class="text-center"><img src="/images/green.png" alt="" width="27" height="27"> <span>M &#8805; 5 & Depth &#62; 300 Km </span> </td>
                </tr>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-bordered">
                <tr>
                    <td class="text-center"><img src="/images/felt.png" alt="" width="30" height="30" > <span>Gempa dirasakan</span> </td>
                </tr>
            </table>
        </div>
    </div>
</div>
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
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
<script>

var map = L.map('map').setView([-2.5104, 140.714], 6);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
 var layer = L.esri.basemapLayer('Streets').addTo(map);
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

    var terasa = L.icon({
        iconUrl: '/images/felt.png',
        iconSize:     [40, 40], // size of the icon

    });

    var red1 = L.icon({
        iconUrl: '/images/redeq.png',
        iconSize:     [9, 9], // size of the icon

    });

    var red2 = L.icon({
        iconUrl: '/images/redeq.png',
        iconSize:     [18, 18], // size of the icon

    });

    var red3 = L.icon({
        iconUrl: '/images/redeq.png',
        iconSize:     [27, 27], // size of the icon

    });

    var yellow1 = L.icon({
        iconUrl: '/images/yelloweq.png',
        iconSize:     [9, 9], // size of the icon

    });

    var yellow2 = L.icon({
        iconUrl: '/images/yelloweq.png',
        iconSize:     [18, 18], // size of the icon

    });

    var yellow3 = L.icon({
        iconUrl: '/images/yelloweq.png',
        iconSize:     [27, 27], // size of the icon

    });

    var green1 = L.icon({
        iconUrl: '/images/green.png',
        iconSize:     [9, 9], // size of the icon

    });

    var green2 = L.icon({
        iconUrl: '/images/green.png',
        iconSize:     [18, 18], // size of the icon

    });

    var green3 = L.icon({
        iconUrl: '/images/green.png',
        iconSize:     [27, 27], // size of the icon

    });

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
            style : patahanStyle,
        }).addTo(map); //add patahan symbol

        // L.geoJSON(worldPlates, {
        //     style: subduksiStyle,
        //     onEachFeature: onEachFeature
        // }).addTo(mymap);

        //plot subduction
        L.geoJSON(subDuksi, {
            style: subduksiStyle
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
</script>
@endsection