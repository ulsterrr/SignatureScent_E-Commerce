@extends('layouts.admin.master')
@section('page-css')


@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Thông tin phản hồi</h1>
    <ul>
        <li><a href="">Quản lý danh mục</a></li>
        <li>Thông tin phản hồi</li>
    </ul>

</div>



<div class="separator-breadcrumb border-top"></div>
<div id="task-manager">
    <!-- top-content-bar -->
    <div class="row">
        <div class="col-xl-10">
            <div class="navbar navbar-expand-lg navbar-light navbar-component rounded">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="task-manager-button navbar-toggler text-white" data-toggle="collapse" data-target="#navbar-filter">
                        <i class="i-Filter-2"></i>

                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-filter">
                    <div class="filter-mobile">
                        <span class="navbar-text font-weight-semibold ">
                            Bộ lọc:
                        </span>
                    </div>

                    <ul class="navbar-nav flex-wrap">
                        <li class="nav-item dropdown">
                            <a href="#" class="navbar-nav-link " data-toggle="dropdown" aria-expanded="false">
                                <i class="i-Time-Window "></i> Theo ngày
                            </a>

                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Tất cả</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Hôm nay</a>
                                <a href="#" class="dropdown-item">Hôm qua</a>
                                <a href="#" class="dropdown-item">Tuần này</a>
                                <a href="#" class="dropdown-item">Tháng này</a>
                                <a href="#" class="dropdown-item">Năm hiện tại</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="navbar-nav-link  " data-toggle="dropdown" aria-expanded="false">
                                <i class="i-Bar-Chart-2 "></i> Theo trạng thái
                            </a>

                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Tất cả</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Mới</a>
                                <a href="#" class="dropdown-item">Cũ</a>
                                <a href="#" class="dropdown-item">Đã duyệt</a>
                                <a href="#" class="dropdown-item">Đóng</a>
                                <a href="#" class="dropdown-item">Duplicate</a>
                                <a href="#" class="dropdown-item">Invalid</a>
                                <a href="#" class="dropdown-item">Wontfix</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="navbar-nav-link" data-toggle="dropdown" aria-expanded="false">
                                <i class="i-Arrow-Turn-Right "></i> By priority
                            </a>

                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Tất cả</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">Highest</a>
                                <a href="#" class="dropdown-item">High</a>
                                <a href="#" class="dropdown-item">Normal</a>
                                <a href="#" class="dropdown-item">Low</a>
                            </div>
                        </li>
                    </ul>

                    <!-- <span class="navbar-text font-weight-semibold mr-2 ml-md-auto">
                                            View mode:
                                        </span>

                                        <div class="form-check form-check-switchery form-check-switchery-double mb-3 mb-lg-0">
                                            <label class="form-check-label">
                                                List
                                                <input type="checkbox" class="form-input-switchery" checked="" data-fouc="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: rgb(100, 189, 99) 0px 0px 0px 10px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s; background-color: rgb(255, 255, 255);"></small></span>
                                                Grid
                                            </label>
                                        </div> -->
                </div>
            </div>



        </div>
    </div>
    <!-- end-of-top-content-bar -->
    <!-- content-start -->


    <div class="row">
        <div class="col-xl-9">
            <div class="row">
                <div class="col-xl-6">

                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="">#23. New icons set for an iOS app</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">A collection of textile samples lay spread out on the table..</p>

                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <i class="ul-task-manager__fonts i-Add"></i>
                                    </a>
                                    <a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li><span class="ul-task-manager__font-date text-muted">20 January, 2015</span></li>
                                    <li class="dropdown">
                                        Priority: &nbsp;
                                        <a href="#" class="badge badge-danger align-top dropdown-toggle" data-toggle="dropdown">Blocker</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
                                        </div>
                                    </li>
                                    <li><a href="#">Eternity app</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>Due: <span class="font-weight-semibold">18 hours</span></span>

                            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default " data-toggle="dropdown">On hold</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item active">On hold</a>
                                        <a href="#" class="dropdown-item">Resolved</a>
                                        <a href="#" class="dropdown-item">Closed</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Dublicate</a>
                                        <a href="#" class="dropdown-item">Invalid</a>
                                        <a href="#" class="dropdown-item">Wontfix</a>
                                    </div>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default" data-toggle="dropdown"><i class="i-Gear-2"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                        <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                        <a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6">

                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="">#23. New icons set for an iOS app</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">A collection of textile samples lay spread out on the table..</p>

                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <i class="ul-task-manager__fonts i-Add"></i>
                                    </a>
                                    <a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li><span class="ul-task-manager__font-date text-muted">20 January, 2015</span></li>
                                    <li class="dropdown">
                                        Priority: &nbsp;
                                        <a href="#" class="badge badge-danger align-top dropdown-toggle" data-toggle="dropdown">Blocker</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
                                        </div>
                                    </li>
                                    <li><a href="#">Eternity app</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>Due: <span class="font-weight-semibold">18 hours</span></span>

                            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default " data-toggle="dropdown">On hold</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item active">On hold</a>
                                        <a href="#" class="dropdown-item">Resolved</a>
                                        <a href="#" class="dropdown-item">Closed</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Dublicate</a>
                                        <a href="#" class="dropdown-item">Invalid</a>
                                        <a href="#" class="dropdown-item">Wontfix</a>
                                    </div>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default" data-toggle="dropdown"><i class="i-Gear-2"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                        <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                        <a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-xl-6">

                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="">#23. New icons set for an iOS app</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">A collection of textile samples lay spread out on the table..</p>

                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <i class="ul-task-manager__fonts i-Add"></i>
                                    </a>
                                    <a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li><span class="ul-task-manager__font-date text-muted">20 January, 2015</span></li>
                                    <li class="dropdown">
                                        Priority: &nbsp;
                                        <a href="#" class="badge badge-danger align-top dropdown-toggle" data-toggle="dropdown">Blocker</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
                                        </div>
                                    </li>
                                    <li><a href="#">Eternity app</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>Due: <span class="font-weight-semibold">18 hours</span></span>

                            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default " data-toggle="dropdown">On hold</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item active">On hold</a>
                                        <a href="#" class="dropdown-item">Resolved</a>
                                        <a href="#" class="dropdown-item">Closed</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Dublicate</a>
                                        <a href="#" class="dropdown-item">Invalid</a>
                                        <a href="#" class="dropdown-item">Wontfix</a>
                                    </div>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default" data-toggle="dropdown"><i class="i-Gear-2"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                        <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                        <a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-xl-6">

                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="">#23. New icons set for an iOS app</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">A collection of textile samples lay spread out on the table..</p>

                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <i class="ul-task-manager__fonts i-Add"></i>
                                    </a>
                                    <a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li><span class="ul-task-manager__font-date text-muted">20 January, 2015</span></li>
                                    <li class="dropdown">
                                        Priority: &nbsp;
                                        <a href="#" class="badge badge-danger align-top dropdown-toggle" data-toggle="dropdown">Blocker</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
                                        </div>
                                    </li>
                                    <li><a href="#">Eternity app</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>Due: <span class="font-weight-semibold">18 hours</span></span>

                            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default " data-toggle="dropdown">On hold</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item active">On hold</a>
                                        <a href="#" class="dropdown-item">Resolved</a>
                                        <a href="#" class="dropdown-item">Closed</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Dublicate</a>
                                        <a href="#" class="dropdown-item">Invalid</a>
                                        <a href="#" class="dropdown-item">Wontfix</a>
                                    </div>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default" data-toggle="dropdown"><i class="i-Gear-2"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                        <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                        <a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6">

                    <div class="card mt-4 mb-4">
                        <div class="card-body">
                            <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                <div>
                                    <h6><a href="">#23. New icons set for an iOS app</a></h6>
                                    <p class="ul-task-manager__paragraph mb-3">A collection of textile samples lay spread out on the table..</p>

                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" height="36" alt="corrupted 2">
                                    </a>
                                    <a href="#">
                                        <i class="ul-task-manager__fonts i-Add"></i>
                                    </a>
                                    <a href="" class="btn btn-icon bg-transparent border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
                                </div>

                                <ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
                                    <li><span class="ul-task-manager__font-date text-muted">20 January, 2015</span></li>
                                    <li class="dropdown">
                                        Priority: &nbsp;
                                        <a href="#" class="badge badge-danger align-top dropdown-toggle" data-toggle="dropdown">Blocker</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item active"><span class="badge badge-mark mr-2 border-danger"></span> Blocker</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-warning-400"></span> High priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-success"></span> Normal priority</a>
                                            <a href="#" class="dropdown-item"><span class="badge badge-mark mr-2 border-grey-300"></span> Low priority</a>
                                        </div>
                                    </li>
                                    <li><a href="#">Eternity app</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                            <span>Due: <span class="font-weight-semibold">18 hours</span></span>

                            <ul class="list-inline mb-0 mt-2 mt-sm-0">
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default " data-toggle="dropdown">On hold</a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item active">On hold</a>
                                        <a href="#" class="dropdown-item">Resolved</a>
                                        <a href="#" class="dropdown-item">Closed</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">Dublicate</a>
                                        <a href="#" class="dropdown-item">Invalid</a>
                                        <a href="#" class="dropdown-item">Wontfix</a>
                                    </div>
                                </li>
                                <li class="list-inline-item dropdown">
                                    <a href="#" class="text-default" data-toggle="dropdown"><i class="i-Gear-2"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
                                        <a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach screenshot</a>
                                        <a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit task</a>
                                        <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- pagination -->
            <div class="row justify-content-center mt-4">

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>

            </div>
            <!-- end of pagination -->
        </div>

        <!-- right-sidebar-content -->
        <div class="col-xl-3 ">
            <!-- search -->
            <div class="card  mt-4 mb-3">
                <div class="card-header font-weight-bold dropdown-toggle" onClick="customToggle()">Tìm kiếm phản hồi</div>
                <div class="card-body" id="custom-toggle">
                    <input type="text" placeholder="Nhập bất kỳ và enter" class="form-control">
                </div>
            </div>
            <!-- end of search -->

            <!-- assigners -->
            <div class="card  mb-3">
                <div class="card-header font-weight-bold dropdown-toggle" onClick="customToggle4()">Assigners</div>
                <div class="card-body" id="custom-toggle4">
                    <ul class="media-list">
                        <li class="media mb-2">
                            <a href="#" class="mr-4">
                                <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" alt="asd" srcset="">
                            </a>
                            <div class="ul-task-manager__media">
                                <a href="">James Alexander gull</a>
                                <div class="font-size-sm text-muted">Santa Ana,CA</div>
                            </div>
                            <div class="ml-3 align-self-center">
                                <span class="badge badge-mark"></span>
                            </div>
                        </li>

                        <li class="media mb-2">
                            <a href="#" class="mr-4">
                                <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" alt="asd" srcset="">
                            </a>
                            <div class="ul-task-manager__media">
                                <a href="">James Alexander</a>
                                <div class="font-size-sm text-muted">Santa Ana,CA</div>
                            </div>
                            <div class="ml-3 align-self-center">
                                <span class="badge badge-mark "></span>
                            </div>
                        </li>

                        <li class="media mb-2">
                            <a href="#" class="mr-4">
                                <img src="{{asset('assets/images/faces/1.jpg')}}" class="rounded-circle" width="36" alt="asd" srcset="">
                            </a>
                            <div class="ul-task-manager__media">
                                <a href="">James Alexander</a>
                                <div class="font-size-sm text-muted">Santa Ana,CA</div>
                            </div>
                            <div class="ml-3 align-self-center">
                                <span class="badge badge-mark"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end of assigners -->



            <!-- completeness stats -->
            <div class="card  mb-3 ">
                <div class="card-header font-weight-bold dropdown-toggle" onClick="customToggle6()">Completeness Stats</div>
                <div class="card-body" id="custom-toggle6">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <div class="d-flex align-items-center mb-1">Blockers <span class="text-muted ml-auto">50%</span></div>
                            <div class="progress" style="height: 0.125rem;">
                                <div class="progress-bar bg-danger" style="width: 50%">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </li>

                        <li class="mb-3">
                            <div class="d-flex align-items-center mb-1">High priority <span class="text-muted ml-auto">70%</span></div>
                            <div class="progress" style="height: 0.125rem;">
                                <div class="progress-bar bg-warning-400" style="width: 70%">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                        </li>

                        <li class="mb-3">
                            <div class="d-flex align-items-center mb-1">Normal priority <span class="text-muted ml-auto">80%</span></div>
                            <div class="progress" style="height: 0.125rem;">
                                <div class="progress-bar bg-success-400" style="width: 80%">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="d-flex align-items-center mb-1">Low priority <span class="text-muted ml-auto">890%</span></div>
                            <div class="progress" style="height: 0.125rem;">
                                <div class="progress-bar bg-grey-400" style="width: 98%">
                                    <span class="sr-only">10% Complete</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end of completeness -->
        </div>
        <!-- end of sidebar content -->

        <!-- end-of-content -->

        @endsection

        @section('page-js')

        <script src="{{asset('assets/js/es5/task-manager.min.js')}}"></script>



        @endsection
