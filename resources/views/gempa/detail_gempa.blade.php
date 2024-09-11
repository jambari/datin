@extends('mainangkasa')
@section('title')
<title>Gempabumi - Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">

<style type="text/css" media="screen">
    #streetmap {
        width: 750px;  /* Fixed size for Instagram post */
        height: 750px; /* Fixed size for Instagram post */
        /* background-color: #f0f0f0; */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between; /* Space between elements */
        padding: 10px;
        box-sizing: border-box; /* Include padding in height and width */
        border-radius: 10px; /* Optional rounded corners */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow */
    }

    #streetmap p {
         color: #313131;
         font-size: 1em;
         margin:auto;
         padding-top:1.5%;
         font-family: Courier, monospace;

    }
    .kota {
        font-size: ;
        color: black;
        background-color: white;
        border: 3px solid #FF0000;
    }
    .css-icon {

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

        #templateBalai {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

</style>

@endsection
@section('content')
<div class="row ">
	<div class="container  ">
		<div class="col-md-12 d-none d-sm-block ">
			<ol class="breadcrumb  ">
				<li class="breadcrumb-item  "><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active "><a href="/gempa/jay" class="text-primary" >Gempabumi Terkini</a></li>
			</ol>
		</div>
	</div>
</div>
        <!-- this is eq map -->
<div class="container" id="isi" >
    <div class="row" style="margin:;">
        <div class="col-md-12" id="templateBalai" >
            <div id="streetmap">
            <img src=" {{ asset('images') }}/header-balai-sep-2024.png" alt="logo" width="100%" height="20%" style="" >
                <div id="map" style="width:100%;height:550px; border-radius: 5px;"></div>
                <p class="text-center " style="" > <strong class="" >Info Gempa Mag:{{ $mag }}, {{ $tanggalindosms }} {{ $jamwit }} WIT, Lok:{{ $lat }}, {{ $lon }} ({{ $event['ket'] ?? '-' }}), Kedlmn:{{ $event['depth'] }} Km @if($event->terasa) {{ $event->terdampak }} @endif ::BMKG-JAY</strong> </p>
                </p>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{ asset('js') }}/jquery.fittext.js"> </script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
<script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
<script src="{{ asset('gjson') }}/patahan.js">
</script>
<script src="{{ asset('gjson') }}/subduksi.js">
</script>
<script src="{{ asset('gjson') }}/plates.js">
</script>
<script src="{{ asset('gjson') }}/indofaults.js">
</script>
<script src="{{ asset('gjson') }}/png.js" > </script>
<script src="{{ asset('gjson') }}/batasinapng.js" > </script>

<script>
    var mymap = L.map('map').setView([{{ $event['lintang'] }}, {{ $event['bujur'] }}], 7);
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

        var eqIcon = L.icon({
            iconUrl: '/images/earthquake.png',

            iconSize:     [35, 35], // size of the icon
        });


        // var pulsingIcon = L.icon.pulse({iconSize:[50,50],color:'red'});

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

        var indoFaultsStyle = {
            "color": "#ffff00",
            "weight": 1,
            "opacity": 0.5,
            "fillColor": 'transparent',
        }

        function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
            if (feature.properties && feature.properties.indoFaults) {
                layer.bindPopup(feature.properties.indoFaults);
            }
        }

        // L.geoJSON(pataHan, {
        //     style : patahanStyle,
        // }).addTo(mymap); //add patahan symbol

        //Papua New Guinea
        var pngStyle = {
            fillColor: '#0AA53E',
            weight: 1,
            opacity: 1,
            color: '#0AA53E',  //Outline color
            fillOpacity: 1
        };
        L.geoJSON(png, {
            style : pngStyle,
        }).addTo(mymap);
        // L.geoJSON(worldPlates, {
        //     style: subduksiStyle,
        //     onEachFeature: onEachFeature
        // }).addTo(mymap);
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
        //plot subduction
        L.geoJSON(indoFaults, {
            style: indoFaultsStyle
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


            function copySms() {
            /* Get the text field */
            var copyText = document.getElementById("isiSms");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Pesan disalin";
            /* Alert the copied text */
            // alert("Pesan disalin: " + copyText.value);
        }

        function outFunc() {
              var tooltip = document.getElementById("myTooltip");
              tooltip.innerHTML = "Salin pesan";
        }


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
// -1.45;132.01;TEMINABUAN;;;
    var teminabuan = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'kota',
          html: '<div class="map-label"><div class="map-label-content">'+'Teminabuan'+'</div></div>'
        });
    L.marker([-1.45, 132.01], {icon: teminabuan}).addTo(mymap);
</script>
@endsection
