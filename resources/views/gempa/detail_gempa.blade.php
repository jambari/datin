@extends('main') 
@section('title')
<title>Gempabumi - Stasiun Geofisika Kelas I Jayapura</title>
@endsection 
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
<style type="text/css" media="screen">
    #streetmap {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }


    .css-icon {

    }

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

  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    margin: 3px; 
    margin-right: 10px;
  }


#isi {


}
</style>

@endsection 
@section('content')
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
<div class="container">
    <div class="row">
        <div class="col align-self-center">
            <div class="alert alert-warning">
                <p>
                    Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] }}), Kedlmn:{{ $event['depth'] }} Km ::BMKG-JAY
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <label for="basemap" class="form-control">Pilih Jenis Peta</label>
              <select name="basemaps" id="basemaps" onChange="changeBasemap(basemaps)" class="form-control">
                <option value="NationalGeographic" selected >National Geographic</option>
                <option value="Topographic">Topographic</option>
                <option value="Streets">Streets</option>
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
<!-- this is eq map -->
<div class="container" id="isi" >
    <div class="row" style="margin: px;">
        <div class="col-md-12 col-lg-12">
            <div id="streetmap">
                <div id="map" style="width:100%;height:550px; border-radius: 5px;"></div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- eq parameter -->
<div class="container" >
    <div class="row" style="margin: px;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('images/mag.png') }}" alt="Magnitude" aria-hidden="true"> Magnitudo
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-size:1.5em" >M <span class="badge badge-danger">{{ $mag }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('images/clock.png') }}" alt="waktu gempa" aria-hidden="true"> Waktu Gempa
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $tanggalindo }} {{ $jamwit }} WIT</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="fa fa-map-marker text-danger" style="font-size: 2.5em;" aria-hidden="true"></i> Lokasi
                </div>
                <div class="card-body">
                    <p class="card-text">Lokasi: {{ $lat }} , {{ $lon }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('images/kedalaman.png ') }}" alt="depth" aria-hidden="true"> Kedalaman
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
<div class="container" >
    <div class="row" style="margin: px;">
        <div class="col-md-12">
            <img class="img-responsive" src=" {{ asset('images') }}/medsos2.JPG " alt="logo" width="100%" height="%" style="" >
        </div>
    </div>
</div>
@endsection @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{ asset('js') }}/jquery.fittext.js"> </script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

<script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
<script src="{{ asset('gjson') }}/patahan.js">
</script>
<script src="{{ asset('gjson') }}/subduksi.js">
</script>
<script src="{{ asset('gjson') }}/plates.js">
</script>

<script>
    var mymap = L.map('map').setView([{{ $event['lintang'] }}, {{ $event['bujur'] }}], 7);
    // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
     var layer = L.esri.basemapLayer('NationalGeographic').addTo(mymap);
      var layerLabels;

  function setBasemap(basemap) {
    if (layer) {
      mymap.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    mymap.addLayer(layer);

    if (layerLabels) {
      mymap.removeLayer(layerLabels);
    }

    if (basemap === 'ShadedRelief'
     || basemap === 'Oceans'
     || basemap === 'Gray'
     || basemap === 'DarkGray'
     || basemap === 'Terrain'
   ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      mymap.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      mymap.addLayer(layerLabels);
    }
  }

  function changeBasemap(basemaps){
    var basemap = basemaps.value;
    setBasemap(basemap);
  }

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [35, 35], // size of the icon
        });


        // var pulsingIcon = L.icon.pulse({iconSize:[50,50],color:'red'});

        L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {icon: eqIcon}).addTo(mymap);
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
            style : patahanStyle,
        }).addTo(mymap); //add patahan symbol

        // L.geoJSON(worldPlates, {
        //     style: subduksiStyle,
        //     onEachFeature: onEachFeature
        // }).addTo(mymap);

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
          ,iconSize: [100,100]
          // ,iconAnchor: [11,11]
        });

    //add css icon as gps ring
    L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {icon: cssIcon}).addTo(mymap);
</script>
@endsection