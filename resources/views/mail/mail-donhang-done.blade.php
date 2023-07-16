<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        td , th{
            padding: 3px 10px 3px 10px;
        }
    </style>
<style>
	table,
	tr,
	td {
		border-collapse: collapse;
	}
	.limiter { margin: 0 auto } .container-table100 { background: #fff; display: -webkit-box; display: -webkit-flex; display: -moz-box; display: -ms-flexbox; display: flex; align-items: center; justify-content: center; flex-wrap: wrap; padding: 33px 30px } .wrap-table100 { width: 870px } .table100 { text-align: center; background-color: #fff } table { width: 100% } th, td { font-weight: unset; padding-right: 10px }
    .column1 { width: 10%; } .column2 { width: 15% } .column3 { width: 20% } .column4 { width: 15% } .column5 { width: 15% } .column6 { width: 15% }
    .table100-head th { padding-top: 8px; padding-bottom: 8px } .table100-body td { padding-top: 6px; padding-bottom: 6px } .table100 { position: relative; } .table100-head { position: absolute; width: 100%; top: 0; left: 0 } .table100-body { max-height: 585px; overflow: auto }
    .table100.ver1 th { font-family: Lato-Bold; font-size: 18px; color: #fff; line-height: 1.4; background-color: #6c7ae0 }
    .table100.ver1 td { font-family: Lato-Regular; font-size: 15px; color: gray; line-height: 1.4 } .table100.ver1 .table100-body tr:nth-child(even) { background-color: #f8f6ff }
    .table100.ver1 { overflow: hidden; box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15); -moz-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15); -webkit-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15); -o-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15); -ms-box-shadow: 0 0 40px 0 rgba(0, 0, 0, .15) }
</style>
</head>
<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:75%;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
                            <img src="https://i.imgur.com/BThUuEy.png" style="border-radius: 31px 3px 31px 3px;"  width="200" height="70"style="height:auto;display:block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 10px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">{{$title}}</h1>
                                        <p style="margin:0 0 5px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{!! nl2br($content) !!}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:0px 30px 22px 130px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;" cellpadding="2" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Mã đơn hàng:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->MaDonHang }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Tên:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->HoTen }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Địa chỉ:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->DiaChi . ', ' . $dh->QuanHuyen . ', ' . $dh->TinhThanh }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Số điện thoại:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->SDT }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Email:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->Email }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" with="25%"></td>
                                        <td style="color:#0f146d;font-weight:bold;text-align:left" valign="top" width="25%">
                                            Ghi chú:
                                        </td>
                                        <td style="padding-left:10px;color:#153643;">{{ $dh->GhiChu }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100 ver1 m-b-110">
                                    <div class="table100-head">
                                        <table>
                                            <thead>
                                                <tr class="row100 head">
                                                    <th class="cell100 column1" style="text-align: center;border: 1px solid black">STT</th>
                                                    <th class="cell100 column2" style="text-align: center;border: 1px solid black">Mã sản phẩm</th>
                                                    <th class="cell100 column3" style="text-align: center;border: 1px solid black">Tên sản phẩm</th>
                                                    <th class="cell100 column4" style="text-align: center;border: 1px solid black">Giá tiền</th>
                                                    <th class="cell100 column5" style="text-align: center;border: 1px solid black">Số lượng</th>
                                                    <th class="cell100 column6" style="text-align: center;border: 1px solid black">Tổng</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="table100-body">
                                        <table>
                                            <tbody>
                                                @foreach($list as $row)
                                                <tr style="border: 1px solid black" class="row100 body">
                                                  <td class="cell100 column1" style="text-align: center;border: 1px solid black">{{ $loop->iteration }}</td>
                                                  <td class="cell100 column2" style="text-align: center;border: 1px solid black">{{ $row['MaSanPham'] }}</td>
                                                  <td class="cell100 column3" style="border: 1px solid black">{{ $row->thongTinSanPham->TenSanPham }}</td>
                                                  <td class="cell100 column4" style="text-align: center;border: 1px solid black">{{ number_format($row['GiaTien'], 0, ',', '.') }}</td>
                                                  <td class="cell100 column5" style="text-align: center;border: 1px solid black">{{ $row['SoLuong'] }}</td>
                                                  <td class="cell100 column6" style="text-align: center;border: 1px solid black">{{ number_format($row['TongTien'], 0, ',', '.') }}</td>
                                                </tr>
                                                @endforeach
                                                <tr style="border: 1px solid black" class="row100 body">
                                                  <td class="cell100 column0" colspan="5" style="text-align: right;border: 1px solid black;font-weight:bold">Phí vận chuyển:</td>
                                                  <td class="cell100 column0" style="text-align: center;border: 1px solid black;font-weight:bold">{{ number_format($dh->VanChuyen == '0' ? 0 : 15000, 0, ',', '.') }}</td>
                                                </tr>
                                                <tr style="border: 1px solid black" class="row100 body">
                                                  <td class="cell100 column0" colspan="5" style="text-align: right;border: 1px solid black;font-weight:bold">Tổng cộng:</td>
                                                  <td class="cell100 column0" style="text-align: center;border: 1px solid black;font-weight:bold">
                                                      {{ number_format($total + ($dh->VanChuyen == '0' ? 0 : 15000), 0, ',', '.') }}
                                                      <span style="padding-left: 3px">VNĐ</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <td align="left" bgcolor="#ffffff">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                            <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                                <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" bgcolor="#1a82e2" style="border-radius: 6px;">
                                        <a target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;"
                                         href="{{route('xemdonhang-view', ['id' => $dh->MaDonHang])}}">Bấm vào đây để xác nhận nếu bạn đã nhận được hàng!</a>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <table>
                            <tr>
                                <td>
                                    <p>
                                        <ul>
                                            <li>Bạn có thể nhận trực tiếp hoặc nhờ người thân/ lễ tân/ đồng nghiệp nhận hộ nếu cung cấp đúng thông tin và số điện thoại người nhận hàng nhé.</li>
                                            <li>ScentSignature không hỗ trợ đồng kiểm nên bạn vui lòng liên hệ ScentSignature để được hỗ trợ nếu có khiếu nại gì nhé!</li>
                                        </ul>
                                        <span style="font-weight: bold">Lưu ý:</span>
                                        <ul>

                                            <li>Vui lòng giữ nguyên vẹn biên nhận bán hàng được dán trên thùng hàng, hóa đơn (nếu có) và hộp sản phẩm để đổi trả hàng hoặc bảo hành khi cần.</li>
                                        </ul>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </tr>
                    <tr>
                        <td style="padding:30px;background:#ee4c50;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                                <tr>
                                    <td style="padding:0;width:50%;" align="left">
                                        <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;">
                                            @ScentSignature, Since 2023
                                        </p>
                                    </td>
                                    <td style="padding:0;width:50%;" align="right">
                                        <table role="presentation" style="border-collapse:collapse;border:0;border-spacing:0;">
                                            <tr>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.twitter.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/tw_1.png" alt="Twitter" width="38" style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                                <td style="padding:0 0 0 10px;width:38px;">
                                                    <a href="http://www.facebook.com/" style="color:#ffffff;"><img src="https://assets.codepen.io/210284/fb_1.png" alt="Facebook" width="38" style="height:auto;display:block;border:0;" /></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
