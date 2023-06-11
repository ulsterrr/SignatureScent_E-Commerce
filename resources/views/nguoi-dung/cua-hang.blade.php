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
                            <li id="menu-item-819" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-819"><a href="danh-muc/skincare/">Skincare</a></li>
                            <li id="menu-item-820" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-820"><a href="danh-muc/lipstick/">Lipstick</a></li>
                            <li id="menu-item-821" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-821"><a href="danh-muc/gloss/">Gloss</a></li>
                            <li id="menu-item-822" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-822"><a href="danh-muc/nail/">Nail</a></li>
                            <li id="menu-item-823" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-823"><a href="danh-muc/vani-beauty/">Vani Beauty</a></li>
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
                <aside id="woocommerce_products-3" class="widget woocommerce widget_products"><span class="widget-title shop-sidebar">Sản phẩm</span>
                    <div class="is-divider small"></div>
                    <ul class="product_list_widget">
                        <li>
                            <a href="san-pham/printed-chiffon-default/">
                                <img width="100" height="100" src="../wp-content/uploads/2019/05/8-450x585-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/8-450x585-100x100.jpg 100w, ../wp-content/uploads/2019/05/8-450x585-150x150.jpg 150w, ../wp-content/uploads/2019/05/8-450x585-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /> <span class="product-title">Printed chiffon default</span>
                            </a>
                            <span class="woocommerce-Price-amount amount">470,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </li>
                        <li>
                            <a href="san-pham/sem-qwase-eiusmod-default/">
                                <img width="100" height="100" src="../wp-content/uploads/2019/05/10-450x585-1-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/10-450x585-1-100x100.jpg 100w, ../wp-content/uploads/2019/05/10-450x585-1-150x150.jpg 150w, ../wp-content/uploads/2019/05/10-450x585-1-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /> <span class="product-title">Sem qwase eiusmod default</span>
                            </a>
                            <span class="woocommerce-Price-amount amount">250,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </li>
                        <li>
                            <a href="san-pham/framed-sleeve-tops-group/">
                                <img width="100" height="100" src="../wp-content/uploads/2019/05/28-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/28-100x100.jpg 100w, ../wp-content/uploads/2019/05/28-150x150.jpg 150w, ../wp-content/uploads/2019/05/28-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /> <span class="product-title">Framed-Sleeve Tops Group</span>
                            </a>
                            <span class="woocommerce-Price-amount amount">340,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </li>
                        <li>
                            <a href="san-pham/pilot-jacket-simple/">
                                <img width="100" height="100" src="../wp-content/uploads/2019/05/14-100x100.jpg" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/14-100x100.jpg 100w, ../wp-content/uploads/2019/05/14-150x150.jpg 150w, ../wp-content/uploads/2019/05/14-300x300.jpg 300w" sizes="(max-width: 100px) 100vw, 100px" /> <span class="product-title">Pilot jacket simple</span>
                            </a>
                            <span class="woocommerce-Price-amount amount">550,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- .sidebar-inner -->
        </div>
        <!-- #shop-sidebar -->
        <div class="col large-9">
            <div class="shop-container">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-3-hover">
                    <div class="product-small col has-hover post-794 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty first instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/armani-black-suit/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/41-450x585-1-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/41-450x585-1-300x300.jpg 300w, ../wp-content/uploads/2019/05/41-450x585-1-150x150.jpg 150w, ../wp-content/uploads/2019/05/41-450x585-1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/armani-black-suit/">Armani black suit</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">550,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-791 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/azrouel-dress-variable/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/3-450x585-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/3-450x585-300x300.jpg 300w, ../wp-content/uploads/2019/05/3-450x585-150x150.jpg 150w, ../wp-content/uploads/2019/05/3-450x585-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/azrouel-dress-variable/">Azrouel dress variable</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">190,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-786 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/dolor-sit-amet/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/14-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/14-300x300.jpg 300w, ../wp-content/uploads/2019/05/14-150x150.jpg 150w, ../wp-content/uploads/2019/05/14-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/dolor-sit-amet/">Dolor sit amet</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">770,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-796 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty last instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/fermentum-magna/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/3-1-450x585-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/3-1-450x585-300x300.jpg 300w, ../wp-content/uploads/2019/05/3-1-450x585-150x150.jpg 150w, ../wp-content/uploads/2019/05/3-1-450x585-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/fermentum-magna/">Fermentum magna</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">520,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-789 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty first instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/framed-sleeve-tops-group/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/28-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/28-300x300.jpg 300w, ../wp-content/uploads/2019/05/28-150x150.jpg 150w, ../wp-content/uploads/2019/05/28-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/framed-sleeve-tops-group/">Framed-Sleeve Tops Group</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">340,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-784 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/pilot-jacket-simple/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/14-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/14-300x300.jpg 300w, ../wp-content/uploads/2019/05/14-150x150.jpg 150w, ../wp-content/uploads/2019/05/14-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/pilot-jacket-simple/">Pilot jacket simple</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">550,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-792 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/printed-chiffon-default/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/8-450x585-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/8-450x585-300x300.jpg 300w, ../wp-content/uploads/2019/05/8-450x585-150x150.jpg 150w, ../wp-content/uploads/2019/05/8-450x585-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/printed-chiffon-default/">Printed chiffon default</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">470,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-787 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty last instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/printed-summer-dress-simple/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/5-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/5-300x300.jpg 300w, ../wp-content/uploads/2019/05/5-150x150.jpg 150w, ../wp-content/uploads/2019/05/5-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/printed-summer-dress-simple/">Printed summer dress simple</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">150,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-785 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty first instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/sem-qwase-eiusmod-default/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/10-450x585-1-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/10-450x585-1-300x300.jpg 300w, ../wp-content/uploads/2019/05/10-450x585-1-150x150.jpg 150w, ../wp-content/uploads/2019/05/10-450x585-1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/sem-qwase-eiusmod-default/">Sem qwase eiusmod default</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">250,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-795 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/sem-qwase-eiusmod-default-2/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-300x300.jpg 300w, ../wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-150x150.jpg 150w, ../wp-content/uploads/2019/05/5-FILEminimizer-1-450x585-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/sem-qwase-eiusmod-default-2/">Sem qwase eiusmod default</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">650,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-782 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/sleeve-odio-external/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/11-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/11-300x300.jpg 300w, ../wp-content/uploads/2019/05/11-150x150.jpg 150w, ../wp-content/uploads/2019/05/11-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/sleeve-odio-external/">Sleeve odio external</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">280,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                    <div class="product-small col has-hover post-760 product type-product status-publish has-post-thumbnail product_cat-gloss product_cat-lipstick product_cat-nail product_cat-skincare product_cat-vani-beauty last instock shipping-taxable purchasable product-type-simple">
                        <div class="col-inner">
                            <div class="badge-container absolute left top z-1">
                            </div>
                            <div class="product-small box ">
                                <div class="box-image">
                                    <div class="image-fade_in_back">
                                        <a href="san-pham/zrouel-dress-variable/">
                                            <img width="300" height="300" src="../wp-content/uploads/2019/05/42-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="../wp-content/uploads/2019/05/42-300x300.jpg 300w, ../wp-content/uploads/2019/05/42-150x150.jpg 150w, ../wp-content/uploads/2019/05/42-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /><img width="300" height="300" src="../wp-content/uploads/2019/05/1-300x300.jpg" class="show-on-hover absolute fill hide-for-small back-image" alt="" srcset="../wp-content/uploads/2019/05/1-300x300.jpg 300w, ../wp-content/uploads/2019/05/1-150x150.jpg 150w, ../wp-content/uploads/2019/05/1-100x100.jpg 100w" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                                    </div>
                                    <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    </div>
                                </div>
                                <!-- box-image -->
                                <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                        <p class="name product-title"><a href="san-pham/zrouel-dress-variable/">Zrouel dress variable</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                        <span class="price"><span class="woocommerce-Price-amount amount">250,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
