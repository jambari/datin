@extends('main')
@section('title')
<title>Gempabumi - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')

<style type="text/css" media="screen">
</style>
@endsection
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/magnet" class="text-primary" >magnet</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src=" {{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Komponen H (nT)
                </div>
                <div class="card-body">
                    <canvas id="Mag-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Mag-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['jam'] }},
                                    @endforeach
                                @endif
                        ],
                        datasets: [
                            {
                            label: "Komponen H",
                            borderColor: "#01579B",
                            fill: true,
                            data: [ 
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['komph'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Komponen Horizontal (nT) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Deklinasi (derajat)
                </div>
                <div class="card-body">
                <canvas id="Depth-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Depth-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                            @if ($magnets)
                                @foreach ($magnets as $magnet)
                                {{ $magnet['jam'] }},
                                @endforeach
                            @endif
                        ],
                        datasets: [
                            {
                            label: "Deklinasi",
                            borderColor: "#0277BD",
                            fill: true,
                            data: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompd'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Deklinasi (derajat) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Inklinasi (derajat)
                </div>
                <div class="card-body">
                    <canvas id="Inklinasi-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Inklinasi-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['jam'] }},
                                    @endforeach
                                @endif
                        ],
                        datasets: [
                            {
                            label: "Inklinasi",
                            borderColor: "#0288D1",
                            fill: true,
                            data: [ 
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompi'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Inklinasi (derajat) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Total (nT)
                </div>
                <div class="card-body">
                <canvas id="Total-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("Total-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                            @if ($magnets)
                                @foreach ($magnets as $magnet)
                                {{ $magnet['jam'] }},
                                @endforeach
                            @endif
                        ],
                        datasets: [
                            {
                            label: "Total",
                            borderColor: "#039BE5",
                            fill: true,
                            data: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompf'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Komponen Total (nT) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>

                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Inklinasi dan Total --}}
<br>
{{-- Komponen X dan Y --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Komponen X (nT)
                </div>
                <div class="card-body">
                    <canvas id="kompx-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("kompx-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['jam'] }},
                                    @endforeach
                                @endif
                        ],
                        datasets: [
                            {
                            label: "Komponen X",
                            borderColor: "#006666",
                            fill: true,
                            data: [ 
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompx'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Komponen X (nT) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Komponen Y (nT)
                </div>
                <div class="card-body">
                <canvas id="kompy-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("kompy-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                            @if ($magnets)
                                @foreach ($magnets as $magnet)
                                {{ $magnet['jam'] }},
                                @endforeach
                            @endif
                        ],
                        datasets: [
                            {
                            label: "Komponen Y",
                            borderColor: "#004c4c",
                            fill: true,
                            data: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompy'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Komponen Y (nT) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <br>
    {{-- Akhir Y dan X --}}
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-auto">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
                    Komponen Vertikal (nT)
                </div>
                <div class="card-body">
                    <canvas id="z-chart" width="800" height="450"></canvas>
                    <script>
                        new Chart(document.getElementById("z-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['jam'] }},
                                    @endforeach
                                @endif
                        ],
                        datasets: [
                            {
                            label: "Komponen Vertikal",
                            borderColor: "#008080",
                            fill: true,
                            backgroundColor: "#66b2b2",
                            data: [ 
                                @if ($magnets)
                                    @foreach ($magnets as $magnet)
                                    {{ $magnet['kompz'] }},
                                    @endforeach
                                @endif
                              ]
                            }
                        ]
                        },
                        options: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Komponen Vertikal (nT) {{ $tanggal }}'
                        }
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection