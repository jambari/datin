@extends('layanan')
@section('title')
	<title>Jasa Penyewaan Peralatan</title>
@endsection
@section('content')
	<div class="container">
		<div class="section">
			  <nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="/layanandata" class="breadcrumb">Home</a>
			        <a href="/layanandata/jasa" class="breadcrumb">Jasa Penyewaan Peralatan</a>
			      </div>
			    </div>
			  </nav>
		</div>
		<div class="section">
			  <div class="row">
			    <div class="col s12 m4">
				    <div class="card">
				        <div class="card-image">
				          <img src="{{ asset('images/layanan/page06.jpg') }}">
				        </div>
				        <div class="card-content">
				        	<span class="card-title teal-text lighten-2">Teropong Rukyat (low grade)</span>
				          	<p>Peralatan geofisika berupa teropong rukyat. Cocok untuk pengamatan Gerhana pada malam hari dengan bising cahaya yang minim. Tarif berlaku per hari per unit.</p>
				        </div>
						<div class="card sticky-action">
						    <div class="card-action">
				               <a href="#">Rp230.000</a>
				               <a href="/layanandata/formulir/5">Pesan</a>
							</div>
						</div>
	           
				    </div>
			    </div>

			    <div class="col s12 m4">
			      <div class="card">
			        <div class="card-image">
			          <img src="{{ asset('images/layanan/page07.jpg') }}">
			        </div>
			        <div class="card-content">
			           <span class="card-title teal-text lighten-2">Digital Portable Short Period Seismograph</span>
			           <p>Seperangkat Digital Portable Short Period Seismograph yang dapat digunakan untuk pengamatan mikrotremor. Tarif belum termasuk jasa operator jika anda menggunakan jasa operator dari kami.</p>
			        </div>
			        <div class="card sticky-action">
					    <div class="card-action">
			               <a href="#">Rp640.000</a>
			               <a href="/layanandata/formulir/6">Pesan</a>
						</div>
			        </div>
			      </div>
			    </div>

			    <div class="col s12 m4">
			      <div class="card">
			        <div class="card-image">
			          <img src="{{ asset('images/layanan/page08.jpg') }}">
			        </div>
			        <div class="card-content">
			           <span class="card-title teal-text lighten-2">Deklinasi dan Inklinasi Magnetometer</span>
			           <p>Seperangkat Deklinasi dan Inklinasi Magnetometer yang dapat digunakan untuk pengamatan mikrotremor. Tarif belum termasuk jasa operator jika anda menggunakan jasa operator dari kami.</p>
			        </div>
			        <div class="card sticky-action">
						<div class="card-action">
							<a href="#">Rp400.000</a>
			            	<a href="/layanandata/formulir/7">Pesan</a>
						</div>
			        </div>
			      </div>
			    </div>
			  </div>
		</div>
	</div>
@endsection