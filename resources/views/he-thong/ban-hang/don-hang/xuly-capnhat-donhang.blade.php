<script>
    function getDataModal() {
        var table = $('#table-sanpham').DataTable();
        var maSanPhamList = table.column(1).data().toArray();

        var getData = "{{ route('layChiTietTheoSanPhamDHModal', ['listmsp' => ':id']) }}";
        var link = getData.replace(':id', maSanPhamList);
        var table = $('#ul-ctsp-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            , scrollX: true
            , autoWidth: true
            , ajax: {
                url: link.toString()
                , type: "GET"
            , }
            , columnDefs: [
                { width: '20%' , targets: 0 },
                { width: '20%' , targets: 1 },
                { width: '20%' , targets: 2 },
                { width: '20%' , targets: 3 },
                { width: '20%' , targets: 4 },
                { width: '20%' , targets: 5 },
                { width: '20%' , targets: 6 },
                { width: '20%' , targets: 7 },
                { width: '20%' , targets: 8 },
                { width: '20%' , targets: 9 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
                $(row).find('td').css('text-align', 'center');
            }
            , columns: [
                { data: 'MaSanPham' } ,
                { data: 'MaCTSanPham' },
                { data: null , render: function(data) { if (!data.chi_tiet_cua_san_pham) return ''; else return data.chi_tiet_cua_san_pham.TenSanPham; } },
                { data: 'SoSerial' },
                { data: null , render: function(data) {
                        if (!data.chi_tiet_cua_san_pham) return '';
                        let amount = data.chi_tiet_cua_san_pham.GiaTien;
                        if (!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                },
                { data: null , render: function(data) {
                        if (!data.chi_tiet_cua_san_pham.loai_kich_co) return '';
                        else return data.chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
                    }
                },
                { data: 'KichCo' },
                { data: null , render: function(data) { if (!data.get_chi_nhanh) return ''; else return data.get_chi_nhanh.TenChiNhanh; } },
                {
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
                },
                { data: 'GhiChu' }
            ]
            , "drawCallback": function(settings) {
                $(settings.nTable).find('.paginate_button').click(function() {
                    settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr(
                        'data-page'));
                    $(settings.nTable).dataTable(settings);
                });
            }
        });

        // Xử lý khi click vào nút "Chọn"
        $('#selectData').on('click', function() {
            var data = $('#ul-ctsp-list').DataTable().rows('.selected').data();
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = data[0]['MaSanPham'];
            var codectsp = data[0]['MaCTSanPham'];
            var name = data[0].chi_tiet_cua_san_pham.TenSanPham;
            var sr = data[0]['SoSerial'];
            var qc = data[0].chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
            var kc = data[0]['KichCo'];
            var tt = data[0]['TinhTrang'];
            var table = $('#table-ctsanpham').DataTable();
            switch (tt) {
                            case '0': tt = 'Tồn kho'; break;
                            case '1': tt = 'Bình thường'; break;
                            case '2': tt = 'Đang bán'; break;
                            case '3': tt = 'Đã bán'; break;
                            case '4': tt = 'Hoàn trả'; break;
                            default: tt = 'Không xác định'; break;
                        }
            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            table.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , codesp
                , codectsp
                , name
                , sr
                , qc
                , kc
                , tt
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctsp-modal').css('display', '');
                $('#alert-card-ctsp-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctsp-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctsp-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctsp-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctsp-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
                $('#cn-modal').modal('hide');
            }
        });

        $('#ul-ctsp-list tbody').on('dblclick', 'tr', function() {
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = $(this).find('td:eq(0)').text();
            var codectsp = $(this).find('td:eq(1)').text();
            var name = $(this).find('td:eq(2)').text();
            var sr = $(this).find('td:eq(3)').text();
            var qc = $(this).find('td:eq(5)').text();
            var kc = $(this).find('td:eq(6)').text();
            var tt = $(this).find('td:eq(8)').text();
            var table = $('#table-ctsanpham').DataTable();

            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            table.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , codesp
                , codectsp
                , name
                , sr
                , qc
                , kc
                , tt
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctsp-modal').css('display', '');
                $('#alert-card-ctsp-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctsp-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctsp-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctsp-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctsp-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
            }
        });
    };


    $(document).ready(function() {
        var dataChiTietDonHang = {!! json_encode($DonHang->chiTietDonHang) !!};
        $('#table-sanpham').DataTable({
            processing: true,
            destroy: true,
            autoWidth: true,
            columnDefs: [{
                    "orderable": false
                    , "targets": 6
                } // Tắt sắp xếp cho cột thứ hai
                , {
                    visible: false
                    , "targets": 7
                } // Ẩn cột Mã Sản phẩm cho cột số 7
                , {
                    "orderable": false
                    , "targets": 7
                } // Tắt sắp xếp cho cột thứ 7
            ],
        });
        var dataChiTietSanPhamDH = {!! json_encode($ChiTietSanPhamDH) !!};
        $('#table-ctsanpham').DataTable({
            processing: true,
            destroy: true,
            autoWidth: true,
            columnDefs: [{"orderable": false, "targets": 7}],
        });

        // Load dữ liệu có sẵn lên datatables
        dataChiTietDonHang.forEach(function(item, index) {
            var tablesp = $('#table-sanpham').DataTable();
            var data = item;
            var code = data.MaSanPham;
            var name = data.thong_tin_san_pham.TenSanPham;
            var gia = data.GiaTien;
            var sl = data.SoLuong;
            var tongTien = data.TongTien;

            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            tablesp.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , code
                , name
                , gia
                , `<input type="number" min="0" class="form-control text-center soluongsp" style="width:90px;height: 23px;" id="soluongsp-${code}" value="${sl}" />`
                , tongTien
                , `<a id="xoasp-${code}" onclick="xoaSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
                , sl
            ];

            // Thêm dữ liệu mới vào DataTables
            var newRow = tablesp.row.add(newData).draw().node();
            $(newRow).find('td:first-child').addClass('text-center');
            // Tính tổng tiền ở phần thanh toán
            tinhTongTien();

        });

        dataChiTietSanPhamDH.forEach(function(item, index) {
            var data = item;
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = data['MaSanPham'];
            var codectsp = data['MaCTSanPham'];
            var name = data.chi_tiet_cua_san_pham.TenSanPham;
            var sr = data['SoSerial'];
            var qc = data.chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
            var kc = data['KichCo'];
            var tt = data['TinhTrang'];
            var table = $('#table-ctsanpham').DataTable();
            switch (tt) {
                            case '0': tt = 'Tồn kho'; break;
                            case '1': tt = 'Bình thường'; break;
                            case '2': tt = 'Đang bán'; break;
                            case '3': tt = 'Đã bán'; break;
                            case '4': tt = 'Hoàn trả'; break;
                            default: tt = 'Không xác định'; break;
                        }
            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            table.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , codesp
                , codectsp
                , name
                , sr
                , qc
                , kc
                , tt
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];
            // Thêm dòng dữ liệu mới vào DataTables
            var newRowNode = table.row.add(newData).draw().node();
            $(newRowNode).find('td').addClass('text-center');
            // Tính tổng tiền ở phần thanh toán
            tinhTongTien();

        });



        $('#ul-ctsp-list tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('tr.odd.selected').removeClass('selected');
                $('tr.even.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#button').click(function() {
            table.row('.selected').remove().draw(false);
        });
    });

    function getDataSPModal() {
        var table = $('#ul-sp-list').DataTable({
            processing: true
            , serverSide: true
            , destroy: true
            , scrollX: true
            , autoWidth: true
            , ajax: {
                url: "{{ route('layDsSanPhamAjax') }}"
                , type: "GET"
            , }
            , columnDefs: [
                { width: '100px' , targets: 0 },
                { width: '20%' , targets: 1 },
                { width: '20%' , targets: 2 },
                { width: '20%' , targets: 3 },
                { width: '20%' , targets: 4 },
                { width: '20%' , targets: 5 },
                { width: '20%' , targets: 6 },
                { width: '20%' , targets: 7 },
                { width: '20%' , targets: 8 },
            ]
            , createdRow: function(row, data, dataIndex) {
                $(row).find('td').css('vertical-align', 'middle');
                $(row).find('td').css('text-align', 'center');
            }
            , columns: [
                { data: 'MaSanPham' }, { data: 'TenSanPham' },
                { data: null , render: function(data) {
                        let amount = data.GiaTien;
                        if (!amount) return 0;
                        let formattedAmount = numeral(amount).format('0,0'); // "1.000.000 ₫"
                        return formattedAmount;
                    }
                }, { data: 'created_at' , render: function(data) { return moment(data).format('DD/MM/YYYY HH:mm:ss'); } },
                { data: 'ThuongHieu' }, { data: null , render: function(data) { if (!data.loai_san_pham) return ''; else return data.loai_san_pham.TenLoai; } },
                { data: null , render: function(data) { if (!data.loai_kich_co) return ''; else return data.loai_kich_co.TenKichCo; } },
                { data: 'TrangThai' , render: function(data) { if (data == '1') { return 'Bình thường'; } else if (data == '0') { return 'Ngưng nhập hàng'; } else { return 'Tồn kho'; } } },
                { data: 'GhiChu' }
            ]
            , "drawCallback": function(settings) {
                $(settings.nTable).find('.paginate_button').click(function() {
                    settings._iDisplayStart = settings._iDisplayLength * parseInt($(this).attr(
                        'data-page'));
                    $(settings.nTable).dataTable(settings);
                });
            }
        });

        // Xử lý khi click vào nút "Chọn"
        $('#selectDataSp').on('click', function() {
            var data = $('#ul-sp-list').DataTable().rows('.selected').data();
            var tablesp = $('#table-sanpham').DataTable();

            var code = data[0].MaSanPham;
            var name = data[0].TenSanPham;
            var gia = data[0].GiaTien;
            var tt = gia;

            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            tablesp.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , code
                , name
                , gia
                , `<input type="number" min="0" class="form-control text-center soluongsp" style="width:90px;height: 23px;" id="soluongsp-${code}" value="${1}" />`
                , tt
                , `<a id="xoasp-${code}" onclick="xoaSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
                , 1
            ];
            var columnIndex = 1; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = tablesp.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-sp-modal').css('display', '');
                $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-sp-modal .alert-body-content').html(
                    `Sản phẩm mã: ${code} đã được chọn trong danh sách.`);
                $('#alert-card-sp-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-sp-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-sp-modal').css('display', 'none');
                // Thêm dữ liệu mới vào DataTables
                var newRow = tablesp.row.add(newData).draw().node();
                $(newRow).find('td:first-child').addClass('text-center');
                // Tính tổng tiền ở phần thanh toán
                tinhTongTien();
            }

            $('#sp-modal').modal('hide');
        });

        $('#ul-sp-list tbody').on('dblclick', 'tr', function() {
            var data = table.row(this).data();
            // Lấy giá trị của cột id và name trong hàng được chọn
            var code = $(this).find('td:eq(0)').text();
            var name = $(this).find('td:eq(1)').text();
            var gia = $(this).find('td:eq(2)').text();
            var tt = gia;
            var tablesp = $('#table-sanpham').DataTable();

            // Lấy số thứ tự lớn nhất hiện tại
            var maxIndex = 0;
            tablesp.column(0).data().each(function(value) {
                if (value > maxIndex) {
                    maxIndex = value;
                }
            });
            var newData = [
                maxIndex + 1
                , code
                , name
                , gia
                , `<input type="number" min="0" class="form-control text-center soluongsp" style="width:90px;height: 23px;" id="soluongsp-${code}" value="${1}" />`
                , tt
                , `<a id="xoasp-${code}" onclick="xoaSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
                , 1
            ];
            var columnIndex = 1; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = tablesp.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-sp-modal').css('display', '');
                $('#alert-card-sp-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-sp-modal .alert-body-content').html(
                    `Sản phẩm mã: ${code} đã được chọn trong danh sách.`);
                $('#alert-card-sp-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-sp-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-sp-modal').css('display', 'none');
                // Thêm dữ liệu mới vào DataTables
                var newRow = tablesp.row.add(newData).draw().node();
                $(newRow).find('td:first-child').addClass('text-center');
                // Tính tổng tiền ở phần thanh toán
                tinhTongTien();
            }
        });

        $(document).ready(function() {
            var table = $('#ul-sp-list').DataTable();

            $('#ul-sp-list tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    $('tr.odd.selected').removeClass('selected');
                    $('tr.even.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#button').click(function() {
                table.row('.selected').remove().draw(false);
            });
        });
    };

    function xoaSanPhamDonHang(cur) {
        var table = $('#table-sanpham').DataTable();
        // Xoá row khỏi DataTables
        var row = $(cur).closest('tr');
        table.row(row).remove().draw();

        // Reset số thứ tự
        table.rows().every(function(index) {
            var rowData = this.data();
            rowData[0] = index + 1;
            this.data(rowData);
        });
        tinhTongTien();
    }

    function xoaCTSanPhamDonHang(cur) {
        var table = $('#table-ctsanpham').DataTable();
        // Xoá row khỏi DataTables
        var row = $(cur).closest('tr');
        table.row(row).remove().draw();

        // Reset số thứ tự
        table.rows().every(function(index) {
            var rowData = this.data();
            rowData[0] = index + 1;
            this.data(rowData);
        });
    }
    $(document).ready(function() {
        var table = $('#table-sanpham').DataTable();

        // Lắng nghe sự kiện change trên input số
        $('#table-sanpham').on('focusout', '.soluongsp', function() { // Xử lý khi thay đổ số tính tổng tiền lại
            var row = $(this).closest('tr');
            var SoLuong = $(this).val();
            var price = $(row).find('td:eq(3)').text();

            var giaTien = parseInt(price.replace(/,/g, ''), 10);
            let tongTien = SoLuong * (giaTien ? giaTien : 0);
            let m = formatMoneyNumber(tongTien); // đổi định dạng ,

            // Cập nhật tổng tiền
            $(row).find('td:eq(5)').text(m);
            // Tính tổng tiền ở phần thanh toán
            // Cập nhật dữ liệu trong DataTables
            var dataTable = $('#table-sanpham').DataTable();
            var rowIndex = dataTable.row(row).index();
            // dataTable.cell({ row: rowIndex, column: 4 }).data(SoLuong).draw();
            dataTable.cell({
                row: rowIndex
                , column: 7
            }).data(SoLuong); // Lưu giá trị số lượng cho col ẩn, còn col kia vẫn giữ input cho nhập
            // dataTable.cell({ row: rowIndex, column: 4 }).data('<input type="number" min="0" class="form-control text-center soluongsp" style="width:90px;height: 23px;" value="' + SoLuong + '" />').draw();
            dataTable.cell({
                row: rowIndex
                , column: 5
            }).data(m).draw();
            tinhTongTien();
        });
    });

    function getDataAndSubmit() {
        // Lấy dữ liệu từ DataTable
        var tableDataSP = $('#table-sanpham').DataTable().data().toArray();
        var tableDataCTSP = $('#table-ctsanpham').DataTable().data().toArray();

        // Lấy tên của cột gán cho biến trong mảng trả về
        var namedTableData = tableDataSP.map(function(row) {
            var namedRow = {};
            $('#table-sanpham th').each(function(index) {
                var columnName = $(this).attr('name');
                var columnValue = row[index];
                if (index == 3 || index == 5) {
                    columnValue = formatToMoneyNumber(columnValue);
                }
                if (index == 4) {
                    columnValue = parseInt(columnValue.match(/value=\"(\d+)\"/)[1]);
                }
                if (index == 6) {
                    columnValue = '';
                    columnValue = ''; // Trên 6 là nút xoá sẽ gán lại rỗng
                    namedRow['SL'] = row[index + 1]; // Gán lấy số lượng cột số 7 bị ẩn ko chạy index cho tên biến mảng SL
                }
                namedRow[columnName] = columnValue;
            });
            return namedRow;
        });
        var namedTableData2 = tableDataCTSP.map(function(row) {
            var namedRow = {};
            $('#table-ctsanpham th').each(function(index) {
                var columnName = $(this).attr('name');
                var columnValue = row[index];
                if (index >= 8) { // là 8 thì bỏ nút xoá
                    columnValue = '';
                } else namedRow[columnName] = row[index];

            });
            return namedRow;
        });

        if (checkMSPMatching(namedTableData, namedTableData2).length > 1) {
            $('#alert-card-check-modal').css('display', '');
            $('#alert-card-check-modal').removeClass('alert-success').addClass('alert-danger');
            $('#alert-card-check-modal .alert-body-content').html(checkMSPMatching(namedTableData, namedTableData2));
            $('#alert-card-check-modal').fadeIn(200);
            setTimeout(function() {
                $("#alert-card-check-modal").fadeOut();
            }, 10000);
            // Sử dụng phương thức scrollTo() của window để cuộn lên đầu trang
            window.scrollTo({
                top: 0
                , behavior: "smooth" // Sử dụng hiệu ứng cuộn mượt (smooth)
            });
            return;
        } else {
            $('#alert-card-check-modal').css('display', 'none');
        }

        // Lấy thẻ div đang được hiển thị (có class active)
        var activeTab = document.querySelector('.tab-pane.fade.show.active');
        // Lấy tên id của tab gán cho loại thanh toán
        var tabId = activeTab.getAttribute('id');
        var MaDonHang = "{!! $DonHang->MaDonHang !!}";
        var tongTien = formatToMoneyNumber($('#TongTien').text());

        $ThanhToan = $('<input>').attr('type', 'hidden').attr('name', 'ThanhToan').val(tabId);
        $MaDonHang = $('<input>').attr('type', 'hidden').attr('name', 'MaDonHang').val(MaDonHang);
        $TongTien = $('<input>').attr('type', 'hidden').attr('name', 'TongTien').val(tongTien);

        // Thêm dữ liệu vào các input ẩn trong form
        var $form = $('#form-donhang');
        // Tạo 2 biến input cho request để chứa mảng dữ liệu của sản phẩm
        $tableDataInput = $('<input>').attr('type', 'hidden').attr('name', 'dataTableDataSP').val(JSON.stringify(namedTableData));
        $tableDataInput2 = $('<input>').attr('type', 'hidden').attr('name', 'dataTableDataCTSP').val(JSON.stringify(namedTableData2));
        $form.append($tableDataInput, $tableDataInput2, $ThanhToan, $MaDonHang, $TongTien);

        // Submit form
        $form.submit();
    }

    function checkMSPMatching(dataTableDataSP, dataTableDataCTSP) {
        var countMap = {};
        var mismatchedMSPs = [];
        if (dataTableDataSP.length == 0) {
            return "Danh sách sản phẩm đơn hàng không được để trống!"
        }
        if (dataTableDataCTSP.length == 0) {
            return "Danh sách chi tiết sản phẩm bán hàng không được để trống!"
        }
        // Đếm số lần xuất hiện của MSP trong mảng dataTableDataCTSP
        dataTableDataCTSP.forEach(function(item) {
            var msp = item.MSP;
            countMap[msp] = (countMap[msp] || 0) + 1;
        });

        // Kiểm tra số lần xuất hiện của MSP trong mảng dataTableDataCTSP và so sánh với SL trong mảng dataTableDataSP
        dataTableDataSP.forEach(function(item) {
            var msp = item.MSP;
            var sl = item.SL;

            if (countMap[msp] !== sl) {
                mismatchedMSPs.push({
                    MSP: msp
                    , SoLuongDon: sl
                    , SoLuongBan: countMap[msp] || 0
                });
            }
        });
        // Check nếu có 1 sản phẩm không hợp lệ số lượng bán
        var soLuongHopLe = 0;
        mismatchedMSPs.forEach(function(item) {
            if (item.SoLuongBan != item.SoLuongDon) {
                soLuongHopLe += 1;
            }
        })
        if (soLuongHopLe > 0) {
            var message = 'Các sản phẩm chọn bán không khớp với số lượng Sản phẩm trên đơn hàng:<br>';
            mismatchedMSPs.forEach(function(item) {
                message += ' - Mã sản phẩm: ' + item.MSP + ' - Số lượng đơn: ' + item.SoLuongDon + ' - Số lượng chọn bán: ' + item.SoLuongBan + '<br>';
            });
            return message;
        } else {
            return '';
        }

    }

    var phiVanChuyen = 0;
    var totalPay = 0;

    function tinhVanChuyen() {
        var radioButtonVC = document.getElementsByName("VanChuyen");
        var isChecked;
        // Check xem trong mảng 2 checkbox get được cái nào đang check và lấy giá trị theo thẻ input khai báo value
        for (var i = 0; i < radioButtonVC.length; i++) {
            if (radioButtonVC[i].checked) {
                isChecked = radioButtonVC[i].value;
                break;
            }
        }
        if (isChecked == "1") {
            phiVanChuyen = 15000;
        }
        if (isChecked == "0") {
            phiVanChuyen = 0;
        }
        tinhTongTien();
    }

    var flagFirstLoad = true; // Gắn cờ load lần đầu để xử lý tính tổng tiền theo data mới load
    function tinhTongTien() {
        var dataVC = {!! $DonHang->VanChuyen !!};
        var table = $('#table-sanpham').DataTable();
        var total = table.column(5).data().reduce(function(acc, value) {
            var number = parseFloat(value.replace(/,/g, ''));
            return acc + (isNaN(number) ? 0 : number);
        }, 0);
        if(flagFirstLoad){
            dataVC == 1 ? phiVanChuyen = 15000 : phiVanChuyen = 0;
            dataVC == 1 ? totalPay = total + 15000 : totalPay = total + 0;
            flagFirstLoad = false;
        }
        totalPay = total + phiVanChuyen;

        var tongTienSP = document.getElementById('TongTienSanPham');
        var tongTien = document.getElementById('TongTien');
        tongTienSP.textContent = formatMoneyNumber(total);
        tongTien.textContent = formatMoneyNumber(totalPay);
    }

    function formatMoneyNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function formatToMoneyNumber(number) {
        return parseInt(number.toString().replace(/,/g, ''));
    }

</script>
<script>
    $(document).ready(function() {
        $("#form-donhang").validate({
            errorPlacement: function(error, element) {
                if (element.parent().hasClass("input-group")) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            , rules: {
                HoTen: "required"
                , SDT: {
                    required: true
                    , number: true
                    , rangelength: [10, 11]
                , }
                , Email: {
                    required: true
                    , email: true
                , }
                , DiaChi: "required"
                , QuanHuyen: "required"
                , TinhThanh: "required",

            }
            , messages: {
                SDT: {
                    required: "Vui lòng nhập số điện thoại"
                    , number: "SDT không đúng định dạng"
                    , rangelength: "Chiều dài SDT từ 10 đến 11 số"
                , },
                Email: {
                    required: "Vui lòng nhập địa chỉ email"
                    , email: "Địa chỉ email không đúng định dạng"
                , }
                , HoTen: "Vui lòng nhập họ tên của bạn"
                , DiaChi: "Vui lòng nhập Địa chỉ"
                , QuanHuyen: "Vui lòng nhập Quận Huyện"
                , TinhThanh: "Vui lòng nhập Tỉnh Thành",

            }
        });
    });
</script>
