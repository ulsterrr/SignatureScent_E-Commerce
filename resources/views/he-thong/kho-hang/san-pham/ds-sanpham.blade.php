@extends('layouts.admin.master')
@section('title', 'Danh sách sản phẩm')
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
        <li><a href="">Sản Phẩm</a></li>
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
                {{-- <div class="card-header text-right bg-transparent">
                    <a type="button" href="{{ route('themSPham-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Nhập mới sản phẩm</a>
                </div> --}}

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
                                <a type="button" href="{{ route('themSPham-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Nhập mới sản phẩm</a>
                            </div>
                            <div class="col-md-12 mt-2"></div>
                            <div class="col-md-3">
                                <label for="MaSanPham">Mã sản phẩm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="MaSanPham" name="MaSanPham" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="TenSanPham">Tên sản phẩm</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" placeholder="" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="ThuongHieu">Thương hiệu</label>
                                <input type="text" class="form-control" name="ThuongHieu" id="ThuongHieu" placeholder="ABC">
                            </div>
                            <div class="col-md-3">
                                <label for="GiaTien">Giá tiền</label>
                                <input type="number" class="form-control" name="GiaTien" id="GiaTien">
                            </div>
                            <div class="col-md-3">
                                <label for="LoaiSanPham">Loại sản phẩm:</label>
                                <select class="form-control" name="LoaiSanPham" id="LoaiSanPham">
                                    <option value="">Tất cả</option>
                                    @foreach($LoaiSP as $lsp)
                                        <option value="{{ $lsp->MaLoai }}">{{ $lsp->TenLoai }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="LoaiKichCo">Loại kích cỡ:</label>
                                <select class="form-control" name="LoaiKichCo" id="LoaiKichCo">
                                    <option value="">Tất cả</option>
                                    @foreach($LoaiKC as $lkc)
                                        <option value="{{ $lkc->MaKichCo }}">{{ $lkc->TenKichCo }}</option>
                                    @endforeach
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
                                    <th style="width: 80px">Hình ảnh</th>
                                    <th style="width: 20%">Mã sản phẩm</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th style="width: 50%">Giá</th>
                                    <th style="width: 30%" class="text-center">Mô tả</th>
                                    <th style="width: 30%">Ngày tạo</th>
                                    <th style="width: 50%">Thương hiệu</th>
                                    <th style="width: 50%">Loại sản phẩm</th>
                                    <th style="width: 30%">Quy cách</th>
                                    <th style="width: 30%">Trạng thái</th>
                                    <th style="width: 30%">Ghi chú</th>
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

<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

{{-- Ajax load data cho ds user --}}
<script>
    $(document).ready(function() {
            var localization_vi = `{{ asset('assets/js/datatables-vi.json') }}`;
        var table = $('#ul-contact-list').DataTable({
            language: {
                url: localization_vi,
            },
            processing: true
            // , serverSide: true
            , destroy: true
            , scrollCollapse: true
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
                { width: '30%', targets: 5 },
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
                                        <img class="avatar-lg" src="{{ asset('assets/images/san_pham/${img}') }}" alt="">
                                    </td>`;
                        } else {
                            return `<td class="text-center">
                                        <div class="ul-widget-app__profile-pic"><img class="avatar-lg" src="{{ asset('assets/images/faces/1.jpg') }}" alt=""></div>
                                    </td>`;
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
                    data: null
                    , render: function(data) {
                        let amount = data.GiaTien;
                        if(!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: 'MoTa'
                    , render: function(data) {
                        var mota = data;
                        return `<textarea style="width: 350px" class="form-control" rows="3" readonly name="MoTa" id="MoTa" placeholder="...">${mota}</textarea>`;
                    }
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'ThuongHieu'
                }
                , {
                    data: null
                    , render: function(data) {
                        if(!data.loai_san_pham)
                        return '';
                        else return data.loai_san_pham.TenLoai;
                    }
                }
                , {
                    data: null
                    , render: function(data) {
                        if(!data.loai_kich_co)
                        return '';
                        else return data.loai_kich_co.TenKichCo;
                    }
                }
                , {
                    data: 'TrangThai'
                    , render: function(data) {
                        if (data == '1') {
                            return 'Bình thường';
                        } else if (data == '0') {
                            return 'Ngưng nhập hàng';
                        } else {
                            return 'Tồn kho';
                        }
                    }
                }
                , {
                    data: 'GhiChu'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var editUrl = "{{ route('capnhatSPham-view', ['id' => ':id']) }}";
                        var detailUrl = "{{ route('chitietSPham-view', ['id' => ':id']) }}";

                        return `<td class="text-center">
                                    <a href="${editUrl.replace(':id', data.MaSanPham)}" class="ul-link-action text-success" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a href="${detailUrl.replace(':id', data.MaSanPham)}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible"></i>
                                    </a>
                                    <a id="deleteCurUser" class="ul-link-action text-danger mr-1 delete-user" data-toggle="tooltip" data-placement="top" title="Xoá sản phẩm này!!!">
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
                url: "{{ route('xoaSPham-del', ['id' => ':id']) }}".replace(':id', id),
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
<script>
    $(document).ready(function(){
        $('#created_at_to, #created_at_from').pickadate({
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
            url: "{{ route('layDsSanPhamFilter') }}",
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
