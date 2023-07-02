@extends('layouts.admin.master')
@section('page-css')
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">

@endsection

@section('main-content')

<div class="breadcrumb">
    <h1>Import Nhập kho</h1>
    <ul>
        <li><a href="">Sản Phẩm</a></li>
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

                <div class="card-header text-left bg-transparent">
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary" style="height: 34px;">
                            <label for="excelFile" class="m-0">
                                <input type="file" id="excelFile" style="display: none;">
                                Chọn file Excel
                            </label>
                        </button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split _r_drop_right" style="border-left-color: gray;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" x-placement="right-start" style="left: 50%">
                            <a class="dropdown-item" href="{{ route('download.NhapKho') }}">Tải mẫu</a>
                        </div>
                    </div>
                    <a id="saveBtn" type="button" class="btn btn-primary btn-md m-1"><i class="i-Add text-white mr-2"></i> Lưu </a>
                </div>
                {{-- Thông báo --}}
                <div class="col-md-12">
                    <div id="alert-card-check-import" class="alert alert-card fade show p-3" role="alert" style="display: none;">
                        <div class="alert-body-content"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll">
                            <thead>
                                <tr>
                                    <th style="width: 80px">STT</th>
                                    <th style="width: 20%">Mã sản phẩm</th>
                                    <th style="width: 20%">Tên sản phẩm</th>
                                    <th style="width: 10%">Số lượng</th>
                                    <th style="width: 50%">Kích cỡ</th>
                                    <th style="width: 30%">Ghi chú</th>
                                    <th style="width: 30%">Số serial</th>
                                    <th style="width: 30%" class="text-center">Mã chi nhánh</th>
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

<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/datatable-selectrow.script.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>

<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

{{-- Ajax load data cho ds user --}}
<script>
    function dataToTables(data) {
        var localization_vi = `{{ asset('assets/js/datatables-vi.json') }}`;
        var table = $('#ul-contact-list').DataTable({
            language: {
                url: localization_vi
            , }
            , processing: true
                // , serverSide: true
            , destroy: true
            , scrollCollapse: true
            , scrollX: true
            , autoWidth: true
            , data: data
            , columnDefs: [{ width: '80px' , targets: 0 } , { width: '20%' , targets: 1 } , { width: '20%' , targets: 2 } , { width: '10%' , targets: 3 } ,
                { width: '10%' , targets: 4 } , { width: '30%' , targets: 5 } , { width: '10%' , targets: 6 } , { width: '10%' , targets: 7 } ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
            }
            , columns: [{
                    data: 0
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }
                , {
                    data: 1
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }
                , {
                    data: 2
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }
                , {
                    data: 3
                    , render: function(data) {
                        let amount = data;
                        if (!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: 4
                    , render: function(data) {
                        let amount = data;
                        if (!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }
                , {
                    data: 5
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }
                , {
                    data: 6
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }
                , {
                    data: 7
                    , render: function(data) {
                        if (!data) return '';
                        return data;
                    }
                }

            ]
            , "drawCallback": function(settings) {
                $(settings.nTable).find('.paginate_button').click(function() {
                    settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr('data-page'));
                    $(settings.nTable).dataTable(settings);
                });
            }
        });
    };

</script>
<script>
    $(document).ready(function() {
        $('#picker2, #picker3').pickadate({
            selectMonths: true
            , selectYears: true
        , });
    });

</script>

<script>
    $(document).ready(function() {

        // Lắng nghe sự kiện submit của form
        document.getElementById('excelFile').addEventListener('change', function(event) {
            var file = event.target.files[0];

            // Tạo đối tượng FormData và gắn file vào
            var formData = new FormData();
            formData.enctype = "multipart/form-data";
            formData.append('file', file);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                url: "{{ route('importNhapKho') }}"
                , method: 'POST'
                , data: formData
                , contentType: false
                , processData: false
                , success: function(response) {
                    // Xử lý kết quả thành công
                    console.log(response); // In ra thông tin phản hồi từ máy chủ
                    dataToTables(response);
                    $('#alert-card-check-import').css('display', '');
                    $('#alert-card-check-import').removeClass('alert-danger').addClass('alert-success');
                    $('#alert-card-check-import .alert-body-content').html('Lấy dữ liệu thành công, vui lòng kiểm tra dữ liệu trước khi thực hiện lưu thông tin!');
                    $('#alert-card-check-import').fadeIn(200);
                    setTimeout(function() {
                        $("#alert-card-check-import").fadeOut();
                    }, 10000);
                    // Sử dụng phương thức scrollTo() của window để cuộn lên đầu trang
                    window.scrollTo({
                        top: 0
                        , behavior: "smooth" // Sử dụng hiệu ứng cuộn mượt (smooth)
                    });

                }
                , error: function(xhr, status, error) {
                    // Xử lý lỗi
                    console.log(error); // In ra thông báo lỗi
                    $('#alert-card-check-import').css('display', '');
                    $('#alert-card-check-import').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-check-import .alert-body-content').html('Có vấn đề khi lấy dữ liệu từ file excel, vui lòng kiểu tra lại trước khi import!');
                    $('#alert-card-check-import').fadeIn(200);
                    setTimeout(function() {
                        $("#alert-card-check-import").fadeOut();
                    }, 10000);
                    // Sử dụng phương thức scrollTo() của window để cuộn lên đầu trang
                    window.scrollTo({
                        top: 0
                        , behavior: "smooth" // Sử dụng hiệu ứng cuộn mượt (smooth)
                    });
                    return;
                }
            });
        });

        // Lắng nghe sự kiện click của nút "Lưu"
        $("#saveBtn").click(function() {
            // Lấy dữ liệu từ datatable
            var dataTable = $("#ul-contact-list").DataTable();
            var data = dataTable.data().toArray();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Gửi AJAX request để lưu dữ liệu vào cơ sở dữ liệu
            $.ajax({
                url: "{{ route('saveImportNhapKho') }}", // Đường dẫn xử lý lưu dữ liệu
                type: "POST"
                , data: {
                    _token: csrfToken,
                    data: data
                }
                , success: function(response) {
                    // alert("Dữ liệu đã được lưu vào cơ sở dữ liệu.");
                    $('#alert-card-check-import').css('display', '');
                    $('#alert-card-check-import').removeClass('alert-success').removeClass('alert-danger').addClass('alert-primary');
                    $('#alert-card-check-import .alert-body-content').html('Import sản phẩm thành công, vui lòng vào danh mục sản phẩm để cập nhật hình ảnh!');
                    $('#alert-card-check-import').fadeIn(200);
                    setTimeout(function() {
                        $("#alert-card-check-import").fadeOut();
                    }, 15000);
                    // Sử dụng phương thức scrollTo() của window để cuộn lên đầu trang
                    window.scrollTo({
                        top: 0
                        , behavior: "smooth" // Sử dụng hiệu ứng cuộn mượt (smooth)
                    });
                }
            });
        });
    });

    var loadFile = function(event) {
        var image = document.getElementById('output');
        $("#ChooseFile").text(event.target.files[0].name);
    };

</script>

@endsection
