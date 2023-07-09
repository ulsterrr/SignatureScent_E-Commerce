@extends('layouts.admin.master')
@section('title', 'Cập nhật sản phẩm')
@section('before-css')
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{ asset('assets/styles/vendor/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/styles/vendor/sweetalert2.min.css')}}">
@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Cập nhật</h1>
    <ul>
        <li><a href="">Sản phẩm</a></li>
        {{-- <li>Tạo sản phẩm</li> --}}
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="col-md-12">
    <div class="col-md-12">
        <p></p>
        <div class="col-md-12">
            @if (session('message.warning'))
            <div class="alert alert-card alert-warning" role="alert">
                <strong class="text-capitalize">Success!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation" method="POST" action="{{route('capnhatSPham-upd', ['id' => $SanPham->id])}}" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <div class="row col-md-12">
                    <div class="col-md-8">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername" class="required">Mã sản phẩm *</label>
                                <input type="text" class="form-control" id="validationCustomUsername" readonly name="MaSanPham" value="{{ $SanPham->MaSanPham }}" aria-describedby="inputGroupPrepend" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08" class="required">Email Người nhập *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly required
                                            value="{{ $SanPham ? $SanPham->NguoiTao : null }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        Người nhập được để trống!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom08" class="required">Tên Người nhập *:</label>
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="validationCustom08" name="NguoiTao" readonly required
                                            value="{{ $SanPham ? $SanPham->NguoiTao : null }}">
                                    </div>
                                    <div class="invalid-feedback">
                                        Người nhập được để trống!
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3"></div>

                            <div class="col-md-2 mb-3">
                                <label for="VAT" class="required">% VAT *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend1">%</span>
                                    </div>
                                    <input type="number" class="form-control" id="VAT" name="VAT" min="0" max="100" value="{{ $SanPham->VAT }}" onfocusout="tinhGiaVAT()" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="GiaVAT" class="required">Giá VAT</label>
                                <div class="input-group">
                                    <input type="money" readonly class="form-control" id="GiaVAT" name="GiaVAT" value="{{ $SanPham->GiaVAT }}" aria-describedby="inputGroupPrepend1">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTien" class="required">Giá tiền *</label>
                                <div class="input-group">
                                    <input type="money" onfocusout="thayDoiGiaTien()" class="form-control" id="GiaTien" name="GiaTien" value="{{ ($SanPham->GiaTien - $SanPham->GiaVAT) }}" min="0" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="GiaTienSauThue" class="required">Giá tiền sau thuế</label>
                                <div class="input-group">
                                    <input type="money" readonly class="form-control" id="GiaTienSauThue" name="GiaTienSauThue" value="{{ $SanPham->GiaTien }}" aria-describedby="inputGroupPrepend2">
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="validationCustomUsername" class="required">Tên sản phẩm *</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="validationCustomUsername" name="TenSanPham" value="{{ $SanPham->TenSanPham }}" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Tên sản phẩm không được để trống!
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="sel">Loại sản phẩm:</label>
                                <select class="form-control" name="LoaiSanPham" id="sel" class="required" required>
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach($LoaiSP as $lsp)
                                        <option value="{{ $lsp->MaLoai }}">{{ $lsp->TenLoai }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Loại kích cỡ không được để trống!
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="MoTa" class="required">Mô tả</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="3" name="MoTa" id="MoTa">{{ $SanPham->MoTa }}</textarea>
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="GhiChu" class="required">Ghi chú</label>
                                <textarea class="form-control" style="width: 100% !important;" rows="2" name="GhiChu" id="GhiChu">{{ $SanPham->GhiChu }}</textarea>
                            </div>

                            <div class="col-md-12"></div>
                        </div>
                        <button class="btn btn-primary" type="submit">Lưu thay đổi</button>

                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            HÌNH ẢNH SẢN PHẨM
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input onchange="loadFile(event)" type="file" class="custom-file-input" name="HinhAnh" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="inputGroupFileAddon01"><span id="ChooseFile">Chọn ảnh</span></label>
                                </div>
                                @if ($SanPham->HinhAnh)
                                <img id="output" src="{{ asset('assets/images/san_pham/' . $SanPham->HinhAnh) }}" style="padding: 10px 0px 0px 0px;" onerror="this.classList.add('no-image');" class="d-block w-100 -top-3">
                                @else
                                <img id="output" src="{{ asset('assets/images/faces/1.jpg') }}" style="padding: 10px 0px 0px 0px;" class="d-block w-100 -top-3">
                                @endif
                                </div>
                        </div>
                    </div>

                </form>

            </div>

        </div>
        <div class="row col-md-12 mt-5 mb-5">

            <div class="col-md-12">
                <h4>DANH SÁCH CÁC CHI TIẾT SẢN PHẨM</h4>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="ul-contact-list" class="display table" style="width:100%; overflow-y: scroll;">
                        <thead>
                            <tr>
                                <th style="width: auto">Mã CT sản phẩm</th>
                                <th style="width: auto">Số serial</th>
                                <th style="width: auto">Quy cách</th>
                                <th style="width: auto">Kích cỡ</th>
                                <th style="width: auto">Chi nhánh</th>
                                <th style="width: auto">Trạng thái</th>
                                <th style="width: auto">Ngày nhập</th>
                                <th style="width: auto">Người nhập</th>
                                <th style="width: auto">Ghi chú</th>
                                <th style="width: auto">Đơn hàng</th>
                                <th style="width: auto">Phiếu nhập</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Load bằng Ajax cho nhanh --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal cập nhật chi tiết sp --}}
        <!-- begin::modal-edit -->
        <div id="ctspmodal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Cập nhật chi tiết sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input hidden id="IDLSP-e" name="IDLSP-e" type="text" class="form-control">
                            <div class="form-group">
                                <label for="SoSerial" class="required">Số Serial</label>
                                <input id="SoSerial-e" name="SoSerial-e" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="KichCo" class="required">Kích cỡ</label>
                                <input type="text" class="form-control" name="KichCo-e" id="KichCo-e">
                            </div>
                            <div class="form-group">
                                <label for="GhiChu">Ghi chú</label>
                                <textarea class="form-control" name="GhiChu-e" id="GhiChu-e" rows="5" placeholder="..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="updateCTSPModal" class="btn btn-primary">Lưu thay đổi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::modal-edit -->
    </div>
    </div>
</div>

@endsection

@section('page-js')

<script src="{{asset('assets/js/form.validation.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
<!-- page script -->
<script src="{{ asset('assets/js/tooltip.script.js') }}"></script>

<script src="{{asset('assets/js/vendor/sweetalert2.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>

<script src="{{asset('assets/js/datatable-selectrow.script.js')}}"></script>

@endsection

@section('bottom-js')

<script>
    $(document).ready(function() {
        $('#picker2, #picker3').pickadate();
            $(document).ready(function() {
            var getCTSP = "{{ route('layDsCTSanPhamAjax', ['masanpham' => ':id']) }}";
            var ma_sanpham = {!! json_encode($SanPham->MaSanPham) !!};
            var link = getCTSP.replace(':id', ma_sanpham);
            var table = $('#ul-contact-list').DataTable({
                processing: true
                , serverSide: true
                , destroy: true
                , scrollX: true
                , autoWidth: true
                ,ajax: {
                    url: link.toString(),
                    type: "GET",
                }
                , columnDefs: [
                    { width: '80px', targets: 0 },
                    { width: '20%', targets: 1 },
                    { width: '20%', targets: 2 },
                    { width: '20%', targets: 3 },
                    { width: '20%', targets: 4 },
                    { width: '20%', targets: 5 },
                    { width: '20%', targets: 6 },
                    { width: '20%', targets: 7 },
                    { width: '20%', targets: 8 },
                    { width: '20%', targets: 9 },
                    { width: '20%', targets: 10 },
                    { width: '20%', targets: 11 },
                ]
                , createdRow: function(row, data, dataIndex) {
                    $(row).find('td').css('vertical-align', 'middle');
                    $(row).find('td').css('text-align', 'center');
                }
                , columns: [
                    {
                        data: 'MaCTSanPham'
                    }
                    , {
                        data: 'SoSerial'
                    }
                    , {
                        data: null
                        , render: function(data) {
                            if(!data.chi_tiet_cua_san_pham.loai_kich_co)
                            return '';
                            else return data.chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
                        }
                    }
                    , {
                        data: 'KichCo'
                    }
                    , {
                        data: null
                        , render: function(data) {
                            if(!data.get_chi_nhanh)
                            return '';
                            else return data.get_chi_nhanh.TenChiNhanh;
                        }
                    }
                    , {
                        data: 'TinhTrang'
                        , render: function(data) {
                            switch (data) {
                                case '0': return 'Tồn kho'; break;
                                case '1': return 'Bình thường'; break;
                                case '2': return 'Đang bán'; break;
                                case '3': return 'Đã bán'; break;
                                case '4': return 'Hoàn trả'; break;
                                default: return 'Không xác định'; break;
                            }
                        }
                    }
                    , {
                        data: 'created_at'
                        , render: function(data) {
                            return moment(data).format('DD/MM/YYYY HH:mm:ss');
                        }
                    }
                    , {
                        data: 'NguoiTao'
                    }
                    , {
                        data: 'GhiChu'
                    }
                    , {
                        data: null
                        , render: function(data) {
                            if(!data.MaDonHang)
                            return '';
                            else return data.MaDonHang;
                        }
                    }
                    , {
                        data: null
                        , render: function(data) {
                            if(!data.MaSanPham)
                            return '';
                            else return data.MaSanPham;
                        }
                    }
                    , {
                        data: null
                        , render: function(data, type, row) {
                            return `<td class="text-center">
                                        <a id="updateCTSP" class="ul-link-action text-success update-ctsp" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                            <i class="i-Edit"></i>
                                        </a>
                                        <a id="deleteCurUser" class="ul-link-action text-danger mr-1 delete-user" data-toggle="tooltip" data-placement="top" title="Xoá sản phẩm này!!!">
                                            <i class="i-Eraser-2"></i>
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
    });

    $('#ul-contact-list').on('click', 'a.delete-user', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var ml = data['MaCTSanPham'];
        // Hiển thị popup confirm
        swal({
            title: 'Bạn có chắc muốn xoá?',
            text: "Sau khi xác nhận " + ml + " sẽ bị xoá khỏi hệ thống!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận xoá!',
            cancelButtonText: 'Huỷ thao tác!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: true
        }).then(function() {
            $.ajax({
                url: "{{ route('xoaCTSPham-del', ['id' => ':id']) }}".replace(':id', id),
                type: 'GET',
                data: {_token: '{{ csrf_token() }}'}, // Đảm bảo token csrf đúng
                success: function(data) {
                swal('Đã xoá!', 'Dữ liệu đã được xoá thành công.', 'success').then(function() {
                    // Load lại datatable sau khi xoá thành công
                    $('#ul-contact-list').DataTable().ajax.reload(null, false);
                });
                },
                error: function(xhr, status, error) {
                swal('Xoá thất bại', 'Đã có lỗi xảy ra khi xoá dữ liệu', 'error');
                }
            });
        }, function(dismiss) {
                if (dismiss === 'cancel') {
                    swal(
                        'Huỷ thao tác'
                        , 'Bạn vẫn có thể thực hiện lại thao tác này :)'
                        , 'error'
                    )
                }
            });
    });

    //gọi modal cập nhật
    $('#ul-contact-list').on('click', 'a.update-ctsp', function(e) {
        e.preventDefault(); // ngăn chặn mặc định của thẻ <a> khi click

        var table = $('#ul-contact-list').DataTable();
        var data = table.row($(this).closest('tr')).data();
        var id = data['id'];
        var sr = data['SoSerial'];
        var ml = data['KichCo'];
        var gc = data['GhiChu'];
        $('#IDLSP-e').val(id);
        $('#SoSerial-e').val(sr);
        $('#KichCo-e').val(ml);
        $('#GhiChu-e').val(gc);
        $('#ctspmodal-edit').modal('show'); // Ẩn modal
    });

    $(document).ready(function() {
        $('#updateCTSPModal').click(function() {
            var id = $('#IDLSP-e').val();
            var sr = $('#SoSerial-e').val();
            var ml = $('#KichCo-e').val();
            var gc = $('#GhiChu-e').val();
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('capNhatCTSPham-upd', ['id' => ':id']) }}".replace(':id', id),
                type: 'POST',
                data: {
                    Id: id,
                    SoSerial: sr,
                    KichCo: ml,
                    GhiChu: gc,
                    _token: token
                },
                success: function(response) {
                    // Xử lý kết quả trả về từ server
                    $('#SoSerial-e').val('');
                    $('#KichCo-e').val('');
                    $('#GhiChu-e').val('');
                    $('#ul-contact-list').DataTable().ajax.reload(null, false);
                    $('#ctspmodal-edit').modal('hide'); // Ẩn modal
                    $('#alert-card').removeClass('alert-danger').addClass('alert-success');
                    $('#alert-card .alert-heading').html('Thành công');
                    $('#alert-card .alert-body-content').html('Dữ liệu đã được cập nhật thành công.');
                    $('#alert-card').fadeIn(500);
                    setTimeout(function(){
                        $("#alert-card").fadeOut();
                    }, 5000);
                },
                error: function(response) {
                    $('#lspmodal-edit').modal('hide'); // Ẩn modal
                    $('#alert-card').removeClass('alert-success').addClass('alert-danger');
                    $('#alert-card .alert-heading').html('Lỗi');
                    $('#alert-card .alert-body-content').html('Dữ liệu không được xử lý thành công.');
                    $('#alert-card').fadeIn(500);
                    setTimeout(function(){
                        $("#alert-card").fadeOut();
                    }, 5000);
                }
            });
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.classList.remove('no-image');
        $("#ChooseFile").text(event.target.files[0].name);

    };
</script>
<script>
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
    function tinhGiaVAT() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var vat = document.getElementById("VAT").valueAsNumber;
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      let giaVat = (vat * (giaTien ? giaTien : 0)) / 100;
      $('#GiaVAT').val(giaVat.toLocaleString('en-US'));
      tinhTongTien();
      tinhSauVAT();
    }
    function tinhTongTien() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var SoLuong = document.getElementById("SoLuongNhap").valueAsNumber;
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      var giaVAT = parseInt(document.getElementById("GiaVAT").value.replace(/,/g, ''), 10);
      let tongTien = SoLuong * ((giaTien ? giaTien : 0) + (giaVAT ? giaVAT : 0));
      $('#TongTien').val(tongTien.toLocaleString('en-US'));
    }
    function tinhSauVAT() {
      // Xử lý khi người dùng rời khỏi ô nhập liệu
      var giaTien = parseInt(document.getElementById("GiaTien").value.replace(/,/g, ''), 10);
      var giaVAT = parseInt(document.getElementById("GiaVAT").value.replace(/,/g, ''), 10);
      let tongTien = ((giaTien ? giaTien : 0) + (giaVAT ? giaVAT : 0));
      $('#GiaTienSauThue').val(tongTien.toLocaleString('en-US'));
    }

    function thayDoiGiaTien() {
        tinhGiaVAT();
        tinhTongTien();
        tinhSauVAT();
    }
</script>
<script>
    var select = document.getElementById("sel");
    var option = select.querySelector("option[value='<?php echo $SanPham->LoaiSanPham; ?>']");
    if (option) {
        option.selected = true;
    }


    var select1 = document.getElementById("sel1");
    var option1 = select.querySelector("option[value='<?php echo $SanPham->LoaiKichCo; ?>']");
    if (option1) {
        option1.selected = true;
    }
</script>
@endsection
