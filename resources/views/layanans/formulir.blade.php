@extends('layanan')
@section('title')
	<title>Formulir permintaan data dan jasa</title>
@endsection

@section('content')

<div class="container">

	<div class="section">
		<div class="container">
			<h5 class="red-text text-accent-3 center-align " >Contoh {{ $jenisdata }}</h5>
				<div class="divider"></div>
			<img class="materialboxed" width="650" src="{{ asset('images/layanan') }}/{{ $jpg }}">
		</div>
	</div>
    <div class="section">
	    <div class="row">
	        <div class="col s12 center">
	          <h3><i class="mdi-content-send brown-text"></i></h3>
	          <h4 class="red-text text-accent-3">FORMULIR PERMOHONAN</h4>
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
	                  <input id="last_name" type="text" class="validate" value="{{ $jenisdata }}" name="jenis_data" required="required">
	                  <label for="jenis">Jenis Data</label>
	                </div>
	              </div>
	              <div class="row">
	                <div class="input-field col s12">
	                  <div class="file-field input-field">
	                    <div class="btn red accent-3">
	                      <span>File</span>
	                      <input type="file" multiple name="surat" required="required">
	                    </div>
	                    <div class="file-path-wrapper">
	                      <input class="file-path validate" type="text" placeholder="Unggah surat permohonan">
	                    </div>
	                  </div>
	                </div>
	              </div>
	                <button class="btn waves-effect waves-light red accent-3" type="submit" name="action">Submit
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