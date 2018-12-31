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
        <div class="col-md-9 col-md-offset-2">
            <div class="box box-solid">
                <div class="box-header with-border">
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
                            <div id="peta">
                                <img src=" {{ asset('images') }}/logo.jpeg " alt="logo" width="700px" height="80px" style="margin-bottom: 15px" > 
    
                                <img src=" {{ asset('images') }}/lapenda.jpg " alt="lapenda" width="600px" height="390px" style="margin-bottom: 15px;">
                                <p class="text-center" style="color: black; font-size: 1em; margin-left:5%;margin-right:5%;" > <strong>{{ $sms }} </strong> </p>
                                <img src=" {{ asset('images') }}/medsos2.png " alt="logo" width="700px" height="50px" ">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                        <button onclick="take()" class="btn btn-block btn-success" > Download peta </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Zoom In Peta di bawah ini untuk memastikan gempa di darat atau di laut</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="streetmap">
                                <img src=" {{ asset('images') }}/logo.jpeg " alt="logo" width="100%" height="20%" style="margin-bottom: 15px" > 
                                    <div id="map" style="width:85%;height:500px;"></div> 
                                <p class="text-center" style="font-size: 1.1em; margin-left:5%;margin-right:5%;" > <strong>{{ $sms }} </strong> </p>
                                <img src=" {{ asset('images') }}/medsos2.png " alt="logo" width="100%" height="20%" ">  
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

    <script>

        window.take = function() {
        html2canvas(document.getElementById("peta"), {
            onrendered: function (canvas) {
                var base64image = canvas.toDataURL();
                // window.open(base64image , "_blank");
                var newWindow = window.open();
                newWindow.document.write('<img src="' + base64image + '" />'); 
            }
        })
        };
        

        var mymap = L.map('map').setView([{{ $lat }}, {{ $lon }}], 7);

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [40, 40], // size of the icon
        });
        L.marker([{{ $lat }}, {{ $lon }}], {icon: eqIcon}).addTo(mymap);

		// Define an icon called cssIcon
		var cssIcon = L.divIcon({
		  // Specify a class name we can refer to in CSS.
		  className: 'css-icon',
		  html: '<div class="gps_ring"></div>'
		  // Set marker width and height
		  ,iconSize: [100,100]
		  // ,iconAnchor: [11,11]
		});

		// Create three markers and set their icons to cssIcon
		L.marker([{{ $lat }}, {{ $lon }}], {icon: cssIcon}).addTo(mymap);

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("Koordinat gempa " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);
        </script>

@endsection