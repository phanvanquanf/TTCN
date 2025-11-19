@extends('client.layouts.app')

@section('content')
    <main>
        <div class="login-wrapper d-flex align-items-center justify-content-center min-vh-100">
            <div class="login-card shadow-lg rounded-4">
                <div class="text-center mb-4">
                    <!-- Logo tràn kín vòng tròn -->
                    <div class="image-wrapper mx-auto mb-3">
                        <img src="{{ asset('client/assets/img/clinic-login.png') }}" alt="Đăng nhập" class="login-image" />
                    </div>
                    <h3 class="fw-bold text-primary mt-3">Chào mừng bạn trở lại!</h3>
                    <p class="text-muted small">Đăng nhập để tiếp tục sử dụng hệ thống phòng khám</p>
                </div>

                <form action="{{ route('postLogin') }}" method="post" class="row g-3" novalidate>
                    @csrf
                    <!-- Username -->
                    <div class="col-12">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-user"></i>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Nhập tên đăng nhập" value="{{ old('username') }}" required>
                        </div>
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>

                    <!-- Password -->
                    <div class="col-12">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Nhập mật khẩu" required>
                        </div>
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>

                    <!-- Remember -->
                    <div class="col-12">
                        <div class="form-check d-flex align-items-center">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Nhớ mật khẩu</label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-login w-100">Đăng nhập</button>
                    </div>

                    <!-- Redirect to register -->
                    <div class="col-12 text-center register-redirect">
                        <p class="small mb-0">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        /* Full background */
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.85), rgba(42, 82, 152, 0.85)),
                url('{{ asset('client/assets/img/background.jpg') }}') center/cover no-repeat;
            background-attachment: fixed;
        }

        /* Wrapper */
        .login-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        /* Card */
        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            box-sizing: border-box;
        }

        /* Logo tròn */
        .image-wrapper {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .login-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Input label */
        .form-label {
            font-weight: 500;
            color: #2a2a2a;
        }

        /* Input with icon */
        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 16px;
        }

        .input-icon-wrapper input {
            width: 100%;
            padding: 10px 14px 10px 40px;
            /* padding-left đủ cho icon */
            border-radius: 12px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .input-icon-wrapper input:focus {
            border-color: #2a5298;
            box-shadow: 0 0 6px rgba(42, 82, 152, 0.4);
        }

        /* Button */
        .btn-login {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 12px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            transform: scale(1.03);
        }

        /* Register link */
        .register-redirect a {
            color: #2a5298;
            font-weight: 600;
            text-decoration: none;
        }

        .register-redirect a:hover {
            text-decoration: underline;
        }
    </style>
@endsection
