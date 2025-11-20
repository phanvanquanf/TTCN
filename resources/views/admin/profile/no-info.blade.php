@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Thông báo</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông báo</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="d-flex justify-content-center">
                <div class="col-lg-6">

                    <div class="card text-center shadow-sm border-0 rounded-4">
                        <div class="card-body p-5">

                            <h2 class="text-danger mb-3">
                                <i class="bi bi-exclamation-triangle"></i> Không có thông tin
                            </h2>

                            <p class="fs-5 text-muted">
                                Bạn không có quyền xem hồ sơ cá nhân hoặc thông tin không tồn tại.
                            </p>

                            <a href="{{ route('admin.home') }}" class="btn btn-primary mt-3 px-4">
                                <i class="bi bi-house-door me-2"></i> Quay về trang chủ
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection