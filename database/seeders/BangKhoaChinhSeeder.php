<?php

namespace Database\Seeders;

use App\Models\BangMaKhoaChinh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BangKhoaChinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $MA = new BangMaKhoaChinh();
        $MA->MaKhoaChinh = 'SP';
        $MA->GiaTriHienTai = 1;
        $MA->TenGiaTri = 'Mã sản phẩm';
        $MA->TrangThai = 1;
        $MA->save();

        $MACT = new BangMaKhoaChinh();
        $MACT->MaKhoaChinh = 'CTSP';
        $MACT->GiaTriHienTai = 1;
        $MACT->TenGiaTri = 'Chi tiết sản phẩm';
        $MACT->TrangThai = 1;
        $MACT->save();

        $MAPN = new BangMaKhoaChinh();
        $MAPN->MaKhoaChinh = 'NHM';
        $MAPN->GiaTriHienTai = 1;
        $MAPN->TenGiaTri = 'Nhập mới sản phẩm';
        $MAPN->TrangThai = 1;
        $MAPN->save();

        $MADC = new BangMaKhoaChinh();
        $MADC->MaKhoaChinh = 'PDC';
        $MADC->GiaTriHienTai = 1;
        $MADC->TenGiaTri = 'Điều chuyển sản phẩm';
        $MADC->TrangThai = 1;
        $MADC->save();

        $MACTDC = new BangMaKhoaChinh();
        $MACTDC->MaKhoaChinh = 'CTDC';
        $MACTDC->GiaTriHienTai = 1;
        $MACTDC->TenGiaTri = 'Chi tiết điều chuyển sản phẩm';
        $MACTDC->TrangThai = 1;
        $MACTDC->save();

        $MAPNK = new BangMaKhoaChinh();
        $MAPNK->MaKhoaChinh = 'PNK';
        $MAPNK->GiaTriHienTai = 1;
        $MAPNK->TenGiaTri = 'Nhập kho sản phẩm';
        $MAPNK->TrangThai = 1;
        $MAPNK->save();

        $MAPXK = new BangMaKhoaChinh();
        $MAPXK->MaKhoaChinh = 'PXK';
        $MAPXK->GiaTriHienTai = 1;
        $MAPXK->TenGiaTri = 'Xuất kho sản phẩm';
        $MAPXK->TrangThai = 1;
        $MAPXK->save();

        $MACTXK = new BangMaKhoaChinh();
        $MACTXK->MaKhoaChinh = 'CTXK';
        $MACTXK->GiaTriHienTai = 1;
        $MACTXK->TenGiaTri = 'Chi tiết Xuất kho sản phẩm';
        $MACTXK->TrangThai = 1;
        $MACTXK->save();

        $MADH = new BangMaKhoaChinh();
        $MADH->MaKhoaChinh = 'MDH';
        $MADH->GiaTriHienTai = 1;
        $MADH->TenGiaTri = 'Mã đơn hàng';
        $MADH->TrangThai = 1;
        $MADH->save();

        $MACTDH = new BangMaKhoaChinh();
        $MACTDH->MaKhoaChinh = 'CTDH';
        $MACTDH->GiaTriHienTai = 1;
        $MACTDH->TenGiaTri = 'Chi tiết đơn hàng';
        $MACTDH->TrangThai = 1;
        $MACTDH->save();
    }
}
