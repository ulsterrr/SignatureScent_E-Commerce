@extends('layouts.admin.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Cập nhật</h1>
    <ul>
        <li><a href="">Chi nhánh</a></li>
        <li>Cập nhật chi nhánh</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <p></p>
        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation" method="POST"  novalidate action="{{route('capnhatCN-upd',['id'=>$chinhanh->id])}}">
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustomUsername" class="required">Mã chi nhánh *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername" name="MaChiNhanh" value="{{$chinhanh->MaChiNhanh}}" placeholder="CN-Q6" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Mã chi nhánh không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom07" class="required">Người quản lý *:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustom07" name="NguoiQuanLy" value="{{$chinhanh->NguoiQuanLy}}" placeholder="Người Quản Lý" required>
                                    <div class="invalid-feedback">
                                        Người quản lý không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustomUsername" class="required">Tên chi nhánh *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername" name="TenChiNhanh" value="{{$chinhanh->TenChiNhanh}}" placeholder="Quận 6, Bình Chánh, etc, ..." aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Tên chi nhánh không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername" class="required">Số điện thoại 1 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomUsername" name="SDT1" value="{{$chinhanh->SDT1}}" placeholder="0909909990" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Số điện thoại 1 không được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername" class="required">Số điện thoại 2 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomUsername" name="SDT2" value="{{$chinhanh->SDT2}}" placeholder="0909909990" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername2" class="required">Số điện thoại 3 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomUsername2" name="SDT3" value="{{$chinhanh->SDT3}}" placeholder="0909909990" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername3" class="required">Số FAX</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername3" name="FAX" value="{{$chinhanh->FAX}}" placeholder="309412922" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername4" class="required">Số Momo</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername4" name="MoMo" value="{{$chinhanh->MoMo}}" placeholder="0327772310" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustomUsername5" class="required">Số tài khoản (nếu có)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername5" name="SoTaiKhoan" value="{{$chinhanh->SoTaiKhoan}}" placeholder="10386900xx" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom02">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom02" name="DiaChi" value="{{$chinhanh->DiaChi}}" placeholder="123 Đường ABC, phường ..." required>
                                <div class="invalid-feedback">
                                    Địa chỉ không được để trống!
                                </div>
                            </div>

                            <div class="col-md-12"></div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom03">Quận/Huyện</label>
                                <input type="text" class="form-control" id="validationCustom03" name="QuanHuyen" value="{{$chinhanh->QuanHuyen}}" placeholder="Quận Cam" required>
                                <div class="invalid-feedback">
                                    Quận/Huyện không được để trống!
                                </div>
                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom05">Tỉnh/Thành phố</label>
                                <input type="text" class="form-control" id="validationCustom05" name="TinhThanh" value="{{$chinhanh->TinhThanh}}" placeholder="TP HCM" required>
                                <div class="invalid-feedback">
                                    Tỉnh/Thành phố không được để trống!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Cập nhật</button>

                        {{-- <div class="form-row">
                            <div class="col-md-12"></div>
                            <div class="form-group col-md-12">
                                <label for="sel">Người quản lý *:</label>
                                <input type="text" class="form-control" id="validationCustom05" name="NguoiQuanLy" placeholder="Người Quản Lý" required>
                            </div>
                            <div class="col-md-12 mt-3"></div>
                        </div> --}}
                    </div>
                    <div class="col-md-6">
                        HÌNH ẢNH CỬA HÀNG CỦA CHI NHÁNH
                        <div class="input-group mb-3">
                            {{-- <div class="input-group-prepend">
                                <button type="submit" style="width: 75px; border-color: #10163a;" class="btn btn-primary" id="inputGroupFileAddon01">Tải lên</button>
                            </div> --}}
                            <div class="custom-file">
                                <input onchange="loadFile(event)" type="file" class="custom-file-input" name="AnhDaiDien" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile01"><span id="ChooseFile">Chọn ảnh</span></label>
                            </div>
                            @if (!true)
                                <img id="output" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" style="padding: 10px 0px 0px 0px;" class="d-block w-100 -top-3" alt="First slide">
                            @else
                                <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 0px 0px 0px;" class="d-block w-100 -top-3" alt="First slide">
                            @endif
                        </div>
                    </div>
                </form>
            </div>
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
    $(document).ready(function() {
        $('#picker2, #picker3').pickadate();
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#ChooseFile").text(event.target.files[0].name);

    };
</script>
@endsection
