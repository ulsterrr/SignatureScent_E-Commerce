<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Jobs\NotifiJob;
use App\Jobs\QuenMKJob;
use App\Jobs\ResetPasswordJob;
use Illuminate\Support\Str;

class KhachHangController extends Controller
{
    public function loadDSKhachHangView(){
        $khachhang = User::where([['LoaiTaiKhoan','C'],['TrangThai','1']])->get();
        return view('he-thong.danh-muc.khach-hang.ds-khachhang')->with('KhachHang',$khachhang);
    }

    public function themKhachHangView(){
        return view('he-thong.danh-muc.khach-hang.them-khachhang');
    }

    public function dangKyView(){
        return view('layouts.tai-khoan.dang-ky');
    }


    public function quenMatKhauView(){
        return view('layouts.tai-khoan.quen-mat-khau');
    }
    public function quenMatKhau(Request $request){
        $quenMK = User::where('email',$request->Email)->first();
        if (empty($quenMK->email)) {
            $errorMessage = 'Email quý khách không tồn tại, vui lòng đăng nhập lại!';
            return redirect()->route('quenMatKhauView')->with('message', $errorMessage);
        }
        $newPass = Str::random(8, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');;

        $quenMK->password = Hash::make($newPass);
        $quenMK->save();
        $job = (new ResetPasswordJob($quenMK->email,'Xin chào quý khách của Scent Signature chúng tôi đã nhận được yêu cầu quên mật khẩu của quý khác.
                                                    Mật khẩu mới được cung cấp là: ' . $newPass .
                                                    ' Quý khách vui lòng đổi lại mật khẩu nhằm để bảo mật tốt hơn. Không cung cấp mật khẩu
                                                    cho bất kỳ ai. Chúng tôi xin cảm ơn quý khách','Cung cấp lại mật khẩu'));
        $this->dispatch($job);
        return redirect()->route('quenMatKhauView')->with('message', 'Khôi phục mật khẩu thành công');
    }
    public function themKhachHang(Request $request){
        $newuser =  new User();
        $newuser->name = $request->HoTen;
        $newuser->email = $request->email;
        $newuser->email_verification_token = $request->_token;
        $newuser->password = Hash::make($request->password);
        $newuser->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $newuser->HoTen = $request->HoTen;
        $newuser->GioiTinh = $request->GioiTinh;
        $newuser->DiaChi = $request->DiaChi;
        $newuser->SDT = $request->SDT;
        $newuser->QuanHuyen = $request->QuanHuyen;
        $newuser->TinhThanh = $request->TinhThanh;
        $newuser->MaGiaoDien = "1";
        $newuser->ChiNhanh = "";

        //convert chuỗi ngày sang kiểu dữ liệu ngày lưu vào db
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();

        $newuser->NgaySinh = $date_time;
        $newuser->TrangThai = $request->TrangThai;
        $newuser->NguoiTao = "";
        $newuser->save();
        session()->flash('message','Thêm tài khoản thành công!');
        $job = (new NotifiJob($newuser->id, $newuser->email, 'Chúc mừng bạn đã đăng ký thành công và là thành viên của SignatureScrent. Chúng
        tôi rất hân hạnh được phục vụ quý khách, rất mong quý khách đồng hành cùng SignatureScent.
        Quý khách vui lòng nhấn vào nút xác nhận để xác nhận email này. Xin cảm ơn quý khách', 'Bạn đã đăng ký thành công'));
        $this->dispatch($job);
        return redirect()->route('quanlyKH-view');
    }
    public function themKhachHangClient(Request $request){
        $newuser =  new User();
        $newuser->name = $request->HoTen;
        $newuser->email = $request->email;
        $newuser->email_verification_token = $request->_token;
        $newuser->password = Hash::make($request->password);
        $newuser->LoaiTaiKhoan = "C";
        $newuser->HoTen = $request->HoTen;
        $newuser->GioiTinh = $request->GioiTinh;
        $newuser->DiaChi = $request->DiaChi;
        $newuser->SDT = $request->SDT;
        $newuser->QuanHuyen = $request->QuanHuyen;
        $newuser->TinhThanh = $request->TinhThanh;
        $newuser->MaGiaoDien = "1";
        $newuser->ChiNhanh = "";

        //convert chuỗi ngày sang kiểu dữ liệu ngày lưu vào db
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();

        $newuser->NgaySinh = $date_time;
        $newuser->TrangThai = "1";
        $newuser->NguoiTao = "";
        $newuser->save();
        session()->flash('message','Thêm tài khoản thành công!');
        $job = (new NotifiJob($newuser->id, $newuser->email, 'Chúc mừng bạn đã đăng ký thành công và là thành viên của ScentSignature. Chúng
        tôi rất hân hạnh được phục vụ quý khách, rất mong quý khách đồng hành cùng ScentSignature.
        Quý khách vui lòng nhấn vào nút xác nhận để xác nhận email này. Xin cảm ơn quý khách', 'Bạn đã đăng ký thành công'));
        $this->dispatch($job);

        //Lấy email của admin
        $email =  User::where([['LoaiTaiKhoan','A'],['TrangThai','1']])->get();
        foreach($email as $Email)
        {
            $this->dayThongBaoChoUser('Khách hàng mới','Một khách hàng vừa đăng ký tài khoản của SignatureScent','Thông báo người dùng', 'admin/quan-ly-khach-hang',$Email->email);
        }

        return redirect()->route('dang-nhap');
    }
    public function chiTietKhachHangView($id){
        $khachhang = User::find($id);
        return view('he-thong.danh-muc.khach-hang.khachhang-details',compact('khachhang'));
    }
    public function capNhatKhachHangView($id){
        $khachhang = User::find($id);
        return view('he-thong.danh-muc.khach-hang.capnhat-khachhang',compact('khachhang'));
    }
    public function capNhatKhachHang(Request $request, $id){
        $khachhang = User::findOrFail($id);
        $khachhang->email = $request->email;
        // $nhanvien->password = Hash::make($request->password);
        $khachhang->LoaiTaiKhoan = $request->LoaiTaiKhoan;
        $khachhang->HoTen = $request->HoTen;
        $khachhang->GioiTinh = $request->GioiTinh;
        $khachhang->DiaChi = $request->DiaChi;
        $khachhang->SDT = $request->SDT;
        $khachhang->QuanHuyen = $request->QuanHuyen;
        $khachhang->TinhThanh = $request->TinhThanh;
        $khachhang->MaGiaoDien = "1";
        $khachhang->ChiNhanh = "";
        $date_time = Carbon::createFromFormat('d/m/Y', $request->NgaySinh)->toDateTimeString();
        $khachhang->NgaySinh = $date_time;
        $khachhang->TrangThai = $request->TrangThai;
        $khachhang->NguoiTao = "";
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $khachhang->updated_at = $dt;
        $khachhang->save();
        session()->flash('message','Cập nhật khách hàng thành công!');
        return redirect()->route('quanlyKH-view');
    }
    public function layDsKHangModal(Request $request)
    {
        $users = User::select(['id', 'HoTen', 'email', 'SDT', 'AnhDaiDien', 'LoaiTaiKhoan']);

        return datatables()->of($users)->make(true);
    }

    public function layDsKHangAjax()
    {
        $users =  User::where([['LoaiTaiKhoan','C'],['TrangThai','1']])->get();
        return DataTables::of($users)->make(true);
    }

    public function xoaKhachHang($id){
        $user = User::find($id);
        $user->TrangThai = "0";
        $user->save();
        $user->delete();
        return redirect()->route("quanlyKH-view");
    }
}
