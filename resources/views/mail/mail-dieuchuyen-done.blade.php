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
</head>
<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:75%;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:40px 0 30px 0;background:#70bbd9;">
                            <img src="https://i.imgur.com/BThUuEy.png" style="border-radius: 31px 3px 31px 3px;" width="200" height="70"style="height:auto;display:block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;">{{$title}}</h1>
                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">{!! nl2br($content) !!}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr style="text-align: -webkit-center;">
                        <table style="border: 1px solid black;border-collapse: collapse !important;" style="padding:0 0 36px 0">
                        <thead>
                          <tr style="border: 1px solid black">
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">STT</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Mã Sản Phẩm</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Mã Chi Tiết Sản Phẩm</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Tên Sản Phẩm</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Chi nhánh cũ</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Chi nhánh mới</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Số Serial</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Tên Kích Cỡ</th>
                            <th class="text-center" style="background-color:cyan;border: 1px solid black">Kích Cỡ</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($list_sp->chiTietDieuChuyen as $row)
                          <tr style="border: 1px solid black">
                            <td style="text-align: center;border: 1px solid black">{{ $loop->iteration }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $row['MaSanPham'] }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $row['MaCTSanPham'] }}</td>
                            <td style="border: 1px solid black">{{ $row->getSanPham->TenSanPham }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $list_sp->getChiNhanhA->TenChiNhanh }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $list_sp->getChiNhanhB->TenChiNhanh }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $row->getCTSanPham->SoSerial }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $row->getSanPham->loaiKichCo->TenKichCo }}</td>
                            <td style="text-align: center;border: 1px solid black">{{ $row->getCTSanPham->KichCo }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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
                                         href="{{ route('chiTietDieuChuyenView', ['mdc' => $list_sp->MaPhieuDieuChuyen]) }}">Bấm vào đây để xem thông tin</a>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                        </td>
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
