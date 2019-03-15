@extends('main')
@section('title')
<title>Home - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection
@section('after_style')
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href=" {{ asset('css/demogallery.css') }} ">
<style type="text/css">
   .leaflet-container{background-color:#c5e8ff;}
</style>
<style>
   #eq {
        display: flex;
   }

   #siaran {
        display: flex;
   }
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

/*#pengumuman {
    margin-bottom: -1%;
}*/

</style>
@endsection

@section('alert')

{{-- @if ($datas['pengumumans'])
<div class="row" id="pengumuman">
   <div class="col-md-12">
         <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span class="text-light" >{{ $datas['pengumumans']->isi }}</span>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
   </div>
</div>
@endif --}}

@endsection
@section('content')
<br>
    <div class="container">
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
                            <img src="{{ $article->image }}" id="carimage" class="d-block w-100" height="650" alt="{{ $article->title }}">
                            <div class="carousel-caption d-none d-md-block">
                               <h5>{{ $article->title }}</h5>
                               {!! str_limit($article->content, $limit = 100, $end = '...') !!} <a href="/berita/{{ $article->id }}" class="text-light" >Selengkapnya! </a> </p>
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
<hr>
<div class="row">       
    <div class="container" >
        <div id="lightgallery" class="col-md-12">
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
<div class="row">       
    <div class="container" id="eq" >
        @if ($datas['gempas'])
        @foreach ($datas['gempas'] as $gempa)
        <div id="" class="col-md-4">
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
                    <a href="/gempa/{{ $gempa->id }}" title="peta"> <button type="" class="btn btn-primary">Lihat Peta</button> </a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<hr>
<h3 class="text-center text-primary">Siaran Press</h3>
<div class="row">       
    <div class="container" id="siaran" >
        @if ($datas['siarans'])
        @foreach ($datas['siarans'] as $siaran)
        <div id="" class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/{{ $siaran->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $siaran->title }}</h5>
                    <a href="/siarans/{{ $siaran->id }}" class="btn btn-primary">Selengkapnya</a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>

    <script>
       $('.alert').alert()
    </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
        <script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
        <script>
            lightGallery(document.getElementById('lightgallery'));
        </script>
@endsection

