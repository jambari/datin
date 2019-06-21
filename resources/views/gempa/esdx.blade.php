@extends('backpack::layout')
<style>
.dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
</style>
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Perbandingan Parameter dan Elipsoid error</li>
      </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">ESDX PGR V dan ANGKASA</h1>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12" id="balai" >
							<div class="table-responsive">
								<table class="table  table-bordred table-striped" width="100%">
                        		<thead>
                        			<tr>
                        				<th>SUMBER</th>
                        				<th>ELIP LINTANG</th>
                        				<th>ELIP BUJUR</th>
                        				<th>RMS</th>
                        				<th>ELIP DEPTH</th>
                        				<th>OT (UTC)</th>
                        				<th>LINTANG</th>
                        				<th>BUJUR</th>
                        				<th>MAG</th>
                        				<th>DEPTH</th>
										<th>KET</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			@if ($joingempas)
                        				@foreach ($joingempas as $joingempa) 
                        				<tr >
                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif > {{ $joingempa->sumber }}  </td>
                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->eliplat }}</td>
                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->eliplon }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->rms }}</td>
                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->elipdepth }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->tanggal }} {{ $joingempa->origin }} </td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->lintang }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->bujur }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->magnitudo }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->depth }}</td>

                        					<td @if ( $loop->index == 0) class="bg bg-primary" @endif>{{ $joingempa->ket }}</td>
                        				</tr>
                        				@endforeach
                        				@else 
                        				no data
                        			@endif
                        		</tbody>
                        	</table>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
