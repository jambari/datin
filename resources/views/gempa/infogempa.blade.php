@extends('backpack::layout')
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
        <div class="col-md-12">
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
                    <div class="row" id="peta" >
                        <div class="col-md-8 col-offset-md-4 ">
                            <div align="center" id="peta" >
                                <p> {{ $sms }} </p>
                                <img src=" {{ asset('images') }}/lapenda.png " alt="lapenda" width="600px" height="450px" >
                            </div>
                        </div>
                        <div col-md-4 >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-body">
                        <button onclick="take()" class="btn btn-block" > Download peta </button>
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
    </script>
@endsection