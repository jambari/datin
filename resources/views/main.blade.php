
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="google-site-verification" content="crkf_-9RUsSJIOL-JaHqe4PvArgwD5mQmqGd4P3bbS8" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      @yield('meta')
      <meta name="author" content="Jambari">
<!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145443079-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-145443079-1');
      </script>

      @yield('title')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet"> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="shortcut icon" href="https://bmkg.go.id/asset/img/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="{{ asset('css/weather-icons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Cabin|Quicksand&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
crossorigin=""/>

      <style>
        body {
          padding-top: 75px;
          font-family: 'Cabin', serif;
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
         }

      .navbar-toggler-icon {
          background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(50,140,186,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }

      </style>
      @yield('after_style')
<!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
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
</script> -->
<!--End of Tawk.to Script-->

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

