@extends('layouts.admin.master')
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
        <li><a href="">Đơn hàng</a></li>
        <li>Xử lý đơn hàng</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<section class="chekout-page">
    <form id="form-donhang" method="POST" action="{{ route('taodonhang-add') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Đơn hàng</div>
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
                                                                    <input type="radio" id="LayHang" name="VanChuyen" disabled checked="{{ $DonHang->VanChuyen == 0 }}" value="0" onchange="tinhVanChuyen()" />
                                                                    <span id="FreePhiVanChuyen" name="FreePhiVanChuyen">Nhận tại cửa hàng: 0 VND</span>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="">
                                                                <label class="radio radio-primary">
                                                                    <input type="radio" id="VanChuyen" disabled checked="{{ $DonHang->VanChuyen == 1 }}" name="VanChuyen" value="1" onchange="tinhVanChuyen()" />
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
                            @if ($DonHang->LoaiThanhToan == 'momo')
                            <li class="nav-item">
                                <a class="nav-link active" id="home-basic-tab" data-toggle="tab" href="#momo" role="tab" aria-controls="momotab" aria-selected="true">
                                    <i class="icon-momo text-16 align-middle mr-1"></i>
                                    <span>Ví Momo</span>
                                </a>
                            </li>
                            @endif
                            @if ($DonHang->LoaiThanhToan == 'atm')
                            <li class="nav-item">
                                <a class="nav-link" id="home-basic-tab" data-toggle="tab" href="#homeBasic" role="tab" aria-controls="homeBasic" aria-selected="false">
                                    <i class="i-Credit-Card-2 text-danger text-16 align-middle mr-1"></i>
                                    <span>Chuyển khoản</span>
                                </a>
                            </li>
                            @endif
                            @if ($DonHang->LoaiThanhToan == 'bitcoin')
                            <li class="nav-item">
                                <a class="nav-link" disabled id="contact-basic-tab" data-toggle="tab" href="#contactBasic" role="tab" aria-controls="contactBasic" aria-selected="false">
                                    <i class="i-Bitcoin text-warning text-16 align-middle mr-1"></i>
                                    <span>Bitcoin</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @if ($DonHang->LoaiThanhToan == 'momo')
                            <div class="tab-pane fade show active" id="momo" role="tabpanel" aria-labelledby="momotab">
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
                            @endif
                            @if ($DonHang->LoaiThanhToan == 'atm')
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
                            @endif
                            @if ($DonHang->LoaiThanhToan == 'bitcoin')
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
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row text-right">
                            <div class="col-lg-12 ">
                                <button id="btn-xacnhan" onclick="getDataAndSubmit()" type="button" class="btn btn-success m-1">
                                    Xác nhận đã thanh toán
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
@include('he-thong.ban-hang.don-hang.xuly-xem-donhang')
@endsection
