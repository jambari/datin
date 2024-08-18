@extends('backpack::layout')
@if (backpack_auth()->user()->name != 'balai5')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">terbit terbenam matahari</li>
      </ol>
    </section>
@endsection


@section('content')
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Sun rise and set</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <form action="/lapbul/get/ttm" method="GET" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start">Start</label>
                            <input type="date" class="form-control" name="start" required >
                        </div>
                        <div class="form-group">
                            <label for="akhir">End</label>
                            <input type="date" class="form-control" name="end" required>
                        </div>
                        <div class="form-group">
                            <label for="for site label" >Pilih Kota</label>
                            <select name="kota" id="kota" class="form-select">
                                <option value="jayapura" selected>Jayapura</option>
                                <option value="sentani">Sentani</option>
                                <option value="biak">Biak</option>
                                <option value="merauke">Merauke</option>
                                <option value="sarmi">Sarmi</option>
                                <option value="nabire">Nabire</option>
                                <option value="timika">Timika</option>
                                <option value="wamena">Wamena</option>
                                <option value="manokwari">Manokwari</option>
                                <option value="kaimana">Kaimana</option>
                                <option value="sorong">Sorong</option>
                                <option value="fakfak">Fakfak</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-success " value="Submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@yield('after_script')
@endif

