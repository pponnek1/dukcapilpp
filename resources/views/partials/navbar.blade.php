<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assetdashboard/img/logo/logo-kab-klaten.png') }}" alt="">
            <h1 class="sitename">DUKCAPIL</h1>
            <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <!-- Home Menu -->
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home<br></a></li>

                <!-- Dropdown Menu -->
                <li class="dropdown">
                    <a href="#"><span>Antrian Online</span> <i class="bi bi-chevron-bar-down"></i></a>
                    <ul>
                        <!-- Registrasi Antrian -->
                        <li><a href="/antrian" class="{{ Request::is('antrian') ? 'active' : '' }}">Registrasi Antrian</a></li>
                        <!-- Daftar Antrian -->
                        <li><a href="/daftar-antrian" class="{{ Request::is('daftar-antrian') ? 'active' : '' }}">List daftar antrian</a></li>
                    </ul>
                </li>

                <!-- Contact Menu -->
                <li><a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
            <!-- Mobile Toggle Button -->
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        @auth
        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hallo, {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
            @if (auth()->check() && auth()->user()->roles === 'admin')
                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            @else
                <li><a class="dropdown-item" href="/antrian/detail">Antrian saya</a></li>
            @endif
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                    <span class="align-middle">Keluar</span>
                </button>
            </form>
        </ul>


        @else
        <a href="/login" class="btn-getstarted">Login</a>
        @endauth


    </div>
</header><!-- End Header -->
