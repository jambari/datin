@extends('layanan')
@section('title')
	<title>Tentang Layanan Di Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('content')
	<div class="container">
		<div class="section">
			  <nav>
			    <div class="nav-wrapper red accent-3">
			      <div class="col s12">
			        <a href="/layanandata" class="breadcrumb">Home</a>
			        <a href="/layanandata/tentang" class="breadcrumb">Tentang</a>
			      </div>
			    </div>
			  </nav>
		</div>
		<div class="container">
			<div class="section">
			  	<div class="row">
			    	<div class="col s12 m12 l10">
			      		<div id="introduction" class="section scrollspy">
 							<img class="materialboxed" width="650" src="{{ asset('images/layanan/tentang.png') }}">
			      		</div>
			      		<div class="divider"></div>

			     		<div id="structure" class="section scrollspy">
			     			<h5 class="text-teal lighten-2">Dasar Hukum</h5>
	         				<object width="100%" height="800px" data="{{ asset('images/layanan/dasarhukum.pdf') }}"></object>
			      		</div>
			    	</div>
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