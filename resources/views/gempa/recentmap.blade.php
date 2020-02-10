@extends('main')
@section('title')
<title>Peta Terkini Gempabumi - Stasiun Geofisika Kelas I Jayapura</title>
@section('after_style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>

<style type="text/css" media="screen">
#news ul a:hover{
	text-decoration: none;
	opacity: .5;
}
  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    margin: 3px; 
    margin-right: 10px;
  }
  #basemaps {
  }
</style>
@endsection
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="map" style="width:100%; height: 700px; border-radius: 5px; "></div>
			<div id="basemaps-wrapper" class="leaflet-bar">
			  <select name="basemaps" id="basemaps" onChange="changeBasemap(basemaps)">
			  	<option value="NationalGeographic" selected >National Geographic</option>
				<option value="Topographic">Topographic</option>
				<option value="Streets">Streets</option>
				<option value="Oceans">Oceans</option>
				<option value="Gray">Gray</option>
				<option value="DarkGray">Dark Gray</option>
				<option value="Imagery">Imagery</option>
				<option value="ImageryClarity">Imagery (Clarity)</option>
				<option value="ImageryFirefly">Imagery (Firefly)</option>
				<option value="ShadedRelief">Shaded Relief</option>
				<option value="Physical">Physical</option>
			  </select>
			</div>
	    </div>
	</div>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<table class="table">
				<tr>
					<td class="text-center"><img src="/images/whiteblack.png" alt=""> <span>M < 5</span> </td>
				</tr>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-bordered">
				<tr>
					<td class="text-center" ><img src="/images/redblack.png" alt=""> <span>M >= 5</span> </td>
				</tr>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-bordered">
				<tr>
					<td class="text-center"><img src="/images/icongempa.png" alt="" height="25" width="20" > <span>Gempa terakhir</span> </td>
				</tr>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
    <script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
   <script src="{{ asset('gjson') }}/patahan.js" > </script>
   <script src="{{ asset('gjson') }}/subduksi.js" > </script>
   <script src="{{ asset('gjson') }}/plates.js" > </script>
<script>

var map = L.map('map').setView([-2.5104, 140.714], 6);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
 var layer = L.esri.basemapLayer('NationalGeographic').addTo(map);
  var layerLabels;

  function setBasemap(basemap) {
    if (layer) {
      map.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    map.addLayer(layer);

    if (layerLabels) {
      map.removeLayer(layerLabels);
    }

    if (basemap === 'ShadedRelief'
     || basemap === 'Oceans'
     || basemap === 'Gray'
     || basemap === 'DarkGray'
     || basemap === 'Terrain'
   ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      map.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      map.addLayer(layerLabels);
    }
  }

  function changeBasemap(basemaps){
    var basemap = basemaps.value;
    setBasemap(basemap);
  }





	//SEBELUM PAKE OPTIONAL
	// var map = L.map('map').setView([-2.5104, 140.714], 6);
	// L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', { maxZoom: 18}).addTo(map)
	// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', { maxZoom: 18, id: 'mapbox.light' }).addTo(map);

	var white = L.icon({
		iconUrl: '/images/whiteblack.png',
		iconSize:     [30, 30], // size of the icon

	});

	var red = L.icon({
		iconUrl: '/images/redblack.png',
		iconSize:     [30, 30], // size of the icon

	});
	var lastIcon = L.icon({
		iconUrl: '/images/icongempa.png',
		iconSize:     [40, 40], // size of the icon

	});
	var recentIcon = L.icon.pulse({iconSize:[15,15],color:'yellow'});
	@if ($eqs->count() > 0)
		@foreach ($eqs as $eq)
		@if($eq->magnitudo < 5)
			marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: white}).addTo(map)
		@endif
		@if($eq->magnitudo >= 5)
		marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: red}).addTo(map)
		@endif
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