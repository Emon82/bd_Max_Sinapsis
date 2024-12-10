@php
    $users = null;
    if (auth()->check()) {
        $userId = \Illuminate\Support\Facades\Auth::id();

        // Query the users table to get the user with the given ID
        $users = \App\Models\User::where('id', $userId)->first();
    }
@endphp






<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @isset($users)
                            @if ($users->avatar)
                                <img id="avatar" src="{{ asset($users->avatar) }}" alt="Avatar" class="rounded-circle">
                            @else
                                <img id="avatar" src="{{asset('backend/img/avatars/1.png')}}" alt="Default Avatar" class="rounded-circle">
                            @endif
                        @else
                            <img id="avatar" src="{{asset('backend/img/avatars/1.png')}}" alt="Default Avatar" class="rounded-circle">
                        @endisset
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @isset($users)
                                            @if ($users->avatar)
                                                <img id="avatar" src="{{ asset($users->avatar) }}" alt="Avatar" class="rounded-circle">
                                            @else
                                                <img id="avatar" src="{{asset('backend/img/avatars/1.png')}}" alt="Default Avatar" class="rounded-circle">
                                            @endif
                                        @else
                                            <img id="avatar" src="{{asset('backend/img/avatars/1.png')}}" alt="Default Avatar" class="rounded-circle">
                                        @endisset
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    @if(Auth::check())
                                        <span class="fw-medium d-block">{{ Auth::user()->name ?? ' ' }}</span>
                                    @else
                                        <span class="fw-medium d-block">Guest</span>
                                    @endif
                                    <small class="text-muted">{{ Auth::user()->role ?? ' ' }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile.setting')}}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('system.index')}}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                        <form action="{{route('logout')}}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

