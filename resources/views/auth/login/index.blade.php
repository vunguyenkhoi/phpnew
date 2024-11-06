<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập hệ thống</title>
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <div class="form-box login">
            <form id="frmLogin" name="frmLogin" method="POST" action="{{ route('auth.login.login') }}">
                @csrf
                <div class="logo">
                    <img src="{{ asset('/assets/login/assets/logo/Logo-Xanh-R.png') }}" alt="logo" />
                </div>

                <h1>Đăng nhập</h1>
                {{-- @if ($errors->any())
                <div class="error-list">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Tài khoản" />
                    <i class="bx bxs-user"></i>

                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" />
                    <i class="bx bxs-lock-alt"></i>

                </div>
                <div class="input-checkbox">
                    <div class="remember-token">
                        <input type="checkbox" name="remember_token" id="remember_token" value="1">
                        <a href="#">Ghi nhớ đăng nhập</a>
                    </div>
                    <div class="forgot-link">
                        <a href="#">Quên mật khẩu</a>
                    </div>
                </div>
                <button type="submit" class="btn">Đăng nhập</button>
                <p>Đăng nhập với Social</p>
                <div class="social-icons">
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-google"></i></a>
                    <a href="#"><i class="bx bxl-github"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="">
                <h1>Đăng ký</h1>
                <div class="input-box">
                    <input type="text" placeholder="Username" required />
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="Email" required />
                    <i class="bx bxs-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required />
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <button type="button" class="btn">Đăng ký</button>
                <p>Đăng ký với Social</p>
                <div class="social-icons">
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-google"></i></a>
                    <a href="#"><i class="bx bxl-github"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                </div>
            </form>
        </div>
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Xin chào bạn !</h1>
                <p>Nếu chưa có account, hãy đăng ký</p>
                <button class="btn register-btn">Đăng ký</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Chào mừng bạn đã quay lại</h1>
                <p>Bạn đã có account, hãy đăng nhập</p>
                <button class="btn login-btn">Đăng nhập</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/login/script.js') }}"></script>
</body>

</html>