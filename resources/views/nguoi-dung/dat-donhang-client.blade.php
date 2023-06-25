@extends('layouts.webpage.webpage')
@section('title', 'Thông tin đơn hàng')
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="row row-main">
        <div class="large-12 col">
            <div class="col-inner">
                <div class="woocommerce">
                    <div class="row">
                        <div class="large-7 col">
                            <p>Trả tiền mặt khi giao hàng.</p>
                            <section class="woocommerce-order-details">
                                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>
                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                    <thead>
                                        <tr>
                                            <th class="woocommerce-table__product-name product-name">Sản phẩm</th>
                                            <th class="woocommerce-table__product-table product-total">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="woocommerce-table__line-item order_item">
                                            <td class="woocommerce-table__product-name product-name">
                                                <a href="http://mauweb.monamedia.net/vanibeauty/san-pham/armani-black-suit/">Armani black suit</a> <strong class="product-quantity">&times; 2</strong>
                                            </td>
                                            <td class="woocommerce-table__product-total product-total">
                                                <span class="woocommerce-Price-amount amount">1,100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="row">Tổng số phụ:</th>
                                            <td><span class="woocommerce-Price-amount amount">1,100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Giao nhận hàng:</th>
                                            <td>Giao hàng miễn phí</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phương thức thanh toán:</th>
                                            <td>Trả tiền mặt khi nhận hàng</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tổng cộng:</th>
                                            <td><span class="woocommerce-Price-amount amount">1,100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </section>
                            <section class="woocommerce-customer-details">
                                <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
                                    <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                                        <h2 class="woocommerce-column__title">Địa chỉ thanh toán</h2>
                                        <address> 123 123<br />14safdf<br />12sadc <p class="woocommerce-customer-details--phone">0999900002</p>
                                            <p class="woocommerce-customer-details--email">emailtemp@gmail.com</p>
                                        </address>
                                    </div>
                                    <!-- /.col-1 -->
                                    <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                                        <h2 class="woocommerce-column__title">Địa chỉ giao hàng</h2>
                                        <address> 123 123<br />14safdf<br />12sadc </address>
                                    </div>
                                    <!-- /.col-2 -->
                                </section>
                                <!-- /.col2-set -->
                            </section>
                        </div>
                        <div class="large-5 col">
                            <div class="is-well col-inner entry-content">
                                <p class="success-color woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><strong>Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</strong></p>
                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                    <li class="woocommerce-order-overview__order order"> Mã đơn hàng: <strong>952</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__date date"> Ngày: <strong>21 Tháng Ba, 2023</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__total total"> Email: <strong>emailtemp@gmail.com</strong>
                                    </li>
                                    <li class="woocommerce-order-overview__total total"> Tổng cộng: <strong><span class="woocommerce-Price-amount amount">1,100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong>
                                    </li>
                                    <li class="woocommerce-order-overview__payment-method method"> Phương thức thanh toán: <strong>Trả tiền mặt khi nhận hàng</strong>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
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
