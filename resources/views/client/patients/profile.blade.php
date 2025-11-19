@extends('client.layouts.app')

@section('content')
    <main>
        <div class="register-wrapper d-flex align-items-center justify-content-center min-vh-100">
            <div class="register-card shadow-lg rounded-4">
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <img id="imagePreview"
                            src="{{ $patient->image ? asset('client/assets/img/patients/' . $patient->image) : asset('client/assets/img/clinic-login.png') }}"
                            alt="Avatar" class="rounded-circle border" style="width:150px; height:150px; object-fit:cover;">
                    </div>
                    <h3 class="fw-bold text-primary mt-3">Cập nhật thông tin tài khoản</h3>
                    <p class="text-muted small">Thay đổi thông tin cá nhân hoặc mật khẩu của bạn</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="fa fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('patient.update', $patient->patientId) }}" method="post"
                    enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Ảnh đại diện -->
                    <div class="col-12 text-center">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*"
                            onchange="previewImage(event)">
                        @error('image')
                            <span class="text-danger d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-user"></i>
                            <input type="text" name="username" id="username" class="form-control"
                                value="{{ old('username', $patient->account->username) }}" disabled>
                        </div>
                        <small class="text-muted">Tên đăng nhập không thể thay đổi</small>
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-envelope"></i>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', $patient->account->email) }}" required>
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="fullName" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-user"></i>
                            <input type="text" name="fullName" id="fullName" class="form-control"
                                value="{{ old('fullName', $patient->fullName) }}" required>
                        </div>
                        @error('fullName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="phone" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-phone"></i>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ old('phone', $patient->phone) }}" maxlength="10" required>
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="idCard" class="form-label">Số CCCD <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-id-card"></i>
                            <input type="text" name="idCard" id="idCard" class="form-control"
                                value="{{ old('idCard', $patient->idCard) }}" maxlength="12" required>
                        </div>
                        @error('idCard')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="birthDate" class="form-label">Ngày sinh <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-calendar"></i>
                            <input type="date" name="birthDate" id="birthDate" class="form-control"
                                value="{{ old('birthDate', $patient->birthDate) }}" required>
                        </div>
                        @error('birthDate')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">Giới tính <span class="text-danger">*</span></label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-venus-mars"></i>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="0" {{ old('gender', $patient->gender) == 0 ? 'selected' : '' }}>Nam</option>
                                <option value="1" {{ old('gender', $patient->gender) == 1 ? 'selected' : '' }}>Nữ</option>
                            </select>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-map-marker"></i>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ old('address', $patient->address) }}">
                        </div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password mới (tùy chọn) -->
                    <div class="col-12">
                        <label for="password" class="form-label">Mật khẩu mới</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Nhập mật khẩu mới (nếu muốn thay đổi)">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                        <div class="input-icon-wrapper">
                            <i class="fa fa-lock"></i>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-register w-100">Cập nhật thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('imagePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

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
            max-width: 500px;
            border-radius: 25px;
            backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .register-card:hover {
            transform: translateY(-5px);
        }

        .image-wrapper {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
            border: 3px solid #2a5298;
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

        .input-icon-wrapper input,
        .input-icon-wrapper select {
            width: 100%;
            padding: 10px 14px 10px 40px;
            border-radius: 12px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .input-icon-wrapper select {
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
            box-shadow: 0 0 8px rgba(42, 82, 152, 0.3);
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

        small.text-muted {
            font-size: 12px;
        }

        @media(max-width: 480px) {
            .register-card {
                width: 90%;
                padding: 20px;
            }

            .image-wrapper {
                width: 120px;
                height: 120px;
            }
        }
    </style>
@endsection








