@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách </h1>
    <ul>
        <li><a href="">Sản phẩm</a></li>
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
                    <a type="button" href="{{ route('themTKView') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm sản phẩm</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 80px">Hình ảnh</th>
                                    <th style="width: 10%">Mã sản phẩm</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th style="width: 20%">Số serinal</th>
                                    <th style="width: 10%">Giá</th>
                                    <th style="width: 10%">Thương hiệu</th>
                                    <th style="width: 30%">Mô tả</th>
                                    <th style="width: 10%">Kích cỡ</th>
                                    <th style="width: 30%">Ghi chú</th>
                                    <th style="width: 30%">Chi nhánh</th>
                                    <th style="width: 30%" class="text-center">Thao tác</th>
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

{{-- Ajax load data cho ds user --}}
<script>
    $(document).ready(function() {
        var table = $('#ul-contact-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            // , scrollY: "1000px"
            , scrollX: true
            , autoWidth: true
            ,ajax: {
                url: "{{ route('layDsSanPhamAjax') }}",
                type: "GET",
            },
            columnDefs: [
                { width: '80px', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '10%', targets: 5 },
                { width: '10%', targets: 6 },
                { width: '10%', targets: 7 },
                { width: '30%', targets: 8 },
                { width: '30%', targets: 9 },
                { width: '30%', targets: 10 },
                { width: '30%', targets: 11 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [{
                    data: null
                    , render: function(data, type, row) {
                        if(!data.HinhAnh){
                            var img = "";
                        } else  var img = data.HinhAnh.toString();
                        if (data.HinhAnh) {
                            return `<td class="text-center">
                                        <div class="ul-widget-app__profile-pic">
                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/sanphams/${img}') }}" alt="">
                                        </div>
                                    </td>`;
                        } else {
                            return '<td class="text-center"><div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt=""></div></td>';
                        }
                    }
                }
                , {
                    data: 'MaSanPham'
                }
                , {
                    data: 'TenSanPham'
                }
                , {
                    data: 'Serinal'
                }
                , {
                    data: 'Gia'
                }
                , {
                    data: 'ThuongHieu'
                }
                , {
                    data: 'MoTa'
                }
                , {
                    data: 'KichCo'
                }
                , {
                    data: 'GhiChu'
                }
                , {
                    data: 'ChiNhanh'
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'TrangThai'
                    , render: function(data) {
                        if (data == '1') {
                            return 'Hoạt động';
                        } else if (data == '0') {
                            return 'Bị Khoá';
                        } else {
                            return 'NULL';
                        }
                    }
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var editUrl = "{{ route('capnhatTK-view', ['id' => ':id']) }}";
                        var detailUrl = "{{ route('chitietTK', ['id' => ':id']) }}";
                        var deleteUrl = "{{ route('xoaTK-del', ['id' => ':id']) }}";

                        return `<td class="text-center">
                                    <a href="${editUrl.replace(':id', data.id)}" class="ul-link-action text-success" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.id)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                    <a id="deleteCurUser" class="ul-link-action text-danger mr-1 delete-user" data-toggle="tooltip" data-placement="top" title="Xoá tài khoản này!!!">
                                        <i class="i-Eraser-2"></i>
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

    $('#ul-contact-list').on('click', 'a.delete-user', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var email = data['email'];
        // Hiển thị popup confirm
        swal({
            title: 'Bạn có chắc muốn xoá?',
            text: "Sau khi xác nhận " + email + " sẽ bị xoá khỏi hệ thống!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận xoá!',
            cancelButtonText: 'Huỷ thao tác!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: true
        }).then(function() {
            $.ajax({
                url: "{{ route('xoaTK-del', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                success: function(data) {
                swal('Đã xoá!', 'Dữ liệu đã được xoá thành công.', 'success').then(function() {
                    // Load lại datatable sau khi xoá thành công
                    $('#ul-contact-list').DataTable().ajax.reload(null, false);
                });
                },
                error: function(xhr, status, error) {
                swal('Xoá thất bại', 'Đã có lỗi xảy ra khi xoá dữ liệu', 'error');
                }
            });
        }, function(dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Huỷ thao tác'
                        , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                        , 'error'
                    )
                }
            });
    });
</script>
@endsection
