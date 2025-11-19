@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <!-- Page Title -->
        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Thêm tài khoản mới</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Thêm mới</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-primary mb-4">Thông tin tài khoản</h4>

                            <form action="{{ route('accounts.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="row g-4">
                                    <!-- Username -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tên đăng nhập <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="username"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            placeholder="Nhập tên đăng nhập" required>
                                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                                    </div>


                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            placeholder="Nhập email">
                                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>

                                    </div>


                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Mật khẩu <span
                                                class="text-danger">*</span></label>
                                        <input type="password" name="password"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            placeholder="Nhập mật khẩu">
                                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>

                                    </div>


                                    <!-- Vai trò -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Vai trò</label>
                                        <select name="role" class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="0">Quản trị viên</option>
                                            <option value="1">Nhân viên</option>
                                            <option value="2">Bệnh nhân</option>
                                        </select>
                                    </div>


                                    <!-- Trạng thái -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Trạng thái</label>
                                        <select name="status"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-5 gap-3">
                                    <a href="{{ route('accounts.index') }}"
                                        class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                                    </a>
                                    <button type="submit" class="btn btn-gradient px-4 py-2 rounded-3">
                                        <i class="fas fa-save me-2"></i> Lưu tài khoản
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
<style>
    .btn-gradient {
        background: linear-gradient(45deg, #4e73df, #36d1dc);
        border: none;
        color: white !important;
        font-weight: 600;
        border-radius: 10px;
        padding: 12px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(54, 209, 220, 0.3);
        height: 50px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #36d1dc, #4e73df);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(54, 209, 220, 0.4);
    }
</style>