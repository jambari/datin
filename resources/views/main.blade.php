
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="Stasiun Geofisika Angkasapura">
      <meta name="keywords" content="Gempabumi, Magnetbumi, Listrik Udara, Percepatan Tanah">
      <meta name="author" content="Jambari">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @yield('title')
      <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Miriam+Libre|Open+Sans+Condensed:300|Oswald" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
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
         .footer-copyright {
         border-top: 2px solid #95A5A6;
         background-color: #031424;
         }
      </style>
      @yield('after_style')
   </head>
   <body>
      <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
      @yield('alert')
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="/">
         <img src="{{ asset('images') }}/logo-bmkg.png" alt="logo" width="35" height="40" >
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/news">Berita</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/siarans">Siaran Press</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/gempa">Gempabumi</a>
               </li>
               {{--           
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="#">Action</a>
                     <a class="dropdown-item" href="#">Another action</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a>
                  </div>
               </li>
               <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
               </li>
               --}}
            </ul>
            {{--    
            <form class="form-inline my-2 my-lg-0">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            --}}
         </div>
      </nav>
      @yield('content')
      <!-- Footer -->
      <footer class="page-footer font-small text-primary bg-light">
         <div style="" class=" bg-light text-primary border border-bottom" >
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
                     <a class="fb-ic" href="https://www.facebook.com/profile.php?id=100013155312444&ref=bookmarks" target="_blank">
                     <i class="fa fa-facebook text-primary mr-4"> </i>
                     </a>
                     <!-- Twitter -->
                     <a class="tw-ic" href="https://twitter.com/AngkasaStageof" target="_blank">
                     <i class="fa fa-twitter text-primary mr-4"> </i>
                     </a>
                     <!-- Google +-->
                     <a class="gplus-ic" href="mailto:stageof.angkasa@gmail.com" target="_blank">
                     <i class="fa fa-google-plus text-primary mr-4"> </i>
                     </a>
                     <!--Instagram-->
                     <a class="ins-ic" href="https://www.instagram.com/stageofangkasa/" target="_blank">
                     <i class="fa fa-instagram text-primary"> </i>
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
                     <a class="text-primary" href="/gempa">Gempabumi</a>
                  </p>
                  <p>
                     <!--             <a class="text-primary" href="#!">Magnetbumi</a>
                        </p>
                        <p>
                          <a class="text-primary" href="#!">Listrik Udara</a>
                        </p>
                        <p>
                          <a class="text-primary" href="#!">Kualitas Udara</a>
                        </p> -->
               </div>
               <!-- Grid column -->
               <!-- Grid column -->
               <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-light ">
                  <!-- Links -->
                  <h6 class="text-uppercase font-weight-bold">Link Terkait</h6>
                  <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                  <p>
                     <a class="text-primary" href="https://bmkg.go.id">BMKG</a>
                  </p>
                  <p>
                     <a class="text-primary" href="https://inatews.bmkg.go.id">InaTEWS</a>
                  </p>
                  <p>
                     <a class="text-primary" href="balai5.bmkg.go.id">BBMKG V</a>
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
                     <i class="fa fa-home mr-3"></i> Jayapura, 99613, ID
                  </p>
                  <p>
                     <i class="fa fa-envelope mr-3"></i> stageof.angkasa@bmkg.go.id
                  </p>
                  <p>
                     <i class="fa fa-phone mr-3"></i> (0967) 533 533
                  </p>
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
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="{{ asset('js/share.js') }}"></script>
      @yield('script')
   </body>
</html>

