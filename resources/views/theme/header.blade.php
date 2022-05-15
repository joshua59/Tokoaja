<header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="/" class="standard-logo" data-dark-logo="{{asset('images/mainlg.png')}}">
                        <img src="{{asset('images/mainlogo.png')}}" alt="{{ config('app.name') }}">
                    </a>
                    <a href="#" class="retina-logo" data-dark-logo="{{asset('images/mainlg.png')}}">
                        <img src="{{asset('images/mainlogo.png')}}" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <div class="col md 12" id="logo">
                    <h1>Tokoaja</h1>
                </div>
                <!-- #logo end -->

                <div class="header-misc">

                    <!-- Top Search
                    ============================================= -->
                    <!-- <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                    </div> -->
                    <!-- #top-search end -->

                    <!-- Top Cart
                    ============================================= -->
                    @if(session()->has('user'))
                    <div class="dropdown mx-3 mr-lg-0">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">  <i class="icon-user"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <!-- <a class="dropdown-item text-left" href="#">Profile</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                           <a class="dropdown-item text-left" href="{{ route('profile') }}">Profil <i class="icon-user"></i></a>
                            <!-- <a class="dropdown-item text-left" href="#">Profile</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item text-left" href="{{route('logout')}}">Logout <i class="icon-signout"></i></a>
                        </ul>
                    </div>
                    @endif
                        <!-- #top-cart end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('home')}}"><div>Beranda</div></a>
                        </li>
                        @if(session()->has('user'))
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('home')}}"><div>Orderan Saya</div></a>
                        </li>
                        @if(session()->get('user')->role == 'seller')
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('sellerproduct')}}"><div>Produk Saya</div></a>
                        </li>
                        <li class="menu-item mega-menu">
                            <a class="menu-link" href="{{route('home')}}"><div>Orderan Masuk</div></a>
                        </li>
                        @endif
                        @endif
                        @if(!session()->has('user'))
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('auth')}}"><div>Login</div></a>
                        </li>
                        @endif
                    </ul>

                </nav><!-- #primary-menu end -->

                <form class="top-search-form" action="search.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
