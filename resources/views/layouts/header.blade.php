<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('home.index') }}"><img src="{{url('')}}/assets/img/logo.webp" alt="" style="width:150px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a class="nav-link dropdown-toggle"  href="{{ route('home.product') }}">Shop</a>
                            <ul class="dropdown-menu">
                                @foreach($catsGlobal as $cat)
                                <li class="nav-item"><a class="nav-link" href="{{route('home.category', $cat->id)}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="">Blog</a></li>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="{{ route('home.login') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('home.login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('home.register') }}">Register</a>
                                </li>
                            </ul>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    @if (auth('cus')->check())
                                    <a class="nav-link" href="{{route('home.profile')}}">Hi {{auth('cus')->user()->name}}</a>
                                <li class="nav-item"><a class="nav-link" href="{{route('home.logout')}}">Logout</a></li>
                                @else

                                @endif
                        </li>
                    </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{route('cart.view')}}" class="cart"><span class="ti-bag"></span></a></li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- End Header Area -->