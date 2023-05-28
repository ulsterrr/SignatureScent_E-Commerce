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
        <li><a href="">điều chuyển</a></li>
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
                    <a type="button" href="{{ route('dieuChuyen-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm điều chuyển</a>
                </div>

                <div class="card-body">
                    <form  action="#" method="POST" class="mb-3 mt-0 p-3 pt-0">
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
                    </form>

                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Mã phiếu điều chuyển</th>
                                    <th style="width: 50%">Lý do</th>
                                    <th style="width: 30%">Mã chi nhánh giao</th>
                                    <th style="width: 30%">Mã chi nhánh nhận</th>
                                    <th style="width: 20%">Trạng thái</th>
                                    <th style="width: 20%">Ngày điều chuyển</th>
                                    <th style="width: 30%">Người điều chuyển</th>
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
                url: "{{ route('layDsDieuChuyenAjax') }}",
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
                { width: '10%', targets: 7 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
                    data: 'MaPhieuDieuChuyen'
                }
                , {
                    data: 'LyDoDieuChuyen'
                }
                , {
                    data: 'ChiNhanhHienTai'
                }
                , {
                    data: 'ChiNhanhDieuChuyen'
                }
                , {
                    data: 'TrangThai'
                    , render: function (data) {
                        if (data == '1') {
                            return 'Đã điều chuyển';
                        } else if (data == '0') {
                            return 'Đang chuyển hàng';
                        } else {
                            return 'Huỷ điều chuyển';
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
                    data: 'NguoiDieuChuyen'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var detailUrl = "{{ route('chiTietDieuChuyenView', ['mdc' => ':id']) }}";

                        if(data.TrangThai=='1' || data.TrangThai=='3') {
                            return `<td class="text-center">
                                    <a href="${detailUrl.replace(':id', data.MaPhieuDieuChuyen)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                </td>`;
                        } else
                        return `<td class="text-center">
                                    <a href="${detailUrl.replace(':id', data.MaPhieuDieuChuyen)}" class="ul-link-action text-danger huy-dc" data-toggle="tooltip" data-placement="top" title="Huỷ điều chuyển">
                                        <i class="i-Close"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.MaPhieuDieuChuyen)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                    <a class="ul-link-action text-success confirm-dc" data-toggle="tooltip" data-placement="top" title="Xác nhận hoàn thành">
                                        <i class="i-Yes"></i>
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

        $('#ul-contact-list').on('click', 'a.confirm-dc', function(e) {
            e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

            var table = $('#ul-contact-list').DataTable();
            var data = table.row($(this).closest('tr')).data();
            var mdc = data['MaPhieuDieuChuyen'];

            // Hiển thị popup confirm
            swal({
                title: 'Xác nhận điều chuyển?',
                text: "Sau khi xác nhận " + mdc + " sẽ chuyển sang trạng thái hoàn thành điều chuyển!",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận!',
                cancelButtonText: 'Huỷ!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('xacNhanDieuChuyen', ['mdc' => ':id']) }}".replace(':id', mdc),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                    success: function(data) {
                    swal('Đã điều chuyển!', 'Phiếu điều chuyển thực hiện thành công.', 'success').then(function() {
                        // Load lại datatable sau khi xoá thành công
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                    });
                    },
                    error: function(xhr, status, error) {
                    swal('Thất bại', 'Đã có lỗi xảy ra', 'error');
                    }
                });
            }, function(dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Huỷ'
                            , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                            , 'error'
                        )
                    }
                });
        });

        $('#ul-contact-list').on('click', 'a.huy-dc', function(e) {
            e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

            var table = $('#ul-contact-list').DataTable();
            var data = table.row($(this).closest('tr')).data();
            var mdc = data['MaPhieuDieuChuyen'];

            // Hiển thị popup confirm
            swal({
                title: 'Xác nhận HUỶ điều chuyển?',
                text: "Sau khi huỷ " + mdc + " sẽ chuyển sang trạng thái hoàn thành huỷ điều chuyển!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận!',
                cancelButtonText: 'Huỷ!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('huyDieuChuyen', ['mdc' => ':id']) }}".replace(':id', mdc),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                    success: function(data) {
                    swal('Đã huỷ điều chuyển!', 'Phiếu điều chuyển thực hiện huỷ bỏ.', 'success').then(function() {
                        // Load lại datatable sau khi xoá thành công
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                    });
                    },
                    error: function(xhr, status, error) {
                    swal('Thất bại', 'Đã có lỗi xảy ra', 'error');
                    }
                });
            }, function(dismiss) {
                    if (dismiss === 'cancel') {
                        swal(
                            'Huỷ'
                            , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                            , 'error'
                        )
                    }
                });
        });
    });
</script>
@endsection
