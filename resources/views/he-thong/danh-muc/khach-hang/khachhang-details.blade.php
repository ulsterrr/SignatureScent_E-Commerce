@extends('layouts.admin.master')
@section('title', 'Chi tiết khách hàng')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Thêm mới</h1>
    <ul>
        <li><a href="">Khách hàng</a></li>
        <li>Tạo khách hàng</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <p></p>
        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername" class="required">Tên tài khoản (Email)*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" name="email" placeholder="email@mail.com" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Tên tài khoản (Email) không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername" class="required">Mật khẩu*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="i-Password-Field"></i></span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" name="password" placeholder="********" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Mật khẩu không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername" class="required">Số điện thoại*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" name="SDT" placeholder="0909909990" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Số điện thoại không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="picker3">Ngày sinh</label>
                            <div class="input-group">
                                <input id="picker3" class="form-control" placeholder="Ngày/Tháng/Năm" name="NgaySinh">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Họ và Tên</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Nguyễn Văn A" required>
                            <div class="invalid-feedback">
                                Họ và Tên không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Địa chỉ</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="123 Đường ABC, phường ..." required>
                            <div class="invalid-feedback">
                                Địa chỉ không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Quận/Huyện</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="Quận Cam" required>
                            <div class="invalid-feedback">
                                Quận/Huyện không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05">Tỉnh/Thành phố</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="TP HCM" required>
                            <div class="invalid-feedback">
                                Tỉnh/Thành phố không được để trống!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel">Giới tính*:</label>
                            <select class="form-control" id="sel">
                              <option>Nam</option>
                              <option>Nữ</option>
                              <option>Khác</option>
                            </select>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel1">Loại tài khoản*:</label>
                            <select class="form-control" id="sel1">
                              <option>Khách hàng</option>
                            </select>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel2">Trạng thái*:</label>
                            <select class="form-control" id="sel2">
                                <option>Hoạt động</option>
                                <option>Bị khoá</option>
                                <option>NULL</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3"></div>
                    </div>
                    <button class="btn btn-primary" type="submit">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')


<script src="{{asset('assets/js/form.validation.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>



@endsection

@section('bottom-js')
<script>
    $(document).ready(function(){
        $('#picker2, #picker3').pickadate();
    });
</script>

@endsection
