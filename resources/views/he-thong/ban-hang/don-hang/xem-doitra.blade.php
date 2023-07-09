@extends('layouts.admin.master')
@section('title', 'Đổi trả sản phẩm đơn hàng')
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
    <h1>Đổi trả</h1>
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

    {{-- Thông báo --}}
    <div class="mt-3">
        <div id="alert-card-check-modal" class="alert alert-card fade show" role="alert" style="display: none;">
            <div class="alert-body-content"></div>
        </div>
    </div>
    <form id="form-doitra" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-title">Thông tin đơn hàng</div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputtext11" class="ul-form__label">Họ Tên:</label>
                                    <input type="text" readonly class="form-control" id="HoTen" name="HoTen" value="{{ $DonHang->HoTen }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail12" class="ul-form__label">Số điện thoại:</label>
                                    <input type="text" readonly class="form-control" id="SDT" name="SDT" value="{{ $DonHang->SDT }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail12" class="ul-form__label">Email nhận thông báo:</label>
                                    <input type="text" readonly class="form-control" id="Email" name="Email" value="{{ $DonHang->Email }}"/>
                                </div>
                            </div>

                            <div class="custom-separator"></div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Địa chỉ:</label>
                                    <input type="text" readonly class="form-control" id="DiaChi" name="DiaChi" value="{{ $DonHang->DiaChi }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Quận/Huyện:</label>
                                    <input type="text" readonly class="form-control" id="QuanHuyen" name="QuanHuyen" value="{{ $DonHang->QuanHuyen }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail15" class="ul-form__label">Tỉnh/Thành:</label>
                                    <div class="input-right-icon">
                                        <input type="text" readonly class="form-control" id="TinhThanh" name="TinhThanh" value="{{ $DonHang->TinhThanh }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-separator"></div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Phí vận chuyển:</label>
                                    <input type="text" readonly class="form-control" id="PhiVanChuyen" name="PhiVanChuyen" value="{{ number_format($DonHang->VanChuyen=='1'?15000:0, 0, ',', '.') }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputtext14" class="ul-form__label">Giảm giá:</label>
                                    <input type="text" readonly class="form-control" id="GiaGia" name="GiamGia" value="{{ number_format($TienGiam, 0, ',', '.') }}"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail15" class="ul-form__label">Tổng tiền đơn:</label>
                                    <div class="input-right-icon">
                                        <input type="text" readonly class="form-control" id="TongTien" name="TongTien" value="{{ number_format($DonHang->TongTien, 0, ',', '.') }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-separator"></div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputtext14" class="ul-form__label">Ghi chú:</label>
                                    <textarea type="text" readonly class="form-control" id="GhiChu" name="GhiChu">{{ $DonHang->GhiChu }}</textarea>
                                </div>
                            </div>

                            <div class="custom-separator"></div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="DoiTra">Loại đổi trả *:</label>
                                    <select class="form-control" name="DoiTra" id="DoiTra" required>
                                        <option selected value="{{ $DonHang->DoiTra }}">{{ $DonHang->DoiTra == 'TRA' ? 'Trả hàng' : 'Đổi mới'}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="LyDoDoiTra">Lý do đổi trả:</label>
                                    <textarea type="text" class="form-control" id="LyDoDoiTra" name="LyDoDoiTra">{{ $DonHang->LyDoDoiTra }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">Chi tiết sản phẩm đơn hàng</h5>
                            <div class="action-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cn-modal-ban"><i class="i-Add"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table-ctsanpham-ban" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" name="STT">STT</th>
                                        <th scope="col" name="MSP">Mã sản phẩm</th>
                                        <th scope="col" name="MCTSP">Mã CT sản phẩm</th>
                                        <th scope="col" name="TSP">Tên sản phẩm</th>
                                        <th scope="col" name="SoSerial">Số serial</th>
                                        <th scope="col" name="QC">Quy cách</th>
                                        <th scope="col" name="KC">Kích cỡ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ChiTietBan as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $item->getCTHienTai->chiTietCuaSanPham->MaSanPham }}</td>
                                        <td class="text-center">{{ $item->ChiTietSPHienTai }}</td>
                                        <td class="text-center">{{ $item->getCTHienTai->chiTietCuaSanPham->TenSanPham }}</td>
                                        <td class="text-center">{{ $item->getCTHienTai->SoSerial }}</td>
                                        <td class="text-center">{{ $item->getCTHienTai->chiTietCuaSanPham->loaiKichCo->TenKichCo }}</td>
                                        <td class="text-center">{{ $item->getCTHienTai->KichCo }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-4" id="card-doi" {{ $DonHang->DoiTra == 'TRA' ? 'style="display: none"' : '' }}>
                    <div class="card-body">
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">Chi tiết sản phẩm đổi</h5>
                            <div class="action-button">
                                <button id="btn-doi" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cn-modal-doi "><i class="i-Add"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table-ctsanpham-doi" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" name="STT">STT</th>
                                        <th scope="col" name="MSP">Mã sản phẩm</th>
                                        <th scope="col" name="MCTSP">Mã CT sản phẩm</th>
                                        <th scope="col" name="TSP">Tên sản phẩm</th>
                                        <th scope="col" name="SoSerial">Số serial</th>
                                        <th scope="col" name="QC">Quy cách</th>
                                        <th scope="col" name="KC">Kích cỡ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ChiTietDoi as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $item->getCTDoiMoi->chiTietCuaSanPham->MaSanPham }}</td>
                                        <td class="text-center">{{ $item->ChiTietSPDoiMoi }}</td>
                                        <td class="text-center">{{ $item->getCTDoiMoi->chiTietCuaSanPham->TenSanPham }}</td>
                                        <td class="text-center">{{ $item->getCTDoiMoi->SoSerial }}</td>
                                        <td class="text-center">{{ $item->getCTDoiMoi->chiTietCuaSanPham->loaiKichCo->TenKichCo }}</td>
                                        <td class="text-center">{{ $item->getCTDoiMoi->KichCo }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
@endsection
