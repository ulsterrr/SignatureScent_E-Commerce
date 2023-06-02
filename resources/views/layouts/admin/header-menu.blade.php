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
                                    <a href="{{route('homepage')}}"><i class="i-Shop-4"></i> Trang chủ</a>
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
                                    <li><a href="{{route('homepage')}}">Trang chủ</a></li>
                                    <li><a href="#">Tiện ích</a></li>
                                    <li><a href="#">Ứng dụng</a></li>
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="#">Giới thiệu</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="{{route('homepage')}}">Trang chủ</a></li>
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
                    <span class="badge badge-primary">{{$thongbao->count()}}</span>
                    <i class="i-Bell text-muted header-icon"></i>
                </div>
                <!-- Notification dropdown -->
                <div class="dropdown-menu dropdown-menu-right notification-dropdown rtl-ps-none" aria-labelledby="dropdownNotification" data-perfect-scrollbar data-suppress-scroll-x="true">
                        @foreach ($thongbao as $tb)
                        <a href="{{asset($tb->DuongDan)}}">
                            <div class="dropdown-item d-flex">
                                <div class="notification-icon">
                                    <i class="i-Speach-Bubble-6 text-primary mr-1"></i>
                                </div>
                            <div class="notification-details flex-grow-1">
                                <p class="m-0 d-flex align-items-center">
                                    <span>{{$tb->TieuDe}}</span>
                                    <span class="badge badge-pill badge-primary ml-1 mr-1">{{$tb->TrangThai}}</span>

                                    <span class="text-small text-muted ml-auto">{{$tb->created_at}}</span>
                                </p>
                                <p class="text-small text-muted m-0">{{$tb->NoiDung}}</p>
                            </div>
                            </div>
                        </a>
                        @endforeach
                </div>
            </div>

            <!-- Notificaiton End -->

            <!-- User avatar dropdown -->
            <div class="dropdown">
                <div class="user col align-self-end">
                    @if(Auth::check())
                        <img src="{{ asset('assets/images/faces/' . auth()->user()->AnhDaiDien) }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @else
                        <img src="{{asset('assets/images/faces/2.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @endif

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-header">
                            <i class="i-Lock-User mr-1"></i>
                            @if(Auth::check())
                                {{ auth()->user()->HoTen }}
                            @else
                                Please login
                            @endif
                        </div>
                        <a class="dropdown-item">Cài đặt tài khoản</a>
                        <a class="dropdown-item">Cấu hình</a>
                        <a class="dropdown-item" href="{{route('xuly-dangxuat')}}">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- header top menu end -->
