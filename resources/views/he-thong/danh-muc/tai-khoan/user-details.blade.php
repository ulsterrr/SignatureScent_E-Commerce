@extends('layouts.admin.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/dropzone.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/cropper.min.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Chi tiết</h1>
    <ul>
        <li><a href="">Tài khoản</a></li>
        <li>Chi tiết</li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<!-- content goes here -->

<section class="ul-contact-detail">
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card">
                {{-- <img class="d-block w-100" src="{{ asset('assets/images/products/iphone-1.jpg') }}" alt="First slide"> --}}
                @if ($user->AnhDaiDien)
                <img class="d-block w-100" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" alt="Ảnh đại diện">
                @else
                <img class="d-block w-100" src="{{ asset('assets/images/faces/1.jpg') }}" alt="Ảnh đại diện">
                @endif
                <div class="card-body">
                    <div class="ul-contact-detail__info">
                        <div class="row">
                            <div class="col-6 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Họ và Tên</h5>
                                    <span>{{ $user->HoTen }}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Loại tài khoản</h5>
                                    <span>@if($user->LoaiTaiKhoan=='A')
                                        Admin
                                        @elseif($user->LoaiTaiKhoan=='M')
                                        Quản lý
                                        @elseif($user->LoaiTaiKhoan=='E')
                                        Nhân viên
                                        @elseif($user->LoaiTaiKhoan=='C')
                                        Khách hàng
                                        @elseif($user->LoaiTaiKhoan=='V')
                                        Khách VIP
                                        @endif</span>
                                </div>
                            </div>
                            <div class="col-6 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Email</h5>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="ul-contact-detail__info-1">
                                    <h5>Số điện thoại</h5>
                                    <span>{{ $user->SDT }}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="ul-contact-detail__info-1">
                                    <h5>Địa chỉ</h5>
                                    <span>{{ $user->DiaChi }}</span>
                                </div>
                            </div>
                            <div class="col-12 text-center">

                                <div class="ul-contact-detail__social">
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-facebook btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Facebook-2"></i></span>
                                        </button>
                                    </div>
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-twitter btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Twitter"></i></span>

                                        </button>
                                    </div>
                                    <div class="ul-contact-detail__social-1">
                                        <button type="button" class="btn btn-dribble btn-icon m-1">
                                            <span class="ul-btn__icon"><i class="i-Google-Plus"></i></span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-8">
            <!-- begin::basic-tab -->
            <div class="card mb-4 mt-4">
                <div class="card-header bg-transparent">Thông tin</div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Trang chủ</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Giới thiệu</a>
                            @if(intval(request()->segment(3))==auth()->user()->id)
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Đổi mật khẩu</a>
                            @endif
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-avt" role="tab" aria-controls="nav-avt" aria-selected="false">Thay đổi ảnh</a>
                        </div>
                    </nav>
                    <div class="tab-content ul-tab__content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="ul-contact-detail__timeline">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="ul-contact-detail__timeline-row">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="ul-contact-detail__left-timeline">
                                                        <div class="ul-widget3-img">
                                                            <img src="{{ asset('assets/images/faces/1.jpg') }}" class="img-fluid" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="ul-contact-detail__right-timeline">
                                                        <a href="" class="ul-widget4__title d-block">{{ $user->HoTen }}</a>
                                                        <small class="text-mute">1000 phút trước</small>
                                                        <p>Thêm mới 1 sản phẩm<a href="#"> Xem</a></p>
                                                        <div class="ul-contact-detail__timeline-image">
                                                            <img class="d-block" src="{{ asset('assets/images/products/iphone-1.jpg') }}" alt="First slide">
                                                            {{-- <img class="d-block" src="{{ asset('assets/images/products/iphone-1.jpg') }}" alt="First slide">
                                                            <img class="d-block" src="{{ asset('assets/images/products/iphone-1.jpg') }}" alt="First slide"> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="ul-contact-detail__profile">
                                        <div class="ul-contact-detail__inner-profile">
                                            <h4 class="heading">Họ và tên</h4>
                                            <span class="tetx-muted">Timity Clarkson</span>
                                        </div>

                                        <div class="ul-contact-detail__inner-profile">
                                            <h4 class="heading">Họ và tên</h4>
                                            <span class="tetx-muted">Timity Clarkson</span>
                                        </div>
                                        <div class="ul-contact-detail__inner-profile">
                                            <h4 class="heading">Họ và tên</h4>
                                            <span class="tetx-muted">Timity Clarkson</span>
                                        </div>
                                        <div class="ul-contact-detail__inner-profile">
                                            <h4 class="heading">Họ và tên</h4>
                                            <span class="tetx-muted">Timity Clarkson</span>
                                        </div>
                                    </div>
                                    <div class="custom-separator"></div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <div class="ul-contact-dwtail__profile-swcription">
                                        <p class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12">
                                    <h4 class="card-title mb-3">Skills</h4>
                                    <div class="custom-separator"></div>

                                    <span class=""> Wordpress</span>
                                    <div class="progress mb-3 mt-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">10%</div>
                                    </div>

                                    <span class=""> HTML 5</span>
                                    <div class="progress mb-3 mt-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>

                                    <span>React.js</span>
                                    <div class="progress mb-3 mt-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div>

                                    <span>Photoshop</span>
                                    <div class="progress mb-3 mt-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <form>

                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu hiện tại</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Xác nhận mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword2">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-form-label col-sm-2 pt-0">Trạng thái</div>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked="true">
                                                <label class="form-check-label ml-3" for="gridRadios1">
                                                    Hoạt động
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-2">Gửi email kích hoạt</div>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label ml-3" for="gridCheck1">
                                                Không gửi email
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-avt" role="tabpanel" aria-labelledby="nav-avt-tab">
                            <div class="col-md-12 mb-4">
                                <div class="card text-left">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('capnhat-AnhDaiDien', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            {{ csrf_field() }}
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button type="submit" style="width: 75px; border-color: #10163a;" class="btn btn-primary" id="inputGroupFileAddon01">Tải lên</button>
                                                </div>
                                                <div class="custom-file">
                                                    <input onchange="loadFile(event)" type="file" class="custom-file-input" name="AnhDaiDien" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                                    <label class="custom-file-label" for="inputGroupFile01"><span id="ChooseFile">Chọn ảnh</span></label>
                                                </div>
                                                @if ($user->AnhDaiDien)
                                                    <img id="output" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide">
                                                @else
                                                    <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide">
                                                @endif
                                                {{-- <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 70px 0px 75px;" class="d-block w-100 -top-3" alt="First slide"> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end::basic-tab -->
        </div>
    </div>
</section>


@endsection

@section('page-js')
{{-- <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.script.js')}}"></script> --}}
<script src="{{asset('assets/js/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/cropper.min.js')}}"></script>
<script src="{{asset('assets/js/cropper.script.js')}}"></script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#ChooseFile").text(event.target.files[0].name);

    };

</script>
@endsection
