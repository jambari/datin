@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
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
				<li class="breadcrumb-item active"><a href="/news" class="text-primary" >Berita</a></li>
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
	        <h3>{{ $article->title }} </h3>
	        <p class="lead"><i class="fa fa-user"></i> by <a href="" class="text-primary">{{ $article->author or '-' }}</a>
	        </p>
	        <hr>
	        <p><i class="fa fa-calendar"></i> Posted on {{ Carbon\Carbon::parse($article->created_at)->diffForHumans() }} </p>
	        <hr>
	        <img src="/{{ $article->image }}" class="img-fluid">
	        <hr>
	        	<div id="lightgallery">
	        		{!! $article->content !!}
	        		<a href="/berita/20150809_124717.jpg">
	        			<img src="/berita/20150809_124717.jpg" alt="" width="300px" height="200px">
	        		</a>
	        	</div>
	        <hr>

	    </div>
		<div class="col-md-4 col-sm-12 col-xs-12">
	       	@if ( $beritas )
            @foreach ( $beritas as $berita )
            <ul class="list-unstyled">
             	<a href="/berita/{{ $berita->id }}" title="{{ $berita->title }}" class="text-primary">
			  	<li class="media">
			    	<img class="mr-3" src="/{{ $berita->image }}" alt="" width="100" height="80" >
			    	<div class="media-body">
				      	<h6 class="mt-0 mb-1">{{ $berita->title }}</h6>
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
		<script>
			// if (document.getElementsByTagName("img")[1]) {
				// var x = document.getElementsByTagName("img")[1].getAttribute("src");
				// var linkbefore = '<a href=' +'\"'+x+'\"' + '>';
			 //    var linkafter = '</a>';
				// var d1 = document.getElementsByTagName("img")[1];
				// d1.insertAdjacentHTML('beforebegin', linkbefore);
				// d1.insertAdjacentHTML('afterend', '</a>');
			// }
// var x = document.getElementsByTagName("img")[2].getAttribute("src");
// var d1 = document.getElementsByTagName("img")[2];
// d1.insertAdjacentHTML('beforebegin', '<a href= \" /berita/20150809_124717.jpg \"> Test Link ');
// d1.insertAdjacentHTML('beforebegin', ' </a>  ');

		// $(window).bind("load", function() {
			var imageLink = document.getElementById("div.lightgallery img ");
			console.log(imageLink);
		// });


		</script>
        <script>
			// lightGallery(document.getElementById('lightgallery'));
        </script>
@endsection