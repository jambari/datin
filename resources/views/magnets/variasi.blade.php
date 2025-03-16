@extends('backpack::layout')
@if (backpack_auth()->user()->name != 'balai5')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">terbit terbenam matahari</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Bahan Buletin Magnet</h1>
                    <div class="box-tools">
                        <!-- This will cause the box to be removed when clicked -->
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        <!-- This will cause the box to collapse when clicked -->
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div> 
            <!-- end of kedalaman -->
            <div class="box-body">
                <form action="/get/bahan/buletin/magnet/" method="GET" >
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

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Hasil</h1>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                    <h4><b>LAPORAN VARIASI HARIAN MAGNETBUMI STASIUN GEOFISIKA JAYAPURA {{ $start_date }} s/d {{ $end_date }} </b></h4>
                
                <br>
                <table border="1">
                <caption>Komponen X</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompxs as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompx_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <table border="1">
                <caption>Komponen Y</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompys as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompy_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <table border="1">
                <caption>Komponen Z</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompzs as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompz_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <table border="1">
                <caption>Komponen H</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($komphs as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'komph_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <table border="1">
                <caption>Inklinasi</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompis as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompi_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <table border="1">
                <caption>Deklinasi</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompds as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompd_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <table border="1">
                <caption>Komponen F</caption>
                    <thead>
                        <tr>
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">Tanggal/Jam</th> <!-- Changed from 'Date' to 'Day' -->
                            @for ($hour = 1; $hour < 25; $hour++)
                                <th class="text-center">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}</th>
                            @endfor
                            <th style="padding-left: 2px; padding-right: 2px; text-align: center;">rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kompfs as $data)
                            <tr>
                                <td class="text-center" >{{ \Carbon\Carbon::parse($data->tanggal)->format('d') }}</td> 
                                @for ($hour = 0; $hour < 24; $hour++)
                                    <td style="padding-left: 2px; padding-right: 2px; text-align: center;" >{{ $data->{'kompf_' . str_pad($hour, 2, '0', STR_PAD_LEFT)} ?? '-' }}</td>
                                @endfor
                                <td style="padding-left: 2px; padding-right: 2px; text-align: center;">{{ number_format($data->daily_avg, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @php
        $components = ['kompx' => 'X', 'kompy' => 'Y', 'kompz' => 'Z', 'komph' => 'H', 'kompi' => 'I', 'kompd' => 'D', 'kompf' => 'F'];
        $colors = ['kompx' => '#01579B', 'kompy' => '#FF9800', 'kompz' => '#4CAF50', 'komph' => '#9C27B0', 'kompi' => '#795548', 'kompd' => '#E91E63', 'kompf' => '#607D8B'];
    @endphp

    @foreach ($components as $key => $label)
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }}" alt="Magnitude" aria-hidden="true">
                    Komponen {{ $label }} (nT)
                </div>
                <div class="card-body">
                    <canvas id="{{ $key }}-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("{{ $key }}-chart"), {
                            type: 'line',
                            data: {
                                labels: [
                                    @if ($dailyStats)
                                        @foreach ($dailyStats as $dailyStat)
                                            "{{ \Carbon\Carbon::parse($dailyStat['tanggal'])->format('d') }}",
                                        @endforeach
                                    @endif
                                ],
                                datasets: [
                                    {
                                        label: "Average Komponen {{ $label }}",
                                        borderColor: "{{ $colors[$key] }}",
                                        fill: false,
                                        data: [
                                            @if ($dailyStats)
                                                @foreach ($dailyStats as $dailyStat)
                                                    {{ $dailyStat['avg_'.$key] }},
                                                @endforeach
                                            @endif
                                        ]
                                    },
                                    {
                                        label: "Max Komponen {{ $label }}",
                                        borderColor: "#D32F2F",
                                        borderDash: [5, 5],
                                        fill: false,
                                        data: [
                                            @if ($dailyStats)
                                                @foreach ($dailyStats as $dailyStat)
                                                    {{ $dailyStat['max_'.$key] }},
                                                @endforeach
                                            @endif
                                        ]
                                    },
                                    {
                                        label: "Min Komponen {{ $label }}",
                                        borderColor: "#388E3C",
                                        borderDash: [5, 5],
                                        fill: false,
                                        data: [
                                            @if ($dailyStats)
                                                @foreach ($dailyStats as $dailyStat)
                                                    {{ $dailyStat['min_'.$key] }},
                                                @endforeach
                                            @endif
                                        ]
                                    }
                                ]
                            },
                            options: {
                                legend: { display: true },
                                title: {
                                    display: true,
                                    text: 'Komponen {{ $label }} (nT)'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- hasil query -->
@endsection

@yield('after_script')
@endif

