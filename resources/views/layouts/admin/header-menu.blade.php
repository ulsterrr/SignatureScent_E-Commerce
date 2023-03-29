    <div class="main-header">
        <div class="logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="">
        </div>

        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div class="d-flex align-items-center">
            <!-- Mega menu -->
            <div class="dropdown mega-menu d-none d-md-block">
                <a href="#" class="btn text-muted dropdown-toggle mr-3" id="dropdownMegaMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mega Menu</a>
                <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">

                    <div class="col-md-12">
                        <div class="row m-0">
                            <div class="col-md-6 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Tính năng</p>
                                <div class="menu-icon-grid w-auto p-0">
                                    <a href="#"><i class="i-Shop-4"></i> Trang chủ</a>
                                    <a href="#"><i class="i-Library"></i> Tiện ích</a>
                                    <a href="#"><i class="i-Drop"></i> Ứng dụng</a>
                                    <a href="#"><i class="i-Checked-User"></i> Hỗ trợ</a>
                                    <a href="#"><i class="i-Checked-User"></i> Giới thiệu</a>
                                    <a href="#"><i class="i-Ambulance"></i> Liên hệ</a>
                                </div>
                            </div>
                            <div class="col-md-6 p-4">
                                <p class="text-primary text--cap border-bottom-primary d-inline-block">Danh mục</p>
                                <ul class="links">
                                    <li><a href="#">Trang chủ</a></li>
                                    <li><a href="#">Tiện ích</a></li>
                                    <li><a href="#">Ứng dụng</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="#">Trang chủ</a></li>
                                    <li><a href="#">Tiện ích</a></li>
                                    <li><a href="#">Ứng dụng</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Mega menu -->
            <div class="search-bar">
                <input type="text" placeholder="Search">
                <i class="search-icon text-muted i-Magnifi-Glass1"></i>
            </div>
        </div>

        <div style="margin: auto"></div>

        <div class="header-part-right">
            <!-- Full screen toggle -->
            {{-- <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i> --}}
            <!-- Grid menu Dropdown -->
            {{-- <div class="dropdown widget_dropdown">
                    <i class="i-Safe-Box text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="menu-icon-grid">
                            <a href="#"><i class="i-Shop-4"></i> Home</a>
                            <a href="#"><i class="i-Library"></i> UI Kits</a>
                            <a href="#"><i class="i-Drop"></i> Apps</a>
                            <a href="#"><i class="i-File-Clipboard-File--Text"></i> Forms</a>
                            <a href="#"><i class="i-Checked-User"></i> Sessions</a>
                            <a href="#"><i class="i-Ambulance"></i> Support</a>
                        </div>
                    </div>
                </div> --}}
            <!-- Notificaiton -->
            <div class="dropdown">
                <div class="badge-top-container" role="button" id="dropdownNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="badge badge-primary">113</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Thông báo mới</span>
                                <span class="badge badge-pill badge-primary ml-1 mr-1">mới</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">10 sec ago</span>
                            </p>
                            <p class="text-small text-muted m-0">James: Hey! are you busy?</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Receipt-3 text-success mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Thanh toán đơn hàng</span>
                                <span class="badge badge-pill badge-success ml-1 mr-1">mới</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">2 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">1 chai Versace, 10 chai AquaDi Giò</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Empty-Box text-danger mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Sản phẩm hết hàng trong kho</span>
                                <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">10 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">Nước hoa mùi nữ dành cho nam</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Empty-Box text-danger mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Sản phẩm hết hàng trong kho</span>
                                <span class="badge badge-pill badge-danger ml-1 mr-1">3</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">13 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">Nước hoa mùi nam dành cho nữ</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Data-Power text-success mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Có đơn hàng mới!</span>
                                <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">14 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">Bạn nữ xinh đẹp vừa đặt một đơn hàng mới</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Data-Power text-success mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Có đơn hàng mới!</span>
                                <span class="badge badge-pill badge-success ml-1 mr-1">3</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">14 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">Bạn nam xinh đẹp vừa đặt một đơn hàng mới</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Receipt-3 text-success mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Thanh toán đơn hàng</span>
                                <span class="badge badge-pill badge-success ml-1 mr-1">mới</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">2 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">1 chai Versace, 10 chai AquaDi Giò</p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex">
                        <div class="notification-icon">
                            <i class="i-Receipt-3 text-success mr-1"></i>
                        </div>
                        <div class="notification-details flex-grow-1">
                            <p class="m-0 d-flex align-items-center">
                                <span>Thanh toán đơn hàng</span>
                                <span class="badge badge-pill badge-success ml-1 mr-1">mới</span>
                                <span class="flex-grow-1"></span>
                                <span class="text-small text-muted ml-auto">2 giờ trước</span>
                            </p>
                            <p class="text-small text-muted m-0">1 chai Versace, 10 chai AquaDi Giò</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Notificaiton End -->

            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    <img src="{{asset('assets/images/faces/2.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i> Tên tui là ...
                        </div>
                        <a class="dropdown-item">Cài đặt tài khoản</a>
                        <a class="dropdown-item">Cấu hình</a>
                        <a class="dropdown-item" href="{{route('signIn')}}">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- header top menu end -->
