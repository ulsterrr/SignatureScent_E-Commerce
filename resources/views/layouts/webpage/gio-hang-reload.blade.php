
@if(Auth::check() && $gioHang->count() > 0)
    <a href="{{route('giohang-view')}}" title="Giỏ hàng" class="header-cart-link is-small">
        <i class="icon-shopping-basket" data-icon-label="{{ $gioHang->count() }}">
        </i>
    </a>
    <ul class="nav-dropdown nav-dropdown-simple" style="min-width: 325px !important">
        <li class="html widget_shopping_cart">
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget">
                    @foreach($gioHang as $item)
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <!-- Hiển thị thông tin sản phẩm trong giỏ hàng -->
                        <a href="javascript:;" class="remove remove_from_cart_button" aria-label="Xóa sản phẩm này" data-product_id="794" data-cart_item_key="82489c9737cc245530c7a6ebef3753ec" data-product_sku="">&times;</a>
                        <a href="{{ route('chitiet-sanpham-view',['id' => $item->MaSanPham]) }}">
                            <img width="300" height="300" src="{{ asset('assets/images/san_pham/' . $item->HinhAnh) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px" />{{ $item->TenSanPham }}</a>
                            <span class="quantity">{{ $item->SoLuong }} &times; <span class="woocommerce-Price-amount amount">{{ number_format($item->GiaTien, 0, ',', '.') }}&nbsp;
                            <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </span>
                    </li>
                    @endforeach
                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <!-- Hiển thị tổng giá -->
                    <strong>Tổng:</strong>
                    <span class="woocommerce-Price-amount amount">{{ number_format($gioHang->sum('TongTien'), 0, ',', '.') }}&nbsp;
                        <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                    </span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons">
                    {{-- <a href="{{ route('giohang.index') }}" class="button wc-forward">Xem giỏ hàng</a>
                    <a href="{{ route('thanh-toan') }}" class="button checkout wc-forward">Thanh toán</a> --}}
                    <a href="/gio-hang" class="button wc-forward">Xem giỏ hàng</a>
                    <a href="#" class="button checkout wc-forward">Thanh toán</a>
                </p>
            </div>
        </li>
    </ul>
@else
    <a href="{{route('giohang-view')}}" title="Giỏ hàng" class="header-cart-link is-small">
        <i class="icon-shopping-basket" data-icon-label="0">
        </i>
    </a>
    <ul class="nav-dropdown nav-dropdown-simple">
        <li class="html widget_shopping_cart">
            <div class="widget_shopping_cart_content">
                <p class="woocommerce-mini-cart__empty-message">Chưa có sản phẩm trong giỏ hàng.</p>
            </div>
        </li>
    </ul>
@endif
