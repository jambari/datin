
@extends('backpack::layout')
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
        font-size: ;
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

.tooltip {
  position: relative;
  display: inline-block;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 140px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -75px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
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
                <div class="box-body"  >
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2" style="padding: %; background-color: #FBE3A1;">
                            <div class="row" >
                                <div class="col-md-12" >
                                    <div id="streetmap-baru">
        <!--                                 {{-- <img src=" {{ asset('images') }}/stageof_nabire.png " alt="logo" width="100%" height="20%" style="margin-bottom: 15px" >  --}}
                                        <img src=" {{ asset('images') }}/logo_nabire_baru.jpg " alt="logo" width="100%" height="20%" style="" > -->
                                        <div style="display: inline-flex; padding-top: 0.5%;" >
                                            <div>
                                                <img src=" {{ asset('images') }}/logo-bmkg.png " alt="logo" width="20%" height="%" style=" margin-left: -50%;">
                                            </div>
                                            <div>
                                                <h1 style="margin-left: -25%; padding-bottom: 1%;" > STASIUN GEOFISIKA SORONG 
                                            </div>
                                        </div>
                                        <div id="map-baru" style="width:99%;height:500px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="padding: 2%; background-color: #FBE3A1;" >
                                        <p class="text-center " style=" font-size: 1.5em; " > <strong class="" >
                                            Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] }}), Kedlmn:{{ $event['depth'] }} Km @if($event->terasa) {{ $event->terdampak }} @endif ::BMKG-SWI
                                        </strong> </p>
                                </div>
                            </div>
                            <div class="row" style="padding:1%; background-color: #f7b90e" >
                                <div class="col-md-3" style="font-size:1.5em; font-family: cursive;" > <i class="la la-facebook text-primary" ></i> @Stageof.swisorong</div>
                                <div class="col-md-3" style="font-size:1.5em; font-family: cursive; "><i class="la la-twitter text-primary" ></i>@infoBMKGSorong</div>
                                <div class="col-md-3" style="font-size:1.5em; font-family: cursive; "> <i class="la la-instagram text-danger" ></i> @stageof.sorong</div>
                                <div class="col-md-3" style="font-size:1.5em; font-family: cursive; "> <i class="la la-whatsapp text-success" ></i> 082397021409</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <input type="text" name="" id="isiSms" hidden value="Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] }}), Kedlmn:{{ $event['depth'] }} Km ::BMKG-SWI" >
        <button class="btn btn-primary btn-lg btn-block" onclick="copySms()" onmouseout="outFunc()"> <i class="la la-copy"></i>  <span class="tooltiptext" id="myTooltip">Salin pesan </span></button>
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
     var layer = L.esri.basemapLayer('Streets').addTo(mymap);
      var layerLabels;

// var mymap = L.map('map-baru').setView([{{ $latmap }}, {{ $lonmap }}], 7);
// // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
//  // var layer = L.esri.basemapLayer('NationalGeographic').addTo(mymap);
//  //  var layerLabels;
//
//  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
// maxZoom: 18,
// attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
// }).addTo(mymap);

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
    L.marker([{{ $latmap }}, {{ $lonmap }}], {icon: whiteIcon}).addTo(mymap);
    // KOta di Papua
// -2.54;140.7;KOTA JAYAPURA;;;
//     var Jayapura = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Jayapura'+'</div></div>'
//         });
//     L.marker([-2.56, 140.7], {icon: Jayapura}).addTo(mymap);
// // -2.576;140.515;SENTANI;;;
//     var Sentani = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Sentani'+'</div></div>'
//         });
//     L.marker([-2.58, 140.350], {icon: Sentani}).addTo(mymap);
// // -1.183;136.09;BIAK;;;
//     var biak = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Biak'+'</div></div>'
//         });
//     L.marker([-1.183, 136.09], {icon: biak}).addTo(mymap);
// // -6.083;140.316;TANAH MERAH;;;
//     var tanahmerah = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Tanah Merah'+'</div></div>'
//         });
//     L.marker([-6.083, 140.316], {icon: tanahmerah}).addTo(mymap);
// // -4.066;138.966;WAMENA;;;
//     var wamena = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Wamena'+'</div></div>'
//         });
//     L.marker([-4.066, 138.966], {icon: wamena}).addTo(mymap);
// // -3.026;140.751;ARSO;;;
//     var arso = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Arso'+'</div></div>'
//         });
//     L.marker([-3.026, 140.515], {icon: arso}).addTo(mymap);
// // -1.88;136.24;SERUI;;;
//     var serui = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Serui'+'</div></div>'
//         });
//     L.marker([-1.88, 136.24], {icon: serui}).addTo(mymap);
// // -8.466;140.383;MERAUKE;;;
//     var merauke = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Merauke'+'</div></div>'
//         });
//     L.marker([-8.466, 140.383], {icon: merauke}).addTo(mymap);
// // -4.542;136.888;TIMIKA;;;
//     var timika = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Timika'+'</div></div>'
//         });
//     L.marker([-4.542, 136.888], {icon: timika}).addTo(mymap);
// // -3.363;135.503;NABIRE;;;
//     var nabire = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Nabire'+'</div></div>'
//         });
//     L.marker([-3.363, 135.503], {icon: nabire}).addTo(mymap);
// // -3.833;136.35;ENAROTALI;;;
//     var enarotali = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Enarotali'+'</div></div>'
//         });
//     L.marker([-3.833, 136.35], {icon: enarotali}).addTo(mymap);
// // -4.98;140.56;OKSIBIL;;;
//     var oksibil = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Oksibil'+'</div></div>'
//         });
//     L.marker([-4.98, 140.56], {icon: oksibil}).addTo(mymap);
// // -1.877;138.753;SARMI;;;
//     var sarmi = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Sarmi'+'</div></div>'
//         });
//     L.marker([-1.877, 138.753], {icon: sarmi}).addTo(mymap);
// // -2.26;136.37;WAREN;;;
//     var waren = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Waren'+'</div></div>'
//         });
//     L.marker([-2.26, 136.37], {icon: waren}).addTo(mymap);
// // -4.69;139.35;SUMOHAI;;;
//     var sumohai = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Sumohai'+'</div></div>'
//         });
//     L.marker([-4.69, 139.35], {icon: sumohai}).addTo(mymap);
// // -2.92;132.298;FAK FAK;;;
//     var fakfak = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Fak Fak'+'</div></div>'
//         });
//     L.marker([-2.92, 132.298], {icon: fakfak}).addTo(mymap);
// // -3.67;133.77;KAIMANA;;;
//     var kaimana = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Kaimana'+'</div></div>'
//         });
//     L.marker([-3.67, 133.77], {icon: kaimana}).addTo(mymap);
// // -0.86;134.07;MANOKWARI;;;
//     var manokwari = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Manokwari'+'</div></div>'
//         });
//     L.marker([-0.86, 134.07], {icon: manokwari}).addTo(mymap);
// // -2.12;133.54;BINTUNI;;;
//     var bintuni = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Bintuni'+'</div></div>'
//         });
//     L.marker([-2.12, 133.54], {icon: bintuni}).addTo(mymap);
// // -0.87;131.25;SORONG;;;
//     var sorong = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Sorong'+'</div></div>'
//         });
//     L.marker([-0.87, 131.25], {icon: sorong}).addTo(mymap);
// // -0.395;130.803;WAISAI;;;
//     var waisai = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Waisai'+'</div></div>'
//         });
//     L.marker([-0.395, 130.803], {icon: waisai}).addTo(mymap);
// // -1.45;132.01;TEMINABUAN;;;
//     var teminabuan = L.divIcon({
//           // Specify a class name we can refer to in CSS.
//           className: 'kota',
//           html: '<div class="map-label"><div class="map-label-content">'+'Teminabuan'+'</div></div>'
//         });
//     L.marker([-1.45, 132.01], {icon: teminabuan}).addTo(mymap);

//PNG
    // var Png = L.divIcon({
    //       // Specify a class name we can refer to in CSS.
    //       html: 'Papua New Guinea'
    //     });
    // L.marker([-4.985, 142.36], {icon: Png}).addTo(mymap);
// -2.576;140.515;SENTANI;;;


            function copySms() {
            /* Get the text field */
            var copyText = document.getElementById("isiSms");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Pesan telah disalin : "+copyText.value ;
            /* Alert the copied text */
            // alert("Pesan disalin: " + copyText.value);
        }

        function outFunc() {
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Salin pesan";
        }

    </script>

@endsection
