@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2">Danh sách bệnh nhân</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Bệnh nhân</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4">

                            <!-- Header -->
                            <div
                                class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">
                                <h4 class="fw-bold text-primary mb-0" style="font-size: 1.6rem;">Quản lý bệnh nhân</h4>

                                <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2">
                                    <form method="GET" action="{{ route('patients.index') }}" class="d-flex">
                                        <div class="input-group" style="min-width: 400px;">
                                            <input type="text" name="input" class="form-control shadow-sm border-0"
                                                placeholder="Tìm kiếm bệnh nhân..." value="{{ request('input') }}">
                                            <button class="btn btn-primary shadow-sm px-3" type="submit">
                                                <i class="fas fa-search me-1"></i> Tìm kiếm
                                            </button>
                                        </div>
                                    </form>

                                    <a href="{{ route('patients.create') }}"
                                        class="btn btn-gradient ms-md-3 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-plus-circle me-2"></i> Thêm bệnh nhân
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive rounded-3 overflow-hidden shadow-sm border">
                                <table class="table table-hover align-middle mb-0 text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Họ và tên</th>
                                            <th>Giới tính</th>
                                            <th>Ngày sinh</th>
                                            <th>Địa chỉ</th>
                                            <th>Số điện thoại</th>
                                            <th>CCCD</th>
                                            <th>Ngày khám</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">
                                        @forelse ($patients as $index => $p)
                                            <tr class="border-bottom">
                                                <td>{{ $index + 1 }}</td>

                                                <td class="fw-semibold">{{ $p->fullName }}</td>

                                                <td>
                                                    {{ $p->gender == 0 ? 'Nam' : 'Nữ' }}
                                                </td>

                                                <td>{{ $p->birthDate }}</td>

                                                <td>{{ $p->address }}</td>

                                                <td>{{ $p->phone }}</td>

                                                <td>{{ $p->idCard }}</td>

                                                <td>{{ $p->checkinDate }}</td>

                                                <td>
                                                    @if($p->status == 0)
                                                        <span class="text-success fw-medium">Hoạt động</span>
                                                    @else
                                                        <span class="text-danger fw-medium">Ngừng hoạt động</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <a href="{{ route('patients.show', $p->patientId) }}"
                                                            class="btn btn-outline-primary btn-sm rounded-circle" title="Xem">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <a href="{{ route('patients.edit', $p->patientId) }}"
                                                            class="btn btn-outline-success btn-sm rounded-circle"
                                                            title="Chỉnh sửa">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('patients.destroy', $p->patientId) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa bệnh nhân này?')">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm rounded-circle"
                                                                title="Xóa">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted py-5">
                                                    <i class="fas fa-inbox fa-3x mb-3 text-secondary opacity-50"></i>
                                                    <p class="mb-0 fs-5">Không tìm thấy bệnh nhân nào.</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="mt-4 d-flex justify-content-end">
                                    {{ $patients->links() }}
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