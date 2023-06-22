@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách </h1>
    <ul>
        <li><a href="">xuất kho</a></li>
        {{-- <li>Liên hệ</li> --}}
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>


<section class="contact-list">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-card alert-success" role="alert">
                <strong class="text-capitalize">Success!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-header text-right bg-transparent">
                    <a type="button" href="{{ route('themSPham-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Nhập mới sản phẩm</a>
                </div>

                <div class="card-body">
                    {{-- <form  action="#" method="POST" class="mb-3 mt-0 p-3 pt-0">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="CustomUsername2">Mã phiếu nhập</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="CustomUsername2" name="MaSanPham" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustomUsername3">Tên sản phẩm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername3" name="TenSanPham" placeholder="" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom02">Ghi chú</label>
                                <input type="text" class="form-control" name="DiaChi" id="validationCustom02" placeholder="" required>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom05">Thương hiệu</label>
                                <input type="text" class="form-control" name="ThuongHieu" id="validationCustom05" placeholder="ABC" required>
                            </div>
                            <div class="col-md-12 mt-3"></div>
                            <div class="col-md-3">
                                <label for="picker2">Ngày tạo (Từ ngày)</label>
                                <div class="input-group">
                                    <input id="picker2" class="form-control" placeholder="Ngày/Tháng/Năm" name="created_at_from">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="picker3">Ngày tạo (Đến ngày)</label>
                                <div class="input-group">
                                    <input id="picker3" class="form-control" placeholder="Ngày/Tháng/Năm" name="created_at_to">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2"></div>
                            <div class="col-md-2 mt-2">
                                <label for="picker3"></label>
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm theo bộ lọc</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                    </form> --}}

                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Mã phiếu xuất kho</th>
                                    <th style="width: 50%">Lý do</th>
                                    <th style="width: 30%">Mã chi nhánh nhận</th>
                                    <th style="width: 20%">Trạng thái</th>
                                    <th style="width: 20%">Ngày xuất kho</th>
                                    <th style="width: 30%">Người xuất kho</th>
                                    <th style="width: 10%" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Load bằng Ajax cho nhanh --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('page-js')


<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<!-- page script -->
<script src="{{ asset('assets/js/tooltip.script.js') }}"></script>

<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/datatable-selectrow.script.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

{{-- Ajax load data cho ds user --}}
<script>
    $(document).ready(function() {
        var table = $('#ul-contact-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            , scrollCollapse: true
            , scrollX: true
            , autoWidth: true
            ,ajax: {
                url: "{{ route('layDsXuatKhoAjax') }}",
                type: "GET",
            },
            columnDefs: [
                { width: '80px', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '30%', targets: 5 },
                { width: '10%', targets: 6 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
                    data: 'MaXuatKho'
                }
                , {
                    data: 'LyDoXuat'
                }
                , {
                    data: 'ChiNhanhNhan'
                }
                , {
                    data: 'TrangThai'
                    , render: function (data) {
                        if (data == '1') {
                            return 'Đã xuất kho';
                        } else if (data == '0') {
                            return 'Đang chuyển hàng';
                        } else {
                            return 'Huỷ xuất kho';
                        }
                    }
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'NguoiXuatKho'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var detailUrl = "{{ route('chiTietXuatKhoView', ['id' => ':id']) }}";
                        return `<td class="text-center">
                                    <a href="${detailUrl.replace(':id', data.MaXuatKho)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                </td>`;
                    },

                }

            ], "drawCallback": function(settings) {
                    $(settings.nTable).find('.paginate_button').click(function() {
                        settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                        $(settings.nTable).dataTable(settings);
                    });
                }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#picker2, #picker3').pickadate({
            selectMonths: true,
            selectYears:true,
        });
    });
</script>
@endsection
