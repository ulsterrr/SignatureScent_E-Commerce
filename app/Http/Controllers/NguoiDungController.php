<?php

namespace App\Http\Controllers;

use App\Jobs\DonHangJob;
use App\Jobs\DonHangJobClient;
use App\Jobs\DonHangMomo;
use App\Models\ChiNhanh;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietSanPham;
use App\Models\DonHang;
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
            $sp = SanPham::paginate(8)->withQueryString();
            if($minPrice>=0 && $maxPrice > $minPrice){
                $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->paginate(8)->withQueryString();
            }
        }
        else {
            $sp = SanPham::where('LoaiSanPham',$maloai)->paginate(8)->withQueryString();
            if($minPrice>=0 && $maxPrice > $minPrice){
                $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->where('LoaiSanPham',$maloai)->paginate(8)->withQueryString();
            }
        }
        $loaisp = LoaiSanPham::all();
        return view('nguoi-dung.cua-hang')->with(['SP'=> $sp, 'LSP'=> $loaisp, 'minPrice' => $minPrice, 'maxPrice' => $maxPrice, 'sanPham' => [] ]);
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
        $tt = TinTuc::paginate(3);
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
            $gioHang = GioHang::where([['NguoiTao',$emails], ['TrangThai',0]])->get();
            $tongTien = $gioHang->sum('TongTien');
            $khuyenMai = KhuyenMai::where([['MaKhuyenMai',auth()->user()->KMSD]])->first();
            $km = 0;
            $khuyenMai ? $km = $khuyenMai->GiaTri : $km = 0;
            $tongGioHang = 0;
            $tongTien >= 2000000 ? $tongGioHang = $tongTien : $tongGioHang = $tongTien + 15000;
            $tongGioHang -= $km;
            if($tongGioHang < 0) $tongGioHang = 0;
            $cn = ChiNhanh::all();
            return view('nguoi-dung.gio-hang')->with(['gioHang' => $gioHang, 'tongTien' => $tongTien, 'tongGioHang' => $tongGioHang, 'giamGia' => $km, 'ChiNhanh' => $cn]);
        }
        else {
            return redirect()->route('dang-nhap');
        }
    }

    public function checkMaKhuyenMai(Request $request){
        $km = KhuyenMai::where('MaKhuyenMai',$request->mkm)->first();
        if($km && $km->SoLuong > 0){
            $user = User::find(auth()->user()->id);
            $user->KMSD = $km->MaKhuyenMai;
            $user->save();
            return response()->json(['valid' => false, 'giaTri' => $km->GiaTri]);
        }
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
            DB::table('gio_hangs')->where('NguoiTao', $emails)->update(['TrangThai' => 2]);
        }
        return redirect()->route('giohang-view');
    }

    public function xoaMotSPGioHangView($msp) {
        $emails = auth()->user()->email;
        DB::table('gio_hangs')->where('NguoiTao', $emails)->where('MaSanPham', $msp)->update(['TrangThai' => 2]);
        return redirect()->route('giohang-view');
    }

    public function layDuLieuGioHang() {
        if(Auth::check()) {
            $gioHang = GioHang::where(['NguoiTao' => Auth::user()->email, 'TrangThai' => 0])->get();
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
            'NguoiTao' => Auth::user()->email,
            'TrangThai' => 0
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

    public function datHang(Request $request){
        $mdh = $this->taoDonHang($request);
        if($mdh){
            // Gửi mail cho admin và email người mua
            $donHang = DonHang::layDonHangTheoMa($mdh);
            $tongTien = $donHang->chiTietDonHang->sum('TongTien');
            $sendMail = (new DonHangJobClient($donHang, $donHang->chiTietDonHang, '', 'Đơn hàng', $tongTien));
            $this->dispatch($sendMail);
        }
        $email =  User::where([['LoaiTaiKhoan','A'],['TrangThai','1']])->get();
        foreach($email as $Email)
        {
            $this->dayThongBaoChoUser('Đơn hàng mới','Một khách hàng vừa đặt một đơn hàng của SignatureScent','Đơn hàng COD', 'admin/quan-ly-khach-hang',$Email->email);
        }
        return view('nguoi-dung.xem-donhang-client')->with(['donHang' => $donHang]);

    }

    public function taoDonHang(Request $request){
        // Lấy thông tin 2 mảng từ request
        $dataTableDataSP = GioHang::where([['NguoiTao', auth()->user()->email], ['TrangThai',0]])->get();

        // Tạo đơn hàng
        $donHang = new DonHang();
        $donHang->MaDonHang = $this->taoMaKhoaChinh('MDH');
        $donHang->TongTien = $request->TongTien;
        $donHang->HoTen = $request->HoTen;
        $donHang->SDT = $request->SDT;
        $donHang->Email = $request->Email;
        $donHang->DiaChi = $request->DiaChi;
        $donHang->QuanHuyen = $request->QuanHuyen;
        $donHang->TinhThanh = $request->TinhThanh;
        $donHang->GhiChu = $request->GhiChu;
        $donHang->VanChuyen = $request->total_momo > 2000000 ? 0 : 1;
        $donHang->MaKhuyenMai = $request->MaKhuyenMai;
        $donHang->LoaiThanhToan = $request->payment_method;
        $donHang->NguoiTao = auth()->user()->email;
        $donHang->ChiNhanh = $request->ChiNhanh;
        $donHang->TrangThai = $request->payment_method == 'momo' ? 'MOMO' : 'NEW';

        $tongTien = 0;
        // Tạo các chi tiết đơn hàng
        foreach ($dataTableDataSP as $item) {
            $chiTietDonHang = new ChiTietDonHang();
            $chiTietDonHang->MaCTDonHang = $this->taoMaKhoaChinh('CTDH');
            $chiTietDonHang->MaDonHang = $donHang->MaDonHang;
            $chiTietDonHang->MaSanPham = $item->MaSanPham;
            $chiTietDonHang->Soluong = $item->SoLuong;
            $chiTietDonHang->GiaTien = $item->GiaTien;
            $chiTietDonHang->TongTien = $item->TongTien;
            $tongTien += $item->TongTien;
            // Lưu lại chi tiết đơn hàng
            $chiTietDonHang->save();
        }

        $donHang->TongTien = $tongTien;
        // Lưu đơn hàng
        $donHang->save();
        DB::table('gio_hangs')->where('NguoiTao', auth()->user()->email)->where('TrangThai', 0)->update(['TrangThai' => 1]);
        $us = User::find(auth()->user()->id);
        $us->KMSD = null;
        $us->save();
        return $donHang->MaDonHang;
    }

    public function locGia(Request $req)
    {
        $sp = SanPham::whereBetween('GiaTien', [$req->min_price, $req->max_price])->get();
        $loaisp = LoaiSanPham::all();
        return view('nguoi-dung.cua-hang')->with(['SP'=> $sp, 'LSP'=> $loaisp ]);
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        echo($result);
        $jsonResult = json_decode($result, true);
        if ($jsonResult['payUrl'] != null)
            header('Location: ' . $jsonResult['payUrl']);
        return $result;
    }


    public function momoPayment(Request $request)
    {
        $mdh = $this->taoDonHang($request);
        $cartData = request()->session()->get("cartData");
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $maMomoAPI = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = 'Thanh toán đơn hàng ScentSignature';
        $amount = $request->total_momo;
        $orderId = $mdh;
        $redirectUrl = "http://127.0.0.1:8000/return_momo";
        $ipnUrl = "http://127.0.0.1:8000/return_momo";
        $extraData = "";
        $requestId = $mdh;
        $requestType = "captureWallet";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $maMomoAPI);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        return redirect()->to($jsonResult['payUrl']);
    }

    public function returnMoMo(Request $req)
    {
        // dd($req->all());
        $donHang = DonHang::layDonHangTheoMa($req->orderId);
        $donHang->TrangThai = 'MOMO_PAY';
        $donHang->save();

        // Gửi mail
        $tongTien = $donHang->chiTietDonHang->sum('TongTien');
        $sendMail = (new DonHangMomo($donHang, $donHang->chiTietDonHang, '', 'Đơn hàng', $tongTien));
        $this->dispatch($sendMail);
        $email =  User::where([['LoaiTaiKhoan','A'],['TrangThai','1']])->get();
        foreach($email as $Email)
        {
            $this->dayThongBaoChoUser('Đơn hàng mới','Một khách hàng vừa đặt một đơn hàng của SignatureScent','Đơn hàng MoMo', 'admin/quan-ly-khach-hang',$Email->email);
        }

        // return view('nguoi-dung.ds-donhang-client');
        return redirect()->route('xemdonhang-view', $req->orderId);
    }

    public function datHangView(){
        return view('nguoi-dung.dat-donhang-client');
    }

    public function dsDonHangView(){
        if(Auth::check()) {
            $donHang = DonHang::where(['NguoiTao' => Auth::user()->email])->paginate(8)->withQueryString();
             return view('nguoi-dung.ds-donhang-client')->with([
                'donHang' => $donHang
            ]);

        }
    }

    public function xemDonHangView($id){

        if(Auth::check()) {
            $DH = DonHang::layDonHangTheoMa($id);
            return view('nguoi-dung.xem-donhang-client')->with(['donHang' => $DH]);
        }
    }
}
