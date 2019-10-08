@extends('layanan')
@section('title')
	<title>Formulir permintaan data dan jasa</title>
@endsection

@section('content')

<div class="container">

	<div class="section">
		<div class="container">
			<h5 class="teal-text lighten-2 center-align " >Contoh {{ $jenisdata }}</h5>
				<div class="divider"></div>
			<img class="materialboxed" width="650" src="{{ asset('images/layanan') }}/{{ $jpg }}">
		</div>
	</div>
    <div class="section">
	    <div class="row">
	        <div class="col s12 center">
	          <h3><i class="mdi-content-send brown-text"></i></h3>
	          <h4 class="teal-text lighten-2">FORMULIR PERMOHONAN</h4>
	          <form class="col s12">
	              <div class="row">
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
	                  <label for="nama">Nama lengkap</label>
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="text" class="validate">
	                  <label for="instansi">Instansi/Perusahaan/Perguruan Tinggi</label>
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
	                  <label for="alamat">Alamat</label>
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="email" class="validate">
	                  <label for="email">Email</label>
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s6">
	                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
	                  <label for="telepon">No Telepon/HP</label>
	                </div>
	                <div class="input-field col s6">
	                  <input id="last_name" type="text" class="validate" value="{{ $jenisdata }}" >
	                  <label for="jenis">Jenis Data</label>
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s12">
	                  <div class="file-field input-field">
	                    <div class="btn">
	                      <span>File</span>
	                      <input type="file" multiple>
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
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
        
</script>
@endsection