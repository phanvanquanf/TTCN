@extends('client.layouts.app')
@section('content')

    <section id="history" class="appointment section py-5">
        <div class="container section-title text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold text-primary">Lịch sử hẹn khám</h2>
            <p class="text-muted">Theo dõi tất cả lịch hẹn của bạn tại phòng khám</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            @if($appointments->isEmpty())
                <div class="empty-state text-center py-5">
                    <i class="fas fa-calendar-times empty-icon mb-3"></i>
                    <p class="empty-text">Bạn chưa có lịch hẹn nào</p>
                </div>
            @else
                <div class="history-card overflow-auto">
                    <table class="table modern-table align-middle text-center mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-start">Dịch vụ & Bác sĩ</th>
                                <th>Ngày khám</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $index => $app)
                                <tr class="row-item">
                                    <td><strong>{{ $index + 1 }}</strong></td>

                                    <td class="text-start">
                                        <div class="doctor-info mb-1">
                                            <i class="fas fa-user-md icon"></i>
                                            <span class="doctor-name">{{ $app->staff->fullName ?? 'Chưa phân công' }}</span>
                                        </div>
                                        <div class="service-info">
                                            <i class="fas fa-concierge-bell small-icon"></i>
                                            <span
                                                class="service-name">{{ $app->staff->services->serviceName ?? 'Không rõ dịch vụ' }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <i class="far fa-clock me-1 text-primary"></i>
                                        {{ \Carbon\Carbon::parse($app->appointmentDate)->format('d/m/Y H:i') }}
                                    </td>

                                    <td>{{ $app->notes ?? '-' }}</td>

                                    <td>
                                        @if($app->status == 0)
                                            <span class="status-badge waiting">Chưa xác nhận</span>
                                        @elseif($app->status == 1)
                                            <span class="status-badge confirmed">Đã xác nhận</span>
                                        @elseif($app->status == 2)
                                            <span class="status-badge done">Đã khám</span>
                                        @elseif($app->status == 3)
                                            <span class="status-badge cancelled">Đã hủy</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(in_array($app->status, [0, 1]))
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('appointments.cancel', $app->appointmentId) }}" method="POST"
                                                    onsubmit="return confirm('Bạn có chắc muốn hủy lịch này không?');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn cancel-btn">
                                                        <i class="fas fa-times me-1"></i> Hủy
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </section>

@endsection

<style>
    /* Card */
    .history-card {
        background: #ffffff;
        padding: 25px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        border: 1px solid #eef2f7;
    }

    /* Table */
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .modern-table thead th {
        background: #f5f9ff;
        font-weight: 700;
        color: #334155;
        text-align: center;
        border: none;
        padding: 14px 10px;
        border-radius: 8px;
    }

    .modern-table tbody td {
        text-align: center;
        padding: 16px 10px;
        font-size: 0.95rem;
        vertical-align: middle;
        border-top: none;
        border-bottom: none;
    }

    /* Hover row */
    .row-item:hover {
        background: #f9fbff;
        transition: 0.25s;
    }

    /* Doctor + service info */
    .doctor-info,
    .service-info {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .icon {
        color: #0069d9;
        font-size: 1rem;
    }

    .small-icon {
        color: #8898aa;
        font-size: 0.85rem;
    }

    .doctor-name {
        font-weight: 600;
        color: #1e293b;
    }

    .service-name {
        font-size: 0.85rem;
        color: #475569;
    }

    /* Status badges */
    .status-badge {
        padding: 6px 14px;
        border-radius: 14px;
        font-weight: 600;
        font-size: 0.82rem;
        display: inline-block;
        min-width: 95px;
    }

    .waiting {
        background: #fff4d7;
        color: #b77900;
    }

    .confirmed {
        background: #d9f7e9;
        color: #15803d;
    }

    .done {
        background: #e1edff;
        color: #1d4ed8;
    }

    .cancelled {
        background: #ffe0e0;
        color: #d32f2f;
    }

    /* Cancel button */
    .cancel-btn {
        background: #ffe8e8;
        color: #d92121;
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 0.85rem;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.25s;
    }

    .cancel-btn i {
        font-size: 0.9rem;
    }

    .cancel-btn:hover {
        background: #ffd4d4;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    /* Empty UI */
    .empty-state {
        padding: 60px 20px;
    }

    .empty-icon {
        font-size: 4.5rem;
        color: #9cb3d9;
    }

    .empty-text {
        margin-top: 12px;
        font-size: 1.15rem;
        font-weight: 600;
        color: #415a77;
    }

    td form {
        display: inline-block;
        /* cho form hiển thị inline với nội dung */
        margin: 0;
        /* loại bỏ margin mặc định */
    }

    td .cancel-btn {
        display: inline-flex;
        /* căn giữa icon + text */
        align-items: center;
        justify-content: center;
    }
</style>