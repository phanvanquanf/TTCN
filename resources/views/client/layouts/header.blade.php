<!-- Header -->
<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="mailto:lienhe@medilab.com">lienhe@medilab.com</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+84 123 456 789</span>
                </i>
            </div>
            <div class="user-dropdown d-none d-md-flex align-items-center">
                @guest
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light fw-semibold px-3">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-light text-dark fw-semibold px-3">
                            <i class="bi bi-person-plus me-1"></i> Đăng ký
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-white"
                            id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4 me-2 text-white"></i>
                            <span class="text-white">{{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            @php
                                $account = Auth::user();
                                $patient = $account && $account->role == 2 ? $account->patient : null;
                            @endphp

                            @if($patient)
                                <li>
                                    <a class="dropdown-item" href="{{ route('patient.profile', $patient->patientId) }}">
                                        <i class="bi bi-person me-2"></i> Thông tin cá nhân
                                    </a>
                                </li>
                            @endif

                            <li><a class="dropdown-item" href="{{ route('appointments.history') }}"><i
                                        class="bi bi-calendar-check me-2"></i>
                                    Lịch sử hẹn
                                    khám</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>

        </div>
    </div>
    </div>
    </div>

    <div class="branding d-flex align-items-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Medilab</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    @php
                        function getMenuLink($link)
                        {
                            if (str_contains($link, '#')) {
                                $parts = explode('#', $link);
                                $anchor = $parts[1] ?? '';
                                return url('client/home/index') . '#' . $anchor;
                            }
                            return $link;
                        }

                        // Hàm lấy sub menu
                        function getSubMenus($menus, $parentId)
                        {
                            return $menus->where('parentId', $parentId);
                        }
                    @endphp

                    @foreach ($menus as $menu)
                        @if ($menu->levels == 1)
                            @php
                                $subMenus = getSubMenus(menus: $menus, parentId: $menu->menuId);
                            @endphp

                            @if ($subMenus->isEmpty())
                                {{-- Menu bình thường --}}
                                <li>
                                    <a href="{{ getMenuLink($menu->link) }}">{{ $menu->menuName }}</a>
                                </li>
                            @else
                                {{-- Menu có dropdown --}}
                                <li class="dropdown">
                                    <a href="{{ getMenuLink($menu->link) }}">
                                        {{ $menu->menuName }} <i class="bi bi-chevron-down toggle-dropdown"></i>
                                    </a>
                                    <ul>
                                        @foreach ($subMenus as $sm)
                                            <li>
                                                <a href="{{ getMenuLink($sm->link) }}">{{ $sm->menuName }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </nav>
            <a class="cta-btn d-none d-sm-block" href="/appointment/index">Đặt lịch hẹn</a>
        </div>
    </div>
</header>