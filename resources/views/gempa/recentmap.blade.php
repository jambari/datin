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
				<li class="breadcrumb-item active"><a href="/gempa/recentmap" class="text-primary" >Peta Gempabumi Terkini</a></li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			  		<div id="map" style="width:100%; height: 600px; border-radius: 5px; "></div>
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

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', { maxZoom: 18, id: 'mapbox.dark' }).addTo(map);

	var terasaIcon = L.icon({
		iconUrl: '/images/redblack.png',
		iconSize:     [20, 20], // size of the icon

	});

	@if ($eqs->count() > 0)
		@foreach ($eqs as $eq)
			marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: terasaIcon}).addTo(map)
			.bindPopup(
				`{{ $eq->tanggal }}
				{{ $eq->origin }} UTC, 
				{{ $eq->lintang }}
				{{ $eq->bujur }} BT,  
				M{{ $eq->magnitudo }}
				Depth {{ $eq->depth }} Km, 
				{{ $eq->ket }}`);
		@endforeach
	@endif

</script>
@endsection