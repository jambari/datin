@extends('backpack::layout')
@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Bahan buletin hujan</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Bahan Buletin Hujan</h1>
                    <div class="box-tools">
                        <!-- This will cause the box to be removed when clicked -->
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        <!-- This will cause the box to collapse when clicked -->
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div> 
            <!-- end of kedalaman -->
            <div class="box-body">
                <form action="/get/bahan/buletin/hujan/" method="GET" >
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
                <h1 class="box-title">Bahan Buletin Hujan</h1>
                    <div class="box-tools">
                        <!-- This will cause the box to be removed when clicked -->
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        <!-- This will cause the box to collapse when clicked -->
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div> 
            <!-- end of kedalaman -->
            <div class="box-body">
                   <div class="row" >
                        <div class="col-md-12">
                            <p>
                                Secara umum curah hujan bulan <i class="bg-danger" >
                                @if($monthValue==1) Januari @endif 
                                @if($monthValue==2) Februari @endif
                                @if($monthValue==3) Maret @endif
                                @if($monthValue==4) April @endif
                                @if($monthValue==5) Mei @endif
                                @if($monthValue==6) Juni @endif
                                @if($monthValue==7) Juli @endif
                                @if($monthValue==8) Agustus @endif
                                @if($monthValue==9) September @endif
                                @if($monthValue==10) Oktober @endif
                                @if($monthValue==11) November @endif
                                @if($monthValue==12) Desember @endif
                                 {{ $year ?? '-' }} </i>yang tercatat di Stasiun Geofisika Jayapura
                                dan sekitarnya mengalami peningkatan/penurunan dibandingkan dengan sebelumnya. Intensitas hujan bervariasi antara penakar 
                                hujan Obs dan penakar hujan Hellmann, dengan kategori yang berkisar dari sangat ringan hingga  <i class="bg-danger text-light" > {{ $tanggalMax->kategori?? '-' }}</i>. 
                                    Grafik berikut menunjukkan curah hujan selama bulan <i class="bg-danger" >
                                @if($monthValue==1) Januari @endif 
                                @if($monthValue==2) Februari @endif
                                @if($monthValue==3) Maret @endif
                                @if($monthValue==4) April @endif
                                @if($monthValue==5) Mei @endif
                                @if($monthValue==6) Juni @endif
                                @if($monthValue==7) Juli @endif
                                @if($monthValue==8) Agustus @endif
                                @if($monthValue==9) September @endif
                                @if($monthValue==10) Oktober @endif
                                @if($monthValue==11) November @endif
                                @if($monthValue==12) Desember @endif
                                 {{ $year ?? '-' }} </i>.
                                Berdasarkan grafik tersebut, terdapat <i class="bg-danger" >{{ $hariHujan }}</i> hari hujan selama bulan
                                <i class="bg-danger" >
                                @if($monthValue==1) Januari @endif 
                                @if($monthValue==2) Februari @endif
                                @if($monthValue==3) Maret @endif
                                @if($monthValue==4) April @endif
                                @if($monthValue==5) Mei @endif
                                @if($monthValue==6) Juni @endif
                                @if($monthValue==7) Juli @endif
                                @if($monthValue==8) Agustus @endif
                                @if($monthValue==9) September @endif
                                @if($monthValue==10) Oktober @endif
                                @if($monthValue==11) November @endif
                                @if($monthValue==12) Desember @endif
                                 {{ $year ?? '-' }}</i>. Curah hujan tertinggi tercatat pada tanggal <i class="bg-danger" >
                               {{Carbon\Carbon::parse($tanggalMax->tanggal)->format('d') ?? '-'}} 
                                                               @if($monthValue==1) Januari @endif 
                                @if($monthValue==2) Februari @endif
                                @if($monthValue==3) Maret @endif
                                @if($monthValue==4) April @endif
                                @if($monthValue==5) Mei @endif
                                @if($monthValue==6) Juni @endif
                                @if($monthValue==7) Juli @endif
                                @if($monthValue==8) Agustus @endif
                                @if($monthValue==9) September @endif
                                @if($monthValue==10) Oktober @endif
                                @if($monthValue==11) November @endif
                                @if($monthValue==12) Desember @endif
                                {{ $year ?? '-' }}</i>
                                mencapai <i class="bg-danger" >{{ $maxObs ?? '-' }}mm</i>  dengan kategori “<i class="bg-danger" >{{ $tanggalMax->kategori?? '-' }}</i>”.
                            </p>
                        </div>
                   </div>
                   <div class="row" >
                        <div class="col-md-12" >
                            <div id="dailyRainChart" style="width: 100%; height: 500px;"></div>
                            <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                            <script>

                                var dailyRain = [
                                    @foreach($hujans as $hujan)
                                        { tanggal: {{ $loop->iteration }}, rain: @if($hujan['obs']==9999)0 @else {{ $hujan['obs'] }}@endif },
                                    @endforeach
                                ];

                                const rainCategories = dailyRain.map(item => item.tanggal);
                                const rainCounts = dailyRain.map(item => item.rain); 
                                const rainTrace = {
                                x: rainCategories,
                                y: rainCounts,
                                type: 'bar',
                                text: rainCounts.map(String),
                                textposition: 'auto', // Display text on top of bars
                                };

                                // Define layout
                                @php
                                    $monthNames = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                @endphp

                                const monthName = '{{ $monthNames[$monthValue] ?? '' }}';
                                const year = '{{ $year ?? '' }}';

                                // Define layout
                                const rainLayoutBar = {
                                    title: `Curah Hujan Bulan ${monthName} ${year}`,
                                    xaxis: { title: '' },
                                    yaxis: { title: 'Jumlah' }
                                };
                                // Plot using Plotly.js
                                Plotly.newPlot('dailyRainChart', [rainTrace], rainLayoutBar);
                            </script>
                        </div>
                   </div>
                   <div class="row" >
                        <div class="col-md-6 col-md-offset-3" >
                            <div id="dailyRainChartPie" style="width: 100%; height: 500px;"></div>
                        <script>
                            const xArray = [
                                @foreach($rainRecords as $rain)
                                    "{{ $rain->kategori }}",
                                @endforeach
                            ];
                            const yArray = [
                                @foreach($rainRecords as $rain)
                                    {{ $rain->total_amount }},
                                @endforeach
                            ]; 

                            const layout = {title:"Persentase Berdasarkan Kategori"};

                            const dataPie = [{labels:xArray, values:yArray, type:"pie"}];

                            Plotly.newPlot("dailyRainChartPie", dataPie, layout);
                        </script>
                        </div>
                   </div>
                   <div class="row" >
                        <div class="col-md-8 col-md-offset-4" >
                            <table border style="border-color:black;" >
                                <thead class="bg-primary" >
                                    <th><center>No</center></th>
                                    <th><center>Tanggal</center></th>
                                    <th><center>Jumlah (mm)</center></th>
                                    <th><center>Kategori</center></th>
        
                                    <th><center>Pengamat</center></th>
                                </thead>
                                <tbody>
                                    @foreach ($hujans as $sampel)
                                    <tr>
                                        <td width="50" style="color: black;" ><center>{{ $loop->iteration }}</center></td>
                                        <td width="95" ><center>{{ Carbon\Carbon::parse($sampel->tanggal)->format('d-m-Y') }}</center></td>
                                        <td width="95"><center>{{ $sampel->obs }}</center></td>
                                        <td width="95"><center>{{ ucfirst($sampel->kategori) }}</center></td>
                                        <td width="95"><center>{{ ucfirst($sampel->petugas) }}</center></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3" > <center><b>Total:</b></center> </td>
                                        <td colspan="3" > <center><b>{{ $totalObs }} mm</b></center> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection

