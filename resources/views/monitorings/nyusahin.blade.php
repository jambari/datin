@extends('backpack::layout')
@if (backpack_auth()->user()->name != 'balai5')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">nyusahin</li>
      </ol>
    </section>
@endsection


@section('content')
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">NGREPOTIN</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/images/slmon2.png')}}" alt="logo slmon 2 bmkg" width="100%" height="100%"  >
                                    <div class="caption">
                                        <h3>SLMON 2 BMKG</h3>
                                        <p>Tanpa user</p>
                                        <p><a href="http://202.90.198.40/sismon-wrs/web/slmon2"  target="_blank" class="btn btn-primary btn-block" role="button">GASZKEUN</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/images/availability.png')}}" alt="logo availability data" width="100%" height="100%">
                                    <div class="caption">
                                        <h3>AVAILABILITY DATA</h3>
                                        <p>
                                            Username: pusat | password: p02015!<br>
                                            Username: stageofjayapura | password: AngkasA
                                        </p>
                                        <p><a href="http://202.90.198.127/stasiun/"  target="_blank" class="btn btn-primary btn-block" role="button">GASZKEUN</a></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/images/grafanaunana.png')}}" alt="logo grafana" width="100%" height="100%">
                                    <div class="caption">
                                        <h3>WRSNG / GRAFANA UNANA</h3>
                                        <p>
                                            Username: jayapura@wrs.id <br>
                                            Username: jayapura
                                        </p>
                                        <p><a href="http://202.90.198.40/sismon-wrs/web/slmon2"  target="_blank" class="btn btn-primary btn-block" role="button">SLMON 2</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/images/simora.png')}}" alt="logo indeks" width="100%" height="100%">
                                    <div class="caption">
                                        <h3>LD & ACCELERO (SIMORA)</h3>
                                        <p>Username: stageof.jayapura <br>
                                         Password: 12345678</p>
                                        <p><a href="http://172.16.17.32/https://simora.bmkg.go.id/simora/web/login_page/"  target="_blank" class="btn btn-primary btn-block" role="button">GASZKEUN</a></p>
                                    </div>
                                </div>
                            </div>    

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="{{ asset('/images/slaola.png')}}" alt="logo indeks" width="100%" height="100%">
                                    <div class="caption">
                                        <h3>SLA OLAE</h3>
                                        <p>Apateu, apateu
                                            Apateu, apateu
                                            Apateu, apateu
                                            Uh, uh-huh, uh-huh </p>
                                        <p><a href="https://docs.google.com/spreadsheets/d/1bNMyJD8FcUh1t-8M5ZhNjyJ16E4JtoP1DbVxW0upE7o/edit#gid=924551775"  target="_blank" class="btn btn-primary btn-block" role="button">SEMANGAT</a></p>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@yield('after_script')
@endif

