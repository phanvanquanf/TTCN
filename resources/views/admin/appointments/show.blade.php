@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle mb-4">
            <h1 class="fw-bold mb-2 text-primary">Chi tiết lịch hẹn</h1>
            <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('appointments.index') }}">Lịch hẹn</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="container-fluid">
                <div class="card detail-card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-bold text-gradient">Thông tin lịch hẹn</h3>

                            <a href="{{ route('appointments.admin') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Quay lại
                            </a>
                        </div>

                        <div class="row g-4">

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title"><i class="fas fa-user me-2 text-primary"></i>Bệnh nhân</h6>
                                    <p class="info-text">{{ $appointment->patient->fullName ?? 'Không có' }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title"><i class="fas fa-user-md me-2 text-primary"></i>Bác sĩ</h6>
                                    <p class="info-text">{{ $appointment->staff->fullName ?? 'Chưa phân công' }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title"><i class="fas fa-calendar-day me-2 text-primary"></i>Ngày giờ hẹn
                                    </h6>
                                    <p class="info-text">
                                        {{ \Carbon\Carbon::parse($appointment->appointmentDate)->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title"><i class="fas fa-sticky-note me-2 text-primary"></i>Ghi chú</h6>
                                    <p class="info-text">{{ $appointment->notes ?? 'Không có' }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title"><i class="fas fa-flag me-2 text-primary"></i>Trạng thái</h6>

                                    @php
                                        $statusList = [
                                            0 => ['Chưa xác nhận', 'badge-waiting'],
                                            1 => ['Đã xác nhận', 'badge-success'],
                                            2 => ['Đã khám', 'badge-done'],
                                            3 => ['Hủy', 'badge-cancel'],
                                        ];
                                    @endphp

                                    <span class="status-badge {{ $statusList[$appointment->status][1] }}">
                                        {{ $statusList[$appointment->status][0] }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-box">
                                    <h6 class="info-title">
                                        <i class="fas fa-concierge-bell me-2 text-primary"></i>Dịch vụ khám
                                    </h6>
                                    <p class="info-text">{{ $appointment->staff->services->serviceName ?? 'Không có' }}</p>
                                </div>
                            </div>


                        </div>

                        <hr class="my-4">

                        <div class="action-area">

                            <h5 class="fw-bold mb-3">Thao tác</h5>

                            <div class="d-flex gap-3 flex-wrap">

                                @if($appointment->status == 0)
                                    <form action="{{ route('appointments.updateStatus', $appointment->appointmentId) }}"
                                        method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn-action btn-success-soft">
                                            <i class="fas fa-check me-2"></i>Xác nhận lịch
                                        </button>
                                    </form>
                                @endif

                                @if($appointment->status == 1)
                                    <form action="{{ route('appointments.updateStatus', $appointment->appointmentId) }}"
                                        method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="2">
                                        <button class="btn-action btn-primary-soft">
                                            <i class="fas fa-stethoscope me-2"></i>Đánh dấu đã khám
                                        </button>
                                    </form>
                                @endif

                                @if(in_array($appointment->status, [0, 1]))
                                    <form action="{{ route('appointments.updateStatus', $appointment->appointmentId) }}"
                                        method="POST" onsubmit="return confirm('Bạn chắc chắn muốn hủy lịch hẹn này?')">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="3">
                                        <button class="btn-action btn-danger-soft">
                                            <i class="fas fa-times me-2"></i>Hủy lịch hẹn
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

{{-- ====================== CSS PREMIUM SHOW PAGE ====================== --}}
<style>
    .text-gradient {
        background: linear-gradient(45deg, #4e73df, #36d1dc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .detail-card {
        border-radius: 22px;
        background: white;
        padding: 25px;
        backdrop-filter: blur(10px);
    }

    /* Info box */
    .info-box {
        background: #f8faff;
        border: 1px solid #e3eaf3;
        padding: 18px;
        border-radius: 14px;
        transition: 0.25s;
    }

    .info-box:hover {
        background: #f3f8ff;
        transform: translateY(-3px);
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    }

    .info-title {
        font-weight: 700;
        font-size: 0.9rem;
        color: #344767;
    }

    .info-text {
        font-size: 1rem;
        margin-top: 6px;
        color: #3a3b3c;
    }

    /* Back button */
    .btn-back {
        background: #eef3ff;
        color: #3256d4;
        padding: 10px 18px;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.25s;
    }

    .btn-back:hover {
        background: #dce6ff;
        transform: translateX(-3px);
    }

    /* Status Badge */
    .status-badge {
        padding: 8px 16px;
        font-size: 0.9rem;
        border-radius: 14px;
        font-weight: 700;
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

    /* Action buttons */
    .btn-action {
        padding: 12px 18px;
        border-radius: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: .25s;
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-success-soft {
        background: #dbffe8;
        color: #1e8e57;
        border: none;
    }

    .btn-primary-soft {
        background: #e2eaff;
        color: #3c61d1;
        border: none;
    }

    .btn-danger-soft {
        background: #ffe2e2;
        color: #c62828;
        border: none;
    }
</style>