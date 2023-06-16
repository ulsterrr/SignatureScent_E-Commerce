@extends('layouts.webpage.webpage')
@section('title', 'Giỏ hàng')
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="row row-main">
        <div class="large-12 col">
            <div class="col-inner">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="woocommerce row row-large row-divided">
                        <div class="col large-7 pb-0 ">
                            <form class="woocommerce-cart-form" action="#" method="post">
                                <div class="cart-wrapper sm-touch-scroll">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-name" colspan="3">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gioHang as $item)
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-remove">
                                                    <a href="#" class="remove" aria-label="Xóa sản phẩm này" data-product_id="794" data-product_sku="">&times;</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('chitiet-sanpham-view',['id' => $item->MaSanPham]) }}"><img width="300" height="300" src="{{ asset('assets/images/san_pham/' . $item->HinhAnh) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px" /></a>
                                                </td>
                                                <td class="product-name" data-title="Sản phẩm">
                                                    <a href="{{ route('chitiet-sanpham-view',['id' => $item->MaSanPham]) }}">{{ $item->TenSanPham }}</a>
                                                    <div class="show-for-small mobile-product-price">
                                                        <span class="mobile-product-price__qty">{{ $item->SoLuong }} x </span>
                                                        <span class="woocommerce-Price-amount amount">{{ number_format($item->GiaTien, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Giá">
                                                    <span class="woocommerce-Price-amount amount">{{ number_format($item->GiaTien, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </td>
                                                <td class="product-quantity" data-title="Số lượng">
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus button is-form"> <label class="screen-reader-text" for="quantity_6419217546125">Số lượng</label>
                                                        <input type="number" id="quantity_6419217546125" class="input-text qty text" step="1" min="0" max="9999" name="cart[82489c9737cc245530c7a6ebef3753ec][qty]" value="{{ $item->SoLuong }}" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Armani black suit số lượng" />
                                                        <input type="button" value="+" class="plus button is-form">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Tổng">
                                                    <span class="woocommerce-Price-amount amount">{{ number_format($item->GiaTien*$item->SoLuong, 0, ',', '.') }}&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </td>
                                            </tr>

                                            @endforeach
                                            <tr>
                                                <td colspan="6" class="actions clear">
                                                    <div class="continue-shopping pull-left text-left">
                                                        <a class="button-continue-shopping button primary is-outline" href="/cua-hang/"> &#8592; Tiếp tục xem sản phẩm </a>
                                                    </div>
                                                    <button type="submit" class="btn-danger button danger mt-0 pull-left small" name="update_cart" value="Cập nhật giỏ hàng">Xoá hết giỏ hàng</button>
                                                    <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="2dae93f264" /><input type="hidden" name="_wp_http_referer" value="/vanibeauty/gio-hang/" />
                                                    <button type="submit" class="btn-warning button primary mt-0 pull-left small" name="update_cart" value="Cập nhật giỏ hàng">Cập nhật giỏ hàng</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="cart-collaterals large-5 col pb-0">
                            <div class="cart-sidebar col-inner ">
                                <div class="cart_totals ">
                                    <table cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-name" colspan="2" style="border-width:3px;">Thanh toán</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <h2>Tổng số lượng</h2>
                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                        <tr class="cart-subtotal">
                                            <th>Tổng phụ</th>
                                            <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount">550,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                        <tr class="woocommerce-shipping-totals shipping">
                                            <td class="shipping__inner" colspan="2">
                                                <table class="shipping__table ">
                                                    <tbody>
                                                        <tr>
                                                            <td data-title="Giao hàng">
                                                                <ul id="shipping_method" class="shipping__list woocommerce-shipping-methods">
                                                                    <li class="shipping__list_item">
                                                                        <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0_free_shipping1" value="free_shipping:1" class="shipping_method" />
                                                                        <label class="shipping__list_label" for="shipping_method_0_free_shipping1">Giao hàng miễn phí cho đơn trên 2.000.000đ</label>
                                                                    </li>
                                                                </ul>
                                                                <p class="woocommerce-shipping-destination"> Đơn hàng dưới 2.000.000đ sẽ tính phí vận chuyển 15.000đ </p>
                                                                <form class="woocommerce-shipping-calculator" action="" method="post">
                                                                    <section class="shipping-calculator-form">
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="HoTen" id="HoTen" placeholder="Họ Tên" />
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="Email" id="Email" placeholder="Email" />
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="SDT" id="SDT" placeholder="Số điện thoại" />
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" value="" placeholder="Địa chỉ" name="DiaChi" id="DiaChi" />
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" value="" placeholder="Quận/Huyện" name="QuanHuyen" id="QuanHuyen" />
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" value="" placeholder="Tỉnh/Thành" name="TinhThanh" id="TinhThanh" />
                                                                        </p>
                                                                        <input type="hidden" id="woocommerce-shipping-calculator-nonce" name="woocommerce-shipping-calculator-nonce" value="d7dfe1700f" /><input type="hidden" name="_wp_http_referer" value="/vanibeauty/gio-hang/" />

                                                                        <p class="form-row form-row-wide">
                                                                            <select name="calc_shipping_country" id="ChiNhanh">
                                                                                <option value="">Chọn chi nhánh đang giữ hàng&hellip;</option>
                                                                                <option value="VE">Venezuela</option>
                                                                                <option value="VN" selected='selected'>Việt Nam</option>
                                                                                <option value="WF">Wallis và Futuna</option>
                                                                                <option value="EH">Western Sahara</option>
                                                                                {{-- @foreach
                                                                                    <option value=""></option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </p>
                                                                    </section>
                                                                </form>
                                                            </td>
                                                    </tbody>
                                        </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount">550,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
                                    </tr>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="" class="checkout-button button alt wc-forward">Đặt hàng và thanh toán</a>
                                    </div>
                                </div>
                                <form class="checkout_coupon mb-0" method="post">
                                    <div class="coupon">
                                        <h3 class="widget-title"><i class="icon-tag"></i> Mã ưu đãi</h3><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi" /> <input type="submit" class="is-form expand" name="apply_coupon" value="Áp dụng" />
                                    </div>
                                </form>
                                <div class="cart-sidebar-content relative"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-footer-content after-cart-content relative"></div>
                </div>
            </div>
            <!-- .col-inner -->
        </div>
        <!-- .large-12 -->
    </div>
    <!-- .row -->
</div>
@endsection
@section('page-js')
@endsection
