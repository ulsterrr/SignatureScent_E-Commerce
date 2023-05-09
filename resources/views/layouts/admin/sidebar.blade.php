<div id="main-dashboard" class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <div id="btn-dashboard" class="nav-item" data-item="dashboard">
                <a class="nav-item-hold" href="{{route('dashboard')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>
            <li class="nav-item {{ request()->is('he-thong/*') ? 'active' : '' }}" data-item="apps">
                <a class="nav-item-hold" href="#">
                    <i class="nav-icon i-Computer-Secure"></i>
                    <span class="nav-text">Quản lý danh mục</span>
                </a>
            </li>
        </ul>
    </div>

    <div id="sub-dashboard" class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->
        <ul class="childNav" data-parent="apps">
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Checked-User"></i>
                    <span class="item-name">Tài khoản</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">

                    <li>
                        <a class="{{ Route::currentRouteName()=='quanlyTKView' ? 'open' : '' }}" href="{{ route('quanlyTKView') }}">
                            <i class="nav-icon i-Address-Book"></i>
                            <span class="item-name">Danh sách tài khoản</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themTKView' ? 'open' : '' }}" href="{{ route('themTKView') }}">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Thêm mới tài khoản</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Business-Mens"></i>
                    <span class="item-name">Nhân viên</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="{{ Route::currentRouteName()=='quanly-thongtin-nv-view' ? 'open' : '' }}" href="{{ route('quanly-thongtin-nv-view') }}">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Danh sách nhân viên</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='them-thongtin-nv-view' ? 'open' : '' }}" href="{{ route('them-thongtin-nv-view') }}">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Thêm mới nhân viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Business-ManWoman"></i>
                    <span class="item-name">Khách hàng</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">

                    <li>
                        <a class="{{ Route::currentRouteName()=='quanlyKH-view' ? 'open' : '' }}" href="{{ route('quanlyKH-view') }}">
                            <i class="nav-icon i-Conference"></i>
                            <span class="item-name">Danh sách Khách hàng</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themKH-view' ? 'open' : '' }}" href="{{ route('themKH-view') }}">
                            <i class="nav-icon i-Add-User"></i>
                            <span class="item-name">Thêm mới Khách hàng</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Building"></i>
                    <span class="item-name">Chi nhánh</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="{{ Route::currentRouteName()=='quanlyCN-view' ? 'open' : '' }}" href="{{ route('quanlyCN-view') }}">
                            <i class="nav-icon i-Book"></i>
                            <span class="item-name">Danh sách Chi nhánh</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themmoiCN-view' ? 'open' : '' }}" href="{{ route('themmoiCN-view') }}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Thêm mới Chi nhánh</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown-sidemenu">
                <a>
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="item-name">Sản phẩm</span>
                    <i class="dd-arrow i-Arrow-Down"></i>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="{{ Route::currentRouteName()=='qly-loaispham-view' ? 'open' : '' }}" href="{{ route('qly-loaispham-view') }}">
                            <i class="nav-icon i-Library"></i>
                            <span class="item-name">Loại sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='qly-spham-view' ? 'open' : '' }}" href="{{ route('qly-spham-view') }}">
                            <i class="nav-icon i-Dropbox"></i>
                            <span class="item-name">Danh sách sản phẩm</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themSPham-view' ? 'open' : '' }}" href="{{ route('themSPham-view') }}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Nhập mới sản phẩm</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="{{ Route::currentRouteName()=='feedback' ? 'open' : '' }}" href="{{route('feedback')}}">
                    <i class="nav-icon i-Speach-Bubbles"></i>
                    <span class="item-name">Thông tin phản hồi</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->

