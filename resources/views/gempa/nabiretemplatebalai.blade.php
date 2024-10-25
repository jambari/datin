
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

    .kota {
        font-size: ;
        color: black;
        background-color: white;
        border: 3px solid #FF0000;
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
  color: white;
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
    <div class="row">
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
                        <div class="col-md-8 col-md-offset-2" id="balai" >
                            <div id="streetmap-baru">
                                <img src=" {{ asset('images') }}/header-balai-sep-2024.png" alt="logo" width="100%" height="20%" style="" >
                                    <div id="map-baru" style="width:99%;height:500px;"></div>
                                <p class="text-center " style="" > <strong class="" >Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] ?? '-' }}), Kedlmn:{{ $event['depth'] }} Km @if($event->terasa) {{ $event->terdampak }} @endif ::BMKG-NBPI</strong> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2" style="display:flex; justify-content: center; ">
        <input type="text" name="" id="isiSms" hidden value="Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] ?? '-' }}), Kedlmn:{{ $event['depth'] }} Km ::BMKG-PGR-V" >
        <button class="btn btn-primary btn-lg" onclick="copySms()" onmouseout="outFunc()"> <i class="la la-copy"></i>  <span class="tooltiptext" id="myTooltip">Salin pesan </span></button>
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
   <script src="{{ asset('gjson') }}/batasinapng.js" > </script>
   <script src="{{ asset('gjson') }}/indofaults.js">
</script>
        <script>
var mymap = L.map('map-baru').setView([{{ $event['lintang'] }}, {{ $event['bujur'] }}], 7);
    // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
     var layer = L.esri.basemapLayer('Imagery').addTo(mymap);
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
        L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {icon: eqIcon}).addTo(mymap);
        //style for subduksi and patahan
        var patahanStyle = {
            "color": "#ffff00",
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
        //Papua New Guinea
        var pngStyle = {
            fillColor: '#0AA53E',
            weight: 1,
            opacity: 1,
            color: '#0AA53E',  //Outline color
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
    L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {icon: pulsingIcon}).addTo(mymap);
    L.marker([{{ $event['lintang'] }}, {{ $event['bujur'] }}], {icon: whiteIcon}).addTo(mymap);
    // KOta di Papua
// -2.54;140.7;KOTA JAYAPURA;;;
    var Jayapura = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Jayapura'+'</div></div>'
        });
    L.marker([-2.56, 140.7], {icon: Jayapura}).addTo(mymap);
// -2.576;140.515;SENTANI;;;
    var Sentani = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Sentani'+'</div></div>'
        });
    L.marker([-2.58, 140.350], {icon: Sentani}).addTo(mymap);
// -1.183;136.09;BIAK;;;
    var biak = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Biak'+'</div></div>'
        });
    L.marker([-1.183, 136.09], {icon: biak}).addTo(mymap);
// -6.083;140.316;TANAH MERAH;;;
    var tanahmerah = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Tanah Merah'+'</div></div>'
        });
    L.marker([-6.083, 140.316], {icon: tanahmerah}).addTo(mymap);
// -4.066;138.966;WAMENA;;;
    var wamena = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Wamena'+'</div></div>'
        });
    L.marker([-4.066, 138.966], {icon: wamena}).addTo(mymap);
// -3.026;140.751;ARSO;;;
    var arso = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Arso'+'</div></div>'
        });
    L.marker([-3.026, 140.515], {icon: arso}).addTo(mymap);
// -1.88;136.24;SERUI;;;
    var serui = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Serui'+'</div></div>'
        });
    L.marker([-1.88, 136.24], {icon: serui}).addTo(mymap);
// -8.466;140.383;MERAUKE;;;
    var merauke = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Merauke'+'</div></div>'
        });
    L.marker([-8.466, 140.383], {icon: merauke}).addTo(mymap);
// -4.542;136.888;TIMIKA;;;
    var timika = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Timika'+'</div></div>'
        });
    L.marker([-4.542, 136.888], {icon: timika}).addTo(mymap);
// -3.363;135.503;NABIRE;;;
    var nabire = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Nabire'+'</div></div>'
        });
    L.marker([-3.363, 135.503], {icon: nabire}).addTo(mymap);
// -3.833;136.35;ENAROTALI;;;
    var enarotali = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Enarotali'+'</div></div>'
        });
    L.marker([-3.833, 136.35], {icon: enarotali}).addTo(mymap);
// -4.98;140.56;OKSIBIL;;;
    var oksibil = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Oksibil'+'</div></div>'
        });
    L.marker([-4.98, 140.56], {icon: oksibil}).addTo(mymap);
// -1.877;138.753;SARMI;;;
    var sarmi = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Sarmi'+'</div></div>'
        });
    L.marker([-1.877, 138.753], {icon: sarmi}).addTo(mymap);
// -2.26;136.37;WAREN;;;
    var waren = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Waren'+'</div></div>'
        });
    L.marker([-2.26, 136.37], {icon: waren}).addTo(mymap);
// -4.69;139.35;SUMOHAI;;;
    var sumohai = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Sumohai'+'</div></div>'
        });
    L.marker([-4.69, 139.35], {icon: sumohai}).addTo(mymap);
// -2.92;132.298;FAK FAK;;;
    var fakfak = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Fak Fak'+'</div></div>'
        });
    L.marker([-2.92, 132.298], {icon: fakfak}).addTo(mymap);
// -3.67;133.77;KAIMANA;;;
    var kaimana = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kaimana'+'</div></div>'
        });
    L.marker([-3.67, 133.77], {icon: kaimana}).addTo(mymap);
// -0.86;134.07;MANOKWARI;;;
    var manokwari = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Manokwari'+'</div></div>'
        });
    L.marker([-0.86, 134.07], {icon: manokwari}).addTo(mymap);
// -2.12;133.54;BINTUNI;;;
    var bintuni = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Bintuni'+'</div></div>'
        });
    L.marker([-2.12, 133.54], {icon: bintuni}).addTo(mymap);
// -0.87;131.25;SORONG;;;
    var sorong = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Sorong'+'</div></div>'
        });
    L.marker([-0.87, 131.25], {icon: sorong}).addTo(mymap);
// -0.395;130.803;WAISAI;;;
    var waisai = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Waisai'+'</div></div>'
        });
    L.marker([-0.395, 130.803], {icon: waisai}).addTo(mymap);
// -1.45;132.01;TEMINABUAN;
    var teminabuan = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Teminabuan'+'</div></div>'
        });
    L.marker([-1.45, 132.01], {icon: teminabuan}).addTo(mymap);

    var burmeso = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Burmeso'+'</div></div>'
        });
    L.marker([-2.2924926,137.9408979], {icon: burmeso}).addTo(mymap);

    var tiom = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Tiom'+'</div></div>'
        });
    L.marker([-3.9101567,138.2232873], {icon: tiom}).addTo(mymap);

    var kobakma = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kobakma'+'</div></div>'
        });
    L.marker([-3.6742549,139.0300932], {icon: kobakma}).addTo(mymap);

    var kenyam = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kenyam'+'</div></div>'
        });
    L.marker([-4.7423377,137.9995179], {icon: kenyam}).addTo(mymap);

    var karubaga = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Karubaga'+'</div></div>'
        });
    L.marker([-3.6806004,138.4764141], {icon: karubaga}).addTo(mymap);

    var elelim = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Elelim'+'</div></div>'
        });
    L.marker([-3.7895042,139.3426653], {icon: elelim}).addTo(mymap);

    var tigi = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Tigi'+'</div></div>'
        });
    L.marker([-4.1194254,135.9528699], {icon: tigi}).addTo(mymap);

    var kamu = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kamu'+'</div></div>'
        });
    L.marker([-4.0225043,136.0190348], {icon: kamu}).addTo(mymap);

    var sugapa = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Sugapa'+'</div></div>'
        });
    L.marker([-2.7335771,136.4956937], {icon: sugapa}).addTo(mymap);

    var ilaga = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Ilaga'+'</div></div>'
        });
    L.marker([-4.0317089,137.3660855], {icon: ilaga}).addTo(mymap);

    var mulia = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Mulia'+'</div></div>'
        });
    L.marker([-3.7291775,137.9732973], {icon: mulia}).addTo(mymap);

    var ransiki = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Ransiki'+'</div></div>'
        });
    L.marker([-1.5066425,134.1681635], {icon: ransiki}).addTo(mymap);

    var anggi = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Anggi'+'</div></div>'
        });
    L.marker([-1.3086999,133.8620243], {icon: anggi}).addTo(mymap);

    var rasiei = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Rasiei'+'</div></div>'
        });
    L.marker([-2.8301985,134.4022942], {icon: rasiei}).addTo(mymap);

    var aimas = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Aimas'+'</div></div>'
        });
    L.marker([-0.9622842,131.3304748], {icon: aimas}).addTo(mymap);

    var kumurkek = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kumurkek'+'</div></div>'
        });
    L.marker([-1.2583064,132.501441], {icon: kumurkek}).addTo(mymap);

    var fef = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Fef'+'</div></div>'
        });
    L.marker([-0.7871,132.3956395], {icon: fef}).addTo(mymap);


    var agats = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Agatsts'+'</div></div>'
        });
    L.marker([-5.5358348,138.1304466], {icon: agats}).addTo(mymap);

    var kepi = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Kepi'+'</div></div>'
        });
    L.marker([-6.5378348,139.2890871], {icon: kepi}).addTo(mymap);

    var anumbob = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Anumbob'+'</div></div>'
        });
    L.marker([-8.25256,140.2623855], {icon: anumbob}).addTo(mymap);

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
              tooltip.innerHTML = "Pesan telah disalin ";
            /* Alert the copied text */
            // alert("Pesan disalin: " + copyText.value);
        }

        function outFunc() {
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Salin pesan";
        }

    </script>

@endsection
