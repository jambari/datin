<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="google-site-verification" content="crkf_-9RUsSJIOL-JaHqe4PvArgwD5mQmqGd4P3bbS8" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  @yield('title')
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Platform Pelayanan Jasa di Stasiun Geofisika Kelas I Jayapura">
      <meta name="keywords" content="Pelayanan Data dan Informasi, Pelayanan Jasa, Magang, Goes TO School">
      <meta name="author" content="Jambari">
<!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145443079-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-145443079-1');
      </script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
  @yield('after_style')
  <style>
    @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  #logo-container {
    display: none;
  }
}
  </style>

    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5cd3aeaed07d7e0c6392a561/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    console.log('Developer: jambari07@gmail.com ');
    console.log('Github: https://github.com/jambari ');
</script>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/" class="brand-logo">
        <img src="{{ asset('images/logo-bmkg.png') }}" alt="" class="responsive-img" style="width: 20%" >
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/layanan/tentang">Tentang</a></li>
        <li><a href="/layanan/tarif">Tarif</a></li>
        <li><a href="/layanan/data">Data</a></li>
        <li><a href="/layanan/jasa">Jasa</a></li>
        <li><a href="/layanan/magang">Magang</a></li>
        <li><a href="/layanan/gts">Goes to School</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="/layanan/tentang">Tentang</a></li>
        <li><a href="/layanan/tarif">Tarif</a></li>
        <li><a href="/layanan/data">Data</a></li>
        <li><a href="/layanan/jasa">Jasa</a></li>
        <li><a href="/layanan/magang">Magang</a></li>
        <li><a href="/layanan/gts">Goes to School</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  @yield('content')


{{--   <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Mahasiswa tingkat akhir ? perlu data untuk skripsi ?. Sila isi formulir berikut !</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background2.jpg') }}" alt="Unsplashed background img 2"></div>
  </div> --}}

{{--   <div class="container">
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
  </div> --}}


{{--   <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Taide Digital Seismograph Portable, Geolistrik dan peralatan lainnya !</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ asset('images/background3.jpg') }}" alt="Unsplashed background img 3"></div>
  </div> --}}

{{--   <div class="container">
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
  </div> --}}

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
            <li><a class="white-text" href="/layanan/tarif">Tarif</a></li>
            <li><a class="white-text" href="/layanan/data">Data</a></li>
            <li><a class="white-text" href="/layanan/jasa">Jasa</a></li>
            <li><a class="white-text" href="/layanan/magang">Magang</a></li>
            <li><a class="white-text" href="/layanan/gts">Goes To School</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Kontak</h5>
          <ul>
            <li><a class="white-text" href="#!">Jayapura, 99613, ID</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >mail</i> stageof.jayapura@gmail.com</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >local_phone</i> (0967) 533533</a></li>
            <li><a class="white-text" href="#!"><i class="material-icons" >stay_current_portrait</i> +628114891151</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      &copy; Hak Cipta <a class="brown-text text-lighten-3" href="http://stageof.jayapura.bmkg.go.id">Stasiun Geofisika Kelas I Jayapura <?php echo date("Y"); ?></a> Crafted By <a href="https://github.com/jambari" class="brown-text text-lighten-3" target="_blank">Author</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ asset('js/materialize.js') }}"></script>
  <script src="{{ asset('js/init.js') }}"></script>
  @yield('after_script')
  </body>
</html>
