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
        <p></p>
        <div class="col-md-12">
            @if (session('message.warning'))
            <div class="alert alert-card alert-warning" role="alert">
                <strong class="text-capitalize">Success!</strong> {{ session('message.warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('message.success'))
            <div class="alert alert-card alert-success" role="alert">
                <strong class="text-capitalize">Success!</strong> {{ session('message.success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form id="new-SP"  method="POST" action="{{route('nhapMoiSPham-add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Mã phiếu nhập *</label>
                                <input type="text" class="form-control" id="validationCustomUsername" readonly name="MaPhieuNhap" placeholder="Hệ thống tự sinh" aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="TenChiNhanh" class="required">Chi nhánh:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="TenChiNhanh" name="TenChiNhanh" readonly required
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
                                        <input type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly required
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
                                        <input type="text" readonly class="form-control" id="MaChiNhanh" name="MaChiNhanh" required >
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="NQL" class="required">Người quản lý:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="NQL" name="NQL" disabled required aria-describedby="inputGroupQL">
                                    </div>
                                </div>
                            </div>
                            <!-- Large Modal -->
                            <div class="col-md-12">
                                <div id="cn-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 1200px !important;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Tìm kiếm chi nhánh</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="table-responsive col-md-12">
                                                        <table id="ul-user-list" class="display table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width: 80px">Mã chi nhánh</th>
                                                                    <th class="text-center" style="width: 180px">Tên chi nhánh</th>
                                                                    <th class="text-center" style="width: 150px">Địa chỉ</th>
                                                                    <th class="text-center" style="width: 100px">Số điện thoại</th>
                                                                    <th class="text-center" style="width: 80px">Email người quản lý</th>
                                                                    <th class="text-center" style="width: 80px">Người quản lý</th>
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
                            <!-- END Large Modal -->

                            <div class="col-md-2">
                                <label class="checkbox checkbox-primary" style="margin-top: 2.1rem !important">
                                    <span>Nhập theo lô</span>
                                    <input type="checkbox" id="LoaiNhap" name="LoaiNhap" value="NhapLo" onchange="nhapTheoLo()">
                                    <input hidden type="checkbox" name="LoaiNhap" value="NhapLe">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="SoLuongNhap" class="required">Số lượng</label>
                                <div class="form-group">
                                    <input type="number" onfocusout="thayDoiSL()" readonly class="form-control" id="SoLuongNhap" name="SoLuongNhap" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="SoLuongSerial" class="required">Tổng số Serial:</label>
                                <div class="form-group">
                                    <input type="number" readonly class="form-control" id="SoLuongSerial" name="SoLuongSerial" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="TongTien" class="required">Tổng số tiền:</label>
                                <div class="form-group">
                                    <input type="money" readonly class="form-control" id="TongTien" name="TongTien" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>

                            <div class="col-md-2 mb-3">
                                <label for="VAT" class="required">% VAT *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1">%</span>
                                    </div>
                                    <input type="number" class="form-control" id="VAT" name="VAT" min="0" max="100" onfocusout="tinhGiaVAT()" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="GiaVAT" class="required">Giá VAT</label>
                                <div class="input-group">
                                    <input type="money" readonly class="form-control" id="GiaVAT" name="GiaVAT" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTien" class="required">Giá tiền *</label>
                                <div class="input-group">
                                    <input type="money" onfocusout="thayDoiGiaTien()" class="form-control" id="GiaTien" name="GiaTien" min="0" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTienSauThue" class="required">Giá tiền sau thuế</label>
                                <div class="input-group">
                                    <input type="money" readonly class="form-control" id="GiaTienSauThue" name="GiaTienSauThue" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ThuongHieu" class="required">Thương hiệu</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ThuongHieu" name="ThuongHieu"  aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustomUsername" class="required">Tên sản phẩm *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustomUsername" name="TenSanPham"  aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Tên sản phẩm không được để trống!
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="sel">Loại sản phẩm:</label>
                                <select class="form-control" name="LoaiSanPham" id="sel" class="required" required>
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach($LoaiSP as $lsp)
                                        <option value="{{ $lsp->MaLoai }}">{{ $lsp->TenLoai }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Loại kích cỡ không được để trống!
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MoTa" class="required">Mô tả</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="3" name="MoTa" id="MoTa"></textarea>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="GhiChu" class="required">Ghi chú</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="2" name="GhiChu" id="GhiChu"></textarea>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="sel">Loại kích cỡ:</label>
                                <select class="form-control" name="LoaiKichCo" id="sel1" class="required" required>
                                    <option value="">Vui lòng chọn</option>
                                    @foreach($LoaiKC as $lkc)
                                        <option value="{{ $lkc->MaKichCo }}">{{ $lkc->TenKichCo }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="KichCo" class="required">Kích cỡ *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="KichCo" name="KichCo"  aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>
                            <div class="col-md-12"></div>
                        </div>
                        <button class="btn btn-primary" type="submit">Thêm mới</button>

                        {{-- <div class="form-row">
                            <div class="col-md-12"></div>
                            <div class="form-group col-md-12">
                                <label for="sel">Người quản lý *:</label>
                                <input type="text" class="form-control" id="validationCustom05" name="NguoiQuanLy" placeholder="Người Quản Lý" required>
                            </div>
                            <div class="col-md-12 mt-3"></div>
                        </div> --}}
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            HÌNH ẢNH SẢN PHẨM
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input onchange="loadFile(event)" type="file" class="custom-file-input" name="HinhAnh" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="inputGroupFileAddon01"><span id="ChooseFile">Chọn ảnh</span></label>
                                </div>
                                <img id="output" style="padding: 10px 0px 0px 0px;" onerror="this.classList.add('no-image');" class="d-block w-100 -top-3 no-image">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="SoSerial">Nhập số serial:</label>
                            <textarea id="SoSerial" class="form-control" rows="5" name="SoSerial" onfocusout="tinhSoLuongSerial()"></textarea>
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
    $(document).ready(function() {
        let serialCount = 0;
        $('#SoLuongSerial').val(serialCount);
        $('#SoLuongNhap').val(1);
        $('#VAT').val(0);
        $('#GiaVAT').val(0);
        $('#GiaTien').val(0);
        $('#GiaTienSauThue').val(0);
        $('#TongTien').val(0);

        $('#picker2, #picker3').pickadate();
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.classList.remove('no-image');
        $("#ChooseFile").text(event.target.files[0].name);

    };
</script>
<script>
function getDataModal() {
    //var tabledestroy = $('#ul-user-list').DataTable();
    // Hủy bỏ DataTable hiện tại
    //tabledestroy.destroy();

    var table = $('#ul-user-list').DataTable({
      processing: true,
      serverSide: true,
      destroy: true, // thêm phương thức tự huỷ và nhận option mới khi có sự kiện cài đặt lại datatable
      ajax: {
        url: "{{ route('layDsChiNhanhModal') }}",
        type: 'GET',
      },
      columns: [
            {data: 'MaChiNhanh', name: 'MaChiNhanh'},
            {data: 'TenChiNhanh', name: 'TenChiNhanh'},
            {data: 'DiaChi', name: 'DiaChi'},
            {data: 'SDT1', name: 'SDT1'},
            {data: 'NguoiQuanLy', name: 'NguoiQuanLy'},
            { data: null,
                render: function(data) {
                            if(!data.nguoi_quan_ly)
                            return '';
                            else return data.nguoi_quan_ly.HoTen;
                        }
            },
        ],
      "columnDefs": [
        { className: "text-center", "targets": "_all" },
      ],
    });

    // Xử lý khi click vào nút "Chọn"
    $('#selectData').on('click', function() {
      var data = table.rows('.selected').data();
      $('#MaChiNhanh').val(data[0]['MaChiNhanh']);
      $('#TenChiNhanh').val(data[0]['TenChiNhanh']);
      $('#NQL').val(data[0]['NguoiQuanLy']);
      $('#cn-modal').modal('hide');
    });

    $('#ul-user-list tbody').on('dblclick', 'tr', function() {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var code = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();
        var nql = $(this).find('td:eq(4)').text();

        // Hiển thị giá trị lên các input ở trên modal
        $('#MaChiNhanh').val(code);
        $('#TenChiNhanh').val(name);
        $('#NQL').val(nql);

        // Ẩn modal
        $('#cn-modal').modal('hide');
    });
};
$(document).ready(function () {
    var table = $('#ul-user-list').DataTable();

    $('#ul-user-list tbody').on('click', 'tr', function () {
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

<script>
    function nhapTheoLo() {
      var input = document.getElementById('SoLuongNhap');
      if (document.getElementById('LoaiNhap').checked) {
        input.removeAttribute('readonly');
      } else {
        input.setAttribute('readonly', true);
        $('#SoLuongNhap').val(1);
      }
      thayDoiSL();
    }
    function tinhSoLuongSerial() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var text = document.getElementById("SoSerial");
      var listSeri = text.value;
      serialCount = (!listSeri || listSeri == '') ? 0 : listSeri.split(',').length;
      $('#SoLuongSerial').val(serialCount);
    }
    function tinhGiaVAT() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var vat = document.getElementById("VAT").valueAsNumber;
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      let giaVat = (vat * (giaTien ? giaTien : 0)) / 100;
      $('#GiaVAT').val(giaVat.toLocaleString('en-US'));
      tinhTongTien();
      tinhSauVAT();
    }
    function tinhTongTien() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var SoLuong = document.getElementById("SoLuongNhap").valueAsNumber;
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      var giaVAT = parseInt(document.getElementById("GiaVAT").value.replace(/,/g, ''), 10);
      let tongTien = SoLuong * ((giaTien ? giaTien : 0) + (giaVAT ? giaVAT : 0));
      $('#TongTien').val(tongTien.toLocaleString('en-US'));
    }
    function tinhSauVAT() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      var giaVAT = parseInt(document.getElementById("GiaVAT").value.replace(/,/g, ''), 10);
      let tongTien = ((giaTien ? giaTien : 0) + (giaVAT ? giaVAT : 0));
      $('#GiaTienSauThue').val(tongTien.toLocaleString('en-US'));
    }

    function thayDoiSL() {
        tinhGiaVAT();
        tinhTongTien();
        tinhSauVAT();
    }
    function thayDoiGiaTien() {
        tinhGiaVAT();
        tinhTongTien();
        tinhSauVAT();
    }
</script>
    {{-- Validation dữ liệu --}}
<script>
    $(document).ready(function() {
      $("#new-SP").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            TenChiNhanh: "required",
            MaChiNhanh: "required",
            GiaTien: "required",
            SoLuong:"required ",
            TenSanPham: "required",
            LoaiSanPham: "required",
            // SoLuongSerial: "required",
            LoaiKichCo: "required",
            KichCo: "required",
            SoSerial : "required",

        },
        messages: {
            TenChiNhanh: "Vui lòng chọn chi nhánh nhập hàng",
            MaChiNhanh: "Vui lòng nhập mã chi nhánh",
            SoLuong: "Vui lòng nhập số lượng",
            GiaTien: "Vui lòng nhập giá tiền",
            TenSanPham: "Vui lòng nhập tên sản phẩm",
            LoaiSanPham: "Vui lòng chọn loại sản phẩm",
            // SoLuongSerial: "Vui lòng nhập Tỉnh Thành",
            LoaiKichCo:"Vui lòng chọn loại kích cỡ",
            KichCo: "Vui lòng nhập kích cỡ",
            SoSerial: "Vui lòng nhập số serial",

        }
      });
    });
  </script>
@endsection
