@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection
@section('after_style')
<style type="text/css" media="screen">
	#beritalainnya {
		display: flex;
		margin-right: auto;
		margin-left: auto;
		justify-content: space-between;
	}
	.card {
		padding: .5%; 
	}
</style>
@endsection
@section('content')
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/news" class="text-primary" >Berita</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-8 col-lg-8 ">
	        <!-- the actual blog post: title/author/date/content -->
	        <h1>{{ $article->title }} </h1>
	        <p class="lead"><i class="fa fa-user"></i> by <a href="" class="text-primary">{{ $article->author or '-' }}</a>
	        </p>
	        <hr>
	        <p><i class="fa fa-calendar"></i> Posted on {{ Carbon\Carbon::parse($article->created_at)->diffForHumans() }} </p>
	        <hr>
	        <img src="/{{ $article->image }}" class="img-fluid">
	        <hr>
	        	{!! $article->content !!}

	    </div>
	</div>
</div>
<hr>
<div class="row">
	<div class="container">
		<div class="col-md-12 col-lg-12 " id="beritalainnya" >
		    @if ( $beritas )
             @foreach ( $beritas as $berita )
            <div class="card" style="width: 18rem;">
				<img class="card-img-top" src="/{{ $berita->image }}" alt="Card image cap">
				<div class="card-body">
				    <h5 class="card-title">{{ $berita->title }}</h5>
				    <a href="/berita/{{ $berita->id }}" class="btn btn-primary">Selengkapnya</a>
				</div>
			</div>
		  	@endforeach
		 	@endif
	    </div>
	</div>
</div>
<br>
@endsection