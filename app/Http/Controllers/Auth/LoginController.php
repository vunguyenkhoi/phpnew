<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    //Sau khi login sẽ chuyển về trang dashboard(/)
    protected $redirectTo = '/';
    public function index()
    {
        return view('auth.login.index');
    }

    public function logout(Request $request)
    {
        // Đăng xuất người dùng hiện tại
        Auth::logout();

        // Xóa session để đảm bảo tất cả dữ liệu người dùng đã đăng nhập bị xóa
        $request->session()->invalidate();

        // Tạo lại session mới để tránh tấn công Session Fixation
        $request->session()->regenerateToken();

        // Chuyển hướng người dùng về trang đăng nhập hoặc trang chủ
        return redirect()->route('auth.login.index')->with('success', 'Bạn đã đăng xuất thành công!');
    }
    
    public function username()
    {
        return 'username';
    }
    protected function credentials(Request $request)
    {
        $cred = $request->only($this->username(), 'password');
        return $cred;
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string', // tên tài khoản bắt buộc nhập
            'password' => 'required|string',      // mật khẩu bắt buộc nhập
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }
}