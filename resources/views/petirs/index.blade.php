<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Data dan Jasa Stasiun Geofisika Kelas I Jayapura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}

.navbar {
  background-color: transparent;
}
</style>
  <body>
    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('video') }}/thunder-ymate.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
  {{-- <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
          <div class="navbar-brand">
      <a class="navbar-item" href="/layanandata" style="padding: 0.5%;">
        <img src="{{ asset('images') }}/logo-bmkg.png" alt="logo" width="35" height="40" >
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu">
        <a class="navbar-item">
          Alur
        </a>

        <a class="navbar-item">
          Tarif
        </a>

        <a class="navbar-item">
          Produk
        </a>
    </div>
    </div>
  </nav> --}}
  <section class="section">
    <div class="container">
      <h1 class="title has-text-centered has-text-white-bis">
        Hello World
      </h1>
      <p class="subtitle has-text-centered has-text-white-bis">
        My first website with <strong>Bulma</strong>!
      </p>
    </div>
  </section>
  </body>
</html>