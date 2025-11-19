@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Cập nhật bệnh nhân</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">Bệnh nhân</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-primary mb-4">Thông tin bệnh nhân</h4>

                            <div class="col-md-12 text-center mb-5">
                                <img id="imagePreview"
                                    src="{{ $patients->image ? asset('client/assets/img/patients/' . $patients->image) : '#' }}"
                                    class="rounded-3 border mt-2 {{ $patients->image ? '' : 'd-none' }}"
                                    style="width:200px; height:200px; object-fit:cover;">
                            </div>

                            <form action="{{ route('patients.update', $patients->patientId) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row g-4">

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Họ và tên</label>
                                        <input type="text" name="fullName"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('fullName', $patients->fullName) }}">
                                        <span class="text-danger">@error('fullName') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Giới tính</label>
                                        <select name="gender"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="0" {{ old('gender', $patients->gender) == 0 ? 'selected' : '' }}>
                                                Nam</option>
                                            <option value="1" {{ old('gender', $patients->gender) == 1 ? 'selected' : '' }}>Nữ
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ngày sinh</label>
                                        <input type="date" name="birthDate"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('birthDate', $patients->birthDate) }}">
                                        <span class="text-danger">@error('birthDate') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Địa chỉ</label>
                                        <input type="text" name="address"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('address', $patients->address) }}">
                                        <span class="text-danger">@error('address') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Số điện thoại</label>
                                        <input type="text" name="phone"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('phone', $patients->phone) }}">
                                        <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">CCCD</label>
                                        <input type="text" name="idCard"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('idCard', $patients->idCard) }}">
                                        <span class="text-danger">@error('idCard') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ngày khám</label>
                                        <input type="date" name="checkinDate"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            value="{{ old('checkinDate', $patients->checkinDate) }}">
                                        <span class="text-danger">@error('checkinDate') {{ $message }} @enderror</span>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Trạng thái</label>
                                        <select name="status"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="0" {{ old('status', $patients->status) == 0 ? 'selected' : '' }}>
                                                Hoạt động</option>
                                            <option value="1" {{ old('status', $patients->status) == 1 ? 'selected' : '' }}>
                                                Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Tài khoản liên kết</label>
                                        <select name="accountId"
                                            class="form-select form-select-lg shadow-sm border-0 rounded-3">
                                            <option value="">-- Chọn tài khoản --</option>

                                            @foreach ($accounts as $acc)
                                                <option value="{{ $acc->accountId }}" {{ old('accountId', $patients->accountId) == $acc->accountId ? 'selected' : '' }}>
                                                    {{ $acc->username }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <span class="text-danger">@error('accountId') {{ $message }} @enderror</span>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Ảnh đại diện</label>
                                        <input type="file" name="image"
                                            class="form-control form-control-lg shadow-sm border-0 rounded-3"
                                            accept="image/*" onchange="previewImage(event)">
                                        <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-5 gap-3">
                                    <a href="{{ route('patients.index') }}"
                                        class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                                    </a>
                                    <button type="submit" class="btn btn-gradient px-4 py-2 rounded-3">
                                        <i class="fas fa-save me-2"></i> Lưu thay đổi
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

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
        height: 50px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #36d1dc, #4e73df);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(54, 209, 220, 0.4);
    }
</style>