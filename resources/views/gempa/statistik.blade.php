@extends('main')
@section('title')
<title>Gempabumi statistik- Stasiun Geofisika Kelas I Jayapura</title>
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
                <li class="breadcrumb-item active"><a href="/gempa/statistik" class="text-primary" >Statistik</a></li>
            </ol>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3%;">
        <h5>Silahkan Lengkapi formulir di bawah ini !</h5>
        <form action="/statistik/search" method="POST" role="search">
            {{ csrf_field() }}
             
            <div class="form-group">
                <label for="start">Tanggal awal / Start date</label>
                <input type="date" class="form-control" name="start" required >
            </div>
            <div class="form-group">
                <label for="akhir">Tanggal akhir / End date</label>
                <input type="date" class="form-control" name="end" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-secondary btn-block btn-lg">
                <span class="glyphicon glyphicon-search">Cari</span>
            </button>
            </div>
        </form>
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header align-middle">
                    <img src="{{ asset('images/mag.png') }} " alt="Magnitude" aria-hidden="true">
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
                            data: [ {{ $Mbelowthree }} ,{{ $Mthreefive }}, {{ $Mabovefive }} ]
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
                    <img src="{{ asset('images/kedalaman.png') }} " alt="depth" aria-hidden="true">
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
                            data: [ {{ $Dshallow }} ,{{ $Dmediate }}, {{ $Dverydeep }} ]
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
</div> --}}
<br>
@endsection