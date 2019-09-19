@extends('main')
@section('title')
<title>Buletin - Stasiun Geofisika Kelas I Jayapura</title>
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
<div class="container ">
	<div class="row d-none d-sm-block">
		<div class="col-md-12 d-none d-sm-block">
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
		<div class="col-md-12">
	    	<p>{!! $bulletins->links() !!}</p>
	    </div>
	</div>
</div>
<br>
<div class="container">
	<div class="row" style="padding: 3%;">
	       	@if ( $bulletins )
            @foreach ( $bulletins as $bulletin )
        <div id="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="/{{ $bulletin->cover }}" alt="Card image cap" height="300" >
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $bulletin->title }}</h5>
                    <a href="/bulletins/{{ $bulletin->id }}" class="btn bg-primary btn-block text-light">Baca</a>
                </div>
            </div>
        </div>
		  	@endforeach
		 	@endif
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
	    	<p>{!! $bulletins->links() !!}</p>
	    </div>
	</div>
</div>
<br>
@endsection