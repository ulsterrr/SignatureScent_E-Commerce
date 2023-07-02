<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SanPham;

class SanPhamImport implements ToModel
{
    public function model(array $row)
    {
        return new SanPham([
            'MaSanPham' => $row[0],
            'TenSanPham' => $row[1],
            'GiaTien' => $row[2],
            // Thêm các trường dữ liệu khác tương ứng với cấu trúc file Excel
        ]);
    }
}
