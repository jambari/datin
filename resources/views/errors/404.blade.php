<html>
  <head>
    <title>{{ config('backpack.base.project_name') }} Error 404</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
        background:
        linear-gradient(
        rgba(0, 0, 0, 0.9),
        rgba(0, 0, 0, 0.4)
    ),
    url({{ asset('images/error404.jpg') }});
        background-size: cover;
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
        background-color: #990033;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";       /* IE 8 */
        filter: alpha(opacity=50);  /* IE 5-7 */
        -moz-opacity: 0.2;          /* Netscape */
        -khtml-opacity: 0.5;        /* Safari 1.x */
        opacity: 0.5; 
        text-decoration: weight; 
        padding: 2%;
        border-radius: 1%;
      }

      .title {
        font-size: 156px;
      }

      .quote {
        font-size: 36px;
      }

      .explanation {
        font-size: 24px;

      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content" style="">
        <div class="title">404</div>
        <div class="quote" style="z-index: 1;">Adooh, de pu halaman yang ko cari tra ada !</div>
        <div class="explanation">
          <br>
          <strong style="z-index: 1; text-decoration: weight;">
            <?php
              $default_error_message = "Co kembali ke <a href='".url('')."' style='text-decoration: none; color: white;'>halaman beranda</a>.";
            ?>
            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
         </strong>
       </div>
      </div>
    </div>
  </body>
</html>
