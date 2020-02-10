
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="google-site-verification" content="crkf_-9RUsSJIOL-JaHqe4PvArgwD5mQmqGd4P3bbS8" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Salah satu UPT BMKG yang terletak di Kota Jayapura. Stasiun Geofisika Kelas I Jayapura melakukan pengamatan gempabumi, magnetbumi, listrik udara, dan kualitas udara.">
      <meta name="keywords" content="Gempabumi terkini, Magnetbumi, Listrik Udara, Percepatan Tanah,Berita Gempabumi, Buletin, Siaran Press">
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
         background-color: #23B5C8;          
         }

         nav {
              background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;ckground: linear-gradient(90deg, rgba(0,0,0,1) 23%, rgba(0,151,255,1) 100%, rgba(32,11,195,0.8519607672170431) 100%);
         }
      </style>
      @yield('after_style')
<!--Start of Tawk.to Script-->
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

