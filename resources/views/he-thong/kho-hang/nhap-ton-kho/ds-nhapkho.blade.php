@extends('layouts.admin.master')
@section('title', 'Nhập kho sản phẩm')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Danh sách </h1>
    <ul>
        <li><a href="">nhập kho</a></li>
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
                <div class="card-header text-right bg-transparent">
                    <a type="button" href="{{ route('nhapKhoView') }}" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Nhập kho sản phẩm</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Mã phiếu nhập</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th style="width: 30%">Tổng tiền</th>
                                    <th style="width: 30%" class="text-center">Ghi chú</th>
                                    <th style="width: 30%">Ngày tạo</th>
                                    <th style="width: 10%">Chi nhánh</th>
                                    <th style="width: 5%" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Load bằng Ajax cho nhanh --}}
                            </tbody>
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

<script src="{{asset('assets/js/datatable-selectrow.script.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

{{-- Ajax load data cho ds user --}}
<script>
    $(document).ready(function() {
        var table = $('#ul-contact-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            , scrollCollapse: true
            , scrollX: true
            , autoWidth: true
            ,ajax: {
                url: "{{ route('layDsNhapKhoAjax') }}",
                type: "GET",
            },
            columnDefs: [
                { width: '80px', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '20%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '10%', targets: 5 },
                { width: '5%', targets: 6 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [
                {
                    data: 'MaNhapKho'
                }
                , {
                    data: 'san_pham_nhap.TenSanPham'
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
                    data: 'GhiChu'
                    , render: function(data) {
                        var mota = data;
                        return `<textarea style="width: 250px" class="form-control" rows="1" readonly name="MoTa" id="MoTa" placeholder="...">${mota}</textarea>`;
                    }
                }
                , {
                    data: 'created_at'
                    , render: function(data) {
                        return moment(data).format('DD/MM/YYYY HH:mm:ss');
                    }
                }
                , {
                    data: 'get_chi_nhanh.TenChiNhanh'
                }
                , {
                    data: null
                    , render: function(data, type, row) {
                        var detailUrl = "{{ route('nhapKho-view', ['id' => ':id']) }}";

                        return `<td class="text-center">
                                    <a href="${detailUrl.replace(':id', data.MaNhapKho)}" class="ul-link-action text-warning text-center" data-toggle="tooltip" data-placement="top" title="Xem chi tiết">
                                        <i class="i-Eye-Visible text-center"></i>
                                    </a>
                                </td>`;
                    },

                }

            ], "drawCallback": function(settings) {
                    $(settings.nTable).find('.paginate_button').click(function() {
                        settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                        $(settings.nTable).dataTable(settings);
                    });
                }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#picker2, #picker3').pickadate({
            selectMonths: true,
            selectYears:true,
        });
    });
</script>
@endsection
