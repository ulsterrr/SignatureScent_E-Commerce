@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('main-content')
           <div class="breadcrumb">
                <ul>
                    <li><h5><a href="">Bảng điều khiển</a></h5></li>
                </ul>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <!-- ICON BG -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Add-User"></i>
                            <div class="content" style="max-width: 200px !important">
                                <p class="text-muted mt-2 mb-0">Khách hàng mới</p>
                                <p id="tong_user" class="text-primary text-24 line-height-1 mb-2">205</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Financial"></i>
                            <div class="content" style="max-width: 200px !important">
                                <p class="text-muted mt-2 mb-0">Đã bán được</p>
                                <p id="tong_ban" class="text-primary text-24 line-height-1 mb-2">$4021</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Checkout-Basket"></i>
                            <div class="content" style="max-width: 200px !important">
                                <p class="text-muted mt-2 mb-0">Tổng đơn hàng</p>
                                <p id="tong_dh" class="text-primary text-24 line-height-1 mb-2">80</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Money-2"></i>
                            <div class="content" style="max-width: 200px !important">
                                <p class="text-muted mt-2 mb-0">Tổng doanh thu</p>
                                <p id="tong_dt" class="text-primary text-24 line-height-1 mb-2">$1200</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Biểu đồ năm hiện tại</div>
                            <div id="echartBar" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title">Doanh số theo chi nhánh</div>
                            <div id="echartPie" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card o-hidden mb-4">
                                <div class="card-header d-flex align-items-center border-0">
                                    <h3 class="w-50 float-left card-title m-0">Tài khoản mới</h3>
                                    {{-- <div class="dropdown dropleft text-right w-50 float-right">
                                        <button class="btn bg-gray-100" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="nav-icon i-Gear-2"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <a class="dropdown-item" href="#">Add new user</a>
                                            <a class="dropdown-item" href="#">View All users</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="">
                                    <div class="table-responsive">
                                        <table id="user_table" class="table  text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Họ Tên</th>
                                                    <th scope="col">Ảnh</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Trạng thái</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">

                    <div class="card mb-4">
                        <div id="list_sp" class="card-body">
                            <div class="card-title">Top sản phẩm bán chạy</div>
                            <div class="d-flex flex-column flex-sm-row align-items-center mb-3">
                                {{-- <img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="{{asset('assets/images/products/headphone-4.jpg')}}" alt="">
                                <div class="flex-grow-1">
                                    <h5 class=""><a href="">Wireless Headphone E23</a></h5>
                                    <p class="m-0 text-small text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <p class="text-small text-danger m-0">$450</p>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary btn-rounded btn-sm">View details</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('page-js')
     <script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
     <script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
     {{-- <script src="{{asset('assets/js/es5/dashboard.script.js')}}"></script> --}}
<script>
'use strict';
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };
$(document).ready(function() {
  // Gọi hàm AJAX khi trang được tải
  getDataForChart();
});

function getDataForChart() {
  $.ajax({
    url: "{{ route('charts-thangnam') }}",
    method: "GET",
    success: function(response) {
      // Xử lý dữ liệu trả về từ API
      var data = response;
      // Vẽ biểu đồ từ dữ liệu
      drawChart(data[0], data[1]);
      drawChartPie(data[2]);
      topUser(data[3]);
      topSanPham(data[4]);

      $("#tong_user").text(data[5]);
      $("#tong_ban").text(data[6]);
      $("#tong_dh").text(data[7]);
      $("#tong_dt").text(data[8].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' VNĐ');
    },
    error: function(error) {
      console.log(error);
    }
  });
}
function drawChart(dataOn, dataOff) {
  // Vẽ biểu đồ từ dữ liệu
  var echartElemBar = document.getElementById('echartBar');
    if (echartElemBar) {
        var echartBar = echarts.init(echartElemBar);
        echartBar.setOption({
            legend: {
                borderRadius: 0,
                orient: 'horizontal',
                x: 'right',
                data: ['Mua trực tiếp','Mua Online'],
                inactiveColor: "silver",
                textStyle: {
                    color: ['#ff0000', '#008000'],
                    fontFamily: 'Nunito, sans-serif',
                    fontSize: 13
                }
            },
            grid: {
                left: '8px',
                right: '8px',
                bottom: '0',
                containLabel: true
            },
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)',
                textStyle: {
                    fontFamily: 'Nunito, sans-serif',
                    fontSize: 13
                },
            },
            xAxis: [{
                type: 'category',
                data: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9',
                    'Tháng 10', 'Tháng 11', 'Tháng 12'],
                axisLabel: {
                    color: 'silver'
                },
                axisTick: {
                    alignWithLabel: true,
                },
                splitLine: {
                    show: false,
                },
                axisLine: {
                    show: true,
                }
            }],
            yAxis: [{
                type: 'value',
                axisLabel: {
                    formatter: '{value} VND',
                    color: 'silver'
                },
                min: 0,
                max: 50000000,
                interval: 5000000,
                axisLine: {
                    show: false
                },
                splitLine: {
                    show: true,
                    interval: 'auto'
                }
            }],

            series: [{
                name: 'Mua trực tiếp',
                data: dataOff,
                label: { show: false, color: '#0168c1' },
                type: 'bar',
                barGap: 0,
                color: 'tomato',
                smooth: true,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowOffsetY: -2,
                        shadowColor: 'rgba(0, 0, 0, 0.3)'
                    }
                }
            }, {
                name: 'Mua Online',
                data: dataOn,
                label: { show: false, color: '#639' },
                type: 'bar',
                color: 'cyan',
                smooth: true,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowOffsetY: -2,
                        shadowColor: 'rgba(0, 0, 0, 0.3)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                echartBar.resize();
            }, 500);
        });
    }
}
function drawChartPie(data){
    var echartElemPie = document.getElementById('echartPie');
    if (echartElemPie) {
        var echartPie = echarts.init(echartElemPie);
        echartPie.setOption({
            color: ['#00D300', '#00D3C9', 'orange', 'yellow'],
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },

            series: [{
                name: 'Sales by Country',
                type: 'pie',
                radius: '60%',
                center: ['50%', '50%'],
                data: data,
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        });
        $(window).on('resize', function () {
            setTimeout(function () {
                echartPie.resize();
            }, 500);
        });
    }
}
function topUser(user) {

        // Lặp qua mỗi người dùng trong mảng users
        user.forEach(function(user, index) {
            // Tạo thẻ tr
            var row = $('<tr>');
            if(!user.HinhAnh) user.HinhAnh = "1.jpg"
            // Thêm các cột vào hàng
            row.append($('<th>').text(index + 1));
            row.append($('<td>').text(user.HoTen));
            row.append($('<td>').html(`<img class="rounded-circle m-0 avatar-sm-table" src="/assets/images/faces/${user.HinhAnh}" alt="">`));
            row.append($('<td>').text(user.email));
            row.append($('<td>').html('<span class="badge badge-success">Active</span>'));

            // Thêm hàng vào bảng
            $('#user_table').append(row);
        });
}

function topSanPham(sp) {
    var sanpham = sp;
    // Lặp qua danh sách top sản phẩm và vẽ lại phần tử HTML
    sanpham.forEach(function(sp) {
            // Tạo phần tử HTML cho sản phẩm

            var detailUrl = "{{ route('chitietSPham-view', ['id' => ':id']) }}";
            var productHtml = '<div class="d-flex flex-column flex-sm-row align-items-center mb-3">' +
                '<img class="avatar-lg mb-3 mb-sm-0 rounded mr-sm-3" src="assets/images/san_pham/' + sp.HinhAnh + '" alt="">' +
                '<div class="flex-grow-1">' +
                '<h5 class=""><span>' + sp.TenSanPham + '</span></h5>' +
                '<p class="m-0 text-small text-muted">' + sp.MoTa.substring(0, 100) + '</p>' +
                '<p class="text-small text-danger m-0">' + sp.GiaTien.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ</p>' +
                '</div>' +
                '<div>' +
                `<a href="${detailUrl.replace(':id', sp.MaSanPham)}" class="btn btn-outline-primary btn-rounded btn-sm">Xem sản phẩm</a>` +
                '</div>' +
                '</div>';

            // Thêm phần tử HTML vào container tương ứng
            $('#list_sp').append(productHtml);
        });
}

$(document).ready(function () {

});
</script>
@endsection
