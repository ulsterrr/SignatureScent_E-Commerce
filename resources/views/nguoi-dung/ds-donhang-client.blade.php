@extends('layouts.webpage.webpage')
@section('title', 'Danh sách đơn hàng')
@section('main-content')
<div id="content" class="content-area page-wrapper" role="main">
    <div class="row row-main">
        <div class="large-12 col">
            <div class="col-inner">
                <div class="woocommerce">
                    <div class="woocommerce-MyAccount-content">
                        <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                            <thead>
                                <tr>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">Đơn hàng</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">Ngày</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Tình trạng</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Tổng</span></th>
                                    <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">Thao tác</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Đơn hàng">
                                        <a href="http://mauweb.monamedia.net/vanibeauty/tai-khoan/view-order/952/"> #952 </a>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Ngày">
                                        <time datetime="2023-03-21T03:18:06+00:00">21 Tháng Ba, 2023</time>
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Tình trạng"> Đang xử lý </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Tổng">
                                        <span class="woocommerce-Price-amount amount">1,100,000&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></span> cho 2 mục
                                    </td>
                                    <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Các thao tác">
                                        <a href="http://mauweb.monamedia.net/vanibeauty/tai-khoan/view-order/952/" class="woocommerce-button button view">Xem</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
