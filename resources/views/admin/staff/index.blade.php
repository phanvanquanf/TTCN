@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <!-- Page Title -->
        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Danh sách nhân viên</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Nhân viên</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">
                            <div
                                class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">
                                <h4 class="fw-bold text-primary mb-0" style="font-size: 1.6rem;">Quản lý nhân viên</h4>
                                <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2">
                                    <form method="GET" action="{{ route('staff.index') }}" class="d-flex">
                                        <div class="input-group" style="min-width: 400px;">
                                            <input type="text" name="input" class="form-control shadow-sm border-0"
                                                placeholder="Tìm kiếm nhân viên..." value="{{ request('input') }}">
                                            <button class="btn btn-primary shadow-sm px-3" type="submit">
                                                <i class="fas fa-search me-1"></i> Tìm kiếm
                                            </button>
                                        </div>
                                    </form>
                                    <a href="{{ route('staff.create') }}"
                                        class="btn btn-gradient ms-md-3 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-plus-circle me-2"></i> Thêm nhân viên
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive rounded-3 overflow-hidden shadow-sm border">
                                <table class="table table-hover align-middle mb-0 text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Hình ảnh</th>
                                            <th>Họ & tên</th>
                                            <th>Dịch vụ</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($staffs as $index => $staff)
                                            <tr class="border-bottom">
                                                <td class="fw-medium">{{ $staffs->firstItem() + $index}}</td>
                                                <td>
                                                    <img src="{{ asset('admin/assets/img/staff/doctor' . '/' . $staff->image) }}"
                                                        alt="{{ $staff->fullName }}" class="rounded-2"
                                                        style="width:100px; height:100px; object-fit:cover; display:block; margin:auto;">
                                                </td>
                                                <td class="fw-semibold">{{ $staff->fullName }}</td>
                                                </td>
                                                <td>{{ $staff->services?->serviceName ?? 'Tiếp khách' }}</td>
                                                <td>
                                                    @if($staff->status == 0)
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-success fw-medium">
                                                            <span class="status-indicator bg-success me-2"></span> Hoạt động
                                                        </span>
                                                    @else
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-danger fw-medium">
                                                            <span class="status-indicator bg-danger me-2"></span> Ngừng hoạt động
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('staff.show', $staff->staffId) }}"
                                                            class="btn btn-outline-primary btn-sm rounded-circle" title="Xem">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('staff.edit', $staff->staffId) }}"
                                                            class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                            title="Chỉnh sửa">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('staff.destroy', $staff->staffId) }}"
                                                            method="POST" class="d-inline"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?')">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                title="Xóa">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-5">
                                                    <i class="fas fa-inbox fa-3x mb-3 text-secondary opacity-50"></i>
                                                    <p class="mb-0 fs-5">Không tìm thấy nhân viên nào.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="mt-4 d-flex justify-content-end">
                                    {{ $staffs->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

<style>
    .input-group {
        min-width: 404px;
        margin-top: 17px;
        min-height: 46px;
    }

    /* Buttons Gradient */
    .btn-gradient {
        background: linear-gradient(45deg, #4e73df, #36d1dc);
        border: none;
        color: white !important;
        font-weight: 600;
        border-radius: 10px;
        padding: 12px 20px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(54, 209, 220, 0.3);
        white-space: nowrap;
        height: 50px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #36d1dc, #4e73df);
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(54, 209, 220, 0.4);
        color: white !important;
    }

    /* Table Styling */
    .table thead th {
        border-bottom: 2px solid #e5e7eb;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 12px;
        background-color: #f8fafc;
    }

    .table tbody td {
        padding: 12px 10px;
        vertical-align: middle;
    }

    .table tbody tr {
        transition: all 0.2s;
    }

    .table tbody tr:hover {
        background-color: #f8faff !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    /* Status indicator */
    .status-indicator {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    /* Buttons Small Rounded */
    .btn-sm.rounded-circle {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .btn-sm.rounded-circle:hover {
        transform: scale(1.05);
    }

    .d-flex.justify-content-center.gap-2 {
        margin-top: 12px;
    }
</style>