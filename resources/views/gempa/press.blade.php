@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Siaran Pers</li>
      </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Siaran Pers</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        	<div class="alert alert-success alert-dismissible">
                        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  	Hai Pengamat, Ini adalah Siaran Press otomatis, Tugas Pengamat tentu sebagai kontrol kualitas, <strong>Anda kami sarankan untuk memperhatikan kembali parameter gempa yang diwarnai dan menyunting narasi untuk hasil lebih baik di program pengolah kata yang anda suka !</strong>
							</div>
                        	<div class="alert alert-success alert-dismissible text-info">
                        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  	<span>Tanggal: {{ $event->tanggal or '-' }}</span> | <span>Origin: {{ $event->origin or '-' }} UTC</span> | <span>Lintang: {{ $event->lintang or '-' }}</span> | <span>Bujur: {{ $event->bujur or '-' }}</span> | <span>Depth: {{ $event->depth or '-' }} Km</span> | <span>Jarak: {{ $event->ket or '-' }}</span>
							</div>

								<h1 class="text text-center" >GEMPABUMI M <strong class="text text-danger">{{ $mag }}</strong>  MENGUNCANG WILAYAH <strong class="text text-danger" >{{ $wilayah }}</strong></h1>
								
								<ul>
									<li class="text text-justify" >
										Hari <strong class="text text-danger">{{ $hari }}</strong>, <strong class="text text-danger">{{ $tanggalindo }}</strong>, terjadi gempa tektonik di wilayah <strong class="text text-danger" >{{ $wilayah }}</strong>.

									</li>
									<li class="text text-justify">
										Hasil analisis BMKG menunjukkan bahwa gempabumi ini terjadi pada pukul <strong class="text text-danger">{{ $jamwit }} </strong>WIT dengan Magnitudo M=<strong class="text text-danger">{{ $mag }} </strong>SR Episenter terletak pada koordinat <strong class="text text-danger">{{ $lat }} – {{ $lon }} </strong>tepatnya di darat pada jarak <strong class="text text-danger">{{ $jarak }}</strong> Km arah <strong class="text text-danger">{{ $arah }} {{ $wilayah }}</strong> dengan kedalaman <strong class="text text-danger">{{ $depth }}</strong> Km.

									</li>
									<li class="text text-justify">
										Dampak gempa berupa guncangan yang dirasakan di <strong class="text text-danger">{{ $event->terdampak or 'Isi dulu kolom terdampak' }}</strong>.
									</li>
									<li class="text text-justify">
										Ditinjau dari kedalaman hiposenter, gempabumi ini merupakan gempabumi <strong class="text text-danger">dangkal</strong> akibat aktivitas sesar lokal yang melintas di wilayah <strong class="text text-danger" >{{ $wilayah }}</strong>. Hasil pemodelan menunjukkan bahwa gempabumi tidak berpotensi tsunami.

									</li>
									<li class="text text-justify">
										Hingga pukul <strong class="text text-danger">{{ $jamsusulan }}</strong> WIT, hasil monitoring BMKG belum menunjukkan adanya aktivitas gempabumi susulan lain (after shock).  Kepada masyarakat dihimbau agar tetap tenang dan tidak terpengaruh oleh isu yang tidak dapat dipertanggungjawabkan kebenarannya.*
									</li>
									<li class="text text-justify">
										Pastikan informasi resmi hanya bersumber dari BMKG yang disebarkan melalui kanal komunikasi resmi yang telah terverifikasi (Instagram/Twitter @infoBMKG), website (<a href="https://www.bmkg.go.id atau inatews.bmkg.go.id">https://www.bmkg.go.id atau inatews.bmkg.go.id</a>), atau melalui Mobile Apps (iOS dan Android @infobmkg).
									</li>
								</ul>
								@if (backpack_auth()->user()->name == 'balai5')
								<p>
									Jayapura, <strong class="text text-danger">{{ $tanggalindo }}</strong> 
								</p>
								<p>Kepala Balai Besar Wilayah V Jayapura</p>
								<p>
									Petrus Demon Sili, S.IP, M.Si
								</p>
								<p>NIP 19630307 198503 1 002</p>
								@else 
								<p>
									Jayapura, <strong class="text text-danger">{{ $tanggalindo }}</strong> 
								</p>
								<p>Kepala Stasiun Geofisika Klas I Angkasapura - Jayapura</p>
								<p>MARGIONO, S.Si</p>
								@endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection