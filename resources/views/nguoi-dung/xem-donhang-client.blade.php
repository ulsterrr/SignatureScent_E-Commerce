@extends('layouts.webpage.webpage')
@section('title', 'Chi tiết đơn hàng')
@section('main-content')
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">
                    <div class="woocommerce">
                        <div class="woocommerce-MyAccount-content">
                            <p>Đơn hàng <mark class="order-number">{{ $donHang->MaDonHang }}</mark> đã được đặt lúc <mark
                                    class="order-date">{{ $donHang->created_at->format('d-m-Y H:i:s') }}</mark>
                                và hiện tại là <mark class="order-status">
                                    @switch($donHang->TrangThai)
                                        @case('NEW')
                                            Đang xử lý
                                        @break

                                        @case('SHIP')
                                            Đang vận chuyển
                                        @break

                                        @case('SENDED')
                                            Đã giao hàng
                                        @break

                                        @case('DONE')
                                            Hoàn thành
                                        @break

                                        @case('CANCEL')
                                            Huỷ đơn
                                        @break

                                        @case('MOMO_WAITS')
                                            Chờ thanh toán momo
                                        @break

                                        @case('MOMO_PAY')
                                            Đã thanh toán momo
                                        @break

                                        @default
                                    @endswitch
                                </mark>.</p>
                                <section class="woocommerce-order-details">
                                    <h2 class="woocommerce-order-details__title">THÔNG TIN ĐẶT HÀNG</h2>
                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                        <thead>
                                        </thead>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">Mã đơn hàng</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->MaDonHang }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">Họ tên</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->HoTen }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">Địa chỉ</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->DiaChi }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">Quận huyện</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->QuanHuyen }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">Tỉnh thành</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->TinhThanh }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr class="woocommerce-table__line-item order_item">
                                                    <td class="woocommerce-table__product-name product-name">
                                                        <strong class="product-quantity">SDT</strong>
                                                    </td>
                                                    <td class="woocommerce-table__product-total product-total">
                                                        <span
                                                            class="woocommerce-Price-amount">{{ $donHang->SDT }}&nbsp;
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    </table>
                                </section>
                            <section class="woocommerce-order-details">
                                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>
                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                    <thead>
                                        <tr>
                                            <th class="woocommerce-table__product-name product-name">Sản phẩm</th>
                                            <th class="woocommerce-table__product-table product-total">Tổng</th>
                                        </tr>
                                    </thead>
                                    @foreach ($donHang->chiTietDonHang as $sp)
                                        <tbody>
                                            <tr class="woocommerce-table__line-item order_item">
                                                <td class="woocommerce-table__product-name product-name">
                                                    <a
                                                        href="#">{{ $sp->thongTinSanPham->TenSanPham }}</a>
                                                    <strong class="product-quantity">&times; {{ $sp->SoLuong }}</strong>
                                                </td>
                                                <td class="woocommerce-table__product-total product-total">
                                                    <span
                                                        class="woocommerce-Price-amount amount">{{ number_format($sp->GiaTien, 0, ',', '.') }}&nbsp;<span
                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach

                                    <tfoot>
                                        <tr>
                                            <th scope="row">Tổng số phụ:</th>
                                            <td><span
                                                    class="woocommerce-Price-amount amount">{{ number_format($donHang->TongTien, 0, ',', '.') }}&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giao nhận hàng:</th>
                                            <td> @switch($donHang->VanChuyen)
                                                    @case('0')
                                                        Freeship
                                                    @break

                                                    @case('SHIP')
                                                        Phí ship 15.000vnd
                                                    @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phương thức thanh toán:</th>
                                            <td>
                                                @switch($donHang->LoaiThanhToan)
                                                    @case('cod')
                                                        Giao hàng thanh toán sau
                                                    @break

                                                    @case('momo')
                                                        Đã thanh toán online MoMo
                                                    @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tổng cộng:</th>
                                            <td><span
                                                    class="woocommerce-Price-amount amount">{{ number_format($donHang->TongTien, 0, ',', '.') }}&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </section>
                            <div class="woocommerce-notices-wrapper"></div>
                        </div>
                    </div>
                </div>
                <!-- .col-inner -->
            </div>
            <!-- .large-12 -->
        </div>
        <!-- .row -->
    </div>
@endsection
