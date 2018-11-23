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
        <!-- Styles -->
        <style>
            header {
                font-family: 'Abel', sans-serif;
            }
            footer {
                display: flex;
                justify-content: center;
                align-content: center;
                flex-direction: row;

            }
        </style>
    </head>
    <body class=""{{--  --}}>
        <header class="w3-container w3-blue-grey w3-padding-16">
            <span style="font-size:2em; ">Stageof Angkasapura</span>
        </header>
        <div class="w3-row"  >
            <div class="w3-col s12">
                <div class="w3-container">
                <div id="map" style="width:100%;height:650px;" class="w3-margin-top w3-margin-right"></div>
							<script>
								function initMap() {
									var myLatlng = {lat:-2.54, lng:140.7504  };
									var map = new google.maps.Map(document.getElementById('map'), {
							center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.TERRAIN,
							zoom: 6,

							});
							var image = '/images/star.png';
							var iconBase = '/images/';
					        var icons = {
					          	terasa: {
					            	icon: iconBase + 'redblack.png'
					          	},
					          	tidak: {
					            	icon: iconBase + 'redblack.png'
					          	}
					        };

							var features = [
								@if ($datas['terasa']->count() > 0)
									@foreach ($datas['terasa'] as $terasa)
									{
							            position: new google.maps.LatLng({{ $terasa->lintang }}, {{ $terasa->bujur }}),
							            type: 'terasa',
							            info: '<table class="table table-bordered table-striped" style="border-radius:25px;">'+
											'<tbody>'+
													'<tr>'+
																'<td>'+'Magnitudo'+'</td>'+
																'<td>'+'<label class="label label-danger">'+'{{ $terasa->magnitudo }}'+'</label>'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Tanggal'+'</td>'+
																'<td>'+'{{ $terasa->tanggal }} {{ $terasa->waktu }} UTC'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $terasa->lintang }}, {{ $terasa->bujur }} '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Kedalaman'+'</td>'+
																'<td>'+'{{ $terasa->kedalaman }} Km '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $terasa->lokasi }} Km '+'</td>'+
													'</tr>'+
													'<td>'+'Intensitas'+'</td>'+
																'<td>'+'{{ $terasa->dirasakan }} '+'</td>'+
													'</tr>'+
												'</tbody>'+
											'</table>',
          							},
									@endforeach
								@endif
								@if ($datas['tidakterasa']->count() > 0)
									@foreach ($datas['tidakterasa'] as $tidak)
									{
							            position: new google.maps.LatLng({{ $tidak->lintang }}, {{ $tidak->bujur }}),
							            type: 'tidak',
							            info: '<table class="table table-bordered table-striped">'+
											'<tbody>'+
													'<tr>'+
																'<td>'+'Magnitudo'+'</td>'+
																'<td>'+'<label class="label label-danger">'+'{{ $tidak->magnitudo }}'+'</label>'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Tanggal'+'</td>'+
																'<td>'+'{{ $tidak->tanggal }} {{ $tidak->origin }} UTC'+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $tidak->lintang }}, {{ $tidak->bujur }} '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Kedalaman'+'</td>'+
																'<td>'+'{{ $tidak->depth }} Km '+'</td>'+
													'</tr>'+
													'<tr>'+
																'<td>'+'Lokasi'+'</td>'+
																'<td>'+'{{ $tidak->ket }} Km '+'</td>'+
													'</tr>'+
													'<td>'+'Intensitas'+'</td>'+
																'<td>'+'{{ $tidak->terdampak }} '+'</td>'+
													'</tr>'+
												'</tbody>'+
											'</table>',
          							},
									@endforeach
								@endif								
        					];

							features.forEach(function(feature) {
					         	var marker = new google.maps.Marker({
					            	position: feature.position,
					            	icon: icons[feature.type].icon,
					            	map: map
					          	});


							var contentString = feature.info;
							

							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
							marker.addListener('click', function() {
								infowindow.open(map, marker);
							});
					        });
							
							}
							</script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxboE6Q1qKhSDL8HO4wHyH50-CiDUygcA&callback=initMap">
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
        <footer class="w3-blue-grey w3-padding-32">
                   <p>copyright Stageof Angkasapura 2018</p>         
        </footer>
    </body>
</html>
