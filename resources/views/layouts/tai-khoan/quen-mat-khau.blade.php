@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div class="row row-main">
    <div class="large-12 col" style="margin-top: 2% !important;">
        <h1 class="uppercase">Quên mật khẩu</h1>
        <div class="col-inner">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="account-container lightbox-inner">
                    <div class="account-login-inner">
                        <form  id = 'forget-password'class="woocommerce-form woocommerce-form-login login" action="{{ route('themKHC-add') }}" method="POST">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <label for="email">Nhập email đã đăng ký tài khoản&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="email@mail.com" autocomplete="email" value="" />
                                </div>
                            </div>
                            <h6>Chúng tôi sẽ gửi một email xác nhận đến email đã đăng ký của quý khách, quý khách vui lòng kiểm tra email và xác nhận</h6>
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
                                    <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Gửi</button>
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


@section('page-js')


<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>



@endsection

@section('bottom-js')
<script>
    $(document).ready(function() {
      $("#new-khachhang").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: "Vui lòng nhập địa chỉ email",
                email: "Địa chỉ email không đúng định dạng",
            },
        }
      });
    });
  </script>
@endsection
