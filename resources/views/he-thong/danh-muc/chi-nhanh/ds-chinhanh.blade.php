@extends('layouts.admin.master')
@section('title', 'Danh sách chi nhánh')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách</h1>
    <ul>
        <li><a href="">Quản lý</a></li>
        <li>Chi Nhánh</li>
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
                    <a type="button" href="{{ route('themmoiCN-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm chi nhánh</a>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Mã chi nhánh</th>
                                    <th>Tên chi nhánh</th>
                                    <th>Số điện thoại 1</th>
                                    <th>Số điện thoại 2</th>
                                    <th>Số điện thoại 3</th>
                                    <th>Số FAX</th>
                                    <th>Số Momo</th>
                                    <th>Số tài khoản</th>
                                    <th>Địa chỉ</th>
                                    <th>Quận/Huyện</th>
                                    <th>Tỉnh/Thành</th>
                                    <th>Người quản lý</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $ChiNhanh as $data )
                                <tr>
                                    <td class="text-center">
                                        <div class="ul-widget-app__profile-pic">
                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt="">
                                        </div>
                                    </td>
                                    <td>{{$data->MaChiNhanh}}</td>
                                    <td>{{$data->TenChiNhanh}}</td>
                                    <td>{{$data->SDT1}}</td>
                                    <td>{{$data->SDT2}}</td>
                                    <td>{{$data->SDT3}}</td>
                                    <td>{{$data->FAX}}</td>
                                    <td>{{$data->MoMo}}</td>
                                    <td>{{$data->SoTaiKhoan}}</td>
                                    <td>{{$data->DiaChi}}</td>
                                    <td>{{$data->QuanHuyen}}</td>
                                    <td>{{$data->TinhThanh}}</td>
                                    <td>{{$data->NguoiQuanLy}}</td>

                                    <td class="text-center">
                                        <a href="{{ route('capnhatCN-view',['id' => $data->id]) }}" class="ul-link-action text-success" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                            <i class="i-Edit"></i>
                                        </a>

                                        <a id="alert-confirm-{{ $data->id }}" onclick="getPopupDelete({{ $data }})" class="ul-link-action text-danger mr-1" data-toggle="tooltip" data-placement="top" title="Xoá chi nhánh này!!!">
                                            <i class="i-Eraser-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

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

<script>
    $('#ul-contact-list').DataTable();

</script>
<script>
    $(document).ready(function() {
        $(function() {
            var chinhanhs = {!!json_encode($ChiNhanh) !!};
            //khởi tạo các popup delete theo id sẵn mà không cần click 2 lần
            chinhanhs.forEach(element => {
                getPopupDelete(element);
            });
        });
    });

</script>
<script>
    function getPopupDelete(data) {
        var nameAlert = "#alert-confirm-" + data['id'].toString();
        $(nameAlert).on('click', function() {
            swal({
                title: 'Bạn có chắc muốn xoá?'
                , text: "Sau khi xác nhận " + data['MaChiNhanh'] + " sẽ bị xoá khỏi hệ thống!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Xác nhận xoá!'
                , cancelButtonText: 'Huỷ thao tác!'
                , confirmButtonClass: 'btn btn-success mr-5'
                , cancelButtonClass: 'btn btn-danger'
                , buttonsStyling: true
            }).then(function() {
                //replace route xoá vào button confirm
                window.location.replace("{{ route('xoaTK-del', ['id' => ".data['id'].toString().
                    "]) }}");
                swal(
                    'Đã xoá!'
                    , 'Dữ liệu đã được xoá thành công.'
                    , 'success'
                ).then(() => {
                    // Load lại trang sau khi ấn OK trong popup alert
                    window.location.replace("{{ route('quanlyCN-view') }}");
                });
            }, function(dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Huỷ thao tác'
                        , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                        , 'error'
                    )
                }
            })
        });
    }

</script>
@endsection
