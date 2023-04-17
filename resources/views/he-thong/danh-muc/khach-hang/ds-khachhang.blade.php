@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách</h1>
    <ul>
        <li><a href="">Khách hàng</a></li>
        {{-- <li>Liên hệ</li> --}}
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>


<section class="contact-list">
    <div class="row">
            <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-header text-right bg-transparent">
                            <a type="button" href="{{ route('themKH-view') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Thêm khách hàng</a>
                        </div>
                        <!-- begin::modal -->
                        <div class="ul-card-list__modal">
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                                <div class="modal-body">
                                                        <form>
                                                                <div class="form-group row">
                                                                    <label for="inputName" class="col-sm-2 col-form-label">Họ Tên</label>
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
                                                                    <div class="col-sm-2">Hộp kiểm</div>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                                            <label class="form-check-label ml-3" for="gridCheck1">
                                                                                Hộp kiểm ví dụ
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
                                <table id="ul-contact-list" class="display table " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Năm sinh</th>
                                            <th>Ngày tham gia</th>
                                            <th>Loại Tài Khoản</th>
                                            <th>Trạng Thái</th>
                                            <th>Địa chỉ</th>
                                            <th>Quận Huyện</th>
                                            <th>Tỉnh Thành</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $KhachHang as $data )
                                        <tr>
                                            <td>
                                                <a href="">
                                                    <div class="ul-widget-app__profile-pic">
                                                        <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt="">
                                                        {{$data->HoTen}}
                                                    </div>
                                                </a>
                                            </td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->SDT}}</td>
                                            <td>{{$data->NgaySinh}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>{{$data->LoaiTaiKhoan}}</td>
                                            <td>{{$data->TrangThai}}</td>
                                            <td>{{$data->DiaChi}}</td>
                                            <td>{{$data->QuanHuyen}}</td>
                                            <td>{{$data->TinhThanh}}</td>
                                            <td>
                                                <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="i-Edit"></i>
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

<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>
<script>
$('#ul-contact-list').DataTable();
</script>

<script>
    $(document).ready(function() {
        $(function() {
            var users = {!!json_encode($KhachHang) !!};
            //khởi tạo các popup delete theo id sẵn mà không cần click 2 lần
            users.forEach(element => {
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
                , text: "Sau khi xác nhận " + data['email'] + " sẽ bị xoá khỏi hệ thống!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonText: 'Xác nhận xoá!'
                , cancelButtonText: 'Huỷ thao tác!'
                , confirmButtonClass: 'btn btn-success mr-5'
                , cancelButtonClass: 'btn btn-danger'
                , buttonsStyling: true
            }).then(function() {
                //replace route xoá vào button confirm
                window.location.replace("{{ route('xoaTK-del', ['id' => $data->id]) }}");
                swal(
                    'Đã xoá!'
                    , 'Dữ liệu đã được xoá thành công.'
                    , 'success'
                ).then(() => {
                    // Load lại trang sau khi ấn OK trong popup alert
                    window.location.replace("{{ route('quanlyTKView') }}");
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
