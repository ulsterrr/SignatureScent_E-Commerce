@extends('layouts.homepage.client')
@section('title', 'Trang chủ')
@section('main-content')
    <section class="section sec_banner" id="section_1593981100">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        <div class="section-content relative">
            <div class="row row-collapse row-full-width align-center" id="row-328268861">
                <div class="col small-12 large-12">
                    <div class="col-inner">
                        <div class="slider-wrapper relative" id="slider-119666349">
                            <div class="slider slider-nav-simple slider-nav-large slider-nav-light slider-style-normal"
                                data-flickity-options='{"cellAlign": "center","imagesLoaded": true,"lazyLoad": 1,"freeScroll": false,"wrapAround": true,"autoPlay": 5000,
                                                    "pauseAutoPlayOnHover" : true,"prevNextButtons": true,"contain" : true,"adaptiveHeight" : true,"dragThreshold" : 10,
                                                    "percentPosition": true,"pageDots": false,"rightToLeft": false,"draggable": true,"selectedAttraction": 0.1,"parallax" : 0,
                                                    "friction": 0.6}'>
                                <div class="banner has-hover has-slide-effect slide-zoom-in-fast" id="banner-474096603">
                                    <div class="banner-inner fill">
                                        <div class="banner-bg fill">
                                            <div class="bg fill bg-fill "></div>
                                        </div>
                                        <!-- bg-layers -->
                                        <div class="banner-layers container">
                                            <div class="fill banner-link"></div>
                                            <div id="text-box-221630240"
                                                class="text-box banner-layer x5 md-x5 lg-x10 y85 md-y70 lg-y35 res-text">
                                                <div data-animate="bounceIn">
                                                    <div class="text dark">
                                                        <div class="text-inner text-left">
                                                            <h4 class="thin-font">Giảm giá 20% &#8211; 50%</h2>
                                                                <h2>Top sản phẩm đang được giảm giá tại cửa hàng</h2>
                                                                <p>Ưu đãi cho 100 khách hàng đặt sớm nhất</p>
                                                                <a href="{{ route('cuahang-view') }}" target="_self"
                                                                    class="button primary lowercase"
                                                                    style="border-radius:10px;">
                                                                    <span>Khám phá ngay</span>
                                                                </a>
                                                        </div>
                                                    </div>
                                                    <!-- text-box-inner -->
                                                </div>
                                                <style scope="scope">
                                                    #text-box-221630240 {
                                                        width: 70%;
                                                    }

                                                    #text-box-221630240 .text {
                                                        font-size: 100%;
                                                    }

                                                    @media (min-width:550px) {
                                                        #text-box-221630240 {
                                                            width: 50%;
                                                        }
                                                    }

                                                    @media (min-width:850px) {
                                                        #text-box-221630240 .text {
                                                            font-size: 110%;
                                                        }
                                                    }
                                                </style>
                                            </div>
                                            <!-- text-box -->
                                        </div>
                                        <!-- .banner-layers -->
                                    </div>
                                    <!-- .banner-inner -->
                                    <style scope="scope">
                                        #banner-474096603 {
                                            padding-top: 350px;
                                        }

                                        #banner-474096603 .bg.bg-loaded {
                                            background-image: url({{ asset('assets/wp-content/uploads/2019/05/slide1_3.jpg') }});
                                        }

                                        @media (min-width:550px) {
                                            #banner-474096603 {
                                                padding-top: 500px;
                                            }
                                        }

                                        @media (min-width:850px) {
                                            #banner-474096603 {
                                                padding-top: 850px;
                                            }
                                        }
                                    </style>
                                </div>
                                {{--  --}}
                            </div>
                            <div class="loading-spin dark large centered"></div>
                            <style scope="scope">
                            </style>
                        </div>
                        <!-- .ux-slider-wrapper -->
                        <div class="gap-element clearfix" style="display:block; height:auto; padding-top:30px"></div>
                    </div>
                </div>
                <style scope="scope">
                </style>
            </div>
        </div>
        <!-- .section-content -->
        <style scope="scope">
            #section_1593981100 {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
    </section>

    <section class="section sec_product" id="section_179462801">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        <div class="section-content relative">
            <div class="row" id="row-414617160">
                <div class="col small-12 large-12" data-animate="bounceIn">
                    <div class="col-inner text-center dark" style="padding:60px 0px 20px 0px;">
                        <h4 class="thin-font">Scent Signature</h4>
                        <h1 class="a">SẢN PHẨM NỔI BẬT</h1>
                        <div class="gap-element clearfix" style="display:block; height:auto; padding-top:50px"></div>
                        <div class="tabbed-content">
                            <ul class="nav nav-line-bottom nav-uppercase nav-size-xlarge nav-center">
                                {{-- <li class="tab has-icon"><a href="#tab_all"><span>Tất cả sản phẩm</span></a></li> --}}
                                <li class="tab active has-icon"><a href="#tab_nuochoa_nam"><span>Nước hoa nam</span></a>
                                </li>
                                <li class="tab has-icon"><a href="#tab_nuochoa_nu"><span>Nước hoa nữ</span></a></li>
                                <li class="tab has-icon"><a href="#tab_niche_nam"><span>Nước hoa niche nam</span></a></li>
                                <li class="tab has-icon"><a href="#tab_niche_nu"><span>Nước hoa niche nữ</span></a></li>

                            </ul>
                            <div class="tab-panels">
                                {{-- <div class="panel entry-content" id="tab_all">
                                <div class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                    @foreach ($SPall as $data)
                                    <div class="col">
                                        <div class="col-inner">
                                            <div class="badge-container absolute left top z-1">
                                            </div>
                                            <div class="product-small box has-hover box-normal box-text-bottom">
                                                <div class="box-image">
                                                    @if ($data->HinhAnh)
                                                    <div class="image-zoom image-cover" style="padding-top:100%;">
                                                        <a href="{{ route('chitiet-sanpham-view',['id' => $data->MaSanPham]) }}">
                                                            <img width="300" height="300" src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"  class="attachment-original size-original" sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                    </div>
                                                    @else
                                                    <a >
                                                        <img width="300" height="300" src="{{ asset('assets/images/faces/1.jpg') }}" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg')}} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg')}} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg')}} 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="600" height="778" src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg')}}" class="attachment-original size-original" alt="" srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg')}} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg')}} 231w" sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                    @endif

                                                    <div class="image-tools top right show-on-hover">
                                                    </div>
                                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                    </div>
                                                </div>
                                                <!-- box-image -->
                                                <div class="box-text text-center">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title"><a href="{{ route('chitiet-sanpham-view',['id' => $data->MaSanPham]) }}" >{{$data->TenSanPham}}</a></p>
                                                    </div>
                                                    <div class="price-wrapper">
                                                        <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <!-- box-text -->
                                            </div>
                                            <!-- box -->
                                        </div>
                                        <!-- .col-inner -->
                                    </div>
                                    @endforeach
                                </div>
                            </div> --}}
                                <div class="panel active entry-content" id="tab_nuochoa_nam">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPNam as $data)
                                            <div class="col">
                                                <div class="col-inner">
                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image">
                                                            @if ($data->HinhAnh)
                                                                <div class="image-zoom image-cover"
                                                                    style="padding-top:100%;">
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                            class="attachment-original size-original"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                </div>
                                                            @else
                                                                <a
                                                                    href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                        class="show-on-hover absolute fill hide-for-small back-image"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                        sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                        width="600" height="778"
                                                                        src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                        class="attachment-original size-original"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                        sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                            @endif

                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->
                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="panel entry-content" id="tab_nuochoa_nu">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPNu as $data)
                                            <div class="col">
                                                <div class="col-inner">
                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image">
                                                            @if ($data->HinhAnh)
                                                                <div class="image-zoom image-cover"
                                                                    style="padding-top:100%;">
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                            class="attachment-original size-original"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                </div>
                                                            @else
                                                                <a
                                                                    href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                        class="show-on-hover absolute fill hide-for-small back-image"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                        sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                        width="600" height="778"
                                                                        src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                        class="attachment-original size-original"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                        sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                            @endif

                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->
                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="panel entry-content" id="tab_niche_nam">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPNNam as $data)
                                            <div class="col">
                                                <div class="col-inner">
                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image">
                                                            @if ($data->HinhAnh)
                                                                <div class="image-zoom image-cover"
                                                                    style="padding-top:100%;">
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                            class="attachment-original size-original"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                </div>
                                                            @else
                                                                <a
                                                                    href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                        class="show-on-hover absolute fill hide-for-small back-image"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                        sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                        width="600" height="778"
                                                                        src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                        class="attachment-original size-original"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                        sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                            @endif

                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->
                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="panel entry-content" id="tab_niche_nu">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPNNu as $data)
                                            <div class="col">
                                                <div class="col-inner">
                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image">
                                                            @if ($data->HinhAnh)
                                                                <div class="image-zoom image-cover"
                                                                    style="padding-top:100%;">
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                            class="attachment-original size-original"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                </div>
                                                            @else
                                                                <a
                                                                    href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                        class="show-on-hover absolute fill hide-for-small back-image"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                        sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                        width="600" height="778"
                                                                        src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                        class="attachment-original size-original"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                        sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                            @endif

                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->
                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tabbed-content">
                            <ul class="nav nav-line-bottom nav-uppercase nav-size-xlarge nav-center">
                                <li class="tab has-icon"><a href="#tab_bestsell"><span>Bán chạy</span></a></li>
                                <li class="tab active has-icon"><a href="#tab_nuochoa_giatot"><span>Giá tốt</span></a>
                                </li>
                            </ul>
                            <div class="tab-panels">
                                <div class="panel entry-content" id="tab_bestsell">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPbc as $data)
                                            <div class="col">
                                                <div class="col-inner">
                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image">
                                                            @if ($data->HinhAnh)
                                                                <div class="image-zoom image-cover"
                                                                    style="padding-top:100%;">
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                            class="attachment-original size-original"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                </div>
                                                            @else
                                                                <a>
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                        class="show-on-hover absolute fill hide-for-small back-image"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                        sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                        width="600" height="778"
                                                                        src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                        class="attachment-original size-original"
                                                                        alt=""
                                                                        srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                        sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                            @endif

                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->
                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="panel active entry-content" id="tab_nuochoa_giatot">
                                    <div
                                        class="row large-columns-4 medium-columns-3 small-columns-2 row-normal row-full-width">
                                        @foreach ($SPGiaTot as $data)
                                            @if ($data->LoaiSanPham == 'LSP01')
                                                <div class="col">
                                                    <div class="col-inner">
                                                        <div class="badge-container absolute left top z-1">
                                                        </div>
                                                        <div
                                                            class="product-small box has-hover box-normal box-text-bottom">
                                                            <div class="box-image">
                                                                @if ($data->HinhAnh)
                                                                    <div class="image-zoom image-cover"
                                                                        style="padding-top:100%;">
                                                                        <a
                                                                            href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                            <img width="300" height="300"
                                                                                src="{{ asset('assets/images/san_pham/' . $data->HinhAnh) }}"
                                                                                class="attachment-original size-original"
                                                                                sizes="(max-width: 600px) 100vw, 600px" />
                                                                        </a>
                                                                    </div>
                                                                @else
                                                                    <a
                                                                        href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('assets/images/faces/1.jpg') }}"
                                                                            class="show-on-hover absolute fill hide-for-small back-image"
                                                                            alt=""
                                                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/1-300x300.jpg') }} 300w, {{ asset('assets/wp-content/uploads/2019/05/1-150x150.jpg') }} 150w, {{ asset('assets/wp-content/uploads/2019/05/1-100x100.jpg') }} 100w"
                                                                            sizes="(max-width: 300px) 100vw, 300px" /><img
                                                                            width="600" height="778"
                                                                            src="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }}"
                                                                            class="attachment-original size-original"
                                                                            alt=""
                                                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/5.jpg') }} 600w, {{ asset('assets/wp-content/uploads/2019/05/5-231x300.jpg') }} 231w"
                                                                            sizes="(max-width: 600px) 100vw, 600px" /> </a>
                                                                @endif

                                                                <div class="image-tools top right show-on-hover">
                                                                </div>
                                                                <div
                                                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                </div>
                                                            </div>
                                                            <!-- box-image -->
                                                            <div class="box-text text-center">
                                                                <div class="title-wrapper">
                                                                    <p class="name product-title"><a
                                                                            href="{{ route('chitiet-sanpham-view', ['id' => $data->MaSanPham]) }}">{{ $data->TenSanPham }}</a>
                                                                    </p>
                                                                </div>
                                                                <div class="price-wrapper">
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount">{{ number_format($data->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <!-- box-text -->
                                                        </div>
                                                        <!-- box -->
                                                    </div>
                                                    <!-- .col-inner -->
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- .section-content -->
        <style scope="scope">
            #section_179462801 {
                padding-top: 0px;
                padding-bottom: 0px;
                margin-bottom: -50px;
                background-color: rgb(51, 51, 51);
            }
        </style>
    </section>
    <section class="section sec_product2" id="section_2028561803">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->

        <!-- .section-content -->
        <style scope="scope">
            #section_2028561803 {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
    </section>
    <section class="section sec_commit hide-for-small" id="section_946825305">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        <div class="section-content relative">
            <div class="row row-collapse row-full-width" id="row-886716986">
                <div class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                    <div class="col-inner dark" style="background-color:rgb(51, 51, 51);padding:40px 30px 40px 30px;">
                        <div class="icon-box featured-box icon-box-left text-left">
                            <div class="icon-box-img" style="width: 60px">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="128" height="128"
                                            src="{{ asset('assets/wp-content/uploads/2019/05/product.png') }}"
                                            class="attachment-medium size-medium" alt=""
                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/product.png') }} 128w, {{ asset('assets/wp-content/uploads/2019/05/product-100x100.png') }} 100w"
                                            sizes="(max-width: 128px) 100vw, 128px" />
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <h5 class="uppercase">giao hàng miễn phí</h5>
                                <p>Cho đơn hàng từ 300K</p>
                            </div>
                        </div>
                        <!-- .icon-box -->
                    </div>
                </div>
                <div class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                    <div class="col-inner dark" style="background-color:rgb(41, 41, 41);padding:40px 30px 40px 30px;">
                        <div class="icon-box featured-box icon-box-left text-left">
                            <div class="icon-box-img" style="width: 60px">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="128" height="128"
                                            src="{{ asset('assets/wp-content/uploads/2019/05/refund-2.png') }}"
                                            class="attachment-medium size-medium" alt=""
                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/refund-2.png') }} 128w, {{ asset('assets/wp-content/uploads/2019/05/refund-2-100x100.png') }} 100w"
                                            sizes="(max-width: 128px) 100vw, 128px" />
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <h5 class="uppercase">đổi tra hàng</h5>
                                <p>Trong 3 ngày đầu tiên</p>
                            </div>
                        </div>
                        <!-- .icon-box -->
                    </div>
                </div>
                <div class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                    <div class="col-inner dark" style="background-color:rgb(51, 51, 51);padding:40px 30px 40px 30px;">
                        <div class="icon-box featured-box icon-box-left text-left">
                            <div class="icon-box-img" style="width: 60px">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="128" height="128"
                                            src="{{ asset('assets/wp-content/uploads/2019/05/medal.png') }}"
                                            class="attachment-medium size-medium" alt=""
                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/medal.png') }} 128w, {{ asset('assets/wp-content/uploads/2019/05/medal-100x100.png') }} 100w"
                                            sizes="(max-width: 128px) 100vw, 128px" />
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <h5 class="uppercase">hàng chính hãng</h5>
                                <p>Cam kết chất lượng</p>
                            </div>
                        </div>
                        <!-- .icon-box -->
                    </div>
                </div>
                <div class="col medium-6 small-6 large-3" data-animate="fadeInUp">
                    <div class="col-inner dark" style="background-color:rgb(41, 41, 41);padding:40px 30px 40px 30px;">
                        <div class="icon-box featured-box icon-box-left text-left">
                            <div class="icon-box-img" style="width: 60px">
                                <div class="icon">
                                    <div class="icon-inner">
                                        <img width="128" height="128"
                                            src="{{ asset('assets/wp-content/uploads/2019/05/operator.png') }}"
                                            class="attachment-medium size-medium" alt=""
                                            srcset="{{ asset('assets/wp-content/uploads/2019/05/operator.png') }} 128w, {{ asset('assets/wp-content/uploads/2019/05/operator-100x100.png') }} 100w"
                                            sizes="(max-width: 128px) 100vw, 128px" />
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box-text last-reset">
                                <h5 class="uppercase">tư vấn 24/7</h5>
                                <p>Hỗ trợ mọi thắc mắc</p>
                            </div>
                        </div>
                        <!-- .icon-box -->
                    </div>
                </div>
                <style scope="scope">
                </style>
            </div>
        </div>
        <!-- .section-content -->
        <style scope="scope">
            #section_946825305 {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
    </section>
    <section class="section sec_blog" id="section_1346428173">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div>
        <!-- .section-bg -->
        <div class="section-content relative">
            <div class="row" id="row-1113153278">
                <div class="col hide-for-small small-12 large-12" data-animate="fadeInUp">
                    <div class="col-inner text-center" style="padding:60px 0px 0px 0px;">
                        <h4 class="thin-font">ScentSignaute</h4>
                        <h1 class="a">TIN TỨC</h1>
                        <div class="gap-element clearfix" style="display:block; height:auto; padding-top:50px"></div>
                        <div class="row large-columns-3 medium-columns-2 small-columns-1 slider row-slider slider-nav-simple slider-nav-outside slider-nav-push"
                            data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 5000}'>
                            @foreach ($TinTuc as $data)
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href='{{ route('xemtintuc-view', ['id' => $data->id]) }}' class="plain">
                                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                                <div class="box-image">
                                                    <div class="image-cover" style="padding-top:70%;">
                                                        <img width="1135" height="768"
                                                            src="{{ asset('assets/images/tin_tuc/' . $data->Anh2) }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <!-- .box-image -->
                                                <div class="box-text text-left">
                                                    <div class="box-text-inner blog-post-inner">
                                                        <h5 class="post-title is-large uppercase">{{ $data->TieuDe }}</h5>
                                                        <div class="is-divider"></div>
                                                        <p class="from_the_blog_excerpt ">{{ $data->PhuDe }} </p>
                                                    </div>
                                                    <!-- .box-text-inner -->
                                                </div>
                                                <!-- .box-text -->
                                            </div>
                                            <!-- .box -->
                                        </a>
                                        <!-- .link -->
                                    </div>
                                    <!-- .col-inner -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .section-content -->
        <style scope="scope">
            #section_1346428173 {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        </style>
    </section>

@endsection
