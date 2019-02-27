<div class="row">
    <div class=" col-md-12">
        <div class="box box-success box-solid">
            <div class="box-header">
                {{ $event->tanggal }} {{ $event->origin }}
            </div>
            <div class="box-body" >
                <div class="row">
                    <div class="container">
                        <div id="map" style="width:50%;height:500px;"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
crossorigin=""></script>
<script src="{{ asset('gjson') }}/patahan.js" > </script>
<script src="{{ asset('gjson') }}/subduksi.js" > </script>
<script src="{{ asset('gjson') }}/plates.js" > </script>
<script>
    var mymap = L.map('map').setView([{{ $event->lintang  }}, {{ $event->bujur }}], 7);

    L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
    }).addTo(mymap);

    var eqIcon = L.icon({
        iconUrl: '/images/icongempa.png',

        iconSize:     [40, 40], // size of the icon
    });
    L.marker([{{ $event->lintang }}, {{ $event->bujur }}], {icon: eqIcon}).addTo(mymap);
    //style for subduksi and patahan
    var patahanStyle = {
        "color": "#2C4B48",
        "weight": 0.7,
        "opacity": 0.9
    };

    //style for subduksi

    var subduksiStyle = {
        "color": "#0A70C4",
        "weight": 1,
        "opacity": 0.5,
        "fillColor": 'transparent',
    }

    function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
        if (feature.properties && feature.properties.PlateName) {
            layer.bindPopup(feature.properties.PlateName);
        }
    }

    L.geoJSON(pataHan, {
        style : patahanStyle,
    }).addTo(mymap); //add patahan symbol

    // L.geoJSON(worldPlates, {
    //     style: subduksiStyle,
    //     onEachFeature: onEachFeature
    // }).addTo(mymap);

    //plot subduction
    L.geoJSON(subDuksi, {
        style: subduksiStyle
    }).addTo(mymap);

    // Define an icon called cssIcon
    var cssIcon = L.divIcon({
      // Specify a class name we can refer to in CSS.
      className: 'css-icon',
      html: '<div class="gps_ring"></div>'
      // Set marker width and height
      ,iconSize: [100,100]
      // ,iconAnchor: [11,11]
    });

//add css icon as gps ring
//  L.marker([{{ $event->lintang }}, {{ $event->bujur }}], {icon: cssIcon}).addTo(mymap);
</script>