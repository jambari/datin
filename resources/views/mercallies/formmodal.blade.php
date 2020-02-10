
<form class="w3-container" action="/mercallies" method="post" enctype="multipart/form-data">

{{-- <form class="w3-container" action="{{ action('MercallyController@store') }}" method="post" enctype="multipart/form-data"> --}}

    {{ csrf_field() }}

    <div id="map-example-container"></div>
    <input name="lokasi" type="search" id="input-map" placeholder="Dimana lokasi Anda merasakan gempa ?" required="required" class="w3-input" />
    <input class="w3-input" type="hidden" id="lintang" name="lintang" value="">
    <input class="w3-input" type="hidden" id="bujur" name="bujur" value="">
    <input class="w3-input" type="hidden" id="gempaid" name="gempabalai_id" value="">

    <p class="w3-label">Klik/pilih salah satu gambar di bawah ini sesuai apa yang anda rasakan</p>
    {{-- Gambar MMI --}} 

    @include('mercallies.mmi')

    <br>
    <label class="w3-label">Gambar Kerusakan Jika ada</label>

{{--     <div class="w3-row w3-container">
        <div class="w3-col w3-m12 l12">
            <input type="file" name="gambar" class="w3-input" value="">
        </div>
    </div> --}}
    <br>
    <label class="w3-label">Nama</label>
    <input class="w3-input" type="text" name="nama" placeholder="Tidak Wajib">

    <input type="submit" class="w3-button w3-block w3-red w3-margin-top " value="Submit" />

</form>