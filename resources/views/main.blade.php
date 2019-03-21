
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
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
      <style>
         #stasiun {
         font-family: 'Karla', sans-serif;
         }
         nav {
         font-family: 'Karla', sans-serif;
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
      @include('footer')

      @yield('script')
   </body>
</html>

