<header id="header" class="header transparent has-transparent has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="masthead" class="header-main show-logo-center hide-for-sticky nav-dark toggle-nav-dark">
            <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="{{ route('homepage') }}" title="ScentSignature" rel="home">
                        <img width="260" height="70" src="{{ asset('assets/images/logo-horizon.png') }}"
                            style="border-radius: 31px 3px 31px 3px;" class="header_logo header-logo"
                            alt="Vani Beauty" />
                        <img width="200" height="70" src="{{ asset('assets/images/logo-horizon.png') }}"
                            style="border-radius: 31px 3px 31px 3px;" class="header-logo-dark" alt="ScentSignature" />
                    </a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color=""
                                class="is-small" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left">
                    {{-- <ul class="header-nav header-nav-main nav nav-left  nav-size-medium nav-uppercase">
                        <li class="header-search header-search-lightbox has-icon">
                            <a href="#search-lightbox" data-open="#search-lightbox" data-focus="input.search-field"
                                class="is-small">
                                <i class="icon-search" style="font-size:16px;"></i>
                                <span class="header-account-title">Tìm kiếm</span></a>
                            <div id="search-lightbox" class="mfp-hide dark text-center">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-large">
                                    <form role="search" method="get" class="searchform" action="">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <input type="search" class="search-field mb-0" name="s" value=""
                                                    placeholder="Tìm kiếm&hellip;" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <!-- .flex-col -->
                                            <div class="flex-col">
                                                <button type="submit"
                                                    class="ux-search-submit submit-button secondary button icon mb-0">
                                                    <i class="icon-search">
                                                    </i>
                                                </button>
                                            </div>
                                            <!-- .flex-col -->
                                        </div>
                                        <!-- .flex-row -->
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul> --}}

                    <ul class="header-nav header-nav-main nav nav-left  nav-size-medium nav-uppercase">
                        <li class="header-search header-search-lightbox has-icon">
                            <a href="https://www.facebook.com/" class="is-small">
                                <i class="icon-facebook" style="font-size:16px;"></i>
                                <span class="header-account-title">Truy cập Fanpage</span></a>
                        </li>
                    </ul>
                </div>
                <!-- Right Elements -->

                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-size-medium nav-uppercase">
                        @if (Auth::check())
                        @if (auth()->user()->LoaiTaiKhoan == 'A' || auth()->user()->LoaiTaiKhoan == 'E' || auth()->user()->LoaiTaiKhoan ==
                        'M')
                        <li class="account-item has-icon active  has-dropdown">
                            <a href="{{ route('homepage') }}" class="account-link account-login" title="Tài khoản">
                                <i class="icon-user" style="font-size:16px;"></i>
                                <span class="header-account-title"> <strong style="font-weight: bold;">{{
                                        auth()->user()->HoTen }}</strong></span>
                            </a>
                            <!-- .account-link -->
                            <ul class="nav-dropdown  nav-dropdown-simple">
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                    <a href="/dashboard"> Trang Quản Lý</a>
                                </li>


                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                    <a href="{{ route('doimk-client-view', ['id' => auth()->user()->id]) }}">Đổi
                                        mật khẩu</a>
                                </li>


                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                    <a href="{{ route('thongtin-client-view', ['id' => auth()->user()->id]) }}">Thông
                                        tin tài khoản</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                    <a href="{{ route('xuly-dangxuat') }}">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="account-item has-icon active  has-dropdown">
                            <a href="{{ route('homepage') }}" class="account-link account-login" title="Tài khoản">
                                <i class="icon-user" style="font-size:16px;"></i>
                                <span class="header-account-title"> <strong style="font-weight: bold;">{{
                                        auth()->user()->HoTen }}</strong></span>
                            </a>
                            <!-- .account-link -->
                            <ul class="nav-dropdown  nav-dropdown-simple">
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                    <a href="{{ route('dsdonhang-view') }}">Đơn hàng</a>
                                </li>


                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                    <a href="{{ route('doimk-client-view', ['id' => auth()->user()->id]) }}">Đổi
                                        mật khẩu</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                    <a href="{{ route('thongtin-client-view', ['id' => auth()->user()->id]) }}">Thông
                                        tin tài khoản</a>
                                </li>
                                <li
                                    class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
                                    <a href="{{ route('xuly-dangxuat') }}">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @else
                        {{-- <p>Người dùng chưa đăng nhập.</p> --}}
                        <li class="account-item has-icon">
                            <a href="#" class="nav-top-link nav-top-not-logged-in " data-open="#login-form-popup">
                                <span>Đăng nhập</span>
                            </a>
                            <!-- .account-login-link -->
                        </li>
                        <span>&nbsp;/&nbsp;</span>
                        <li class="account-item has-icon">
                            <a href="{{ route('dangKyView') }}" class="nav-top-link nav-top-not-logged-in">
                                <span>Đăng ký</span>
                            </a>
                            <!-- .account-sign-link -->
                        </li>
                        @endif
                        @include('layouts.webpage.gio-hang-dropdown')
                    </ul>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="header-search header-search-lightbox has-icon">


                            <div id="search-lightbox" class="mfp-hide dark text-center">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-large">
                                    <form role="search" method="get" class="searchform" action="">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <input type="search" class="search-field mb-0" name="s" value=""
                                                    placeholder="Tìm kiếm&hellip;" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <!-- .flex-col -->
                                            <div class="flex-col">

                                            </div>
                                            <!-- .flex-col -->
                                        </div>
                                        <!-- .flex-row -->
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- .header-inner -->
            <!-- Header divider -->
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <!-- .header-main -->
        <div id="wide-nav" class="header-bottom wide-nav flex-has-center hide-for-medium nav-dark toggle-nav-dark">
            <div class="flex-row container">
                <div class="flex-col hide-for-medium flex-center">
                    <ul class="nav header-nav header-bottom-nav nav-center  nav-size-medium nav-uppercase">
                        <li id="menu-item-24"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-16 current_page_item active  menu-item-24">
                            <a href="" class="nav-top-link">Trang chủ</a>
                        </li>
                        <li id="menu-item-22"
                            class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-22"><a
                                href="{{ route('gioithieu-view') }}" class="nav-top-link">Giới thiệu</a></li>
                        <li id="menu-item-54"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-54 has-dropdown">
                            <a href="{{ route('cuahang-view') }}" class="nav-top-link">Cửa hàng<i
                                    class="icon-angle-down"></i></a>
                            <ul class='nav-dropdown nav-dropdown-simple'>
                                @foreach ($loaiSP as $data)
                                <li id="menu-item-837"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-837">
                                    <a href='../cua-hang?maloai={{ $data->MaLoai }}'>{{ $data->TenLoai }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li id="menu-item-25"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-25"><a
                                href="{{ route('tintuc-view') }}" class="nav-top-link">Tin tức</a></li>
                        <li id="menu-item-23"
                            class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-23"><a
                                href="{{ route('lienhe-view') }}" class="nav-top-link">Liên hệ</a></li>
                    </ul>
                </div>
                <!-- flex-col -->
            </div>
            <!-- .flex-row -->
        </div>
        <!-- .header-bottom -->
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
        <!-- .header-bg-container -->
    </div>
    <!-- header-wrapper-->
</header>
