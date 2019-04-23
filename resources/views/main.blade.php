
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="google-site-verification" content="crkf_-9RUsSJIOL-JaHqe4PvArgwD5mQmqGd4P3bbS8" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="salah satu UPT BMKG yang terletak di Kota Jayapura. Stageof Angkasa melakukan pengamatan gempabumi, magnetbumi, listrik udara, dan kualitas udara.">
      <meta name="keywords" content="Gempabumi, Magnetbumi, Listrik Udara, Percepatan Tanah, Buletin, Siaran Press">
      <meta name="author" content="Jambari">
      @yield('title')
      <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

      <style>
        body {
          padding-top: 75px;
        }
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

         nav {
          background: -webkit-linear-gradient(90deg, rgb(1, 4, 7), rgb(40, 74, 107));
          background: linear-gradient(90deg, rgb(1, 4, 7), rgb(40, 74, 107));
          
/*background: -webkit-linear-gradient(90deg, rgb(1, 3, 6), rgb(39, 92, 148));
background: linear-gradient(90deg, rgb(1, 3, 6), rgb(39, 92, 148));*/




        /*background: -webkit-linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));
        background: linear-gradient(90deg, rgb(1, 3, 6), rgb(33, 107, 52));*/
/*
background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 23%, rgba(0,151,255,1) 100%, rgba(32,11,195,0.8519607672170431) 100%); 

*/
         }
      </style>
      @yield('after_style')
   </head>
   <body>
         <div id="fb-root"></div>
         <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=331075104258748&autoLogAppEvents=1"></script>
      @yield('alert')
      @include('nav')
      @yield('content')
      @include('footer')
      @yield('script')
   </body>
</html>

