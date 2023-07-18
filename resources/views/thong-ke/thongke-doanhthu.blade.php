@extends('layouts.admin.master')
@section('title', 'Thống kê doanh thu')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Thống kê</h1>
    <ul>
        <li><a href="">Doanh thu</a></li>
        {{-- <li>Liên hệ</li> --}}
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>


<section class="contact-list">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-card alert-success" role="alert">
                <strong class="text-capitalize">Success!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <form id="searchForm" method="POST" class="mb-3 mt-0 p-3 pt-0">
                        @csrf
                        <div class="form-row">
                            {{-- <div class="col-md-3">
                                <label for="week_choose">Chọn tuần</label>
                                <div class="input-group">
                                    <input id="week_choose" class="form-control" placeholder="" name="week_choose">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-3">
                                <label for="created_at_from">Từ tháng</label>
                                <div class="input-group">
                                    <input id="created_at_from" class="form-control" placeholder="Tháng/Năm" name="created_at_from">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="created_at_to">Đến tháng</label>
                                <div class="input-group">
                                    <input id="created_at_to" class="form-control" placeholder="Tháng/Năm" name="created_at_to">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1"><i class="icon-regular i-Calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="ChiNhanh">Chi nhánh</label>
                                <select class="form-control" name="ChiNhanh" id="ChiNhanh">
                                    <option value="">Tất cả</option>
                                    @foreach($chiNhanh as $cn)
                                        <option value="{{ $cn->MaChiNhanh }}">{{ $cn->TenChiNhanh }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3 mt-2">
                                <label for="picker3"></label>
                                <div class="input-group">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm theo bộ lọc</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Tên chi nhánh</th>
                                    <th style="width: 20%">Tổng doanh thu tháng</th>
                                    <th style="width: 20%">Lợi nhuận</th>
                                    <th style="width: 20%">Tháng/Năm</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Load bằng Ajax cho nhanh --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="1" style="text-align:right">Tổng:</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('page-js')


<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<!-- page script -->
<script src="{{ asset('assets/js/tooltip.script.js') }}"></script>

<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/datatable-selectrow.script.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

{{-- Ajax load data cho ds user --}}
<script>
    $(document).ready(function() {
        var table = $('#ul-contact-list').DataTable({
            pageLength: 12,
            processing: true
            // , serverSide: true
            , destroy: true
            , scrollCollapse: true
            , scrollX: true
            , autoWidth: true
            , searching: false
            ,ajax: {
                url: "{{ route('thongKeDoanhThuAjax') }}",
                type: "GET",
            },
            columnDefs: [
                { width: '20%', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '20%', targets: 3 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
                    data: 'TenChiNhanh'
                }
                , {
                    data: null
                    , render: function(data) {
                        let amount = data.TongTien;
                        if(!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: null
                    , render: function(data) {
                        let amount = data.LoiNhuan;
                        if(!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: 'ThoiGian'
                }

            ], "drawCallback": function(settings) {
                    $(settings.nTable).find('.paginate_button').click(function() {
                        settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                        $(settings.nTable).dataTable(settings);
                    });
                }
                , footerCallback: function(row, data, start, end, display) {
                    var api = this.api();
                    var columnIndices = [1,2]; // Các cột muốn tính tổng

                    // Tính tổng cho các cột được chỉ định
                    columnIndices.forEach(function(columnIndex) {
                        var columnData = api.column(columnIndex, { search: 'applied' }).data();
                        var total = columnData.reduce(function(sum, value) {
                            if(columnIndex == 1) {
                                var numericValue = parseInt(value.TongTien.toString().replace(/,/g, '')); // Chuyển đổi giá trị thành số
                            } else {
                                var numericValue = parseInt(value.LoiNhuan.toString().replace(/,/g, '')); // Chuyển đổi giá trị thành số
                            }
                            return sum + numericValue;
                        }, 0);

                        $(api.column(columnIndex).footer()).html(total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','));
                    });
                }

                , dom: 'Bfrtip'
                , buttons: [
                    {
                        "extend": 'excel',
                        "text": 'In danh sách Excel',
                        'className': 'btn btn-primary text-white'
                    },
                    // 'excel', 'print'
                ]
                , initComplete: function() {
                    var btn = $('.buttons-excel');
                    btn.removeClass('btn-secondary');
                },
        });
    });
</script>
<script>
    $(document).ready(function(){
        // $('#created_at_from').pickadate({
        //     selectYears: true,
        //     selectMonths: true,
        // });
        // $('#created_at_to').pickadate({
        //     selectYears: true,
        //     selectMonths: true,
        // });
        $('#created_at_from').pickadate({
            today: 'Chọn',
            format: 'mm/yyyy',
            min: new Date(),
            formatSubmit: 'dd/mm/yyyy',
            // hiddenPrefix: 'prefix__',
            // hiddenSuffix: '__suffix',
            selectYears: true,
            selectMonths: true,
        });
        $('#created_at_to').pickadate({
            today: 'Chọn',
            format: 'mm/yyyy',
            min: new Date(),
            formatSubmit: 'dd/mm/yyyy',
            // hiddenPrefix: 'prefix__',
            // hiddenSuffix: '__suffix',
            selectYears: true,
            selectMonths: true,
        });
    });



    $(document).ready(function() {
    var dataTable = $('#ul-contact-list').DataTable();

    $('#searchForm').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "{{ route('loadDoanhThuFilter') }}",
            type: 'POST',
            data: {
                filter: formData,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                // Xóa các dữ liệu hiện tại của DataTables
                dataTable.clear().draw();

                // Thêm dữ liệu mới từ response vào DataTables
                dataTable.rows.add(response.data).draw();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});

</script>
@endsection
