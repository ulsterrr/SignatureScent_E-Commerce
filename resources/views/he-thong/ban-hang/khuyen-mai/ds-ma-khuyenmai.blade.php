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
            <div id="alert-card" class="alert alert-card fade show" role="alert" style="display: none;">
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
                    <a type="button" href="#" data-toggle="modal" data-target="#kmmodal-add" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm khuyến mãi mới</a>
                </div>

                <div id="kmmodal-add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Thêm mới Mã khuyến mãi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12 mt-3">
                                    <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert" style="display: none;">
                                        <div class="alert-body-content"></div>
                                    </div>
                                </div>
                                <form id="new-KM">
                                        <div class="form-group">
                                            <label for="MaKhuyenMai" class="required">Mã khuyến mãi *</label>
                                            <input onfocusout="checkMaKMUnique()" id="MaKhuyenMai" name="MaKhuyenMai" type="text" class="form-control" placeholder="VD: KM01, KM02,...">
                                        </div>
                                        <div class="form-group">
                                            <label for="NoiDung" class="required">Nội dung khuyến mãi *</label>
                                            <input type="text" class="form-control" name="NoiDung" id="NoiDung" aria-describedby="emailHelp" placeholder="Loại A, B, C,...">
                                        </div>
                                        <div class="form-group">
                                            <label for="NoiDung" class="required">Số lượng *</label>
                                            <input type="text" class="form-control" name="SoLuong" id="SoLuong" value="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="NoiDung" class="required">Giá trị khuyến mãi *</label>
                                            <input type="text" class="form-control" name="GiaTri" id="GiaTri" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="NguoiTao">Người thực hiện</label>
                                            <input id="NguoiTao" name="NguoiTao" type="text" disabled class="form-control" value="{{ auth()->user() ? auth()->user()->HoTen : 'NULL' }}" placeholder="VD: KM0001, KM0002,...">
                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id="saveKMModal" class="btn btn-primary">Thêm mới</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end::modal-add -->

                <!-- begin::modal-edit -->
                <div id="kmmodal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <form id="upd-KM">
                                    <input hidden id="IDKM-e" name="IDKM-e" type="text" class="form-control">
                                    <div class="form-group">
                                        <label for="MaKhuyenMai" class="required">Mã khuyến mãi *</label>
                                        <input id="MaKhuyenMai-e" name="MaKhuyenMai-e" type="text" class="form-control" placeholder="VD: KM0001, ABCEDF, SCENTSIGNATUREVIP">
                                    </div>
                                    <div class="form-group">
                                        <label for="NoiDung" class="required">Tên khuyến mãi *</label>
                                        <input type="text" class="form-control" name="NoiDung-e" id="NoiDung-e" aria-describedby="emailHelp" placeholder="Loại A, B, C,...">
                                    </div>
                                    <div class="form-group">
                                        <label for="NoiDung" class="required">Số lượng *</label>
                                        <input type="text" class="form-control" name="SoLuong-e" id="SoLuong-e" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="NoiDung" class="required">Giá trị khuyến mãi *</label>
                                        <input type="text" class="form-control" name="GiaTri-e" id="GiaTri-e" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label for="NguoiTao">Người thực hiện</label>
                                        <input id="NguoiTao-e" name="NguoiTao-e" type="text" disabled class="form-control" value="{{ auth()->user() ? auth()->user()->HoTen : 'NULL' }}" placeholder="VD: KM0001, KM0002,...">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" id="updateKMModal" class="btn btn-primary">Lưu thay đổi</button>
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
                                    <th style="width: 10%">Mã khuyến mãi</th>
                                    <th style="width: 30%">Nội dung</th>
                                    <th style="width: 20%">Số lượng</th>
                                    <th style="width: 20%">Giá trị KM</th>
                                    <th style="width: 20%">Người tạo</th>
                                    <th style="width: 30%">Thời gian tạo</th>
                                    <th style="width: 20%">Thao tác</th>
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
                url: localization_vi
            , }
            , processing: true
            , serverSide: true
            , destroy: true
            , scrollX: true
            , autoWidth: true
            , ajax: {
                url: "{{ route('layDsMKMAjax') }}"
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
                    width: '40%'
                    , targets: 2
                }
                , {
                    width: '30%'
                    , targets: 3
                }
                , {
                    width: '30%'
                    , targets: 4
                }
                , {
                    width: '30%'
                    , targets: 5
                }
            , ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [{
                    data: 'id'
                }
                , {
                    data: 'MaKhuyenMai'
                }
                , {
                    data: 'NoiDung'
                }
                , {
                    data: 'SoLuong'
                }
                , {
                    data: 'GiaTri'
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
                        var editUrl = "{{ route('capnhatMKM-upd', ['id' => ':id']) }}";
                        return `<td class="text-center">
                                    <a id="updateKM" class="ul-link-action text-success update-km" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a id="deleteCurUser" class="ul-link-action text-danger mr-1 delete-user" data-toggle="tooltip" data-placement="top" title="Xoá khuyến mãi này!!!">
                                        <i class="i-Eraser-2"></i>
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

    $('#ul-contact-list').on('click', 'a.delete-user', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var ml = data['MaKhuyenMai'];
        // Hiển thị popup confirm
        swal({
            title: 'Bạn có chắc muốn xoá?'
            , text: "Sau khi xác nhận " + ml + " sẽ bị xoá khỏi hệ thống!"
            , type: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Xác nhận xoá!'
            , cancelButtonText: 'Huỷ thao tác!'
            , confirmButtonClass: 'btn btn-success mr-5'
            , cancelButtonClass: 'btn btn-danger'
            , buttonsStyling: true
        }).then(function() {
            $.ajax({
                url: "{{ route('xoaMKM-del', ['id' => ':id']) }}".replace(':id', id)
                , type: 'GET'
                , data: {
                    _token: '{{ csrf_token() }}'
                }, // Đảm bảo token csrf đúng
                success: function(data) {
                    swal('Đã xoá!', 'Dữ liệu đã được xoá thành công.', 'success').then(function() {
                        // Load lại datatable sau khi xoá thành công
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                    });
                }
                , error: function(xhr, status, error) {
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
    $('#ul-contact-list').on('click', 'a.update-km', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var ml = data['MaKhuyenMai'];
        var tl = data['NoiDung'];
        var gc = data['SoLuong'];
        var gt = data['GiaTri'];
        $('#IDKM-e').val(id);
        $('#MaKhuyenMai-e').val(ml);
        $('#NoiDung-e').val(tl);
        $('#SoLuong-e').val(gc);
        $('#GiaTri-e').val(gt);
        $('#kmmodal-edit').modal('show'); // Ẩn modal

    });

</script>
<script>
    //button thêm mới
    $(document).ready(function() {
        $('#saveKMModal').click(function() {
            $('#new-KM').valid();
            if ($('#new-KM').valid()) {
                var ml = $('#MaKhuyenMai').val();
                var tl = $('#NoiDung').val();
                var gc = $('#SoLuong').val();
                var gt = $('#GiaTri').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('themMKM-add') }}"
                    , type: 'POST'
                    , data: {
                        MaKhuyenMai: ml
                        , NoiDung: tl
                        , SoLuong: gc
                        , GiaTri: gt
                        , _token: token
                    }
                    , success: function(response) {
                        // Xử lý kết quả trả về từ server
                        $('#MaKhuyenMai').val('');
                        $('#NoiDung').val('');
                        $('#SoLuong').val('');
                        $('#GiaTri').val();
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                        $('#kmmodal-add').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                        $('#alert-card .alert-heading').html('Thành công');
                        $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function() {
                            $("#alert-card").fadeOut();
                        }, 5000);
                    }
                    , error: function(response) {
                        // Xử lý lỗi
                    }
                });
            }
        });
    });

    //button cập nhật
    $(document).ready(function() {
        $('#updateKMModal').click(function() {
            $('#upd-KM').valid();
            if ($('#upd-KM').valid()) {
                var id = $('#IDKM-e').val();
                var ml = $('#MaKhuyenMai-e').val();
                var tl = $('#NoiDung-e').val();
                var gc = $('#SoLuong-e').val();
                var gt = $('#GiaTri-e').val();
                var token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('capnhatMKM-upd', ['id' => ':id']) }}".replace(':id', id)
                    , type: 'POST'
                    , data: {
                        Id: id
                        , MaKhuyenMai: ml
                        , NoiDung: tl
                        , SoLuong: gc
                        , GiaTri: gt
                        , _token: token
                    }
                    , success: function(response) {
                        // Xử lý kết quả trả về từ server
                        $('#MaKhuyenMai').val('');
                        $('#NoiDung').val('');
                        $('#SoLuong').val('');
                        $('#GiaTri-e').val('');
                        $('#ul-contact-list').DataTable().ajax.reload(null, false);
                        $('#kmmodal-edit').modal('hide'); // Ẩn modal
                        $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                        $('#alert-card .alert-heading').html('Thành công');
                        $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                        $('#alert-card').fadeIn(500);
                        setTimeout(function() {
                            $("#alert-card").fadeOut();
                        }, 5000);
                    }
                    , error: function(response) {
                        $('#kmmodal-edit').modal('hide'); // Ẩn modal
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

</script>

{{-- validation --}}
<script>
    $(document).ready(function() {
        $("#new-KM").validate({
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                MaKhuyenMai: "required"
                , NoiDung: "required"
                , SoLuong: "required"
                , GiaTri: "required",

            }
            , messages: {
                MaKhuyenMai: "Vui lòng nhập mã Mã khuyến mãi"
                , NoiDung: "Vui lòng nhập nội dung khuyến mãi"
                , SoLuong: "Vui lòng nhập số lượng"
                , GiaTri: "Vui lòng nhập giá trị khuyến mãi"
            , }
        , });

        $("#upd-KM").validate({
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                'MaKhuyenMai-e': "required"
                , 'NoiDung-e': "required"
                , 'SoLuong-e': "required"
                , 'GiaTri-e': "required",

            }
            , messages: {
                'MaKhuyenMai-e': "Vui lòng nhập mã Mã khuyến mãi"
                , 'NoiDung-e': "Vui lòng nhập nội dung khuyến mãi"
                , 'SoLuong-e': "Vui lòng nhập số lượng"
                , 'GiaTri-e': "Vui lòng nhập giá trị khuyến mãi"
            , }
        });
    });

    //Check trùng mã khuyến mãi sp
    function checkMaKMUnique() {
        var fieldValue = $('#MaKhuyenMai').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kiemtra-makm') }}"
            , method: 'POST'
            , data: {
                MaKhuyenMai: fieldValue, // Đặt giá trị của $recordId tương ứng với bản ghi hiện tại
                _token: token
            }
            , success: function(response) {
                if (response.valid) {
                    // Giá trị đã tồn tại, có lỗi
                    $('#alert-card-sp-modal').css('display', '');
                    $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-sp-modal .alert-body-content').html(`MaKhuyenMai: ${fieldValue} đã có thông tin trong hệ thống.`);
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

