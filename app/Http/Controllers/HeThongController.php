<?php

namespace App\Http\Controllers;

use App\Models\LoaiTaiKhoan;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class HeThongController extends Controller
{
    public function xulyDangNhap(Request $req)
    {

        //$credentials = $req->only('email', 'password');
        $credentials = ['email' => $req->email, 'password' => $req->password];

        // lấy dữ liệu db theo tên tài khoản
        $taikhoan = User::where('email', strval($req->email))->first();

        //check nếu đăng nhập rồi thì quay lại route
        if (Auth::check()) {
            return redirect()->route('homepage')->with(compact('taikhoan'));
        }

        if (Auth::attempt($credentials)) {
            // Chứng thực thành công
            Session::put('user',$credentials['email']);
            if ($taikhoan->LoaiTaiKhoan == 'A') {
                $req->session()->regenerate();
                return redirect()->route('dashboard')->with(compact('taikhoan'));
            } else
                if ($taikhoan->LoaiTaiKhoan == 'C') {
                    $req->session()->regenerate();
                    return redirect()->route('homepage')->with(compact('taikhoan'));
                }
        } else if (empty($taikhoan->email)) {
            $errorMessage = 'Không tìm thấy tài khoản, vui lòng đăng nhập lại!';
            return redirect()->route('dang-nhap')->with('message', $errorMessage);
        } else if ($taikhoan->password != Hash::make($req->password)) {
            $errorMessage = 'Sai mật khẩu, vui lòng đăng nhập lại!';
            return redirect()->route('dang-nhap')->with('message', $errorMessage);
        } else {
            $errorMessage = 'Lỗi đăng nhập, vui lòng thử lại!';
            //return redirect()->route('homepage')->with('message', $errorMessage);
            return redirect()->route('dang-nhap')->with('message', $errorMessage);
        }
    }

    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }


    public function phanQuyenView(){
        $phanQuyen = PhanQuyen::all();
        return view('dashboard.phan-quyen')->with('phanQuyens',$phanQuyen);
    }

    public function loaiTaiKhoanAjax(){
        $ltk = LoaiTaiKhoan::all();
        return DataTables::of($ltk)->make(true);
    }

    public function layPhanQuyen(Request $request)
    {
        $maLoaiTaiKhoan = $request->input('maLoaiTaiKhoan');

        // Lấy danh sách phân quyền tương ứng với maLoaiTaiKhoan từ cơ sở dữ liệu
        $phanQuyens = PhanQuyen::where('LoaiTaiKhoan', $maLoaiTaiKhoan)->get();

        return response()->json(['phanQuyens' => $phanQuyens]);
    }

    public function updateTrangThai(Request $request)
{
    $phanQuyen = $request->input('id');
    $trangThai = $request->input('trangThai');

    // Tìm và cập nhật trạng thái của PhanQuyen
    $phanQuyen = PhanQuyen::find($phanQuyen);
    if ($phanQuyen) {
        $phanQuyen->TrangThai = $trangThai;
        $phanQuyen->save();
    }

    // Trả về kết quả thành công hoặc thất bại
    return response()->json(['success' => true]);
}
}
