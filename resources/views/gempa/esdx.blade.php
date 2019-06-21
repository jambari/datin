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
                        			<tr><th>#</th>
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
                        					<td>{{ $loop->itration }}</td>
                        					<td > {{ $joingempa->sumber }}  </td>
                        					<td >{{ $joingempa->eliplat }}</td>
                        					<td >{{ $joingempa->eliplon }}</td>

                        					<td >{{ $joingempa->rms }}</td>
                        					<td >{{ $joingempa->elipdepth }}</td>

                        					<td >{{ $joingempa->tanggal }} {{ $joingempa->origin }} </td>

                        					<td >{{ $joingempa->lintang }}</td>

                        					<td >{{ $joingempa->bujur }}</td>

                        					<td >{{ $joingempa->magnitudo }}</td>

                        					<td >{{ $joingempa->depth }}</td>

                        					<td >{{ $joingempa->ket }}</td>
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
