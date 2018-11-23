@extends('backpack::layout')

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
                    <span class="info-box-number">{{ $gempa->tanggal or '-' }}</span>
                    <span class="info-box-number">{{ $gempa->origin or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-map-marker"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Epicenter</span>
                    <span class="info-box-number">
                        @php
                        $lin = str_split($gempa['lintang']);
                        if ($lin=='') {
                            print_r(' LS');
                        } elseif($lin[0] == '-' && count($lin) <=2 ) { //jika misal lintang = 3.0, 4.0 
                            $lintang = $lin[1].'.0';
                        }
                        else {
                            $lintang = $lin[1].$lin[2].$lin[3];
                        }

                        print_r($lintang.' LS');
                        @endphp

                    </span>
                    <span class="info-box-number">{{ $gempa->bujur or '-' }} BT</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-stats"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Magnitudo</span>
                    <span class="info-box-number">{{ $gempa->magnitudo or '-' }} {{ $gempa->type or '-' }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-3">
            <div class="info-box bg-purple-gradient">
                <span class="info-box-icon"><span class="glyphicon glyphicon-circle-arrow-down"></span></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kedalaman</span>
                    <span class="info-box-number"> {{ $gempa->depth or '-' }} Km</span>
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
                            data: [2478,5267,734]
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
                        labels: ["Depth<3", "3>Depth<5", "Depth>5"],
                        datasets: [
                            {
                            label: "Gempabumi",
                            backgroundColor: ["#013034", "#0E494E","#417C81"],
                            data: [2478,5267,734]
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
                            labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
                            datasets: [{ 
                                data: [86,114,106,106,107,111,133,221,783,2478],
                                label: "Africa",
                                borderColor: "#3e95cd",
                                fill: false
                            }, { 
                                data: [282,350,411,502,635,809,947,1402,3700,5267],
                                label: "Asia",
                                borderColor: "#8e5ea2",
                                fill: false
                            }, { 
                                data: [168,170,178,190,203,276,408,547,675,734],
                                label: "Europe",
                                borderColor: "#3cba9f",
                                fill: false
                            }, { 
                                data: [40,20,10,16,24,38,74,167,508,784],
                                label: "Latin America",
                                borderColor: "#e8c3b9",
                                fill: false
                            }, { 
                                data: [6,3,2,2,7,26,82,172,312,433],
                                label: "North America",
                                borderColor: "#c45850",
                                fill: false
                            }
                            ]
                        },
                        options: {
                            title: {
                            display: true,
                            text: 'World population per region (in millions)'
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
                                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                datasets: [
                                    {
                                    label: "K Indeks",
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                    data: [2478,5267,734,784,433]
                                    }
                                ]
                                },
                                options: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Nilai K-Indeks 1 Hari Terakhir'
                                }
                                }
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>

    {{-- Lightning --}}
    <div class="row">
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
    </div>

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
                        labels: ["day 1","day 1","day 1","day 1","day 1","day 1","day 1","day 1","day 1","day 1","day 1","day 1",],
                        datasets: [
                            {
                            label: "Hujan",
                            backgroundColor: ["#6B4E90"],
                            data: [2478,5267,734,734,734,734,734,734,734,734,734,734,734,734,734,734,734,734,734,734]
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
        <div class="col-md-6">
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
                                data: [2478,5267]
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
        </div>
    </div>

    {{-- SPM --}}
    {{-- Lightning --}}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h1 class="box-title">SPM </h1>
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
@endsection
