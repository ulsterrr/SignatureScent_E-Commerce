<li id="search_ajax" class="cart-item current-dropdown cart-active">
<ul class="nav-dropdown nav-dropdown-simple current-dropdown cart-active" style="min-width: 500px !important;max-width: 500px !important;left:25%;">
    <li class="html widget_shopping_cart">
        <div class="widget_shopping_cart_content">
            <ul class="woocommerce-mini-cart cart_list product_list_widget">
                @foreach($sanPham as $item)
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <!-- Hiển thị thông tin tìm kiếm -->
                        <a href="{{ route('chitiet-sanpham-view',['id' => $item->MaSanPham]) }}">
                            <img width="300" height="300" src="{{ asset('assets/images/san_pham/' . $item->HinhAnh) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px" />
                            {{ $item->TenSanPham }}
                        </a>
                            <span class="quantity"><span class="woocommerce-Price-amount amount">{{ number_format($item->GiaTien, 0, ',', '.') }}&nbsp;
                            <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
</ul>
</li>

