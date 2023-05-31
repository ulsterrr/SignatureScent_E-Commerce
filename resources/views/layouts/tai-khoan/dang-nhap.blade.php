@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div class="row row-main">
    <div class="large-12 col" style="margin-top: 3% !important;">
        <div class="col-inner">
            <div class="col-md-12 mb-3">
                <h3 class="uppercase">Đăng nhập</h3>
            </div>
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="account-container lightbox-inner">
                    <div class="account-login-inner">
                        <form class="woocommerce-form woocommerce-form-login login" action="{{ route('xuly-dangnhap') }}" method="post">
                            @csrf
                            <div class="col-md-6">


                                <label for="username">Email&nbsp;<span class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" autocomplete="username" value="" />

                            </div>
                            <div class="col-md-6">


                                <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />

                            </div>

                            <h6 style="color:red;">
                                @if (session('message'))
                                    {{ session('message') }}
                                @endif
                            </h6>
                            <div class="col-md-12">
                                <p class="form-row">
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="ce90bf198c" /><input type="hidden" name="_wp_http_referer" value="/scentsignature/" /> <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Đăng nhập</button>
                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Ghi nhớ mật khẩu</span>
                                    </label>
                                </p>
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="{{ route('quenMatKhauView') }}">Quên mật khẩu?</a>
                                </p>

                                <p class="woocommerce-LostPassword lost_password">
                                    Bạn chưa có tài khoản?
                                    <a href="{{ route('dangKyView') }}">Đăng ký ngay</a>
                                </p>
                            </div>
                        </form>
                    </div>
                    <!-- .login-inner -->
                </div>
                <!-- .account-login-container -->
            </div>
        </div>
        <!-- .col-inner -->
    </div>
    <!-- .large-12 -->
</div>
<style>
    input[type='email'],
    input[type='text'],
    input[type='password'] {
        box-sizing: border-box;
        border: 1px solid #ddd;
        padding: 0 .75em;
        height: 2.507em;
        font-size: .97em;
        border-radius: 0;
        max-width: 100%;
        /* width: 10%; */
        vertical-align: middle;
        background-color: #fff;
        color: #333;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        transition: color .3s, border .3s, background .3s, opacity .3s
    }

</style>
@endsection

