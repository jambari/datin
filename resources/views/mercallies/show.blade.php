<!DOCTYPE html>
<html>
<title>Rasa Gempa ?</title>
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
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
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
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  .tabel-wrapper {
    width: 100%;
    position: relative;
  }
  .map-wrapper {
    width: 100%;
    height: 45%;
  }

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
	  <div class="w3-col w3-container m2 l1" style="display: flex; justify-content: center; align-items: center;" >
	  		<a href="/">
			<img src="{{ asset('images') }}/logo-bmkg.png" alt="" width="45" height="55" >
	  </div>
	  <div class="w3-col w3-container m10 l11">
	  	<a href="/" style="text-decoration: none; display: flex; justify-content: center; align-items: center;">
			<h4>STASIUN GEOFISIKA KELAS I ANGKASAPURA JAYAPURA</h4>
			</a>

	  </div>
	</div>

	<div class="w3-row">
	  	<div class="w3-col w3-container m4 l3" style=";">
			<div class="tabel-wrapper">
				@if ( $mmis )
		            @foreach ( $mmis as $mmi )
		            	<div class="w3-panel w3-container w3-border-bottom" id="tabel" onmouseover="" >
							
		            		<p>{{ $mmi->lokasi }}</p>
		            		<p>
		            		@if ($mmi->mmi == 1)
								I MMI
							@endif
							@if ($mmi->mmi == 2)
								II MMI
							@endif
							@if ($mmi->mmi == 3)
								III MMI
							@endif
							@if ($mmi->mmi == 4)
								IV MMI
							@endif
							@if ($mmi->mmi == 5)
								V MMI
							@endif
							@if ($mmi->mmi == 6)
								VI MMI
							@endif
							@if ($mmi->mmi == 7)
								VII MMI
							@endif
							@if ($mmi->mmi == 8)
								VIII MMI
							@endif
							@if ($mmi->mmi == 9)
								IX MMI
							@endif
							@if ($mmi->mmi == 10)
								X MMI
							@endif
							@if ($mmi->mmi == 11)
								XI MMI
							@endif
							@if ($mmi->mmi == 12)
								XII MMI
						
							@endif
		            		</p>
		            	</div>
				  	@endforeach

	 			@endif
	 			@if (count($mmis) === 0)

	 			<p class="w3-alert ">Belum ada data seismisitas </p>

				@endif
			</div>
	  	</div>
	  	<div class="w3-col m8 l9" id="peta-gempa">
			<div class="map-wrapper">
				<div id="map" style="width:100%; height: 100%;"></div>
                <div class="w3-container w3-center">
                    <p >        <?php echo date("Y"); ?> Stasiun Geofisika Kelas I Angkasapura Jayapura <small>handcrafted by <a href="https://github.com/jambari" style="text-decoration: none;" class="w3-teal" target="_blank">Jambari</a></small>
                        </p>
                </div>
			</div>
		</div>
	</div>



<script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
crossorigin=""></script>
<link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
<script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
<script src="{{ asset('gjson') }}/patahan.js" > </script>
<script src="{{ asset('gjson') }}/subduksi.js" > </script>
<script src="{{ asset('gjson') }}/plates.js" > </script>
<script>

var map = L.map('map').setView([{{ $event->lintang }}, {{ $event->bujur }}], 8);
// ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
 var layer = L.esri.basemapLayer('Topographic').addTo(map);
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
		iconUrl: '/images/star.png',
		iconSize:     [30, 30], // size of the icon

	});
	var recentIcon = L.icon.pulse({iconSize:[15,15],color:'yellow'});

	@if ($mmis->count() > 0)
		@foreach ($mmis as $mmik)
		@if($mmik->mmi == 1)
			marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#4CAF50", radius: 5}).addTo(map)
		@endif
		@if($mmik->mmi == 2)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#4CAF50", radius: 8}).addTo(map)
		@endif
		@if($mmik->mmi == 3)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#4CAF50", radius: 11}).addTo(map)
		@endif
		@if($mmik->mmi == 4)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFC107", radius: 14}).addTo(map)
		@endif
		@if($mmik->mmi == 5)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFC107", radius: 18}).addTo(map)
		@endif
		@if($mmik->mmi == 6)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFC107", radius: 22}).addTo(map)
		@endif
		@if($mmik->mmi == 7)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFEB3B", radius: 26}).addTo(map)
		@endif
		@if($mmik->mmi == 8)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFEB3B", radius: 30}).addTo(map)
		@endif
		@if($mmik->mmi == 9)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FFEB3B", radius: 34}).addTo(map)
		@endif
		@if($mmik->mmi == 10)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FF5722", radius: 36}).addTo(map)
		@endif
		@if($mmik->mmi == 11)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FF5722", radius: 40}).addTo(map)
		@endif
		@if($mmik->mmi == 12)
		marker = new L.circleMarker([{{ $mmik->lintang }}, {{ $mmik->bujur }}], {color: "#FF5722", radius: 44}).addTo(map)
		@endif
			.bindPopup(
				`{{ $mmik->lokasi }}
				{{ $mmik->mmi }} MMI`);
		@endforeach
	@endif
			var pulsingIcon = L.icon.pulse({iconSize:[120,120],color:'red'});

			marker = new L.marker([{{ $event->lintang }}, {{ $event->bujur }}], { icon: lastIcon}).addTo(map).bindPopup(
				`{{ $event->tanggal }}
				{{ $event->origin }} UTC,
				{{ $event->lintang }}
				{{ $event->bujur }} BT,
				M{{ $event->magnitudo }}
				Depth {{ $event->depth }} Km,
				{{ $event->ket }}`);

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