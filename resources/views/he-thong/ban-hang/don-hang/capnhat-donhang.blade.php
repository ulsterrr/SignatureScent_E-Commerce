@extends('layouts.admin.master')
@section('title', 'Cập nhật đơn hàng')
@section('before-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/pickadate/classic.date.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection
@section('page-css')
{{-- load icon momo png --}}
<style>
    .icon-momo {
        display: inline-block;
        /* Điều chỉnh kích thước ảnh */
        width: 17px;
        height: 17px;
        background-image: url("{{ asset('assets/images/MoMo_Logo.png') }}");
        background-repeat: no-repeat;
        background-position: center;
        /* Các thuộc tính khác để điều chỉnh kích thước, padding, v.v. */
        background-size: contain;
    }

</style>
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Thanh toán</h1>
    <ul>
        <li><a href="{{ route('ds-donhang-view') }}">Đơn hàng</a></li>
        <li><span style="color: #00c5ff !important" name="MaDonHang">{{ $DonHang->MaDonHang }}</span></li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<section class="chekout-page">
    <div class="col-md-12 mt-3">
        @if (session('message'))
        <div class="alert alert-card alert-warning" role="alert" style="display: block;">
            <strong class="text-capitalize">Success!</strong> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <!-- Chọn sản phẩm Modal -->
    <div class="col-md-12">
        <div id="sp-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="sp-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sp-modal-Title">Tìm kiếm sảm phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- thông báo lỗi cho modal sản phẩm --}}
                    <div class="col-md-12 mt-3">
                        <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert" style="display: none;">
                            <div class="alert-body-content"></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="table-responsive col-md-12">
                                <table id="ul-sp-list" class="display table">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">Mã sản phẩm</th>
                                            <th style="width: 20%" class="text-center">Tên sản phẩm</th>
                                            <th style="width: 50%">Giá</th>
                                            <th style="width: 30%">Ngày tạo</th>
                                            <th style="width: 50%">Thương hiệu</th>
                                            <th style="width: 50%">Loại sản phẩm</th>
                                            <th style="width: 30%">Quy cách</th>
                                            <th style="width: 30%">Trạng thái</th>
                                            <th style="width: 30%">Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dữ liệu sẽ được load bằng Ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="getDataSPModal()" class="btn btn-primary">Tìm kiếm</button>
                        <button id="selectDataSp" type="button" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Chọn sản phẩm Modal -->
    <!-- Chọn CT sản phẩm Modal -->
    <div class="col-md-12">
        <div id="cn-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="cn-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cn-modal-Title">Tìm kiếm sảm phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- thông báo lỗi cho modal sản phẩm --}}
                    <div class="col-md-12 mt-3">
                        <div id="alert-card-ctsp-modal" class="alert alert-card fade show" role="alert" style="display: none;">
                            <div class="alert-body-content"></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="table-responsive col-md-12">
                                <table id="ul-ctsp-list" class="display table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">Mã sản phẩm</th>
                                            <th style="width: 20%">Mã chi tiết sản phẩm</th>
                                            <th style="width: 30%">Tên sản phẩm</th>
                                            <th style="width: 20%">Số Serial</th>
                                            <th style="width: 20%">Giá</th>
                                            <th style="width: 10%">Quy cách</th>
                                            <th style="width: 120%">Kích cỡ</th>
                                            <th style="width: 20%">Chi nhánh hiện tại</th>
                                            <th style="width: 10%">Tình trạng</th>
                                            <th style="width: 30%">Ghi chú</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Dữ liệu sẽ được load bằng Ajax -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="getDataModal()" class="btn btn-primary">Tìm kiếm</button>
                        <button id="selectData" type="button" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Chọn CT sản phẩm Modal -->
    {{-- Thông báo --}}
    <div class="mt-3">
        <div id="alert-card-check-modal" class="alert alert-card fade show" role="alert" style="display: none;">
            {{-- <strong class="alert-heading text-capitalize"></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
            <div class="alert-body-content"></div>
        </div>
    </div>
    <form id="form-donhang" method="POST" action="{{ route('suadonhang-upd') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Đơn hàng</div>
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">Danh sách sản phẩm đơn hàng</h5>
                            <div class="action-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sp-modal"><i class="i-Add"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table-sanpham" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" name="STT">STT</th>
                                        <th scope="col" name="MSP">Mã sản phẩm</th>
                                        <th scope="col" name="TSP">Tên sản phẩm</th>
                                        <th scope="col" name="Gia">Giá</th>
                                        <th scope="col" name="SoLuongNhap">Số lượng</th>
                                        <th scope="col" name="TongTien">Tổng tiền</th>
                                        <th scope="col" name="del"></th>
                                        <th scope="col" name="SL"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-title">Bán hàng</div>
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">Chi tiết sản phẩm cửa hàng bán</h5>
                            <div class="action-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cn-modal"><i class="i-Add"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table-ctsanpham" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" name="STT">STT</th>
                                        <th scope="col" name="MSP">Mã sản phẩm</th>
                                        <th scope="col" name="MCTSP">Mã CT sản phẩm</th>
                                        <th scope="col" name="TSP">Tên sản phẩm</th>
                                        <th scope="col" name="SoSerial">Số serial</th>
                                        <th scope="col" name="QC">Quy cách</th>
                                        <th scope="col" name="KC">Kích cỡ</th>
                                        <th scope="col" name="TT">Trạng thái</th>
                                        <th scope="col" name="del"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-title">Thông tin giao hàng</div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputtext11" class="ul-form__label">Họ Tên:</label>
                                    <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{ $DonHang->HoTen }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail12" class="ul-form__label">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="SDT" name="SDT" value="{{ $DonHang->SDT }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail12" class="ul-form__label">Email nhận thông báo:</label>
                                    <input type="text" class="form-control" id="Email" name="Email" value="{{ $DonHang->Email }}"/>
                                </div>
                            </div>

                            <div class="custom-separator"></div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="{{ $DonHang->DiaChi }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Quận/Huyện:</label>
                                    <input type="text" class="form-control" id="QuanHuyen" name="QuanHuyen" value="{{ $DonHang->QuanHuyen }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail15" class="ul-form__label">Tỉnh/Thành:</label>
                                    <div class="input-right-icon">
                                        <input type="text" class="form-control" id="TinhThanh" name="TinhThanh" value="{{ $DonHang->TinhThanh }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-separator"></div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputtext14" class="ul-form__label">Ghi chú:</label>
                                    <textarea type="text" class="form-control" id="GhiChu" name="GhiChu">{{ $DonHang->GhiChu }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-lg-12">
                                <div class="ul-product-cart__invoice">
                                    <div class="card-title">
                                        <h4 class="heading text-primary">Tổng tiền thanh toán</h4>
                                    </div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-16">Tổng tiền sản phẩm</th>
                                                <td class="text-16 text-success font-weight-700">
                                                    <span id="TongTienSanPham" name="TongTienSanPham">0</span><span class="pl-1"> VND</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-16">Phí vận chuyển</th>
                                                <td>
                                                    <ul class="list-unstyled mb-0">
                                                        <li>
                                                            <div class="">
                                                                <label class="radio radio-primary" checked="">
                                                                    <input type="radio" id="LayHang" name="VanChuyen" checked="{{ $DonHang->VanChuyen == 0 }}" value="0" onchange="tinhVanChuyen()" />
                                                                    <span id="FreePhiVanChuyen" name="FreePhiVanChuyen">Nhận tại cửa hàng: 0 VND</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="">
                                                                <label class="radio radio-primary">
                                                                    <input type="radio" id="VanChuyen" checked="{{ $DonHang->VanChuyen == 1 }}" name="VanChuyen" value="1" onchange="tinhVanChuyen()" />
                                                                    <span id="PhiVanChuyen" name="PhiVanChuyen">Giao hàng: 15,000 VND</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-primary text-16">
                                                    Nhập mã giảm giá:
                                                </th>
                                                <td>
                                                    <input type="text" class="form-control" id="MaKhuyenMai" name="MaKhuyenMai" value="{{ $DonHang->MaKhuyenMai }}"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-primary text-16">
                                                    Phải thanh toán:
                                                </th>
                                                <td class="font-weight-700 text-16 glyphicon glyphicon-ok">
                                                    <span id="TongTien" name="TongTien">0</span><span class="pl-1"> VND</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-title">Phương thức thanh toán</div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                {{-- <a class="nav-link {{ $DonHang->LoaiThanhToan == 'momo' ? 'active' : '' }}" id="home-basic-tab" data-toggle="tab" href="#momo" role="tab" aria-controls="momotab" aria-selected="true">
                                    <i class="icon-momo text-16 align-middle mr-1"></i>
                                    <span>Ví Momo</span>
                                </a> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $DonHang->LoaiThanhToan == 'atm' ? 'active' : '' }}" id="home-basic-tab" data-toggle="tab" href="#atm" role="tab" aria-controls="homeBasic" aria-selected="false">
                                    <i class="i-Credit-Card-2 text-danger text-16 align-middle mr-1"></i>
                                    <span>Chuyển khoản</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ $DonHang->LoaiThanhToan == 'bitcoin' ? 'active' : '' }}" disabled id="contact-basic-tab" data-toggle="tab" href="#bitcoin" role="tab" aria-controls="contactBasic" aria-selected="false">
                                    <i class="i-Bitcoin text-warning text-16 align-middle mr-1"></i>
                                    <span>Bitcoin</span>
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="momo" role="tabpanel" aria-labelledby="momotab">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button id="btn-xacnhan" type="button" class="btn btn-danger m-1">
                                            Bấm vào đây để nhận mã QR thanh toán!
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="atm" role="tabpanel" aria-labelledby="home-basic-tab">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputtext11" class="ul-form__label">Số tài khoản:</label>
                                        <input type="text" class="form-control" readonly id="inputtext11" value="068933576868" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail12" class="ul-form__label">Tên chủ tài khoản:</label>
                                        <input type="text" class="form-control" readonly id="inputEmail12" value="CAO HOANG GIA KHIEM" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputtext11" class="ul-form__label">Tên ngân hàng:</label>
                                        <input type="text" class="form-control" readonly id="inputtext11" value="Ngân Hàng Sài Gòn Thương Tín Sacombank" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail12" class="ul-form__label">Chi nhánh/PGD:</label>
                                        <input type="text" class="form-control" readonly id="inputEmail12" value="PGD BINH PHU" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bitcoin" role="tabpanel" aria-labelledby="contact-basic-tab">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputtext11" class="ul-form__label">Card Number:</label>
                                        <input type="text" class="form-control" id="inputtext11" value="card number" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail12" class="ul-form__label">Full Name:</label>
                                        <input type="text" class="form-control" id="inputEmail12" value="full name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputtext11" class="ul-form__label">Ex Date:</label>
                                        <input type="text" class="form-control" id="inputtext11" value="dd/mm/yy" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail12" class="ul-form__label">CCV:</label>
                                        <input type="text" class="form-control" id="inputEmail12" value="CVC" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row text-right">
                            <div class="col-lg-12 ">
                                <button id="btn-xacnhan" onclick="getDataAndSubmit()" type="button" class="btn btn-success m-1">
                                    Cập nhật đơn hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection

@section('page-js')
<script src="{{ asset('assets/js/form.validation.script.js') }}"></script>
<script src="{{ asset('assets/js/vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/js/vendor/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
@endsection

@section('bottom-js')
{{-- Gọi phần xử lý đơn hàng, chia file để dễ thuận tiện xử lý tránh code quá dài --}}
@include('he-thong.ban-hang.don-hang.xuly-capnhat-donhang')
@endsection
