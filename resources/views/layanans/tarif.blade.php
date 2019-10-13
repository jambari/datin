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
			        <a href="/layanandata" class="breadcrumb">Home</a>
			        <a href="/layanandata/tarif" class="breadcrumb">Tarif</a>
			      </div>
			    </div>
			  </nav>
		</div>
		<div class="section">
			<div class="container">
				<div class="row">
			    	<div class="col s12 m12 l10">
			    		<h5 class="teal-text lighten-2" >Daftar Tarif Pelayanan Data dan Jasa di Stasiun Geofisika Kelas I Jayapura</h5>
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
					            <td>Peta Kejadian Petir Per Hari</td>
					            <td>Rp75.000</td>
					          </tr>
					          <tr>
					            <td>5</td>
					            <td>Teropong Rukyat (low grade)</td>
					            <td>Rp230.000</td>
					          </tr>
					          <tr>
					            <td>6</td>
					            <td>Digital Portable Short Period Seismograph</td>
					            <td>Rp640.000</td>
					          </tr>
					          <tr>
					            <td>7</td>
					            <td>Deklinasi dan Inklinasi Magnetometer</td>
					            <td>Rp400.000</td>
					          </tr>
					        </tbody>
				      	</table>
			    	</div>
			  	</div>
			  	<div class="row">
			  		<div class="col s12 m12 l10">
			  			<h5 class="teal-text lighten-2" >Bagaimana cara pengajuan permohonan bagi mahasiwa untuk penyelesaian tugas akhir atau skripsi (tarif nol rupiah) ?</h5>
			  			<p>Pemohon wajib melengkapi berkas berupa: </p>
			  			<ul style="">
			  				<li>1. Proposal yang sudah dijilid dan disetujui dosen pembimbing,</li>
			  				<li>2. Fotokopi identitas mahasiswa/ kartu mahasiswa,</li>
			  				<li>3. Surat permohonan data.</li>
			  			</ul>
			  			<p>Berkas kemudian dikompress / zipped dan diunggah pada kolom unggah berkas.</p>
			  		</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection