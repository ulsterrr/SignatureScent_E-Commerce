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
                                        <tr>
                                            <td>
                                                <a href="">
                                                    <div class="ul-widget-app__profile-pic">
                                                        <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt="">
                                                        Jhon Wick
                                                    </div>

                                                </a>
                                            </td>
                                            <td>jhonwick_23@gmail.com</td>
                                            <td>+88012378478</td>
                                            <td><a href="#" class="badge badge-primary m-2 p-2">Developer</a></td>
                                            <td>20</td>
                                            <td>April 25, 2019</td>
                                            <td>$320,800</td>
                                            <td>
                                                <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="i-Edit"></i>
                                                </a>
                                               <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                   <i class="i-Eraser-2"></i>
                                               </a>
                                            </td>
                                        </tr>

                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <div class="ul-widget-app__profile-pic">
                                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/2.jpg') }}" alt="">
                                                            James Wann
                                                        </div>

                                                    </a>
                                                </td>
                                                <td>jameswann@gmail.com</td>
                                                <td>+88012378478</td>
                                                <td><a href="#" class="badge badge-success m-2 p-2">Programmer</a></td>
                                                <td>20</td>
                                                <td>April 34, 2019</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="i-Edit"></i>
                                                    </a>
                                                   <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                       <i class="i-Eraser-2"></i>
                                                   </a>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <div class="ul-widget-app__profile-pic">
                                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/3.jpg') }}" alt="">
                                                            Bradley Gunn
                                                        </div>

                                                    </a>
                                                </td>
                                                <td>jameswann@gmail.com</td>
                                                <td>+88012378478</td>
                                                <td><a href="#" class="badge badge-danger m-2 p-2">Designer</a></td>
                                                <td>20</td>
                                                <td>April 34, 2019</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="i-Edit"></i>
                                                    </a>
                                                   <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                       <i class="i-Eraser-2"></i>
                                                   </a>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <div class="ul-widget-app__profile-pic">
                                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/4.jpg') }}" alt="">
                                                            Riki Martin
                                                        </div>

                                                    </a>
                                                </td>
                                                <td>jameswann@gmail.com</td>
                                                <td>+88012378478</td>
                                                <td><a href="#" class="badge badge-info m-2 p-2">Backend</a></td>
                                                <td>20</td>
                                                <td>April 34, 2019</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="i-Edit"></i>
                                                    </a>
                                                   <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                       <i class="i-Eraser-2"></i>
                                                   </a>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <div class="ul-widget-app__profile-pic">
                                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/5.jpg') }}" alt="">
                                                            Zack Snyder
                                                        </div>

                                                    </a>
                                                </td>
                                                <td>jameswann@gmail.com</td>
                                                <td>+88012378478</td>
                                                <td><a href="#" class="badge badge-warning m-2 p-2">Backend</a></td>
                                                <td>20</td>
                                                <td>April 34, 2019</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="i-Edit"></i>
                                                    </a>
                                                   <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                       <i class="i-Eraser-2"></i>
                                                   </a>
                                                </td>
                                        </tr>

                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <div class="ul-widget-app__profile-pic">
                                                            <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt="">
                                                            Jhon Wick
                                                        </div>

                                                    </a>
                                                </td>
                                                <td>jhonwick_23@gmail.com</td>
                                                <td>+88012378478</td>
                                                <td><a href="#" class="badge badge-primary m-2 p-2">Developer</a></td>
                                                <td>20</td>
                                                <td>April 25, 2019</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="i-Edit"></i>
                                                    </a>
                                                   <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                       <i class="i-Eraser-2"></i>
                                                   </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                    <td>
                                                        <a href="">
                                                            <div class="ul-widget-app__profile-pic">
                                                                <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/2.jpg') }}" alt="">
                                                                James Wann
                                                            </div>

                                                        </a>
                                                    </td>
                                                    <td>jameswann@gmail.com</td>
                                                    <td>+88012378478</td>
                                                    <td><a href="#" class="badge badge-success m-2 p-2">Programmer</a></td>
                                                    <td>20</td>
                                                    <td>April 34, 2019</td>
                                                    <td>$320,800</td>
                                                    <td>
                                                        <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="i-Edit"></i>
                                                        </a>
                                                       <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                           <i class="i-Eraser-2"></i>
                                                       </a>
                                                    </td>
                                            </tr>

                                            <tr>
                                                    <td>
                                                        <a href="">
                                                            <div class="ul-widget-app__profile-pic">
                                                                <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/3.jpg') }}" alt="">
                                                                Bradley Gunn
                                                            </div>

                                                        </a>
                                                    </td>
                                                    <td>jameswann@gmail.com</td>
                                                    <td>+88012378478</td>
                                                    <td><a href="#" class="badge badge-danger m-2 p-2">Designer</a></td>
                                                    <td>20</td>
                                                    <td>April 34, 2019</td>
                                                    <td>$320,800</td>
                                                    <td>
                                                        <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="i-Edit"></i>
                                                        </a>
                                                       <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                           <i class="i-Eraser-2"></i>
                                                       </a>
                                                    </td>
                                            </tr>

                                            <tr>
                                                    <td>
                                                        <a href="">
                                                            <div class="ul-widget-app__profile-pic">
                                                                <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/4.jpg') }}" alt="">
                                                                Riki Martin
                                                            </div>

                                                        </a>
                                                    </td>
                                                    <td>jameswann@gmail.com</td>
                                                    <td>+88012378478</td>
                                                    <td><a href="#" class="badge badge-info m-2 p-2">Backend</a></td>
                                                    <td>20</td>
                                                    <td>April 34, 2019</td>
                                                    <td>$320,800</td>
                                                    <td>
                                                        <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="i-Edit"></i>
                                                        </a>
                                                       <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                           <i class="i-Eraser-2"></i>
                                                       </a>
                                                    </td>
                                            </tr>

                                            <tr>
                                                    <td>
                                                        <a href="">
                                                            <div class="ul-widget-app__profile-pic">
                                                                <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/5.jpg') }}" alt="">
                                                                Zack Snyder
                                                            </div>

                                                        </a>
                                                    </td>
                                                    <td>jameswann@gmail.com</td>
                                                    <td>+88012378478</td>
                                                    <td><a href="#" class="badge badge-warning m-2 p-2">Backend</a></td>
                                                    <td>20</td>
                                                    <td>April 34, 2019</td>
                                                    <td>$320,800</td>
                                                    <td>
                                                        <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="i-Edit"></i>
                                                        </a>
                                                       <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                           <i class="i-Eraser-2"></i>
                                                       </a>
                                                    </td>
                                            </tr>

                                            <tr>
                                                    <td>
                                                        <a href="">
                                                            <div class="ul-widget-app__profile-pic">
                                                                <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt="">
                                                                Jhon Wick
                                                            </div>

                                                        </a>
                                                    </td>
                                                    <td>jhonwick_23@gmail.com</td>
                                                    <td>+88012378478</td>
                                                    <td><a href="#" class="badge badge-primary m-2 p-2">Developer</a></td>
                                                    <td>20</td>
                                                    <td>April 25, 2019</td>
                                                    <td>$320,800</td>
                                                    <td>
                                                        <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="i-Edit"></i>
                                                        </a>
                                                       <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                           <i class="i-Eraser-2"></i>
                                                       </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                        <td>
                                                            <a href="">
                                                                <div class="ul-widget-app__profile-pic">
                                                                    <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/2.jpg') }}" alt="">
                                                                    James Wann
                                                                </div>

                                                            </a>
                                                        </td>
                                                        <td>jameswann@gmail.com</td>
                                                        <td>+88012378478</td>
                                                        <td><a href="#" class="badge badge-success m-2 p-2">Programmer</a></td>
                                                        <td>20</td>
                                                        <td>April 34, 2019</td>
                                                        <td>$320,800</td>
                                                        <td>
                                                            <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                           <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                               <i class="i-Eraser-2"></i>
                                                           </a>
                                                        </td>
                                                </tr>

                                                <tr>
                                                        <td>
                                                            <a href="">
                                                                <div class="ul-widget-app__profile-pic">
                                                                    <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/3.jpg') }}" alt="">
                                                                    Bradley Gunn
                                                                </div>

                                                            </a>
                                                        </td>
                                                        <td>jameswann@gmail.com</td>
                                                        <td>+88012378478</td>
                                                        <td><a href="#" class="badge badge-danger m-2 p-2">Designer</a></td>
                                                        <td>20</td>
                                                        <td>April 34, 2019</td>
                                                        <td>$320,800</td>
                                                        <td>
                                                            <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                           <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                               <i class="i-Eraser-2"></i>
                                                           </a>
                                                        </td>
                                                </tr>

                                                <tr>
                                                        <td>
                                                            <a href="">
                                                                <div class="ul-widget-app__profile-pic">
                                                                    <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/4.jpg') }}" alt="">
                                                                    Riki Martin
                                                                </div>

                                                            </a>
                                                        </td>
                                                        <td>jameswann@gmail.com</td>
                                                        <td>+88012378478</td>
                                                        <td><a href="#" class="badge badge-info m-2 p-2">Backend</a></td>
                                                        <td>20</td>
                                                        <td>April 34, 2019</td>
                                                        <td>$320,800</td>
                                                        <td>
                                                            <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                           <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                               <i class="i-Eraser-2"></i>
                                                           </a>
                                                        </td>
                                                </tr>

                                                <tr>
                                                        <td>
                                                            <a href="">
                                                                <div class="ul-widget-app__profile-pic">
                                                                    <img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/5.jpg') }}" alt="">
                                                                    Zack Snyder
                                                                </div>

                                                            </a>
                                                        </td>
                                                        <td>jameswann@gmail.com</td>
                                                        <td>+88012378478</td>
                                                        <td><a href="#" class="badge badge-warning m-2 p-2">Backend</a></td>
                                                        <td>20</td>
                                                        <td>April 34, 2019</td>
                                                        <td>$320,800</td>
                                                        <td>
                                                            <a href="" class="ul-link-action text-success"  data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                           <a href="" class="ul-link-action text-danger mr-1"  data-toggle="tooltip" data-placement="top" title="Want To Delete !!!">
                                                               <i class="i-Eraser-2"></i>
                                                           </a>
                                                        </td>
                                                </tr>
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
