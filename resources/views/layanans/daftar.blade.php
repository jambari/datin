@extends('layanan') @section('title')
<title>Daftar Permohonan Di Stasiun Geofisika Kelas I Jayapura</title>
@endsection @section('content')
<div class="container">
    <div class="section">
        <nav>
            <div class="nav-wrapper red accent-3">
                <div class="col s12">
                    <a href="/layanandata" class="breadcrumb">Home</a>
                    <a href="/layanandata/tarif" class="breadcrumb">Daftar Permohonan</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="section">
        @include('layanans.pesan')
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l10">
                    <h5 class="teal-text lighten-2 center-align ">Daftar Permohonan</h5>
                    <table class="responsive-table striped highlight">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Permohonan/perihal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ( $permohonans ) @foreach ( $permohonans as $permohonan )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permohonan->nama }}</td>
                                <td>{{ $permohonan->jenis_data }}</td>
                                <td>
                                    @if($permohonan->status == '1' or $permohonan->status =='')
                                    <span class=" badge blue lighten-2 white-text">
		                      			Sedang diproses

								@endif
								@if($permohonan->status == '2')
		                      	<span class=" badge green lighten-2 white-text">
		                      			Selesai diproses

								@endif
								@if($permohonan->status == '3')
		                      	<span class=" badge green lighten-2 white-text">
		                      			Tagihan belum ditransfer

								@endif
								@if($permohonan->status == '4')
		                      	<span class=" badge green lighten-2 white-text">
		                      			Telah diterima pemohon

								@endif

								</span></td>
                            </tr>
                            @endforeach @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l10">
                    <p>{!! $permohonans->links() !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection