@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
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
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/gempa/terkini" class="text-primary" >Gempabumi Terkini</a></li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-12">
	  		{{-- <p>{!! $gempas->links() !!}</p> --}}
	  		<table class="table table-striped table-hover">
				  <thead>
				   <tr>
					    <th scope="col">#</th>
					    <th scope="col">Date</th>
					    <th scope="col">Origin (UTC)</th>
					    <th scope="col">Lat</th>
					    <th scope="col">Lon</th>
					    <th scope="col">Mag</th>
					    <th scope="col">Depth (Km)</th>
					    <th scope="col">Loc</th>
					    <th scope="col">Action</th>
				    </tr>
				</thead>
				<tbody>
			@if ( $gempas )
            @foreach ( $gempas as $gempa )
            
				    <tr>
				      	<th scope="row"> {{ $loop->iteration }}</th>
				      	<td>{{ $gempa->tanggal }}</td>
				      	<td> {{ $gempa->origin }} </td>
				      	<td> {{ $gempa->lintang }} </td>
				      	<td> {{ $gempa->bujur }} </td>
				      	<td> {{ $gempa->magnitudo }} </td>
				      	<td> {{ $gempa->depth }} </td>
				      	<td> {{ $gempa->ket }} </td>
				      	<td><a href="/gempa/{{ $gempa->id }}" class="btn btn-primary" > Peta </a></td>
				    </tr>
		  	@endforeach
		 	@endif
		 		</tbody>
			</table>
	    </div>
	</div>
</div>
<br>
@endsection