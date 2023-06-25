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
                                                                <form id="thong-tin-mua" class="woocommerce-shipping-calculator" action="#" method="post">
                                                                    @csrf
                                                                    <section class="shipping-calculator-form">
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="HoTen" id="HoTen" placeholder="Họ Tên" value="{{ auth()->user()->HoTen }}"/>
                                                                        </p>
                                                                        <p class="form-row form-row-wide">
                                                                            <input type="text" name="Email" readonly style="background-color: #e6e6e6;" id="Email" placeholder="Email" value="{{ auth()->user()->email }}"/>
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

                                                                        <p class="form-row form-row-wide">
                                                                            <select name="ChiNhanh" id="ChiNhanh">
                                                                                <option value="">Chọn chi nhánh mua hàng&hellip;</option>
                                                                                @foreach ($ChiNhanh as $cn)
                                                                                    <option {{ $cn->MaChiNhanh == 'CN01' ? 'selected' : '' }} value="{{ $cn->MaChiNhanh }}">{{ $cn->TenChiNhanh . ' - ' . $cn->DiaChi . ', ' . $cn->QuanHuyen . ', ' . $cn->TinhThanh }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </p>
                                                                        <div class="form-row">
                                                                            <span class="wpcf7-form-control-wrap">
                                                                                <textarea name="GhiChu" style="min-height: 50px !important" cols="90" rows="5" class="wpcf7-form-control wpcf7-textarea" id="GhiChu" aria-required="true" aria-invalid="false" placeholder="Lời nhắn"></textarea>
                                                                            </span>
                                                                        </div>

                                                                        <input type="hidden" name="discount" value="{{$giamGia}}">
                                                                        <input type="hidden" id="payment-method" name="payment_method" value="">
                                                                        <input type="hidden" name="total_momo" value="{{$tongGioHang}}">
                                                                        <h3 class="widget-title"><i class="icon-tag"></i> Mã ưu đãi</h3><input type="text" name="MaKhuyenMai" class="input-text" id="MaKhuyenMai" value="{{ auth()->user()->KMSD }}" placeholder="Mã ưu đãi" />
                                                                        <h6 id="coupon_error" class="mt-1 mb-1" style="color:red;"></h6>
                                                                        <h6 id="coupon_apply" class="mt-1 mb-1" style="color:green;"></h6>
                                                                        <input type="button" onclick="checkKhuyenMai()" style="background-color: #1774cf;color: white" class="is-form expand" name="apply_coupon" value="Áp dụng" />
                                                                    </section>
                                                                </form>
                                                            </td>
                                                    </tbody>
                                        </tr>


                                    </table>
                                    </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Giảm giá</th>
                                        <td data-title="Giảm giá" id="coupon_subtotal" name="coupon_subtotal"><strong>
                                            <span id="-" class="woocommerce-Price-amount amount">-</span>
                                            <span id="giamgia" class="woocommerce-Price-amount amount">{{ number_format($giamGia, 0, ',', '.') }}</span>
                                            <span id="donvi-giam" style="color: #1774cf" class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Phí vận chuyển</th>
                                        <td data-title="Vận chuyển" id="transfer" name="transfer"><strong>
                                            <span id="phivanchuyen" class="woocommerce-Price-amount amount">{{ number_format($tongTien > 2000000 ? 0 : 15000, 0, ',', '.') }}</span>
                                            <span id="donvi-phivanchuyen" style="color: #1774cf" class="woocommerce-Price-currencySymbol">&#8363;</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng</th>
                                        <td data-title="Tổng"><strong><span id="tong-gh" class="woocommerce-Price-amount amount">{{ number_format($tongGioHang, 0, ',', '.') }}
                                            </span>
                                            <span class="woocommerce-Price-amount amount" style="color: #1774cf">&#8363;</span></strong> </td>
                                    </tr>
                                    </table>
                                    {{-- <form action="{{route('thanhtoanMOMO')}}" method="post">
                                        @csrf --}}
                                        <button id="MOMO" style="background-color: rgb(207, 13, 100)" class="button alt wc-forward" name="payUrl"> Thanh Toán MoMo</button>
                                    {{-- </form> --}}
                                    <div class="wc-proceed-to-checkout">
                                        <button id="ship-cod" type="submit" form="thong-tin-mua" class="checkout-button button alt wc-forward" name="payUrl"> Đặt hàng ship COD </button>
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
    var giamGia = 0;
    $(document).ready(function () {

        window.addEventListener( "pageshow", function ( event ) {
            var historyTraversal = event.persisted ||
                                    ( typeof window.performance != "undefined" &&
                                        window.performance.navigation.type === 2 );
            if ( historyTraversal ) {
                // Handle page restore.
                window.location.reload();
            }
        });

        if({!! $giamGia !!} > 0){
         giamGia = {!! $giamGia !!};
        }
        document.getElementById("giamgia").innerText = giamGia.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    });
    function checkKhuyenMai() {
        var fieldValue = $('#MaKhuyenMai').val();
        if(!fieldValue || fieldValue == ""){
            var coupon_error = document.getElementById("coupon_error");
            coupon_error.textContent = "Vui lòng nhập mã khuyến mãi!";
            coupon_apply.textContent = "";
                        var tong = 0;
                        tong = ({!! $tongGioHang !!} + {!! $giamGia !!});
                        document.getElementById("giamgia").innerText = 0;
                        var money = tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        document.getElementById("tong-gh").innerText = money;
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
                    var coupon_apply = document.getElementById("coupon_apply");
                    if (response.valid) {
                        // Giá trị đã tồn tại, có lỗi
                        coupon_apply.textContent = "";
                        coupon_error.textContent = "Mã khuyến mãi không khả dụng!";
                        var tong = 0;
                        tong = {!! $tongGioHang !!} + {!! $giamGia !!};
                        document.getElementById("giamgia").innerText = 0;
                        var money = tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        document.getElementById("tong-gh").innerText = money;
                    } else {
                        // Giá trị là duy nhất, không có lỗi
                        coupon_error.textContent = "";
                        coupon_apply.textContent = "Đã áp dụng mã khuyến mãi";
                        var tong = 0;
                        tong = ({!! $tongGioHang !!} + {!! $giamGia !!}) - response.giaTri;
                        document.getElementById("giamgia").innerText = response.giaTri.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        var money = tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        document.getElementById("tong-gh").innerText = money;
                    }
                }
            });
        }
    };
</script>
{{-- Loại thanh toán đặt hàng --}}
<script>
    document.getElementById('ship-cod').addEventListener('click', function() {
      // Thay đổi action của form khi ấn button 1
      document.getElementById('thong-tin-mua').action = "{{ route('datHang') }}";
      var tongTien = 0;
      var textTong = document.getElementById("tong-gh").innerText;
      tongTien = parseInt(textTong.toString().replace(/\./g, ''));
      document.getElementsByName('total_momo')[0].value = tongTien;
      document.getElementById('payment-method').value = 'cod';
      // Submit form
      if({!! $gioHang->count() !!} > 0){
        document.getElementById('thong-tin-mua').submit();
      }
    });

    document.getElementById('MOMO').addEventListener('click', function() {
      // Thay đổi action của form khi ấn button 2
      document.getElementById('thong-tin-mua').action = "{{route('thanhtoanMOMO')}}";
      var tongTien = 0;
      var textTong = document.getElementById("tong-gh").innerText;
      tongTien = parseInt(textTong.toString().replace(/\./g, ''));
      document.getElementsByName('total_momo')[0].value = tongTien;
      document.getElementById('payment-method').value = 'momo';

      // Submit form
      if({!! $gioHang->count() !!} > 0){
        document.getElementById('thong-tin-mua').submit();
      }
    });
</script>
@endsection
