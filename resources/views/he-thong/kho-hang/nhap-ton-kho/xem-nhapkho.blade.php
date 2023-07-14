@extends('layouts.admin.master')
@section('title', 'Xem phiếu nhập kho')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Nhập kho</h1>
    <ul>
        <li><a href="">Sản phẩm</a></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form id="new-SP" method="POST" action="{{route('nhapKhoSanPham')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-8">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="MaSanPham" class="required">Mã sản phẩm *</label>
                                    <div class="input-group">
                                        <input value="{{ $NhapKho->MaSanPham }}" type="text" class="form-control" id="MaSanPham" readonly name="MaSanPham" placeholder="Hãy chọn sản phẩm" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="TenChiNhanh" class="required">Chi nhánh:</label>
                                    <div class="input-group">
                                        <input type="text"  value="{{ $NhapKho->getChiNhanh ? $NhapKho->getChiNhanh->MaChiNhanh . ' - ' . $NhapKho->getChiNhanh->TenChiNhanh : ''}}" class="form-control" id="TenChiNhanh" name="TenChiNhanh" readonly required aria-describedby="inputGroupCN">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="NguoiTao" class="required">Người nhập *:</label>
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="NguoiTao" name="NguoiTao" readonly required value="{{ $NhapKho->NguoiTao }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="SoLuongNhap" class="required">Số lượng</label>
                                    <div class="form-group">
                                        <input type="number" value="{{ $NhapKho->SoLuongNhap }}" min="1" class="form-control" id="SoLuongNhap" name="SoLuongNhap" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="SoLuongSerial" class="required">Tổng số Serial:</label>
                                    <div class="form-group">
                                        <input type="number" value="{{ count(explode(",", $NhapKho->SoSerial)) }}" readonly class="form-control" id="SoLuongSerial" name="SoLuongSerial" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="GiaTien" class="required">Giá tiền *</label>
                                    <div class="input-group">
                                        <input type="money" value="{{ $NhapKho->sanPhamNhap->GiaTien }}" readonly class="form-control" id="GiaTien" name="GiaTien" min="0" aria-describedby="inputGroupPrepend2">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="TongTien" class="required">Tổng số tiền:</label>
                                    <div class="form-group">
                                        <input type="money" value="{{ $NhapKho->TongTien }}" readonly class="form-control" id="TongTien" name="TongTien" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="TenSanPham" class="required">Tên sản phẩm *</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $NhapKho->sanPhamNhap->TenSanPham }}" id="TenSanPham" name="TenSanPham" readonly aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="LoaiSanPham" class="required">Loại sản phẩm:</label>
                                    <div class="form-group">
                                        <input type="text" value="{{ $NhapKho->sanPhamNhap->loaiSanPham->TenLoai }}" class="form-control" id="LoaiSanPham" name="LoaiSanPham" readonly aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="MoTa" class="required">Mô tả</label>
                                    <textarea readonly class="form-control" style="width: 100% !important;" rows="1" name="MoTa" id="MoTa">{{ $NhapKho->sanPhamNhap->MoTa }}</textarea>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="LoaiKichCo" class="required">Loại kích cỡ:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $NhapKho->sanPhamNhap->loaiKichCo->TenKichCo }}" id="LoaiKichCo" name="LoaiKichCo" readonly aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="KichCo" class="required">Kích cỡ *</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="KichCo" readonly value="{{ $NhapKho->KichCo }}" name="KichCo" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="GhiChu" class="required">Ghi chú</label>
                                    <textarea class="form-control" style="width: 100% !important;" readonly rows="2" name="GhiChu" id="GhiChu">{{ $NhapKho->GhiChu }}</textarea>
                                </div>

                                <div class="col-md-12"></div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                HÌNH ẢNH SẢN PHẨM
                                <div class="input-group mb-3">
                                    @if (!empty($NhapKho->sanPhamNhap->HinhAnh))
                                    <img class="d-block w-100" src="{{ asset('assets/images/san_pham/' . $NhapKho->sanPhamNhap->HinhAnh) }}" alt="Ảnh sản phẩm">
                                    @else
                                    <img id="output" src="" style="padding: 10px 0px 0px 0px;" onerror="this.classList.add('no-image');" class="d-block w-100 -top-3 no-image">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="SoSerial">Nhập số serial:</label>
                                <textarea id="SoSerial" class="form-control" rows="5" readonly name="SoSerial" onfocusout="tinhSoLuongSerial()">{{ $NhapKho->SoSerial }}</textarea>
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
