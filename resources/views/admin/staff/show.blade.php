@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <!-- Page Title -->
        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Chi tiết nhân viên</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h4 class="fw-bold text-primary mb-4">Thông tin nhân viên</h4>

                            <div class="text-center mb-4">
                                <img src="{{ asset('admin/assets/img/staff/doctor' . '/' . $staff->image) }}"
                                    class="rounded-3 border" style="width:200px; height:200px; object-fit:cover;">
                            </div>

                            <table class="table table-bordered align-middle">
                                <tr>
                                    <th class="bg-light fw-semibold" style="width: 30%">Họ và tên</th>
                                    <td>{{ $staff->fullName }}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light fw-semibold">Giới tính</th>
                                    <td>{{ $staff->gender == 0 ? 'Nam' : 'Nữ' }}</td>
                                </tr>


                                <th class="bg-light fw-semibold">Ngày sinh</th>
                                <td>{{ $staff->birthDate }}</td>


                                <tr>
                                    <th class="bg-light fw-semibold">Dịch vụ</th>
                                    <td>{{ $staff->services->serviceName}}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light fw-semibold">Số điện thoại</th>
                                    <td>{{ $staff->phone }}</td>
                                </tr>

                                <tr>
                                    <th class="bg-light fw-semibold">Trạng thái</th>
                                    <td>
                                        @if($staff->status == 0)
                                            <span class="badge bg-success">Đang làm việc</span>
                                        @else
                                            <span class="badge bg-danger">Đã nghỉ</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th class="bg-light fw-semibold">Tài khoản liên kết</th>
                                    <td>
                                        @if($staff->account)
                                            {{ $staff->account->username }}
                                        @else
                                            <span class="text-muted">Không có</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end mt-4 gap-3">
                                <a href="{{ route('staff.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                    <i class="fas fa-arrow-left me-2"></i> Quay lại
                                </a>

                                <a href="{{ route('staff.edit', $staff->staffId) }}"
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