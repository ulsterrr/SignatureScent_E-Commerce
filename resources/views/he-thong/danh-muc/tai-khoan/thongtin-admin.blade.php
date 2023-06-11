@extends('layouts.admin.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/cropper.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Thông tin</h1>
    <ul>
        <li><a href="">Tài khoản</a></li>
        <li>Thông tin</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<!-- content goes here -->

<section class="ul-contact-detail">
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                       @if (session('message'))
                                <div class="alert alert-card alert-success" role="alert">
                                    <strong class="text-capitalize">Success!</strong> {{ session('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                {{-- <img class="d-block w-100" src="{{ asset('assets/images/products/iphone-1.jpg') }}" alt="First slide"> --}}
                @if ($user->AnhDaiDien)
                <img class="d-block w-100" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" alt="Ảnh đại diện">
                @else
                <img class="d-block w-100" src="{{ asset('assets/images/faces/1.jpg') }}" alt="Ảnh đại diện">
                @endif
                <div class="card-body">
                    <div class="ul-contact-detail__info">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Họ và Tên</h5>
                                    <span>{{ $user->HoTen }}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Loại tài khoản</h5>
                                    <span>@if($user->LoaiTaiKhoan=='A')
                                        Admin
                                        @elseif($user->LoaiTaiKhoan=='M')
                                        Quản lý
                                        @elseif($user->LoaiTaiKhoan=='E')
                                        Nhân viên
                                        @elseif($user->LoaiTaiKhoan=='C')
                                        Khách hàng
                                        @elseif($user->LoaiTaiKhoan=='V')
                                        Khách VIP
                                        @endif</span>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Email</h5>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Số điện thoại</h5>
                                    <span>{{ $user->SDT }}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Địa chỉ</h5>
                                    <span>{{ $user->DiaChi }}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">

                                <div class="ul-contact-detail__social">
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-facebook btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Facebook-2"></i></span>
                                        </button>
                                    </div>
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-twitter btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Twitter"></i></span>

                                        </button>
                                    </div>
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-dribble btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Google-Plus"></i></span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-8">
            <!-- begin::basic-tab -->
            <div class="card mb-4 mt-4">
                <div class="card-header bg-transparent">Thông tin</div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active show" id="nav-contact-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">Thay đổi thông tin</a>
                            @if(intval(request()->segment(3))==auth()->user()->id)
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Đổi mật khẩu</a>
                            @endif
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-avt" role="tab" aria-controls="nav-avt" aria-selected="false">Thay đổi ảnh</a>
                           </div>
                    </nav>
                    <div class="tab-content ul-tab__content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            @if (session('message.update'))
                            <div class="alert alert-card alert-success" role="alert">
                                <strong class="text-capitalize">Success!</strong> {{ session('message.update') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form id="upd-admin" method="POST" action="{{route('thongtinTK',['id'=>$user->id])}}">
                                @csrf
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Họ tên</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control" id="HoTen" name = 'HoTen' value="{{$user->HoTen}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" >Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control" id="SDT" name = 'SDT' value="{{$user->SDT}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input  class="form-control" id="Email" name = 'Email' value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="DiaChi" name = 'DiaChi' value="{{$user->DiaChi}}">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-form-label col-sm-2 pt-0">Trạng thái</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="true">
                                                <label class="form-check-label ml-3" for="gridRadios1">
                                                    Hoạt động
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            @if (session('message.password'))
                            <div class="alert alert-card alert-success" role="alert">
                                <strong class="text-capitalize">Success!</strong> {{ session('message.password') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form id="upd-admin-pass" method="POST" action="{{route('doiMK-Amin',['id'=>$user->id])}}">
                                @csrf
                                {{ csrf_field() }}
                                {{-- thông báo lỗi sai pass hiện tại --}}
                                <div class="col-md-12 mt-3">
                                    <div id="alert-card-mk-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
                                        <div class="alert-body-content"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu hiện tại</label>
                                    <div class="col-sm-10">
                                        <input type="password" onfocusout="checkCurrentPassword()" class="form-control" id="inputPassword" name = 'MatKhauHienTai'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword1" name = 'MatKhauMoi'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Nhập lại Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword2" name = 'MatKhauMoi2'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-avt" role="tabpanel" aria-labelledby="nav-avt-tab">
                            <div class="col-md-12 mb-4">
                                <div class="card text-left">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('capnhat-AnhDaiDien', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            {{ csrf_field() }}
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="submit" style="width: 75px; border-color: #10163a;" class="btn btn-primary" id="inputGroupFileAddon01">Tải lên</button>
                                                </div>
                                                <div class="custom-file">
                                                    <input onchange="loadFile(event)" type="file" class="custom-file-input" name="AnhDaiDien" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                                    <label class="custom-file-label" for="inputGroupFile01"><span id="ChooseFile">Chọn ảnh</span></label>
                                                </div>
                                                @if ($user->AnhDaiDien)
                                                    <img id="output" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide">
                                                @else
                                                    <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide">
                                                @endif
                                                {{-- <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide"> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end::basic-tab -->
        </div>
    </div>
</section>


@endsection

@section('page-js')
{{-- <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.script.js')}}"></script> --}}
<script src="{{asset('assets/js/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/cropper.min.js')}}"></script>
<script src="{{asset('assets/js/cropper.script.js')}}"></script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#ChooseFile").text(event.target.files[0].name);

    };

    $(document).ready(function() {
        $("#upd-admin").validate({
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
                , Email: {
                    required: true
                    , email: true
                , }
                , MatKhauHienTai: {
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
                Email: {
                    required: "Vui lòng nhập địa chỉ email"
                    , email: "Địa chỉ email không đúng định dạng"
                , }
                , MatKhauHienTai: {
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
                , HoTen: "Vui lòng nhập họ tên của bạn"
                , DiaChi: "Vui lòng nhập địa chỉ"
                , QuanHuyen: "Vui lòng nhập Quận Huyện"
                , TinhThanh: "Vui lòng nhập Tỉnh Thành",

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
