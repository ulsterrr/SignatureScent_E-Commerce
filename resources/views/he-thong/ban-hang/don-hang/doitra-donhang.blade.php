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
    <h1>
        <button onclick="getDataAndSubmit()" class="btn btn-primary">Lưu thông tin đổi trả</button></h1>
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
        <div id="cn-modal-ban" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="cn-modal-ban" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cn-modal-ban-Title">Tìm kiếm sảm phẩm cần đổi trả</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- thông báo lỗi cho modal sản phẩm --}}
                    <div class="col-md-12 mt-3">
                        <div id="alert-card-ctspb-modal" class="alert alert-card fade show" role="alert" style="display: none;">
                            <div class="alert-body-content"></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="table-responsive col-md-12">
                                <table id="ul-ctsp-ban" class="display table">
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
                        <button type="button" onclick="getDataModalB()" class="btn btn-primary">Tìm kiếm</button>
                        <button id="selectDataB" type="button" class="btn btn-primary">Chọn</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Chọn CT sản phẩm trả -->
    <!-- Chọn CT sản phẩm nhận -->
    <div class="col-md-12">
        <div id="cn-modal-doi" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="cn-modal-doi" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cn-modal-doi-Title">Tìm kiếm sảm phẩm thay thế</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- thông báo lỗi cho modal sản phẩm --}}
                    <div class="col-md-12 mt-3">
                        <div id="alert-card-ctspd-modal" class="alert alert-card fade show" role="alert" style="display: none;">
                            <div class="alert-body-content"></div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="table-responsive col-md-12">
                                <table id="ul-ctsp-doi" class="display table">
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
                        <button type="button" onclick="getDataModalD()" class="btn btn-primary">Tìm kiếm</button>
                        <button id="selectDataD" type="button" class="btn btn-primary">Chọn</button>
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
            <div class="alert-body-content"></div>
        </div>
    </div>
    <form id="form-doitra" method="POST" action="{{ route('doitra-donhang') }}" enctype="multipart/form-data">
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
                                        <option value="TRA">Trả hàng</option>
                                        <option value="DOI">Đổi mới</option>
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
                        <div class="card-title">Chọn sản phẩm cần đổi trả</div>
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
                                        <th scope="col" name="TT">Trạng thái</th>
                                        <th scope="col" name="del"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mt-4" id="card-doi" style="display: none">
                    <div class="card-body">
                        <div class="card-title">Chọn sản phẩm thay thế</div>
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
@include('he-thong.ban-hang.don-hang.xuly-doitra-donhang')
@endsection
