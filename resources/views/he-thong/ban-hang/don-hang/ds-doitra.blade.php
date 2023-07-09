@extends('layouts.admin.master')
@section('title', 'Danh sách đổi trả')
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
        <li><a href="">đơn hàng</a></li>
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
                <div class="card-body">
                    <form id="searchForm" method="POST" class="mb-3 mt-0 p-3 pt-0">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-3">
                                <label for="picker3"></label>
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm theo bộ lọc</button>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2"></div>
                            <div class="col-md-3">
                                <label for="MaSanPham">Mã đơn hàng</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="MaSanPham" name="MaSanPham" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="TenSanPham">Email người nhận</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" placeholder="" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="HoTen">Họ tên</label>
                                <input type="text" class="form-control" name="HoTen" id="HoTen">
                            </div>

                            <div class="col-md-3">
                                <label for="NguoiThucHien">Người thực hiện (email)</label>
                                <input type="text" class="form-control" name="NguoiThucHien" id="NguoiThucHien">
                            </div>


                            <div class="col-md-3">
                                <label for="TrangThai">Loại đổi trả</label>
                                <select class="form-control" name="DoiTra" id="DoiTra">
                                    <option value="TRA">Trả hàng</option>
                                    <option value="DOI">Đổi mới</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="created_at_from">Ngày thực hiện (Từ ngày)</label>
                                <div class="input-group">
                                    <input id="created_at_from" class="form-control" placeholder="Ngày/Tháng/Năm" name="created_at_from">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="created_at_to">Ngày thực hiện (Đến ngày)</label>
                                <div class="input-group">
                                    <input id="created_at_to" class="form-control" placeholder="Ngày/Tháng/Năm" name="created_at_to">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Mã đơn hàng</th>
                                    <th style="width: 20%">Loại đổi trả</th>
                                    <th style="width: 50%">Email người nhận</th>
                                    <th style="width: 50%">Họ tên người nhận</th>
                                    <th style="width: 20%">Lý do đổi trả</th>
                                    <th style="width: 20%">Ngày thực hiện</th>
                                    <th style="width: 30%">Người thực hiện</th>
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
            // , serverSide: true
            , destroy: true
            , scrollCollapse: true
            , scrollX: true
            , autoWidth: true
            ,ajax: {
                url: "{{ route('dsDoiTraAjax') }}",
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
                    data: 'MaDonHang'
                }
                , {
                    data: 'DoiTra', render: function (data) {
                        switch (data) {
                            case 'TRA': return 'Trả hàng'; break;
                            case 'DOI': return 'Đổi mới'; break;
                            default: return ''; break;
                        }
                    }
                }
                , {
                    data: 'Email'
                }
                , {
                    data: 'HoTen'
                }
                , {
                    data: 'LyDoDoiTra'
                }
                , {
                    data: 'NgayThucHien'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'NguoiThucHien'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var doiTraUrl = "{{ route('xemDoiTraView', ['mdh' => ':id']) }}";

                        return  `<td class="text-center">
                                    <a href="${doiTraUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
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

                , dom: 'Bfrtip'
                , buttons: [
                    {
                        "extend": 'excel',
                        "text": 'In danh sách Excel',
                        'className': 'btn btn-primary text-white'
                    },
                    // 'excel', 'print'
                ]
                , initComplete: function() {
                    var btn = $('.buttons-excel');
                    btn.removeClass('btn-secondary');
                },
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



    $(document).ready(function() {
    var dataTable = $('#ul-contact-list').DataTable();

    $('#searchForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('loadDoiTraFilter') }}",
            type: 'POST',
            data: {
                filter: formData,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                // Xóa các dữ liệu hiện tại của DataTables
                dataTable.clear().draw();

                // Thêm dữ liệu mới từ response vào DataTables
                dataTable.rows.add(response.data).draw();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});

</script>
@endsection
