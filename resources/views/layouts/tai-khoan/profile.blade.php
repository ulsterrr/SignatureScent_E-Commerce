@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/ladda-themeless.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>User Profile</h1>
    <ul>
        <li><a href="">Pages</a></li>
        <li>User Profile</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="card user-profile o-hidden mb-4">
    <div class="header-cover" style="background-image: url({{asset('assets/images/photo-wide-5.jpeg')}}"></div>
    <div class="user-info">
        <img class="profile-picture avatar-lg mb-2" src="{{asset('assets/images/faces/1.jpg')}}" alt="">
        <p class="m-0 text-24">Timothy Carlson</p>
        <p class="text-muted m-0">Digital Marketer</p>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
            </li>
        </ul>

        <div class="tab-content" id="profileTabContent">
            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                <h4>Personal Information</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                    Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Birth Date</p>
                            <span>1 Jan, 1994</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Birth Place</p>
                            <span>Dhaka, DB</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p>
                            <span>Dhaka, DB</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Gender</p>
                            <span>1 Jan, 1994</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p>
                            <span>example@ui-lib.com</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p>
                            <span>www.ui-lib.com</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p>
                            <span>Digital Marketer</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Experience</p>
                            <span>8 Years</span>
                        </div>
                        <div class="mb-4">
                            <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i> School</p>
                            <span>School of Digital Marketing</span>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Other Info</h4>
                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore labore reiciendis ab quo ducimus reprehenderit natus debitis, provident ad iure sed aut animi dolor incidunt voluptatem. Blanditiis, nobis aut.</p>
                <div class="row">
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Plane text-32 text-primary"></i>
                        <p class="text-16 mt-1">Travelling</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Camera text-32 text-primary"></i>
                        <p class="text-16 mt-1">Photography</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Car-3 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Driving</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Gamepad-2 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Gaming</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Music-Note-2 text-32 text-primary"></i>
                        <p class="text-16 mt-1">Music</p>
                    </div>
                    <div class="col-md-2 col-sm-4 col-6 text-center">
                        <i class="i-Shopping-Bag text-32 text-primary"></i>
                        <p class="text-16 mt-1">Shopping</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/headphone-1.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/headphone-2.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/headphone-3.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/iphone-1.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/iphone-2.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white o-hidden mb-3">
                            <img class="card-img" src="{{asset('assets/images/products/watch-1.jpg')}}" alt="">
                            <div class="card-img-overlay">
                                <div class="p-1 text-left card-footer font-weight-light d-flex">
                                    <span class="mr-3 d-flex align-items-center"><i class="i-Speach-Bubble-6 mr-1"></i>
                                        12 </span>
                                    <span class="d-flex align-items-center"><i class="i-Calendar-4 mr-2"></i>03.12.2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/spin.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/ladda.js')}}"></script>
<script src="{{asset('assets/js/ladda.script.js')}}"></script>
@endsection
