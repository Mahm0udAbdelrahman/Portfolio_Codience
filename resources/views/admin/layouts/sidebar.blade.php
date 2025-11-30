<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header text-center py-3">
        <a href="{{ route('Admin.home') }}">
            <img src="{{ asset('public/default/logo_n.jpeg') }}" alt="Logo"
                style="width: 50px; height: auto; display: inline-block;">
        </a>
        <div class="sidebar-close mt-2">
            <span class="material-icons-outlined">{{ __('close') }}</span>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="metismenu" id="sidenav">

            <li>
                <a href="{{ route('Admin.home') }}" @if (Route::currentRouteName() == 'Admin.home') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-home"></i></div>
                    <div class="menu-title">{{ __('Home') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.categories.index') }}" @if (Route::currentRouteName() == 'Admin.categories.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-tags"></i></div>
                    <div class="menu-title">{{ __('Categories') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.solutions.index') }}" @if (Route::currentRouteName() == 'Admin.solutions.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-lightbulb"></i></div>
                    <div class="menu-title">{{ __('Solutions') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.how_we_works.index') }}"
                    @if (Route::currentRouteName() == 'Admin.how_we_works.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-cogs"></i></div>
                    <div class="menu-title">{{ __('How We Works') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.fqas.index') }}" @if (Route::currentRouteName() == 'Admin.fqas.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-question-circle"></i></div>
                    <div class="menu-title">{{ __('FAQs') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.setting.show') }}" @if (Route::currentRouteName() == 'Admin.setting.show') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-cog"></i></div>
                    <div class="menu-title">{{ __('Settings') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.about_us.show') }}" @if (Route::currentRouteName() == 'Admin.about_us.show') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-info-circle"></i></div>
                    <div class="menu-title">{{ __('About Us') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.tags.index') }}" @if (Route::currentRouteName() == 'Admin.tags.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-tags"></i></div>
                    <div class="menu-title">{{ __('Tags') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.projects.index') }}" @if (Route::currentRouteName() == 'Admin.projects.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-briefcase"></i></div>
                    <div class="menu-title">{{ __('Projects') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.contact_us.index') }}"
                    @if (Route::currentRouteName() == 'Admin.contact_us.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-envelope"></i></div>
                    <div class="menu-title">{{ __('Contact Us') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.visits.index') }}"
                    @if (Route::currentRouteName() == 'Admin.visits.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-envelope"></i></div>
                    <div class="menu-title">{{ __('Visits') }}</div>
                </a>
            </li>

            <li>
                <a href="{{ route('Admin.customers.index') }}"
                    @if (Route::currentRouteName() == 'Admin.customers.index') class="active" @endif>
                    <div class="parent-icon"><i class="fas fa-envelope"></i></div>
                    <div class="menu-title">{{ __('Customer') }}</div>
                </a>
            </li>

        </ul>
    </div>
</aside>
