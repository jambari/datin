@extends('layanan')
@section('title')
	<title>Goes To School</title>
@endsection
@section('after_style')
<style>

    .slides>li:after {
      content:"";
      display:block;
      position:absolute;
      top:0;
      bottom:0;
      left:0;
      right:0;
      background:rgba(0,0,0,0.1);
    }

	.slider {

/*    background:
    linear-gradient(
      rgba(0, 0, 0, 0.9),
      rgba(0, 0, 0, 0.5)*/
    )
}
</style>

@endsection
@section('content')
	<div class="container">
		<div class="section">
			  <nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="/layanandata" class="breadcrumb">Home</a>
			        <a href="/layanandata/gts" class="breadcrumb">Goes To School</a>
			      </div>
			    </div>
			  </nav>
		</div>
		<div class="section">
				<div class="row">
				  <div class="slider">
				    <ul class="slides">
				      <li>
				        <img class="" src="{{ asset('images/layanan/gts/1.JPG') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Kunjungan Peserta OSN</h3>
				          <h5 class="light grey-text text-lighten-3">Peserta OSN Menerima Materi di Aula Kantor Stasiun Geofisika Kelas I Angkasapura.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/2.JPG') }}"> <!-- random image -->
				        <div class="caption left-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Penyerahan sertifikat dari Stageof Jayapura ke Kepala Sekolah.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/3.JPG') }}"> <!-- random image -->
				        <div class="caption right-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Foto bersama Pemateri, Kepala Sekolah, dan Siswa.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/4.JPG') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Kunjungan Peserta OSN</h3>
				          <h5 class="light grey-text text-lighten-3">Foto bersama di depan papan nama Stageof Jayapura</h5>
				        </div>
				      </li>
				      <li>
				        <img class="" src="{{ asset('images/layanan/gts/5.JPG') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Kunjungan Peserta OSN</h3>
				          <h5 class="light grey-text text-lighten-3">Peserta OSN Menerima Materi di Aula Kantor Stasiun Geofisika Kelas I Angkasapura.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/6.JPG') }}"> <!-- random image -->
				        <div class="caption left-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Penyerahan sertifikat dari Stageof Jayapura ke Kepala Sekolah.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/7.JPG') }}"> <!-- random image -->
				        <div class="caption right-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Foto bersama Pemateri, Kepala Sekolah, dan Siswa.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/8.JPG') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Kunjungan Peserta OSN</h3>
				          <h5 class="light grey-text text-lighten-3">Foto bersama di depan papan nama Stageof Jayapura</h5>
				        </div>
				      </li>
				      <li>
				        <img class="" src="{{ asset('images/layanan/gts/10.JPG') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Kunjungan Peserta OSN</h3>
				          <h5 class="light grey-text text-lighten-3">Peserta OSN Menerima Materi di Aula Kantor Stasiun Geofisika Kelas I Angkasapura.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/12.jpg') }}"> <!-- random image -->
				        <div class="caption left-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Penyerahan sertifikat dari Stageof Jayapura ke Kepala Sekolah.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/13.jpg') }}"> <!-- random image -->
				        <div class="caption right-align">
				          <h3>Goes To School SMP Yapis Jayapura</h3>
				          <h5 class="light grey-text text-lighten-3">Foto bersama Pemateri, Kepala Sekolah, dan Siswa.</h5>
				        </div>
				      </li>
				      <li>
				        <img src="{{ asset('images/layanan/gts/14.jpg') }}"> <!-- random image -->
				        <div class="caption center-align">
				          <h3>Goes To School SMKN 4 Keerom</h3>
				          <h5 class="light grey-text text-lighten-3">Penyerahan Plakat dari Stageof Jayapura</h5>
				        </div>
				      </li>
				    </ul>
				 </div>
			</div>
		</div>
	    <div class="section">
		    <div class="row">
		        <div class="col s12 center">
		          <h3><i class="mdi-content-send brown-text"></i></h3>
		          <h4 class="teal-text lighten-2">FORMLIR PERMOHONAN GOES TO SCHOOL/FIELDTRIP</h4>
	          <form class="col s12" action="{{ action('LayananController@store') }}" method="POST" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	              <div class="row">
                    @if ($errors->any())
                        <div class="badge red darken-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate" required="required" name="nama"  >
	                  <label for="nama">Nama lengkap</label>
	                  @if($errors->has('email'))<span class="helper-text" data-error="wrong" data-success="right">Helper text</span>@endif
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="text" class="validate" name="instansi" required="required">
	                  <label for="instansi">Instansi/Perusahaan/Perguruan Tinggi</label>

	                  @if($errors->has('email'))<span class="helper-text" data-error="wrong" data-success="right">Helper text</span>@endif
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate" required="required" name="alamat">
	                  <label for="alamat">Alamat</label>
	                  @if($errors->has('email'))<span class="helper-text" data-error="wrong" data-success="right">Helper text</span>@endif
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="email" class="validate" name="email" required="required">
	                  <label for="email">Email</label>
	                  @if($errors->has('email'))<span class="helper-text" data-error="wrong" data-success="right">Helper text</span>@endif
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="handphone" required="required">
	                  <label for="telepon">No Telepon/HP</label>
	                  @if($errors->has('email'))<span class="helper-text" data-error="wrong" data-success="right">Helper text</span>@endif
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="text" class="validate" value="Goes To School" name="jenis_data" required="required">
	                  <label for="jenis">Jenis Data</label>
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s12">
	                  <div class="file-field input-field">
	                    <div class="btn">
	                      <span>File</span>
	                      <input type="file" multiple name="surat" required="required">
	                    </div>
	                    <div class="file-path-wrapper">
	                      <input class="file-path validate" type="text" placeholder="Unggah surat permohonan">
	                    </div>
	                  </div>
	                </div>
	              </div>
	                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
	                  <i class="material-icons right">send</i>
	                </button>
	            </div>
	          </form>
		        </div>
		    </div>
	    </div>
	</div>
@endsection
@section('after_script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, {'height':600, 'interval':2000});
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.slider').slider();
  });
       

        
</script>
@endsection