@extends('main')
@section('title')
<title>Buletin - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
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
				<li class="breadcrumb-item active"><a href="/bulletins" class="text-primary" >Bulletin</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12" style="padding-bottom: 1%;">
	        <!-- the actual blog post: title/author/date/content -->
	        <h3 class="">{{ $bulletin->title }} </h3>
	        <hr>
	         <object width="100%" height="800px" data="/{{ $bulletin->content }}"></object> 
	    </div>

		<div class="col-md-4 col-sm-12 col-xs-12">
	       	@if ( $bulletins )
            @foreach ( $bulletins as $bulletin )
            <ul class="list-unstyled">
             	<a href="/bulletins/{{ $bulletin->id }}" title="{{ $bulletin->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $bulletin->cover }}" alt="" width="100" height="80" >
			    	<div class="media-body">
				      	<h6 class="mt-0 mb-1">{{ $bulletin->title }}</h6>
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
@section('script')
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