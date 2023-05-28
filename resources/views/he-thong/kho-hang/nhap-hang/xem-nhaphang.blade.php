@extends('layouts.admin.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Nhập mới</h1>
    <ul>
        <li><a href="">Sản phẩm</a></li>
        <li>Tạo sản phẩm</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form id="new-SP" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Mã phiếu nhập *</label>
                                <input value="{{ $NhapHang->MaPhieuNhap }}" type="text" class="form-control" id="validationCustomUsername" readonly name="MaPhieuNhap" aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="TenChiNhanh" class="required">Chi nhánh:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $NhapHang->getChiNhanh ? $NhapHang->getChiNhanh->TenChiNhanh : '' }}" type="text" class="form-control" id="TenChiNhanh" name="TenChiNhanh" readonly required
                                                aria-describedby="inputGroupCN">
                                        <div class="input-group-append">
                                            <button id="inputGroupCN" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08" class="required">Người nhập *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $NhapHang->NguoiTao }}" type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly required
                                            value="{{ auth()->user() ? auth()->user()->email : null }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        Người nhập được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="MaChiNhanh" class="required">Mã chi nhánh:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $NhapHang->MaChiNhanh ? $NhapHang->MaChiNhanh : '' }}" type="text" readonly class="form-control" id="MaChiNhanh" name="MaChiNhanh" required >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="NQL" class="required">Người quản lý:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $NhapHang->getChiNhanh ? $NhapHang->getChiNhanh->NguoiQuanLy : '' }}" type="text" class="form-control" id="NQL" name="NQL" disabled required aria-describedby="inputGroupQL">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label class="checkbox checkbox-primary" style="margin-top: 2.1rem !important">
                                    <span>Nhập theo lô</span>
                                    @if($NhapHang->LoaiNhap=='NhapLo')
                                        <input checked type="checkbox" id="LoaiNhap" name="LoaiNhap">
                                        <span class="checkmark"></span>
                                    @else
                                        <input type="checkbox" id="LoaiNhap" name="LoaiNhap">
                                        <span class="checkmark"></span>
                                    @endif
                                </label>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="SoLuongNhap" class="required">Số lượng</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->SoLuongNhap }}" type="number" readonly class="form-control" id="SoLuongNhap" name="SoLuongNhap" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="SoLuongSerial" class="required">Tổng số Serial:</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->SoLuongSerial }}" type="number" readonly class="form-control" id="SoLuongSerial" name="SoLuongSerial" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="TongTien" class="required">Tổng số tiền:</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->TongTien }}" type="money" readonly class="form-control" id="TongTien" name="TongTien" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>

                            <div class="col-md-2 mb-3">
                                <label for="VAT" class="required">% VAT *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1">%</span>
                                    </div>
                                    <input value="{{ $NhapHang->VAT }}" type="number" class="form-control" id="VAT" name="VAT" min="0" max="100" onfocusout="tinhGiaVAT()" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="GiaVAT" class="required">Giá VAT</label>
                                <div class="input-group">
                                    <input value="{{ $NhapHang->GiaVAT }}" type="money" readonly class="form-control" id="GiaVAT" name="GiaVAT" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTien" class="required">Giá tiền *</label>
                                <div class="input-group">
                                    <input value="{{ $NhapHang->GiaTien }}" type="money" onfocusout="thayDoiGiaTien()" class="form-control" id="GiaTien" name="GiaTien" min="0" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTienSauThue" class="required">Giá tiền sau thuế</label>
                                <div class="input-group">
                                    <input value="{{ $NhapHang->GiaTienSauThue }}" type="money" readonly class="form-control" id="GiaTienSauThue" name="GiaTienSauThue" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ThuongHieu" class="required">Thương hiệu</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->ThuongHieu }}" type="text" class="form-control" id="ThuongHieu" name="ThuongHieu"  aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustomUsername" class="required">Tên sản phẩm *</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->TenSanPham }}" type="text" class="form-control" id="validationCustomUsername" name="TenSanPham"  aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Tên sản phẩm không được để trống!
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="sel">Loại sản phẩm:</label>
                                <select class="form-control" name="LoaiSanPham" id="sel" class="required" required>
                                    <option selected>{{ $NhapHang->loaiSanPham->TenLoai }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    Loại kích cỡ không được để trống!
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MoTa" class="required">Mô tả</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="3" name="MoTa" id="MoTa">{{ $NhapHang->MoTa }}</textarea>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="GhiChu" class="required">Ghi chú</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="2" name="GhiChu" id="GhiChu">{{ $NhapHang->GhiChu }}</textarea>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="sel">Loại kích cỡ:</label>
                                <select class="form-control" name="LoaiKichCo" id="sel1" class="required" required>
                                    <option selected>{{ $NhapHang->loaiKichCo->TenKichCo }}</option>
                                </select>

                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="KichCo" class="required">Kích cỡ *</label>
                                <div class="form-group">
                                    <input value="{{ $NhapHang->KichCo }}" type="text" class="form-control" id="KichCo" name="KichCo"  aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>
                            <div class="col-md-12"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            HÌNH ẢNH SẢN PHẨM
                            <div class="input-group mb-3">
                                <div disabled>
                                    <input class="custom-file-input" name="HinhAnh" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFileAddon01"><span>{{ $NhapHang->HinhAnh ? $NhapHang->HinhAnh : 'Chọn ảnh' }}</span></label>
                                </div>
                                {{-- <img id="output" src="{{ asset('assets/images/nhap-hang/ . speaker-1.jpg') }}" style="padding: 10px 0px 0px 0px;" onerror="this.classList.add('no-image');" class="d-block w-100 -top-3 no-image"> --}}
                                @if ($NhapHang->HinhAnh)
                                    <img class="d-block w-100" src="{{ asset('assets/images/nhap-hang/' . $NhapHang->HinhAnh) }}" alt="Ảnh sản phẩm">
                                @else
                                    <img class="d-block w-100" src="{{ asset('assets/images/faces/1.jpg') }}" alt="Ảnh sản phẩm">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="SoSerial">Nhập số serial:</label>
                            <textarea id="SoSerial" class="form-control" rows="5" name="SoSerial" onfocusout="tinhSoLuongSerial()">{{ $NhapHang->SoSerial }}</textarea>
                            <div style="padding-left: 5px;"><i>Nhập danh sách số serial được tách bằng dấu (,)</i></div>
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
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>

@endsection

@section('bottom-js')
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.classList.remove('no-image');
        $("#ChooseFile").text(event.target.files[0].name);

    };

    // cho các thẻ vào chế độ readonly
    var elements = document.querySelectorAll('input, textarea').forEach(element => {
        element.readOnly = true;
    });;

</script>
@endsection
