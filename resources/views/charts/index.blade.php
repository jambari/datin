@extends('main')
@section('title')
<title>Grafik - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@endsection

@section('after_style')
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active"><a href="/gempa/charts" class="text-primary" >Grafik</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="https://inatews.bmkg.go.id/light/images/mag.png" alt="Magnitude" aria-hidden="true">
                    Magnitudo
                </div>
                <div class="card-body">
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
                            data: [ {{ $datas['Mbelowthree'] }} ,{{ $datas['Mthreefive'] }}, {{ $datas['Mabovefive'] }} ]
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="http://inatews.bmkg.go.id/light/images/kedalaman.png" alt="depth" aria-hidden="true">
                    Kedalaman
                </div>
                <div class="card-body">
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
                            data: [ {{ $datas['Dshallow'] }} ,{{ $datas['Dmediate'] }}, {{ $datas['Dverydeep'] }} ]
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
</div>
</br>
{{-- Grafik Magnet Bumi --}}
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="wi wi-meteor" aria-hidden="true" ></i>
                    A Index
                </div>
                <div class="card-body">
                <canvas id="Aindeks-chart" width="800" height="450"></canvas>
                <script>
                    new Chart(document.getElementById("Aindeks-chart"), {
                        type: 'line',
                        data: {
                            labels: [
                                @foreach($datas['aindeks'] as $aindek)
                                    "{{ $aindek['tanggal'] }}",
                                @endforeach

                            ],
                            datasets: [{ 
                                data: [
                                    @foreach($datas['aindeks'] as $aindek)
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
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="wi wi-meteor" aria-hidden="true" ></i>
                    K Indeks
                </div>
                <div class="card-body">
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
                                    data: @if($datas['kindeks'])
                                    [{{ $datas['kindeks']['k1'] }},
                                    {{ $datas['kindeks']['k2'] }}
                                    ,{{ $datas['kindeks']['k3'] }},
                                    {{ $datas['kindeks']['k4'] }},
                                    {{ $datas['kindeks']['k5'] }},
                                    {{ $datas['kindeks']['k6'] }},
                                    {{ $datas['kindeks']['k7'] }},
                                    {{ $datas['kindeks']['k8'] }}]
                                    @endif
                                    }
                                ]
                                },
                                options: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Nilai K-Indeks {{ $datas['kindeks']['tanggal'] }}'
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
{{-- Grafik Hujan --}}
<div class="container">
	<div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <i class="wi wi-showers" aria-hidden="true"></i>
                    Hujan
                </div>
                <div class="card-body">
	                <canvas id="Hujan-chart" width="700" height="400px"></canvas>
                    <script>
                        new Chart(document.getElementById("Hujan-chart"), {
                        type: 'line',
                        data: {
                        labels: [
                                @foreach($datas['hujans'] as $hujan)
                                    "{{ $hujan['tanggal'] }}",
                                @endforeach
                            ],
                        datasets: [
                            {
                            label: "Hujan",
                            backgroundColor: ["#620e3a"],
                            data: [
                                @foreach($datas['hujans'] as $hujan)
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
	</div>
</div>
<br>
@endsection