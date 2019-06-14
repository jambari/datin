
@extends('backpack::layout')
<style>
    #peta {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    #streetmap {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    #peta-baru {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }

    #streetmap-baru {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /*border: 2px solid #000000;*/
/*background: -webkit-linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));
background: linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));*/
        /*background: #2C6AFF;*/
    }
    #streetmap-baru p {
         color: #313131;
         font-size: 1.3em; 
         margin-left:5%;
         margin-right:5%; 
         padding-top: 1.5%;
         font-family: courier;
    }

    #map {
        border: 3px solid lightgray;
        border-radius: 10px;
        margin-bottom: 10px;
    }
#map-baru {
/*        border: 3px solid lightgray;
        border-radius: 10px;*/
/*        margin-bottom: 10px;*/
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
            0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
            50% {opacity: 1.0;}
            100% {opacity: 1.0;}
    }
  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    margin: 3px; 
    margin-right: 10px;
  }
</style>

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">info gempa</li>
      </ol>
    </section>
@endsection

@section('content')
{{-- Baru Uji Coba balai --}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Info Gempabumi</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="streetmap-baru">
                                <p class="text-center " style="" > <strong class="" >{{ $sms }} </strong> </p>
                                    <div id="map-baru" style="width:100%;height:500px;"></div>
                                    <img src=" {{ asset('images') }}/blue.png " alt="logo" width="100%" height="20%" style="" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
    <script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
    <script>
    var mymap = L.map('map-baru').setView([{{ $lat }}, {{ $lon }}], 7);
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
        //Sebelum Pilih Basemap
        // var mymap = L.map('map-baru').setView([{{ $lat }}, {{ $lon }}], 7);

        // L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
        //     maxZoom: 18
        // }).addTo(mymap);

        // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', { maxZoom: 18, id: 'mapbox.light' }).addTo(map);

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [35, 35], // size of the icon
        });
        var pulsingIcon = L.icon.pulse({iconSize:[50,50],color:'red'});
        L.marker([{{ $lat }}, {{ $lon }}], {icon: eqIcon}).addTo(mymap);
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
    L.marker([{{ $lat }}, {{ $lon }}], {icon: pulsingIcon}).addTo(mymap);
    </script>

@endsection