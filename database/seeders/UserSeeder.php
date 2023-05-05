<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i < 10;$i++){
            $TaiKhoan =  new User();
            $TaiKhoan->name = "Phúc";
            $TaiKhoan->email = "phuc@gmail.com";
            $TaiKhoan->password = Hash::make("26102001");
            $TaiKhoan->LoaiTaiKhoan = "A";
            $TaiKhoan->HoTen = "Hồ Thanh Phúc";
            $TaiKhoan->GioiTinh = "Nam";
            $TaiKhoan->DiaChi = "Vĩnh Lộc ";
            $TaiKhoan->SDT = "0702267843";
            $TaiKhoan->QuanHuyen = "Bình Chánh";
            $TaiKhoan->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan->ChiNhanh = "ToanQuyen";
            $TaiKhoan->NgaySinh = "2001/10/26";
            $TaiKhoan->TrangThai = "1";
            $TaiKhoan->NguoiTao = "";
            $TaiKhoan->MaGiaoDien = "GD01";
            $TaiKhoan->AnhDaiDien = "";
            $TaiKhoan->AnhBia = "";
            $TaiKhoan->save();
        // }

            $TaiKhoan1 =  new User();
            $TaiKhoan1->name = "Khiêm";
            $TaiKhoan1->email = "khiem@gmail.com";
            $TaiKhoan1->password = Hash::make("23102000");
            $TaiKhoan1->LoaiTaiKhoan = "A";
            $TaiKhoan1->HoTen = "Gia Khiêm";
            $TaiKhoan1->GioiTinh = "Nam";
            $TaiKhoan1->DiaChi = "Quận 6";
            $TaiKhoan1->SDT = "0327772310";
            $TaiKhoan1->QuanHuyen = "Quận 6";
            $TaiKhoan1->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan1->ChiNhanh = "HCM";
            $TaiKhoan1->NgaySinh = "2001/10/23";
            $TaiKhoan1->TrangThai = "1";
            $TaiKhoan1->NguoiTao = "";
            $TaiKhoan1->MaGiaoDien = "GD01";
            $TaiKhoan1->AnhDaiDien = "";
            $TaiKhoan1->AnhBia = "";
            $TaiKhoan1->save();

            $TaiKhoan2 =  new User();
            $TaiKhoan2->name = "Khách";
            $TaiKhoan2->email = "clienttest@gmail.com";
            $TaiKhoan2->password = Hash::make("123456");
            $TaiKhoan2->LoaiTaiKhoan = "C";
            $TaiKhoan2->HoTen = "Khách test";
            $TaiKhoan2->GioiTinh = "Nam";
            $TaiKhoan2->DiaChi = "Quận 16";
            $TaiKhoan2->SDT = "0327772310";
            $TaiKhoan2->QuanHuyen = "Quận 16";
            $TaiKhoan2->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan2->ChiNhanh = "HCM";
            $TaiKhoan2->NgaySinh = "2016/10/16";
            $TaiKhoan2->TrangThai = "1";
            $TaiKhoan2->NguoiTao = "";
            $TaiKhoan2->MaGiaoDien = "GD04";
            $TaiKhoan2->AnhDaiDien = "";
            $TaiKhoan2->AnhBia = "";
            $TaiKhoan2->save();

            $TaiKhoan3 =  new User();
            $TaiKhoan3->name = "";
            $TaiKhoan3->email = "nguyenvantoan@gmail.com";
            $TaiKhoan3->password = Hash::make("123456");
            $TaiKhoan3->LoaiTaiKhoan = "E";
            $TaiKhoan3->HoTen = "Nguyễn Văn Toàn";
            $TaiKhoan3->GioiTinh = "Nam";
            $TaiKhoan3->DiaChi = "342 Đường Hậu Giang";
            $TaiKhoan3->SDT = "032777231";
            $TaiKhoan3->QuanHuyen = "Quận 6";
            $TaiKhoan3->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan3->ChiNhanh = "CN01";
            $TaiKhoan3->NgaySinh = "2001/10/16";
            $TaiKhoan3->TrangThai = "1";
            $TaiKhoan3->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan3->MaGiaoDien = "GD03";
            $TaiKhoan3->AnhDaiDien = "";
            $TaiKhoan3->AnhBia = "";
            $TaiKhoan3->save();


            $TaiKhoan4 =  new User();
            $TaiKhoan4->name = "";
            $TaiKhoan4->email = "nguyenhuuhieu@gmail.com";
            $TaiKhoan4->password = Hash::make("123456");
            $TaiKhoan4->LoaiTaiKhoan = "E";
            $TaiKhoan4->HoTen = "Nguyễn Hữu Hiếu";
            $TaiKhoan4->GioiTinh = "Nam";
            $TaiKhoan4->DiaChi = "33 Đường Luỹ Bán Bích";
            $TaiKhoan4->SDT = "0925347231";
            $TaiKhoan4->QuanHuyen = "Quận Tân Phú";
            $TaiKhoan4->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan4->ChiNhanh = "CN02";
            $TaiKhoan4->NgaySinh = "1998/02/16";
            $TaiKhoan4->TrangThai = "1";
            $TaiKhoan4->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan4->MaGiaoDien = "GD03";
            $TaiKhoan4->AnhDaiDien = "";
            $TaiKhoan4->AnhBia = "";
            $TaiKhoan4->save();

            $TaiKhoan5 =  new User();
            $TaiKhoan5->name = "";
            $TaiKhoan5->email = "dangdiemtrinh@gmail.com";
            $TaiKhoan5->password = Hash::make("123456");
            $TaiKhoan5->LoaiTaiKhoan = "M";
            $TaiKhoan5->HoTen = "Đặng Diễm Trinh";
            $TaiKhoan5->GioiTinh = "Nữ";
            $TaiKhoan5->DiaChi = "336 Đường 3 Tháng 2";
            $TaiKhoan5->SDT = "0925907221";
            $TaiKhoan5->QuanHuyen = "Quận 10";
            $TaiKhoan5->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan5->ChiNhanh = "CN02";
            $TaiKhoan5->NgaySinh = "1978/05/11";
            $TaiKhoan5->TrangThai = "1";
            $TaiKhoan5->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan5->MaGiaoDien = "GD02";
            $TaiKhoan5->AnhDaiDien = "";
            $TaiKhoan5->AnhBia = "";
            $TaiKhoan5->save();

            $TaiKhoan6 =  new User();
            $TaiKhoan6->name = "";
            $TaiKhoan6->email = "dangdiemthuy@gmail.com";
            $TaiKhoan6->password = Hash::make("123456");
            $TaiKhoan6->LoaiTaiKhoan = "E";
            $TaiKhoan6->HoTen = "Đặng Diễm Thuý";
            $TaiKhoan6->GioiTinh = "Nữ";
            $TaiKhoan6->DiaChi = "336 Đường Lý Thái Tổ";
            $TaiKhoan6->SDT = "0925904522";
            $TaiKhoan6->QuanHuyen = "Quận 3";
            $TaiKhoan6->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan6->ChiNhanh = "CN03";
            $TaiKhoan6->NgaySinh = "1999/01/24";
            $TaiKhoan6->TrangThai = "1";
            $TaiKhoan6->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan6->MaGiaoDien = "GD03";
            $TaiKhoan6->AnhDaiDien = "";
            $TaiKhoan6->AnhBia = "";
            $TaiKhoan6->save();

            $TaiKhoan7 =  new User();
            $TaiKhoan7->name = "";
            $TaiKhoan7->email = "nguyenthibich@gmail.com";
            $TaiKhoan7->password = Hash::make("123456");
            $TaiKhoan7->LoaiTaiKhoan = "M";
            $TaiKhoan7->HoTen = "Nguyễn Thị Bích";
            $TaiKhoan7->GioiTinh = "Nữ";
            $TaiKhoan7->DiaChi = "54 Đường Lý Thái Tổ";
            $TaiKhoan7->SDT = "0915954242";
            $TaiKhoan7->QuanHuyen = "Quận 3";
            $TaiKhoan7->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan7->ChiNhanh = "CN03";
            $TaiKhoan7->NgaySinh = "1996/11/14";
            $TaiKhoan7->TrangThai = "1";
            $TaiKhoan7->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan7->MaGiaoDien = "GD02";
            $TaiKhoan7->AnhDaiDien = "";
            $TaiKhoan7->AnhBia = "";
            $TaiKhoan7->save();

            $TaiKhoan8 =  new User();
            $TaiKhoan8->name = "";
            $TaiKhoan8->email = "truongphuocdanh@gmail.com";
            $TaiKhoan8->password = Hash::make("123456");
            $TaiKhoan8->LoaiTaiKhoan = "M";
            $TaiKhoan8->HoTen = "Trương Phước Danh";
            $TaiKhoan8->GioiTinh = "Nam";
            $TaiKhoan8->DiaChi = "54 Đường Tỉnh Lộ 10";
            $TaiKhoan8->SDT = "0915936243";
            $TaiKhoan8->QuanHuyen = "Quận Bình Tân";
            $TaiKhoan8->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan8->ChiNhanh = "CN04";
            $TaiKhoan8->NgaySinh = "1996/02/10";
            $TaiKhoan8->TrangThai = "1";
            $TaiKhoan8->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan8->MaGiaoDien = "GD02";
            $TaiKhoan8->AnhDaiDien = "";
            $TaiKhoan8->AnhBia = "";
            $TaiKhoan8->save();

            $TaiKhoan9 =  new User();
            $TaiKhoan9->name = "";
            $TaiKhoan9->email = "nguyencongdanh@gmail.com";
            $TaiKhoan9->password = Hash::make("123456");
            $TaiKhoan9->LoaiTaiKhoan = "E";
            $TaiKhoan9->HoTen = "Nguyễn Công Danh";
            $TaiKhoan9->GioiTinh = "Nam";
            $TaiKhoan9->DiaChi = "54 Đường Trương Phước Phan";
            $TaiKhoan9->SDT = "0915954242";
            $TaiKhoan9->QuanHuyen = "Quận Bình Tân";
            $TaiKhoan9->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan9->ChiNhanh = "CN04";
            $TaiKhoan9->NgaySinh = "1986/01/19";
            $TaiKhoan9->TrangThai = "1";
            $TaiKhoan9->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan9->MaGiaoDien = "GD03";
            $TaiKhoan9->AnhDaiDien = "";
            $TaiKhoan9->AnhBia = "";
            $TaiKhoan9->save();

            $TaiKhoan10 =  new User();
            $TaiKhoan10->name = "";
            $TaiKhoan10->email = "nguyentuanduy@gmail.com";
            $TaiKhoan10->password = Hash::make("123456");
            $TaiKhoan10->LoaiTaiKhoan = "E";
            $TaiKhoan10->HoTen = "Nguyễn Tuấn Duy";
            $TaiKhoan10->GioiTinh = "Nam";
            $TaiKhoan10->DiaChi = "54 Đường Phan Văn Hớn";
            $TaiKhoan10->SDT = "0915953562";
            $TaiKhoan10->QuanHuyen = "Quận 12";
            $TaiKhoan10->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan10->ChiNhanh = "CN04";
            $TaiKhoan10->NgaySinh = "1999/11/29";
            $TaiKhoan10->TrangThai = "1";
            $TaiKhoan10->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan10->MaGiaoDien = "GD03";
            $TaiKhoan10->AnhDaiDien = "";
            $TaiKhoan10->AnhBia = "";
            $TaiKhoan10->save();

            $TaiKhoan11 =  new User();
            $TaiKhoan11->name = "";
            $TaiKhoan11->email = "dangdiemtrinh@gmail.com";
            $TaiKhoan11->password = Hash::make("123456");
            $TaiKhoan11->LoaiTaiKhoan = "C";
            $TaiKhoan11->HoTen = "Đặng Diễm Trinh";
            $TaiKhoan11->GioiTinh = "Nữ";
            $TaiKhoan11->DiaChi = "34 Mạc Đỉnh Chi";
            $TaiKhoan11->SDT = "0323572310";
            $TaiKhoan11->QuanHuyen = "Quận 6";
            $TaiKhoan11->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan11->ChiNhanh = "";
            $TaiKhoan11->NgaySinh = "2003/04/16";
            $TaiKhoan11->TrangThai = "1";
            $TaiKhoan11->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan11->MaGiaoDien = "GD04";
            $TaiKhoan11->AnhDaiDien = "";
            $TaiKhoan11->AnhBia = "";
            $TaiKhoan11->save();

            $TaiKhoan12 =  new User();
            $TaiKhoan12->name = "";
            $TaiKhoan12->email = "nguyenhuaminhkhoi@gmail.com";
            $TaiKhoan12->password = Hash::make("123456");
            $TaiKhoan12->LoaiTaiKhoan = "C";
            $TaiKhoan12->HoTen = "Nguyễn Hứa Minh Khôi";
            $TaiKhoan12->GioiTinh = "Nam";
            $TaiKhoan12->DiaChi = "4 Mạc Đỉnh Chi";
            $TaiKhoan12->SDT = "0323572963";
            $TaiKhoan12->QuanHuyen = "Quận 6";
            $TaiKhoan12->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan12->ChiNhanh = "";
            $TaiKhoan12->NgaySinh = "2001/05/16";
            $TaiKhoan12->TrangThai = "1";
            $TaiKhoan12->NguoiTao = "hothanhphuc2468@gmail.com";
            $TaiKhoan12->MaGiaoDien = "GD04";
            $TaiKhoan12->AnhDaiDien = "";
            $TaiKhoan12->AnhBia = "";
            $TaiKhoan12->save();

            $TaiKhoan13 =  new User();
            $TaiKhoan13->name = "";
            $TaiKhoan13->email = "phambaolong@gmail.com";
            $TaiKhoan13->password = Hash::make("123456");
            $TaiKhoan13->LoaiTaiKhoan = "C";
            $TaiKhoan13->HoTen = "Phạm Bảo Long";
            $TaiKhoan13->GioiTinh = "Nam";
            $TaiKhoan13->DiaChi = "4 Tỉnh Lộ 10";
            $TaiKhoan13->SDT = "0323572963";
            $TaiKhoan13->QuanHuyen = "Quận Bình Tân";
            $TaiKhoan13->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan13->ChiNhanh = "";
            $TaiKhoan13->NgaySinh = "2001/01/11";
            $TaiKhoan13->TrangThai = "1";
            $TaiKhoan13->NguoiTao = "hothanhphuc2468";
            $TaiKhoan13->MaGiaoDien = "GD04";
            $TaiKhoan13->AnhDaiDien = "";
            $TaiKhoan13->AnhBia = "";
            $TaiKhoan13->save();

            $TaiKhoan14 =  new User();
            $TaiKhoan14->name = "";
            $TaiKhoan14->email = "phambaovu@gmail.com";
            $TaiKhoan14->password = Hash::make("123456");
            $TaiKhoan14->LoaiTaiKhoan = "C";
            $TaiKhoan14->HoTen = "Phạm Bảo Vũ";
            $TaiKhoan14->GioiTinh = "Nam";
            $TaiKhoan14->DiaChi = "47 Tỉnh Lộ 10";
            $TaiKhoan14->SDT = "0323572103";
            $TaiKhoan14->QuanHuyen = "Quận Bình Tân";
            $TaiKhoan14->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan14->ChiNhanh = "";
            $TaiKhoan14->NgaySinh = "2003/01/11";
            $TaiKhoan14->TrangThai = "1";
            $TaiKhoan14->NguoiTao = "hothanhphuc2468";
            $TaiKhoan14->MaGiaoDien = "GD04";
            $TaiKhoan14->AnhDaiDien = "";
            $TaiKhoan14->AnhBia = "";
            $TaiKhoan14->save();

            $TaiKhoan15 =  new User();
            $TaiKhoan15->name = "";
            $TaiKhoan15->email = "hoangbaovu@gmail.com";
            $TaiKhoan15->password = Hash::make("123456");
            $TaiKhoan15->LoaiTaiKhoan = "C";
            $TaiKhoan15->HoTen = "Hoàng Bảo Vũ";
            $TaiKhoan15->GioiTinh = "Nam";
            $TaiKhoan15->DiaChi = "47 Âu Cơ";
            $TaiKhoan15->SDT = "0323572103";
            $TaiKhoan15->QuanHuyen = "Quận Tân Phú";
            $TaiKhoan15->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan15->ChiNhanh = "";
            $TaiKhoan15->NgaySinh = "2004/01/11";
            $TaiKhoan15->TrangThai = "1";
            $TaiKhoan15->NguoiTao = "hothanhphuc2468";
            $TaiKhoan15->MaGiaoDien = "GD04";
            $TaiKhoan15->AnhDaiDien = "";
            $TaiKhoan15->AnhBia = "";
            $TaiKhoan15->save();

            $TaiKhoan16 =  new User();
            $TaiKhoan16->name = "";
            $TaiKhoan16->email = "lethicamtu@gmail.com";
            $TaiKhoan16->password = Hash::make("123456");
            $TaiKhoan16->LoaiTaiKhoan = "C";
            $TaiKhoan16->HoTen = "Lê Thị Cẩm Tú";
            $TaiKhoan16->GioiTinh = "Nữ";
            $TaiKhoan16->DiaChi = "40 Âu Cơ";
            $TaiKhoan16->SDT = "0323535103";
            $TaiKhoan16->QuanHuyen = "Quận Tân Phú";
            $TaiKhoan16->TinhThanh = "Hồ Chí Minh";
            $TaiKhoan16->ChiNhanh = "";
            $TaiKhoan16->NgaySinh = "2001/01/21";
            $TaiKhoan16->TrangThai = "1";
            $TaiKhoan16->NguoiTao = "hothanhphuc2468";
            $TaiKhoan16->MaGiaoDien = "GD04";
            $TaiKhoan16->AnhDaiDien = "";
            $TaiKhoan16->AnhBia = "";
            $TaiKhoan16->save();



    }
}
