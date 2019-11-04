@extends('layanan')
@section('title')
  <title>Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</title>
@endsection
@section('after_style')
  <style>
/*    #alur {
    background:
    linear-gradient(
      rgba(0, 0, 0, 0.0),
      rgba(0, 0, 0, 0.0)
    ),
    url('./images/layanan/Slide1.PNG');
   background-size: cover;
    }*/
  </style>
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
        <h1 class="header center red-text text-accent-3">SELAMAT DATANG</h1>
        <div class="row center">
          <h5 class="header col s12 light">Di <strong style="background-color: #C30F42; border-radius: 5px;" >BukaData</strong>, Platform Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</h5>
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
            <a href="/layanandata/data" id="download-button" class="btn waves-effect waves-light red accent-3 "><i class="material-icons left">search</i>Masuk</a>
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
            <a href="/layanandata/jasa" id="download-button" class="btn waves-effect waves-light red accent-3"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">local_library</i><i class="material-icons">drive_eta</i></h2>
            <h5 class="center">PKL</h5>

            <p class="light center-align">Dapatkan pengalaman kerja dengan melakukan Praktik Kerja Lapangan di Stasiun Geofisika Kelas I Jayapura.</p>
          </div>
          <div class="row center">
            <a href="/layanandata/magang" id="download-button" class="btn waves-effect waves-light red accent-3"><i class="material-icons left">search</i>Masuk</a>
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
            <a href="/layanandata/gts" id="download-button" class="btn waves-effect waves-light red accent-3"><i class="material-icons left">search</i>Masuk</a>
          </div>
        </div>
      </div>

    </div>
  </div>

    <div id="" class="parallax-container" style="    background:
    linear-gradient(
      rgba(0, 0, 0, 0.8),
      rgba(0, 0, 0, 0.3)
    );">
    <div class="section no-pad-bot">
      <div class="container">
        <h3 class="header center light text-lighten-2" style="margin-top: 10%;">ALUR PERMOHONAN</h3>
        <div class="row center">
            <a href="/layanandata/alur" id="download-button" class="btn btn-large pulse waves-effect waves-light red accent-3 "><i class="material-icons left">arrow_forward</i>Selengkapnya</a>
        </div>
{{--         <div class="row center">
          <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Mulai Jelajah</a>
        </div> --}}
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background3.jpg') }}" alt="Unsplashed background img 1"></div>
  </div>


  <div class="section " id="alur">
    <div class="parallax-container">
           <img class="materialboxed" width="100%" src="images/layanan/Slide1.PNG">
         <div class="parallax"><img src="{{ asset('images/seiscomp3.jpg') }}" alt="Unsplashed background img 1"></div>
    </div>
  </div>
@endsection

@section('after_script')

<script>
</script>
@endsection