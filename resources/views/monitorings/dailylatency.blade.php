@extends('backpack::layout')
@if (backpack_auth()->user()->name != 'balai5')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Latency</li>
      </ol>
    </section>
@endsection


@section('content')
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Hourly</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <form action="/latency/daily" method="GET" >
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="for tanggal label">Pilih tanggal</label>
                            <input type="date" class="form-control" name="tanggal" required  id="dailydate" >                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-success " value="Submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Daily</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                </div>
            </div>
        </div>
    </div>

<div class="row" >
<div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Daily</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <table class="table table-responsive" >
                        <tr>    
                            <th>No</th>
                            <th>Sites</th>
                            <!-- <th>Average Latency</th> -->
                            <th>Status</th>
                        </tr>
                        @foreach($latencies as $averageLatency)
                        <tr>
                            
   
                                <td> {{ $loop->iteration }} </td>
                                <td>{{ $averageLatency->site }}</td>
                                <!-- <td>{{ $averageLatency->average_latency }}</td> -->
                                <td> @if ($averageLatency->average_latency <= 900 ) ON @endif
                                    @if ($averageLatency->average_latency > 900 ) OFF @endif
                                </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</div>
@endsection

@yield('after_script')
@endyield
@endif

