@extends('main')
@section('title')
<title>Berita - Stasiun Geofisika Kelas I Angkasapura Jayapura</title>
@section('after_style')

<style type="text/css" media="screen">
#charts {
	display: flex;
}
</style>
@endsection
@endsection

@section('content')
<br>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/" class="text-primary">Home</a></li>
				<li class="breadcrumb-item active"><a href="/gempa/statistik" class="text-primary" >Statistik</a></li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
	<div class="container" id="charts">
        <div class="col-md-6">
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
        <div class="col-md-6">
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
	</div>
</div>
<br>
@endsection