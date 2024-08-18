@extends('backpack::layout')

<style>
    .logo-bmkg {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* border: 1px solid black; */
        padding: 1%;
    }

    #right-frame {
        border: 1px solid black;
        height: 600px;
        margin-left: -1%;
    }

    #right-frame-two {
        border: 1px solid black;
        height: 600px;
        margin-left: -1%;
    }
</style>

@section('header')
    <section class="content-header" id="daily" >
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Bahan Buletin dan Lapbul Gempa</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Bahan Buletin dan Lapbul Gempa</h1>
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
                    <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <select name="sumber" id="sumber" class="form-control">Sumber
                            <option value="1">BMKG-JAY</option>
                            <option value="2">BMKG-PGR 5</option>
                            <option value="3">BMKG-SWI</option>
                            <option value="4">BMKG-NBPI</option>
                            <option value="5">SDG</option>
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
<!-- hasil query -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h1 class="box-title">Bahan Buletin dan Lapbul Gempa</h1>
                    <div class="box-tools">
                        <!-- This will cause the box to be removed when clicked -->
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        <!-- This will cause the box to collapse when clicked -->
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div>
            <!-- end of kedalaman -->
            <div class="box-body">
                <br>
                <h4 class="bg-info" >Statistik Kegempaan Periode {{ $start }} - {{ $end }} hasil analisis {{ $sumber }} </h4>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Gempa</span>
                                <span class="info-box-number">{{ $totalevents ?? '-' }}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Dirasakan</span>
                                <span class="info-box-number">{{ $feltevents ?? '-' }}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">M < 3</span>
                                <span class="info-box-number">{{ $Mbelowthree ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>

                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">3,0 ≤ M ˂ 5,0</span>
                                <span class="info-box-number">{{ $Mthreefive ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">M ≥ 5,0</span>
                                <span class="info-box-number">{{ $Mabovefive ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">D < 60</span>
                                <span class="info-box-number">{{ $Dshallow ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">60 ≤ D ˂ 300</span>
                                <span class="info-box-number">{{ $Dmediate ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>

                    <div class="col-md-3">
                        <div class="info-box bg-blue-gradient">
                            <span class="info-box-icon"><i class="wi wi-earthquake"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">D ≥ 300</span>
                                <span class="info-box-number">{{ $Dverydeep ?? 'No Data'}}</span>
                            </div><!-- /.info-box-content -->
                        </div><!-- /.info-box -->
                    </div>
                </div>
                <br>
                <p class="bg-info" >Perhitungan jumlah gempabumi berdasarkan jarak ke Stasiun Geofisika Jayapura
                tidak dihitung, sudah tidak relevan
                    karena analisis sudah tidak dilakukan
                    menggunakan <i style="text-decoration: italic;" >single station </i>
                    dan keterangan jarak dipilih berdasarkan kota terdekat.</p>
                <br>
                <h4 class="bg-info" >Grafik berdasarkan Magnitudo </h4>
                <br>
                <div class="row" >
                    <div class="col-md-6" >
                        <div id="bar-chart"></div>
                        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

                      <script>

                        const dataBar = [
                        { category: 'M < 3.0  ', count: {{ $Mbelowthree }} },
                        { category: '3,0 ≤ M ˂ 5,0 ', count: {{ $Mthreefive }} },
                        { category: 'M ≥ 5,0 ', count: {{ $Mabovefive }} }
                        ];
                        // Extract categories and counts from data
                        const categories = dataBar.map(item => item.category);
                        const counts = dataBar.map(item => item.count);

                        // Define trace for bar chart
                        const trace = {
                        x: categories,
                        y: counts,
                        type: 'bar',
                        text: counts.map(String),
                        textposition: 'auto', // Display text on top of bars
                        };

                        // Define layout
                        const layoutBar = {
                        title: 'Magnitudo',
                        xaxis: { title: '' },
                        yaxis: { title: 'Jumlah' }
                        };

                        // Plot using Plotly.js
                        Plotly.newPlot('bar-chart', [trace], layoutBar);


                      </script>



                    </div>
                    <!-- Percentage or Pie Chart -->
                    <div class="col-md-6" >
                        <div id="myPlot" style="width:100%;max-width:700px"></div>

                        <script>

                        const xArray = ["M < 3.0", "3,0 ≤ M ˂ 5,0", "M ≥ 5,0"];
                        const yArray = [{{ $Mbelowthree }} , {{ $Mthreefive }}, {{ $Mabovefive }}];

                        const layout = {title:"Persentase Berdasarkan Magnitudo"};

                        const dataPie = [{labels:xArray, values:yArray, type:"pie"}];

                        Plotly.newPlot("myPlot", dataPie, layout);
                        </script>

                    </div>
                </div>
                <!-- </div> end of magnitudo chart -->
                <h4 class="bg-info" >Grafik berdasarkan kedalaman </h4>
                <br>
                <div class="row" >
                    <div class="col-md-6" >
                        <div id="depthbar-chart"></div>
                        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

                      <script>

                        const depthBar = [
                        { category: 'D < 60  ', count: {{ $Dshallow }} },
                        { category: '60 ≤ D ˂ 300 ', count: {{ $Dmediate }} },
                        { category: 'D ≥ 300 ', count: {{ $Dverydeep }} }
                        ];
                        // Extract categories and counts from data
                        const depthCategories = depthBar.map(item => item.category);
                        const depthCounts = depthBar.map(item => item.count);

                        // Define trace for bar chart
                        const depthTrace = {
                        x: depthCategories,
                        y: depthCounts,
                        type: 'bar',
                        text: depthCounts.map(String),
                        textposition: 'auto', // Display text on top of bars
                        };

                        // Define layout
                        const depthLayoutBar = {
                        title: 'Kedalaman',
                        xaxis: { title: '' },
                        yaxis: { title: 'Jumlah' }
                        };

                        // Plot using Plotly.js
                        Plotly.newPlot('depthbar-chart', [depthTrace], depthLayoutBar);


                      </script>



                    </div>
                    <!-- Percentage or Pie Chart -->
                    <div class="col-md-6" >
                        <div id="depthPlot" style="width:100%;max-width:700px"></div>

                        <script>
                        const xdepthArray = ["D < 60", "60 ≤ D ˂ 300", "D ≥ 300"];
                        const ydepthArray = [{{ $Dshallow }} , {{ $Dmediate }}, {{ $Dverydeep }}];

                        const depthLayout = {title:"Persentase Berdasarkan Kedalaman"};

                        const depthPie = [{labels:xdepthArray, values:ydepthArray, type:"pie"}];

                        Plotly.newPlot("depthPlot", depthPie, depthLayout);
                        </script>

                    </div>
                <!-- </div>end of depth chart -->
            </div>
            <br>
            <h4 class="bg-info" >Tabel jumlah gempabumi per hari berdasarkan magnitudo dan kedalaman </h4>
            <br>
            <div class="row" >
                <div class="col-md-6 col-md-offset-3" >
                    <table class="" border style="border-color: black;">
                        <thead>
                            <tr>
                                <th style="padding:3px"  class="bg-success" ><center>No</center></th>
                                <th style="padding:3px" class="bg-success" > <center>Date</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>M < 3</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>3 ≤ M < 5</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>M ≥ 5</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>D < 60</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>60 ≤ D < 300</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>D ≥ 300</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>Felt</center> </th>
                                <th style="padding:3px" class="bg-success" > <center>Not Felt</center> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyevents as $index => $result)
                                <tr style="{{ $result->felt_events ? 'background-color: rgb(255, 165, 0);' : '' }}" >
                                    <td style="color: black;" > <center>{{ $index + 1 }}</center> </td>
                                    <td width="95" style="color: black;"> <center>{{ $result->tanggal ?? '-'}}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->mag_below_3 ?? '-'}}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->mag_3_to_5 ?? '-'}}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->mag_above_5 ?? '-' }}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->depth_below_60 ?? '-'  }}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->depth_60_to_300 ?? '-'  }}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->depth_above_300 ?? '-' }}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->felt_events ?? '-'  }}</center> </td>
                                    <td style="color: black;" > <center>{{ $result->not_felt_events ?? '-' }}</center> </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" > <center> <b>Total</b> </center> </td>
                                <td colspan="5" > <center> <b>{{ $totalevents?? '-' }}</b> </center> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="bg-info" >Grafik jumlah gempa per hari </h4>
            <br>
            <div class="row" >
                <div class="col-md-12" >
                    <div id="eventChart"></div>

                      <script>
                    var eventDailyData = [
                        @foreach($eventCounts as $event)
                            { date: {{ $loop->iteration }}, eventcount: {{ $event['event_count'] }} },
                        @endforeach
                    ];

                    const dateCategories = eventDailyData.map(item => item.date);
                    const eventCounts = eventDailyData.map(item => item.eventcount);

                    const dailyTrace = {
                    x: dateCategories,
                    y: eventCounts,
                    type: 'bar',
                    text: eventCounts.map(String),
                    textposition: 'auto',
                    marker: {
                        color: '#3cb371',
                        line: {
                            width: 2.5
                        } // Display text on top of bars
                    }};

                    // Define layout
                    const dailyLayoutBar = {
                    title: 'Jumlah Gempa Per hari',
                    xaxis: { title: 'Tanggal' },
                    yaxis: { title: 'Jumlah' }
                    };

                    // Plot using Plotly.js
                    Plotly.newPlot('eventChart', [dailyTrace], dailyLayoutBar);


                      </script>
                </div>
            </div>
            <!-- end of daily chart -->
             <h4 class="bg-info" >Tabel Gempa dirasakan </h4>
             <div class="row" >
                <div class="col-md-8 col-md-offset-2 " >
                <table class="table table-bordered table-striped" style="border-color: black; color: black;">
                    <thead class="bg-danger" style="color: black; border-color: black;">
                        <tr>
                            <th style="border-color: black;">No</th>
                            <th style="border-color: black;">Date</th>
                            <th style="border-color: black;">Origin (UTC)</th>
                            <th style="border-color: black;">Lat</th>
                            <th style="border-color: black;">Lon</th>
                            <th style="border-color: black;">Mag</th>
                            <th style="border-color: black;">Depth</th>
                            <th style="border-color: black;">Remark</th>
                            <th style="border-color: black;">Felt</th>
                        </tr>
                    </thead>
                    <tbody style="color: black;">
                        @foreach($felts as $felt)
                        <tr style="border-color: black;">
                            <td style="border-color: black;"> <strong>{{ $loop->iteration }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->tanggal ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ substr($felt->origin, 0, 8) ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->lintang ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->bujur ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->magnitudo ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->depth ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->ket ?? '-' }}</strong> </td>
                            <td style="border-color: black;"> <strong>{{ $felt->terdampak ?? '-' }}</strong> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
             </div>
            <br>
            <!-- This section for events map -->
            <div class="row">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 ">
                        <div class="form-group">
                            <label for="userInput">Ketik Judul Peta</label>
                            <input type="text" id="userInput" class="form-control" name="userInput" required placeholder="PETA SEISMISITAS PAPUA DAN SEKITARNYA  PERIODE JULI 2024" >
                            <label for="stationName">Nama UPT</label>
                            <input type="text" id="stationName" class="form-control" name="stationName" required placeholder="STASIUN GEOFISIKA JAYAPURA" >
                        </div>
                        <div class="row" style="border: 2px solid black; border-bottom: none;">
                            <div class="col-md-12" >
                            <center>
                                <h2>
                                    <strong id="displayText">PETA SEISMISITAS PAPUA DAN SEKITARNYA
                                    PERIODE JULI 2024</strong>
                                </h2>
                                </center>
                            </div>
                        </div>
                        <div class="row" style="border: 2px solid black; padding: 1%;">
                            <div class="col-md-9" >
                                <div id="eventsMap" style="width:100%; height: 600px; border-radius: 5px; margin-left: -10px;"></div>
                            </div>
                            <div class="col-md-3" id="right-frame" >
                                <div class="logo-bmkg">
                                    <img src="{{ asset('images') }}/logo-bmkg.png " alt="" width="50" height="60" style="margin-top: 2%;margin-bottom: 3%;" >
                                    <center>
                                        <strong id="displayStation">STASIUN GEOFISIKA KELAS I JAYAPURA</strong>
                                    </center>
                                </div>
                                <div id="legenda" >
                                    <img src="{{ asset('images') }}/legenda.png" alt="" height="120" width="250" style="margin-top: 2%;" >
                                </div>
                                <div id="legenda" >
                                    <img src="{{ asset('images') }}/kontur-slab.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                                <div id="legenda" >
                                    <img src="{{ asset('images') }}/batas_batas.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                                <div id="legenda" >
                                    <b>INSET</b>
                                    <img src="{{ asset('images') }}/inset.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 ">
                        <h4>Peta Gempa Dirasakan</h4>
                        <div class="form-group">
                            <label for="userFeltsInput">Ketik Judul Peta</label>
                            <input type="text" id="userFeltsInput" class="form-control" name="userFeltsInput" required placeholder="PETA GEMPABUMI DIRASAKAN DI PAPUA DAN SEKITARNYA  PERIODE JULI 2024" >
                            <label for="stationName">Nama UPT</label>
                            <input type="text" id="stationFeltsName" class="form-control" name="stationFeltsName" required placeholder="STASIUN GEOFISIKA JAYAPURA" >
                        </div>
                        <div class="row" style="border: 2px solid black; border-bottom: none;">
                            <div class="col-md-12" >
                            <center>
                                <h2>
                                    <strong id="displayFeltsText">PETA GEMPABUMI DIRASAKAN DI PAPUA DAN SEKITARNYA
                                    PERIODE JULI 2024</strong>
                                </h2>
                                </center>
                            </div>
                        </div>
                        <div class="row" style="border: 2px solid black; padding: 1%;">
                            <div class="col-md-9" >
                                <div id="feltsMap" style="width:100%; height: 600px; border-radius: 5px; margin-left: -10px;"></div>
                            </div>
                            <div class="col-md-3" id="right-frame-two" >
                                <div class="logo-bmkg">
                                    <img src="{{ asset('images') }}/logo-bmkg.png " alt="" width="50" height="60" style="margin-top: 2%;margin-bottom: 3%;" >
                                    <center>
                                        <strong id="displayFeltsStation">STASIUN GEOFISIKA KELAS I JAYAPURA</strong>
                                    </center>
                                </div>
                                <div id="legenda" >
                                    <b>Legenda:</b>
                                    <br>
                                    <div style="display:flex; flex-direction: row; justify-content: space-around; " >
                                    <p> <b>Gempa Dirasakan</b> </p>
                                    <img src="{{ asset('images') }}/bintang.png" alt="" height="25" width="25" >
                                    </div>
                                </div>
                                <div class="legenda" >
                                    <img src="{{ asset('images') }}/kontur-slab.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                                <div class="legenda" >
                                    <img src="{{ asset('images') }}/batas_batas.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                                <div class="legenda" >
                                    <b>INSET</b>
                                    <img src="{{ asset('images') }}/inset.png" alt="" height="100" width="250" style="margin-top: 2%;" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css" media="screen">

  #basemaps-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 500;
    margin: 3px;
    margin-right: 10px;
  }
  #basemaps {
  }

</style>

<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
    integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
    crossorigin=""></script>
<script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js"
    integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g=="
    crossorigin=""></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
<link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
<script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
<script src="{{ asset('gjson') }}/indofaults.js" ></script>
<script src="{{ asset('gjson') }}/slab_indonesia_usgs.js" ></script>
<script src="{{ asset('gjson') }}/batas_laut_indonesia.js" ></script>
<script src="{{ asset('gjson') }}/batas_provinsi_papua.js" ></script>
<script src="{{ asset('gjson') }}/garis_pantai_papua.js" ></script>

<script>
var map = L.map('eventsMap', {
    zoomSnap: 0.1,    // Allows fractional zoom levels like 1.1, 1.2, etc.
    zoomDelta: 0.1,   // Zooms by 0.1 units per scroll or control click
    zoom: 1.2  
}).setView([-2.5104, 137.714], 6);

// L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
//     maxZoom: 18,
//     attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
// }).addTo(map);
var layer = L.esri.basemapLayer('Oceans').addTo(map);

var terasa = L.divIcon({
    className: 'star-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="orange"><path d="M12 2l2.37 7.25h7.63l-6.18 4.5 2.37 7.25-6.18-4.5-6.18 4.5 2.37-7.25-6.18-4.5h7.63z" stroke="black" fill="red"/></svg>',
    iconSize: [30, 30],
    iconAnchor: [12, 12],
});

L.Control.NorthArrow = L.Control.extend({
    onAdd: function(map) {
        var allEvents = L.DomUtil.create('img');
        allEvents.src = "{{ asset('images') }}/gpt_north_arrow.svg";
        allEvents.style.width = '60px';
        return allEvents;
    },
    onRemove: function(map) {
        // Nothing to do here
    }
    });

    L.control.northArrow = function(opts) {
        return new L.Control.NorthArrow(opts);
    }

    L.control.northArrow({ position: 'topright' }).addTo(map);

    var patahanStyle = {
        "color": "#2C4B48",
        "weight": 0.7,
        "opacity": 0.9
    };

    // var PngDepth = {
    //     "color": "#2C4B48",
    //     "weight": 0.7,
    //     "opacity": 0.9
    // };

    //style for subduksi
    var subduksiStyle = {
        "color": "#ffff00",
        "weight": 1,
        "opacity": 0.5,
        "fillColor": 'transparent',
    };

    var batasLautStyle = {
    "color": "#000000",       // Black color
    "weight": 1,
    "opacity": 0.5,
    "fillColor": 'transparent',
    "dashArray": '5, 5',      // Dashed line with a pattern of 5px dash and 5px space
};


    var indoFaultsStyle = {
        "color": "#000000",
        "weight": 1,
        "opacity": 1,
        "fillColor": '#000000',
    }

    var garisPantaiPapuaStyle = {
        "color": "#00FFFF",
        "weight": 1,
        "opacity": 1,
    }

    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties && feature.properties.PlateName) {
            layer.bindPopup(feature.properties.PlateName);
        }
    }

    var BatasProvinsiPapuaStyle = {
    "color": "#000000",       // Solid black border
    "weight": 1,              // Border thickness
    "opacity": 1,             // Border opacity (1 means fully opaque)
    "fillColor": 'transparent', // Transparent fill
    "fillOpacity": 0          // Ensure fill is fully transparent
};




    const colorCategories = [
        { range: [0, 20], color: 'rgb(245,0,0)' },   // Light green
        { range: [20, 40], color: 'rgb(250,75,0)' }, // Green
        { range: [40, 60], color: 'rgb(252,118,0)' }, // Darker green
        { range: [60, 80], color: 'rgb(253,160,0)' }, // Olive
        { range: [80, 100], color: 'rgb(250,160,0)' }, // Orange
        { range: [100, 120], color: 'rgb(245,245,0)' }, // Dark orange
        { range: [120, 200], color: 'rgb(210,247,0)' },  // Red-orange
        { range: [200, 300], color: 'rgb(169,247,0)' },   // Red
        { range: [300, 400], color: 'rgb(128,247,0)' },   // Dark red
        { range: [400, 500], color: 'rgb(86,247,0)' },  // Deep red
        { range: [500, 660], color: 'rgb(0,245,0)' }  // Maroon
    ];

    function getColor(value) {
    for (let i = 0; i < colorCategories.length; i++) {
        let category = colorCategories[i];
        if (value >= category.range[0] && value <= category.range[1]) {
            return category.color;
        }
    }
    return 'rgba(255,255,255,0.8)'; // Default to white if no category matches
    }

    d3.json('{{ asset('gjson') }}/slab_Indonesia_usgs.json').then(function(data) {
        L.geoJSON(data, {
            style: function(feature) {
                return {
                    color: getColor(feature.properties.DEPTH), // Match the value to a color
                    weight: 2,
                    fillOpacity: 0.5 // You can adjust this opacity level as needed
                };
            }
        }).addTo(map);
    });

//plot subduction
    L.geoJSON(indoFaults, {
        style: indoFaultsStyle
    }).addTo(map);

    L.geoJSON(BatasProvinsiPapua, {
        style: BatasProvinsiPapuaStyle
    }).addTo(map);

    L.geoJSON(GarisPantaiPapua, {
        style: garisPantaiPapuaStyle
    }).addTo(map);


    L.geoJSON(batasLautIndonesia, {
        style: batasLautStyle
    }).addTo(map);

    var greenCircleIcon = L.divIcon({
        className: 'green-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="50" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="#00FF00" /></svg>',
        iconSize: [10, 10]
    });

    var largerGreenCircleIcon1 = L.divIcon({
    className: 'larger-green-circle-icon-1',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><circle cx="7.5" cy="7.5" r="6.5" stroke="black" stroke-width="1" fill="#00FF00" /></svg>',
    iconSize: [15, 15]
    });

    // New larger icon 2: 20x20 size with radius 14
    var largerGreenCircleIcon2 = L.divIcon({
        className: 'larger-green-circle-icon-2',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><circle cx="10" cy="10" r="9" stroke="black" stroke-width="1" fill="#00FF00" /></svg>',
        iconSize: [20, 20]
    });

    var redCircleIcon = L.divIcon({
        className: 'red-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="red" /></svg>',
        iconSize: [10, 10]
    });

    var largerRedCircleIcon1 = L.divIcon({
    className: 'larger-red-circle-icon-1',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><circle cx="7.5" cy="7.5" r="6.5" stroke="black" stroke-width="1" fill="red" /></svg>',
    iconSize: [15, 15]
    });

    // New larger icon 2: 20x20 size with radius 14
    var largerRedCircleIcon2 = L.divIcon({
        className: 'larger-red-circle-icon-2',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><circle cx="10" cy="10" r="9" stroke="black" stroke-width="1" fill="red" /></svg>',
        iconSize: [20, 20]
    });

    //this is for yellow icons
    var yellowCircleIcon = L.divIcon({
        className: 'yellow-circle-icon',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="yellow" /></svg>',
        iconSize: [10, 10]
    });

    var largerYellowCircleIcon1 = L.divIcon({
    className: 'larger-yellow-circle-icon-1',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><circle cx="7.5" cy="7.5" r="6.5" stroke="black" stroke-width="1" fill="yellow" /></svg>',
    iconSize: [15, 15]
    });

    // New larger icon 2: 20x20 size with radius 14
    var largerYellowCircleIcon2 = L.divIcon({
        className: 'larger-yellow-circle-icon-2',
        html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><circle cx="10" cy="10" r="9" stroke="black" stroke-width="1" fill="yellow" /></svg>',
        iconSize: [20, 20]
    });

    @if ($events->count() > 0)
        @foreach ($events as $eq)
            @if ($eq['depth'] <= 60 )
                @if ($eq['magnitudo'] <= 5)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: redCircleIcon }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 5 && $eq['magnitudo'] <= 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerRedCircleIcon1 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerRedCircleIcon2 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @endif
            @endif

            // Yellow for mag >=3 to mag <5
            @if ($eq['depth'] > 60 && $eq['depth'] <= 300 )
                @if ($eq['magnitudo'] <= 5)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: yellowCircleIcon }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 5 && $eq['magnitudo'] <= 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerYellowCircleIcon1 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerYellowCircleIcon2 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @endif
            @endif
            // Green for mag >=5
            @if ($eq['depth'] > 300 )
                @if ($eq['magnitudo'] <= 5)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: greenCircleIcon }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 5 && $eq['magnitudo'] <= 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerGreenCircleIcon1 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @elseif ($eq['magnitudo'] > 7)
                    marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: largerGreenCircleIcon2 }).addTo(map)
                        .bindPopup(
                            `{{ $eq->tanggal }}
                            {{ $eq->origin }} UTC,
                            {{ $eq->lintang }}
                            {{ $eq->bujur }} BT,
                            M{{ $eq->magnitudo }}
                            Kdlmn {{ $eq->depth }} Km,
                            {{ $eq->ket }}`);
                @endif
            @endif
        @endforeach
    @endif


    var feltsMap = L.map('feltsMap',{
        zoomSnap: 0.1,    // Allows fractional zoom levels like 1.1, 1.2, etc.
        zoomDelta: 0.1,   // Zooms by 0.1 units per scroll or control click
        zoom: 1.2  
    }).setView([-2.5104, 136.714], 6);
    // ini adalah copyright, bisa dicopot tapi lebih baik kita hargai sang penciptanya ya :)
     var layer = L.esri.basemapLayer('Oceans').addTo(feltsMap);
     var layerLabels;

  function setBasemap(basemap) {
    if (layer) {
      mymap.removeLayer(layer);
    }

    layer = L.esri.basemapLayer(basemap);

    mymap.addLayer(layer);

    if (layerLabels) {
      mymap.removeLayer(layerLabels);
    }

    if (basemap === 'ShadedRelief'
     || basemap === 'Oceans'
     || basemap === 'Gray'
     || basemap === 'DarkGray'
     || basemap === 'Terrain'
   ) {
      layerLabels = L.esri.basemapLayer(basemap + 'Labels');
      mymap.addLayer(layerLabels);
    } else if (basemap.includes('Imagery')) {
      layerLabels = L.esri.basemapLayer('ImageryLabels');
      mymap.addLayer(layerLabels);
    }
  }

  function changeBasemap(basemaps){
    var basemap = basemaps.value;
    setBasemap(basemap);
  }

    L.geoJSON(indoFaults, {
    style: indoFaultsStyle
     }).addTo(feltsMap);


     L.geoJSON(BatasProvinsiPapua, {
        style: BatasProvinsiPapuaStyle
    }).addTo(feltsMap);

    L.geoJSON(GarisPantaiPapua, {
        style: garisPantaiPapuaStyle
    }).addTo(feltsMap);


    L.geoJSON(batasLautIndonesia, {
        style: batasLautStyle
    }).addTo(feltsMap);

     L.Control.NorthArrow = L.Control.extend({
    onAdd: function(feltsMap) {
        var img = L.DomUtil.create('img');
        img.src = "{{ asset('images') }}/gpt_north_arrow.svg";
        img.style.width = '60px';
        return img;
    },
    onRemove: function(feltsMap) {
        // Nothing to do here
    }
    });

    L.control.northArrow = function(opts) {
        return new L.Control.NorthArrow(opts);
    }

    L.control.northArrow({ position: 'topright' }).addTo(feltsMap);


    const feltsColorCategories = [
        { range: [0, 20], color: 'rgb(245,0,0)' },   // Light green
        { range: [20, 40], color: 'rgb(250,75,0)' }, // Green
        { range: [40, 60], color: 'rgb(252,118,0)' }, // Darker green
        { range: [60, 80], color: 'rgb(253,160,0)' }, // Olive
        { range: [80, 100], color: 'rgb(250,160,0)' }, // Orange
        { range: [100, 120], color: 'rgb(245,245,0)' }, // Dark orange
        { range: [120, 200], color: 'rgb(210,247,0)' },  // Red-orange
        { range: [200, 300], color: 'rgb(169,247,0)' },   // Red
        { range: [300, 400], color: 'rgb(128,247,0)' },   // Dark red
        { range: [400, 500], color: 'rgb(86,247,0)' },  // Deep red
        { range: [500, 660], color: 'rgb(0,245,0)' }  // Maroon
    ];

    function getColor(value) {
    for (let i = 0; i < feltsColorCategories.length; i++) {
        let category = feltsColorCategories[i];
        if (value >= category.range[0] && value <= category.range[1]) {
            return category.color;
        }
    }
    return 'rgba(255,255,255,0.8)'; // Default to white if no category matches
    }

    d3.json('{{ asset('gjson') }}/slab_Indonesia_usgs.json').then(function(data) {
        L.geoJSON(data, {
            style: function(feature) {
                return {
                    color: getColor(feature.properties.DEPTH), // Match the value to a color
                    weight: 2,
                    fillOpacity: 0.5 // You can adjust this opacity level as needed
                };
            }
        }).addTo(feltsMap);
    });


    @foreach($felts as $felt)
    marker = new L.marker([{{ $felt->lintang }}, {{ $felt->bujur }}], { icon: terasa }).addTo(feltsMap)
            .bindPopup(
                `{{ $felt->tanggal }}
                {{ $felt->origin }} UTC,
                {{ $felt->lintang }}
                {{ $felt->bujur }} BT,
                M{{ $felt->magnitudo }}
                Kdlmn {{ $felt->depth }} Km,
                {{ $felt->ket }},
                {{ $felt->terdampak }} `);
    @endforeach


        // Get the input field and the display element
        var inputField = document.getElementById('userInput');
        var displayElement = document.getElementById('displayText');

        // Add an event listener to detect input changes
        inputField.addEventListener('input', function() {
            // Update the display element with the current value of the input field
            displayElement.textContent = inputField.value;
        });

        // Get the input field and the display element
        var stationField = document.getElementById('stationName');
        var displayStation = document.getElementById('displayStation');

        // Add an event listener to detect input changes
        stationField.addEventListener('input', function() {
            // Update the display element with the current value of the input field
            displayStation.textContent = stationField.value;
        });


        // Get the input field and the display element
        var inputFeltsField = document.getElementById('userFeltsInput');
        var displayFeltsElement = document.getElementById('displayFeltsText');

        // Add an event listener to detect input changes
        inputFeltsField.addEventListener('input', function() {
            // Update the display element with the current value of the input field
            displayFeltsElement.textContent = inputFeltsField.value;
        });

        // Get the input field and the display element
        var stationFeltsField = document.getElementById('stationFeltsName');
        var displayFeltsStation = document.getElementById('displayFeltsStation');

        // Add an event listener to detect input changes
        stationFeltsField.addEventListener('input', function() {
            // Update the display element with the current value of the input field
            displayFeltsStation.textContent = stationFeltsField.value;
        });


</script>
@endsection
