@extends('main')
@section('meta')
      <meta name="description" content="{{ \Illuminate\Support\Str::limit($populer->content, 300, $end='...') }}">
      <meta property="og:image" content="/{{ $populer->image }}">
      <meta name="keywords" content="Berita">
@endsection
@section('title')
<title>{{ $populer->title }}</title>
@endsection
@section('after_style')
<link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/css/demogallery.css') }}">
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
<div class="row ">
	<div class="container">
		<div class="col-md-12 d-none d-sm-block">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/populer" class="text-primary" >Artikel Populer</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12">
	        <!-- the actual blog post: title/author/date/content -->
	        <h3>{{ $populer->title }} </h3>
	        <p class="lead"><i class="fa fa-user"></i> by <a href="" class="text-primary">{{ $populer->author or '-' }}</a>
	        </p>
	        <hr>
	        <p><i class="fa fa-calendar"></i> Posted on {{ Carbon\Carbon::parse($populer->created_at)->diffForHumans() }} </p>
	        <hr>
	        <img src="/{{ $populer->image }}" class="img-fluid">
	        <hr>
	        {!! $populer->content !!}
			<div class="demo-gallery">
				<div id="lightgallery">
				@if ($thumbnails) 
					@foreach( $thumbnails as $thumbnail )
						<a href="/{{ $thumbnail->image }}">
							<img src="/{{ $thumbnail->image }}" alt="" class="img-thumbnail" width="150" height="100" >
						</a>
					@endforeach
				@endif
        		</div>
			</div>
			<div class="fb-comments"></div>

	    </div>
		<div class="col-md-4 col-sm-12 col-xs-12">
	       	@if ( $populers )
            @foreach ( $populers as $populer )
            <ul class="list-unstyled">
             	<a href="/populer/{{ $populer->slug }}" title="{{ $populer->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $populer->image }}" alt="" width="100" height="80" >
			    	<div class="media-body">
				      	<h6 class="mt-0 mb-1">{{ $populer->title }}</h6>
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