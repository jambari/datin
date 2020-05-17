@extends('main')
@section('title')
<title>Gempabumi Terkini- Stasiun Geofisika Kelas I Jayapura</title>
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
<div class="row ">
	<div class="container  ">
		<div class="col-md-12 d-none d-sm-block ">
			<ol class="breadcrumb  ">
				<li class="breadcrumb-item  "><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active "><a href="/gempa/terkini" class="text-primary" >Gempabumi Terkini</a></li>
			</ol>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex">
	  		{{-- <p>{!! $gempas->links() !!}</p> --}}
	  		<table class="table table-striped table-hover table-responsive">
				  <thead>
				   <tr>
					    <th scope="col">#</th>
					    <th scope="col"> Origin (WIT) </th>
					    <th scope="col">Lintang</th>
					    <th scope="col">Bujur</th>
					    <th scope="col">Mag</th>
					    <th scope="col">Kedlmn</th>
					    <th scope="col">Lokasi</th>
					    <th scope="col">Dirasakan</th>
					    <th scope="col">Action</th>
				    </tr>
				</thead>
				<tbody>
			@if ( $gempas )
            @foreach ( $gempas as $gempa )
            
				    <tr class="@if ($gempa->terasa == 'dirasakan') bg-red @endif">
				      	<td  scope="row"> {{ $loop->iteration }}</td>
				      	<td> {{ $gempa->origin }} </td>
				      	<td> {{ $gempa->lintang }} </td>
				      	<td> {{ $gempa->bujur }} </td>
				      	<td> {{ $gempa->magnitudo }} </td>
				      	<td> {{ $gempa->depth }} </td>
				      	<td> {{ $gempa->ket }} </td>
				      	<td>{{ $gempa->terasa }}</td>
				      	<td><a href="/gempa/{{ $gempa->id }}" class="btn btn-secondary" > Peta </a></td>
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