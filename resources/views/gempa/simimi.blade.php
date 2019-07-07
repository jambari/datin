<!DOCTYPE html>
<html>
<title>SiMIMI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
crossorigin=""></script>
<style type="text/css" media="screen">
    body { margin:0; padding:0; }
/*    #map { position: absolute; right:0; left:0; }*/

   #tabel-gempa {
	height: 700px;
	overflow-y: scroll;
  }
  #tabel-gempa {
    margin-bottom: 5px;
  }

  .param {
  	font-size: 0.8em;
  }

.leaflet-verticalcenter {
    position: absolute;
    z-index: 1000;
    pointer-events: none;
    top: 50%; /* possible because the placeholder's parent is the map */
    transform: translateY(-50%); /* using the CSS3 Transform technique */
    padding-top: 10px;
}

.leaflet-verticalcenter .leaflet-control {
    margin-bottom: 10px;
}
</style>
<body>
	<div class="w3-row w3-bar w3-padding-16 w3-card w3-border-blue" style="top: 0;">
	  <div class="w3-col w3-container m2 l1">
			<img src="{{ asset('images') }}/logo-bmkg.png" alt="" width="50" height="80" >
	  </div>
	  <div class="w3-col w3-container m10 l11">  
			<h1>SiMIMI</h1>

	  </div>
	</div>

	<div class="w3-row">
	  	<div class="w3-col w3-container m4 l3 " id="tabel-gempa" style=";">
			@if ( $eqs )
	            @foreach ( $eqs as $gempa )
	            	<div class="w3-panel w3-border-bottom">
	            		<table>
	            			<tr>
	            				<td><span class="w3-badge @if ($gempa->magnitudo < 5) w3-green @else w3-red @endif param">{{ $gempa->magnitudo }}</span></td>
	            				<td class="param">{{ $gempa->ket }}<br>
							{{ $gempa->tanggal }} {{ $gempa->origin }}UTC</td>
	            			</tr>
	            		</table>
	            		<div class="w3-container "style="padding-bottom: 10px;">
  							<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red">Merasakan</button>
	            		</div>
	            	</div>
			  	@endforeach
		 	@endif
	  	</div>
	  	<div class="w3-col w3-container m8 l9">  
			<div id="map" style="width:100%; height: 700px; left:0; right: 0; "></div>
		</div>
	</div>

	  <div id="id01" class="w3-modal" style="z-index: 500;">
	    <div class="w3-modal-content">
	      <header class="w3-container w3-pale-blue"> 
	        <span onclick="document.getElementById('id01').style.display='none'" 
	        class="w3-button w3-display-topright">&times;</span>
	        <h2>Hi Pace/Mace, silahkan lengkapi formulir di bawah ini !</h2>
	      </header>
	      <div class="w3-container w3-padding-16">
	      	<form class="w3-container">
				<input name="lokasi" type="search" id="address-input" placeholder="Dimana Lokasi Anda merasakan gempa ?" required="required" />
				<p>Lokasi terpilih: <strong id="address-value">Lokasi belum diinput</strong></p>

				<input class="w3-input" type="hidden" name="gempa_id" >

				<label>Nama</label>
				<input class="w3-input" type="text" name="nama" placeholder="Tidak Wajib" >

				<button type="submit" class="w3-button w3-red" >Submit</button>

			</form>

	      </div>
	      <footer class="w3-container w3-pale-blue">
	        <p>Terima Kasih Banyak !</p>
	      </footer>
	    </div>
	  </div>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
<script>
	(function() {
	  var placesAutocomplete = places({
	    appId: 'plK2MSNQF9DV',
	    apiKey: '337bc6df605fdfcd5b2f7fe4278274f4',
	    container: document.querySelector('#address-input')
	  });

  var $address = document.querySelector('#address-value')
  placesAutocomplete.on('change', function(e) {
    $address.textContent = e.suggestion.value
  });

  placesAutocomplete.on('clear', function() {
    $address.textContent = 'Belum ada lokasi';
  });

})();
</script>
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

var map = L.map('map').setView([{{ $last->lintang }}, {{ $last->bujur }}], 6);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
 var layer = L.esri.basemapLayer('ShadedRelief').addTo(map);
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

	// Create additional Control placeholders
	function addControlPlaceholders(map) {
	    var corners = map._controlCorners,
	        l = 'leaflet-',
	        container = map._controlContainer;

	    function createCorner(vSide, hSide) {
	        var className = l + vSide + ' ' + l + hSide;

	        corners[vSide + hSide] = L.DomUtil.create('div', className, container);
	    }

	    createCorner('verticalcenter', 'left');
	    createCorner('verticalcenter', 'right');
	}
	addControlPlaceholders(map);

	// Change the position of the Zoom Control to a newly created placeholder.
	map.zoomControl.setPosition('verticalcenterright');

	// You can also put other controls in the same placeholder.
	L.control.scale({position: 'verticalcenterright'}).addTo(map);
</script>

</body>