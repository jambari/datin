
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
html, body {  }

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

/*    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;ckground: linear-gradient(90deg, rgba(0,0,0,1) 23%, rgba(0,151,255,1) 100%, rgba(32,11,195,0.8519607672170431) 100%);
    margin-top: -1%;*/
}

/*@keyframes gradientBG {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}*/

#digital, #analog {
    background-color: #23B5C8;
}
#analog {
    padding-top: 3%;
    margin-bottom: -4%;
}

#digital {
    padding-bottom: 5%;
      font-family: 'liquid_crystalregular', sans-serif;
  user-select: none;
  user-drag: none;

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
    url('./images/lidya.jpg');
   background-size: cover;
   }

.hero-circle{
        width:180px;
        height:180px;
        position:relative;
        border:6px solid #151414;
        border-radius:50%;
        box-shadow:0 1px 8px rgba(34, 34, 34, 0.3),inset 0 1px 8px rgba(34, 34, 34, 0.3);
    }
.hero-face{
    width:100%;
    height:100%;
}
.hero-face:after{
    position:absolute;
    top:50%;
    left:50%;
    width:12px;
    height:12px;
    margin:-6px 0 0 -6px;
    background:#151414;
    border-radius:6px;
    content:"";
    display:block;
}
.hero-hour{
    width:0;
    height:0;
    position:absolute;
    top:50%;
    left:50%;
    margin:-4px 0 -4px -25%;
    padding:4px 0 4px 25%;
    background:#151414;
    -webkit-transform-origin:100% 50%;
    -ms-transform-origin:100% 50%;
    transform-origin:100% 50%;
    border-radius:4px 0 0 4px;
}
.hero-minute{
    width:0;
    height:0;
    position:absolute;
    top:50%;
    left:50%;
    margin:-40% -3px 0;
    padding:40% 3px 0;
    background:#151414;
    -webkit-transform-origin:50% 100%;
    -ms-transform-origin:50% 100%;
    transform-origin:50% 100%;
    border-radius:3px 3px 0 0;
}
.hero-second{
    width:0;
    height:0;
    position:absolute;
    top:50%;
    left:50%;
    margin:-40% -1px 0 0;
    padding:40% 1px 0;
    background:#151414;
    -webkit-transform-origin:50% 100%;
    -ms-transform-origin:50% 100%;
    transform-origin:50% 100%;
}

.clock {
  height: 100px;
  width: 70%;
  line-height: 100px;
  margin: 150px auto 0;
  padding: 0 50px;
  color: #151414;
  text-align: center;
  border-radius: 15px;
  box-shadow: 0 0 7px #fff;
  text-shadow: 0 0 3px #fff;
}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */

  #judul {
    font-size: 0.8rem;
  }

}



</style>
@endsection
@section('content')


<div class="modal hide fade" id="myModal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Modal header</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…ddddd</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn">Close</a>
    <a href="#" class="btn btn-primary">Save changes</a>
  </div>
</div>


<!-- <br>
<div class="container"> -->
<div class="row border" id="mycarousel">
    <div class="col-lg-6 col-md-6 d-flex flex-column" style="padding: 3%;">

        @if ( $datas['galleries'] )
            @foreach ( $datas['galleries'] as $article )
                <ul class="list-unstyled">
                    <a href="/populer/{{ $article->slug }}" title="{{ $article->title }}" class="text-primary">
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
        <h3 class="text-primary ml-5 d-none d-sm-block " >
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
            <h2 class="featurette-heading text-primary text-center">Gempabumi Terkini</span></h2>
        </div>   
    </div>
</div>
<div class="container">
    <div class="row d-flex">
        <div class="col-md-12 ">
            <p class="lead text-primary text-center"> @if ($datas['gempas']) Info Gempa Mag:{{ $datas['mag'] }}, {{ $datas['tanggalindosms'] }} {{ $datas['jamwit'] }} WIT, Lok:{{ $datas['lat'] }}, {{ $datas['lon'] }} ({{ $datas['event']['ket'] }}), Kedlmn:{{ $datas['event']['depth'] }} Km ::BMKG-JAY @endif  </p>
        </div>
    </div>
</div>
<!-- </div> -->
<!-- The Product Section -->
<!-- <div class="row d-flex justify-content-center align-items-center" style="padding: 10% 5% 10% 5%;" >
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mainproduct " style="" >
        <p class="text-center" ><i class="wi wi-earthquake text-primary " style=" font-size: 4em " ></i></p>
        <h3 class=" text-center text-primary" >Gempabumi</h3>
        <p class="text-center text-primary " >Menggunakan peralatan mutakhir <em>Seiscomp3</em> Stasiun Geofisika Kelas I Jayapura mengamati gempabumi 24/7 hari.</p>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mainproduct ">
        <p class="text-center" ><i class="wi wi-meteor text-primary " style=" font-size: 4em " ></i></p>
        <h3 class="text-center text-primary" >Geofisika Potensial</h3>
        <p class="text-center text-primary" >Pengamatan variasi harian magnetbumi, pengamatan absolut magnetbumi, dan listrik udara dilakukan secara berkelanjutan.</p>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mainproduct ">
        <p class="text-center " ><i class="wi wi-raindrops text-primary" style=" font-size: 4em "></i></p>
        <h3 class="text-center text-primary" >Kualitas Udara</h3>
        <p class="text-center text-primary" >Pengamatan Intensitas Hujan, Kimia Air Hujan, dan Suspended Particulate Matter sebagai indikator kualitas udara.</p>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 mainproduct ">
        <p class="text-center" ><i class="wi wi-tsunami text-primary" style=" font-size: 4em "></i></p>
        <h3 class="text-center text-primary" >Rasa Gempa ?</h3>
        <p class="text-center text-primary" >Jika anda merasakan guncangan gempabumi, anda dapat melaporkan tingkat guncangan dan kerusakannya <a href="/rasagempa" class="text-primary">disini</a>. </p>
    </div>
</div> -->
<!-- Review Seismisitas -->
<div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="padding-top: 5%; padding-bottom: 5%;" >
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

<!-- <div class="row d-flex justify-content-center align-items-center " style="" id="analog" >
    <div class="hero-circle">
        <div class="hero-face">
            <div id="hour" class="hero-hour"></div>
            <div id="minute" class="hero-minute"></div>
            <div id="second" class="hero-second"></div>
        </div>
    </div>
</div> -->
<!-- The Clock Section -->
<!-- <div class="row d-flex justify-content-center align-items-center" style="" id="digital" >
    <div id="clock" class="clock">loading ...</div>
</div> -->
<!-- recent earthquake section -->
<!-- <div class="row d-flex justify-content-center align-items-center border " style="padding-top: 5%; padding-bottom: 5%;" id="info">
  <div class="col-md-5 d-none d-sm-block" style="padding: 3%;">
    <h2 class="featurette-heading text-primary">Gempabumi Terkini</span></h2>
    <p class="lead text-primary"> @if ($datas['gempas']) Info Gempa Mag:{{ $datas['mag'] }}, {{ $datas['tanggalindosms'] }} {{ $datas['jamwit'] }} WIT, Lok:{{ $datas['lat'] }}, {{ $datas['lon'] }} ({{ $datas['event']['ket'] }}), Kedlmn:{{ $datas['event']['depth'] }} Km ::BMKG-JAY @endif  </p>
  </div>
  <div class="col-md-7 d-none d-sm-block" style="" id="frengki" >
    <div id="map" class="" style="width:85%;height:400px; border-radius: 5px;"></div>
  </div>
</div> -->

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

