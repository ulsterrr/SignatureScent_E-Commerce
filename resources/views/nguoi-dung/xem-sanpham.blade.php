@extends('layouts.webpage.webpage')
@section('page-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/toastr.css')}}">
@endsection
@section('title', 'Sản phẩm')
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="shop-container">
        <div class="container">
            <div class="woocommerce-notices-wrapper"></div>
        </div>
        <!-- /.container -->
        <div id="product-794" class="post-794 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty first instock shipping-taxable purchasable product-type-simple">
            <div class="product-container">
                <div class="product-main">
                    <div class="row content-row mb-0">
                        <div class="product-gallery large-6 col">
                            <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                <div class="badge-container is-larger absolute left top z-1">
                                </div>
                                <div class="image-tools absolute top show-on-hover right z-3">
                                </div>
                                <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half" data-flickity-options='{ "cellAlign": "center", "wrapAround": true, "autoPlay": false, "prevNextButtons":true, "adaptiveHeight": true, "imagesLoaded": true, "lazyLoad": 1, "dragThreshold" : 15, "pageDots": false, "rightToLeft": false       }'>
                                    <div class="woocommerce-product-gallery__image slide first"><img style="width:500px !important; height:500px !important" src="{{ asset('assets/images/san_pham/'.$SanPham->HinhAnh) }}" class="wp-post-image skip-lazy" alt="" title="41-450x585" data-caption=""></div>
                                </figure>
                                <div class="image-tools absolute bottom left z-3">
                                    <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
                                        <i class="icon-expand"></i> </a>
                                </div>
                            </div>
                            <!-- .product-thumbnails -->
                        </div>
                        <div class="product-info summary col-fit col entry-summary product-summary">
                            <h1 class="product-title product_title entry-title">{{$SanPham->TenSanPham}}</h1>
                            <div class="is-divider small"></div>

                            <div class="price-wrapper">
                                <p class="price product-page-price ">
                                    <span class="woocommerce-Price-amount amount">{{ number_format($SanPham->GiaTien, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                </p>
                            </div>
                            <div class="product-short-description">
                                <p><strong>Thương hiệu :</strong> {{$SanPham->ThuongHieu}}</p>
                            </div>
                            <form class="cart" action="{{ route('giohang-add') }}" method="post" enctype='multipart/form-data'>
                                @csrf
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus button is-form"> <label class="screen-reader-text" for="quantity_64192138a6cd6">Số lượng</label>
                                    <input type="number" id="quantity_64192138a6cd6" class="input-text qty text" step="1" min="1" max="9999" name="SoLuong" value="1" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Armani black suit số lượng" />
                                    <input type="button" value="+" class="plus button is-form">
                                    <input type="hidden" id="MaSanPham" value="{{$SanPham->MaSanPham}}" class="single_add_to_cart_button button alt">
                                </div>
                                <button type="submit" id="add-to-cart-button" name="add-to-cart" value="794" class="single_add_to_cart_button button alt">Thêm vào giỏ</button>
                            </form>
                            <div class="container">
                                <form>
                                    @foreach ($CTSP as $macn )
                                    <label>
                                        <input type="radio" name="radio" checked />
                                        <span>{{$macn->getChiNhanh->TenChiNhanh}}</span>
                                        <span class="pl-1 text-danger"> - Số lượng : Còn {{$macn->TonKho}} sản phẩm</span>

                                    </label>
                                    @endforeach
                                </form>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <p><strong>Thanh toán</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <!-- .col -->
                                    <div class="gallery-col col">
                                        <div class="col-inner">
                                            <a class="image-lightbox lightbox-gallery" href="{{ asset('assets/images/san_pham/momo.png') }}" title="">
                                                <div class="box has-hover gallery-box box-overlay dark">
                                                    <div class="box-image">
                                                        <img width="400" height="200" src="{{ asset('assets/images/san_pham/momo.png') }}" class="attachment-original size-original" alt="" ids="348,345,347,346,344,349" col_spacing="xsmall" columns="3" image_size="original" image_overlay="rgba(255, 255, 255, 0)" sizes="(max-width: 200px) 100vw, 400px" />
                                                        <div class="overlay fill" style="background-color: rgba(255, 255, 255, 0)">
                                                        </div>
                                                    </div>
                                                    <!-- .image -->
                                                    <div class="box-text text-left">
                                                        <p></p>
                                                    </div>
                                                    <!-- .text -->
                                                </div>
                                                <!-- .box -->
                                            </a>
                                        </div>
                                        <!-- .col-inner -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- .col -->
                                    <div class="gallery-col col">
                                        <div class="col-inner">
                                            <a class="image-lightbox lightbox-gallery" href="{{ asset('assets/images/san_pham/mbs.png') }}" title="">
                                                <div class="box has-hover gallery-box box-overlay dark">
                                                    <div class="box-image">
                                                        <img width="400" height="200" src="{{ asset('assets/images/san_pham/mbs.png') }}" class="attachment-original size-original" alt="" ids="348,345,347,346,344,349" col_spacing="xsmall" columns="3" image_size="original" image_overlay="rgba(255, 255, 255, 0)" sizes="(max-width: 200px) 100vw, 400px" />
                                                        <div class="overlay fill" style="background-color: rgba(255, 255, 255, 0)">
                                                        </div>
                                                    </div>
                                                    <!-- .image -->
                                                    <div class="box-text text-left">
                                                        <p></p>
                                                    </div>
                                                    <!-- .text -->
                                                </div>
                                                <!-- .box -->
                                            </a>
                                        </div>
                                        <!-- .col-inner -->
                                    </div>
                                </div>
                                <style scope="scope">
                                </style>
                            </div>
                        </div>
                        <!-- .summary -->
                        <div id="product-sidebar" class="mfp-hide">
                            <div class="sidebar-inner">
                                <div class="hide-for-off-canvas" style="width:100%">
                                    <ul class="next-prev-thumbs is-small nav-right text-right">
                                        <li class="prod-dropdown has-dropdown">
                                            <a href="http://mauweb.monamedia.net/vanibeauty/san-pham/sem-qwase-eiusmod-default-2/" rel="next" class="button icon is-outline circle">
                                                <i class="icon-angle-left"></i> </a>
                                            <div class="nav-dropdown">
                                                <a title="Sem qwase eiusmod default" href="http://mauweb.monamedia.net/vanibeauty/san-pham/sem-qwase-eiusmod-default-2/">
                                                    <img width="100" height="100" src="http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail wp-post-image" alt="" srcset="http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-100x100.jpg 100w, http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-150x150.jpg 150w, http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /></a>
                                            </div>
                                        </li>
                                        <li class="prod-dropdown has-dropdown">
                                            <a href="http://mauweb.monamedia.net/vanibeauty/san-pham/printed-chiffon-default/" rel="next" class="button icon is-outline circle">
                                                <i class="icon-angle-right"></i> </a>
                                            <div class="nav-dropdown">
                                                <a title="Printed chiffon default" href="http://mauweb.monamedia.net/vanibeauty/san-pham/printed-chiffon-default/">
                                                    <img width="100" height="100" src="http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/8-450x585-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail wp-post-image" alt="" srcset="http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/8-450x585-100x100.jpg 100w, http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/8-450x585-150x150.jpg 150w, http://mauweb.monamedia.net/vanibeauty/wp-content/uploads/2019/05/8-450x585-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- .sidebar-inner -->
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .product-main -->
                <div class="product-footer">
                    <div class="container">
                        <div class="woocommerce-tabs container tabbed-content">
                            <ul class="product-tabs small-nav-collapse tabs nav nav-uppercase nav-pills nav-left">
                                <li class="description_tab  active">
                                    <a href="#tab-description">Mô tả</a>
                                </li>
                                {{-- <li class="reviews_tab  ">
                                    <a href="#tab-reviews">Đánh giá (0)</a>
                                </li> --}}
                            </ul>
                            <div class="tab-panels">
                                <div class="panel entry-content active" id="tab-description">
                                    <div>
                                        <h2>{{$SanPham->TenSanPham}}</h2>
                                        <p>{!! nl2br($SanPham->MoTa) !!}</p>
                                    </div>
                                </div>
                                {{-- <div class="panel entry-content " id="tab-reviews">
                                    <div class="row" id="reviews">
                                        <div class="col large-12" id="comments">
                                            <h3 class="normal">Đánh giá</h3>
                                            <p class="woocommerce-noreviews">Chưa có đánh giá nào.</p>
                                        </div>
                                        <div id="review_form_wrapper" class="large-12 col">
                                            <div id="review_form" class="col-inner">
                                                <div class="review-form-inner has-border">
                                                    <div id="respond" class="comment-respond">
                                                        <h3 id="reply-title" class="comment-reply-title">Hãy là người đầu tiên nhận xét &ldquo;Armani black suit&rdquo; <small><a rel="nofollow" id="cancel-comment-reply-link" href="/vanibeauty/san-pham/armani-black-suit/#respond" style="display:none;">Hủy</a></small></h3>
                                                        <form action="http://mauweb.monamedia.net/vanibeauty/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
                                                            <div class="comment-form-rating"><label for="rating">Đánh giá của bạn</label><select name="rating" id="rating" required>
                                                                    <option value="">Xếp hạng&hellip;</option>
                                                                    <option value="5">Rất tốt</option>
                                                                    <option value="4">Tốt</option>
                                                                    <option value="3">Trung bình</option>
                                                                    <option value="2">Không tệ</option>
                                                                    <option value="1">Rất tệ</option>
                                                                </select></div>
                                                            <p class="comment-form-comment"><label for="comment">Nhận xét của bạn&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>
                                                            <p class="comment-form-author"><label for="author">Tên&nbsp;<span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" required /></p>
                                                            <p class="comment-form-email"><label for="email">Email&nbsp;<span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" required /></p>
                                                            <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Gửi đi" /> <input type='hidden' name='comment_post_ID' value='794' id='comment_post_ID' />
                                                                <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                            </p>
                                                        </form>
                                                    </div>
                                                    <!-- #respond -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- .tab-panels -->
                        </div>
                        <!-- .tabbed-content -->
                        <div class="related related-products-wrapper product-section">
                            <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase"> Sản phẩm tương tự </h3>
                            <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push" data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                @foreach ( $SanPhamTT as $data )


                                <div class="product-small col has-hover post-796 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                                    <div class="col-inner">
                                        <div class="badge-container absolute left top z-1">
                                        </div>
                                        <div class="product-small box ">
                                            <div class="box-image">
                                                <div class="image-fade_in_back">
                                                    <a href="{{ route('chitiet-sanpham-view',['id' => $data->MaSanPham]) }}">
                                                        <img width="300" height="300" src="{{ asset('assets/images/san_pham/'.$data->HinhAnh) }}" alt="" 300w, sizes="(max-width: 300px, max-height: 300px) 100vw, 300px" /> </a>
                                                </div>
                                                <!-- box-image -->
                                                <div class="box-text box-text-products text-center grid-style-2">
                                                    <div class="title-wrapper">
                                                        <p class="name product-title"><a href="{{ route('chitiet-sanpham-view',['id' => $data->MaSanPham]) }}">{{$data->TenSanPham}}</a></p>
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
                                    <!-- col -->
                                    <!-- col -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- container -->
                    </div>
                    <!-- product-footer -->
                </div>
                <!-- .product-container -->
            </div>
        </div>
        <!-- shop container -->
    </div>
</div>
@endsection
@section('page-js')
<script>
    $(document).on('click', '.single_add_to_cart_button', function(e) {
        e.preventDefault();
        var productId = $('#MaSanPham').val();
        var quantity = $('#quantity_64192138a6cd6').val();
        // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
        $.ajax({
            url: "{{ route('giohang-add') }}"
            , method: 'POST'
            , data: {
                _token: '{{ csrf_token() }}'
                , MaSanPham: productId
                , SoLuong: quantity
            }
            , success: function(response) {
                if (response.success) {
                    // Thực hiện cập nhật dropdown giỏ hàng (load lại danh sách sản phẩm trong giỏ hàng)
                    updateCartDropdown();
                } else {
                    // Nếu response trả về false, thực hiện chuyển hướng đến trang route khsc
                    window.location.href = "{{ route('dang-nhap') }}";
                }
            }
        });
    });
    function updateCartDropdown() {
        $.ajax({
            url: "{{ route('giohang-load') }}", // Định nghĩa route để lấy dữ liệu giỏ hàng
            method: 'GET'
            , success: function(response) {
                // Cập nhật HTML của dropdown giỏ hàng với dữ liệu trả về từ Ajax
                $('#gio-hang').html(response.html);
                // Thông báo fade
                $(document).ready(function() {
                    toastr.success("Bạn vừa thêm mới sản phẩm vào giỏ hàng thành công", "Đã thêm vào giỏ hàng!", {
                        showMethod: "fadeIn"
                        , hideMethod: "fadeOut"
                        , timeOut: 2000
                    });
                });
            }
        });
    }
</script>
@endsection
@section('page-js')
<script>
    $(document).on('click', '.single_add_to_cart_button', function(e) {
        e.preventDefault();
        var productId = $('#MaSanPham').val();
        var quantity = $('#quantity_64192138a6cd6').val();
        // Gửi yêu cầu Ajax để thêm sản phẩm vào giỏ hàng
        $.ajax({
            url: "{{ route('giohang-add') }}"
            , method: 'POST'
            , data: {
                _token: '{{ csrf_token() }}'
                , MaSanPham: productId
                , SoLuong: quantity
            }
            , success: function(response) {
                if (response.success) {
                    // Thực hiện cập nhật dropdown giỏ hàng (load lại danh sách sản phẩm trong giỏ hàng)
                    updateCartDropdown();
                } else {
                    // Nếu response trả về false, thực hiện chuyển hướng đến trang route khsc
                    window.location.href = "{{ route('dang-nhap') }}";
                }
            }
        });
    });
    function updateCartDropdown() {
        $.ajax({
            url: "{{ route('giohang-load') }}", // Định nghĩa route để lấy dữ liệu giỏ hàng
            method: 'GET'
            , success: function(response) {
                // Cập nhật HTML của dropdown giỏ hàng với dữ liệu trả về từ Ajax
                $('#gio-hang').html(response.html);
                // Thông báo fade
                $(document).ready(function() {
                    toastr.success("Bạn vừa thêm mới sản phẩm vào giỏ hàng thành công", "Đã thêm vào giỏ hàng!", {
                        showMethod: "fadeIn"
                        , hideMethod: "fadeOut"
                        , timeOut: 2000
                    });
                });
            }
        });
    }
</script>
@endsection
