@extends('admin.layouts.app')

@section('content')
<main id="main" class="main">

    <!-- Page Title -->
    <div class="pagetitle mb-4">
        <h1 class="fw-bold mb-2">Danh sách tài khoản</h1>
        <nav>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tài khoản</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <!-- Header + Search + Add -->
                        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">
                            <h4 class="fw-bold text-primary mb-0" style="font-size: 1.6rem;">Quản lý tài khoản</h4>
                            <div class="d-flex flex-column flex-md-row align-items-stretch align-items-md-center gap-2">
                                <form method="GET" action="{{ route('accounts.index') }}" class="d-flex">
                                    <div class="input-group" style="min-width: 400px;">
                                        <input type="text" name="input" class="form-control shadow-sm border-0"
                                            placeholder="Tìm kiếm tài khoản..." value="{{ request('input') }}">
                                        <button class="btn btn-primary shadow-sm px-3" type="submit">
                                            <i class="fas fa-search me-1"></i> Tìm kiếm
                                        </button>
                                    </div>
                                </form>
                                <a href="{{ route('accounts.create') }}" class="btn btn-gradient ms-md-3 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-plus-circle me-2"></i> Thêm tài khoản
                                </a>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive rounded-3 overflow-hidden shadow-sm border">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">#</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center pe-4">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @forelse ($accounts as $index => $account)
                                        <tr class="border-bottom">
                                            <td class="fw-medium">{{$index}}</td>
                                            <td class="fw-semibold">{{ $account->username }}</td>
                                            <td>{{ $account->email }}</td>
                                            <td>
                                                @switch($account->role)
                                                    @case(0)
                                                        <span class="badge bg-danger bg-opacity-10 text-danger
                                                         border border-danger border-opacity-25 px-3 py-2">Quản trị viên</span>
                                                        @break
                                                    @case(1)
                                                        <span class="badge bg-info bg-opacity-10 text-info
                                                        border border-info border-opacity-25 px-3 py-2">Nhân viên</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-secondary bg-opacity-10 text-secondary
                                                         border border-secondary border-opacity-25 px-3 py-2">Bệnh nhân</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                @if($account->status == 0)
                                                        <span class="d-inline-flex align-items-center justify-content-center text-success fw-medium">
                                                            <span class="status-indicator bg-success me-2"></span> Hoạt động
                                                        </span>
                                                    @else
                                                        <span class="d-inline-flex align-items-center justify-content-center text-danger fw-medium">
                                                            <span class="status-indicator bg-danger me-2"></span> Ngừng hoạt động
                                                        </span>
                                                    @endif
                                            </td>

                                            <td class="text-center pe-4">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('accounts.edit', $account->accountId) }}"
                                                        method="GET"
                                                       class="btn btn-outline-success btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                       title="Chỉnh sửa">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('accounts.destroy', $account->accountId) }}"
                                                          method="POST" class="d-inline"
                                                          onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle d-flex align-items-center justify-content-center"
                                                                title="Xóa">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-5">
                                                <i class="fas fa-inbox fa-3x mb-3 text-secondary opacity-50"></i>
                                                <p class="mb-0 fs-5">Không tìm thấy tài khoản nào.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- Pagination -->
                                <div class="mt-4 d-flex justify-content-end">
                                    {{ $accounts->links() }}
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

.input-group {
    margin-top: 16px;
}

.input-group .form-control {
    height: 50px;
    font-size: 1rem;
}
.input-group .btn {
    height: 50px;
    font-size: 1rem;
}

/* Table Styling */
.table thead th {
    border-bottom: 2px solid #e5e7eb;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 16px 12px;
    background-color: #f8fafc;
    text-align: center;
}
.table tbody td {
    padding: 16px 12px;
    vertical-align: middle;
    text-align: center;
}
.table tbody tr {
    transition: all 0.2s;
}
.table tbody tr:hover {
    background-color: #f8faff !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

/* Badges */
.badge {
    font-size: 0.75rem;
    font-weight: 500;
    border-radius: 8px;
}

/* Rounded Small Buttons */
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

.btn{
--bs-btn-color:#efefef;
}

.status-indicator {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

/* Input Group */
.input-group-lg .form-control,
.input-group-lg .btn {
    height: 50px;
    font-size: 1rem;
}

/* Pagination */
.pagination {
    margin-bottom: 0;
}
.page-link {
    border-radius: 8px;
    margin: 0 4px;
    border: 1px solid #e2e8f0;
    color: #64748b;
    font-weight: 500;
}
.page-link:hover {
    background-color: #f1f5f9;
    border-color: #cbd5e1;
    color: #475569;
}
.page-item.active .page-link {
    background-color: #3b82f6;
    border-color: #3b82f6;
}
a.btn.btn-outline-success.btn-sm.rounded-circle.d-flex.align-items-center.justify-content-center
{
    margin-top: 10px;
}

.btn-sm.rounded-circle{
    margin-top: 10px;
}

</style>
