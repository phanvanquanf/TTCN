<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between"
        style="padding: 10px; background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
        <a href="{{ route('admin.home') }}" class="logo d-flex align-items-center"
            style="text-decoration: none; color: #333;">
            <img src="{{ asset('admin/assets/img/logo1.png') }}" alt="Logo">
            <div style="display: flex; flex-direction: column; line-height: 1.2;">
                <span style="font-size: 18px; font-weight: bold; color: #0056b3;">Phòng khám Medilab</span>
                <span style="font-size: 14px; font-weight: 500; color: #6c757d; margin-top: 2px;">Trang quản trị</span>
            </div>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" style="font-size: 20px; cursor: pointer;"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#"><i class="bi bi-search"></i></a>
            </li><!-- End Search Icon-->

            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">3</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        Bạn có 3 thông báo mới
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div>
                            <h4>Bệnh nhân cần tư vấn</h4>
                            <p>Bệnh nhân Nguyễn Văn A đặt lịch khám mới.</p>
                            <p>30 phút trước</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-info-circle text-info"></i>
                        <div>
                            <h4>Cập nhật lịch khám</h4>
                            <p>Lịch khám tuần tới đã được cập nhật. Kiểm tra lại phòng khám.</p>
                            <p>1 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-check-circle text-success"></i>
                        <div>
                            <h4>Kết quả xét nghiệm</h4>
                            <p>Bệnh nhân Lê Thị B đã nhận kết quả xét nghiệm.</p>
                            <p>2 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Xem tất cả thông báo</a>
                    </li>
                </ul>
            </li><!-- End Notification Nav -->

            <!-- Messages -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="badge bg-success badge-number">2</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                    <li class="dropdown-header">
                        Bạn có 2 tin nhắn mới
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">Xem tất cả</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('admin/assets/img/staff-1.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>Bác sĩ Trần Văn C</h4>
                                <p>Có cập nhật mới về lịch khám bệnh nhân.</p>
                                <p>1 giờ trước</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="message-item">
                        <a href="#">
                            <img src="{{ asset('admin/assets/img/staff-2.jpg') }}" alt="" class="rounded-circle">
                            <div>
                                <h4>Y tá Nguyễn Thị D</h4>
                                <p>Bệnh nhân đến kiểm tra sức khỏe định kỳ.</p>
                                <p>2 giờ trước</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="dropdown-footer">
                        <a href="#">Xem tất cả tin nhắn</a>
                    </li>
                </ul>
            </li><!-- End Messages Nav -->

            <!-- Profile -->
            @auth
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- Avatar người dùng -->
                        @php
                            $image = auth()->user()->staff?->image;
                        @endphp
                        <img src="{{ asset('admin/assets/img/staff/doctor/' . $image) }}" alt="Profile"
                            class="rounded-circle" width="40" height="40">
                        <!-- Tên user -->
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->staff?->fullName }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <!-- Header -->
                        <li class="dropdown-header text-center">
                            <h6>{{ auth()->user()->username }}</h6>
                            <span>{{ auth()->user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @php
                            $staffId = auth()->user()->staff?->staffId;
                        @endphp

                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ $staffId ? route('profile.index', $staffId) : route('profile.noinfo') }}">
                            <i class="bi bi-person me-2"></i>
                            <span>Hồ sơ của tôi</span>
                        </a>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                <span>Đăng xuất</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endauth


        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Bộ điều khiển</li>

        @foreach ($menus->where('itemLevel', 1)->sortBy('itemOrder') as $menu)
            @php
                $pID = $menu->adminMenuId;
                $sMenu = $menus->where('parentLevel', $pID)->sortBy('itemOrder')->values();
            @endphp

            @if ($sMenu->count() == 0)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/' . $menu->controllerName . '/' . $menu->actionName) }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ $menu->itemName }}</span>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link parent-menu" href="#collapse-{{ $menu->adminMenuId }}" data-bs-toggle="collapse">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->itemName }}</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="collapse-{{ $menu->adminMenuId }}" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        @foreach ($sMenu as $smn)
                            <li>
                                <a href="{{ url('admin/' . $smn->controllerName . '/' . $smn->actionName) }}">
                                    <i class="bi bi-circle"></i>
                                    <span>{{ $smn->itemName }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach

        <!-- Trang tĩnh -->
        <li class="nav-heading">Trang</li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-person"></i>
                <span>Hồ sơ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Câu hỏi thường gặp</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="bi bi-envelope"></i>
                <span>Liên hệ</span>
            </a>
        </li>

    </ul>
</aside>

<style>
    .logo img {
        max-height: 45px;
    }

    .justify-content-between {
        justify-content: space-between !important;
        margin-left: -17px;
    }
</style>