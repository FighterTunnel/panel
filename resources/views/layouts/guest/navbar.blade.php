<nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark fixed-top">
    <div class="container px-5">
        <a class="text-white fs-10" href="{{ route('home') }}">
            <img src="{{ asset('images/' . getSettings('site_logo')) }}" alt="logo" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i data-feather="menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-lg-5">
                @foreach ($menus as $menu)
                    @if ($menu->children->count() > 0)
                        <li class="nav-item dropdown dropdown-xl no-caret">
                            <a class="nav-link text-white dropdown-toggle" id="navbarDropdown{{ $menu->name }}"
                                role="button" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ $menu->name }}
                                <i class="fas fa-chevron-right dropdown-arrow"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up me-lg-n25 me-xl-n15"
                                aria-labelledby="navbarDropdownDemos">
                                <div class="row g-0">
                                    <div class="col-lg-7 p-lg-5">
                                        @foreach ($menu->children as $submenu)
                                            @if ($submenu->menu_id == $menu->id)
                                                @if ($submenu->slug == 'premium-account-panel')
                                                    <a class="dropdown-item py-2" href="https://webpanel.d3ti2021.my.id">
                                                        {{ $submenu->name }}</a>
                                                    <div class="dropdown-divider m-0"></div>
                                                @else
                                                    <a class="dropdown-item py-2"
                                                        href="{{ url($submenu->slug) }}">{{ $submenu->name }}</a>
                                                    <div class="dropdown-divider m-0"></div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                    @elseif ($menu->menu_id == null)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url($menu->slug) }}">{{ $menu->name }}</a>
                        </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-repeat mt-1 mr-2">
                            <polyline points="17 1 21 5 17 9"></polyline>
                            <path d="M3 11V9a4 4 0 0 1 4-4h14"></path>
                            <polyline points="7 23 3 19 7 15"></polyline>
                            <path d="M21 13v2a4 4 0 0 1-4 4H3"></path>
                        </svg>
                        <span id="clock2"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
