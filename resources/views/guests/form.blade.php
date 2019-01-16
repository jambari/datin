@extends('guests.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/bukutamu/post" method="post" id="myform">
                {{ csrf_field() }}
                    <fieldset>
                        <legend>Tambah Tamu</legend>
                        <div class="input-group vertical">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" placeholder="nama"/>
                        </div>
                        <div class="input-group vertical">
                            <label for="dari">Dari</label>
                            <input type="text" id="dari" placeholder="Dari"/>
                        </div>
                        <div class="input-group vertical">
                            <label for="keperluan">Keperluan</label>
                            <input type="text" id="keperluan" placeholder="Keperluan"/>
                        </div>
                        <div class="input-group vertical">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" id="keterangan" placeholder="Keterangan"/>
                        </div>
                        <div class="input-group fluid" style="padding: 5px; margin: 10px;">
                            <div id="my_camera" style="width:320px; height:240px;"></div>
                            <div id="my_result"></div>
                            <a href="javascript:void(take_snapshot())" >Ambil foto</a>
                            <input type="hidden" id="foto"  name="foto" value="">
                        </div>
                        <input type="submit" value="Submit" class="button tertiary">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('js') }}/webcam.min.js"></script>
    <script language="JavaScript">
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