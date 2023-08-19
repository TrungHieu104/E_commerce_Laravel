<!-- Start Header Area -->
<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <!-- Start Header Top -->
        <div class="header-top header-top-bg--white section-fluid">
            <div class="container-fluid">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="header-top-left">
                        <div
                            class="header-top-contact header-top-contact-color--black header-top-contact-hover-color--aqua">
                            <a href="tel:0123456789" class="icon-space-right"><i class="icon-call-in"></i>0123456789</a>
                            <a href="mailto:cskh@gmail.com" class="icon-space-right"><i
                                    class="icon-envelope"></i>cskh@gmail.com</a>
                        </div>
                    </div>
                    <div class="header-top-center">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="/assets/images/logo/logo_black.png"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->
                    </div>
                    <div class="header-top-right">
                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--aqua">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="/cart">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            {{-- <li>
                                   <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-user"></i>
                                </a>

                               </li> --}}
                            <div class="dropdown-center">
                                {{-- @if (Auth::check())
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                    </button>
                                    {{ Auth::user()->ho }} {{ Auth::user()->ten }}
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/logout">Thoát</a></li>
                                    </ul>
                                @else
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>

                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/login">Login</a></li>
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/register">Register</a></li>
                                    </ul>
                                @endif --}}
                                @if (Auth::check())
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                    </button>
                                    {{ Auth::user()->ho }} {{ Auth::user()->ten }}
                                    <ul class="dropdown-menu">
                                        @if (Auth::user()->vaitro == 1)
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                            href="/profile">Profile</a></li>
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                    href="/admin">Admin</a></li>
                                        @else
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                    href="/profile">Profile</a></li>
                                        @endif
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/logout">Thoát</a></li>
                                    </ul>
                                @else
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/login">Login</a></li>
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/register">Register</a></li>
                                    </ul>
                                @endif

                            </div>


                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Start Header bottom -->
        <div class="header-bottom header-bottom-color--black section-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <!-- Start Header Main Menu -->
                        <div class="main-menu main-menu-style-4 menu-color--white menu-hover-color--aqua">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{ url('/') }}">Home </a>

                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="{{ url('/shop') }}">Shop <i class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner row">
                                                <!-- Mega Menu Sub Link -->
                                                @if (isset($CateHeader))
                                                    <a href="#"
                                                        class="mega-menu-item-title text-center">Collections</a>
                                                    @foreach ($CateHeader as $item)
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a
                                                                        href="{{ url('/shopCate', [$item->id_loai]) }}">{{ $item->ten_loai }}</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <ul class="mega-menu-inner row">
                                                <!-- Mega Menu Sub Link -->
                                                    <a href="#"
                                                        class="mega-menu-item-title text-center">Something</a>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/mostViewed') }}">Most Viewed</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/hotProduct') }}">Hot Product</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/newProduct') }}">New Product</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                            </ul>
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img"
                                                        src="/assets/images/banner/menu-banner.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="/blog">Blog</a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('faq') }}">Frequently Questions</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="{{ url('404') }}">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/aboutus">About Us</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->

        <!-- Start Sticky Header Seperately -->
        <div class="sticky-header sticky-color--white section-fluid seperate-sticky-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="/assets/images/logo/logo_black.png"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--aqua">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{ url('/') }}">Home </a>
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="{{ url('/shop') }}">Shop <i class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner row">
                                                <!-- Mega Menu Sub Link -->
                                                @if (isset($CateHeader))
                                                    <a href="#"
                                                        class="mega-menu-item-title text-center">Collections</a>
                                                    @foreach ($CateHeader as $item)
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a
                                                                        href="{{ url('/shopCate', [$item->id_loai]) }}">{{ $item->ten_loai }}</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                
                                            </ul>
                                            <ul class="mega-menu-inner row">
                                                <!-- Mega Menu Sub Link -->
                                                    <a href="#"
                                                        class="mega-menu-item-title text-center">Something</a>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/mostViewed') }}">Most Viewed</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/hotProduct') }}">Hot Product</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-item col-4 text-center">
                                                            <ul class="mega-menu-sub">
                                                                <li><a href="{{ url('/newProduct') }}">New Product</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                            </ul>
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img"
                                                        src="/assets/images/banner/menu-banner.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="/blog">Blog </a>

                                    </li>
                                    <li class="has-dropdown">
                                        <a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('faq') }}">Frequently Questions</a></li>
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="{{ url('404') }}">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/aboutus">About Us</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--aqua">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/cart')}}">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            {{-- <li>
                                   <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                       <i class="icon-user"></i>
                                   </a>
                               </li> --}}
                            <div class="dropdown-center">
                                @if (Auth::check())
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                    </button>
                                    {{ Auth::user()->ho }} {{ Auth::user()->ten }}
                                    <ul class="dropdown-menu">
                                        @if (Auth::user()->vaitro == 1)
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                            href="/profile">Profile</a></li>
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                    href="/admin">Admin</a></li>
                                        @else
                                            <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                    href="/profile">Profile</a></li>
                                        @endif
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/logout">Thoát</a></li>
                                    </ul>
                                @else
                                    <button class=" " style="font-size: 21px" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="icon-user"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/login">Login</a></li>
                                        <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                                href="/register">Register</a></li>
                                    </ul>
                                @endif

                            </div>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sticky Header Seperately -->
    </div>
</header>
<!-- Start Header Area -->

<!-- Start Mobile Header -->
<div class="mobile-header  mobile-header-bg-color--white section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="{{ url('/') }}">
                                <div class="logo">
                                    <img src="/assets/images/logo/logo_black.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--aqua">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/cart')}}" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        {{-- <li>
                               <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                   <i class="icon-user"></i>
                               </a>
                           </li> --}}
                        <div class="dropdown-center">
                            <button class=" " style="font-size: 21px" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="icon-user"></i>

                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                        href="/login">Login</a></li>
                                <li><a class="dropdown-item" style="letter-spacing: 0px; font-size:15px"
                                        href="/register">Register</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="#"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Layout</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                    <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                    <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                    <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="{{ url('cart') }}">Cart</a></li>
                                    <li><a href="empty-{{ url('cart') }}">Empty Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Product Single</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="{{ url('/shop') }}">Product Default</a></li>
                                    <li><a href="product-details-variable.html">Product Variable</a></li>
                                    <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                    <li><a href="product-details-group.html">Product Group</a></li>
                                    <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                    <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                    <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                    <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                    <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                    <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                    <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Blogs</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Blog Grid</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="blog-grid-sidebar-left.html">Blog Grid Sidebar left</a></li>
                                    <li><a href="blog-grid-sidebar-right.html">Blog Grid Sidebar Right</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="blog-full-width.html">Blog Full Width</a>
                            </li>
                            <li>
                                <a href="#">Blog List</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="blog-list-sidebar-left.html">Blog List Sidebar left</a></li>
                                    <li><a href="blog-list-sidebar-right.html">Blog List Sidebar Right</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Blog Single</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="/blog">Blog Single Sidebar left</a></li>
                                    <li><a href="blog-single-sidebar-right.html">Blog Single Sidebar Right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span>Pages</span></a>
                        <ul class="mobile-sub-menu">
                            <li><a href="{{ url('faq') }}">Frequently Questions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="{{ url('404') }}">404 Page</a></li>
                        </ul>
                    </li>
                    <li><a href="/aboutus">About Us</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="/assets/images/logo/logo_white.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: Your address goes here.</span>
                <span>Call Us: 0123456789, 0123456789</span>
                <span>Email: cskh@gmail.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="wishlist.html">Wishlist</a></li>
                <li><a href="{{ url('cart') }}">Cart</a></li>
                <li><a href="{{ url('checkout') }}">Checkout</a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="/assets/images/logo/logo_white.png" alt=""></a>
        </div>

        <address class="address">
            <span>Address: Your address goes here.</span>
            <span>Call Us: 0123456789, 0123456789</span>
            <span>Email: cskh@gmail.com</span>
        </address>

        <ul class="social-link">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>

        <ul class="user-link">
            <li><a href="wishlist.html">Wishlist</a></li>
            <li><a href="{{ url('cart') }}">Cart</a></li>
            <li><a href="{{ url('checkout') }}">Checkout</a></li>
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Addcart Section -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    {{-- <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Shopping Cart</h4>
        <ul class="offcanvas-cart">
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="/assets/images/product/default/home-1/default-1.jpg" alt=""
                            class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">Car Wheel</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">1 x </span>
                            <span class="offcanvas-cart-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="/assets/images/product/default/home-2/default-1.jpg" alt=""
                            class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">Car Vails</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">3 x </span>
                            <span class="offcanvas-cart-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-cart-item-single">
                <div class="offcanvas-cart-item-block">
                    <a href="#" class="offcanvas-cart-item-image-link">
                        <img src="/assets/images/product/default/home-4/default-1.jpg" alt=""
                            class="offcanvas-cart-image">
                    </a>
                    <div class="offcanvas-cart-item-content">
                        <a href="#" class="offcanvas-cart-item-link">Shock Absorber</a>
                        <div class="offcanvas-cart-item-details">
                            <span class="offcanvas-cart-item-details-quantity">1 x </span>
                            <span class="offcanvas-cart-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-cart-item-delete text-right">
                    <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Subtotal:</span>
            <span class="offcanvas-cart-total-price-value">$170.00</span>
        </div>
        <ul class="offcanvas-cart-action-button">
            <li><a href="{{ url('cart') }}" class="btn btn-block btn-aqua">View Cart</a></li>
            <li><a href="{{ url('checkout') }}" class=" btn btn-block btn-aqua mt-5">Checkout</a></li>
        </ul>
    </div> <!-- End  Offcanvas Addcart Wrapper --> --}}

</div> <!-- End  Offcanvas Addcart Section -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- ENd Offcanvas Header -->

    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-wishlist-wrapper">
        <h4 class="offcanvas-title">Wishlist</h4>
        <ul class="offcanvas-wishlist">
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="/assets/images/product/default/home-1/default-1.jpg" alt=""
                            class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Wheel</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$49.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="/assets/images/product/default/home-2/default-1.jpg" alt=""
                            class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
            <li class="offcanvas-wishlist-item-single">
                <div class="offcanvas-wishlist-item-block">
                    <a href="#" class="offcanvas-wishlist-item-image-link">
                        <img src="/assets/images/product/default/home-4/default-1.jpg" alt=""
                            class="offcanvas-wishlist-image">
                    </a>
                    <div class="offcanvas-wishlist-item-content">
                        <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                        <div class="offcanvas-wishlist-item-details">
                            <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                            <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-wishlist-item-delete text-right">
                    <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                </div>
            </li>
        </ul>
        <ul class="offcanvas-wishlist-action-button">
            <li><a href="#" class="btn btn-block btn-aqua">View wishlist</a></li>
        </ul>
    </div> <!-- End Offcanvas Mobile Menu Wrapper -->

</div> <!-- End Offcanvas Mobile Menu Section -->

<!-- Start Offcanvas Search Bar Section -->
<div id="search" class="search-modal">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-lg btn-aqua">Search</button>
    </form>
</div>
<!-- End Offcanvas Search Bar Section -->
