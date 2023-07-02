<script>
    $(document).ready(function() {
        var dataChiTietDonHang = {!! json_encode($DonHang->chiTietDonHang) !!};
        $('#table-sanpham').DataTable({
            processing: true,
            destroy: true,
            autoWidth: true,
        });
        var dataChiTietSanPhamDH = {!! json_encode($ChiTietSanPhamDH) !!};
        $('#table-ctsanpham').DataTable({
            processing: true,
            destroy: true,
            autoWidth: true,
        });

        // Load dữ liệu có sẵn lên datatables
        dataChiTietDonHang.forEach(function(item, index) {
            var tablesp = $('#table-sanpham').DataTable();
            var data = item;
            var code = data.MaSanPham;
            var name = data.thong_tin_san_pham.TenSanPham;
            var gia = data.GiaTien;
            var sl = data.SoLuong;
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
                , formatMoneyNumber(gia)
                , `<input type="number" min="0" class="form-control text-center soluongsp" style="width:90px;height: 23px;" id="soluongsp-${code}" value="${sl}" />`
                , formatMoneyNumber(tt)
                , `<a id="xoasp-${code}" onclick="xoaSanPhamDonHang(this)" href="javascript:;" class="delete-row"><i class="i-Close-Window text-19 text-danger font-weight-700"></i></a>`
                , 1
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

        // cho các thẻ vào chế độ readonly
        var elements = document.querySelectorAll('input, textarea').forEach(element => {
            element.readOnly = true;
        });;
    });

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
