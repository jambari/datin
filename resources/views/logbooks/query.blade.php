@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">dashboard</a></li>
        <li class="active">logbook</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <form action="/logbook/search" method="POST" role="search">
            {{ csrf_field() }}
             
            <div class="form-group">
                <label for="start">Tanggal awal / Start date</label>
                <input type="date" class="form-control" name="start" required >
            </div>
            <div class="form-group">
                <label for="akhir">Tanggal akhir / End date</label>
                <input type="date" class="form-control" name="end" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-secondary btn-block btn-lg">
                <span class="glyphicon glyphicon-search">Cari</span>
            </button>
            </div>
        </form>
    </div>

@endsection



