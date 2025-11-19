@extends('client.layouts.app')

@section('content')
    <main>
        <div class="register-wrapper d-flex align-items-center justify-content-center min-vh-100">
            <div class="register-card shadow-lg rounded-4">
                <div class="text-center mb-4">
                    <!-- Logo tròn -->
                    <div class="image-wrapper mx-auto mb-3">
                        <img src="{{ asset('client/assets/img/clinic-login.png') }}" alt="Đăng ký" class="register-image" />
                    </div>
                    <h3 class="fw-bold text-primary mt-3">Tạo tài khoản mới</h3>
                    <p class="text-muted small">Nhập thông tin để đăng ký trở thành khách hàng</p>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa fa-check-circle me-2"></i>
                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('postRegister') }}" method="post" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-user"></i>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Nhập tên đăng nhập" value="{{ old('username') }}">
                        </div>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="fullName" class="form-label">Họ và tên</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-user"></i>
                            <input type="text" name="fullName" id="fullName" class="form-control"
                                placeholder="Nhập họ và tên" value="{{ old('fullName') }}">
                        </div>
                        @error('fullName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">Giới tính</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-venus-mars"></i>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0" {{ old('gender', '0') == '0' ? 'selected' : '' }}>Nam</option>
                                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="birthDate" class="form-label">Ngày sinh</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-calendar"></i>
                            <input type="date" name="birthDate" id="birthDate" class="form-control"
                                value="{{ old('birthDate', '1990-01-01') }}">
                        </div>
                        @error('birthDate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-map-marker-alt"></i>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ"
                                value="{{ old('address') }}">
                        </div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại"
                                value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="idCard" class="form-label">CCCD / CMND</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-id-card"></i>
                            <input type="text" name="idCard" id="idCard" class="form-control" placeholder="Nhập CCCD/CMND"
                                value="{{ old('idCard') }}">
                        </div>
                        @error('idCard')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="col-12">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Nhập mật khẩu">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-register w-100">Tạo tài khoản</button>
                    </div>

                    <!-- Redirect to login -->
                    <div class="col-12 text-center register-redirect">
                        <p class="small mb-0">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.85), rgba(42, 82, 152, 0.85)),
                url('{{ asset('client/assets/img/background.jpg') }}') center/cover no-repeat;
            background-attachment: fixed;
        }

        .register-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .register-card {
            width: 100%;
            max-width: 420px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            box-sizing: border-box;
        }

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

        .register-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-label {
            font-weight: 500;
            color: #2a2a2a;
        }

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
            border-radius: 12px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .input-icon-wrapper select {
            width: 100%;
            padding: 10px 40px 10px 40px;
            border-radius: 12px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            background-color: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            background-size: 12px;
        }

        .input-icon-wrapper input:focus,
        .input-icon-wrapper select:focus {
            border-color: #2a5298;
            box-shadow: 0 0 6px rgba(42, 82, 152, 0.4);
            outline: none;
        }

        .btn-register {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 12px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: linear-gradient(to right, #2a5298, #1e3c72);
            transform: scale(1.03);
        }

        .register-redirect a {
            color: #2a5298;
            font-weight: 600;
            text-decoration: none;
        }

        .register-redirect a:hover {
            text-decoration: underline;
        }

        @media(max-width: 480px) {
            .register-card {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
@endsection
