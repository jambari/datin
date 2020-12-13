
@extends('main')
@section('meta')
      <meta name="description" content="Salah satu UPT BMKG yang terletak di Kota Jayapura. Stasiun Geofisika Kelas I Jayapura melakukan pengamatan gempabumi, magnetbumi, listrik udara, dan kualitas udara.">
      <meta name="keywords" content="Gempabumi terkini, Magnetbumi, Listrik Udara, Percepatan Tanah,Berita Gempabumi, Buletin, Siaran Press">
@endsection
@section('title')
<title>Home - Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<style>
html, body { 
/*    background-image: url('/images/template-of-hut-ri-75.jpg');*/
    background-size: cover;
    background-repeat: no-repeat;
 }

    .carousel-item:after {
      content:"";
      display:block;
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      right:0;
      /*background:rgba(0,0,0,0.6);*/
    }
    #lightgallery {
        display: flex;
        margin-left: auto;
        margin-right: auto;
    }


/*.mainproduct {
    margin: auto;
    padding: 10px;
}*/

#mycarousel {

}

#mycarousel div h3 {
    font-family: 'Bad Script', cursive;
    padding: 5%;

}
    .css-icon {}

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

   #bulletin {
    background:
    linear-gradient(
      rgba(0, 0, 0, 0.9),
      rgba(0, 0, 0, 0.4)
    ),
    url('./images/Indonesia_Independence.jpg');
   background-size: no-repeat;
   }

/*#videoDiv {width: 100%; min-height: 100%; position: relative;}
#videoBlock {width: 100%; min-height: 100%;  display: flex;  justify-content: center; align-items: center;}*/
/*#videoMessage {width: 100%; height:100%; position: absolute; top: 0; left: 0;}*/


@media only screen and (max-width: 768px) {
  /* For mobile phones: */

  #judul {
    font-size: 0.8rem;
  }

}



/*style="background:
    linear-gradient(
      rgba(0, 0, 0, 0.9),
      rgba(0, 0, 0, 0.4)
    ),
    url('./images/hilal1.jpeg');
   background-size: cover; background-repeat: no-repeat;"*/
</style>
@endsection
@section('content')
<!-- <br>
<div class="container"> -->
<div class="row" id="mycarousel" >
<!--     style="background:
    linear-gradient(
      rgba(0, 0, 0, 0.9),
      rgba(0, 0, 0, 0.4)
    ),
    url('./images/indonesia-maju.jpeg');
   background-size: cover; background-repeat: no-repeat;" -->
    <div class="col-lg-6 col-md-6 d-flex flex-column" style="padding: 3%;">

        @if ( $datas['galleries'] )
            @foreach ( $datas['galleries'] as $article )
                <ul class="list-unstyled">
                    <a href="/populer/{{ $article->slug }}" title="{{ $article->title }}" class="text-white">
                    <li class="media">
                        <img class="mr-3" src="/{{ $article->image }}" alt="image of {{ $article->title }}" width="150" height="100" >
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">{{ $article->title }}</h5>
                        </div>
                    </li>
                    </a>
                    <hr>
                </ul>
            @endforeach
        @endif
<!--             @if ($datas['pengumuman'])
        <h3 class="text-white ml-5 d-none d-sm-block " >
                {!! $datas['pengumuman']->isi !!}
        </h4>
        @endif -->
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding: 3%;">
        <div class="bd-example" >
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" >
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
                        <img src="{{ $article->image }}" id="carimage" class="d-block w-100" height="400" alt="{{ $article->title }}" style="border" >
                        <div class="carousel-caption d-md-block">
                           <h5 id="judul" >{{ $article->title }}</h5>
                           <a href="/berita/{{ $article->slug }}" class=" btn bg-primary text-light" >Baca </a>
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
<div class="row">
    <div class="col-md-12 " style="" id="" >
        <div id="map" class="" style="width:100%;height:600px; border-radius: 5px;"></div>
    </div>
</div>
<div class="container" style="padding: 20px;">
    <div class="row" >
        <div class="col-md-12 ">
            <h2 class="featurette-heading text-white text-center">Gempabumi Terkini</span></h2>
        </div>   
    </div>
</div>
<div class="container">
    <div class="row d-flex">
        <div class="col-md-12 ">
            <p class="lead text-white text-center"> @if ($datas['gempas']) Info Gempa Mag:{{ $datas['mag'] }}, {{ $datas['tanggalindosms'] }} {{ $datas['jamwit'] }} WIT, Lok:{{ $datas['lat'] }}, {{ $datas['lon'] }} ({{ $datas['event']['ket'] }}), Kedlmn:{{ $datas['event']['depth'] }} Km ::BMKG-JAY @endif  </p>
        </div>
    </div>
</div>

<!-- Review Seismisitas -->
<div class="container" id="videoDiv"  >
    <div id="videoMessage" class="row d-flex justify-content-center align-items-center" style="padding-top: 5%; padding-bottom: 5%;" >
        @if ($datas['kegempaans'])
        @foreach ($datas['kegempaans'] as $kegempaan)
        <div id="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/{{ $kegempaan->image }}" alt="Card image cap" height="300" >
                <div class="card-body">
                    <h5 class="card-title">{{ $kegempaan->title }}</h5>
                    <a href="/kegempaan/{{ $kegempaan->slug }}" class="btn bg-primary btn-block text-light">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>


{{-- Buletin Section --}}
    <div class="row d-flex justify-content-center align-items-center border " style="padding: 5%; padding-bottom: 5%;" id="bulletin">
        @if ($datas['bulletin'])
        <div class="col-md-4 col-sm-12 col-xs-12" >
                <div class="card" style="width: 18rem;">
                    <a href="/bulletins/{{ $datas['bulletin']->id }}" class="">
                    <img class="card-img-top" src="/{{ $datas['bulletin']->cover }}" alt="Card image cap" height="420" >
                </a>
                </div>

        </div>
        <div class="col-md-8">
            <a href="/bulletins/{{ $datas['bulletin']->id }}" style="">
                {{-- <h1 class="text-light" style="font-family: 'Abel', sans-serif; ">{{ $datas['bulletin']->title }}</h1> --}}
                {{-- <button class="btn btn-lg" >{{ $datas['bulletin']->title }}</button> --}}
            </a>
        </div>
        @endif
    </div>
<br>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="padding-top: 5%; padding-bottom: 5%;" >
        @if ($datas['siarans'])
        @foreach ($datas['siarans'] as $siaran)
        <div id="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/{{ $siaran->image }}" alt="Card image cap" height="300" >
                <div class="card-body">
                    <h5 class="card-title">{{ $siaran->title }}</h5>
                    <a href="/siarans/{{ $siaran->id }}" class="btn bg-primary btn-block text-light">Baca</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<br>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="{{ asset('js') }}/jquery.fittext.js"> </script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script src="{{ asset('gjson') }}/patahan.js">
</script>
<script src="{{ asset('gjson') }}/subduksi.js">
</script>
<script src="{{ asset('gjson') }}/plates.js">
</script>
@if ($datas['gempas'])
<script>
    var mymap = L.map('map').setView([ {{ $datas['gempas']->lintang }}, {{ $datas['gempas']->bujur }}], 6);
        // L.tileLayer('http://ecn.t3.tiles.virtualearth.net/tiles/a%7Bq%7D.jpeg?g%3D1&zmax=19&zmin=1', {
        // maxZoom: 18, // has a coma here
        //  id: 'mapbox.terrain'
    // }).addTo(mymap);
    // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    //     maxZoom: 18,
    //     id: 'mapbox.streets'
    // }).addTo(mymap);
L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(mymap);

    //L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}'

    var eqIcon = L.icon({
        iconUrl: '/images/icongempa.png',

        iconSize: [40, 40], // size of the icon
    });
    L.marker([{{ $datas['gempas']->lintang }}, {{ $datas['gempas']->bujur }}], {
        icon: eqIcon
    }).addTo(mymap);
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
        style: patahanStyle,
    }).addTo(mymap); //add patahan symbol

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
            ,
        iconSize: [100, 100]
            // ,iconAnchor: [11,11]
    });

    //add css icon as gps ring
    L.marker([{{ $datas['gempas']->lintang }}, {{ $datas['gempas']->bujur }}], {
        icon: cssIcon
    }).addTo(mymap);

//clock

</script>
<script>
    function updateClock() {
                var now = moment(),
                    second = now.seconds() * 6,
                    minute = now.minutes() * 6 + second / 60,
                    hour = ((now.hours() % 12) / 12) * 360 + 90 + minute / 12;
                $('#hour').css("transform", "rotate(" + hour + "deg)");
                $('#minute').css("transform", "rotate(" + minute + "deg)");
                $('#second').css("transform", "rotate(" + second + "deg)");
            }
            function timedUpdate () {
                updateClock();
                setTimeout(timedUpdate, 1000);
            }
            timedUpdate();
</script>
<script>
    $('#clock').fitText(1.3);

function update() {
  $('#clock').html(moment().format('D-M-Y  H:mm:ss'));
}

setInterval(update, 1000);
</script>
@endif


<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
@endsection

