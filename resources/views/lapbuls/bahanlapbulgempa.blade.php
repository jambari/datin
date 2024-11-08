@extends('backpack::layout')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">bahan buletin gempa</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Bahan Buletin Gempa</h1>
                    <div class="box-tools">
                        <!-- This will cause the box to be removed when clicked -->
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        <!-- This will cause the box to collapse when clicked -->
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div> 
            <!-- end of kedalaman -->
            <div class="box-body">
                <form action="/get/bahan/buletin/gempa/" method="GET" >
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="start">Start</label>
                        <input type="date" class="form-control" name="start" required >
                    </div>
                    <div class="form-group">
                        <label for="akhir">End</label>
                        <input type="date" class="form-control" name="end" required>
                    </div>
                    <table class="table table-responsive">
                        <thead>
                            <th>Min Latitude</th>
                            <th>Max Latitude</th>
                            <th>Min Longitude</th>
                            <th>Max Longitude</th>
                            <th>Min Depth</th>
                            <th>Max Depth</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="number" class="form-control" name="minlat" value="-8" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="maxlat" value="2" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="minlon" value="128" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="maxlon" value="143" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="mindepth" value="0" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="maxdepth" value="800" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <select name="sumber" id="sumber" class="form-control">Sumber
                            @if (backpack_auth()->user()->name == 'nganjuk')
                                <option value="6">BMKG-SJI</option>
                            @else
                            <option value="1">BMKG-JAY</option>
                            <option value="2">BMKG-PGR 5</option>
                            <option value="3">BMKG-SWI</option>
                            <option value="4">BMKG-NBPI</option>
                            <option value="5">SDG</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success " value="Submit" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@yield('after_script')

