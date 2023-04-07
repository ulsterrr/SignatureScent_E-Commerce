<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item {{ request()->is('dashboard/*') ? 'active' : '' }} {{ request()->is('large-compact-sidebar/dashboard/*') ? 'active' : '' }}" data-item="dashboard">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item {{ request()->is('he-thong/*') ? 'active' : '' }}" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <i class="sidebar-close i-Close" (click)="toggelSidebar()"></i>
        <header>
            <div class="logo">
                <img src="{{asset('assets/images/logo-text.png')}}" alt="">
            </div>
        </header>
        <!-- Submenu Dashboards -->
        <div class="submenu-area" data-parent="dashboard">
            <header>
                <h6>Dashboards</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav" data-parent="dashboard">
                <li class="nav-item ">
                    <a class="{{ Route::currentRouteName()=='dashboard' ? 'open' : '' }}" href="{{route('dashboard')}}">
                        <i class="nav-icon i-Clock-3"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="submenu-area" data-parent="apps">
            <header>
                <h6>Apps</h6>
                <p>Lorem ipsum dolor sit.</p>
            </header>
            <ul class="childNav" data-parent="apps">
                <li class="nav-item dropdown-sidemenu">
                    <a>
                        <i class="nav-icon i-Cash-Register"></i>
                        <span class="item-name">Ecommerce <span class=" ml-2 badge badge-pill badge-danger">New</span></span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a class="{{ Route::currentRouteName()=='ecommerce-products' ? 'open' : '' }}" href="{{route('ecommerce-products')}}">
                                <i class="nav-icon i-Shop-2"></i>
                                <span class="item-name">Products</span>
                            </a>
                        </li>


                        <li>
                            <a class="{{ Route::currentRouteName()=='ecommerce-product-details' ? 'open' : '' }}" href="{{route('ecommerce-product-details')}}">
                                <i class="nav-icon i-Tag-2"></i>
                                <span class="item-name">Product Details</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteName()=='ecommerce-cart' ? 'open' : '' }}" href="{{route('ecommerce-cart')}}">
                                <i class="nav-icon i-Add-Cart"></i>
                                <span class="item-name">Cart</span>
                            </a>
                        </li>

                        <li>
                            <a class="{{ Route::currentRouteName()=='ecommerce-checkout' ? 'open' : '' }}" href="{{route('ecommerce-checkout')}}">
                                <i class="nav-icon i-Cash-register-2"></i>
                                <span class="item-name">Checkout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
