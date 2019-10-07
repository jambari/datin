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
			        <a href="/layanan" class="breadcrumb">Home</a>
			        <a href="/layanan/gts" class="breadcrumb">Goes To School</a>
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