@extends('guests.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/bukutamu/store" method="post" id="myform">
                {{ csrf_field() }}
                    <fieldset>
                        <legend>Tambah Tamu</legend>
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
                                    <input class="form-control @if($errors->has('nama')) border border-danger @endif " type="text" id="nama"  name="nama" placeholder="nama"/>
                                </div>
                                <div class="form-group">
                                    <label for="dari">Dari</label>
                                    <input name="dari" class="form-control @if($errors->has('dari')) border border-danger @endif" type="text" id="dari" placeholder="Dari"/>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input name="keperluan" class="form-control @if($errors->has('keperluan')) border border-danger @endif" type="text" id="keperluan" placeholder="Keperluan"/>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input name="keterangan" class="form-control @if($errors->has('keterangan')) border border-danger @endif" type="text" id="keterangan" placeholder="Keterangan"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="">
                                    <div id="my_camera" class="rounded"></div>
                                </div>
                                <div class="form-group">
                                    <a href="javascript:void(take_snapshot())" class="btn btn-primary">Ambil foto</a>
                                    <input type="hidden" id="foto"  name="foto" value="" >
                                </div>
                                <div class="form-group">
                                    <div id="my_result" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Submit" class="btn btn-primary btn-lg btn-block">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('js') }}/webcam.min.js"></script>
    <script language="JavaScript">
    Webcam.set({
    width: 320,
    height: 240,
    dest_width: 320,
    dest_height: 240,
    image_format: 'jpeg',
    jpeg_quality: 90,
    force_flash: false
});

    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri, canvas, context) {
            document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
            document.getElementById('foto').value = raw_image_data;
            console.log(raw_image_data);
        } );
    }
</script>
@endsection