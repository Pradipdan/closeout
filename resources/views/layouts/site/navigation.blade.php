<header id="header" class="header position-relative">
    <!-- Top Bar -->
    {{-- <div class="top-bar py-2">
        <div class="container-fluid container-xl">
            <div class="row align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <div class="top-bar-item">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <span>Need help? Call us: </span>
                        <a href="tel:+1234567890">+1 (234) 567-890</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 text-center">
                    <div
                        class="announcement-slider swiper init-swiper swiper-initialized swiper-vertical swiper-backface-hidden">
                        <script type="application/json" class="swiper-config">
                            {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": 1,
                  "direction": "vertical",
                  "effect": "slide"
                }
                        </script>
                        <div class="swiper-wrapper" id="swiper-wrapper-51ab876e07b105ded" aria-live="off"
                            style="transition-duration: 0ms; transform: translate3d(0px, -48px, 0px); transition-delay: 0ms;">



                            <div class="swiper-slide swiper-slide-next" style="height: 24px;" role="group"
                                aria-label="1 / 3" data-swiper-slide-index="0">🚚 Free shipping on orders over $50
                            </div>
                            <div class="swiper-slide swiper-slide-prev" style="height: 24px;" role="group"
                                aria-label="2 / 3" data-swiper-slide-index="1">💰 30 days money back guarantee.
                            </div>
                            <div class="swiper-slide swiper-slide-active" role="group" aria-label="3 / 3"
                                data-swiper-slide-index="2" style="height: 24px;">🎁 20% off on your first order
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="d-flex justify-content-end">
                        <div class="top-bar-item dropdown me-3">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-translate me-2"></i>EN
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-check2 me-2 selected-icon"></i>English</a></li>
                                <li><a class="dropdown-item" href="#">Español</a></li>
                                <li><a class="dropdown-item" href="#">Français</a></li>
                                <li><a class="dropdown-item" href="#">Deutsch</a></li>
                            </ul>
                        </div>
                        <div class="top-bar-item dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-currency-dollar me-2"></i>USD
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-check2 me-2 selected-icon"></i>USD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                                <li><a class="dropdown-item" href="#">GBP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Main Header -->
    <div class="main-header">
        <div class="container-fluid container-xl">
            <div class="d-flex py-2 align-items-center justify-content-between">

                <!-- Logo -->
                <a href="{{ route('site.index') }}" class="logo d-flex align-items-center">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="{{ asset('site/images/logo_fav.png') }}" alt="">
                    {{-- <h1 class="sitename">eStore</h1> --}}
                </a>

                <!-- Search -->
                <form class="search-form desktop-search-form">
                    <div class="input-group">
                        <input type="text" class="form-control nav_search_input"
                            placeholder="Search With Asin, Name or UPC">
                        <button class="nav_search_btn btn" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Actions -->
                <div class="header-actions d-flex align-items-center nav_links nav_fonts">

                    @if (auth()->user())
                        {{-- <a href="/logout" class="">Logout</a> --}}
                    @else
                        <a href="/sign-in" class="">Sign Up</a>
                    @endif
                    <a href="#" class="">Register To Shop </a>
                    <a href="#" class="">Sell To Us</a>
                    <a href="#" class="">Company Info</a>

                    <!-- Mobile Search Toggle -->
                    <button class="header-action-btn mobile-search-toggle d-xl-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false"
                        aria-controls="mobileSearch">
                        <i class="bi bi-search"></i>
                    </button>

                    @php
                        $cartKey = auth()->id() . '_cart_items'; // Assuming the user ID is used in session key
                        $cart = session($cartKey);
                        $totalItems = $cart ? count($cart->toArray()) : 0;
                    @endphp

                    <!-- Cart Icon with Badge -->
                    @if (Auth::user())
                        <div class="dropdown account-dropdown">
                            <a href="{{ route('cart.show') }}" class="header-action-btn" id="cart-icon">
                                <i class="bi bi-cart cart_icon"></i>
                                @if ($totalItems > 0)
                                    <span class="cart-count badge bg-danger">{{ $totalItems }}</span>
                                @endif
                            </a>
                            <a href="{{ route('home.profile') }}" class="header-action-btn" id="icon">
                                <i class="bi bi-person-lines-fill cart_icon"></i>
                            </a>
                        </div>
                    @endif


                    <!-- Mobile Navigation Toggle -->
                    <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>

                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    {{-- <div class="header-nav">
        <div class="container-fluid container-xl">
            <div class="position-relative">
                <nav id="navmenu" class="navmenu d-flex justify-content-center nav_fonts">
                    <ul>
                        <li><a href="/" class="active">Home</a></li>
                        <li><a href="{{ route('get_all_site_products') }}">Products</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div> --}}


    <div class="header-nav">
        <div class="container-fluid container-xl">
            <div class="position-relative">
                <nav id="navmenu" class="navmenu d-flex justify-content-center nav_fonts">
                    <ul>
                        <li>
                            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('get_all_site_products') }}"
                                class="{{ request()->routeIs('get_all_site_products') ? 'active' : '' }}">Products</a>
                        </li>
                        <li>
                            <a href="{{ route('get_all_site_categories') }}"
                                class="{{ request()->routeIs('get_all_site_categories') ? 'active' : '' }}">Categories</a>
                        </li>
                        <li>
                            <a href="">About Us</a>
                        </li>
                        <li>
                            <a href="">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
        <div class="container">
            <form class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <button class="btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

</header>
