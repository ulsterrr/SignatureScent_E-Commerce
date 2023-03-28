<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <div class="nav-item" data-item="dashboard">
                <a class="nav-item-hold" href="{{route('dashboard')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>
            <li class="nav-item {{ request()->is('apps/*') ? 'active' : '' }}" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Apps</span>
                </a>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="apps">
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='invoice' ? 'open' : '' }}" href="{{route('invoice')}}">
                    <i class="nav-icon i-Add-File"></i>
                    <span class="item-name">Invoice</span>
                </a>
            </li>

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
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
