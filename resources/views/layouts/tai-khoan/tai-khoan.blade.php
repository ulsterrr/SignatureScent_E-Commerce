@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="row row-main">
        <div class="large-12 col">
            <div class="col-inner">
                <div class="woocommerce">
                    <div class="woocommerce-MyAccount-content">
                        <p>Xin chào <strong>
                                @if (Auth::check())
                                {{ auth()->user()->email }}
                                @endif
                            </strong> (không phải <strong>@if (Auth::check())
                                {{ auth()->user()->email }}
                                @endif</strong>? <a href="{{ route('xuly-dangxuat') }}">Đăng xuất</a>)</p>
                        <p>Từ trang quản lý tài khoản bạn có thể xem <a href="/tai-khoan/orders/">đơn hàng mới</a>, quản lý <a href="/tai-khoan/edit-address/">địa chỉ giao hàng và thanh toán</a>, and <a href="/tai-khoan/edit-account/">sửa mật khẩu và thông tin tài khoản</a>.</p>
                        <ul class="dashboard-links">
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active active">
                                <a href="/tai-khoan/">Bảng điều khiển</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                <a href="/tai-khoan/orders/">Đơn hàng</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--downloads">
                                <a href="/tai-khoan/downloads/">Tải xuống</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
                                <a href="/tai-khoan/edit-address/">Địa chỉ</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                <a href="/tai-khoan/edit-account/">Thông tin tài khoản</a>
                            </li>
                        </ul>
                        <div class="woocommerce-notices-wrapper"></div>
                    </div>
                </div>
            </div>
            <!-- .col-inner -->
        </div>
        <!-- .large-12 -->
    </div>
    <!-- .row -->
</div>

@endsection
