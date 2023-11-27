a<!-- Navbar -->

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="javascript:void(0)">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2"
            aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        @if (Auth::user()->getRoleNames()[0] == 'pasien')
            <div class="collapse navbar-collapse" id="navbar-ex-2">
                <div class="navbar-nav me-auto">
                    <a class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-item nav-link {{ request()->is('rawat-jalan*') ? 'active' : '' }}"
                        href="{{ route('rawat-jalan.index') }}">Rawat Jalan</a>
                </div>

            </div>
        @endif
    </div>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('asset/assets/img/avatars/1.png') }}" alt
                            class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('asset/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted">{{ Auth()->user()->getRoleNames()[0] }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

<!-- / Navbar -->
