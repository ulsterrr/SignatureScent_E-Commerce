@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách </h1>
    <ul>
        <li><a href="">Mã khuyến mãi</a></li>
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
        <div class="col-md-12">
            <div id="alert-card" class="alert alert-card fade show" role="alert"  style="display: none;">
                {{-- <strong class="text-capitalize">Success!</strong> --}}
                <strong class="alert-heading text-capitalize"></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="alert-body-content"></div>
            </div>
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <!-- begin::modal-add -->
                <div class="card-header text-right bg-transparent">
                    <a type="button" href="#" data-toggle="modal" data-target="#lspmodal-add" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm loại mới</a>
                </div>
                <div id="lspmodal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Thêm mới Mã khuyến mãi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="new-LSP">
                                <div class="card mb-4">
                                    <div class="col-md-12 mt-3">
                                        <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
                                            <div class="alert-body-content"></div>
                                        </div>
                                    </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="MaLoai" class="required">Mã loại *</label>
                                        <input onfocusout="checkMaLSPUnique()" id="MaLoai" name="MaLoai" type="text" class="form-control" placeholder="VD: LSP01, LSP02,...">
                                    </div>
                                    <div class="form-group">
                                        <label for="TenLoai" class="required">Tên loại *</label>
                                        <input type="text" class="form-control" name="TenLoai" id="TenLoai" aria-describedby="emailHelp" placeholder="Loại A, B, C,...">
                                    </div>
                                    <div class="form-group">
                                        <label for="GhiChu">Ghi chú</label>
                                        <textarea class="form-control" name="GhiChu" id="GhiChu" rows="5" placeholder="..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="NguoiTao">Người thực hiện</label>
                                        <input id="NguoiTao"name="NguoiTao" type="text" disabled class="form-control" value="{{ auth()->user() ? auth()->user()->HoTen : 'NULL' }}" placeholder="VD: LSP0001, LSP0002,...">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id="saveLSPModal" class="btn btn-primary">Thêm mới</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::modal-add -->

                <!-- begin::modal-edit -->
                <div id="lspmodal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Cập nhật Mã khuyến mãi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="upd-LSP">
                                    <input hidden id="IDLSP-e" name="IDLSP-e" type="text" class="form-control">
                                    <div class="form-group">
                                        <label for="MaLoai" class="required">Mã loại *</label>
                                        <input id="MaLoai-e" name="MaLoai-e" type="text" class="form-control" placeholder="VD: LSP0001, LSP0002,...">
                                    </div>
                                    <div class="form-group">
                                        <label for="TenLoai" class="required">Tên loại *</label>
                                        <input type="text" class="form-control" name="TenLoai-e" id="TenLoai-e" aria-describedby="emailHelp" placeholder="Loại A, B, C,...">
                                    </div>
                                    <div class="form-group">
                                        <label for="GhiChu">Ghi chú</label>
                                        <textarea class="form-control" name="GhiChu-e" id="GhiChu-e" rows="5" placeholder="..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="NguoiTao">Người thực hiện</label>
                                        <input id="NguoiTao-e"name="NguoiTao-e" type="text" disabled class="form-control" value="{{ auth()->user() ? auth()->user()->HoTen : 'NULL' }}" placeholder="VD: LSP0001, LSP0002,...">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id="updateLSPModal" class="btn btn-primary">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::modal-edit -->

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 80px">Id</th>
                                    <th style="width: 20%">Mã loại</th>
                                    <th style="width: 30%">Tên loại</th>
                                    <th style="width: 50%">Ghi chú</th>
                                    <th style="width: 50%">Người tạo</th>
                                    <th style="width: 50%">Thời gian tạo</th>
                                    <th style="width: 50%">Thao tác</th>
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
                url: "{{ route('layLoaiSPAjax') }}",
                type: "GET",
            },
            columnDefs: [
                { width: '80px', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '40%', targets: 2 },
                { width: '30%', targets: 3 },
                { width: '30%', targets: 4 },
                { width: '30%', targets: 5 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
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
                        var editUrl = "{{ route('capnhatLoaiSPham-upd', ['id' => ':id']) }}";
                        return `<td class="text-center">
                                    <a id="updateLSP" class="ul-link-action text-success update-lsp" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a id="deleteCurUser" class="ul-link-action text-danger mr-1 delete-user" data-toggle="tooltip" data-placement="top" title="Xoá loại này!!!">
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
        var ml = data['MaLoai'];
        // Hiển thị popup confirm
        swal({
            title: 'Bạn có chắc muốn xoá?',
            text: "Sau khi xác nhận " + ml + " sẽ bị xoá khỏi hệ thống!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận xoá!',
            cancelButtonText: 'Huỷ thao tác!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: true
        }).then(function() {
            $.ajax({
                url: "{{ route('xoaLoaiSPham-del', ['id' => ':id']) }}".replace(':id', id),
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

    //gọi modal cập nhật
    $('#ul-contact-list').on('click', 'a.update-lsp', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var ml = data['MaLoai'];
        var tl = data['TenLoai'];
        var gc = data['GhiChu'];
        $('#IDLSP-e').val(id);
        $('#MaLoai-e').val(ml);
        $('#TenLoai-e').val(tl);
        $('#GhiChu-e').val(gc);
        $('#lspmodal-edit').modal('show'); // Ẩn modal

    });
</script>
<script>
    //button thêm mới
    $(document).ready(function() {
        $('#saveLSPModal').click(function() {
            $('#new-LSP').valid();
            if($('#new-LSP').valid()){
                var ml = $('#MaLoai').val();
                var tl = $('#TenLoai').val();
                var gc = $('#GhiChu').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('themLoaiSPham-add') }}",
                    type: 'POST',
                    data: {
                        MaLoai: ml,
                        TenLoai: tl,
                        GhiChu: gc,
                        _token: token
                    },
                    success: function(response) {
                        // Xử lý kết quả trả về từ server
                        $('#MaLoai').val('');
                        $('#TenLoai').val('');
                        $('#GhiChu').val('');
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                        $('#lspmodal-add').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                        $('#alert-card .alert-heading').html('Thành công');
                        $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function(){
                            $("#alert-card").fadeOut();
                        }, 5000);
                    },
                    error: function(response) {
                        // Xử lý lỗi
                    }
                });
            }
        });
    });

    //button cập nhật
    $(document).ready(function() {
        $('#updateLSPModal').click(function() {
            $('#upd-LSP').valid();
            if($('#upd-LSP').valid()){
                var id = $('#IDLSP-e').val();
                var ml = $('#MaLoai-e').val();
                var tl = $('#TenLoai-e').val();
                var gc = $('#GhiChu-e').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('capnhatLoaiSPham-upd', ['id' => ':id']) }}".replace(':id', id),
                    type: 'POST',
                    data: {
                        Id: id,
                        MaLoai: ml,
                        TenLoai: tl,
                        GhiChu: gc,
                        _token: token
                    },
                    success: function(response) {
                        // Xử lý kết quả trả về từ server
                        $('#MaLoai').val('');
                        $('#TenLoai').val('');
                        $('#GhiChu').val('');
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                        $('#lspmodal-edit').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                        $('#alert-card .alert-heading').html('Thành công');
                        $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function(){
                            $("#alert-card").fadeOut();
                        }, 5000);
                    },
                    error: function(response) {
                        $('#lspmodal-edit').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-success').addClass('alert-danger');
                        $('#alert-card .alert-heading').html('Lỗi');
                        $('#alert-card .alert-body-content').html('Dữ liệu không được xử lý thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function(){
                            $("#alert-card").fadeOut();
                        }, 5000);
                    }
                });
            }
        });
    });
</script>

{{-- validation --}}
<script>
    $(document).ready(function() {
      $("#new-LSP").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            MaLoai: "required",
            TenLoai: "required",

        },
        messages: {
            MaLoai: "Vui lòng nhập mã Mã khuyến mãi",
            TenLoai: "Vui lòng nhập tên loại",
        },
      });

      $("#upd-LSP").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            }
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            'MaLoai-e': "required",
            'TenLoai-e': "required",

        },
        messages: {
            'MaLoai-e': "Vui lòng nhập mã Mã khuyến mãi",
            'TenLoai-e': "Vui lòng nhập tên loại",
        }
      });
    });

    //Check trùng mã loại sp
    function checkMaLSPUnique() {
        var fieldValue = $('#MaLoai').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kiemtra-malsp') }}",
            method: 'POST',
            data: {
                MaLoai: fieldValue, // Đặt giá trị của $recordId tương ứng với bản ghi hiện tại
                _token: token
            },
            success: function(response) {
                if (response.valid) {
                    // Giá trị đã tồn tại, có lỗi
                    $('#alert-card-sp-modal').css('display', '');
                    $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-sp-modal .alert-body-content').html(`MaLoai: ${fieldValue} đã có thông tin tài khoản trong hệ thống.`);
                    $('#alert-card-sp-modal').fadeIn(100);
                } else {
                    // Giá trị là duy nhất, không có lỗi
                    $('#alert-card-sp-modal').css('display', 'none');
                }
            }
        });
    };
  </script>
@endsection
