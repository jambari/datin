@extends('main')
@section('title')
<title>Review Seismisitas - Stasiun Geofisika Kelas I Jayapura</title>
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
				<li class="breadcrumb-item active"><a href="/kegempaan" class="text-primary" >Review Seismisitas</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
	    	<p>{!! $kegempaans->links() !!}</p>
	    </div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12 col-lg-12 " id="news">
	       	@if ( $kegempaans )
            @foreach ( $kegempaans as $kegempaan )
            <ul class="list-unstyled">
             	<a href="/kegempaan/{{ $kegempaan->slug }}" title="{{ $kegempaan->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $kegempaan->image }}" alt="image of {{ $kegempaan->title }}" width="200" height="150" >
			    	<div class="media-body">
				      	<h5 class="mt-0 mb-1">{{ $kegempaan->title }}</h5>
				      	<small>{{ date('d M Y', strtotime($kegempaan->date)) }}</small>
				      	<hr>
				      	<small>Oleh {{ $kegempaan->author }}</small>
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
	    	<p>{!! $kegempaans->links() !!}</p>
	    </div>
	</div>
</div>
<br>
@endsection