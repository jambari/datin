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

    html, body, {

        height: 100%;

        margin: 0px;

    }

	.map-wrapper { width: 100%; height:100%; position:absolute;}
	#map { width: 80%; height:100%; position: relative;}

	.tabel-wrapper { 
		width:24% ; 
		height: 100%; 
		position:absolute;
		overflow: auto;
		z-index: 500;
	}

	#tabel 
	{ 

		/*z-index: 500;*/
	}

    body { padding:0; font-family: 'Arimo', sans-serif; }

  #tabel-gempa {
    margin-bottom: 5px;
  }

  .param {
  	font-size: 1rem;
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

.circle {
  width: 100px;
  height: 100px;
  line-height: 200px;
  border-radius: 50%; /* the magic */
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  text-align: center;
  color: white;
  font-size: 16px;
  text-transform: uppercase;
  font-weight: 700;
  margin: 0 auto 40px;
}

.red {
  background-color: #e74c3c;
}
</style>
<body>
	<div class="w3-row w3-bar w3-padding-16 w3-card w3-border-blue" style="position: ; top: 0;">
      <div class="w3-col w3-container m2 l1" style="display: flex; justify-content: center; align-items: center;" >
            <a href="/simimi">
            <img src="{{ asset('images') }}/logo-bmkg.png" alt="" width="45" height="55" >
      </div>
      <div class="w3-col w3-container m10 l11" style="display: flex; flex-direction: row; justify-content: space-around; align-items: center;">
        <a href="/simimi" style="text-decoration: none;">
            <h3 >SiMIMI</h3>
            </a>

            <a href="/" style="text-decoration: none;" >
            <h3>Tentang</h3>
            </a>

      </div>
	</div>

	<div class="w3-row">
	  	<div class="w3-col w3-container m4 l3" style=";">
			<div class="tabel-wrapper">
				@if ( $eqs )
		            @foreach ( $eqs as $gempa )
		            	<div class="w3-panel w3-container w3-border-bottom" id="tabel" onmouseover="" >
		            		<table >
		            			<tr>
		            				<td><span class="w3-badge @if ($gempa->magnitudo < 5) w3-green @else w3-red @endif param">M{{ $gempa->magnitudo }}</span></td>
		            				<td class="param">{{ $gempa->ket }}<br>
								{{ $gempa->origin }} WIT <br> Kdlmn: {{ $gempa->depth }} Km </td>
		            			</tr>
		            		</table>
		            		<div class="w3-container "style="padding-bottom: 10px;">
	  							<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-red w3-block" onmouseover="document.getElementById('gempaid').value = {{ $gempa->id }} ; console.log({{ $gempa->id }});"> Merasakan ?</button>
		            		</div>
                            <div class="w3-container "style="padding-bottom: 10px;">
                                 <a class="w3-button w3-teal w3-block" href="/seismisitas/{{ $gempa->id }}">Seismisitas</a>
                            </div>
		            	</div>
				  	@endforeach
	 			@endif
			</div>
	  	</div>
	  	<div class="w3-col w3-hide-small m8 l9" id="peta-gempa">
			<div class="map-wrapper">
				<div id="map" style="width:100%; height: 100%;"></div>
                <div class="w3-container w3-center">
                    <p >        <?php echo date("Y"); ?> SiMIMI <small>handcrafted by <a href="https://github.com/jambari" style="text-decoration: none;" class="w3-teal" target="_blank">Jambari</a></small>
                        </p>
                </div>
			</div>
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

            @include('mercallies.formmodal')

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
    console.log(suggestion.latlng);
    // document.getElementById('lintang').value = suggestion.latlng.lat ;
    // document.getElementById('bujur').value = suggestion.latlng.lng ;
  }

  placesAutocomplete.on('change', function(e) {
    //$address.textContent = e.suggestion.value;
    document.getElementById('lintang').value = e.suggestion.latlng.lat ;
    document.getElementById('bujur').value = e.suggestion.latlng.lng ;
  });


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

var map = L.map('map').setView([-2.5104, 140.714], 6);
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


	var lastIcon = L.icon({
		iconUrl: '/images/icongempa.png',
		iconSize:     [40, 40], // size of the icon

	});
        var red = L.divIcon({
          // Specify a class name we can refer to in CSS.
          className: 'css-icon',
          html: '<div class="circle red"></div>'
          // Set marker width and height
          ,iconSize: [100,100]
          // ,iconAnchor: [11,11]
        });

	@if ($eqs->count() > 0)
		@foreach ($eqs as $eq)
		@if($eq->magnitudo < 5)
			marker = new L.circleMarker([{{ $eq->lintang }}, {{ $eq->bujur }}], {color: "#1A75FF", radius: 8}).addTo(map)
		@endif
		@if($eq->magnitudo >= 5)
		marker = new L.circleMarker([{{ $eq->lintang }}, {{ $eq->bujur }}], {color: "#ffd11a", radius: 12}).addTo(map)
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