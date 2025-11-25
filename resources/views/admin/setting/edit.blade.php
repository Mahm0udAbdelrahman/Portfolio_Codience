@extends('admin.layouts.app')

@section('title', __('Edit Setting'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ __('Success Message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="{{ __('Close') }}"></button>
                            </div>
                        @endif

                        <div class="card shadow-lg rounded-3">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">{{ __('Edit Setting') }}</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('Admin.setting.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Company Name') }}</label>
                                        <input type="text"
                                            value="{{ old('name_company', $setting->name_company ?? '') }}"
                                            name="name_company" class="form-control"
                                            placeholder="{{ __('Enter Company Name') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Logo') }}</label>
                                        <input type="file" value="{{ old('logo', $setting->logo ?? '') }}" name="logo"
                                            class="form-control" placeholder="{{ __('logo') }}">
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Image') }}</label>
                                        <input type="file" value="{{ old('image', $setting->image ?? '') }}"
                                            name="image" class="form-control" placeholder="{{ __('image') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Title (Arabic)') }}</label>
                                        <input type="text" value="{{ old('title_ar', $setting->title_ar ?? '') }}"
                                            name="title_ar" class="form-control"
                                            placeholder="{{ __('Enter Title in Arabic') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Title (English)') }}</label>
                                        <input type="text" value="{{ old('title_en', $setting->title_en ?? '') }}"
                                            name="title_en" class="form-control"
                                            placeholder="{{ __('Enter Title in English') }}">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="fw-semibold">{{ __('Description (Arabic)') }}</label>
                                        <textarea name="description_ar" class="form-control" rows="3"
                                            placeholder="{{ __('Enter Description in Arabic') }}">{{ old('description_ar', $setting->description_ar ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="fw-semibold">{{ __('Description (English)') }}</label>
                                        <textarea name="description_en" class="form-control" rows="3"
                                            placeholder="{{ __('Enter Description in English') }}">{{ old('description_en', $setting->description_en ?? '') }}</textarea>
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label class="fw-semibold">{{ __('Description Footer (Arabic)') }}</label>
                                        <textarea name="description_footer_ar" class="form-control" rows="3"
                                            placeholder="{{ __('Enter Description in Arabic') }}">{{ old('description_footer_ar', $setting->description_footer_ar ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="fw-semibold">{{ __('Description Footer (English)') }}</label>
                                        <textarea name="description_footer_en" class="form-control" rows="3"
                                            placeholder="{{ __('Enter Description in English') }}">{{ old('description_footer_en', $setting->description_footer_en ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Address (Arabic)') }}</label>
                                        <input type="text" value="{{ old('address_ar', $setting->address_ar ?? '') }}"
                                            name="address_ar" class="form-control"
                                            placeholder="{{ __('Enter Address in Arabic') }}">
                                    </div>



                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Address (English)') }}</label>
                                        <input type="text" value="{{ old('address_en', $setting->address_en ?? '') }}"
                                            name="address_en" class="form-control"
                                            placeholder="{{ __('Enter Address in English') }}">
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Email') }}</label>
                                        <input type="email" value="{{ old('email', $setting->email ?? '') }}"
                                            name="email" class="form-control" placeholder="{{ __('Enter Email') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Phone') }}</label>
                                        <input type="text" value="{{ old('phone', $setting->phone ?? '') }}"
                                            name="phone" class="form-control" placeholder="{{ __('Enter Phone') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Twitter') }}</label>
                                        <input type="text" value="{{ old('twitter', $setting->twitter ?? '') }}"
                                            name="twitter" class="form-control"
                                            placeholder="{{ __('Enter Twitter URL') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Facebook') }}</label>
                                        <input type="text" value="{{ old('facebook', $setting->facebook ?? '') }}"
                                            name="facebook" class="form-control"
                                            placeholder="{{ __('Enter Facebook URL') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Instagram') }}</label>
                                        <input type="text" value="{{ old('instagram', $setting->instagram ?? '') }}"
                                            name="instagram" class="form-control"
                                            placeholder="{{ __('Enter Instagram URL') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Linkedin') }}</label>
                                        <input type="text" value="{{ old('linkedin', $setting->linkedin ?? '') }}"
                                            name="linkedin" class="form-control"
                                            placeholder="{{ __('Enter Linkedin URL') }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="fw-semibold">{{ __('Whatsapp') }}</label>
                                        <input type="text" value="{{ old('whatsapp', $setting->whatsapp ?? '') }}"
                                            name="whatsapp" class="form-control"
                                            placeholder="{{ __('Enter Whatsapp Number or URL') }}">
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
