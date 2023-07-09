<script>
    function getDataModalB() {
        var mdh = "{!! $DonHang->MaDonHang !!}";
        var getData = "{{ route('layChiTietTheoDH', ['mdh' => ':id']) }}";
        var link = getData.replace(':id', mdh);
        var table = $('#ul-ctsp-ban').DataTable({
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
                { data: 'TinhTrang' , render: function(data) {
                    switch (data) {
                                case '0': return 'Tồn kho'; break;
                                case '1': return 'Bình thường'; break;
                                case '2': return 'Đang bán'; break;
                                case '3': return 'Đã bán'; break;
                                case '4': return 'Hoàn trả'; break;
                                default: return 'Không xác định'; break;
                            }
                } },
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
        $('#selectDataB').on('click', function() {
            var data = $('#ul-ctsp-ban').DataTable().rows('.selected').data();
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = data[0]['MaSanPham'];
            var codectsp = data[0]['MaCTSanPham'];
            var name = data[0].chi_tiet_cua_san_pham.TenSanPham;
            var sr = data[0]['SoSerial'];
            var qc = data[0].chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
            var kc = data[0]['KichCo'];
            var tt = data[0]['TinhTrang'];
            var table = $('#table-ctsanpham-ban').DataTable();

            switch (tt) {
                                case '0': tt = 'Tồn kho'; break;
                                case '1': tt = 'Bình thường'; break;
                                case '2': tt = 'Đang bán'; break;
                                case '3': tt = 'Đã bán'; break;
                                case '4': tt = 'Hoàn trả'; break;
                                default: return 'Không xác định'; break;
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
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHangB(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctspb-modal').css('display', '');
                $('#alert-card-ctspb-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctspb-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctspb-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctspb-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctspb-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
                $('#cn-modal-ban').modal('hide');
            }
        });

        $('#ul-ctsp-ban tbody').on('dblclick', 'tr', function() {
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = $(this).find('td:eq(0)').text();
            var codectsp = $(this).find('td:eq(1)').text();
            var name = $(this).find('td:eq(2)').text();
            var sr = $(this).find('td:eq(3)').text();
            var qc = $(this).find('td:eq(5)').text();
            var kc = $(this).find('td:eq(6)').text();
            var tt = $(this).find('td:eq(8)').text();
            var table = $('#table-ctsanpham-ban').DataTable();

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
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHangB(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctspb-modal').css('display', '');
                $('#alert-card-ctspb-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctspb-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctspb-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctspb-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctspb-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
            }
        });
    };

    function getDataModalD() {
        var maSanPhamList = "{!! implode(',', $DonHang->chiTietDonHang->pluck('MaSanPham')->toArray()) !!}";


        var getData = "{{ route('layChiTietTheoSanPhamDHModal', ['listmsp' => ':id']) }}";
        var link = getData.replace(':id', maSanPhamList);
        var table = $('#ul-ctsp-doi').DataTable({
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
                { data: 'TinhTrang' , render: function(data) {
                    switch (data) {
                                case '0': return 'Tồn kho'; break;
                                case '1': return 'Bình thường'; break;
                                case '2': return 'Đang bán'; break;
                                case '3': return 'Đã bán'; break;
                                case '4': return 'Hoàn trả'; break;
                                default: return 'Không xác định'; break;
                            }
                } },
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
        $('#selectDataD').on('click', function() {
            var data = $('#ul-ctsp-doi').DataTable().rows('.selected').data();
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = data[0]['MaSanPham'];
            var codectsp = data[0]['MaCTSanPham'];
            var name = data[0].chi_tiet_cua_san_pham.TenSanPham;
            var sr = data[0]['SoSerial'];
            var qc = data[0].chi_tiet_cua_san_pham.loai_kich_co.TenKichCo;
            var kc = data[0]['KichCo'];
            var tt = data[0]['TinhTrang'];
            var table = $('#table-ctsanpham-doi').DataTable();

            switch (tt) {
                                case '0': tt = 'Tồn kho'; break;
                                case '1': tt = 'Bình thường'; break;
                                case '2': tt = 'Đang bán'; break;
                                case '3': tt = 'Đã bán'; break;
                                case '4': tt = 'Hoàn trả'; break;
                                default: return 'Không xác định'; break;
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
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHangD(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctspd-modal').css('display', '');
                $('#alert-card-ctspd-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctspd-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctspd-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctspd-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctspd-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
                $('#cn-modal-doi').modal('hide');
            }
        });

        $('#ul-ctsp-doi tbody').on('dblclick', 'tr', function() {
            // Lấy giá trị của cột id và name trong hàng được chọn
            var codesp = $(this).find('td:eq(0)').text();
            var codectsp = $(this).find('td:eq(1)').text();
            var name = $(this).find('td:eq(2)').text();
            var sr = $(this).find('td:eq(3)').text();
            var qc = $(this).find('td:eq(5)').text();
            var kc = $(this).find('td:eq(6)').text();
            var tt = $(this).find('td:eq(8)').text();
            var table = $('#table-ctsanpham-doi').DataTable();

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
                , `<a id="xoactsp-${codectsp}" onclick="xoaCTSanPhamDonHangD(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
            ];

            var columnIndex = 2; // Chỉ số cột cần kiểm tra trùng

            // Lấy dữ liệu của cột đã có trong DataTables
            var existingData = table.column(columnIndex).data().toArray();

            // Kiểm tra giá trị mới có tồn tại trong mảng dữ liệu đã có hay không
            var isDuplicate = existingData.includes(newData[columnIndex]);

            if (isDuplicate) {
                // Xử lý khi có giá trị trùng
                $('#alert-card-ctspd-modal').css('display', '');
                $('#alert-card-ctspd-modal').removeClass('alert-success').addClass('alert-warning');
                $('#alert-card-ctspd-modal .alert-body-content').html(
                    `Sản phẩm mã: ${codectsp} đã được chọn trong danh sách.`);
                $('#alert-card-ctspb-modal').fadeIn(200);
                setTimeout(function() {
                    $("#alert-card-ctspd-modal").fadeOut();
                }, 10000);
                console.log('Giá trị đã tồn tại trong cột!');
            } else {
                $('#alert-card-ctspd-modal').css('display', 'none');;
                // Thêm dòng dữ liệu mới vào DataTables
                var newRowNode = table.row.add(newData).draw().node();
                $(newRowNode).find('td').addClass('text-center');
            }
        });
    };


    function xoaCTSanPhamDonHangB(cur) {
        var table = $('#table-ctsanpham-ban').DataTable();
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
    function xoaCTSanPhamDonHangD(cur) {
        var table = $('#table-ctsanpham-doi').DataTable();
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

    function getDataAndSubmit() {
        // Lấy dữ liệu từ DataTable
        var tableDataCTSPB = $('#table-ctsanpham-ban').DataTable().data().toArray();
        var tableDataCTSPD = $('#table-ctsanpham-doi').DataTable().data().toArray();

        // Lấy tên của cột gán cho biến trong mảng trả về
        var namedTableData = tableDataCTSPB.map(function(row) {
            var namedRow = {};
            $('#table-ctsanpham-ban th').each(function(index) {
                var columnName = $(this).attr('name');
                var columnValue = row[index];
                if (index >= 8) { // là 8 thì bỏ nút xoá
                    columnValue = '';
                } else namedRow[columnName] = row[index];

            });
            return namedRow;
        });
        var namedTableData2 = tableDataCTSPD.map(function(row) {
            var namedRow = {};
            $('#table-ctsanpham-doi th').each(function(index) {
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

        // Thêm dữ liệu vào các input ẩn trong form
        var $form = $('#form-doitra');
        // Tạo 2 biến input cho request để chứa mảng dữ liệu của sản phẩm
        $MaDonHang = $('<input>').attr('type', 'hidden').attr('name', 'MaDonHang').val("{!! $DonHang->MaDonHang !!}");
        $tableDataInput = $('<input>').attr('type', 'hidden').attr('name', 'dataTableDataCTSPB').val(JSON.stringify(namedTableData));
        $tableDataInput2 = $('<input>').attr('type', 'hidden').attr('name', 'dataTableDataCTSPD').val(JSON.stringify(namedTableData2));
        $form.append($tableDataInput, $tableDataInput2, $MaDonHang);

        // Submit form
        $form.submit();
    }

    function checkMSPMatching(dataTableDataCTSPB, dataTableDataCTSPD) {
        if (dataTableDataCTSPB.length == 0) {
            return "Danh sách sản phẩm đơn hàng không được để trống!"
        }
        if (dataTableDataCTSPD.length == 0) {
            return "Danh sách chi tiết sản phẩm bán hàng không được để trống!"
        }

        if (dataTableDataCTSPB.length != dataTableDataCTSPD.length) {
            var message = 'Các sản phẩm chọn đổi trả và sản phẩm chọn thay thế không khớp với nhau!';
            return message;
        } else {
            return '';
        }

    }

    function formatMoneyNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function formatToMoneyNumber(number) {
        return parseInt(number.toString().replace(/,/g, ''));
    }


    $(document).ready(function() {
        $('#table-ctsanpham-doi').DataTable({
            columnDefs: [{
                    "orderable": false
                    , "targets": 7
                }
            ]
        });
        $('#table-ctsanpham-ban').DataTable({
            columnDefs: [{
                    "orderable": false
                    , "targets": 7
                }
            ]
        });
        $('#ul-ctsp-ban tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('tr.odd.selected').removeClass('selected');
                $('tr.even.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
        $('#ul-ctsp-doi tbody').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('tr.odd.selected').removeClass('selected');
                $('tr.even.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });


        var card = document.getElementById("card-doi");
        var select = document.getElementById("DoiTra");
        select.addEventListener("change", function() {
            // Kiểm tra giá trị của select
            if (select.value == "TRA") {
                // Thực hiện các thay đổi khi giá trị là "TRA"
                card.style.display = "none"; // Ẩn card
            }
            else card.style.display = "block"; // Hiện card
        });
    });

</script>
