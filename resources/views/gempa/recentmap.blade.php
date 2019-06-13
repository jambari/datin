@extends('main')
@section('title')
<title>Gempabumi - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
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
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="map" style="width:100%; height: 700px; border-radius: 5px; "></div>
	    </div>
	</div>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
    <script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
<script>
	var map = L.map('map').setView([-2.5104, 140.714], 6);
	L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', { maxZoom: 18}).addTo(map)
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', { maxZoom: 18, id: 'mapbox.light' }).addTo(map);

	var terasaIcon = L.icon({
		iconUrl: '/images/whiteblack.png',
		iconSize:     [25, 25], // size of the icon

	});
	var lastIcon = L.icon({
		iconUrl: '/images/earthquake.png',
		iconSize:     [40, 40], // size of the icon

	});
	var recentIcon = L.icon.pulse({iconSize:[15,15],color:'yellow'});
	@if ($eqs->count() > 0)
		@foreach ($eqs as $eq)
			marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: recentIcon}).addTo(map)
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
			var pulsingIcon = L.icon.pulse({iconSize:[120,120],color:'red'});

			marker = new L.marker([{{ $last->lintang }}, {{ $last->bujur }}], { icon: pulsingIcon}).addTo(map)
			.bindPopup(
				`{{ $last->tanggal }}
				{{ $last->origin }} UTC, 
				{{ $last->lintang }}
				{{ $last->bujur }} BT,  
				M{{ $last->magnitudo }}
				Depth {{ $last->depth }} Km, 
				{{ $last->ket }}`);
			marker = new L.marker([{{ $last->lintang }}, {{ $last->bujur }}], { icon: lastIcon}).addTo(map).bindPopup(
				`{{ $last->tanggal }}
				{{ $last->origin }} UTC, 
				{{ $last->lintang }}
				{{ $last->bujur }} BT,  
				M{{ $last->magnitudo }}
				Depth {{ $last->depth }} Km, 
				{{ $last->ket }}`);
</script>
@endsection