@extends('layouts.webpage.webpage')
@section('title', 'Cửa hàng')
@section('before-content')
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-large">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="http://mauweb.monamedia.net/vanibeauty">Trang chủ</a> <span>&#47;</span> Cửa hàng</nav>
            </div>
            <div class="category-filtering category-filter-row show-for-medium">
                <a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain">
                    <i class="icon-menu"></i>
                    <strong>Lọc</strong>
                </a>
                <div class="inline-block">
                </div>
            </div>
        </div>
        <!-- .flex-left -->
        <div class="flex-col medium-text-center">
            <p class="woocommerce-result-count hide-for-medium"> Hiển thị một kết quả duy nhất</p>
            <form class="woocommerce-ordering" method="get">
                <select name="orderby" class="orderby">
                    <option value="menu_order" selected='selected'>Thứ tự mặc định</option>
                    <option value="popularity">Thứ tự theo mức độ phổ biến</option>
                    <option value="rating">Thứ tự theo điểm đánh giá</option>
                    <option value="date">Mới nhất</option>
                    <option value="price">Thứ tự theo giá: thấp đến cao</option>
                    <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
                </select>
                <input type="hidden" name="paged" value="1" />
            </form>
        </div>
        <!-- .flex-right -->
    </div>
    <!-- flex-row -->
</div>
@endsection
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="row category-page-row">
        <div class="col large-3 hide-for-medium ">
            <div id="shop-sidebar" class="sidebar-inner col-inner">
                <aside id="nav_menu-2" class="widget widget_nav_menu"><span class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                    <div class="is-divider small"></div>
                    <div class="menu-danh-muc-san-pham-vertical-menu-container">
                        <ul id="menu-danh-muc-san-pham-vertical-menu" class="menu">
                            @foreach ($LSP as $loaisp )
                            <li id="menu-item-819" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-819"><a href='cua-hang?maloai={{$loaisp->MaLoai}}'>{{$loaisp->TenLoai}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
                <aside id="woocommerce_price_filter-2" class="widget woocommerce widget_price_filter"><span class="widget-title shop-sidebar">Lọc theo giá</span>
                    <div class="is-divider small"></div>
                    <form method="get" action="cua-hang/">
                        <div class="price_slider_wrapper">
                            <div class="price_slider" style="display:none;"></div>
                            <div class="price_slider_amount">
                                <input type="text" id="min_price" name="min_price" value="0" data-min="0" placeholder="Giá thấp nhất" />
                                <input type="text" id="max_price" name="max_price" value="150000000" data-max="150000000" placeholder="Giá cao nhất" />
                                <button type="submit" class="button">Lọc</button>
                                <div class="price_label" style="display:none;"> Giá <span class="from"></span> &mdash; <span class="to"></span>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
            <!-- .sidebar-inner -->
        </div>
        <!-- #shop-sidebar -->
        <div class="col large-9">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-3-hover">
                    @foreach ( $SP as $data )
                    <div class="product-small col has-hover post-794 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty first instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="{{ route('chitiet-sanpham-view',['id' => $data->id]) }}">
                                            <img width="300" height="300" src="{{ asset('assets/images/san_pham/'.$data->HinhAnh) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""  sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="{{ route('chitiet-sanpham-view',['id' => $data->id]) }}">{{$data->TenSanPham}}</a></p>
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
                <!-- row -->
            </div>
            <!-- shop container -->
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script type='text/javascript'>
    var woocommerce_price_slider_params = {
        "currency_format_num_decimals": "0",
        "currency_format_symbol": "\u20ab",
        "currency_format_decimal_sep": ".",
        "currency_format_thousand_sep": ",",
        "currency_format": "%v\u00a0%s"
    };
</script>
@endsection
