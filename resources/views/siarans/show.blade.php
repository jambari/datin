@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')
<style type="text/css" media="screen">
</style>
@endsection
@endsection

@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 d-none d-sm-block">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/siarans" class="text-primary" >Siaran Press</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12">
	        <!-- the actual blog post: title/author/date/content -->
	        <h3 class="">{{ $siaran->title }} </h3>
	        <p class="lead"><i class="fa fa-user"></i> by <a href="" class="text-primary">{{ $siaran->author or '-' }}</a>
	        </p>
	        <hr>
	        <p><i class="fa fa-calendar"></i> Posted on {{ Carbon\Carbon::parse($siaran->created_at)->diffForHumans() }} </p>
	        <hr>
	        <img src="/{{ $siaran->image }}" class="img-fluid">
	        <hr>
	        	{!! $siaran->content !!}
	    </div>

		<div class="col-md-4 col-sm-12 col-xs-12">
	       	@if ( $siarans )
            @foreach ( $siarans as $siaran )
            <ul class="list-unstyled">
             	<a href="/siarans/{{ $siaran->id }}" title="{{ $siaran->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $siaran->image }}" alt="" width="100" height="80" >
			    	<div class="media-body">
				      	<h6 class="mt-0 mb-1">{{ $siaran->title }}</h6>
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
<br>
@endsection