@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-red-gradient">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Origin</span>
                    <span class="info-box-number">{{ $gempa->tanggal or '-' }}</span>
                    <span class="info-box-number">{{ $gempa->origin or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Epicenter</span>
                    <span class="info-box-number">
                        @php
                        $lin = str_split($gempa->lintang);
                        if ($lin[0] == '-' && count($lin) <=2 ) { //jika misal lintang = 3.0, 4.0 
                            $lintang = $lin[1].'.0';
                        }
                        else {
                            $lintang = $lin[1].$lin[2].$lin[3];
                        }

                        print_r($lintang.' LS');
                        @endphp

                    </span>
                    <span class="info-box-number">{{ $gempa->bujur or '-' }} BT</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow-gradient">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Magnitudo</span>
                    <span class="info-box-number">{{ $gempa->magnitudo or '-' }} {{ $gempa->type or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-purple-gradient">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kedalaman</span>
                    <span class="info-box-number"> {{ $gempa->depth or '-' }} Km</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
@endsection
