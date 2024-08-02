@extends('backpack::layout')
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
                    <table class="table table-bordered table-striped" >
                        <thead class="bg-danger" >
                            <th>No</th>
                            <th>Date</th>
                            <th>Origin(UTC)</th>
                            <th>Lat</th>
                            <th>Lon</th>
                            <th>Mag</th>
                            <th>Depth</th>
                            <th>Remark</th>
                            <th>Felt</th>
                        </thead>
                        <tbody>
                            @foreach($felts as $felt)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $felt->tanggal ?? '-' }} </td>
                                <td> {{ substr($felt->origin, 0, 8) ?? '-' }} </td>
                                <td> {{ $felt->lintang ?? '-' }} </td>
                                <td> {{ $felt->bujur ?? '-' }} </td>
                                <td> {{ $felt->magnitudo ?? '-' }} </td>
                                <td> {{ $felt->depth ?? '-' }} </td>
                                <td> {{ $felt->ket ?? '-' }} </td>
                                <td> {{ $felt->terdampak ?? '-' }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div>
            <br>
            <!-- This section for events map -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h4 class="bg-info" >Peta Gempa Bumi Periode  {{ $start }} s/d {{ $end }} </h4>
                    <div id="eventsMap" style="width:100%; height: 600px; border-radius: 5px; "></div>
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
<link rel="stylesheet" href="{{ asset('css') }}/L.Icon.Pulse.css" />
<script src="{{ asset('js') }}/L.Icon.Pulse.js"></script>
<script src="{{ asset('gjson') }}/patahan.js"></script>
<script src="{{ asset('gjson') }}/indofaults.js"></script>
<script src="{{ asset('gjson') }}/plates.js"></script>

<script>
var map = L.map('eventsMap').setView([-2.5104, 140.714], 6);

L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
}).addTo(map);

var terasa = L.divIcon({
    className: 'star-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="orange"><path d="M12 2l2.37 7.25h7.63l-6.18 4.5 2.37 7.25-6.18-4.5-6.18 4.5 2.37-7.25-6.18-4.5h7.63z" stroke="black" fill="orange"/></svg>',
    iconSize: [30, 30],
    iconAnchor: [12, 12],
});


var patahanStyle = {
    "color": "#2C4B48",
    "weight": 0.7,
    "opacity": 0.9
};

//style for subduksi
var subduksiStyle = {
    "color": "#ffff00",
    "weight": 1,
    "opacity": 0.5,
    "fillColor": 'transparent',
};

var indoFaultsStyle = {
    "color": "#ff0000",
    "weight": 1,
    "opacity": 1,
    "fillColor": '#E04D01',
}

function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
    if (feature.properties && feature.properties.PlateName) {
        layer.bindPopup(feature.properties.PlateName);
    }
}

//plot subduction
L.geoJSON(indoFaults, {
    style: indoFaultsStyle
}).addTo(map);

var redCircleIcon = L.divIcon({
    className: 'red-circle-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="50" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="red" /></svg>',
    iconSize: [10, 10]
});

var greenCircleIcon = L.divIcon({
    className: 'green-circle-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="green" /></svg>',
    iconSize: [10, 10]
});

var yellowCircleIcon = L.divIcon({
    className: 'yellow-circle-icon',
    html: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 10 10"><circle cx="5" cy="5" r="4" stroke="black" stroke-width="1" fill="yellow" /></svg>',
    iconSize: [10, 10]
});


@if ($events->count() > 0)
    @foreach ($events as $eq)
        @if ($eq['magnitudo'] < 3)
        marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: greenCircleIcon }).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endif
        @if ($eq['magnitudo'] >= 3 && $eq['magnitudo'] < 5)
        marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: yellowCircleIcon }).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endif
        @if ($eq['magnitudo'] >= 5)
        marker = new L.marker([{{ $eq->lintang }}, {{ $eq->bujur }}], { icon: redCircleIcon }).addTo(map)
            .bindPopup(
                `{{ $eq->tanggal }}
                {{ $eq->origin }} UTC, 
                {{ $eq->lintang }}
                {{ $eq->bujur }} BT,  
                M{{ $eq->magnitudo }}
                Kdlmn {{ $eq->depth }} Km, 
                {{ $eq->ket }}`);
        @endif
    @endforeach
@endif
</script>
@endsection

