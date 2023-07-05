@extends('layouts.admin.master')
@section('title', 'Danh sách đơn hàng')
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
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3 mt-3 text-right">
                                <a type="button" href="{{ route('taoDonhangView') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm đơn hàng</a>
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
                                <label for="NguoiTao">Người tạo (email)</label>
                                <input type="text" class="form-control" name="NguoiTao" id="NguoiTao">
                            </div>

                            <div class="col-md-12 mt-2"></div>

                            <div class="col-md-3">
                                <label for="DiaChi">Địa chỉ</label>
                                <input type="text" class="form-control" name="DiaChi" id="DiaChi">
                            </div>

                            <div class="col-md-3">
                                <label for="QuanHuyen">Quận/Huyện</label>
                                <input type="text" class="form-control" name="QuanHuyen" id="QuanHuyen">
                            </div>

                            <div class="col-md-3">
                                <label for="TinhThanh">Tỉnh/Thành</label>
                                <input type="text" class="form-control" name="TinhThanh" id="TinhThanh">
                            </div>

                            <div class="col-md-3">
                                <label for="TrangThai">Trạng thái đơn</label>
                                <select class="form-control" name="TrangThai" id="TrangThai">
                                    <option value="">Tất cả</option>
                                    <option value="NEW">Đang xử lý</option>
                                    <option value="SHIP">Đang vận chuyển</option>
                                    <option value="SENDED">Đã giao hàng</option>
                                    <option value="DONE">Hoàn thành</option>
                                    <option value="CANCEL">Huỷ đơn</option>
                                    <option value="MOMO_WAITS">Chờ thanh toán momo</option>
                                    <option value="MOMO_PAY">Đã thanh toán momo</option>
                                </select>
                            </div>

                            <div class="col-md-12 mt-2"></div>
                            <div class="col-md-3">
                                <label for="ChiNhanh">Chi nhánh</label>
                                <select class="form-control" name="ChiNhanh" id="ChiNhanh">
                                    <option value="">Tất cả</option>
                                    @foreach($chiNhanh as $cn)
                                        <option value="{{ $cn->MaChiNhanh }}">{{ $cn->TenChiNhanh }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="ChiNhanh">Loại thanh toán</label>
                                <select class="form-control" name="ChiNhanh" id="ChiNhanh">
                                    <option value="">Tất cả</option>
                                        <option value="cod">Thanh toán ví Momo</option>
                                        <option value="momo">Thanh toán ship COD</option>

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="created_at_from">Ngày tạo (Từ ngày)</label>
                                <div class="input-group">
                                    <input id="created_at_from" class="form-control" placeholder="Ngày/Tháng/Năm" name="created_at_from">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="created_at_to">Ngày tạo (Đến ngày)</label>
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
                                    <th style="width: 20%">Tổng tiền</th>
                                    <th style="width: 20%">Loại thanh toán</th>
                                    <th style="width: 20%">Trạng thái đơn</th>
                                    <th style="width: 50%">Email người nhận</th>
                                    <th style="width: 50%">Họ tên</th>
                                    <th style="width: 30%">Địa chỉ</th>
                                    <th style="width: 20%">Ghi chú</th>
                                    <th style="width: 20%">Ngày tạo</th>
                                    <th style="width: 30%">Người tạo</th>
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
                url: "{{ route('layDsDonHangAjax') }}",
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
                { width: '10%', targets: 8 },
                { width: '10%', targets: 9 },
                { width: '10%', targets: 10 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
                    data: 'MaDonHang'
                }
                , {
                    data: 'TongTien'
                }
                , {
                    data: 'LoaiThanhToan', render: function (data) {
                        switch (data) {
                            case 'momo': return 'Ví điện tử Momo'; break;
                            case 'atm': return 'Thẻ tín dụng'; break;
                            case 'bitcoin': return 'Bitcoin'; break;
                            case 'money': return 'Thanh toán trực tiếp'; break;
                            default: return 'Chưa thanh toán'; break;
                        }
                    }
                }
                , {
                    data: 'TrangThai'
                    , render: function (data) {
                        switch (data) {
                            case 'NEW': return 'Đang xử lý'; break;
                            case 'SHIP': return 'Đang vận chuyển'; break;
                            case 'SENDED': return 'Đã giao hàng'; break;
                            case 'DONE': return 'Hoàn thành'; break;
                            case 'CANCEL': return 'Huỷ đơn'; break;
                            case 'MOMO_WAITS': return 'Chờ thanh toán momo'; break;
                            case 'MOMO_PAY': return 'Đã thanh toán momo'; break;
                            default: return 'Nháp'; break;
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
                    data: null , render: function (data) {
                        return (data.DiaChi || 0) + ', ' + (data.QuanHuyen || 0) + ', ' + (data.TinhThanh || 0)
                    }
                }
                , {
                    data: 'GhiChu'
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'NguoiTao'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var detailUrl = "{{ route('chiTietDonhangView', ['mdh' => ':id']) }}";
                        var updUrl = "{{ route('capNhatDonhangView', ['mdh' => ':id']) }}";

                        if(data.TrangThai=='NEW' || !data.TrangThai) {
                            return `<td class="text-center">
                                    <a href="#" class="ul-link-action text-danger huy-dh" data-toggle="tooltip" data-placement="top" title="Huỷ đơn hàng">
                                        <i class="i-Close"></i>
                                    </a>
                                    <a href="${updUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-primary" data-toggle="tooltip" data-placement="top" title="Cập nhật đơn">
                                        <i class="i-Pen-2"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                    <a class="ul-link-action text-success ship-dh" data-toggle="tooltip" data-placement="top" title="Gửi vận chuyển">
                                        <i class="i-Ship-2"></i>
                                    </a>
                                </td>`;
                        } else
                        if(data.TrangThai=='DONE') {
                            return  `<td class="text-center">
                                        <a href="${detailUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                            <i class="i-Eye-Visible"></i>
                                        </a>
                                    </td>`;
                        }
                        if(data.TrangThai=='SHIP') {
                            return  `<td class="text-center">
                                <a href="#" class="ul-link-action text-danger huy-dh" data-toggle="tooltip" data-placement="top" title="Huỷ đơn hàng">
                                        <i class="i-Close"></i>
                                    </a>
                                    <a href="${updUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-primary" data-toggle="tooltip" data-placement="top" title="Cập nhật đơn">
                                        <i class="i-Pen-2"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                </td>`;
                        }
                        return  `<td class="text-center">
                                    <a href="#" class="ul-link-action text-danger huy-dh" data-toggle="tooltip" data-placement="top" title="Huỷ đơn hàng">
                                        <i class="i-Close"></i>
                                    </a>
                                    <a href="${updUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-primary" data-toggle="tooltip" data-placement="top" title="Cập nhật đơn">
                                        <i class="i-Pen-2"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
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

        $('#ul-contact-list').on('click', 'a.confirm-dh', function(e) {
            e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

            var table = $('#ul-contact-list').DataTable();
            var data = table.row($(this).closest('tr')).data();
            var mdh = data['MaDonHang'];

            // Hiển thị popup confirm
            swal({
                title: 'Xác nhận đơn hàng?',
                text: "Sau khi xác nhận " + mdh + " sẽ chuyển sang trạng thái hoàn thành đơn hàng!",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận!',
                cancelButtonText: 'Huỷ!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('xacNhanDonHang', ['mdh' => ':id']) }}".replace(':id', mdh),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                    success: function(data) {
                    swal('Đã hoàn tất!', 'Đơn hàng thực hiện thành công.', 'success').then(function() {
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

        $('#ul-contact-list').on('click', 'a.ship-dh', function(e) {
            e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

            var table = $('#ul-contact-list').DataTable();
            var data = table.row($(this).closest('tr')).data();
            var mdh = data['MaDonHang'];

            // Hiển thị popup confirm
            swal({
                title: 'Gửi đơn hàng vận chuyển?',
                text: "Sau khi xác nhận " + mdh + " sẽ chuyển sang trạng thái vận chuyển đơn hàng!",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận!',
                cancelButtonText: 'Huỷ!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('vanChuyenDonHang', ['mdh' => ':id']) }}".replace(':id', mdh),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                    success: function(data) {
                    swal('Đã hoàn tất!', 'Đơn hàng đang thực hiện vận chuyển.', 'success').then(function() {
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

        $('#ul-contact-list').on('click', 'a.huy-dh', function(e) {
            e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

            var table = $('#ul-contact-list').DataTable();
            var data = table.row($(this).closest('tr')).data();
            var mdh = data['MaDonHang'];

            // Hiển thị popup confirm
            swal({
                title: 'Xác nhận HUỶ đơn hàng?',
                text: "Sau khi huỷ " + mdh + " sẽ chuyển sang trạng thái hoàn thành huỷ đơn hàng!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận!',
                cancelButtonText: 'Huỷ!',
                confirmButtonClass: 'btn btn-success mr-5',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true
            }).then(function() {
                $.ajax({
                    url: "{{ route('huyDonHang', ['mdh' => ':id']) }}".replace(':id', mdh),
                    type: 'POST',
                    data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                    success: function(data) {
                    swal('Đã huỷ đơn hàng!', 'Đơn hàng thực hiện huỷ bỏ.', 'success').then(function() {
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



    $(document).ready(function() {
    var dataTable = $('#ul-contact-list').DataTable();

    $('#searchForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('loadDonHangFilter') }}",
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
