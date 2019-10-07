@extends('layanan')
@section('title')
	<title>Tarif Layanan Di Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('content')
	<div class="container">
		<div class="section">
			  <nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="/layanan" class="breadcrumb">Home</a>
			        <a href="/layanan/tarif" class="breadcrumb">Tarif</a>
			      </div>
			    </div>
			  </nav>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">
			    	<div class="col s12 m12 l10">
				      	<table class="striped highlight">
				            <thead>
				            	<tr>
					              <th>#</th>
					              <th>Layanan Data/Jasa</th>
					              <th>Harga</th>
				          		</tr>
				        	</thead>

					        <tbody>
					          <tr>
					            <td>1</td>
					            <td>Peta Kegempaan</td>
					            <td>Rp250.000</td>
					          </tr>
					          <tr>
					            <td>2</td>
					            <td>Peta Tingkat Kerawanan Petir</td>
					            <td>Rp200.000</td>
					          </tr>
					          <tr>
					            <td>3</td>
					            <td>Waktu Terbit dan Terbenam Matahari atau Bulan</td>
					            <td>Rp50.000</td>
					          </tr>
					          <tr>
					            <td>4</td>
					            <td>Teropong Rukyat (low grade)</td>
					            <td>Rp230.000</td>
					          </tr>
					          <tr>
					            <td>5</td>
					            <td>Digital Portable Short Period Seismograph</td>
					            <td>Rp640.000</td>
					          </tr>
					          <tr>
					            <td>6</td>
					            <td>Deklinasi dan Inklinasi Magnetometer</td>
					            <td>Rp400.000</td>
					          </tr>
					        </tbody>
				      	</table>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection