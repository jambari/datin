


@extends('main')
@section('title')
<title>Home - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection

@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <style type="text/css">
        .leaflet-container{background-color:#c5e8ff;}
    </style>
<style>
        .css-icon {

            }

        .gps_ring {	
            border: 2px solid #FF0000;
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

@section('content')
<br>
<div class="container">
   <!-- Flash selamat datang -->
   <div class="row">
      <div class="col-md-12">
         <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Welcome</strong> to Stasiun Geofisika Kelas I Angkasapura Jayapura. We are supporting <a href="https://bmkg.go.id" style="text-decoration: none;" >BMKG</a> by observing small earthquake in Papua !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
      </div>
   </div>
   <!-- End of Flash selamat datang -->
   <!-- ........................... -->
   <!-- News Caraousel -->
   <div class="row" >
      <div class="col-md-12">
         <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="https://www.w3schools.com/bootstrap4/ny.jpg" class="d-block w-100" alt="...">
                     <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img src="https://www.w3schools.com/bootstrap4/chicago.jpg" class="d-block w-100" alt="...">
                     <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <img src="https://www.w3schools.com/bootstrap4/ny.jpg" class="d-block w-100" alt="...">
                     <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- End of Caraousel -->
   <!-- ........................... -->
   <!-- Latest Earthquake -->
   <br class="divider" >
   <div class="row">
		<h3 class="mx-auto btn btn-primary " >Latest Earthquake</h3>
		<div class="col-md-12">
			<div id="map" style="width:100%;height:600px;"></div> 
		</div>
   </div>
   <br>
   <!-- End of Latest Earthquake -->
   <!-- ........................... -->
   <!-- Latest K Index dan Curah Hujan -->
	<div class="row">
		<div class="col-md-4">
			<h1>Twitter</h1>
		</div>
		<div class="col md-4">
			<h1>Facebook</h1>
		</div>
		<div class="col md-4">
			<h1>Press Release</h1>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
   $('.alert').alert()
   // $('.alert').alert('close')
</script>

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
   	<script src="{{ asset('gjson') }}/patahan.js" > </script>
   	<script src="{{ asset('gjson') }}/subduksi.js" > </script>
	<script src="{{ asset('gjson') }}/plates.js" > </script>
	<script src="{{ asset('gjson') }}/vectormap.js" > </script>

    <script>
		var myGeoJSONPath = 'path/to/mymap.geo.json';
        var mymap = L.map('map').setView([{{ $datas['gempa']['lintang'] }}, {{ $datas['gempa']['bujur'] }}], 4);

        // L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        //     maxZoom: 18,
        //     attribution: 'Map data &copy; <a href="https://server.arcgisonline.com">ArcGis Onlinep</a> contributors, ' +
        //         '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        // }).addTo(mymap);

        var eqIcon = L.icon({
            iconUrl: '/images/icongempa.png',

            iconSize:     [20, 20], // size of the icon
		});
		
		var vectorMap = {
            stroke: false,
            fill: true,
            fillColor: '#2c3e50',
            fillOpacity: 1
		};
		
        L.marker([{{ $datas['gempa']['lintang'] }}, {{ $datas['gempa']['bujur'] }}], {icon: eqIcon}).addTo(mymap);
        //style for subduksi and patahan
        var patahanStyle = {
            "color": "#fff",
            "weight": 0.7,
            "opacity": 0.9
        };

        //style for subduksi

        var subduksiStyle = {
            "color": "#0A70C4",
            "weight": 1,
            "opacity": 0.5,
            "fillColor": 'transparent',
		};
		
		//style for vectormap

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
		
        //plot VectorMap
        L.geoJSON(VectorMap, {
            style: vectorMap
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
    L.marker([{{ $datas['gempa']['lintang'] }}, {{ $datas['gempa']['bujur'] }}], {icon: cssIcon}).addTo(mymap);
    </script>
@endsection

