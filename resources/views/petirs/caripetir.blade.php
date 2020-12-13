@extends('main')
@section('title')
<title>Gempabumi statistik- Stasiun Geofisika Kelas I Jayapura</title>
@section('after_style')

<style type="text/css" media="screen">
</style>
@endsection
@endsection

@section('content')
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/caripetir" class="text-primary" >Sambaran Petir</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
        <h5>Silahkan Lengkapi formulir di bawah ini !</h5>
        <form action="/caripetir/query" method="POST" role="search">
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
<br>
@endsection