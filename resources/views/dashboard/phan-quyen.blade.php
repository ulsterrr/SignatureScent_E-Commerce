@extends('layouts.admin.master')
@section('title', 'Phân quyền loại tài khoản')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Phân quyền</h1>
    <ul>
        <li><a href="">Loại tài khoản</a></li>
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

                    <!-- begin::modal-edit -->
                    <div id="capnhat_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Cập nhật thông tin quyền</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="phan_quyen" method="POST" class="mb-0 mt-2">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="card mb-4">
                                                <div id="body_phanquyen" class="card-body">
                                                    <div class="card-title">Quyền truy cập</div>
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-6 mt-3 mb-3 text-center ">
                                                                <label name="quyen[]" class="switch switch-primary mr-3">
                                                                    <input type="checkbox" value="">
                                                                    <span class="slider"></span>
                                                                </label>
                                                        </div>
                                                        <div class="col-md-6 mt-3 mb-3">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                    {{-- <button type="button" id="updateKMModal" class="btn btn-primary">Lưu thay đổi</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end::modal-edit -->
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="loaitaikhoan_table" class="display table" style="width:100%; overflow-y: scroll">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">Id</th>
                                        <th style="width: 10%">Mã Loại</th>
                                        <th style="width: 20%">Tên Loại Tài Khoản</th>
                                        <th style="width: 250px">Ghi chú</th>
                                        <th style="width: 20%">Người tạo</th>
                                        <th style="width: 20%">Ngày tạo</th>
                                        <th style="width: 50px;text-align: center;">Thao tác</th>
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
        var localization_vi = `{{ asset('assets/js/datatables-vi.json') }}`;
        var table = $('#loaitaikhoan_table').DataTable({
            language: {
                url: localization_vi
            , }
            , processing: true
            , serverSide: true
            , destroy: true
            , scrollX: true
            , autoWidth: true
            , ajax: {
                url: "{{ route('loaiTaiKhoanAjax') }}"
                , type: "GET"
            , }
            , columnDefs: [{
                    width: '80px'
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
                    width: '40%',
                    targets: 3,
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).css("text-wrap", "wrap");
                    }
                }
                , {
                    width: '20%'
                    , targets: 4
                }
                , {
                    width: '80px'
                    , targets: 5,
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).css("text-align", "center");
                    }
                }
            , ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [{
                    data: 'id'
                }
                , {
                    data: 'MaLoai'
                }
                , {
                    data: 'TenLoai'
                }
                , {
                    data: 'GhiChu'
                }
                , {
                    data: 'NguoiTao'
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        return `<td class="text-center">
                                    <a id="updateLSP" href="#" class="ul-link-action text-success update-lsp" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                        <i class="i-Edit"></i>
                                    </a>
                                </td>`;
                    },

                }

            ]
            , "drawCallback": function(settings) {
                $(settings.nTable).find('.paginate_button').click(function() {
                    settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                    $(settings.nTable).dataTable(settings);
                });
            }
        });
    });


</script>
<script>
    //button cập nhật
    $(document).ready(function() {
        $('#updateLSPModal').click(function() {
            $('#upd-LSP').valid();
            if ($('#upd-LSP').valid()) {
                var id = $('#IDLSP-e').val();
                var ml = $('#MaLoai-e').val();
                var tl = $('#TenLoai-e').val();
                var gc = $('#GhiChu-e').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('capnhatLoaiSPham-upd', ['id' => ':id']) }}".replace(':id', id)
                    , type: 'POST'
                    , data: {
                        Id: id
                        , MaLoai: ml
                        , TenLoai: tl
                        , GhiChu: gc
                        , _token: token
                    }
                    , success: function(response) {
                        // Xử lý kết quả trả về từ server
                        $('#MaLoai').val('');
                        $('#TenLoai').val('');
                        $('#GhiChu').val('');
                        $('#loaitaikhoan_table').DataTable().ajax.reload(null, false);
                        $('#lspmodal-edit').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                        $('#alert-card .alert-heading').html('Thành công');
                        $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function() {
                            $("#alert-card").fadeOut();
                        }, 5000);
                    }
                    , error: function(response) {
                        $('#lspmodal-edit').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-success').addClass('alert-danger');
                        $('#alert-card .alert-heading').html('Lỗi');
                        $('#alert-card .alert-body-content').html('Dữ liệu không được xử lý thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function() {
                            $("#alert-card").fadeOut();
                        }, 5000);
                    }
                });
            }
        });
    });

    //gọi modal cập nhật
    $('#loaitaikhoan_table').on('click', 'a.update-lsp', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#loaitaikhoan_table').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['MaLoai'];
        hienThiPhanQuyen(id);

    });

    function hienThiPhanQuyen(maLoaiTaiKhoan) {
        $.ajax({
            url: "{{ route('phanquyen-ajax') }}",
            type: 'POST',
            data: {
                maLoaiTaiKhoan: maLoaiTaiKhoan,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Xóa các checkbox cũ
                $('#phan_quyen input[type="checkbox"]').remove();
                var container = $('#body_phanquyen');
                container.empty();

                // Hiển thị các checkbox mới
                $.each(response.phanQuyens, function(index, phanQuyen) {
                    var divRow = $('<div>').addClass('col-md-12 row').appendTo(container);
                    var divCol1 = $('<div>').addClass('col-md-6 mt-3 mb-3 text-center').appendTo(divRow);
                    var label = $('<label>').attr('id', phanQuyen.MaQuyen).attr('name', 'quyen[]').addClass('switch switch-primary mr-3').appendTo(divCol1);
                    // var checkbox = $('<input>').attr('type', 'checkbox').val(phanQuyen.MaQuyen).appendTo(label);
                    var checkbox = $('<input>')
                                    .attr('type', 'checkbox')
                                    .val(phanQuyen.MaQuyen)
                                    .data('id', phanQuyen.id)
                                    .attr('id', 'checkbox_' + phanQuyen.id)
                                    .on('change', function() {
                                        var mq = $(this).data('id');
                                        var trangThai = $(this).is(':checked') ? 1 : 0;

                                        // Gửi yêu cầu cập nhật trạng thái
                                        $.ajax({
                                            url: "{{ route('capnhat.phanquyen-ajax') }}",
                                            type: 'POST',
                                            data: {
                                                id: mq,
                                                trangThai: trangThai,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                // Xử lý thành công (nếu cần)
                                            },
                                            error: function(xhr, status, error) {
                                                // Xử lý lỗi (nếu cần)
                                            }
                                        });
                                    })
                                    .appendTo(label);

                    if (phanQuyen.TrangThai === 1) {
                        checkbox.prop('checked', true);
                    }
                    $('<span>').addClass('slider').appendTo(label);

                    $('<div>').addClass('col-md-6 mt-3 mb-3').append($('<span>').text(phanQuyen.TenQuyen)).appendTo(divRow);
                });

                // Gọi modal cập nhật
                $('#capnhat_modal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    $(document).on('change', '.phanquyen-checkbox', function() {
        var mq = $(this).data('id');
        var trangThai = $(this).is(':checked') ? 1 : 0;

        // Gửi yêu cầu cập nhật trạng thái
        $.ajax({
            url: "{{ route('capnhat.phanquyen-ajax') }}",
            type: 'POST',
            data: {
                maQuyen: mq,
                trangThai: trangThai,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Xử lý thành công (nếu cần)
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi (nếu cần)
            }
        });
    });


</script>
@endsection
