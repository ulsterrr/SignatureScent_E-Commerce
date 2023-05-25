@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div class="row row-main">
    <div class="large-12 col" style="margin-top: 2% !important;">
        <h1 class="uppercase">Đăng ký</h1>
        <div class="col-inner">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="account-container lightbox-inner">
                    <div class="account-login-inner">
                        <form class="woocommerce-form woocommerce-form-login login" action="{{ route('xuly-dangnhap') }}" method="post">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <label for="email">Email đăng nhập&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="email@mail.com" autocomplete="email" value="" />
                                </div>

                                <div class="col-md-6">
                                    <label for="HoTen">Họ Tên&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="HoTen" id="HoTen" autocomplete="HoTen" value="" />
                                </div>

                                <div class="col-md-6">
                                    <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                                    <input type="password" name="password" id="password" autocomplete="current-password" placeholder="********"/>

                                </div>

                                <div class="col-md-6">
                                    <label for="re-password">Nhập lại mật khẩu&nbsp;<span class="required">*</span></label>
                                    <input type="password" name="re-password" id="re-password" autocomplete="re-password" value="" placeholder="********"/>
                                </div>

                                <div class="col-md-3">
                                    <label for="picker3">Ngày sinh&nbsp;<span class="required">*</span></label>
                                    <input id="picker3" type="picker" placeholder="Ngày/Tháng/Năm" name="NgaySinh">
                                </div>

                                <div class="col-md-3">
                                    <label for="sel">Giới tính*:</label>
                                    <select id="sel" name="GioiTinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="SDT">Số điện thoại&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="SDT" id="SDT"/>

                                </div>

                                <div class="col-md-6">
                                    <label for="DiaChi">Địa chỉ&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="DiaChi" id="DiaChi" value="" />

                                </div>

                                <div class="col-md-6">
                                    <label for="QuanHuyen">Quận/Huyện&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="QuanHuyen" id="QuanHuyen"/>

                                </div>

                                <div class="col-md-6">
                                    <label for="TinhThanh">Tỉnh/Thành phố&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="TinhThanh" id="TinhThanh"/>

                                </div>

                            </div>





                            <h6 style="color:red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span class="text-alert"><strong>' . $message . '</strong></span>';
                                    Session::put('message', null);
                                }
                                ?>
                            </h6>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="ce90bf198c" /><input type="hidden" name="_wp_http_referer" value="/scentsignature/" />
                                    <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Đăng ký</button>
                                    <div class="woocommerce-LostPassword lost_password mt-2">
                                        Bạn đã có tài khoản?
                                        <a href="tai-khoan/lost-password/">Đăng nhập</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
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
        /* width: 25%; */
        vertical-align: middle;
        background-color: #fff;
        color: #333;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        transition: color .3s, border .3s, background .3s, opacity .3s
    }


    input[type='picker'] {
        box-sizing: border-box;
        border: 1px solid #ddd;
        padding: 0 .75em;
        height: 2.507em;
        font-size: .97em;
        border-radius: 0;
        max-width: 100%;
        width: 100% !important;
        vertical-align: middle;
        background-color: #fff;
        color: #333;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        transition: color .3s, border .3s, background .3s, opacity .3s
    }

</style>
@endsection

