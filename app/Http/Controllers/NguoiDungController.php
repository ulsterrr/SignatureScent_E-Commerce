<?php

namespace App\Http\Controllers;

use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\User;
use App\Models\GioHang;
use App\Models\KhuyenMai;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{
    public function thongTinSanPhamView($id) {
        $sanpham = SanPham::where('MaSanPham',$id)->first();
        $LoaiSanPham = $sanpham->LoaiSanPham;
        $sanphamtuongtu = SanPham::where('LoaiSanPham',$LoaiSanPham)->get();

        $ctsp = ChiTietSanPham::select('MaChiNhanh',DB::raw('count("MaCTSanPham") as TonKho'))->where(['MaSanPham' => $sanpham->MaSanPham],['TinhTrang' => 1])->groupBy('MaChiNhanh')->get();
        // dd($ctsp);
        return view('nguoi-dung.xem-sanpham')->with([
            'SanPham' => $sanpham,
            'SanPhamTT' => $sanphamtuongtu,
            'CTSP' => $ctsp
        ]);
    }
    // public function thongTinSanPham($id){

    //     return view('nguoi-dung.xem-sanpham')->with('SanPham',$sanpham);
    // }
    public function cuaHangView(Request $req) {
        $minPrice = $req->query('min_price');
        $maxPrice = $req->query('max_price');
        $maloai = $req->input('maloai');
        if($maloai==null) {
            $sp = SanPham::all();
            if($minPrice>=0 && $maxPrice > $minPrice){
                $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->get();
            }
        }
        else {
            $sp = SanPham::where('LoaiSanPham',$maloai)->get();
            if($minPrice>=0 && $maxPrice > $minPrice){
                $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->where('LoaiSanPham',$maloai)->get();
            }
        }
        $loaisp = LoaiSanPham::all();
        return view('nguoi-dung.cua-hang')->with(['SP'=> $sp, 'LSP'=> $loaisp, 'minPrice' => $minPrice, 'maxPrice' => $maxPrice ]);
    }

    public function loadThongTinClient($id){
        $user = User::find($id);
        return view('layouts.tai-khoan.thong-tin-tai-khoan',compact('user'));
    }

    public function thongTinClient(Request $req,$id)
    {
        $user = User::find($id);
        $user->HoTen = $req->HoTen;
        $user->SDT = $req->SDT;
        $user->email = $req->email;
        $user->DiaChi = $req->DiaChi;
        $user->TinhThanh = $req->TinhThanh;
        $user->QuanHuyen = $req->QuanHuyen;
        $user->NgaySinh = $req->NgaySinh;
        $user->GioiTinh = $req->GioiTinh;
        session()->flash('message','cập nhật thành công!');
        $user->save();
        return redirect()->route('thongtin-client-view',['id'=>$user->id]);
    }

    public function loadMKClient($id){
        $user = User::find($id);
        return view('layouts.tai-khoan.doi-matkhau-client',compact('user'));
    }
    public function doiMKCLient(Request $req,$id){

            $user = User::find($id);
            $user->password = Hash::make($req->MatKhauMoi);
            session()->flash('message','cập nhật thành công!');
            $user->save();
            return redirect()->route('doimk-client-view',['id'=>$user->id]);
    }
    public function gioiThieuView() {
        return view('nguoi-dung.gioi-thieu');
    }

    public function lienHeView() {
        return view('nguoi-dung.lien-he');
    }

    public function tinTucView() {
        $tt = TinTuc::all();
        return view('nguoi-dung.tin-tuc',compact('tt'));
    }

    public function xemTinTucView($id) {
        $tintuc = TinTuc::find($id);
        $tt = TinTuc::all();
        return view('nguoi-dung.xem-tintuc')->with(['tintuc' => $tintuc,
                                                    'tt' => $tt]);
    }

    public function gioHangView() {
        if(Auth::check()) {
            $emails = auth()->user()->email;
            $gioHang = GioHang::where([['NguoiTao',$emails]])->get();
            $tongTien = $gioHang->sum('TongTien');
            $tongGioHang = 0;
            $tongTien >= 2000000 ? $tongGioHang = 2000000 : $tongGioHang += 15000;
            $tongTien == 15000 ? $tongGioHang = 0 : $tongGioHang = 0;
            return view('nguoi-dung.gio-hang')->with(['gioHang' => $gioHang, 'tongTien' => $tongTien, 'tongGioHang' => $tongGioHang]);
        }
        else {
            return redirect()->route('dang-nhap');
        }
    }

    public function checkMaKhuyenMai(Request $request){
        $km = KhuyenMai::where('MaKhuyenMai',$request->mkm)->first();
        if($km && $km->SoLuong > 0)
        return response()->json(['valid' => false]);
        else return response()->json(['valid' => true]);
    }

    public function capNhatGioHangView(Request $req) {
        $data = $req->all();
        if($req->type_submit == 'UPD') {
            // Lọc các giá trị mã sản phẩm và số lượng từ mảng dữ liệu
            $sanPhamSoLuong = array_filter($data, function ($key) {
                return substr($key, 0, 2) === 'SP'; // Lọc các khóa bắt đầu bằng 'SP'
            }, ARRAY_FILTER_USE_KEY);

            $sanPhamSoLuong = array_map(function ($soLuong, $maSanPham) {
                return ['MaSanPham' => $maSanPham, 'SoLuong' => $soLuong];
            }, $sanPhamSoLuong, array_keys($sanPhamSoLuong));

            foreach ($sanPhamSoLuong as $item) {

                $maSanPham = $item['MaSanPham'];
                $soLuong = $item['SoLuong'];
                $giaTien = DB::table('gio_hangs')->where([['NguoiTao', '=', auth()->user()->email], ['MaSanPham', '=', $maSanPham]])->first()->GiaTien;
                DB::table('gio_hangs')
                ->where('gio_hangs.NguoiTao', '=', auth()->user()->email)
                ->where('gio_hangs.MaSanPham', '=', $maSanPham)
                ->update(['gio_hangs.SoLuong' => $soLuong, 'gio_hangs.TongTien' => $soLuong * $giaTien]);
            }
        }
        else {
            $emails = auth()->user()->email;
            DB::table('gio_hangs')->where('NguoiTao', $emails)->delete();
        }
        return redirect()->route('giohang-view');
    }

    public function xoaMotSPGioHangView($msp) {
        $emails = auth()->user()->email;
        DB::table('gio_hangs')->where('NguoiTao', $emails)->where('MaSanPham', $msp)->delete();
        return redirect()->route('giohang-view');
    }

    public function layDuLieuGioHang() {
        if(Auth::check()) {
            $gioHang = GioHang::where('NguoiTao',Auth::user()->email)->get();
            $html = view('layouts.webpage.gio-hang-reload')->with([
                'gioHang' => $gioHang
            ])->render();
            return response()->json(['html' => $html]);
        }
    }
    public function themVaoGioHang(Request $request) {
        if(!Auth::check()) {
            return response()->json(['success' => false]);
        }
        $maSP = $request->MaSanPham;
        $SL = $request->SoLuong;
        $gioHangHienTai = GioHang::where([
            'MaSanPham' => $maSP,
            'NguoiTao' => Auth::user()->email
        ])->first();

        if($gioHangHienTai && $gioHangHienTai->count() > 0) {
            $gioHangHienTai->SoLuong += $SL;
            $gioHangHienTai->TongTien = $gioHangHienTai->SoLuong*$gioHangHienTai->GiaTien; //
            $gioHangHienTai->save();
        } else {
        $sp = SanPham::where('MaSanPham', $maSP)->first();
        // Thêm sản phẩm vào giỏ hàng
        $gioHang = new GioHang();
        $gioHang->MaSanPham = $maSP;
        $gioHang->TenSanPham = $sp->TenSanPham;
        $gioHang->KichCo = $sp->KichCo;
        $gioHang->ThuongHieu = $sp->ThuongHieu;
        $gioHang->GiaTien = $sp->GiaTien;
        $gioHang->TongTien = $sp->GiaTien * $SL;
        $gioHang->HinhAnh = $sp->HinhAnh;
        $gioHang->LoaiKichCo = $sp->LoaiKichCo;
        $gioHang->GhiChu = $sp->GhiChu;
        $gioHang->NguoiTao = Auth::user()->email;
        $gioHang->TrangThai = 0;
        $gioHang->SoLuong = $SL;
        $gioHang->save();
        }
        // Trả về kết quả cho Ajax
        return response()->json(['success' => true]);
    }

    public function locGia(Request $req)
    {
        dd($req);
        $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->get();
        $loaisp = LoaiSanPham::all();
        return view('nguoi-dung.cua-hang')->with(['SP'=> $sp, 'LSP'=> $loaisp ]);
    }
}
