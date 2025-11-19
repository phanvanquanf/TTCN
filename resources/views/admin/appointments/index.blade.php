@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2 text-primary">Danh sách lịch hẹn</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Lịch hẹn</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="card appointment-card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">

                        <div class="header-title d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold text-gradient">Quản lý lịch hẹn</h4>
                        </div>

                        <div class="table-responsive table-wrapper">
                            <table class="table table-hover align-middle text-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bệnh nhân</th>
                                        <th>Bác sĩ</th>
                                        <th>Ngày hẹn</th>
                                        <th>Ghi chú</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($appointments as $index => $app)
                                        <tr class="row-item">
                                            <td class="fw-semibold">{{ $index + 1 }}</td>

                                            <td class="fw-semibold">{{ $app->patient->fullName ?? '-' }}</td>

                                            <td>{{ $app->staff->fullName ?? '-' }}</td>

                                            <td class="fw-medium text-primary">
                                                {{ \Carbon\Carbon::parse($app->appointmentDate)->format('d/m/Y H:i') }}
                                            </td>

                                            <td class="text-muted">{{ $app->notes ?? '-' }}</td>

                                            <td>
                                                @php
                                                    $status = [
                                                        0 => ['Chưa xác nhận', 'badge-waiting'],
                                                        1 => ['Đã xác nhận', 'badge-success'],
                                                        2 => ['Đã khám', 'badge-done'],
                                                        3 => ['Hủy', 'badge-cancel'],
                                                    ];
                                                @endphp

                                                <span class="status-badge {{ $status[$app->status][1] }}">
                                                    {{ $status[$app->status][0] }}
                                                </span>
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center gap-2">

                                                    <a href="{{ route('appointments.show', $app->appointmentId) }}"
                                                        class="btn-action btn-info-soft" title="Xem chi tiết">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    @if($app->status == 0)
                                                        <form action="{{ route('appointments.updateStatus', $app->appointmentId) }}"
                                                            method="POST">
                                                            @csrf @method('PUT')
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn-action btn-success-soft" title="Xác nhận">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if($app->status == 1)
                                                        <form action="{{ route('appointments.updateStatus', $app->appointmentId) }}"
                                                            method="POST">
                                                            @csrf @method('PUT')
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn-action btn-primary-soft" title="Đã khám">
                                                                <i class="fas fa-stethoscope"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if(in_array($app->status, [0, 1]))
                                                        <form action="{{ route('appointments.updateStatus', $app->appointmentId) }}"
                                                            method="POST" onsubmit="return confirm('Bạn chắc chắn muốn hủy lịch?')">
                                                            @csrf @method('PUT')
                                                            <input type="hidden" name="status" value="3">
                                                            <button class="btn-action btn-danger-soft" title="Hủy lịch">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5 text-muted">
                                                <i class="fas fa-inbox fa-3x mb-3 opacity-50"></i>
                                                <p class="fs-5">Không có lịch hẹn nào.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="mt-4 d-flex justify-content-end">
                                {{ $appointments->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

{{-- ===================== CSS Premium UI ===================== --}}
<style>
    /* Title gradient */
    .text-gradient {
        background: linear-gradient(45deg, #4e73df, #36d1dc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Card */
    .appointment-card {
        border-radius: 22px;
        backdrop-filter: blur(10px);
        background: white;
        padding: 20px;
    }

    /* Table */
    .table-wrapper table thead {
        background: #f3f6fb;
        border-radius: 12px;
    }

    .table thead th {
        font-size: 0.85rem;
        color: #344767;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        padding: 14px;
    }

    .table tbody td {
        padding: 14px;
        vertical-align: middle;
    }

    /* Row hover */
    .row-item:hover {
        background: #f8fbff !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
        transition: 0.25s;
    }

    /* Status badges */
    .status-badge {
        padding: 6px 14px;
        border-radius: 14px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
    }

    .badge-waiting {
        background: #fff4d2;
        color: #c68b00;
    }

    .badge-success {
        background: #d7f5e1;
        color: #1e9b57;
    }

    .badge-done {
        background: #dcecfd;
        color: #1c65b0;
    }

    .badge-cancel {
        background: #ffd7d7;
        color: #d03131;
    }

    /* Action Buttons */
    .btn-action {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        font-size: 15px;
        transition: 0.25s;
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Soft colors */
    .btn-info-soft {
        background: #e3f2ff;
        color: #187bcd;
    }

    .btn-success-soft {
        background: #dbffe8;
        color: #1e8e57;
    }

    .btn-primary-soft {
        background: #e2eaff;
        color: #3c61d1;
    }

    .btn-danger-soft {
        background: #ffe2e2;
        color: #c62828;
    }
</style>