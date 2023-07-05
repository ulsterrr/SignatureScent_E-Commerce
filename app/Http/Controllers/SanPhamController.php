<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiKichCo;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\NhapHangMoi;
use App\Models\TinTuc;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SanPhamController extends Controller
{
    //Xử lý hàm sp dành cho admin
    public function loadSPView()
    {
        $sanpham = SanPham::all();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.kho-hang.san-pham.ds-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }

    public function themSPham(Request $req)
    {
        $sanpham = new SanPham();
        // $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->MaSanPham = $this->taoMaKhoaChinh('SP');
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req->MoTa;
        $sanpham->HinhAnh = $req->HinhAnh;
        $sanpham->LoaiKichCo = $req->LoaiKichCo;
        $sanpham->LoaiSanPham = $req->LoaiSanPham;
        $sanpham->GhiChu = $req->GhiChu;
        $sanpham->NguoiTao = $req->NguoiTao;
        session()->flash('message', 'Thêm sản phẩm thành công!');
    }

    public function chiTietSPhamView($id)
    {
        $sanpham = SanPham::with('loaiSanPham', 'loaiKichCo')->where('MaSanPham', $id)->first();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        response()->json($sanpham);
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }

    public function capNhatSPhamView($id)
    {
        $sanpham = SanPham::with('loaiSanPham', 'loaiKichCo')->where('MaSanPham', $id)->first();
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        response()->json($sanpham);
        return view('he-thong.kho-hang.san-pham.capnhat-sanpham')->with([
            'SanPham' => $sanpham,
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }
    public function capNhatSPham(Request $req, $id)
    {
        $sanpham = SanPham::findOrFail($id);
        $sanpham->MaSanPham = $req->MaSanPham;
        $sanpham->TenSanPham = $req->TenSanPham;
        $sanpham->ThuongHieu = $req->ThuongHieu;
        $sanpham->TrangThai = $req->TrangThai;
        $sanpham->GiaTien = $req->GiaTien;
        $sanpham->MoTa = $req->MoTa;
        $sanpham->HinhAnh = $req->HinhAnh;
        $sanpham->LoaiKichCo = $req->LoaiKichCo;
        $sanpham->LoaiSanPham = $req->LoaiSanPham;
        $sanpham->GhiChu = $req->GhiChu;
        $sanpham->NguoiTao = $req->NguoiTao;
        session()->flash('message', 'Cập nhật sản phẩm thành công!');
    }
    public function xoaSPham($id)
    {
        $sanpham = SanPham::find($id);
        $sanpham->delete();
        return redirect()->route("quanlySPView");
    }
    public function xoaCTSPham($id)
    {
        $ctsp = ChiTietSanPham::find($id);
        $ctsp->delete();
    }

    //Xử lý hàm sản phẩm cho client
    public function loadSDYeuThich()
    {

    }
    public function loadChiTietSP()
    {

    }
    public function loadSPTheoLoai()
    {

    }

    public function layDsSanPhamAjax()
    {
        $sp = SanPham::getTatCaSanPham();
        return DataTables::of($sp)->make(true);
    }
    public function layDsCTSanPhamAjax($masanpham)
    {
        // $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham);
        if (Auth::user()->LoaiTaiKhoan == 'A') {
            $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham)
                ->get();
            return DataTables::of($ctsp)->make(true);
        }
        $ctsp = ChiTietSanPham::layChiTiettheoSanPham($masanpham)
            ->where('MaChiNhanh', Auth::user()->ChiNhanh)
            ->get();
        return DataTables::of($ctsp)->make(true);
    }

    // cập nhật chi tiết sản phẩm
    public function capNhatCTSPham(Request $req, $id)
    {
        $ctsp = ChiTietSanPham::findOrFail($id);
        $ctsp->SoSerial = $req->SoSerial;
        $ctsp->KichCo = $req->KichCo;
        $ctsp->GhiChu = $req->GhiChu;
        //Lấy time hiện tại
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $ctsp->updated_at = $dt;
        $ctsp->save();
        session()->flash('message', 'Cập nhật chi tiết sản phẩm thành công!');
        return view('he-thong.kho-hang.san-pham.thongtin-sanpham');
    }

    public function loadSPClient()
    {
        $sp = SanPham::paginate(8);
        $spnam = SanPham::where('LoaiSanPham','LSP01')->paginate(8);
        $spnu = SanPham::where('LoaiSanPham','LSP02')->paginate(8);
        $spnichnam = SanPham::where('LoaiSanPham','LSP05')->paginate(8);
        $spnichnu = SanPham::where('LoaiSanPham','LSP06')->paginate(8);
        $spgiatot = SanPham::whereBetween('GiaTien', [500000, 2000000])->get();
        $tintuc = TinTuc::all();
        $spbc = SanPham::whereBetween('GiaTien',[100000, 3000000])->get();
        return view('layouts.homepage.home')->with([
            'SPall' => $sp,
            'SPNam' => $spnam,
            'SPNu' => $spnu,
            'SPNNam' => $spnichnam,
            'SPNNu' => $spnichnu,
            'SPbc' => $spbc,
            'SPGiaTot' => $spgiatot,
            'TinTuc' => $tintuc  ]);
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $sanPham = SanPham::where('TenSanPham','LIKE','%' .$data['query']. '%')->get();
            $output = "<ul class='dropdown-menu' style='display:block; position: relative;' > ";
            $html = view('layouts.webpage.tim-kiem-dropdown')->with([
                'sanPham' => $sanPham
            ])->render();
            return response()->json(['html' => $html]);
        }
    }

    public function dsChiTietSanPham() {
        $loaisp = LoaiSanPham::all();
        $loaikc = LoaiKichCo::all();
        return view('he-thong.kho-hang.san-pham.ds-ctsanpham')->with([
            'LoaiSP' => $loaisp,
            'LoaiKC' => $loaikc
        ]);
    }

    public function dsChiTietSanPhamAjax() {
        $query = ChiTietSanPham::layChiTietVaSanPham()->get();
        return DataTables::of($query)->make(true);

    }

    public function layDsCTSanPhamFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);

        $MaSanPham = $filters['MaSanPham'] ?? null;
        $TenSanPham = $filters['TenSanPham'] ?? null;
        $ThuongHieu = $filters['ThuongHieu'] ?? null;
        $MaDonHang = $filters['MaDonHang'] ?? null;
        $MaPhieuNhap = $filters['MaPhieuNhap'] ?? null;
        $MaCTSanPham = $filters['MaCTSanPham'] ?? null;
        $LoaiKichCo = $filters['LoaiKichCo'] ?? null;
        $LoaiSanPham = $filters['LoaiSanPham'] ?? null;
        $TinhTrang = $filters['TinhTrang'] ?? null;
        $KichCo = $filters['KichCo'] ?? null;
        $SoSerial = $filters['SoSerial'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = ChiTietSanPham::layChiTietVaSanPham();

        if (!empty($MaCTSanPham)) {
            $query->where(function ($query) use ($MaCTSanPham) {
                $query->where('MaCTSanPham', 'LIKE', '%' . $MaCTSanPham . '%');
            });
        }
        if (!empty($MaSanPham)) {
            $query->where(function ($query) use ($MaSanPham) {
                $query->where('MaSanPham', 'LIKE', '%' . $MaSanPham . '%');
            });
        }
        if (!empty($TenSanPham)) {
            $query->whereHas('chiTietCuaSanPham', function ($query) use ($TenSanPham) {
                $query->where('TenSanPham', 'LIKE', '%' . $TenSanPham . '%');
            });
        }
        if (!empty($ThuongHieu)) {
            $query->whereHas('chiTietCuaSanPham', function ($query) use ($ThuongHieu) {
                $query->where('ThuongHieu', 'LIKE', '%' . $ThuongHieu . '%');
            });
        }
        if (!empty($LoaiKichCo)) {
            $query->whereHas('chiTietCuaSanPham', function ($query) use ($LoaiKichCo) {
                $query->where('LoaiKichCo', 'LIKE', '%' . $LoaiKichCo . '%');
            });
        }
        if (!empty($LoaiSanPham)) {
            $query->whereHas('chiTietCuaSanPham', function ($query) use ($LoaiSanPham) {
                $query->where('LoaiSanPham', 'LIKE', '%' . $LoaiSanPham . '%');
            });
        }

        if (!empty($MaDonHang)) {
            $query->where(function ($query) use ($MaDonHang) {
                $query->where('MaDonHang', 'LIKE', '%' . $MaDonHang . '%');
            });
        }
        if (!empty($MaPhieuNhap)) {
            $query->where(function ($query) use ($MaPhieuNhap) {
                $query->where('MaPhieuNhap', 'LIKE', '%' . $MaPhieuNhap . '%');
            });
        }
        if (!empty($KichCo)) {
            $query->where(function ($query) use ($KichCo) {
                $query->where('KichCo', 'LIKE', '%' . $KichCo . '%');
            });
        }
        if (!empty($SoSerial)) {
            $query->where(function ($query) use ($SoSerial) {
                $query->where('SoSerial', 'LIKE', '%' . $SoSerial . '%');
            });
        }
        if (!empty($TinhTrang)) {
            $query->where(function ($query) use ($TinhTrang) {
                $query->where('TinhTrang', '=', $TinhTrang);
            });
        }
        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();

            $query->where('created_at', '>=', $created_at_from)
                ->where('created_at', '<=', $created_at_to);

        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $query->where('created_at', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();
            $query->where('created_at', '<=', $created_at_to);
        }

        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }
    public function layDsSanPhamFilter(Request $request)
    {
        $formData = $request->input('filter');
        parse_str($formData, $filters);

        $MaSanPham = $filters['MaSanPham'] ?? null;
        $TenSanPham = $filters['TenSanPham'] ?? null;
        $ThuongHieu = $filters['ThuongHieu'] ?? null;
        $LoaiKichCo = $filters['LoaiKichCo'] ?? null;
        $LoaiSanPham = $filters['LoaiSanPham'] ?? null;
        $GiaTien = $filters['GiaTien'] ?? null;
        $created_at_from = $filters['created_at_from'] ?? null;
        $created_at_to = $filters['created_at_to'] ?? null;
        $query = SanPham::with('loaiSanPham', 'loaiKichCo')->orderBy('MaSanPham','desc');

        if (!empty($ThuongHieu)) {
            $query->where(function ($query) use ($ThuongHieu) {
                $query->where('ThuongHieu', 'LIKE', '%' . $ThuongHieu . '%');
            });
        }
        if (!empty($MaSanPham)) {
            $query->where(function ($query) use ($MaSanPham) {
                $query->where('MaSanPham', 'LIKE', '%' . $MaSanPham . '%');
            });
        }
        if (!empty($TenSanPham)) {
            $query->where(function ($query) use ($TenSanPham) {
                $query->where('TenSanPham', 'LIKE', '%' . $TenSanPham . '%');
            });
        }
        if (!empty($LoaiKichCo)) {
            $query->where(function ($query) use ($LoaiKichCo) {
                $query->where('LoaiKichCo', 'LIKE', '%' . $LoaiKichCo . '%');
            });
        }
        if (!empty($LoaiSanPham)) {
            $query->where(function ($query) use ($LoaiSanPham) {
                $query->where('LoaiSanPham', 'LIKE', '%' . $LoaiSanPham . '%');
            });
        }

        if (!empty($GiaTien)) {
            $query->where(function ($query) use ($GiaTien) {
                $query->where('GiaTien', '=', $GiaTien );
            });
        }
        if (!empty($created_at_from) && !empty($created_at_to)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();

            $query->where('created_at', '>=', $created_at_from)
                ->where('created_at', '<=', $created_at_to);

        } elseif (!empty($created_at_from)) {
            $created_at_from = Carbon::createFromFormat('d/m/Y', $created_at_from)->startOfDay();
            $query->where('created_at', '>=', $created_at_from);
        } elseif (!empty($created_at_to)) {
            $created_at_to = Carbon::createFromFormat('d/m/Y', $created_at_to)->endOfDay();
            $query->where('created_at', '<=', $created_at_to);
        }

        // Thực hiện tìm kiếm
        $results = $query->get();

        // Trả về kết quả tìm kiếm dưới dạng JSON
        return response()->json([
            'data' => $results,
        ]);
    }


}
