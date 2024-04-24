@extends('backpack::layout')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">terbit terbenam matahari</li>
      </ol>
    </section>
@endsection

<style>
    table, th, td {
    border: 1px solid black;
    }
</style>



@section('content')
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Sampel Hujan</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <form action="/get//sampel/hujan/" method="GET" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="start">Start</label>
                            <input type="date" class="form-control" name="start" required >
                        </div>
                        <div class="form-group">
                            <label for="akhir">End</label>
                            <input type="date" class="form-control" name="end" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-success " value="Submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- hasil query -->
<div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Hasil</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <center>
                        <h4><b>STASIUN GEOFISIKA JAYAPURA</b></h4>
                        <h4><b>LAPORAN HUJAN HARIAN</b></h4>
                        <br>
                        <table border >
                            <thead>
                                <th><center>No</center></th>
                                <th><center>Tanggal</center></th>
                                <th><center>Jumlah</center></th>
                                <th><center>Kategori</center></th>
                                <th><center>Keterangan</center></th>
                                <th><center>Obs</center></th>
                            </thead>
                            <tbody>
                                @foreach ($hujans as $sampel)
                                <tr>
                                    <td width="50" style="color: black;" ><center>{{ $loop->iteration }}</center></td>
                                    <td width="95" ><center>{{ Carbon\Carbon::parse($sampel->tanggal)->format('d-m-Y') }}</center></td>
                                    <td width="95"><center>{{ $sampel->obs }}</center></td>
                                    <td width="95"><center>mm</center></td>
                                    <td width="95"><center>{{ $sampel->kategori }}</center></td>
                                    <td width="95"><center>{{ ucfirst($sampel->petugas) }}</center></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td> <center><b>Total:</b></center> </td>
                                    <td colspan="5" > <center><b>{{ $totalObs }} mm</b></center> </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection


