<!DOCTYPE html>
<html>
<title>SiMIMI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Arimo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet/1/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>


    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
crossorigin=""></script>
<style type="text/css" media="screen">
    body { margin:0; padding:0; font-family: 'Arimo', sans-serif; }
/*    #map { position: absolute; right:0; left:0; }*/

   #tabel-gempa {
	height: 700px;
	overflow-y: scroll;
  }
  #tabel-gempa {
    margin-bottom: 5px;
  }

  .param {
  	font-size: 1em;
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

/* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #f00;
  background-color: #F44336;
}

  #map-example-container {height: 300px; width: 100%;};
</style>
<body>
	<div class="w3-row w3-bar w3-padding-16 w3-card w3-border-blue" style="position: ; top: 0;">
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
	            				<td><span class="w3-badge @if ($gempa->magnitudo < 5) w3-green @else w3-red @endif param">M{{ $gempa->magnitudo }}</span></td>
	            				<td class="param">{{ $gempa->ket }}<br>
							{{ $gempa->origin }} WIT <br> Kdlmn: {{ $gempa->depth }} Km </td>
	            			</tr>
	            		</table>
	            		<div class="w3-container "style="padding-bottom: 10px;">
  							<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-block w3-red">Anda Merasakan ?</button>
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
	        <h2>Hi, silahkan lengkapi formulir di bawah ini !</h2>
	      </header>
	      <div class="w3-container w3-padding-16">
	      	<form class="w3-container">
	      		<div id="map-example-container"></div>
				<input name="lokasi" type="search" id="input-map" placeholder="Dimana lokasi Anda merasakan gempa ?" required="required" class="w3-input" />
{{-- 				<p>Lokasi terpilih: <strong id="address-value">Lokasi belum diinput</strong></p> --}}
				<input class="w3-input" type="hidden" name="gempabalai_id" >
				<p class="w3-label">Klik/pilih salah satu gambar di bawah ini sesuai apa yang anda rasakan</p>
				{{-- Gambar MMI --}}
				<div class="w3-row-padding w3-margin-top">
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="1" >
						    <img src="{{ asset('images') }}/mmi1.png"  style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>I MMI</strong> Getaran tidak dirasakan oleh beberapa orang (kecuali dalam keadaan hening). </p>
					    </div>
					  </div>
					</div>

					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="2" >
						    <img src="{{ asset('images') }}/mmi2.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>II MMI</strong> Getaran dirasakan oleh beberapa orang yang tinggal diam, terlebih dirumah bertingkat. Benda-benda ringan yang digantung bergoyang.</p>
					    </div>
					  </div>
					</div>
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="3" >
						    <img src="{{ asset('images') }}/mmi3.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>III MMI</strong> Getaran dirasakan nyata di rumah tingkat atas. Getaran seakan ada truk lewat.</p>
					    </div>
					  </div>
					</div>
					{{-- 4-6mmi --}}
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="4" >
						    <img src="{{ asset('images') }}/mmi5.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>IV MMI</strong> Pada siang hari dirasakan oleh orang banyak dalam rumah, di luar oleh beberapa orang. Pada malam hari orang terbangun, piring dan gelas dapat pecah, jendela dan pintu berbunyi, dinding berderik karena pecah-pecah. Kacau seakan-akan truk besar melanggar rumah, kendaraan yang sedang berhenti bergerak dengan jelas.</p>
					    </div>
					  </div>
					</div>

					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="5" >
						    <img src="{{ asset('images') }}/mmi5.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>V MMI</strong> Getaran dirasakan oleh hampir semua penduduk, orang banyak terbangun. Jendela kaca dan plester dinding pecah, barang-barang terpelanting, pohon-pohon tinggi dan barang-barang besar tampak bergoyang. Bandul lonceng dapat berhenti.</p>
					    </div>
					  </div>
					</div>
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="6" >
						    <img src="{{ asset('images') }}/mmi6.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>VI MMI</strong>Getaran dirasakan oleh semua penduduk, kebanyakan terkejut dan lari keluar, kadang-kadang meja kursi bergerak, plester dinding dan cerobong asap pabrik rusak. Kerusakan kategori ringan./p>
					    </div>
					  </div>
					</div>
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="7" >
						    <img src="{{ asset('images') }}/mmi7.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>VII MMI</strong> Semua orang keluar rumah, kerusakan ringan pada rumah-rumah konstruksi yang baik. Cerobong asap pecah atau retak-retak. Goncangan terasa oleh orang yang naik kendaraan.</p>
					    </div>
					  </div>
					</div>

					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="8" >
						    <img src="{{ asset('images') }}/mmi8.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>VIII MMI</strong> Banyak kerusakan pada bangunan yang tidak kuat. Kerusakan ringan pada bangunan-bangunan dengan konstruksi yang kuat. Retak-retak pada bangunan yang kuat. Dinding dapat lepas dari kerangka rumah, cerobong asap pabrik-pabrik dan monumen-monumen roboh. Meja kursi terlempar, air menjadi keruh, orang naik sepeda motor terasa terganggu.</p>
					    </div>
					  </div>
					</div>
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="9" >
						    <img src="{{ asset('images') }}/mmi9.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>IX MMI</strong>Kerusakan pada bangunan yang kuat, rangka-rangka rumah menjadi tidak lurus. Rumah tampak bergeser dari pondasinya, pipa-pipa dalam tanah putus./p>
					    </div>
					  </div>
					</div>
					{{-- 10-12 mmi --}}
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="10" >
						    <img src="{{ asset('images') }}/mmi10.png"  style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>X MMI</strong> Bangunan dari kayu yang kuat rusak, rangka-rangka rumah lepas dari pondasinya; tanah terbelah; Rel melengkung. Tanah longsor di sekitar sungai dan tempat-tempat yang curam serta terjadi air bah. </p>
					    </div>
					  </div>
					</div>

					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="11" >
						    <img src="{{ asset('images') }}/mmi11.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>XI MMI</strong> Bangunan-bangunan kayu sedikit yang tetap berdiri, jembatan rusak, terjadi lembah. Pipa dalam tanah tidak dapat dipakai sama sekali, tanah terbelah, rel melengkung sekali.</p>
					    </div>
					  </div>
					</div>
					<div class="w3-third">
					  <div class="w3-card">
					  	<label>
						  	<input type="radio" name="mmi" value="12" >
						    <img src="{{ asset('images') }}/mmi12.png" style="width:100%">
					    </label>
					    <div class="w3-container">
					    	<p class="w3-text" ><strong>XII MMI</strong> Hancur sama sekali. Gelombang tampak pada permukaan tanah, pemandangan menjadi gelap, benda-benda terlempar ke udara.</p>
					    </div>
					  </div>
					</div>
				</div>
				<br>
				<label class="w3-label" >Gambar Kerusakan Jika ada</label>
		        @for ($i=0; $i <= 4; $i++)
		        <div class="w3-row w3-container">
		            <div class="w3-col w3-m12 l12">
		                <input type="file" name="gambar[{{ $i }}][value]" class="w3-input" value="{{ old('gambar['.$i.'][value]') }}">
		            </div>
		        </div>
		        @endfor
				<br>
				<label class="w3-label" >Nama</label>
				<input class="w3-input" type="text" name="nama" placeholder="Tidak Wajib" >

				<input type="submit" class="w3-button w3-block w3-red w3-margin-top " value="Submit" />

			</form>

	      </div>
	      <footer class="w3-container w3-pale-blue">
	        <p>Terima Kasih Banyak !</p>
	      </footer>
	    </div>
	  </div>

<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
<script>
	(function() {
	  	var placesAutocomplete = places({
	    	appId: 'plK2MSNQF9DV',
	    	apiKey: '337bc6df605fdfcd5b2f7fe4278274f4',
	    	container: document.querySelector('#input-map')
	  	});

	  	// var $address = document.querySelector('#address-value');
	  
	  	// placesAutocomplete.on('change', function(e) {
	   //  	$address.textContent = e.suggestion.value
	  	// });

	  	// placesAutocomplete.on('clear', function() {
	   //  	$address.textContent = 'Belum ada lokasi';
	  	// });


// Lokasi on map
  	var map = L.map('map-example-container', {
    	scrollWheelZoom: false,
    	zoomControl: false
  	});

  	var osmLayer = new L.TileLayer(
    	'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      	minZoom: 1,
      	maxZoom: 13,
      	attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    	}
  	);

  	var markers = [];

  	map.setView(new L.LatLng(0, 0), 1);
  	map.addLayer(osmLayer);

  	placesAutocomplete.on('suggestions', handleOnSuggestions);
  	placesAutocomplete.on('cursorchanged', handleOnCursorchanged);
  	placesAutocomplete.on('change', handleOnChange);
  	placesAutocomplete.on('clear', handleOnClear);

  	function handleOnSuggestions(e) {
    	markers.forEach(removeMarker);
    	markers = [];

    if (e.suggestions.length === 0) {
      	map.setView(new L.LatLng(0, 0), 1);
      	return;
    }

    e.suggestions.forEach(addMarker);
    	findBestZoom();
  	}

  function handleOnChange(e) {
    markers
      	.forEach(function(marker, markerIndex) {
        	if (markerIndex === e.suggestionIndex) {
          		markers = [marker];
          		marker.setOpacity(1);
          		findBestZoom();
        		} else {
          		removeMarker(marker);
        	}
      	});
  	}

  	function handleOnClear() {
    	map.setView(new L.LatLng(0, 0), 1);
    	markers.forEach(removeMarker);
  	}

  function handleOnCursorchanged(e) {
    markers
      .forEach(function(marker, markerIndex) {
        if (markerIndex === e.suggestionIndex) {
          marker.setOpacity(1);
          marker.setZIndexOffset(1000);
        } else {
          marker.setZIndexOffset(0);
          marker.setOpacity(0.5);
        }
      });
  }

  function addMarker(suggestion) {
    var marker = L.marker(suggestion.latlng, {opacity: .4});
    marker.addTo(map);
    markers.push(marker);
  }

  function removeMarker(marker) {
    map.removeLayer(marker);
  }

  function findBestZoom() {
    var featureGroup = L.featureGroup(markers);
    map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
  }
})();

</script>
<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

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