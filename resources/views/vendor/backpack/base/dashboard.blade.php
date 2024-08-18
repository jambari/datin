@extends('backpack::layout')
@if (backpack_auth()->user()->name != 'balai5')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-red-gradient">
                <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Origin</span>
                    <span class="info-box-number">{{ $data['gempa']['tanggal'] or '-' }}</span>
                    <span class="info-box-number">{{ $data['gempa']['origin'] or '-' }} UTC</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-map-marker"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Epicenter</span>
                    <span class="info-box-number">
                        {{ $data['gempa']['lintang'] or '-' }}
                    </span>
                    <span class="info-box-number">{{ $data['gempa']['bujur'] or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-stats"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Magnitudo</span>
                    <span class="info-box-number">{{ $data['gempa']['magnitudo'] or '-' }} {{ $data['gempa']['type'] or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-purple-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-circle-arrow-down"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kedalaman</span>
                    <span class="info-box-number"> {{ $data['gempa']['depth'] or '-' }} Km</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Magnitudo</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <canvas id="Mag-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Mag-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["M<3", "3>M<5", "M>5"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#804715", "#D49C6A","#FFD2AA"],
                            data: [ {{ $data['Mbelowthree'] }} ,{{ $data['Mthreefive'] }}, {{ $data['Mabovefive'] }} ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gempabumi 30 Hari Terakhir'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Kedalaman</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Depth-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Depth-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["Depth<70", "70>Depth<300", "Depth>300"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#013034", "#0E494E","#417C81"],
                            data: [ {{ $data['Dshallow'] }} ,{{ $data['Dmediate'] }}, {{ $data['Dverydeep'] }} ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gempabumi 30 Hari Terakhir'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

    {{-- Magnet bulan Ini --}}
    <!-- Deklinasi -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">A Indeks</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Aindeks-chart" width="800" height="450"></canvas>
                <script>
                    new Chart(document.getElementById("Aindeks-chart"), {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach($data['aindeks'] as $aindek)
                                    "{{ $aindek['tanggal'] }}",
                                @endforeach

                            ],
                            datasets: [{ 
                                data: [
                                    @foreach($data['aindeks'] as $aindek)
                                    "{{ $aindek['aindex'] }}",
                                    @endforeach
                                ],
                                label: "Aindeks",
                                borderColor: "#3e95cd",
                                fill: false
                            }
                            ]
                        },
                        options: {
                            title: {
                            display: true,
                            text: 'Nilai A Indeks 30 hari terakhir'
                            }
                        }
                        });

                </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">K Indeks</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <canvas id="Kindeks-chart" width="800" height="450"></canvas>
                        <script>
                            new Chart(document.getElementById("Kindeks-chart"), {
                                type: 'bar',
                                data: {
                                labels: ["00-03", "03-06", "09-12", "12-15", "18-21", "21-24"],
                                datasets: [
                                    {
                                    label: "K Indeks",
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                    data: [{{ $data['kindeks']['k1'] ?? '0' }},
                                    {{ $data['kindeks']['k2'] ?? '0' }}
                                    ,{{ $data['kindeks']['k3'] ?? '0' }},
                                    {{ $data['kindeks']['k4'] ?? '0'  }},
                                    {{ $data['kindeks']['k5'] ?? '0' }},
                                    {{ $data['kindeks']['k6'] ?? '0' }},
                                    {{ $data['kindeks']['k7'] ?? '0' }},
                                    {{ $data['kindeks']['k8'] ?? '0' }}]
                                    }
                                ]
                                },
                                options: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Nilai K-Indeks {{ $data['kindeks']['tanggal'] }}'
                                }
                                }
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>

    {{-- Lightning --}}
{{--     <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Petir </h1>
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
    </div> --}}

    {{-- Hujan --}}
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Hujan </h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Hujan-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Hujan-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($data['hujans'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            backgroundColor: ["#162756"],
                            data: [
                                @foreach($data['hujans'] as $hujan)
                                    "{{ $hujan['obs'] }}",
                                @endforeach
                            ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Hujan 30 Hari Terakhir (mm)'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        

        <!-- Darat -->
     {{--<div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Darat Laut </h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Darat-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Darat-chart"), {
                            type: 'pie',
                            data: {
                            labels: ["Darat", "Laut"],
                            datasets: [{
                                label: "Gempabumi",
                                backgroundColor: ["#4B0018", "#BD5E7C"],
                                data: [{{ $data['darat'] }},{{ $data['laut'] }}]
                            }]
                            },
                            options: {
                            title: {
                                display: true,
                                text: 'Gempabumi Berdasarkan Lokasi Kejadian'
                            }
                            }
                        });
                    </script>
                </div>
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h1 class="box-title">Logbook </h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Logbook-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Logbook-chart"), {
                        type: 'bar',
                        data: {
                        labels: [
                                "alif","berlian",'gogo','jambari','lidya',
                                'netty','prasetia','purnama'
                            ],
                        datasets: [
                            {
                            label: "Jumlah Dinas",
                            backgroundColor: ["#162756", "#162756", "#162756", "#162756", "#162756", 
                                                "#162756", "#162756", "#162756" ],
                            data: [ {{ $data['alif'] ?? '0' }}, {{ $data['berlian'] ?? '0' }}, {{ $data['gogo'] ?? '0' }},{{ $data['jambari'] ?? '0' }},
                                    {{ $data['lidya'] ?? '0' }}, {{ $data['netty'] ?? '0' }}, {{ $data['prasetia'] ?? '0' }}, {{ $data['purnama'] ?? '0' }},]
                            },
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Petugas dinas 30 hari terakhir'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection
@endif

{{-- Dashboard Balai V --}}
@if (backpack_auth()->user()->name == 'balai5')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">PGR V</li>
      </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="info-box bg-red-gradient">
                <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Origin</span>
                    <span class="info-box-number">{{ $data['Bgempa']['tanggal'] or '-' }}</span>
                    <span class="info-box-number">{{ $data['Bgempa']['origin'] or '-' }} UTC</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-map-marker"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Epicenter</span>
                    <span class="info-box-number">
                        {{ $data['Bgempa']['lintang'] or '-' }}
                    </span>
                    <span class="info-box-number">{{ $data['Bgempa']['bujur'] or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-stats"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Magnitudo</span>
                    <span class="info-box-number">{{ $data['Bgempa']['magnitudo'] or '-' }} {{ $data['Bgempa']['type'] or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-purple-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-circle-arrow-down"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kedalaman</span>
                    <span class="info-box-number"> {{ $data['Bgempa']['depth'] or '-' }} Km</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
    <!-- Gempabumi -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Magnitudo</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div> 
                <!-- end of kedalaman -->
                <div class="box-body">
                    <canvas id="Mag-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Mag-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["M<3", "3>M<5", "M>5"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#804715", "#D49C6A","#FFD2AA"],
                            data: [ {{ $data['BMbelowthree'] ?? '0' }} ,{{ $data['BMthreefive'] ?? '0' }}, {{ $data['BMabovefive'] ?? '0' }} ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gempabumi 30 Hari Terakhir'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">Kedalaman</h1>
                        <div class="box-tools">
                          <!-- This will cause the box to be removed when clicked -->
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                          <!-- This will cause the box to collapse when clicked -->
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                <canvas id="Depth-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Depth-chart"), {
                        type: 'bar',
                        data: {
                        labels: ["Depth<70", "70>Depth<300", "Depth>300"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#013034", "#0E494E","#417C81"],
                            data: [ {{ $data['BDshallow'] ?? '0' }} ,{{ $data['BDmediate'] ?? '0' }}, {{ $data['BDverydeep'] ?? '0' }} ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Gempabumi 30 Hari Terakhir'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif

