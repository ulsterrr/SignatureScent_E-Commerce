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
                            <form class="woocommerce-cart-form" action="{{ route('capNhatGioHangView') }}" method="post">
                                @csrf
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
                                                    <a href="{{ route('xoa-sanpham-giohang',['id' => $item->MaSanPham]) }}" class="remove" aria-label="Xóa sản phẩm này" data-product_id="794" data-product_sku="">&times;</a>
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
                                                        <input type="button" value="-" class="minus button is-form"> <label class="screen-reader-text" for="SoLuong-{{ $item->MaSanPham }}">Số lượng</label>
                                                        <input type="number" id="SoLuong-{{ $item->MaSanPham }}" class="input-text qty text" step="1" min="0" max="9999" name="{{ $item->MaSanPham }}" value="{{ $item->SoLuong }}" title="SL" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Armani black suit số lượng" />
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
                                                    <button type="submit" class="btn-danger button danger mt-0 pull-left small" name="type_submit" value="DEL">Xoá hết giỏ hàng</button>
                                                    <button type="submit" class="btn-warning button primary mt-0 pull-left small" name="type_submit" value="UPD">Cập nhật giỏ hàng</button>
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
                                            <td data-title="Tổng phụ"><span class="woocommerce-Price-amount amount">{{ number_format($tongTien, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
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
                                                                            <input type="text" name="HoTen" id="HoTen" placeholder="Họ Tên" value="{{ auth()->user()->HoTen }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="Email" id="Email" placeholder="Email" value="{{ auth()->user()->email }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="SDT" id="SDT" placeholder="Số điện thoại" value="{{ auth()->user()->SDT }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" placeholder="Địa chỉ" name="DiaChi" id="DiaChi" value="{{ auth()->user()->DiaChi }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" placeholder="Quận/Huyện" name="QuanHuyen" id="QuanHuyen" value="{{ auth()->user()->QuanHuyen }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" class="input-text" placeholder="Tỉnh/Thành" name="TinhThanh" id="TinhThanh" value="{{ auth()->user()->TinhThanh }}"/>
                                                                        </p>

                                                                        {{-- <p class="form-row form-row-wide">
                                                                            <select name="calc_shipping_country" id="ChiNhanh">
                                                                                <option value="">Chọn chi nhánh đang giữ hàng&hellip;</option>
                                                                                <option value="VE">Venezuela</option>
                                                                                <option value="VN" selected='selected'>Việt Nam</option>
                                                                                <option value="WF">Wallis và Futuna</option>
                                                                                <option value="EH">Western Sahara</option>
                                                                            </select>
                                                                        </p> --}}
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
                                        <td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount">{{ number_format($tongGioHang, 0, ',', '.') }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
                                    </tr>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="" class="checkout-button button alt wc-forward">Đặt hàng và thanh toán</a>
                                    </div>
                                </div>
                                <div class="checkout_coupon mb-0">
                                    <div class="coupon">
                                        <h3 class="widget-title"><i class="icon-tag"></i> Mã ưu đãi</h3><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi" />

                                            <h6 id="coupon_error" class="mt-1 mb-1" style="color:red;"></h6>

                                        <input type="button" onclick="checkKhuyenMai()" class="is-form expand" name="apply_coupon" value="Áp dụng" />
                                    </div>
                                </div>
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
@section('bottom-js')
<script>
    function checkKhuyenMai() {
        var fieldValue = $('#coupon_code').val();
        if(!fieldValue || fieldValue == ""){
            var coupon_error = document.getElementById("coupon_error");
            coupon_error.textContent = "Vui lòng nhập mã khuyến mãi!";
        } else {

        var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('kiemtra-mauudai') }}"
                , method: 'POST'
                , data: {
                    mkm: fieldValue, // Đặt giá trị của $recordId tương ứng với bản ghi hiện tại
                    _token: token
                }
                , success: function(response) {
                    var coupon_error = document.getElementById("coupon_error");
                    if (response.valid) {
                        // Giá trị đã tồn tại, có lỗi
                        coupon_error.textContent = "Mã khuyến mãi không khả dụng!";
                    } else {
                        // Giá trị là duy nhất, không có lỗi
                        coupon_error.textContent = "";
                    }
                }
            });
        }
    };
</script>
@endsection
