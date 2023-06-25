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
                <div class="card-header text-right bg-transparent">
                    <a type="button" href="{{ route('taoDonhangView') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm đơn hàng</a>
                </div>

                <div class="card-body">
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
            , serverSide: true
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
                            case 'NEW': return 'Mới tạo'; break;
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

                        if(data.TrangThai=='0' || !data.TrangThai) {
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
                        if(data.TrangThai=='3') {
                            return  `<td class="text-center">
                                        <a href="${detailUrl.replace(':id', data.MaDonHang)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                            <i class="i-Eye-Visible"></i>
                                        </a>
                                    </td>`;
                        }
                        if(data.TrangThai=='4') {
                            return  `<td class="text-center">
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
</script>
@endsection
