<?php

namespace Database\Seeders;

use App\Models\ChiNhanh;
use App\Models\ChiTietSanPham;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChiTietSanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $serialString = $this->generateSerials(50, 6);
        // echo $serialString;
        $cn = ChiNhanh::all();
        $sp = SanPham::all();
        foreach ($cn as $chinhanh){
            foreach ($sp as $sanpham){
                $dsSerial = explode(",", $this->generateSerials(10, 6));
                for ($i=0; $i < 10; $i++) {
                    $chitietsp = new ChiTietSanPham();
                    $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
                    if(!isset($dsSerial[$i])) $dsSerial[$i] = '';
                    $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                    $chitietsp->MaSanPham = $sanpham->MaSanPham;
                    $chitietsp->KichCo = "100";
                    $chitietsp->MaChiNhanh = $chinhanh->MaChiNhanh;
                    $chitietsp->TinhTrang = 1;
                    $chitietsp->GhiChu = "Sản phẩm khởi tạo";
                    $chitietsp->NguoiTao = 'admin';
                    $chitietsp->save();
                }
            }
        }
        // Sản phẩm tồn kho không có chi nhánh
        foreach ($sp as $sanpham){
            $dsSerial = explode(",", $this->generateSerials(5, 6));
            for ($i=0; $i < 5; $i++) {
                $chitietsp = new ChiTietSanPham();
                $chitietsp->MaCTSanPham = $this->taoMaKhoaChinh('CTSP');
                if(!isset($dsSerial[$i])) $dsSerial[$i] = '';
                $chitietsp->SoSerial = $dsSerial[$i] ? $dsSerial[$i] : null;
                $chitietsp->MaSanPham = $sanpham->MaSanPham;
                $chitietsp->KichCo = "150";
                $chitietsp->MaChiNhanh = null;
                $chitietsp->TinhTrang = 0;
                $chitietsp->GhiChu = "Sản phẩm khởi tạo tồn kho";
                $chitietsp->NguoiTao = 'admin';
                $chitietsp->save();
            }
        }
    }

    public function generateSerials($count, $length) {
        $serials = [];

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $digits = '0123456789';

        for ($i = 0; $i < $count; $i++) {
            $serial = 'S';

            for ($j = 0; $j < $length; $j++) {
                $randomChar = $characters[rand(0, strlen($characters) - 1)];
                $serial .= $randomChar;
            }

            $serial .= rand(100, 999);

            $randomChar = $characters[rand(0, strlen($characters) - 1)];
            $serial .= $randomChar;

            $serials[] = $serial;
        }

        return implode(',', $serials);
    }
    public function taoMaKhoaChinh($prefix){
        DB::select('CALL sp_KhoiTaoKyHieu(?, @p_code)', [$prefix]);
        $code = DB::select('SELECT @p_code AS code')[0]->code;
        return $code;
    }
}
