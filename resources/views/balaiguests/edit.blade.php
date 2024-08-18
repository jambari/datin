@extends('balaiguests.layout')
@section('content')
    <div class="container" style="margin-bottom: 10%;">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" id="myform" action="{{ route('balaiguests.update',$guest->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                    <fieldset>
                        <legend>Edit {{ $guest['nama'] }}</legend>
                        <div class="row">
                            <div class="col-md-8">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input class="form-control @if($errors->has('nama')) border border-danger @endif " type="text" id="nama"  name="nama" value=" {{ $guest['nama'] }} "/>
                                </div>
                                <div class="form-group">
                                    <label for="dari">Dari</label>
                                    <input name="dari" class="form-control @if($errors->has('dari')) border border-danger @endif" type="text" id="dari" value=" {{ $guest['dari'] }} "/>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input name="keperluan" class="form-control @if($errors->has('keperluan')) border border-danger @endif" type="text" id="keperluan" value=" {{ $guest['keperluan'] }} "/>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input name="keterangan" class="form-control @if($errors->has('keterangan')) border border-danger @endif" type="text" id="keterangan" value=" {{ $guest['keterangan'] }} "/>
                                </div>
                            </div>
                            <div class="col-md-4">
<!--                                 <div class="form-group" style="">
                                    <div id="my_camera" class="rounded"></div>
                                </div> -->
                                <div class="form-group">
<!--                                     <a href="javascript:void(take_snapshot())" class="btn btn-primary">Ambil foto</a> -->
                                    <input type="hidden" id="foto"  name="foto" value=" {{ $guest['foto'] }} " >
                                </div>
                                <div class="form-group">
                                    <div id="my_result" >
                                        <img src="{{ \Storage::url('photos/' . $guest->foto) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Update" class="btn btn-primary btn-lg btn-block">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
