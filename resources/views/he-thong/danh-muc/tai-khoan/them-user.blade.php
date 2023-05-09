@extends('layouts.admin.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Thêm mới</h1>
    <ul>
        <li><a href="">Tài khoản</a></li>
        <li>Tạo tài khoản</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <p></p>
        <div class="card mb-4">
            <div class="row">
                @if (session('message'))
                    <div class="alert alert-card alert-success" role="alert">
                        <strong class="text-capitalize">Success!</strong> {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            {{-- <ul class="alert text-danger">
                @foreach ( $errors -> all() as $error  )
                    <li>{{$error}}</li>
                @endforeach
            </ul> --}}
            <div class="card-body">
                <form id="new-user" action="{{ route('themTK-add') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername1" class="required">Tên tài khoản (Email) *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="email@mail.com" required>
                                {{-- <div class="invalid-feedback">
                                    Tên tài khoản (Email) không được để trống!
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername2" class="required">Mật khẩu *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="i-Password-Field"></i></span>
                                </div>
                                <input type="password" class="form-control" id="validationCustomUsername2" name="password" placeholder="********" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Mật khẩu không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername3" class="required">Số điện thoại *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername3" name="SDT" placeholder="0909909990" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Số điện thoại không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="picker3">Ngày sinh</label>
                            <div class="input-group">
                                <input id="picker3" class="form-control" placeholder="Ngày/Tháng/Năm" name="NgaySinh" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Họ và Tên</label>
                            <input type="text" class="form-control" name="HoTen" id="validationCustom01" placeholder="Nguyễn Văn A" required>
                            <div class="invalid-feedback">
                                Họ và Tên không được để trống!
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Địa chỉ</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="DiaChi" id="validationCustom02" placeholder="123 Đường ABC, phường ..." required>
                            </div>
                            <div class="invalid-feedback">
                                Địa chỉ không được để trống!
                            </div>

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Quận/Huyện</label>
                            <input type="text" class="form-control" name="QuanHuyen" id="validationCustom03" placeholder="Quận Cam" required>
                            <div class="invalid-feedback">
                                Quận/Huyện không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05">Tỉnh/Thành phố</label>
                            <input type="text" class="form-control" name="TinhThanh" id="validationCustom05" placeholder="TP HCM" required>
                            <div class="invalid-feedback">
                                Tỉnh/Thành phố không được để trống!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel">Giới tính *:</label>
                            <select class="form-control" name="GioiTinh" id="sel">
                              <option value="M">Nam</option>
                              <option value="F">Nữ</option>
                              <option value="U">Khác</option>
                            </select>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel1">Loại tài khoản *:</label>
                            <select class="form-control" name="LoaiTaiKhoan" id="sel1">
                              <option value="A">Admin</option>
                              <option value="M">Quản lý</option>
                              <option value="E">Nhân viên</option>
                              <option value="C">Khách hàng</option>
                            </select>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-2">
                            <label for="sel2">Trạng thái *:</label>
                            <select class="form-control" name="TrangThai" id="sel2">
                                <option  value="1">Hoạt động</option>
                              <option  value="0">Bị khoá</option>
                              <option value="">NULL</option>
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
        $('#picker2, #picker3').pickadate({
            selectMonths: true,
            selectYears:true,
        });
    });
</script>

<script>
    $(document).ready(function() {
      $("#new-user").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            name: "Vui lòng nhập họ tên của bạn",
            email: {
                required: "Vui lòng nhập địa chỉ email",
                email: "Địa chỉ email không đúng định dạng"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 6 ký tự"
            }
        }
      });
    });
  </script>
@endsection
