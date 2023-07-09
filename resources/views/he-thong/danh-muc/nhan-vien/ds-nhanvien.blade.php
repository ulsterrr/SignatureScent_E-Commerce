@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách </h1>
    <ul>
        <li><a href="">Tài Khoản</a></li>
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
                    <a type="button" href="{{ route('them-thongtin-nv-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm nhân viên</a>
                </div>
                <!-- begin::modal -->
                <div class="ul-card-list__modal">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Họ tên</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="" placeholder="number....">
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <div class="col-form-label col-sm-2 pt-0">Radios</div>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="">
                                                        <label class="form-check-label ml-3" for="gridRadios1">
                                                            First radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                        <label class="form-check-label ml-3" for="gridRadios2">
                                                            Second radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled ">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled="">
                                                        <label class="form-check-label ml-3" for="gridRadios3">
                                                            Third disabled radio
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-2">Ô kiểm</div>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                    <label class="form-check-label ml-3" for="gridCheck1">
                                                        Ô kiểm ví dụ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">

                                                <button type="submit" class="btn btn-success">Nâng cấp</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::modal -->

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 80px">Avatar</th>
                                    <th style="width: 20%">Họ và Tên</th>
                                    <th style="width: 20%">Email</th>
                                    <th style="width: 50%">Số điện thoại</th>
                                    <th style="width: 50%">Năm sinh</th>
                                    <th style="width: 50%">Ngày tham gia</th>
                                    <th style="width: 50%">Phân loại</th>
                                    <th style="width: 50%">Trạng Thái</th>
                                    <th style="width: 30%">Địa chỉ</th>
                                    <th style="width: 30%">Quận Huyện</th>
                                    <th style="width: 30%">Tỉnh Thành</th>
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
        var localization_vi = `{{ asset('assets/js/datatables-vi.json') }}`;
        var table = $('#ul-contact-list').DataTable({
            language: {
                url: localization_vi,
            },
            processing: true
            , serverSide: true
            , destroy: true
            // , scrollY: "1000px"
            , scrollX: true
            , autoWidth: true
            // , ajax: {
            //     url: "{{ route('dsUserAjax') }}"
            //     , type: 'GET',
            // },
            ,ajax: {
                url: "{{ route('dsNvienAjax') }}",
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
                        if(!data.AnhDaiDien){
                            var img = "";
                        } else  var img = data.AnhDaiDien.toString();
                        if (data.AnhDaiDien) {
                            return `<td class="text-center">
                                        <div class="ul-widget-app__profile-pic">
                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/${img}') }}" alt="">
                                        </div>
                                    </td>`;
                        } else {
                            return '<td class="text-center"><div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt=""></div></td>';
                        }
                    }
                }
                , {
                    data: 'HoTen'
                }
                , {
                    data: 'email'
                }
                , {
                    data: 'SDT'
                }
                , {
                    data: 'NgaySinh'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY');
                    }
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'LoaiTaiKhoan'
                    , render: function(data) {
                        if (data == 'A') {
                            return '<a href="#" class="badge badge-danger p-2">Admin</a>';
                        } else if (data == 'M') {
                            return '<a href="#" class="badge badge-info p-2">Quản lý</a>';
                        } else if (data == 'E') {
                            return '<a href="#" class="badge badge-primary p-2">Nhân viên</a>';
                        } else if (data == 'C') {
                            return '<a href="#" class="badge badge-success p-2">Khách hàng</a>';
                        } else if (data == 'V') {
                            return '<a href="#" class="badge badge-warning p-2">Khách VIP</a>';
                        } else {
                            return '';
                        }
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
                    data: 'DiaChi'
                }
                , {
                    data: 'QuanHuyen'
                }
                , {
                    data: 'TinhThanh'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var editUrl = "{{ route('capnhat-thongtin-nv-view', ['id' => ':id']) }}";
                        var detailUrl = "{{ route('chi-tiet-nv-view', ['id' => ':id']) }}";
                        var deleteUrl = "{{ route('xoaNV-del', ['id' => ':id']) }}";

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
                url: "{{ route('xoaNV-del', ['id' => ':id']) }}".replace(':id', id),
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
