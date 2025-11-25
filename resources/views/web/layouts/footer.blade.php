<footer id="footer" class="footer">
@php
    $setting = App\Models\Setting::first();
@endphp
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">{{ $setting->name_company }}</span>
          </a>
          <p>{{ $setting->{'description_footer_' . app()->getLocale()} }}</p>
          <div class="social-links d-flex mt-4">
            <a href="{{ $setting->twitter ?? '' }}"><i class="bi bi-twitter-x"></i></a>
            <a href="{{ $setting->facebook ?? '' }}"><i class="bi bi-facebook"></i></a>
            <a href="{{ $setting->instagram ?? '' }}"><i class="bi bi-instagram"></i></a>
            <a href="{{ $setting->linkedin ?? '' }}"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>{{ __('Useful Links') }}</h4>
          <ul>
            <li><a href="#">{{ __('Home') }}</a></li>
            <li><a href="#">{{ __('About us') }}</a></li>
            <li><a href="#">{{ __('Services') }}</a></li>
            <li><a href="#">{{ __('Terms of service') }}</a></li>
            <li><a href="#">{{ __('Privacy policy') }}</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>{{ __('Our Services') }}</h4>
          <ul>
            <li><a href="#">{{ __('Web Design') }}</a></li>
            <li><a href="#">{{ __('Web Development') }}</a></li>
            <li><a href="#">{{ __('Product Management') }}</a></li>
            <li><a href="#">{{ __('Marketing') }}</a></li>
            <li><a href="#">{{ __('Graphic Design') }}</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>{{ __('Contact Us') }}</h4>
            <p>
                {{ $setting->{'address_' . app()->getLocale()} }}<br>
            </p>
          <p class="mt-4"><strong>{{ __('Phone') }}:</strong> <span>{{ $setting->phone }}</span></p>
          <p><strong>{{ __('Email') }}:</strong> <span>{{ $setting->email }}</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© {{ __('Copyright') }} <strong class="px-1 sitename">{{ $setting->name_company }}</strong> {{ __('All Rights Reserved') }}</p>
      <div class="credits">
        {{ __('Designed by') }} <a href="https://bootstrapmade.com/">{{ $setting->name_company }}</a>
      </div>
    </div>

</footer>
