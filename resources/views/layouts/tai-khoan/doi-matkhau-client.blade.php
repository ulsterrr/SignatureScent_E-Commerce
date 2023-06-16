@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div class="row row-main">
    <div class="large-12 col" style="margin-top: 2% !important;">
        <h1 class="uppercase">Đổi mật khẩu</h1>
        <div class="col-inner">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="col-md-12 mt-3">
                    <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
                        <div class="alert-body-content"></div>
                    </div>
                </div>
                <div class="account-container lightbox-inner">
                    <div class="account-login-inner">
                        <form id="upd-pass" class="woocommerce-form woocommerce-form-login login" action="{{ route('doimk-client',['id'->$user->id]) }}" method="POST">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <label for="password">Mật khẩu hiện tại&nbsp;<span class="required">*</span></label>
                                    <input type="password" onfocusout="checkCurrentPassword()" class="form-control" id="inputPassword" name = 'MatKhauHienTai'>
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Mật khẩu mới&nbsp;<span class="required">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword1" name = 'MatKhauMoi'>
                                </div>

                                <div class="col-md-6">
                                    <label for="repassword">Nhập lại mật khẩu mới&nbsp;<span class="required">*</span></label>
                                    <input type="password" class="form-control" id="inputPassword2" name = 'MatKhauMoi2'>
                                </div>
                            </div>

                            <h6 style="color:red;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span class="text-alert mt-3"><strong>' . $message . '</strong></span>';
                                    Session::put('message', null);
                                }
                                ?>
                            </h6>

                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="ce90bf198c" /><input type="hidden" name="_wp_http_referer" value="/scentsignature/" />
                                    <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Xác nhận</button>
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
        $("#upd-pass").validate({
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                MatKhauHienTai: {
                    required: true
                    , minlength: 6
                , }
                , MatKhauMoi: {
                    required: true
                    , minlength: 6
                , }
                , MatKhauMoi2: {
                    required: true
                    , equalTo: "#MatKhauMoi"
                , }
            }
            , messages: {
                 MatKhauHienTai: {
                    required: "Vui lòng nhập mật khẩu"
                    , minlength: "Mật khẩu phải có ít nhất 6 ký tự"
                , }
                , MatKhauMoi: {
                    required: "Vui lòng nhập mật khẩu"
                    , minlength: "Mật khẩu phải có ít nhất 6 ký tự"
                , }
                , MatKhauMoi2: {
                    required: "Vui lòng nhập lại mật khẩu"
                    , equalTo: "Mật khẩu nhập lại không khớp"
                , }
            }
        });
    });

    function checkCurrentPassword() {
        var fieldValue = $('#inputPassword').val();
        var id = "{!! auth()->user()->id !!}"
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kiemtra-matkhau') }}"
            , method: 'POST'
            , data: {
                passwordcurrent: fieldValue, // Đặt giá trị của mật khẩu hiện tại
                userid: id,
                _token: token
            }
            , success: function(response) {
                if (response.valid) {
                    // Giá trị đã tồn tại, có lỗi
                    $('#alert-card-mk-modal').css('display', '');
                    $('#alert-card-mk-modal').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-mk-modal .alert-body-content').html(`Mật khẩu hiện tại không đúng.`);
                    $('#alert-card-mk-modal').fadeIn(100);
                } else {
                    // Giá trị là duy nhất, không có lỗi
                    $('#alert-card-mk-modal').css('display', 'none');
                }
            }
        });
    };

</script>
@endsection

