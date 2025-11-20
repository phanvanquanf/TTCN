@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <!-- Page Title -->
        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Chỉnh sửa nhân viên</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item active">Chỉnh sửa</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-primary mb-4">Thông tin nhân viên</h4>
                            <form action="{{ route('staff.update', $staff->staffId) }}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">

                                @csrf
                                @method('PUT')

                                <div class="col-md-12 text-center mb-5">
                                    <img id="imagePreview"
                                        src="{{asset('admin/assets/img/staff/doctor' . '/' . $staff->image) }}"
                                        class="rounded-3 border mt-2 {{ $staff->image ? '' : 'd-none' }}"
                                        style="width:200px; height:200px; object-fit:cover;" accept="image/*"
                                        onchange="previewImage(event)">
                                </div>

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Họ tên <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="fullName"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3 @error('fullName') is-invalid @enderror"
                                            value="{{ old('fullName', $staff->fullName) }}" required>

                                        @error('fullName')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Số điện thoại <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="phone"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3 @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', $staff->phone) }}" required>

                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Giới tính</label>
                                        <select name="gender"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="" disabled>-- Chọn giới tính --</option>
                                            <option value="0" {{ $staff->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="1" {{ $staff->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ngày sinh <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="birthDate"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3 @error('birthDate') is-invalid @enderror"
                                            value="{{ old('birthDate', $staff->birthDate) }}" required>

                                        @error('birthDate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tài khoản liên kết</label>
                                        <select name="accountId"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="">-- Chọn tài khoản --</option>

                                            @foreach ($accounts as $acc)
                                                <option value="{{ $acc->accountId }}" {{ old('accountId', $staff->accountId) == $acc->accountId ? 'selected' : '' }}>
                                                    {{ $acc->username }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="text-danger">@error('accountId') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Dịch vụ</label>
                                        <select name="serviceId"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="">-- Chọn dịch vụ --</option>
                                            @foreach ($services as $sv)
                                                <option value="{{ $sv->serviceId }}" {{ old('serviceId', $staff->serviceId) == $sv->serviceId ? 'selected' : '' }}>
                                                    {{ $sv->serviceName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ảnh đại diện</label>
                                        <input type="file" name="image"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            accept="image/*" onchange="previewImage(event)">
                                        <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Trạng thái</label>
                                        <select name="status"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Hoạt động
                                            </option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Ngừng hoạt động
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-5 gap-3">

                                    <a href="{{ route('staff.index') }}"
                                        class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                                    </a>

                                    <button type="submit" class="btn btn-gradient px-4 py-2 rounded-3">
                                        <i class="fas fa-save me-2"></i> Cập nhật nhân viên
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
<script>
    function previewImage(event) {
        const img = document.getElementById('imagePreview');
        const file = event.target.files[0];
        if (file) {
            img.src = URL.createObjectURL(file);
            img.classList.remove('d-none');
        }
    }
</script>
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