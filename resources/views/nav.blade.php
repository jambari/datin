      <nav class="navbar navbar-expand-lg fixed-top" style="background-image: url(./images/indonesia-maju.jpeg); background-size: cover;" >
         <a class="navbar-brand" href="/" style="padding: 0.5%; background: white;" >
         <img src="{{ asset('images') }}/logo-bmkg.png" alt="logo" width="35" height="40" >
         </a>
         <button class="navbar-toggler  " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link text-white" href="/">Beranda <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/news">Berita</a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/siarans">Siaran Press</a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/bulletins">Buletin</a>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/populer">Sains</a>
               </li>                  
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="/gempa" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gempabumi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item " href="/gempa/terkini">Gempabumi terkini</a>
                     <a class="dropdown-item " href="/gempa/recentmap">Peta Gempabumi</a>
                     <a class="dropdown-item " href="/gempa/statistik">Statistik</a>
                     <a class="dropdown-item " href="/kegempaan">Review Seismisitas</a>
{{--                      <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a> --}}
                  </div>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/magnet">Magnetbumi</a>
               </li>        
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Listrik Udara
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item " href="http://36.91.166.187/angkasa/" target="_blank" >Realtime</a>
                  </div>
               </li>
               <li class="nav-item ">
                  <a class="nav-link text-white" href="/layanandata">Layanan Data dan Jasa</a>
               </li>  
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Media 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item " href="https://www.youtube.com/channel/UCS5S4ImDRZmuC80EzvqKU6A" target="_blank" >Youtube</a>
                  </div>
               </li>
              
            </ul>
           <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
               <a href="/rasagempa" class="nav-link btn btn-outline-primary">Rasa Gempa ?</a>
            </li>
             <li class="nav-item">
               <a href="/about" class="nav-link text-white">Tentang Kami</a>
             </li>
            </ul>
         </div>
      </nav>