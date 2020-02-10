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
  <nav class="" role="navigation" style="background-color: #C30F42;">
    <div class="nav-wrapper container">
      <a id="logo-container" href="/layanandata" class="brand-logo white-text">
        {{-- <img src="{{ asset('images/logobukadata.png') }}" alt="" class="responsive-img" style="width: 20%" > --}}
        BukaData
      </a>
      <ul class="right hide-on-med-and-down">
        <li ><a href="/layanandata/tentang" class="white-text">Tentang</a></li>
        <li><a href="/layanandata/tarif" class="white-text">Tarif</a></li>
        <li><a href="/layanandata/alur" class="white-text">Alur</a></li>
        <li><a href="/layanandata/data" class="white-text">Data</a></li>
        <li><a href="/layanandata/jasa" class="white-text">Jasa</a></li>
        <li><a href="/layanandata/magang" class="white-text">Magang</a></li>
        <li><a href="/layanandata/gts" class="white-text">Goes to School</a></li>
        <li><a href="/layanandata/daftar" class="white-text">Daftar Permohonan</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="/layanandata/tentang">Tentang</a></li>
        <li><a href="/layanandata/tarif">Tarif</a></li>
        <li><a href="/layanandata/alur">Alur</a></li>
        <li><a href="/layanandata/data">Data</a></li>
        <li><a href="/layanandata/jasa">Jasa</a></li>
        <li><a href="/layanandata/magang">Magang</a></li>
        <li><a href="/layanandata/gts">Goes to School</a></li>
        <li><a href="/layanandata/daftar">Daftar Permohonan</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  @yield('content')

  <footer class="page-footer red accent-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><strong style="background-color: #C30F42; border-radius: 5px;" >BukaData</strong> <small>Stasiun Geofisika Kelas I Jayapura</small> </h5>
          <p class="grey-text text-lighten-4">Laman situs ini merupakan platform pelayanan jasa dan data di Stasiun Geofisika Kelas I Jayapura yang bertujuan untuk memudahkan pengguna data dan jasa tanpa harus datang langsung ke kantor kami.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Jenis Layanan</h5>
          <ul>
            <li><a class="white-text" href="/layanandata/tarif">Tarif</a></li>
            <li><a class="white-text" href="/layanandata/data">Data</a></li>
            <li><a class="white-text" href="/layanandata/jasa">Jasa</a></li>
            <li><a class="white-text" href="/layanandata/magang">Magang</a></li>
            <li><a class="white-text" href="/layanandata/gts">Goes To School</a></li>
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
