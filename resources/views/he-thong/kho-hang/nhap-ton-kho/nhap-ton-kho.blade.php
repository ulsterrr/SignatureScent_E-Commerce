@extends('layouts.admin.master')
@section('title', 'Nhập kho sản phẩm')
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
                                {{-- <strong class="alert-heading text-capitalize"></strong> --}}
                                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> --}}
                                <div class="alert-body-content"></div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive col-md-12">
                                    <table id="ul-user-list" class="display table">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%">Mã sản phẩm</th>
                                                <th style="width: 20%" class="text-center">Tên sản phẩm</th>
                                                <th style="width: 50%">Giá</th>
                                                <th style="width: 30%">Ngày tạo</th>
                                                <th style="width: 50%">Thương hiệu</th>
                                                <th style="width: 50%">Loại sản phẩm</th>
                                                <th style="width: 30%">Quy cách</th>
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
        <!-- END Chọn sản phẩm Modal -->

        <!-- Chi Nhánh Modal -->
        <div class="col-md-12">
            <div id="cn-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="cn-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 1200px !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cn-modal-title">Tìm kiếm chi nhánh</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive col-md-12">
                                    <table id="ul-chinhanh-list" class="display table">
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
                            <button type="button" onclick="getDataModalCN()" class="btn btn-primary">Tìm kiếm</button>
                            <button id="selectDataCN" type="button" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Chi Nhánh Modal -->
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
                                        <input type="text" class="form-control" id="MaSanPham" readonly name="MaSanPham" placeholder="Hãy chọn sản phẩm" aria-describedby="inputGroupPrepend" required>

                                        <div class="input-group-append">
                                            <button id="inputGroupSP" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="TenChiNhanh" class="required">Chi nhánh:</label>
                                    <div class="input-group">
                                        <input type="text" value="{{ auth()->user()->LoaiTaiKhoan != 'A' ? auth()->user()->chiNhanh->MaChiNhanh : '' }}" class="form-control" id="MaChiNhanh" name="MaChiNhanh" hidden>
                                        <input type="text" value="{{ auth()->user()->LoaiTaiKhoan != 'A' ? auth()->user()->chiNhanh->MaChiNhanh . ' - ' . auth()->user()->chiNhanh->TenChiNhanh : '' }}" class="form-control" id="TenChiNhanh" name="TenChiNhanh" readonly aria-describedby="inputGroupCN">
                                        <div class="input-group-append">
                                            <button id="inputGroupCN" @disabled(auth()->user()->LoaiTaiKhoan != 'A') type="button" class="btn btn-primary" data-toggle="modal" data-target="#cn-modal">...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="NguoiTao" class="required">Người nhập *:</label>
                                    <div class="input-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="NguoiTao" name="NguoiTao" readonly required value="{{ auth()->user() ? auth()->user()->email : null }}">
                                        </div>
                                        <div class="invalid-feedback">
                                            Người nhập được để trống!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="SoLuongNhap" class="required">Số lượng</label>
                                    <div class="form-group">
                                        <input type="number" onfocusout="tinhTongTien()" min="1" class="form-control" id="SoLuongNhap" name="SoLuongNhap" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="SoLuongSerial" class="required">Tổng số Serial:</label>
                                    <div class="form-group">
                                        <input type="number" readonly class="form-control" id="SoLuongSerial" name="SoLuongSerial" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="GiaTien" class="required">Giá tiền *</label>
                                    <div class="input-group">
                                        <input type="money" class="form-control" id="GiaTien" name="GiaTien" onfocusout="tinhTongTien()" min="0" aria-describedby="inputGroupPrepend2">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="TongTien" class="required">Tổng số tiền:</label>
                                    <div class="form-group">
                                        <input type="money" readonly class="form-control" id="TongTien" name="TongTien" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="TenSanPham" class="required">Tên sản phẩm *</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" readonly aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Tên sản phẩm không được để trống!
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="LoaiSanPham" class="required">Loại sản phẩm:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="LoaiSanPham" name="LoaiSanPham" readonly aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="MoTa" class="required">Mô tả</label>
                                    <textarea readonly class="form-control" style="width: 100% !important;" rows="1" name="MoTa" id="MoTa"></textarea>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="LoaiKichCo" class="required">Loại kích cỡ:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="LoaiKichCo" name="LoaiKichCo" readonly aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <label for="KichCo" class="required">Kích cỡ *</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="KichCo" name="KichCo" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="GhiChu" class="required">Ghi chú</label>
                                    <textarea class="form-control" style="width: 100% !important;" rows="2" name="GhiChu" id="GhiChu"></textarea>
                                </div>

                                <div class="col-md-12"></div>
                            </div>
                            <button class="btn btn-primary" type="submit">Nhập tồn kho</button>

                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                HÌNH ẢNH SẢN PHẨM
                                <div class="input-group mb-3">
                                    {{-- <div class="custom-file">
                                        <input onchange="loadFile(event)" type="file" class="custom-file-input" name="HinhAnh" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                        <label class="custom-file-label" for="inputGroupFileAddon01"><span id="ChooseFile">Chọn ảnh</span></label>
                                    </div> --}}
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
        var table = $('#ul-user-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            , scrollX: true
            , autoWidth: true
            , ajax: {
                url: "{{ route('layDsSanPhamAjax') }}"
                , type: "GET"
            , }
            , columnDefs: [{
                    width: '100px'
                    , targets: 0
                }
                , {
                    width: '20%'
                    , targets: 1
                }
                , {
                    width: '20%'
                    , targets: 2
                }
                , {
                    width: '20%'
                    , targets: 3
                }
                , {
                    width: '20%'
                    , targets: 4
                }
                , {
                    width: '20%'
                    , targets: 5
                }
                , {
                    width: '20%'
                    , targets: 6
                }
                , {
                    width: '20%'
                    , targets: 7
                }
            , ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
                $(row).find('td').css('text-align', 'center');
            }
            , columns: [
                {
                    data: 'MaSanPham'
                }
                , {
                    data: 'TenSanPham'
                }
                , {
                    data: null
                    , render: function(data) {
                        let amount = data.GiaTien;
                        if(!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'ThuongHieu'
                }
                , {
                    data: null
                    , render: function(data) {
                        if(!data.loai_san_pham)
                        return '';
                        else return data.loai_san_pham.TenLoai;
                    }
                }
                , {
                    data: null
                    , render: function(data) {
                        if(!data.loai_kich_co)
                        return '';
                        else return data.loai_kich_co.TenKichCo;
                    }
                }
                , {
                    data: 'GhiChu'
                }

            ]
            , "drawCallback": function(settings) {
                $(settings.nTable).find('.paginate_button').click(function() {
                    settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                    $(settings.nTable).dataTable(settings);
                });
            }
        });

        // Xử lý khi click vào nút "Chọn"
        $('#selectData').on('click', function() {
            var data = $('#ul-user-list').DataTable().rows('.selected').data();
            // Lấy giá trị của cột id và name trong hàng được chọn
            var lkc = data[0].loai_kich_co;
            var lsp = data[0].loai_san_pham;
            let m = formatMoneyNumber(data[0]['GiaTien']); // đổi định dạng ,
            // Load hình ảnh
            var image = document.getElementById('output');
            var img = data[0].HinhAnh.toString();
            if(img){ // Nếu ảnh ko null hoặc rỗng thì load ảnh
                image.src = `{{ asset('assets/images/san_pham/${img}') }}`;
                image.classList.remove('no-image');
            }

            $('#SoLuongNhap').val(1);
            $('#MaSanPham').val(data[0].MaSanPham);
            $('#NguoiTao').val(data[0].NguoiTao);
            $('#GiaTien').val(m);
            $('#TongTien').val(m);
            $('#TenSanPham').val(data[0].TenSanPham);
            $('#LoaiSanPham').val(lsp.TenLoai);
            $('#MoTa').val(data[0].MoTa);
            $('#GhiChu').val(data[0].GhiChu);
            $('#LoaiKichCo').val(lkc.TenKichCo);

            $('#sp-modal').modal('hide');
        });

        $('#ul-user-list tbody').on('dblclick', 'tr', function() {
            var data = table.row(this).data();
            var lkc = data.loai_kich_co;
            var lsp = data.loai_san_pham;
            let m = formatMoneyNumber(data['GiaTien']); // đổi định dạng ,
            // Load hình ảnh
            var image = document.getElementById('output');
            var img = data.HinhAnh.toString();
            if(img){ // Nếu ảnh ko null hoặc rỗng thì load ảnh
                image.src = `{{ asset('assets/images/san_pham/${img}') }}`;
                image.classList.remove('no-image');
            }
            $('#SoLuongNhap').val(1);
            $('#MaSanPham').val(data.MaSanPham);
            $('#NguoiTao').val(data.NguoiTao);
            $('#GiaTien').val(m);
            $('#TongTien').val(m);
            $('#TenSanPham').val(data.TenSanPham);
            $('#LoaiSanPham').val(lsp.TenLoai);
            $('#MoTa').val(data.MoTa);
            $('#GhiChu').val(data.GhiChu);
            $('#LoaiKichCo').val(lkc.TenKichCo);

            // Ẩn modal
            $('#sp-modal').modal('hide');
        });

        $(document).ready(function() {
            var table = $('#ul-user-list').DataTable();
            var tablecn = $('#ul-chinhanh-list').DataTable();

            $('#ul-user-list tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    $('tr.odd.selected').removeClass('selected');
                    $('tr.even.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#button').click(function() {
                table.row('.selected').remove().draw(false);
            });
        });
    };

// Load cho chi nhánh
function getDataModalCN() {
    var table = $('#ul-chinhanh-list').DataTable({
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
    $('#selectDataCN').on('click', function() {
      var data = table.rows('.selected').data();
      $('#MaChiNhanh').val(data[0]['MaChiNhanh']);
      $('#TenChiNhanh').val(data[0]['TenChiNhanh']);
      $('#cn-modal').modal('hide');
    });

    $('#ul-chinhanh-list tbody').on('dblclick', 'tr', function() {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var code = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();

        // Hiển thị giá trị lên các input ở trên modal
        $('#MaChiNhanh').val(code);
        $('#TenChiNhanh').val(name);

        // Ẩn modal
        $('#cn-modal').modal('hide');
    });

    $(document).ready(function() {
        var tablecn = $('#ul-chinhanh-list').DataTable();

        $('#ul-chinhanh-list tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('tr.odd.selected').removeClass('selected');
                $('tr.even.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#button').click(function() {
            tablecn.row('.selected').remove().draw(false);
        });
    });
};
</script>

<script>
    $(document).ready(function() {
        // Bắt sự kiện "input" hoặc "change" trên ô input number
        $('#SoLuongNhap').on('input change', function() {
            // Xử lý khi giá trị của ô input thay đổi
            tinhTongTien();
        });
    });

    function tinhSoLuongSerial() {
        // Xử lý khi người dùng rời khỏi ô nhập liệu
        var text = document.getElementById("SoSerial");
        var listSeri = text.value;
        serialCount = (!listSeri || listSeri == '') ? 0 : listSeri.split(',').length;
        $('#SoLuongSerial').val(serialCount);
    }

    function tinhTongTien() {
        // Xử lý khi người dùng rời khỏi ô nhập liệu
        var SoLuong = document.getElementById("SoLuongNhap").valueAsNumber;
        var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
        let tongTien = SoLuong * (giaTien ? giaTien : 0);
        $('#TongTien').val(tongTien.toLocaleString('en-US'));
    }


    function formatMoneyNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
</script>
{{-- Validation dữ liệu --}}
<script>
    $(document).ready(function() {
        $("#new-SP").validate({
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                GiaTien: "required"
                , SoLuong: "required "
                , TenSanPham: "required"
                , LoaiSanPham: "required",
                LoaiKichCo: "required"
                , KichCo: "required"
                // , SoSerial: "required",

            }
            , messages: {
                SoLuong: "Vui lòng nhập số lượng"
                , GiaTien: "Vui lòng nhập giá tiền"
                , TenSanPham: "Vui lòng nhập tên sản phẩm"
                , LoaiSanPham: "Vui lòng chọn loại sản phẩm",
                LoaiKichCo: "Vui lòng chọn loại kích cỡ"
                , KichCo: "Vui lòng nhập kích cỡ"
                // , SoSerial: "Vui lòng nhập số serial",

            }
        });
    });

</script>
@endsection

