@extends('main')
@section('title')
<title>detail Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>
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
            0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
            50% {opacity: 1.0;}
            100% {opacity: 1.0;}
    }
</style>
@endsection
@endsection

@section('content')
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/gempa" class="text-primary" >Gempabumi</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12 col-lg-12">
            <div id="streetmap">
                <img src=" {{ asset('images') }}/logo.jpg " alt="logo" width="100%" height="20%" style="margin-bottom: 15px" > 
                    <div id="map" style="width:85%;height:500px;"></div> 
                    <p style="margin-top: 1%;">
                    	{{ $event['tanggal'] }} {{ $event['origin'] }} UTC
                    </p>
                    <p>
                    	Magnitudo <span class="badge badge-primary">{{ $event['magnitudo'] }}</span>
	                </p>
                    <p>
                    	Lokasi: {{ $event['lintang'] }} , {{ $event['bujur'] }}
                    </p>
                    <p>
                    	Kedalaman: {{ $event['depth'] }} Km
                    </p>
                    <p>
                    	{{ $event['ket'] }}
                    </p>
                    <p>
                    	{{ $event['terdampak'] or ' '}}
                    </p>
            </div>
	    </div>
	</div>
</div>
<br>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>

    <script>
        var mymap = L.map('map').setView([{{ $event['lintang'] }}, {{ $event['bujur'] }}], 7);

        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        }).addTo(mymap);

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [40, 40], // size of the icon
        });
        L.marker([ {{$event['lintang'] }}, {{ $event['bujur'] }}], {icon: eqIcon}).addTo(mymap);
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
    L.marker([{{$event['lintang'] }}, {{ $event['bujur'] }}], {icon: cssIcon}).addTo(mymap);
    </script>
@endsection