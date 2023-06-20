@extends('layouts.admin.master')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Điều chuyển</h1>
    <ul>
        <li><a href="">Sản phẩm</a></li>
        <li><span style="color: #00c5ff !important" name="DieuChuyen">{{ $DieuChuyen->MaPhieuDieuChuyen }}</span></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <form id="new-DC" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Mã phiếu điều chuyển</label>
                                <input value="{{ $DieuChuyen->MaPhieuDieuChuyen }}" type="text" class="form-control" id="validationCustomUsername" readonly name="MaPhieuNhap" placeholder="Hệ thống tự sinh" aria-describedby="inputGroupPrepend">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08" class="required">Người thực hiện *:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly
                                        value="{{ $DieuChuyen->NguoiDieuChuyen . ' - ' . $DieuChuyen->getUserDieuChuyen->HoTen}}">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-4 mb-3">
                                <label for="MaChiNhanhA" class="required">Chi nhánh giao hàng:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhA->MaChiNhanh }}" type="text" class="form-control" id="MaChiNhanhA" name="MaChiNhanhA" readonly required
                                                aria-describedby="inputGroupCNA">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="TenChiNhanhA" class="required">Tên chi nhánh giao *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhA->TenChiNhanh }}" type="text" class="form-control" id="TenChiNhanhA" name="TenChiNhanhA" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="EmailA" class="required">Email quản lý chi nhánh giao *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhA->NguoiQuanLy }}" type="text" class="form-control" id="EmailA" name="EmailA" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-4 mb-3">
                                <label for="MaChiNhanhB" class="required">Chi nhánh nhận hàng:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhB->MaChiNhanh }}" type="text" class="form-control" id="MaChiNhanhB" name="MaChiNhanhB" readonly required
                                                aria-describedby="inputGroupCNB">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="TenChiNhanhB" class="required">Tên chi nhánh nhận *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhB->TenChiNhanh }}" type="text" class="form-control" id="TenChiNhanhB" name="TenChiNhanhB" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="EmailB" class="required">Email quản lý chi nhánh nhận *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input value="{{ $DieuChuyen->getChiNhanhB->NguoiQuanLy }}" type="text" class="form-control" id="EmailB" name="EmailB" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>

                            <div class="col-md-8 mb-3">
                                <label for="LyDoDieuChuyen" class="required">Lý do điều chuyển *</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="2" name="LyDoDieuChuyen" id="LyDoDieuChuyen">{{ $DieuChuyen->LyDoDieuChuyen }}</textarea>
                            </div>
                            <div class="col-md-12"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">DANH SÁCH CÁC SẢN PHẨM ĐIỀU CHUYỂN</h5>
                        </div>
                        <div class="table-responsive col-md-12">
                            <table id="ul-dieuchuyen-list" class="display table" caption="Danh sách người dùng">
                                <thead>
                                    <tr>
                                        <th name="CTSP" class="text-center" style="width: 180px">Mã CT sản phẩm</th>
                                        <th name="MSP" class="text-center" style="width: 180px">Mã sản phẩm</th>
                                        <th name="TSP" class="text-center" style="width: 180px">Tên sản phẩm</th>
                                        <th name="SS" class="text-center" style="width: 180px">Số Serial</th>
                                        <th name="TT" class="text-center" style="width: 180px">Trạng thái</th>
                                        <th name="GC" class="text-center" style="width: 150px">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($DieuChuyen->chiTietDieuChuyen as $ChiTietDieuChuyen)
                                    <tr>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->MaCTSanPham }}</td>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->MaSanPham }}</td>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->getSanPham->TenSanPham }}</td>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->getCTSanPham->SoSerial }}</td>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->TrangThaiHienTai }}</td>
                                        <td class="text-center">{{ $ChiTietDieuChuyen->GhiChu }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
$(document).ready(function () {
    var table = $('#ul-dieuchuyen-list').DataTable();

    $('#ul-dieuchuyen-list tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $('tr.odd.selected').removeClass('selected');
            $('tr.even.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('#button').click(function () {
        table.row('.selected').remove().draw(false);
    });
});
</script>
@endsection
