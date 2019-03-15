@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>
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
				<li class="breadcrumb-item active"><a href="/gempa" class="text-primary" >Gempabumi</a></li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-12">
	    	<ul class="nav nav-tabs" id="myTab" role="tablist">
			  	<li class="nav-item">
			    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tabel</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Peta</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Statistik</a>
			  	</li>
			</ul>
			<div class="tab-content" id="myTabContent">
			  	<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  		<p>{!! $gempas->links() !!}</p>
			  		<table class="table table-striped">
						  <thead>
						   <tr>
							    <th scope="col">#</th>
							    <th scope="col">Date</th>
							    <th scope="col">Origin (UTC)</th>
							    <th scope="col">Lat</th>
							    <th scope="col">Lon</th>
							    <th scope="col">Mag</th>
							    <th scope="col">Depth</th>
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
			  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  		{{-- <div id="map" style="width:100%;height:500px;" class=""></div> --}}
			  	</div>
			  	<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			  		
			  	</div>
			</div>
	    </div>
	</div>
</div>
<br>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
<script>
	var map = L.map('map').setView([-2.5104, 140.714], 6);

	L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', { maxZoom: 18 }).addTo(map);

	var terasaIcon = L.icon({
		iconUrl: '/images/redblack.png',
		iconSize:     [20, 20], // size of the icon

	});

	@if ($gempas->count() > 0)
		@foreach ($gempas as $gempa)
		{
			marker = new L.marker([{{ $gempa->lintang }}, {{ $gempa->bujur }}], { icon: terasaIcon}).addTo(map);
		}
		@endforeach
	@endif

</script>
@endsection