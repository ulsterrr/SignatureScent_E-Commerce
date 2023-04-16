@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách</h1>
    <ul>
        <li><a href="">Ứng Dụng</a></li>
        <li>Liên hệ</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>


<section class="contact-list">
    <div class="row">
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
                                                <a href="{{ route('capnhatTK-upd', ['id' => $data->id]) }}" class="ul-link-action text-success" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                                    <i class="i-Edit"></i>
                                                </a>
                                                <a href="{{ route('chitietTK', ['id' => $data->id]) }}" class="ul-link-action text-warning" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                                    <i class="i-Eye-Visible"></i>
                                                </a>
                                                <a id="alert-confirm-{{ $data->id }}" onclick="getPopupDelete({{ $data }})" class="ul-link-action text-danger mr-1" data-toggle="tooltip" data-placement="top" title="Xoá tài khoản này!!!">
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

<script>
$('#ul-contact-list').DataTable();
</script>
@endsection
