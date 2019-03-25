
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

    #map {
        border: 3px solid lightgray;
        border-radius: 10px;
        margin-bottom: 10px;
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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Info Gempabumi</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="streetmap">
                                <img src=" {{ asset('images') }}/logo.jpg " alt="logo" width="100%" height="20%" style="margin-bottom: 15px" > 
                                    <div id="map" style="width:85%;height:500px;"></div> 
                                <p class="text-center" style="font-size: 1.1em; margin-left:5%;margin-right:5%;" > <strong>{{ $sms }} </strong> </p>
                                <img src=" {{ asset('images') }}/medsos4.png " alt="logo" width="100%" height="20%" style="border-radius: 7px;">  
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
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>

    <script>        
        var mymap = L.map('map').setView([{{ $lat }}, {{ $lon }}], 7);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        }).addTo(mymap);

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [40, 40], // size of the icon
        });
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
    L.marker([{{ $lat }}, {{ $lon }}], {icon: cssIcon}).addTo(mymap);
    </script>

@endsection