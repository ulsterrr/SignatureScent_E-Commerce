@extends('layouts.admin.master')
@section('title', 'Điều chuyển sản phẩm')
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
        <li>Tạo điều chuyển</li>
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
                            <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
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
                                                <th style="width: 20%">Mã chi tiết sản phẩm</th>
                                                <th style="width: 20%">Tên sản phẩm</th>
                                                <th style="width: 20%">Số Serial</th>
                                                <th style="width: 20%">Giá</th>
                                                <th style="width: 20%">Loại</th>
                                                <th style="width: 30%">Quy cách</th>
                                                <th style="width: 30%">Kích cỡ</th>
                                                <th style="width: 30%">Chi nhánh hiện tại</th>
                                                <th style="width: 30%">Tình trạng</th>
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

        <!-- Chi nhánh A Modal -->
        <div class="col-md-12">
            <div id="chinhanhA-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chinhanhA-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="chinhanhA-modal-Title">Tìm kiếm chi nhánh giao hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive col-md-12">
                                    <table id="chinhanhA-list" class="display table">
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
                            <button type="button" onclick="getDataCNModal('chinhanhA-list')" class="btn btn-primary">Tìm kiếm</button>
                            <button id="selectDataA" type="button" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END A Modal -->

        <!-- Chi nhánh B Modal -->
        <div class="col-md-12">
            <div id="chinhanhB-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="chinhanhB-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 1000px !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="chinhanhB-modal-Title">Tìm kiếm chi nhánh nhận hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive col-md-12">
                                    <table id="chinhanhB-list" class="display table">
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
                            <button type="button" onclick="getDataCNModal('chinhanhB-list')" class="btn btn-primary">Tìm kiếm</button>
                            <button id="selectDataB" type="button" class="btn btn-primary">Chọn</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END B Modal -->

        <div class="card mb-4">
            <div class="card-body">
                <form id="new-DC" method="POST" action="{{route('dieuchuyenhang')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-12">
                        <button class="btn btn-primary mb-4" onclick="getDataAndSubmit()">Thêm mới điều chuyển</button>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Mã phiếu điều chuyển</label>
                                <input type="text" class="form-control" id="validationCustomUsername" readonly name="MaPhieuNhap" placeholder="Hệ thống tự sinh" aria-describedby="inputGroupPrepend">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08" class="required">Người thực hiện *:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly
                                        value="{{ auth()->user() ? auth()->user()->email : null }}">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-4 mb-3">
                                <label for="MaChiNhanhA" class="required">Chi nhánh giao hàng:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="MaChiNhanhA" name="MaChiNhanhA" readonly required
                                                aria-describedby="inputGroupCNA">
                                        <div class="input-group-append">
                                            <button id="inputGroupCNA" type="button" class="btn btn-primary" data-toggle="modal" data-target="#chinhanhA-modal">...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="TenChiNhanhA" class="required">Tên chi nhánh giao *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="TenChiNhanhA" name="TenChiNhanhA" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="EmailA" class="required">Email quản lý chi nhánh giao *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="EmailA" name="EmailA" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-4 mb-3">
                                <label for="MaChiNhanhB" class="required">Chi nhánh nhận hàng:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="MaChiNhanhB" name="MaChiNhanhB" readonly required
                                                aria-describedby="inputGroupCNB">
                                        <div class="input-group-append">
                                            <button id="inputGroupCNB" type="button" class="btn btn-primary" data-toggle="modal" data-target="#chinhanhB-modal">...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="TenChiNhanhB" class="required">Tên chi nhánh nhận *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="TenChiNhanhB" name="TenChiNhanhB" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="EmailB" class="required">Email quản lý chi nhánh nhận *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="EmailB" name="EmailB" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>
                            {{-- <div class="col-md-8 mb-3">
                                <label for="LyDoDieuChuyen" class="required">Lý do điều chuyển *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="LyDoDieuChuyen" name="LyDoDieuChuyen"  aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div> --}}

                            <div class="col-md-8 mb-3">
                                <label for="LyDoDieuChuyen" class="required">Lý do điều chuyển *</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="2" name="LyDoDieuChuyen" id="LyDoDieuChuyen"></textarea>
                            </div>
                            <div class="col-md-12"></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="table-title-group">
                            <h5 class="popup-title col-md-12">DANH SÁCH CÁC SẢN PHẨM ĐIỀU CHUYỂN</h5>
                            <div class="action-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#cn-modal"><i class="i-Add"></i></button>
                                <button id="deleteButton" type="button" class="btn btn-danger"><i class="i-Remove"></i></button>
                            </div>
                        </div>
                        <div class="table-responsive col-md-12">
                            <table id="ul-dieuchuyen-list" class="display table" caption="Danh sách người dùng">
                                <thead>
                                    <tr>
                                        <th name="rowChoose" class="text-center" style="width: 20px; margin-top: 0px; padding-bottom: 21px;">
                                            <label class="checkbox checkbox-primary">
                                                <input type="checkbox" id="rowChoose">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>
                                        <th name="CTSP" class="text-center" style="width: 180px">Mã CT sản phẩm</th>
                                        <th name="MSP" class="text-center" style="width: 180px">Mã sản phẩm</th>
                                        <th name="TSP" class="text-center" style="width: 180px">Tên sản phẩm</th>
                                        <th name="SS" class="text-center" style="width: 180px">Số Serial</th>
                                        <th name="TT" class="text-center" style="width: 180px">Trạng thái</th>
                                        <th name="GC" class="text-center" style="width: 150px">Ghi chú</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dữ liệu sẽ được load bằng Ajax -->
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

$(document).ready(function () {
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


var loadFile = function (event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
    image.classList.remove('no-image');
    $("#ChooseFile").text(event.target.files[0].name);

};


function getDataModal() {
    var mcn = $('#MaChiNhanhA').val();
    if (!mcn) {
        $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-warning');
        $('#alert-card-sp-modal .alert-heading').html('Lỗi');
        $('#alert-card-sp-modal .alert-body-content').html('Vui lòng chọn chi nhánh giao hàng để tìm sản phẩm.');
        $('#alert-card-sp-modal').fadeIn(500);
        setTimeout(function(){
            $("#alert-card-sp-modal").fadeOut();
        }, 5000);
        return;
    } else {
        $('#alert-card-sp-modal').css('display', 'none');;
    }

    var getData = "{{ route('tatCaSanPhamModal', ['mcn' => ':id']) }}";
    var link = getData.replace(':id', mcn);
    var table = $('#ul-user-list').DataTable({
        processing: true
        , serverSide: true
        , destroy: true
        , scrollX: true
        , autoWidth: true
        , ajax: {
            url: link.toString(),
            type: "GET",
        }
        , columnDefs: [
            { width: '80px', targets: 0 },
            { width: '20%', targets: 1 },
            { width: '20%', targets: 2 },
            { width: '20%', targets: 3 },
            { width: '20%', targets: 4 },
            { width: '20%', targets: 5 },
            { width: '20%', targets: 6 },
            { width: '20%', targets: 7 },
            { width: '20%', targets: 8 },
            { width: '20%', targets: 9 },
            { width: '20%', targets: 10 },
        ]
        , createdRow: function (row, data, dataIndex) {
            $(row).find('td').css('vertical-align', 'middle');
            $(row).find('td').css('text-align', 'center');
        }
        , columns: [
            {
                data: 'MaSanPham'
            },
            {
                data: 'MaCTSanPham'
            }
            , {
                data: null
                , render: function (data) {
                    if (!data.chi_tiet_cua_san_pham)
                        return '';
                    else return data.chi_tiet_cua_san_pham.TenSanPham;
                }
            }
            , {
                data: 'SoSerial'
            }
            , {
                data: null
                , render: function (data) {
                    if (!data.chi_tiet_cua_san_pham)
                        return '';
                    let amount = data.chi_tiet_cua_san_pham.GiaTien;
                    if (!amount) return 0;
                    let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                    return formattedAmount;
                }
            }
            , {
                data: null
                , render: function (data) {
                    if (!data.chi_tiet_cua_san_pham.loai_san_pham)
                        return '';
                    else return data.chi_tiet_cua_san_pham.loai_san_pham.TenLoai;
                }
            }
            , {
                data: null
                , render: function (data) {
                    if (!data.chi_tiet_cua_san_pham.loai_kich_co)
                        return '';
                    else return data.chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
                }
            }
            , {
                data: 'KichCo'
            }
            , {
                data: null
                , render: function (data) {
                    if (!data.get_chi_nhanh)
                        return '';
                    else return data.get_chi_nhanh.TenChiNhanh;
                }
            }
            , {
                data: 'TinhTrang'
                , render: function (data) {
                    if (data == '1') {
                        return 'Bình thường';
                    } else if (data == '0') {
                        return 'Ngưng nhập hàng';
                    } else {
                        return 'Tồn kho';
                    }
                }
            }
            , {
                data: 'GhiChu'
            }

        ], "drawCallback": function (settings) {
            $(settings.nTable).find('.paginate_button').click(function () {
                settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                $(settings.nTable).dataTable(settings);
            });
        }
    });

    // Xử lý khi click vào nút "Chọn"
    $('#selectData').on('click', function () {
        var data = $('#ul-user-list').DataTable().rows('.selected').data();
        // Lấy giá trị của cột id và name trong hàng được chọn
        var codesp = data[0]['MaSanPham'];
        var codectsp = data[0]['MaCTSanPham'];
        var name = data[0].chi_tiet_cua_san_pham.TenSanPham;
        var sr = data[0]['SoSerial'];
        var tt = data[0]['TinhTrang'];
        var gc = data[0]['GhiChu'];

        var newData = [
            false,
            codectsp,
            codesp,
            name,
            sr,
            tt,
            gc,
        ];

        var table = $('#ul-dieuchuyen-list').DataTable();
        var columnIndex = 1; // Chỉ số cột cần kiểm tra trùng

        // Lấy dữ liệu của cột đã có trong DataTables
        var existingData = table.column(columnIndex).data().toArray();

        // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
        var isDuplicate = existingData.includes(newData[columnIndex]);

        if (isDuplicate) {
            // Xử lý khi có giá trị trùng
            $('#alert-card-sp-modal').css('display', '');
            $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-warning');
            $('#alert-card-sp-modal .alert-body-content').html(`Sản phẩm mã: ${codectsp} đã được chọn trong danh sách điều chuyển.`);
            $('#alert-card-sp-modal').fadeIn(200);
            setTimeout(function(){ $("#alert-card-sp-modal").fadeOut(); }, 10000);
            console.log('Giá trị đã tồn tại trong cột!');
        } else {
            $('#alert-card-sp-modal').css('display', 'none');
            // Thêm dòng dữ liệu mới vào DataTables
            var newRowNode = table.row.add(newData).draw().node();
            var checkbox = $(`<label class="checkbox checkbox-primary">
                                    <input type="checkbox" id="${codectsp}" name="${codectsp}">
                                    <span class="checkmark"></span>
                                </label>`);
            $(newRowNode).find('td:first-child').html(checkbox);
            $(newRowNode).find('td').addClass('text-center');
            $('#cn-modal').modal('hide');
        }
    });

    $('#ul-user-list tbody').on('dblclick', 'tr', function () {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var codesp = $(this).find('td:eq(0)').text();
        var codectsp = $(this).find('td:eq(1)').text();
        var name = $(this).find('td:eq(2)').text();
        var sr = $(this).find('td:eq(3)').text();
        var tt = $(this).find('td:eq(9)').text();
        var gc = $(this).find('td:eq(10)').text();

        var newData = [
            false,
            codectsp,
            codesp,
            name,
            sr,
            tt,
            gc,
        ];

        var table = $('#ul-dieuchuyen-list').DataTable();
        var columnIndex = 1; // Chỉ số cột cần kiểm tra trùng

        // Lấy dữ liệu của cột đã có trong DataTables
        var existingData = table.column(columnIndex).data().toArray();

        // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
        var isDuplicate = existingData.includes(newData[columnIndex]);

        if (isDuplicate) {
            // Xử lý khi có giá trị trùng
            $('#alert-card-sp-modal').css('display', '');
            $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-warning');
            $('#alert-card-sp-modal .alert-body-content').html(`Sản phẩm mã: ${codectsp} đã được chọn trong danh sách điều chuyển.`);
            $('#alert-card-sp-modal').fadeIn(200);
            setTimeout(function(){ $("#alert-card-sp-modal").fadeOut(); }, 10000);
            console.log('Giá trị đã tồn tại trong cột!');
        } else {
            $('#alert-card-sp-modal').css('display', 'none');;
            // Thêm dòng dữ liệu mới vào DataTables
            var newRowNode = table.row.add(newData).draw().node();
            var checkbox = $(`<label class="checkbox checkbox-primary">
                                    <input type="checkbox" id="${codectsp}" name="${codectsp}">
                                    <span class="checkmark"></span>
                                </label>`);
            $(newRowNode).find('td:first-child').html(checkbox);
            $(newRowNode).find('td').addClass('text-center');
        }

        // Ẩn modal
        //$('#cn-modal').modal('hide');
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

    var dieuchuyentable = $('#ul-dieuchuyen-list').DataTable({
        dom: 'rt<"bottom"lip>',
        searching: false,
        "columnDefs": [
            { "orderable": false, "targets": 0 } // Tắt việc sắp xếp cho cột đầu tiên (chỉ số 0)
        ],
        "order": [[1, 'asc']], // Sắp xếp theo cột số thứ tự
        // Cấu hình và tùy chọn khác
    });

    $('#deleteButton').on('click', function() {
        var data = $('#ul-dieuchuyen-list').DataTable().data().toArray();
        // Lặp qua tất cả các checkbox trong cột đầu tiên
        $('#ul-dieuchuyen-list tbody tr').each(function() {
            var checkbox = $(this).find('input[type="checkbox"]');
            if (checkbox.is(':checked')) {
                // Xoá dòng nếu checkbox đã được chọn
                $('#ul-dieuchuyen-list').DataTable().row($(this)).remove().draw(false);
            }
            // Bỏ check của checkbox all
            var checkbox = document.getElementById('rowChoose');
            checkbox.checked = false;
        });
    });

    // Xử lý sự kiện click của checkbox tổng
    $('#rowChoose').on('click', function() {
        // Kiểm tra trạng thái của checkbox tổng
        var isChecked = $(this).is(':checked');

        // Set trạng thái cho tất cả các checkbox dưới <td>
        $('#ul-dieuchuyen-list tbody input[type="checkbox"]').prop('checked', isChecked);
    });
});
//{{-- Validation dữ liệu --}}

$(document).ready(function () {
    $("#new-DC").validate({
        errorPlacement: function (error, element) {
            if (element.parent().hasClass("input-group")) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            TenChiNhanh: "required",
            MaChiNhanh: "required",
            GiaTien: "required",
            SoLuong: "required ",
            TenSanPham: "required",
            LoaiSanPham: "required",
            // SoLuongSerial: "required",
            LoaiKichCo: "required",
            KichCo: "required",
            SoSerial: "required",

        },
        messages: {
            TenChiNhanh: "Vui lòng chọn chi nhánh điều chuyển",
            MaChiNhanh: "Vui lòng nhập mã chi nhánh",
            SoLuong: "Vui lòng nhập số lượng",
            GiaTien: "Vui lòng nhập giá tiền",
            TenSanPham: "Vui lòng nhập tên sản phẩm",
            LoaiSanPham: "Vui lòng chọn loại sản phẩm",
            // SoLuongSerial: "Vui lòng nhập Tỉnh Thành",
            LoaiKichCo: "Vui lòng chọn loại kích cỡ",
            KichCo: "Vui lòng nhập kích cỡ",
            SoSerial: "Vui lòng nhập số serial",

        }
    });

});

function getDataCNModal(type) {

    var table = $('#'+type).DataTable({
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

    $('#'+type+' tbody').on('click', 'tr', function () {
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

    // Xử lý khi click vào nút "Chọn" A
    $('#selectDataA').on('click', function() {
      var data = $('#chinhanhA-list').DataTable().rows('.selected').data();
      $('#MaChiNhanhA').val(data[0]['MaChiNhanh']);
      $('#TenChiNhanhA').val(data[0]['TenChiNhanh']);
      $('#EmailA').val(data[0]['NguoiQuanLy']);
      $('#chinhanhA-modal').modal('hide');
    });

    $('#chinhanhA-list tbody').on('dblclick', 'tr', function() {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var code = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();
        var email = $(this).find('td:eq(4)').text();

        // Hiển thị giá trị lên các input ở trên modal
        $('#MaChiNhanhA').val(code);
        $('#TenChiNhanhA').val(name);
        $('#EmailA').val(email);

        // Ẩn modal
        $('#chinhanhA-modal').modal('hide');
    });

        // Xử lý khi click vào nút "Chọn" B
    $('#selectDataB').on('click', function() {
      var data = $('#chinhanhB-list').DataTable().rows('.selected').data();
      $('#MaChiNhanhB').val(data[0]['MaChiNhanh']);
      $('#TenChiNhanhB').val(data[0]['TenChiNhanh']);
      $('#EmailB').val(data[0]['NguoiQuanLy']);
      $('#chinhanhB-modal').modal('hide');
    });

    $('#chinhanhB-list tbody').on('dblclick', 'tr', function() {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var code = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();
        var email = $(this).find('td:eq(4)').text();

        // Hiển thị giá trị lên các input ở trên modal
        $('#MaChiNhanhB').val(code);
        $('#TenChiNhanhB').val(name);
        $('#EmailB').val(email);

        // Ẩn modal
        $('#chinhanhB-modal').modal('hide');
    });
};
// Lấy dữ liệu của datatable vào biến ẩn rồi submit form
function getDataAndSubmit() {
  // Lấy dữ liệu từ DataTable
  var tableData = $('#ul-dieuchuyen-list').DataTable().data().toArray();
  // Lấy tên của biến trong mảng trả về
  var namedTableData = tableData.map(function(row) {
    var namedRow = {};
    $('#ul-dieuchuyen-list th').each(function(index) {
      var columnName = $(this).attr('name');
      var columnValue = row[index];
      namedRow[columnName] = columnValue;
    });
    return namedRow;
  });
  // Thêm dữ liệu vào các input ẩn trong form
  var $form = $('#new-DC');
  $tableDataInput = $('<input>').attr('type', 'hidden').attr('name', 'dataTableData').val(JSON.stringify(namedTableData));
  $form.append($tableDataInput);

  // Submit form
  $form.submit();
}
</script>

@endsection
