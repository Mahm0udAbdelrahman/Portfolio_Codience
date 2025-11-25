@extends('admin.auth.layouts.app')
@section('title', 'Login')
@section('content')
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root" style="min-height: 100vh; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid justify-content-center align-items-center" style="min-height: 100vh; padding: 2rem;">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-fluid text-center text-lg-start px-4 mb-8 mb-lg-0" style="max-width: 500px;">
                <!--begin::Content-->
                <div class="flex-center flex-column text-white">
                    <!--begin::Logo-->
                    {{-- لو عايز تحط لوجو --}}
                    {{-- <img src="{{ asset('auth-assets/media/logo-light.png') }}" alt="Logo" style="max-width: 180px; margin-bottom: 2rem;"> --}}
                    <!--end::Logo-->

                    <!--begin::Title-->
                    <h2 class="fw-bold mb-4" style="font-family: 'Poppins', sans-serif; font-size: 2.5rem; letter-spacing: 0.05em;">
                        مرحباً بك في <span style="color: #ffd166;">Codience</span>
                    </h2>
                    <!--end::Title-->

                    <!--begin::Description-->
                   <p style="font-size: 1.1rem; line-height: 1.6;">
    شركة برمجيات متخصصة في تطوير حلول رقمية مبتكرة تُسهل على المؤسسات والأفراد تحقيق أهدافهم التقنية بكفاءة عالية، مع التركيز على جودة الأداء وتجربة المستخدم، ودعم مستمر لتطوير الأعمال الرقمية.
</p>

                    <!--end::Description-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->

            <!--begin::Body-->
            <div class="bg-white rounded-4 shadow-lg p-8" style="max-width: 420px; width: 100%;">
                <!--begin::Form-->
                <form class="form w-100" action="{{ route('loginAction') }}" method="post" novalidate>
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-9">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bold mb-3" style="font-family: 'Poppins', sans-serif;">تسجيل الدخول</h1>
                        <!--end::Title-->
                        <!--begin::Subtitle-->
                        <div class="text-muted fs-6">مرحباً بعودتك إلى نظام Codience</div>
                        <!--end::Subtitle-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Email-->
                    <div class="mb-6">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg border border-gray-300 rounded" placeholder="البريد الإلكتروني" required style="font-size: 1rem; padding: 1rem;">
                        @error('email')
                            <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Email-->

                    <!--begin::Password-->
                    <div class="mb-6">
                        <input type="password" name="password" class="form-control form-control-lg border border-gray-300 rounded" placeholder="كلمة المرور" autocomplete="off" required style="font-size: 1rem; padding: 1rem;">
                        @error('password')
                            <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--end::Password-->

                    <!--begin::Submit button-->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg" style="background: #264653; border: none; font-weight: 600; padding: 1rem; transition: background-color 0.3s;">
                            تسجيل الدخول
                        </button>
                    </div>
                    <!--end::Submit button-->

                    <!-- Optional: forgot password link -->
                    {{--
                    <div class="text-center">
                        <a href="#" class="link-primary fs-6 fw-semibold">نسيت كلمة المرور؟</a>
                    </div>
                    --}}
                </form>
                <!--end::Form-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>

    <!-- Optional: Add Google Fonts and some custom CSS -->
    <style>
        body, input, button {
            font-family: 'Poppins', sans-serif;
        }
        input:focus {
            border-color: #ffd166 !important;
            box-shadow: 0 0 5px #ffd166 !important;
        }
        button.btn-primary:hover {
            background-color: #1b3646 !important;
        }
    </style>
@endsection
