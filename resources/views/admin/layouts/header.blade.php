<header class="top-header">
    <nav class="navbar navbar-expand d-flex align-items-center justify-content-between">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">{{ __('Menu') }}</i></a>
        </div>

        <div class="card-body search-content text-center">
            <!-- <h1 style="color: #025e6e;">Codience</h1> -->
        </div>

        <ul class="navbar-nav gap-4 nav-right-links align-items-center"> <!-- زيادة gap -->
            <li class="nav-item dropdown">
                <div
                    class="dropdown-menu dropdown-notify dropdown-menu-{{ in_array(App::getLocale(), ['en', 'ru']) ? 'end' : 'start' }}  shadow">
                    <div class="notify-list"></div>
                </div>
            </li>





            <!-- اللغة -->
            <li class="nav-item dropdown me-4">
                <a href="javascript:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <i class="fas fa-globe fs-5"></i>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-{{ in_array(App::getLocale(), ['en', 'ru']) ? 'end' : 'start' }} shadow">
                    <div class="dropdown-header bg-primary text-white text-center py-2">
                        <strong>{{ __('Language') }}</strong>
                    </div>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            @if(App::getLocale() == $localeCode)
                                <i class="fas fa-check text-success"></i>
                            @endif
                            <span>{{ $properties['native'] }}</span>
                        </a>
                    @endforeach
                </div>
            </li>


            <li class="nav-item dropdown me-4"> <!-- زيادة المسافة -->
                <a href="javascript:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="{{ asset('default/logo_n.jpeg') }}" class="rounded-circle p-1 border" width="45"
                        height="45" alt="">
                </a>
                <div
                    class="dropdown-menu dropdown-user dropdown-menu-{{ in_array(App::getLocale(), ['en', 'ru']) ? 'end' : 'start' }}  shadow">
                    <a class="dropdown-item gap-2 py-2" href="javascript:;">
                        <div class="text-center">
                            <img src="{{ asset('default/logo_n.jpeg') }}" class="rounded-circle p-1 shadow mb-3"
                                width="90" height="90" alt="">
                            <h5 class="user-name mb-0 fw-bold">{{ __('Codience') }}</h5>
                        </div>
                    </a>
                    @can('profile-update')
                        <hr class="dropdown-divider">
                        <a href="{{ route('Admin.profile') }}"
                            class="dropdown-item d-flex align-items-center gap-2 py-2">{{ __('Profile') }}</a>
                    @endcan
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('Admin.logout') }}"><i
                            class="material-icons-outlined">power_settings_new</i>{{ __('Logout') }}</a>
                </div>
            </li>
        </ul>

    </nav>
</header>
