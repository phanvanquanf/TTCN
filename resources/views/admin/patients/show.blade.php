@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Chi tiết bệnh nhân</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">Bệnh nhân</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-primary mb-4">Thông tin bệnh nhân</h4>

                            <!-- Ảnh đại diện -->
                            <div class="text-center mb-4">
                                @if($patient->image)
                                    <img src="{{ asset('client/assets/img/patients/' . $patient->image) }}"
                                        class="rounded-3 border" style="width: 200px; height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('clinet/assets/img/default.png') }}" class="rounded-3 border"
                                        style="width: 200px; height: 200px; object-fit: cover;">
                                @endif
                            </div>

                            <!-- Bảng thông tin -->
                            <table class="table table-bordered align-middle">
                                <tr>
                                    <th class="bg-light fw-semibold" style="width: 30%">Họ và tên</th>
                                    <td>{{ $patient->fullName }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Giới tính</th>
                                    <td>{{ $patient->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Ngày sinh</th>
                                    <td>{{ $patient->birthDate }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Địa chỉ</th>
                                    <td>{{ $patient->address }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Số điện thoại</th>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">CCCD</th>
                                    <td>{{ $patient->idCard }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Ngày khám</th>
                                    <td>{{ $patient->checkinDate }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Trạng thái</th>
                                    <td>
                                        @if($patient->status == 0)
                                            <span class="badge bg-success">Hoạt động</span>
                                        @else
                                            <span class="badge bg-danger">Ngừng hoạt động</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="bg-light fw-semibold">Tài khoản liên kết</th>
                                    <td>
                                        @if($patient->account)
                                            {{ $patient->account->username }}
                                        @else
                                            <span class="text-muted">Không có</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end mt-4 gap-3">
                                <a href="{{ route('patients.index') }}"
                                    class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                    <i class="fas fa-arrow-left me-2"></i> Quay lại
                                </a>

                                <a href="{{ route('patients.edit', $patient->patientId) }}"
                                    class="btn btn-gradient px-4 py-2 rounded-3">
                                    <i class="fas fa-edit me-2"></i> Chỉnh sửa
                                </a>
                            </div>

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
        height: 50px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #36d1dc, #4e73df);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(54, 209, 220, 0.4);
    }
</style>