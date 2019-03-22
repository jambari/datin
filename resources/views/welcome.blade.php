@extends('main')
@section('title')
<title>Home - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection
@section('after_style')
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href=" {{ asset('css/demogallery.css') }} ">
<style>
    .carousel-item:after {
      content:"";
      display:block;
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      right:0;
      background:rgba(0,0,0,0.6);
    }
    #lightgallery {
        display: flex;
        margin-left: auto;
        margin-right: auto;
    }

#lightgallery a figure img {
    width: 300px;
    height: auto;
    -webkit-transition: .3s ease-in-out;
    transition: .3s ease-in-out;
}
#lightgallery a figure:hover img {
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
}

#mycarousel {

background: -webkit-linear-gradient(90deg, rgb(1, 4, 7), rgb(40, 74, 107));
background: linear-gradient(90deg, rgb(1, 4, 7), rgb(40, 74, 107));

/*background: -webkit-linear-gradient(90deg, rgb(1, 3, 6), rgb(39, 92, 148));
background: linear-gradient(90deg, rgb(1, 3, 6), rgb(39, 92, 148));*/

/*background: -webkit-linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));
background: linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));*/

/*background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 23%, rgba(0,151,255,1) 100%, rgba(32,11,195,0.8519607672170431) 100%); */
}
#mycarousel div h3 {
    font-family: 'Bad Script', cursive;
    padding: 5%;
}
</style>
@endsection

@section('content')
<!-- <br>
<div class="container"> -->
    <div class="row" id="mycarousel">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center align-self-center ">
            <h3 class="text-light ml-5" > <strong class="">Selamat Datang </strong> <br>Di Stasiun Geofisika Kelas I Angkasapura Jayapura !</h4>
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
                            <div class="carousel-caption d-none d-md-block">
                               <h5>{{ $article->title }}</h5>
                               <a href="/berita/{{ $article->id }}" class=" btn bg-primary text-light" >Baca </a> 
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
<!-- </div> -->
<hr>
<!-- The Gallery Section -->
<div class="container">       
    <div class="row" >
        <div id="lightgallery" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if ($datas['galleries'])
                @foreach ($datas['galleries'] as $gallery)
                    <a href="{{ $gallery->image }}">
                        <figure>
                        <img src="{{ $gallery->image }}" class="img-thumbnail " />
                        </figure>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
<hr>
<!-- recent earthquake section -->
<div class="container">       
    <div class="row">
        @if ($datas['gempas'])
        @foreach ($datas['gempas'] as $gempa)
        <div id="" class=" col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card text-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"> {{ $gempa->tanggal }} {{ $gempa->origin }} UTC</div>
                <div class="card-body">
                    <h5 class="card-title">Magnitudo <span class="badge badge-primary">{{ $gempa->magnitudo }}</span></h5>
                    <p class="card-text">Lintang: {{ $gempa->lintang }}</p>
                    <p class="card-text">Bujur: {{ $gempa->bujur }}</p>
                    <p class="card-text">Kedalaman: {{ $gempa->depth }} Km</p>
                    <p class="card-text">{{ $gempa->ket }} </p>
                    <p>
                        {{ $gempa->terdampak or ' '}}
                    </p>
                    <a href="/gempa/{{ $gempa->id }}" title="peta"> <button type="" class="btn bg-primary btn-block text-light">Lihat Peta</button> </a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
<hr>
<!-- Pers release section -->
<div class="container">       
    <div class="row">
        @if ($datas['siarans'])
        @foreach ($datas['siarans'] as $siaran)
        <div id="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/{{ $siaran->image }}" alt="Card image cap">
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

