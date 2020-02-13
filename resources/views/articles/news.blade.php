@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Jayapura</title>
@section('after_style')
<style type="text/css" media="screen">
#news ul a:hover{
	text-decoration: none;
	opacity: .5;
}
</style>
@endsection
@endsection

@section('content')
<br>
<div class="row d-none d-sm-block">
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
		<div class="col-md-12">
	    	<p>{!! $news->links() !!}</p>
	    </div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12 col-lg-12 " id="news">
	       	@if ( $news )
            @foreach ( $news as $berita )
            <ul class="list-unstyled">
             	<a href="/berita/{{ $berita->id }}" title="{{ $berita->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $berita->image }}" alt="image of {{ $berita->title }}" width="200" height="150" >
			    	<div class="media-body">
				      	<h5 class="mt-0 mb-1">{{ $berita->title }}</h5>
			    	</div>
			  	</li>
			  	</a>
			  	<hr>
			</ul>
		  	@endforeach
		 	@endif
	    </div>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-12">
	    	<p>{!! $news->links() !!}</p>
	    </div>
	</div>
</div>
<br>
@endsection