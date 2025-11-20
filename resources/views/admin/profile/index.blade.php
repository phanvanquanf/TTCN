@extends('admin.layouts.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Hồ sơ cá nhân</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item active">Hồ sơ cá nhân</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row g-4"> <!-- thêm gutter giữa cột -->

                <!-- LEFT: Avatar + Tổng quan -->
                <div class="col-xl-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center text-center">
                            <!-- Avatar + tên + dịch vụ -->
                            <img src="{{ asset('admin/assets/img/staff/doctor/' . $staff->image) }}" alt="Profile"
                                class="rounded-circle mb-3"
                                style="width:150px;height:150px;object-fit:cover; border:3px solid #0d6efd;">
                            <h2 class="mt-2">{{ $staff->fullName }}</h2>
                            <h5 class="text-muted">{{ $staff->services->serviceName }}</h5>
                        </div>
                    </div>

                    <!-- Tổng quan thông tin -->
                    <div class="card shadow-sm border-0 mt-3">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2 mb-3">Tổng quan</h5>

                            <div class="row mb-2">
                                <div class="col-5 fw-semibold text-secondary">Giới tính:</div>
                                <div class="col-7">{{ $staff->gender == 0 ? 'Nam' : 'Nữ' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 fw-semibold text-secondary">Ngày sinh:</div>
                                <div class="col-7">{{ $staff->birthDate }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 fw-semibold text-secondary">Số điện thoại:</div>
                                <div class="col-7">{{ $staff->phone }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 fw-semibold text-secondary">Email:</div>
                                <div class="col-7">{{ $staff->account ? $staff->account->email : 'Không có' }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5 fw-semibold text-secondary">Dịch vụ:</div>
                                <div class="col-7">{{ $staff->services->serviceName }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Tab chỉnh sửa hồ sơ + đổi mật khẩu -->
                <div class="col-xl-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <ul class="nav nav-tabs nav-tabs-bordered mb-3">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                        Chỉnh sửa hồ sơ
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                        Đổi mật khẩu
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">

                                <!-- EDIT PROFILE -->
                                <div class="tab-pane fade show active" id="profile-edit">
                                    <form action="{{ route('profile.update', $staff->staffId) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Họ và tên</label>
                                            <input name="fullName" type="text" class="form-control"
                                                value="{{ old('fullName', $staff->fullName) }}">
                                            @error('fullName')<span class="text-danger small">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Số điện thoại</label>
                                            <input name="phone" type="text" class="form-control"
                                                value="{{ old('phone', $staff->phone) }}">
                                            @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ngày sinh</label>
                                            <input name="birthDate" type="date" class="form-control"
                                                value="{{ old('birthDate', $staff->birthDate) }}">
                                            @error('birthDate')<span
                                            class="text-danger small">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ảnh đại diện</label>
                                            <input name="image" type="file" class="form-control">
                                            @error('image')<span class="text-danger small">{{ $message }}</span>@enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </form>
                                </div>

                                <!-- CHANGE PASSWORD -->
                                <div class="tab-pane fade" id="profile-change-password">
                                    <form action="{{ route('profile.password', auth()->user()->staff?->staffId) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <input name="new_password" type="password" class="form-control">
                                            @error('new_password')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-warning">Đổi mật khẩu</button>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <style>
        /* Thêm shadow nhẹ, border-radius, spacing đẹp hơn */
        .profile-card {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .card {
            border-radius: 12px;
            background-color: #ffffff;
        }

        .card-body {
            padding: 1.5rem;
        }

        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        .nav-tabs .nav-link {
            border-radius: 8px 8px 0 0;
            color: #0d6efd;
        }

        .btn-primary {
            border-radius: 6px;
            padding: 0.5rem 1.2rem;
        }

        .btn-warning {
            border-radius: 6px;
            padding: 0.5rem 1.2rem;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .text-secondary {
            color: #6c757d !important;
        }
    </style>
@endsection