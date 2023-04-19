@extends('layouts.admin.master')
@section('before-css')
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
 <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Cập nhật</h1>
    <ul>
        <li><a href="">Loại sản phẩm</a></li>
        <li>Cập nhật loại sản phẩm</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <p></p>
        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{route('capnhatCN-upd',['MaChiNhanh'=>$chinhanh->MaChiNhanh])}}" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername" class="required">Mã loại sản phẩm *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustomUsername" disabled name="MaChiNhanh" value="{{$chinhanh->MaChiNhanh}}" placeholder="CN-Q6" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Mã loại sản phẩm không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername" class="required">Tên loại sản phẩm *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustomUsername" name="TenChiNhanh" value="{{$chinhanh->TenChiNhanh}}" placeholder="Quận 6, Bình Chánh, etc, ..." aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Tên loại sản phẩm không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số điện thoại 1 *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername"  value="{{$chinhanh->SDT1}}" name="SDT1" placeholder="0909909990" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Số điện thoại 1 không được để trống!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số điện thoại 2 *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" value="{{$chinhanh->SDT2}}" name="SDT2" placeholder="0909909990" aria-describedby="inputGroupPrepend">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số điện thoại 3 *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" value="{{$chinhanh->SDT3}}" name="SDT3" placeholder="0909909990" aria-describedby="inputGroupPrepend">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số FAX</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustomUsername" value="{{$chinhanh->FAX}}" name="FAX" placeholder="309412922" aria-describedby="inputGroupPrepend">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số Momo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustomUsername" value="{{$chinhanh->MoMo}}" name="MoMo" placeholder="0327772310" aria-describedby="inputGroupPrepend">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername" class="required">Số tài khoản (nếu có)</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="validationCustomUsername" value="{{$chinhanh->SoTaiKhoan}}" name="SoTaiKhoan" placeholder="10386900xx" aria-describedby="inputGroupPrepend">
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Địa chỉ</label>
                            <input type="text" class="form-control" id="validationCustom02" value="{{$chinhanh->DiaChi}}" name="DiaChi" placeholder="123 Đường ABC, phường ..." required>
                            <div class="invalid-feedback">
                                Địa chỉ không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Quận/Huyện</label>
                            <input type="text" class="form-control" id="validationCustom03" value="{{$chinhanh->QuanHuyen}}" name="QuanHuyen" placeholder="Quận Cam" required>
                            <div class="invalid-feedback">
                                Quận/Huyện không được để trống!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom05">Tỉnh/Thành phố</label>
                            <input type="text" class="form-control" id="validationCustom05" value="{{$chinhanh->TinhThanh}}" name="TinhThanh" placeholder="TP HCM" required>
                            <div class="invalid-feedback">
                                Tỉnh/Thành phố không được để trống!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12"></div>
                        <div class="form-group col-md-3">
                            <label for="sel">Người quản lý *:</label>
                            <input type="text" class="form-control" id="validationCustom05" value="{{$chinhanh->NguoiQuanLy}}" name="NguoiQuanLy" placeholder="Người Quản Lý" required>
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
