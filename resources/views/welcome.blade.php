<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/w3.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
{{--         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

        <!-- Styles -->
    </head>
    <body class=""{{--  style="background: #647687;" --}}>

        <div class="w3-row">
            <div class="w3-col s4">
                <div class="w3-container">
                    <div class="w3-panel w3-card-4 w3-text-white w3-center w3-teal ">
                        <h2> <i class="wi wi-earthquake"></i> GEMPABUMI TERKINI  </h5>
                        <h3>
                            {{ $event->magnitudo or '-' }} {{ $event->type or '-' }}
                        </h3>
                        <h3>
                            {{ $event->tanggal or '-' }} {{ $event->origin or '-' }} UTC
                        </h3>
                        <h3>
                            {{ $event->depth or '-' }} Km
                        </h3>
                        <h3>
                            {{ $event->ket or '-'}}
                        </h3>
                        <h3>
                            {{ $event->terdampak or '-' }}
                        </h3>
                    </div> 
                </div>
            </div>

            <div class="w3-col s4">
                <div class="w3-container">
                    <div class="w3-panel w3-card-4 w3-orange w3-text-white">
                          <p>
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos accusamus mollitia assumenda. Vel magni aspernatur doloribus illum quod natus et.
                          </p>
                    </div> 
                </div>
            </div>

            <div class="w3-col s4">
                <div class="w3-container">
                    <div class="w3-panel w3-card-4 w3-orange w3-text-white">
                          <p>
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos accusamus mollitia assumenda. Vel magni aspernatur doloribus illum quod natus et.
                          </p>
                    </div> 
                </div>
            </div>
        </div>    
    </body>
</html>
