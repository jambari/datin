      <nav class="navbar navbar-expand-lg navbar-dark  fixed-top">
         <a class="navbar-brand bg-light" href="/" style="padding: 0.5%;" >
         <img src="{{ asset('images') }}/logo-bmkg.png" alt="logo" width="35" height="40" >
         </a>
         <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon "></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link text-light" href="/">Beranda <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link text-light" href="/news">Berita</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link text-light" href="/siarans">Siaran Press</a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/bulletins">Buletin</a>
               </li>                 
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="/gempa" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gempabumi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item " href="/gempa/terkini">Gempabumi terkini</a>
                     <a class="dropdown-item " href="/gempa/recentmap">Peta Gempabumi</a>
                     <a class="dropdown-item " href="/gempa/statistik">Statistik</a>
{{--                      <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a> --}}
                  </div>
               </li>
              
            </ul>
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a href="/about" class="nav-link text-light">Tentang Kami</a>
             </li>
            </ul>
         </div>
      </nav>