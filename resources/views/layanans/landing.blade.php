@extends('layanan')
@section('title')
  <title>Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('content')
  <div id="index-banner" class="parallax-container" style="    background:
    linear-gradient(
      rgba(0, 0, 0, 0.8),
      rgba(0, 0, 0, 0.3)
    );">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Selamat Datang</h1>
        <div class="row center">
          <h5 class="header col s12 light">Di Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</h5>
        </div>
{{--         <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Mulai Jelajah</a>
        </div> --}}
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background4.JPG') }}" alt="Unsplashed background img 1"></div>
  </div>


  <div class="">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">donut_small</i><i class="material-icons">insert_chart</i></h2>
            <h5 class="center">Permintaan Data</h5>

            <p class="light center-align">Ajukan permintaan data anda secara online. Kami akan mengirimkannya ke email anda. Permintaan data belum pernah semudah ini.</p>
          </div>
          <div class="row center">
            <a href="/layanan/data" id="download-button" class="btn waves-effect waves-light teal lighten-1"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">transfer_within_a_station</i><i class="material-icons">business_center</i></h2>
            <h5 class="center">Pelayanan Jasa</h5>

            <p class="light center-align">
            Anda dapat menyewa peralatan kami untuk keperluan penelitian anda. Bingung mengoperasikannya ? Kami memiliki tim ahli yang siap memandu anda.</p>
          </div>
          <div class="row center">
            <a href="/layanan/jasa" id="download-button" class="btn waves-effect waves-light teal lighten-1"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">local_library</i><i class="material-icons">drive_eta</i></h2>
            <h5 class="center">Magang</h5>

            <p class="light center-align">Dapatkan pengalaman kerja dengan praktik kerja (magang) di Stasiun Geofisika.</p>
          </div>
          <div class="row center">
            <a href="/layanan/magang" id="download-button" class="btn waves-effect waves-light teal lighten-1"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i><i class="material-icons">business</i></h2>
            <h5 class="center">Goes To School</h5>

            <p class="light center-align">
            Silahkan berkunjung ke kantor kami atau undang kami ke sekolah anda. Berbagi pengetahuan seputar gempabumi dan tsunami serta dampaknya dengan sosialisasi.</p>
          </div>
          <div class="row center">
            <a href="/layanan/gts" id="download-button" class="btn waves-effect waves-light teal lighten-1"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="divider"></div>
  <div class="section">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l10">
              <h5 class="teal-text lighten-2 center-align " >Status Permohonan</h5>
                <table class="striped highlight">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Permohonan/perihal</th>
                        <th>Status</th>
                      </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Stefani Ambyar</td>
                      <td>Peta Kegempaan 2018 Papua</td>
                      <td><span class=" badge red darken-1 white-text">Belum diproses</span></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Judika</td>
                      <td>Peta Kerawanan Petir Kota Jayapura 2016</td>
                      <td><span class=" badge yellow darken-1 white-text">Sedang diproses</span></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Nabila</td>
                      <td>Peta Kejadian Petir 01 Oktober 2019</td>
                      <td><span class=" badge green darken-1 white-text">Selesai diproses</span></td>
                    </tr>
                  </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
@endsection