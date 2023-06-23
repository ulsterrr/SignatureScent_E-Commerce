@extends('layouts.webpage.webpage')
@section('title', 'Tài khoản')
@section('main-content')
<div class="row row-main">
    <div class="large-12 col" style="margin-top: 2% !important;">
        <h1 class="uppercase">Thông Tin Tài Khoản</h1>
        <div class="col-inner">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                {{-- thông báo lỗi trùng email --}}
                <div class="col-md-12 mt-3">
                    <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
                        <div class="alert-body-content"></div>
                    </div>
                </div>
                <div class="account-container lightbox-inner">
                    <div class="account-login-inner">
                        <form id="new-khachhang" class="woocommerce-form woocommerce-form-login login" action="{{route('thongtin-client',['id'=>$user->id])}}" method="post">
                            @csrf
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <label for="email">Email đăng nhập&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="email" id="email" placeholder="email@mail.com" autocomplete="email" value="{{$user->email}}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="HoTen">Họ Tên&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="HoTen" id="HoTen" autocomplete="HoTen" value="{{$user->HoTen}}" />
                                </div>
                                <div class="col-md-3">
                                    <label for="picker3">Ngày sinh&nbsp;<span class="required">*</span></label>
                                    <input id="picker3" type="picker" placeholder="Ngày/Tháng/Năm" name="NgaySinh" value="{{$user->NgaySinh}}">
                                </div>

                                <div class="col-md-3">
                                    <label for="sel">Giới tính*:</label>
                                    <select id="sel" name="GioiTinh" >
                                        <option value="{{$user->GioiTinh}}">Nam</option>
                                        <option value="{{$user->GioiTinh}}">Nữ</option>
                                        <option value="{{$user->GioiTinh}}">Khác</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="SDT">Số điện thoại&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="SDT" id="SDT" value="{{$user->SDT}}"/>
                                </div>

                                <div class="col-md-6">
                                    <label for="DiaChi">Địa chỉ&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="DiaChi" id="DiaChi" value="{{$user->DiaChi}}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="QuanHuyen">Quận/Huyện&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="QuanHuyen" id="QuanHuyen" value="{{$user->QuanHuyen}}" />
                                </div>

                                <div class="col-md-6">
                                    <label for="TinhThanh">Tỉnh/Thành phố&nbsp;<span class="required">*</span></label>
                                    <input type="text" name="TinhThanh" id="TinhThanh" value="{{$user->TinhThanh}}" />
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
                                    <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Thay đổi</button>
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
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                NgaySinh: "required"
                , SDT: {
                    required: true
                    , number: true
                    , rangelength: [10, 11]
                , }
                , email: {
                    required: true
                    , email: true
                , }
                , password: {
                    required: true
                    , minlength: 6
                , }
                , repassword: {
                    required: true
                    , equalTo: "#password"
                , }
                , HoTen: "required"
                , DiaChi: "required"
                , QuanHuyen: "required"
                , TinhThanh: "required",

            }
            , messages: {
                NgaySinh: "Vui lòng chọn ngày sinh"
                , SDT: {
                    required: "Vui lòng nhập số điện thoại"
                    , number: "SDT không đúng định dạng"
                    , rangelength: "Chiều dài SDT từ 10 đến 11 số"
                , }, // thiếu chỗ này
                email: {
                    required: "Vui lòng nhập địa chỉ email"
                    , email: "Địa chỉ email không đúng định dạng"
                , }
                , password: {
                    required: "Vui lòng nhập mật khẩu"
                    , minlength: "Mật khẩu phải có ít nhất 6 ký tự"
                , }
                , repassword: {
                    required: "Vui lòng nhập lại mật khẩu"
                    , equalTo: "Mật khẩu nhập lại không khớp"
                , }
                , HoTen: "Vui lòng nhập họ tên của bạn"
                , DiaChi: "Vui lòng nhập địa chỉ"
                , QuanHuyen: "Vui lòng nhập Quận Huyện"
                , TinhThanh: "Vui lòng nhập Tỉnh Thành",

            }
        });
    });

    function checkMaiUnique() {
        var fieldValue = $('#email').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kiemtra-email') }}"
            , method: 'POST'
            , data: {
                email: fieldValue, // Đặt giá trị của $recordId tương ứng với bản ghi hiện tại
                _token: token
            }
            , success: function(response) {
                if (response.valid) {
                    // Giá trị đã tồn tại, có lỗi
                    $('#alert-card-sp-modal').css('display', '');
                    $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-sp-modal .alert-body-content').html(`Email: ${fieldValue} đã có thông tin tài khoản trong hệ thống.`);
                    $('#alert-card-sp-modal').fadeIn(100);
                } else {
                    // Giá trị là duy nhất, không có lỗi
                    $('#alert-card-sp-modal').css('display', 'none');
                }
            }
        });
    };
</script>
@endsection

