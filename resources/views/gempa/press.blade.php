@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Press Realese</li>
      </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Press Realese</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        	<h1 class="labl label-danger" >Under Contstruction</h1>

								<h1>GEMPABUMI M {{ $mag }} MENGUNCANG WILAYAH {{ $wilayah }}</h1>
								<ul>
									<li>
										Hari Rabu, 29 Mei 2019, terjadi gempa tektonik di wilayah Kabupaten Keerom-Papua.

									</li>
									<li>
										Hasil analisis BMKG menunjukkan bahwa gempabumi ini terjadi pada pukul 23:15.34 WIT dengan Magnitudo M={{ $mag }} SR Episenter terletak pada koordinat {{ $lat }} – {{ $lon }} tepatnya di darat pada jarak {{ $jarak }} Km arah {{ $arah }} {{ $wilayah }} dengan kedalaman {{ $depth }} Km.

									</li>
									<li>
										Dampak gempa berupa guncangan yang dirasakan di Kota Jayapura III MMI dan di Kabupaten Jayapura II MMI.
									</li>
									<li>
										Ditinjau dari kedalaman hiposenter, gempabumi ini merupakan gempabumi dangkal akibat aktivitas sesar lokal yang melintas di wilayah Kab. Keerom. 

									</li>
									<li>
										Hingga pukul 23:30 WIT, hasil monitoring BMKG belum menunjukkan adanya aktivitas gempabumi susulan lain (after shock).  Kepada masyarakat dihimbau agar tetap tenang dan tidak terpengaruh oleh isu yang tidak dapat dipertanggungjawabkan kebenarannya.*
									</li>
									<li>
										Pastikan informasi resmi hanya bersumber dari BMKG yang disebarkan melalui kanal komunikasi resmi yang telah terverifikasi (Instagram/Twitter @infoBMKG), website (http://www.bmkg.go.id atau inatews.bmkg.go.id), atau melalui Mobile Apps (iOS dan Android @infobmkg).
									</li>
								</ul>
								<p>
									Jayapura, 05 Juni 2019
Kepala Balai Besar Wilayah V Jayapura
								</p>
								<p>
									Petrus Demon Sili, S.IP, M.Si
NIP 19630307 198503 1 002
								</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection