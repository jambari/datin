
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Stasiun Geofisika Angkasapura">
      <meta name="keywords" content="Gempabumi, Magnetbumi, Listrik Udara, Percepatan Tanah">
      <meta name="author" content="Jambari">
      @yield('title')
      <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
      <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href=" {{ asset('css/demogallery.css') }} ">
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
      @include('nav')
      @yield('content')
      @include('footer')
      @yield('script')
   </body>
</html>

