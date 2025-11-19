@extends('client.layouts.app')
@section('content')
    <section id="appointment" class="appointment section">
        <div class="container section-title text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Đặt lịch hẹn khám bệnh</h2>
            <p class="text-muted">Thông tin bệnh nhân sẽ được tự động điền từ tài khoản của bạn</p>
        </div>

        @php
            $account = Auth::user();
            $patient = $account->patient;
        @endphp

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="appointment-card p-4">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    {{-- Thông tin bệnh nhân --}}
                    <h4 class="mb-3 text-primary">1. Thông tin bệnh nhân</h4>
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" value="{{ $patient->fullName }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" value="{{ $patient->birthDate }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Giới tính</label>
                            <input type="text" class="form-control" value="{{ $patient->gender == 'Nam' ? 'Nam' : 'Nữ' }}"
                                readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" value="{{ $patient->phone }}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">CCCD/CMND</label>
                            <input type="text" class="form-control" value="{{ $patient->idCard }}" readonly>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- Thông tin lịch hẹn --}}
                    <h4 class="mb-3 text-primary">2. Thông tin lịch hẹn</h4>
                    <div class="row g-3 mb-4">

                        <div class="col-md-6">
                            <label class="form-label">Chọn bác sĩ</label>
                            <select name="staffId" class="form-select" required>
                                <option value="">Chọn bác sĩ</option>
                                @foreach ($staffs as $st)
                                    <option value="{{ $st->staffId }}">{{ $st->fullName }} – {{ $st->department }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Chọn dịch vụ</label>
                            <select name="serviceId" class="form-select" required>
                                <option value="">Chọn dịch vụ</option>
                                @foreach ($staffs as $st)
                                    @if($st->services)
                                        <option value="{{ $st->services->serviceId }}">{{ $st->services->serviceName }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Ngày giờ khám</label>
                            <input type="datetime-local" name="appointmentDate" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Ghi chú (tùy chọn)</label>
                            <textarea name="notes" class="form-control" rows="4"
                                placeholder="Mô tả triệu chứng hoặc yêu cầu thêm (nếu có)..."></textarea>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">
                            Tôi đồng ý với điều khoản & chính sách bảo mật của phòng khám
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <i class="bi bi-calendar-check me-2"></i>Đặt lịch ngay
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

<style>
    .appointment-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        border: 1px solid #e0e0e0;
    }

    h4.text-primary {
        font-weight: 600;
        font-size: 20px;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 10px 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #1977cc;
        box-shadow: 0 0 0 0.2rem rgba(25, 119, 204, 0.25);
    }

    .section-divider {
        margin: 25px 0;
        border-top: 2px dashed #dee2e6;
    }

    .btn-primary {
        background-color: #1977cc;
        font-size: 16px;
        border-radius: 8px;
    }
</style>