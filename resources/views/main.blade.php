<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Miriam+Libre|Open+Sans+Condensed:300|Oswald" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <style>
        #stasiun {
            font-family: 'Oswald', sans-serif;
        }
        nav {
            font-family: 'Miriam Libre', sans-serif;
        }
        .footer {
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
    @yield('after_style')
</head>
<body>
<nav class="site-header sticky-top py-1 bg-light">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#">
      <img src=" {{ asset('images') }}/logo-bmkg.png " alt="logo" width="25" height="40" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false" >
    </a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#"> <i class="fa fa-home">Home</i> </a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">News</a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">Earthquake</a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">Geomagnetism</a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">Lightning</a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">Air Quality</a>
    <a class="py-2 d-none d-md-inline-block text-primary" href="#">Contact Us</a>
  </div>
</nav>

    @yield('content')

<!-- Footer -->
<footer class="page-footer font-small text-light bg-primary">

    <div style="" class="bg-light text-primary " >
      <div class="container">

        <!-- Grid row-->
        <div class="row py-4 d-flex align-items-center">

          <!-- Grid column -->
          <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
            <h6 class="mb-0">Get connected with us on social networks!</h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-7 text-center text-md-right">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fa fa-facebook white-text mr-4"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fa fa-twitter white-text mr-4"> </i>
            </a>
            <!-- Google +-->
            <a class="gplus-ic">
              <i class="fa fa-google-plus white-text mr-4"> </i>
            </a>
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fa fa-instagram white-text"> </i>
            </a>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row-->

      </div>
    </div>

    <!-- Footer Links -->
    <div class="container text-center text-md-left mt-5">

      <!-- Grid row -->
      <div class="row mt-3 dark-grey-text">

        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

          <!-- Content -->
          <h6 class="text-uppercase font-weight-bold">Stageof Angkasa</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Stasiun Geofisika Kelas I Angkasapura Jayapura merupakan salah satu UPT BMKG yang terletak di Kota Jayapura. Stageof Angkasa melakukan pengamatan gempabumi, magnetbumi, listrik udara, dan kualitas udara.</p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 ">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Produk</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a class="text-light" href="#!">Gempabumi</a>
          </p>
          <p>
            <a class="text-light" href="#!">Magnetbumi</a>
          </p>
          <p>
            <a class="text-light" href="#!">Listrik Udara</a>
          </p>
          <p>
            <a class="text-light" href="#!">Kualitas Udara</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-light ">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Link Terkait</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <a class="text-light" href="#!">BMKG</a>
          </p>
          <p>
            <a class="text-light" href="#!">InaTEWS</a>
          </p>
          <p>
            <a class="text-light" href="#!">BBMKG V</a>
          </p>
          <p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

          <!-- Links -->
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>
            <i class="fa fa-home mr-3"></i> Jayapura, 99613, ID</p>
          <p>
            <i class="fa fa-envelope mr-3"></i> stageof.angkasa@bmkg.go.id</p>
          <p>
            <i class="fa fa-phone mr-3"></i> (0967) 533 533</p>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center text-light py-3">© <?php echo date("Y"); ?> 
      <a class="text-light" href="http://stageof.angkasa.bmkg.go.id"> Stageof Angkasapura Jayapura</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>