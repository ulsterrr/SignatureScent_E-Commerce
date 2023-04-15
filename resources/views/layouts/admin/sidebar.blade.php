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
                        <a class="{{ Route::currentRouteName()=='quanly-thongtin-nv-View' ? 'open' : '' }}" href="{{ route('quanly-thongtin-nv-View') }}">
                            <i class="nav-icon i-Find-User"></i>
                            <span class="item-name">Danh sách nhân viên</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='them-thongtin-nv-View' ? 'open' : '' }}" href="{{ route('them-thongtin-nv-View') }}">
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
                        <a class="{{ Route::currentRouteName()=='quanlyKH-View' ? 'open' : '' }}" href="{{ route('quanlyKH-View') }}">
                            <i class="nav-icon i-Conference"></i>
                            <span class="item-name">Danh sách Khách hàng</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themKH-View' ? 'open' : '' }}" href="{{ route('themKH-View') }}">
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
                        <a class="{{ Route::currentRouteName()=='quanlyCN-View' ? 'open' : '' }}" href="{{ route('quanlyCN-View') }}">
                            <i class="nav-icon i-Book"></i>
                            <span class="item-name">Danh sách Chi nhánh</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Route::currentRouteName()=='themmoiCN-View' ? 'open' : '' }}" href="{{ route('themmoiCN-View') }}">
                            <i class="nav-icon i-Add"></i>
                            <span class="item-name">Thêm mới Chi nhánh</span>
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

