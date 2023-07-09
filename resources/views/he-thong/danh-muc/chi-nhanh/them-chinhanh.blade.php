@extends('layouts.admin.master')
@section('title', 'Thêm chi nhánh')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Thêm mới</h1>
    <ul>
        <li><a href="">Chi nhánh</a></li>
        <li>Tạo chi nhánh</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">`
    <div class="col-md-12">
        <p></p>
        <div class="card mb-4">
            <div class="col-md-12 mt-3">
                <div id="alert-card-sp-modal" class="alert alert-card fade show" role="alert"  style="display: none;">
                    <div class="alert-body-content"></div>
                </div>
            </div>
            <div class="card-body">
                <form id="new-chinhanh" method="POST" action="{{route('themmoiCN-add')}}" novalidate>
                    @csrf
                    <div class="row col-md-12">
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="validationCustomUsername" class="required">Mã chi nhánh *</label>
                                    <input type="text" class="form-control" onfocusout="checkMaCNUnique()" id="MaChiNhanh"  name="MaChiNhanh" placeholder="CN01" aria-describedby="inputGroupPrepend" required>

                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom07" class="required">Người quản lý *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="validationCustom07" name="NguoiQuanLy" placeholder="Người Quản Lý" readonly required
                                                aria-describedby="inputGroupPrependmodal">
                                        <div class="input-group-append">
                                            <button id="inputGroupPrependmodal" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">...</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Large Modal -->
                            <div class="col-md-12">
                                <div id="user-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="max-width: 1200px !important;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Tìm kiếm người dùng</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12">
                                                    <div class="table-responsive col-md-12">
                                                        <table id="ul-user-list" class="display table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" style="width: 80px">Ảnh đại diện</th>
                                                                    <th class="text-center" style="width: 180px">Họ và Tên</th>
                                                                    <th class="text-center" style="width: 150px">Email</th>
                                                                    <th class="text-center" style="width: 100px">Số điện thoại</th>
                                                                    <th class="text-center" style="width: 80px">Phân loại</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Dữ liệu sẽ được load bằng Ajax -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="getDataModal()" class="btn btn-primary">Tìm kiếm</button>
                                                <button id="selectData" type="button" class="btn btn-primary">Chọn</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Large Modal -->

                            <div class="col-md-8 mb-3">
                                <label for="validationCustomUsername" class="required">Tên chi nhánh *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustomUsername" name="TenChiNhanh" placeholder="Quận 6, Bình Chánh, etc, ..." aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>
                            <div class="col-md-12 mb-3"></div>
                            <div class="col-md-4">
                                <label for="validationCustomSDT" class="required">Số điện thoại 1 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomSDT" name="SDT1" placeholder="0909909990" aria-describedby="inputGroupPrepend" required>

                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Số điện thoại 2 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomUsername" name="SDT2" placeholder="0909909990" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername2" class="required">Số điện thoại 3 *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">+84</span>
                                    </div>
                                    <input type="text" class="form-control" id="validationCustomUsername2" name="SDT3" placeholder="0909909990" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername3" class="required">Số FAX</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername3" name="FAX" placeholder="309412922">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername4" class="required">Số Momo</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername4" name="MoMo" placeholder="0327772310" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername5" class="required">Số tài khoản (nếu có)</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="validationCustomUsername5" name="SoTaiKhoan" placeholder="10386900xx" aria-describedby="inputGroupPrepend">
                                </div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom02">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom02" name="DiaChi" placeholder="123 Đường ABC, phường ..." required>

                            </div>

                            <div class="col-md-12"></div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom03">Quận/Huyện</label>
                                <input type="text" class="form-control" id="validationCustom03" name="QuanHuyen" placeholder="Quận Cam" required>

                            </div>
                            <div class="col-md-9 mb-3">
                                <label for="validationCustom05">Tỉnh/Thành phố</label>
                                <input type="text" class="form-control" id="validationCustom05" name="TinhThanh" placeholder="TP HCM" required>

                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Thêm mới</button>

                        {{-- <div class="form-row">
                            <div class="col-md-12"></div>
                            <div class="form-group col-md-12">
                                <label for="sel">Người quản lý *:</label>
                                <input type="text" class="form-control" id="validationCustom05" name="NguoiQuanLy" placeholder="Người Quản Lý" required>
                            </div>
                            <div class="col-md-12 mt-3"></div>
                        </div> --}}
                    </div>
                    <div class="col-md-6">
                        HÌNH ẢNH CỬA HÀNG CỦA CHI NHÁNH
                        <div class="input-group mb-3">
                            {{-- <div class="input-group-prepend">
                                <button type="submit" style="width: 75px; border-color: #10163a;" class="btn btn-primary" id="inputGroupFileAddon01">Tải lên</button>
                            </div> --}}
                            <div class="custom-file">
                                <input onchange="loadFile(event)" type="file" class="custom-file-input" name="AnhDaiDien" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFileAddon01"><span id="ChooseFile">Chọn ảnh</span></label>
                            </div>
                            @if (!true)
                                <img id="output" src="{{ asset('assets/images/faces/' . $user->AnhDaiDien) }}" style="padding: 10px 0px 0px 0px;" class="d-block w-100 -top-3" alt="First slide">
                            @else
                                <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 0px 0px 0px;" class="d-block w-100 -top-3" alt="First slide">
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection

@section('page-js')


<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>

@endsection

@section('bottom-js')

<script>
    $(document).ready(function() {
        $('#picker2, #picker3').pickadate();
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        $("#ChooseFile").text(event.target.files[0].name);

    };
</script>
<script>
function getDataModal() {
    //var tabledestroy = $('#ul-user-list').DataTable();
    // Hủy bỏ DataTable hiện tại
    //tabledestroy.destroy();

    var table = $('#ul-user-list').DataTable({
      processing: true,
      serverSide: true,
      destroy: true, // thêm phương thức tự huỷ và nhận option mới khi có sự kiện cài đặt lại datatable
      ajax: {
        url: "{{ route('dsUserModal') }}",
        type: 'GET',
      },
      columns: [
        {data: 'AnhDaiDien', name: 'AnhDaiDien', searchable: false, orderable: false},
        {data: 'HoTen', name: 'HoTen'},
        {data: 'email', name: 'email'},
        {data: 'SDT', name: 'SDT'},
        {data: 'LoaiTaiKhoan', name: 'LoaiTaiKhoan', searchable: false, orderable: false},
      ],
      "columnDefs": [
        { className: "text-center", "targets": "_all" },
      ],
      createdRow: function(row, data, dataIndex) {
        $(row).find('td').css('vertical-align', 'middle');

            var loaiTaiKhoan = data.LoaiTaiKhoan;
            var avt = data.AnhDaiDien;
            var badgeClass = '';
            var badgeText = '';

            switch (loaiTaiKhoan) {
                case 'A':
                    badgeClass = 'badge-danger';
                    badgeText = 'Admin';
                    break;
                case 'M':
                    badgeClass = 'badge-info';
                    badgeText = 'Quản lý';
                    break;
                case 'E':
                    badgeClass = 'badge-primary';
                    badgeText = 'Nhân viên';
                    break;
                case 'C':
                    badgeClass = 'badge-success';
                    badgeText = 'Khách hàng';
                    break;
                case 'V':
                    badgeClass = 'badge-warning';
                    badgeText = 'Khách VIP';
                    break;
            }
            var badgeHtml = '<a href="#" class="badge ' + badgeClass + ' p-2">' + badgeText + '</a>';
            $(row).find('td:eq(4)').html(badgeHtml);

            if(avt){
                var avtHtml = '<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/' . ' + avt + ') }}" alt=""></div>';
                $(row).find('td:eq(0)').html(avtHtml);
            } else {
                var avtHtml = '<div class="ul-widget-app__profile-pic"><img class="profile-picture avatar-sm mb-2 rounded-circle img-fluid" src="{{ asset('assets/images/faces/1.jpg') }}" alt=""></div>';
                $(row).find('td:eq(0)').html(avtHtml);
            }
      }
    });

    // Xử lý khi click vào nút "Chọn"
    $('#selectData').on('click', function() {
      var data = table.rows('.selected').data();
      $('#validationCustom07').val(data[0]['email']);
      $('#user-modal').modal('hide');
    });

    $('#ul-user-list tbody').on('dblclick', 'tr', function() {
        // Lấy giá trị của cột id và name trong hàng được chọn
        var name = $(this).find('td:eq(2)').text();

        // Hiển thị giá trị lên các input ở trên modal
        $('#validationCustom07').val(name);

        // Ẩn modal
        $('#user-modal').modal('hide');
    });
};
$(document).ready(function () {
    var table = $('#ul-user-list').DataTable();

    $('#ul-user-list tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            $('tr.odd.selected').removeClass('selected');
            $('tr.even.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('#button').click(function () {
        table.row('.selected').remove().draw(false);
    });
});
</script>

<script>
    $(document).ready(function() {
      $("#new-chinhanh").validate({
        errorPlacement: function(error, element) {
            if(element.parent().hasClass("input-group")){
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        rules: {
            MaChiNhanh: "required",
            NguoiQuanLy: "required",
            SDT1: {
                required: true,
                number: true,
                rangelength: [10, 11],
            },
            HoTen:"required ",
            DiaChi: "required",
            QuanHuyen: "required",
            TinhThanh: "required",

        },
        messages: {
            MaChiNhanh: "Vui lòng nhập mã chi nhánh của bạn",
            NguoiQuanLy: "Vui lòng chọn người quản lý",
            SDT1: {
                required: "Vui lòng nhập số điện thoại",
                number: "SDT không đúng định dạng",
                rangelength: "Chiều dài SDT từ 10 đến 11 số",
            }, // thiếu chỗ này
            DiaChi: "Vui lòng nhập địa chỉ",
            QuanHuyen: "Vui lòng nhập Quận Huyện",
            TinhThanh: "Vui lòng nhập Tỉnh Thành",

        }
      });
    });

    function checkMaCNUnique() {
        var fieldValue = $('#MaChiNhanh').val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kiemtra-macn') }}",
            method: 'POST',
            data: {
                MaChiNhanh: fieldValue, // Đặt giá trị của $recordId tương ứng với bản ghi hiện tại
                _token: token
            },
            success: function(response) {
                if (response.valid) {
                    // Giá trị đã tồn tại, có lỗi
                    $('#alert-card-sp-modal').css('display', '');
                    $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card-sp-modal .alert-body-content').html(`MaChiNhanh: ${fieldValue} đã có thông tin tài khoản trong hệ thống.`);
                    $('#alert-card-sp-modal').fadeIn(100);
                } else {
                    // Giá trị là duy nhất, không có lỗi
                    $('#alert-card-sp-modal').css('display', 'none');
                }
            }
        });
    };
  </script>
@endsection
