 

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="/"><img src="/assets/img/logo.png" alt=""></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Home</a></li>
          <li class="dropdown"><a href="#"><span>Antrian Online</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/antrian">Ambil Antrian</a></li>
              <li><a href="/daftar-antrian">Daftar Antrian</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="/contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      @auth
        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hallo, {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
              @if (auth()->user()->roles === 'admin')
                  <li><a class="dropdown-item" href="/dashboard">Dashboard </a></li>
              @else
                  <li><a class="dropdown-item" href="/antrian/detail">Antrian Saya </a></li>
              @endif    
              
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <span class="align-middle">Keluar</span>
                  </button>
                </form>
        </ul>

      @else
        <a href="/login" class="get-started-btn scrollto">Login</a>
      @endauth


    </div>
  </header><!-- End Header -->