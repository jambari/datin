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
    body {
               background-color: #000000;
    }

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
   .medsos {
   height:350px;
   overflow-y: scroll;
   display: block;
   }
   #timeline {
	background: 
    linear-gradient(
      rgba(0, 0, 0, 0.6),
      rgba(0, 0, 0, 0.6)
    ),
    url('./images/seiscomp3.jpg');
   background-size: cover;
   padding-top: 6%;
   padding-bottom: 6%;
   padding-left: 4%;
   padding-right: 4%;
   }

   #forcarousel {
      background: 
      linear-gradient(
      rgba(0, 0, 0, 0.6),
      rgba(0, 0, 0, 0.6)
      );
   }

   #eq {
	   padding: 4%;
   }

   #youtube {
   }

   #video {
      padding-top: 4%;
      padding-bottom: 7%;
   }


</style>
@endsection

@section('alert')
<div class="row">
   <div class="col-md-12">
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>Welcome</strong> to Stasiun Geofisika Kelas I Angkasapura Jayapura. We are supporting <a href="https://bmkg.go.id" style="text-decoration: none;" >BMKG</a> by observing small earthquake in Papua !
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
   </div>
</div>

@endsection

@section('content')
<div class="row" id="forcarousel">
   <div class="col-md-12">
      <div class="bd-example">
         <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                  @if ($datas['articles'])
                  @foreach ($datas['articles'] as $article)
                     <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"></li> 
                  @endforeach
               @endif
            </ol>
                  <div class="carousel-inner">
                        @if ($datas['articles'])
                        @foreach ($datas['articles'] as $article)
                     <div class="carousel-item {{ $loop->first ? 'active': '' }}">
                        <img src="{{ $article->image }}" class="d-block w-100" height="650" alt="{{ $article->title }}">
                        <div class="carousel-caption d-none d-md-block">
                           <h5>{{ $article->title }}</h5>
                           {!! str_limit($article->content, $limit = 150, $end = '...') !!} <a href="#" class="text-light" >Selengkapnya! </a> </p>
                        </div>
                     </div>
                     @endforeach
                     @endif
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
<div class="row" id="eq">       
		<div class="row">
         <div class="container" >
               <div class="col-md-12">
                  <h3 class="mx-auto text-light" >Hi, thank you for being here ! </h3>
                  <h4 class="mx-auto text-light">
                     These videos below will let you understand how an earthquake and tsunami is generated.</h4>
                  <h4 class="mx-auto text-light"> All credit to <a href="https://www.youtube.com/watch?v=dJpIU1rSOFY" class="btn btn-primary" target="_blank" > Peekaboo Kidz  </a> .
                  </h4>
               </div>
         </div>
      </div>
</div>

<div class="container" id="youtube" >
  <div class="row" id="video" >
    <div class="col-md-6">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/dJpIU1rSOFY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="col-md-6">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/MfsugkikLJI?controls=0&amp;start=3" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
    </div>
  </div>
</div>

<!-- Latest K Index dan Curah Hujan -->
<div class="row" id="timeline">
  <div class="row">
      <div class="col-md-4">
        <div class="medsos" >
            <a class="twitter-timeline" href="https://twitter.com/AngkasaStageof?ref_src=twsrc%5Etfw">Tweets by AngkasaStageof</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
        </div>
      </div>
      <div class="col md-4">
        <div class="medsos" >
      <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small>3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small>Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
          </div>
        </div>
      </div>
      <div class="col md-4">
        <div class="medsos">
      <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small>3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small>Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
          <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small class="text-muted">3 days ago</small>
            </div>
            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
            <small class="text-muted">Donec id elit non mi porta.</small>
          </a>
          </div>
        </div>
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
         var mymap = L.map('map').setView([{{ $datas['gempa']['lintang'] }}, {{ $datas['gempa']['bujur'] }}], 6);
   
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

