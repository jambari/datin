@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">Siaran Pers</li>
      </ol>
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box box-header with-border">
                    <h1 class="box-title">Siaran Pers</h1>
                </div>
                <div class="box-body">
                    <div class="row">
						<div class="col-md-6" >
						<div class="alert alert-warning alert-dismissible">
                        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  	Hai Pengamat, Ini adalah Rilis Media otomatis, Tugas Pengamat tentu sebagai kontrol kualitas, <strong>Anda kami sarankan untuk memperhatikan kembali parameter gempa yang diwarnai dan menyunting narasi untuk hasil lebih baik</strong>
							</div>
                        	<div class="alert alert-success alert-dismissible text-info">
                        		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  	<span>Tanggal: {{ $event->tanggal or '-' }}</span> | <span>Origin: {{ $event->origin or '-' }} UTC</span> | <span>Lintang: {{ $event->lintang or '-' }}</span> | <span>Bujur: {{ $event->bujur or '-' }}</span> | <span>Depth: {{ $event->depth or '-' }} Km</span> | <span>Jarak: {{ $event->ket or '-' }}</span>
							</div>
							<h1 class="text text-center" >Sunting Narasi</h1>
							<div class="form-group">
                            	<label for="userInput">Judul</label>
                            	<input type="text" id="judulText" class="form-control" value="GEMPA BUMI TEKTONIK M{{ $mag }} DIRASAKAN DI {{ $wilayah }}" >
                        	</div>
							<div class="form-group">
								<label for="userFeltsInput">*Kejadian dan Parameter Gempa Bumi*</label>
								<textarea class="form-control" rows="3" id="parameterText" >
								Hari {{ $hari }}, {{ $tanggalindo }} pukul {{ $jamwit }} WIT wilayah {{ $formattedWord }} diguncang gempa bumi tektonik. 
									Hasil analisis BMKG menunjukkan gempa bumi memiliki parameter kekuatan M{{ $mag }}. 
									Episenter gempa bumi terletak pada koordinat {{ $lat }} dan {{ $lon }}, pada jarak {{ $jarak }} Km {{ $arah }} {{ $wilayah }}. 
									Berlokasi di darat dengan kedalaman {{ $depth }}Km.
								</textarea>
								<label for="stationName">*Jenis dan Mekanisme Gempa Bumi:*</label>
								<textarea class="form-control" rows="" id="mekanismeText" >
								Dengan memperhatikan lokasi episenter dan kedalaman hiposenternya, gempa bumi yang terjadi merupakan jenis gempabumi dangkal dengan mekanisme geser (strike slip)akibat aktivitas Sesar Lokal.
								</textarea>
								<label for="stationName">*Dampak Gempa Bumi:*</label>
								<textarea class="form-control" rows="" id="terdampakText">
								Berdasarkan informasi dari masyarakat, gempa bumi {{ $event->terdampak or 'Isi dulu kolom terdampak' }} *(getaran dirasakan nyata dalam rumah, terasa getaran seakan-akan ada truk berlalu)*. 
									Hingga saat ini belum ada laporan dampak kerusakan yang ditimbulkan akibat gempabumi tersebut.
								</textarea>
								<label for="stationName">*Gempa bumi susulan*</label>
								<textarea class="form-control" rows="" id="susulanText" >
								Hingga pukul {{ $jamsusulan }} WIT 
									hasil monitoring BMKG belum menunjukan adanya aktivitas gempa bumi susulan (aftershock)
								</textarea>
								<label for="stationName">*Rekomendasi*</label>
								<textarea class="form-control" rows="" id="rekomendasiText" >
								Masyarakat diimbau agar tetap tenang dan tidak terpengaruh oleh isu yang tidak dapat 
									dipertanggungjawabkan kebenarannya, menghindar dari bangunan yang retak atau rusak diakibatkan oleh gempa. 
									Periksa dan pastikan bangunan tempat tinggal anda cukup tahan gempa, ataupun  tidak ada kerusakan akibat 
									getaran gempa yang membahayakan kestabilan bangunan sebelum anda kembali kedalam rumah.
								</textarea>
							</div>
							<div class="form-group">
                            	<label for="userInput">Nama Kabal</label>
                            	<input type="text" id="kabalText" class="form-control" value="*Yustus Rumakiek, S.Si*" >
                        	</div>
							<table class="table table-responsive table-striped" >
								<thead>
									<th>MMI</th>
									<th>Keterangan</th>
								</thead>
								<tbody>
									<tr>
										<td>I</td>
										<td>Getaran tidak dirasakan kecuali dalam keadaan luarbiasa oleh beberapa orang</td>
									</tr>
									<tr>
										<td>II</td>
										<td>Getaran dirasakan oleh beberapa orang, benda-benda ringan yang digantung bergoyang.</td>
									</tr>
									<tr>
										<td>III</td>
										<td>Getaran dirasakan nyata dalam rumah. Terasa getaran seakan-akan ada truk berlalu.</td>
									</tr>
									<tr>
										<td>IV</td>
										<td>Pada siang hari dirasakan oleh orang banyak dalam rumah, di luar oleh beberapa orang, gerabah pecah, jendela/pintu berderik dan dinding berbunyi.</td>
									</tr>
									<tr>
										<td>V</td>
										<td>Getaran dirasakan oleh hampir semua penduduk, orang banyak terbangun, gerabah pecah, barang-barang terpelanting, tiang-tiang dan barang besar tampak bergoyang, bandul lonceng dapat berhenti.</td>
									</tr>
									<tr>
										<td>VI</td>
										<td>Getaran dirasakan oleh semua penduduk. Kebanyakan semua terkejut dan lari keluar, plester dinding jatuh dan cerobong asap pada pabrik rusak, kerusakan ringan.</td>
									</tr>
									<tr>
										<td>VII</td>
										<td>Tiap-tiap orang keluar rumah. Kerusakan ringan pada rumah-rumah dengan bangunan dan konstruksi yang baik. Sedangkan pada bangunan yang konstruksinya kurang baik terjadi retak-retak bahkan hancur, cerobong asap pecah. Terasa oleh orang yang naik kendaraan.</td>
									</tr>
									<tr>
										<td>VIII</td>
										<td>Kerusakan ringan pada bangunan dengan konstruksi yang kuat. Retak-retak pada bangunan degan konstruksi kurang baik, dinding dapat lepas dari rangka rumah, cerobong asap pabrik dan monumen-monumen roboh, air menjadi keruh.</td>
									</tr>
									<tr>
										<td>IX</td>
										<td>Kerusakan pada bangunan yang kuat, rangka-rangka rumah menjadi tidak lurus, banyak retak. Rumah tampak agak berpindah dari pondamennya. Pipa-pipa dalam rumah putus.</td>
									</tr>
									<tr>
										<td>X</td>
										<td>Bangunan dari kayu yang kuat rusak,rangka rumah lepas dari pondamennya, tanah terbelah rel melengkung, tanah longsor di tiap-tiap sungai dan di tanah-tanah yang curam.</td>
									</tr>
									<tr>
										<td>XI</td>
										<td>Bangunan-bangunan hanya sedikit yang tetap berdiri. Jembatan rusak, terjadi lembah. Pipa dalam tanah tidak dapat dipakai sama sekali, tanah terbelah, rel melengkung sekali.</td>
									</tr>
									<tr>
										<td>XII</td>
										<td>Hancur sama sekali, Gelombang tampak pada permukaan tanah. Pemandangan menjadi gelap. Benda-benda terlempar ke udara.</td>
									</tr>
								</tbody>
							</table>
						</div>
                        <div class="col-md-6">

								<h1 class="text text-center" >HASIL</h1>
								<h3 class="text text-center" id="judulDisplay">GEMPA BUMI TEKTONIK <strong class="text text-danger">M{{ $mag }}</strong>  DIRASAKAN DI <strong class="text text-danger" >{{ $wilayah }}</strong></h3>
								
								<ul>
									<b>*Kejadian dan Parameter Gempa Bumi*</b>
									<p id="parameterDisplay" >
									Hari <strong class="text text-danger">{{ $hari }}</strong>, <strong class="text text-danger">{{ $tanggalindo }}</strong> pukul <strong class="text text-danger">{{ $jamwit }} </strong>WIT wilayah <strong class="text text-danger" >{{ $formattedWord }}</strong> diguncang gempa bumi tektonik. 
									Hasil analisis BMKG menunjukkan gempa bumi memiliki parameter kekuatan <strong class="text text-danger" >M{{ $mag }}</strong>. 
									Episenter gempa bumi terletak pada koordinat {{ $lat }} dan {{ $lon }}, pada jarak <strong class="text text-danger">{{ $jarak }}</strong> Km <strong class="text text-danger">{{ $arah }} {{ $wilayah }}</strong>. 
									Berlokasi di <strong class="text text-danger" >darat</strong> dengan kedalaman <strong class="text text-danger">{{ $depth }}</strong>Km.
									</p>
									<b>*Jenis dan Mekanisme Gempa Bumi:*</b>
									<p id="mekanismeDisplay" >
									Dengan memperhatikan lokasi episenter dan kedalaman hiposenternya, 
									gempa bumi yang terjadi merupakan jenis gempabumi dangkal dengan mekanisme <strong id="mekanisme" class="text text-danger" >geser (<i>strike slip</i>)</strong> akibat aktivitas <strong id="namaSesar" class="text text-danger" >Sesar Lokal</strong>.
									</p>
									<b>*Dampak Gempa Bumi:*</b>
									<p id="terdampakDisplay" >
									Berdasarkan informasi dari masyarakat, gempa bumi <strong id="terdampak" class="text text-danger">{{ $event->terdampak or 'Isi dulu kolom terdampak' }} *(getaran dirasakan nyata dalam rumah, terasa getaran seakan-akan ada truk berlalu)*. Hingga saat ini belum ada laporan dampak kerusakan yang ditimbulkan akibat gempabumi tersebut</strong>. 
									</p>
									<b>*Gempa Bumi Susulan:*</b>
									<p id="susulanDisplay" >
									Hingga pukul <strong class="text text-danger">{{ $jamsusulan }}</strong> WIT 
									hasil monitoring BMKG belum menunjukan adanya aktivitas gempa bumi susulan (<i>aftershock</i>).
									</p>
									<b>*Rekomendasi*</b>
									<p id="rekomendasiDisplay" >
									Masyarakat diimbau agar tetap tenang dan tidak terpengaruh oleh isu yang tidak dapat 
									dipertanggungjawabkan kebenarannya, menghindar dari bangunan yang retak atau rusak diakibatkan oleh gempa. 
									Periksa dan pastikan bangunan tempat tinggal anda cukup tahan gempa, ataupun  tidak ada kerusakan akibat 
									getaran gempa yang membahayakan kestabilan bangunan sebelum anda kembali kedalam rumah.
									</p>
									<p>
									Pastikan informasi resmi hanya bersumber dari BMKG yang disebarkan melalui kanal komunikasi 
									resmi yang telah terverifikasi (Instagram/Twitter @infoBMKG), website (https://www.bmkg.go.id atau inatews.bmkg.go.id), 
									telegram channel (https://t.me/InaTEWS_BMKG) atau melalui Mobile Apps (IOS dan Android): wrs-bmkg atau infobmkg.
									</p>
								<p>
									Jayapura, <strong class="text text-danger">{{ $tanggalindo }}</strong> 
								</p>
								<p>*Kepala Balai Besar MKG Wilayah V*</p>
								<p id="kabalDisplay" >
									*Yustus Rumakiek, S.Si*
								</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script>
	    // Get the input field and the display element
		var parameterField = document.getElementById('parameterText');
        var parameterDisplay = document.getElementById('parameterDisplay');

        // Add an event listener to detect input changes
        parameterField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        parameterDisplay.textContent = parameterField.value;
        });

	    // Get the input field and the display element
		var judulField = document.getElementById('judulText');
        var judulDisplay = document.getElementById('judulDisplay');

        // Add an event listener to detect input changes
        judulField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        judulDisplay.textContent = judulField.value;
        });

	    // Get the input field and the display element
		var mekanismeField = document.getElementById('mekanismeText');
        var mekanismeDisplay = document.getElementById('mekanismeDisplay');

        // Add an event listener to detect input changes
        mekanismeField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        mekanismeDisplay.textContent = mekanismeField.value;
        });

	    // Get the input field and the display element
		var terdampakField = document.getElementById('terdampakText');
        var terdampakDisplay = document.getElementById('terdampakDisplay');

        // Add an event listener to detect input changes
        terdampakField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        terdampakDisplay.textContent = terdampakField.value;
        });

	    // Get the input field and the display element
		var susulanField = document.getElementById('susulanText');
        var susulanDisplay = document.getElementById('susulanDisplay');

        // Add an event listener to detect input changes
        susulanField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        susulanDisplay.textContent = susulanField.value;
        });

	    // Get the input field and the display element
		var rekomendasiField = document.getElementById('rekomendasiText');
        var rekomendasiDisplay = document.getElementById('rekomendasiDisplay');

        // Add an event listener to detect input changes
        rekomendasiField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        rekomendasiDisplay.textContent = rekomendasiField.value;
        });

	    // Get the input field and the display element
		var kabalField = document.getElementById('kabalText');
        var kabalDisplay = document.getElementById('kabalDisplay');

        // Add an event listener to detect input changes
        kabalField.addEventListener('input', function() {
        // Update the display element with the current value of the input field
        kabalDisplay.textContent = kabalField.value;
        });
	</script>
@endsection