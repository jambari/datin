<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Stageof Angkasa</title>

        <!-- Fonts -->
        <link href="{{ asset('css/w3.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet"> 
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
		integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
		crossorigin=""/>
        <!-- Styles -->
        <style>
            header {
                font-family: 'Abel', sans-serif;
				display: flex;
            }
            footer {
                display: flex;
                justify-content: center;
                align-content: center;
                flex-direction: row;
				height: 100%;

            }
        </style>
    </head>
    <body class=""{{--  --}}>
        <header class="w3-container w3-teal w3-padding-16">
            <span style="font-size:2em; ">Stageof Angkasapura</span>
        </header>
        <div class="w3-row"  >
            <div class="w3-col s12">
                <div class="w3-container">
                	<div id="map" style="width:100%;height:650px;" class="w3-margin-top w3-margin-right"></div>
						<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
						integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
						crossorigin=""></script>
							<script>
								var map = L.map('map').setView([-2.5104, 140.714], 6);

								L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
									attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
									id: 'mapbox.streets'
								}).addTo(map);

								var terasaIcon = L.icon({
									iconUrl: '/images/redblack.png',
									iconSize:     [20, 20], // size of the icon

								});

								var tidakterasaIcon = L.icon({
									iconUrl: '/images/whiteblack.png',
									iconSize:     [20, 20], // size of the icon

								});
							
								@if ($datas['terasa']->count() > 0)
									@foreach ($datas['terasa'] as $terasa)
									{
										marker = new L.marker([{{ $terasa->lintang }}, {{ $terasa->bujur }}], { icon: terasaIcon}).addTo(map)
										.bindPopup(
											'<table class="table table-bordered table-striped" style="border-radius:25px;">'+
											'<tbody>'+
													'<tr>'+
																'<td>'+'Magnitudo'+'</td>'+
																'<td>'+'<label class="label label-danger">'+'{{ $terasa->magnitudo }}'+'</label>'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Tanggal'+'</td>'+
																'<td>'+'{{ $terasa->tanggal }} {{ $terasa->origin }} UTC'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $terasa->lintang }}, {{ $terasa->bujur }} '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Kedalaman'+'</td>'+
																'<td>'+'{{ $terasa->depth }} Km '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $terasa->ket or '-' }}'+'</td>'+
													'</tr>'+
													'<td>'+'Intensitas'+'</td>'+
																'<td>'+'{{ $terasa->terdampak or '-' }} '+'</td>'+
													'</tr>'+
												'</tbody>'+
											'</table>'
										);
									}
									@endforeach
								@endif

								//tidak terasa
								@if ($datas['tidakterasa']->count() > 0)
									@foreach ($datas['tidakterasa'] as $tidak)
									{
										marker = new L.marker([{{ $tidak->lintang }}, {{ $tidak->bujur }}], { icon: tidakterasaIcon}).addTo(map)
										.bindPopup(
											'<table class="table table-bordered table-striped" style="border-radius:25px;">'+
											'<tbody>'+
													'<tr>'+
																'<td>'+'Magnitudo'+'</td>'+
																'<td>'+'<label class="label label-danger">'+'{{ $tidak->magnitudo }}'+'</label>'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Tanggal'+'</td>'+
																'<td>'+'{{ $terasa->tanggal }}'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Origin'+'</td>'+
																'<td>'+'{{ $terasa->origin }} UTC'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $tidak->lintang }}, {{ $tidak->bujur }} '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Kedalaman'+'</td>'+
																'<td>'+'{{ $tidak->depth }} Km '+'</td>'+
													'</tr>'+
												'</tbody>'+
											'</table>'
										);
									}
									@endforeach
								@endif

							</script>
							<br>
							<table>
								<tbody border="0">
									<tr>
										<td>Dirasakan :</td>
										<td><img src="{{ asset('images') }}/redblack.png" alt=""></td>
										<td>Tidak</td>
										<td><img src="{{ asset('images') }}/whiteblack.png" alt=""></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>

        </div>    
        <footer class="w3-teal w3-padding-32">
                   <p>&copy; Stageof Angkasapura <?php echo date("Y"); ?></p>         
        </footer>
    </body>
</html>
