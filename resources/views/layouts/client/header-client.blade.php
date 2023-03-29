<header id="header" class="header transparent has-transparent has-sticky sticky-jump">
    <div class="header-wrapper">
        <div id="masthead" class="header-main show-logo-center hide-for-sticky nav-dark toggle-nav-dark">
            <div class="header-inner flex-row container logo-center medium-logo-center" role="navigation">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="" title="ScentSignature" rel="home">
                        <img width="200" height="100" src="{{ asset('assets/wp-content/uploads/2019/05/logo-light.png') }}" class="header_logo header-logo" alt="ScentSignature" /><img width="200" height="100" src="{{ asset('assets/wp-content/uploads/2019/05/logo-mona.png')}}" class="header-logo-dark" alt="ScentSignature" /></a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a href="#" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="" class="is-small" aria-controls="main-menu" aria-expanded="false">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left
    ">
                    <ul class="header-nav header-nav-main nav nav-left  nav-size-medium nav-uppercase">
                        <li class="account-item has-icon
">
                            <a href="tai-khoan/" class="nav-top-link nav-top-not-logged-in " data-open="#login-form-popup">
                                <span> Đăng nhập / Đăng ký </span>
                            </a>
                            <!-- .account-login-link -->
                        </li>
                    </ul>
                </div>
                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-size-medium nav-uppercase">
                        <li class="header-search header-search-lightbox has-icon">
                            <a href="#search-lightbox" data-open="#search-lightbox" data-focus="input.search-field" class="is-small">
                                <i class="icon-search" style="font-size:16px;"></i></a>
                            <div id="search-lightbox" class="mfp-hide dark text-center">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-large">
                                    <form role="search" method="get" class="searchform" action="">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm&hellip;" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <!-- .flex-col -->
                                            <div class="flex-col">
                                                <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                                    <i class="icon-search"></i> </button>
                                            </div>
                                            <!-- .flex-col -->
                                        </div>
                                        <!-- .flex-row -->
                                        <div class="live-search-results text-left z-top"></div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item has-icon has-dropdown">
                            <a href="gio-hang/" title="Giỏ hàng" class="header-cart-link is-small">
                                <i class="icon-shopping-basket" data-icon-label="0">
                                </i>
                            </a>
                            <ul class="nav-dropdown nav-dropdown-simple">
                                <li class="html widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.</p>
                                    </div>
                                </li>
                            </ul>
                            <!-- .nav-dropdown -->
                        </li>
                    </ul>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">
                        <li class="header-search header-search-lightbox has-icon">
                            <a href="#search-lightbox" data-open="#search-lightbox" data-focus="input.search-field" class="is-small">
                                <i class="icon-search" style="font-size:16px;"></i></a>
                            <div id="search-lightbox" class="mfp-hide dark text-center">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-large">
                                    <form role="search" method="get" class="searchform" action="">
                                        <div class="flex-row relative">
                                            <div class="flex-col flex-grow">
                                                <input type="search" class="search-field mb-0" name="s" value="" placeholder="Tìm kiếm&hellip;" />
                                                <input type="hidden" name="post_type" value="product" />
                                            </div>
                                            <!-- .flex-col -->
                                            <div class="flex-col">
                                                <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
                                                    <i class="icon-search"></i> </button>
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
                        <li id="menu-item-24" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-16 current_page_item active  menu-item-24"><a href="" class="nav-top-link">Trang chủ</a></li>
                        <li id="menu-item-22" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-22"><a href="gioi-thieu/" class="nav-top-link">Giới thiệu</a></li>
                        <li id="menu-item-54" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children  menu-item-54 has-dropdown"><a href="cua-hang/" class="nav-top-link">Cửa hàng<i class="icon-angle-down"></i></a>
                            <ul class='nav-dropdown nav-dropdown-simple'>
                                <li id="menu-item-837" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-837"><a href="danh-muc/skincare/">Skincare</a></li>
                                <li id="menu-item-838" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-838"><a href="danh-muc/lipstick/">Lipstick</a></li>
                                <li id="menu-item-839" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-839"><a href="danh-muc/gloss/">Gloss</a></li>
                                <li id="menu-item-840" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-840"><a href="danh-muc/nail/">Nail</a></li>
                                <li id="menu-item-841" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-841"><a href="danh-muc/vani-beauty/">ScentSignature</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-25" class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-25"><a href="category/tin-tuc/" class="nav-top-link">Tin tức</a></li>
                        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-23"><a href="lien-he/" class="nav-top-link">Liên hệ</a></li>
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
