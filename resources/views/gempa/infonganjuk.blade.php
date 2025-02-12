
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
    .kota {
        color: black;
        background-color: white;
        border: 3px solid #FF0000;
    }
    .css-icon {

        }

    .white-icon {
      /*background-color: white;*/
/*      border-radius: 100px;
      height: 30px;
      width: 30px;*/
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

  #streetmap-baru {
    border: 2px solid black;
  }

  /*Wraperclass for the divicon*/
.map-label {
  position: absolute;
  bottom: 0;left: -50%;
  display: flex;
  flex-direction: column;
  text-align: center;
  border-radius: 50%;
}
/*Wrap the content of the divicon (text) in this class*/
.map-label-content {
  order: 1;
  position: relative; left: -50%;
  /*background-color: #fff;*/
  /*border-radius: 5px;*/
  /*border-width: 2px;*/
  /*border-style: solid;*/
  /*border-color: #444;*/
  padding: 3px;
  white-space: nowrap;
  color: black;
}
/*Add this arrow*/
.map-label-arrow {
  order: 2;
  width: 0px; height: 0px; left: 50%;
  border-style: solid;
  border-color: #444 transparent transparent transparent;
  border-width: 10px 6px 0 6px; /*[first number is height, second/fourth are rigth/left width]*/
  margin-left: -6px;
}

/*Instance classes*/
.map-label.inactive {
  opacity: 0.5;
}

.map-label.redborder > .map-label-content {
  border-color: #e00;
}
.map-label.redborder > .map-label-arrow {
  border-top-color: #e00;
}

.map-label.redbackground > .map-label-content {
  white-space: default;
  color: #fff;
  background-color: #e00;
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
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
              <label for="basemap" class="form-control">Modifikasi Peta</label>
              <select name="basemaps" id="basemaps" onChange="changeBasemap(basemaps)" class="form-control">
                <option value="NationalGeographic"  >National Geographic</option>
                <option value="Topographic">Topographic</option>
                <option value="Streets">Streets</option>
                <option value="Oceans">Oceans</option>
                <option value="Gray">Gray</option>
                <option value="DarkGray">Dark Gray</option>
                <option value="Imagery">Imagery</option>
                <option value="ImageryClarity" selected>Imagery (Clarity)</option>
                <option value="ImageryFirefly">Imagery (Firefly)</option>
                <option value="ShadedRelief">Shaded Relief</option>
                <option value="Physical">Physical</option>
              </select>
{{--               <br>
              <select name="Kota" id="kota" onChange="changeKota(basemaps)" class="form-control">
                <option value="NyalakanKota"  >Munculkan Kota</option>
                <option value="HilangkanKota">Hilangkan Kota</option>
              </select> --}}
            </div>
        </div>
    </div> -->
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
                        <div class="col-md-8 col-md-offset-2" style="" >
                            <div class="row" >
                              <div class="col-md-12" id="balai" >
                                  <div id="streetmap-baru">
                                      <!-- {{-- <img src=" {{ asset('images') }}/stageof_nabire.png " alt="logo" width="100%" height="20%" style="margin-bottom: 15px" >  --}} -->
                                      <!-- <img src=" {{ asset('images') }}/logo_nabire_baru.jpg " alt="logo" width="100%" height="20%" style="" > -->
                                          <div id="map-baru" style="width:99%;height:500px;"></div>
                                      <p class="text-center " style="" > <strong class="" >
                                        Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwib }} WIB, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] }}), Kedlmn:{{ $event['depth'] }} Km @if($event->terasa) {{ $event->terdampak }} @endif ::BMKG-SJI
                                      </strong> </p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Old Design --}}

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
   <link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
    <script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" ></script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
   <script src="{{ asset('gjson') }}/png.js" > </script>
   <script src="{{ asset('gjson') }}/indofaults.js"></script>
   <script src="{{ asset('gjson') }}/batasinapng.js" > </script>
   
        <script>
var mymap = L.map('map-baru').setView([{{ $latmap }}, {{ $lonmap }}], 7);
//     // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
//      var layer = L.esri.basemapLayer('Streets').addTo(mymap);
//       var layerLabels;

// var mymap = L.map('map-baru').setView([{{ $latmap }}, {{ $lonmap }}], 7);
// // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
//  // var layer = L.esri.basemapLayer('NationalGeographic').addTo(mymap);
//  //  var layerLabels;
//
 L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
maxZoom: 18,
attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(mymap);

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

  //change kota
 function changeKota(kota){
    var kota = kota.value;
      if (kota === 'NyalakanKota') {
            var timika = L.divIcon({
          // Specify a class name we can refer to in CSS.
              className: 'kota',
              html: '<div class="map-label"><div class="map-label-content">'+'Timika'+'</div></div>'
            });
         L.marker([-4.542, 136.888], {icon: timika}).addTo(mymap);
      } else {

      }
  }
        // var mymap = L.map('map-baru').setView([{{ $lat }}, {{ $lon }}], 7);

        // L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        //     maxZoom: 18
        // }).addTo(mymap);

        // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', { maxZoom: 18, id: 'mapbox.satellite' }).addTo(mymap);

        var eqIcon = L.icon({
            iconUrl: '/images/earthquake.png',

            iconSize:     [40, 40], // size of the icon
        });
        L.marker([{{ $latmap }}, {{ $lonmap }}], {icon: eqIcon}).addTo(mymap);
        //style for subduksi and patahan
        var patahanStyle = {
            "color": "#F64B3C",
            "weight": 0.7,
            "opacity": 0.9
        };
        //style for subduksi

        var subduksiStyle = {
            "color": "#E04D01",
            "weight": 1,
            "opacity": 0.8,
            "fillColor": 'transparent',
        };
        //Papua New Guinea
        var pngStyle = {
            fillColor: '#FFFFDD',
            weight: 1,
            opacity: 1,
            color: '#FFFFDD',  //Outline color
            fillOpacity: 1
        };
        //add PNG to Map
        L.geoJSON(png, {
            style : pngStyle,
        }).addTo(mymap);
        //batas Ina PNG
        var batasStyle = {
            fillColor: '#D31B1B',
            weight: 2,
            opacity: 1,
            color: '#D31B1B',  //Outline color
            fillOpacity: 1
        };
        //add PNG to Map
        L.geoJSON(batasInapng, {
            style : batasStyle,
        }).addTo(mymap);


    var pulsingIcon = L.icon.pulse({iconSize:[30,30],color:'red'});

        function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
            if (feature.properties && feature.properties.PlateName) {
                layer.bindPopup(feature.properties.PlateName);
            }
        }

        // L.geoJSON(pataHan, {
        //     style : patahanStyle,
        // }).addTo(mymap); //add patahan symbol

        // L.geoJSON(worldPlates, {
        //     style: subduksiStyle,
        //     onEachFeature: onEachFeature
        // }).addTo(mymap);

        //plot subduction
        // L.geoJSON(subDuksi, {
        //     style: subduksiStyle
        // }).addTo(mymap);

        L.geoJSON(indoFaults, {
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
        var whiteIcon = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'white-icon',
          html: '<div class="white-icon"></div>'
          // Set marker width and height
          ,iconSize: [100,100]
          // ,iconAnchor: [11,11]
        });

    //add css icon as gps ring
    L.marker([{{ $latmap }}, {{ $lonmap }}], {icon: pulsingIcon}).addTo(mymap);
    L.marker([{{ $latmap }}, {{ $lonmap }}], {icon: whiteIcon}).addTo(mymap)
    </script>

@endsection
