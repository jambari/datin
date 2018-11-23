@extends('backpack::layout')
    <style>
        #peta {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
        }
    </style>
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">info gempa</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Info Gempabumi</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div align=""  id="peta">
                                <img src=" {{ asset('images') }}/logo.jpeg " alt="logo" width="700px" height="80px" style="margin-bottom: 15px" > 
    
                                <img src=" {{ asset('images') }}/lapenda.png " alt="lapenda" width="600px" height="390px" style="margin-bottom: 15px;">
                                <p class="text-center" style="color: black; font-size: 1em;" > <strong>{{ $sms }} </strong> </p>
                                <img src=" {{ asset('images') }}/medsos.jpg " alt="logo" width="700px" height="50px"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                        <button onclick="take()" class="btn btn-block btn-success" > Download peta </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Zoom In Peta di bawah ini untuk memastikan gempa di darat atau di laut</h1>
                </div>
                <div class="box-body">
                <div id="map" style="width:100%;height:500px;"></div>

                </div>
            </div>
        </div>
    </div>
    <script>
        window.take = function() {
        html2canvas(document.getElementById("peta"), {
            onrendered: function (canvas) {
                var base64image = canvas.toDataURL();
                window.open(base64image , "_blank");
            }
        })
        }

        function initMap() {
        var myLatLng = {lat: {{ $lat }}, lng: {{ $lon }} };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxboE6Q1qKhSDL8HO4wHyH50-CiDUygcA&callback=initMap&callback=initMap">
    </script>

@endsection