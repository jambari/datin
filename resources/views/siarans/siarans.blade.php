@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection


@section('after_style')
<style type="text/css" media="screen">
#news ul a:hover{
	text-decoration: none;
	opacity: .5;
}
</style>
@endsection


@section('content')
<br>
<div class="row d-none d-sm-block ">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/siarans" class="text-primary" >Siaran Press</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
	    	<p>{!! $siarans->links() !!}</p>
	    </div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12 col-lg-12 " id="news">
	       	@if ( $siarans )
             @foreach ( $siarans as $siaran )
             <ul class="list-unstyled">
             	<a href="/siarans/{{ $siaran->id }}" title="{{ $siaran->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $siaran->image }}" alt="image of {{ $siaran->title }}" width="200" height="150" >
			    	<div class="media-body">
				      	<h5 class="mt-0 mb-1">{{ $siaran->title }}</h5>
				     	{!! str_limit($siaran->content, $limit = 200, $end = '') !!}
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
	    	<p>{!! $siarans->links() !!}</p>
	    </div>
	</div>
</div>
<br>
@endsection