<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    @php
        $setting = App\Models\Setting::first();
        $locales = LaravelLocalization::getSupportedLocales();
        $currentLocale = LaravelLocalization::getCurrentLocale();
    @endphp

    <a href="{{ route('web.home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
      <h1 class="sitename">{{ $setting->name_company }}</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">{{ __('Home') }}</a></li>
        <li><a href="{{ route('web.home') }}#about">{{ __('About') }}</a></li>
        <li><a href="{{ route('web.home') }}#services">{{ __('Services') }}</a></li>
        <li><a href="{{ route('web.home') }}#portfolio">{{ __('Portfolio') }}</a></li>
        <li><a href="{{ route('web.home') }}#contact">{{ __('Contact') }}</a></li>

        <!-- Dropdown اللغة -->
        <li class="dropdown">
          <a href="#">
            {{ $locales[$currentLocale]['native'] ?? $currentLocale }}
            <i class="bi bi-chevron-down toggle-dropdown"></i>
          </a>
          <ul>
            @foreach($locales as $localeCode => $properties)
              @if($localeCode != $currentLocale)
                <li>
                  <a
                    rel="alternate"
                    hreflang="{{ $localeCode }}"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                  </a>
                </li>
              @endif
            @endforeach
          </ul>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="#about">{{ __('Get Started') }}</a>
  </div>
</header>
