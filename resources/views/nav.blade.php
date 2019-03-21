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
{{--                <li class="nav-item active">
                  <a class="nav-link" href="/gempa">Buletin</a>
               </li>  --}}                
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="/gempa" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Gempabumi
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="/gempa/terkini">Gempabumi terkini</a>
                     <a class="dropdown-item" href="/gempa/recentmap">Peta Gempabumi</a>
                     <a class="dropdown-item" href="/gempa/statistik">Statistik</a>
{{--                      <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">Something else here</a> --}}
                  </div>
               </li>
              
            </ul>
            {{--    
            <form class="form-inline my-2 my-lg-0">
               <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            --}}
         </div>
      </nav>