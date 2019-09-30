<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
    @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  #logo-container {
    display: none;
  }
}
  </style>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/layanan" class="brand-logo">
        <img src="{{ asset('images/logo-bmkg.png') }}" alt="" class="responsive-img" style="width: 20%" >
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Tentang</a></li>
        <li><a href="#">Alur</a></li>
        <li><a href="#">Data</a></li>
        <li><a href="#">Jasa</a></li>
        <li><a href="#">Study Tour</a></li>
        <li><a href="#">Goes to School</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Tentang</a></li>
        <li><a href="#">Alur</a></li>
        <li><a href="#">Data</a></li>
        <li><a href="#">Jasa</a></li>
        <li><a href="#">Study Tour</a></li>
        <li><a href="#">Goes to School</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Selamat Datang</h1>
        <div class="row center">
          <h5 class="header col s12 light">Di Pelayanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</h5>
        </div>
        <div class="row center">
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Mulai Jelajah</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background1.jpg') }}" alt="Unsplashed background img 1"></div>
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
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">transfer_within_a_station</i><i class="material-icons">business_center</i></h2>
            <h5 class="center">Pelayanan Jasa</h5>

            <p class="light center-align">
            Anda dapat menyewa peralatan kami untuk keperluan penelitian anda. Bingung mengoperasikannya ? Kami memiliki tim ahli yang siap memandu anda.</p>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">local_library</i><i class="material-icons">drive_eta</i></h2>
            <h5 class="center">Study Tour</h5>

            <p class="light center-align">Ajak siswa-siswi anda mempelajari gempabumi, magnetbumi, dan listrik udara serta berbagai jenis peralatan geofisika langsung di kantor kami.</p>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i><i class="material-icons">business</i></h2>
            <h5 class="center">Goes To School</h5>

            <p class="light center-align">
            Undang tim dari Stasiun Geofisika Kelas I Jayapura berkunjung ke sekolah anda. Selain hemat waktu dan transportasi, sekolah anda juga akan menerima sertifikat dari kami.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Mahasiswa tingkat akhir ? perlu data untuk skripsi ?. Sila isi formulir berikut !</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background2.jpg') }}" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Formulir Permintaan Data</h4>
          <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="nama">Nama lengkap</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="instansi">Instansi/Perusahaan/Perguruan Tinggi</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="alamat">Alamat</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="telepon">No Telepon/HP</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="jenis">Jenis Data</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>File</span>
                      <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Unggah surat permohonan">
                    </div>
                  </div>
                </div>
              </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Taide Digital Seismograph Portable, Geolistrik dan peralatan lainnya !</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background3.jpg') }}" alt="Unsplashed background img 3"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Formulir Pelayanan Jasa</h4>
          <form class="col s12">
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="nama">Nama lengkap</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="instansi">Instansi/Perusahaan/Perguruan Tinggi</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="alamat">Alamat</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="email" class="validate">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                  <label for="telepon">No Telepon/HP</label>
                </div>
                <div class="input-field col s6">
                  <input id="last_name" type="text" class="validate">
                  <label for="jenis">Jenis Jasa</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <div class="file-field input-field">
                    <div class="btn">
                      <span>File</span>
                      <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Unggah surat permohonan">
                    </div>
                  </div>
                </div>
              </div>
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Layanan Data dan Jasa <small>Stasiun Geofisika Kelas I Jayapura</small> </h5>
          <p class="grey-text text-lighten-4">Laman situs ini merupakan platform pelayanan jasa dan data di Stasiun Geofisika Kelas I Jayapura yang bertujuan untuk memudahkan pengguna data dan jasa tanpa harus datang langsung ke kantor kami.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Jenis Layanan</h5>
          <ul>
            <li><a class="white-text" href="#!">Data</a></li>
            <li><a class="white-text" href="#!">Jasa</a></li>
            <li><a class="white-text" href="#!">Study Tour</a></li>
            <li><a class="white-text" href="#!">Goes To School</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Kontak</h5>
          <ul>
            <li><a class="white-text" href="#!">Jayapura, 99613, ID</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >mail</i> stageof.jayapura@gmail.com</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >local_phone</i> (0967) 533533</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >stay_current_portrait</i> +6285254010512</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy; Hak Cipta <a class="brown-text text-lighten-3" href="http://stageof.jayapura.bmkg.go.id">Stasiun Geofisika Kelas I Jayapura <?php echo date("Y"); ?></a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.js') }}"></script>
  <script src="{{ asset('js/init.js') }}"></script>

  </body>
</html>
