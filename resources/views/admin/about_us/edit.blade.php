@extends('admin.layouts.app')

@section('title', __('Edit About Us'))

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
                            <h4 class="mb-0">{{ __('Edit About Us') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('Admin.about_us.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title Arabic -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Title (Arabic)') }}</label>
                                    <input type="text" name="title_ar" class="form-control"
                                        value="{{ old('title_ar', $about_us->title_ar ?? '') }}"
                                        placeholder="{{ __('Enter Title in Arabic') }}">
                                </div>

                                <!-- Title English -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Title (English)') }}</label>
                                    <input type="text" name="title_en" class="form-control"
                                        value="{{ old('title_en', $about_us->title_en ?? '') }}"
                                        placeholder="{{ __('Enter Title in English') }}">
                                </div>

                                <!-- Description Arabic -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Description (Arabic)') }}</label>
                                    <textarea name="description_ar" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Description in Arabic') }}">{{ old('description_ar', $about_us->description_ar ?? '') }}</textarea>
                                </div>

                                <!-- Description English -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Description (English)') }}</label>
                                    <textarea name="description_en" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Description in English') }}">{{ old('description_en', $about_us->description_en ?? '') }}</textarea>
                                </div>

                                <!-- Image -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Image') }}</label>
                                    <input type="file" name="image" class="form-control" placeholder="{{ __('Image') }}">
                                    @if(!empty($about_us->image))
                                    <img src="{{ asset('storage/' . $about_us->image) }}" alt="Image" class="img-thumbnail mt-2" style="max-height: 150px;">
                                    @endif
                                </div>

                                <!-- Sub Title One Arabic -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Title One (Arabic)') }}</label>
                                    <input type="text" name="sub_title_one_ar" class="form-control"
                                        value="{{ old('sub_title_one_ar', $about_us->sub_title_one_ar ?? '') }}"
                                        placeholder="{{ __('Enter Sub Title One in Arabic') }}">
                                </div>

                                <!-- Sub Title One English -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Title One (English)') }}</label>
                                    <input type="text" name="sub_title_one_en" class="form-control"
                                        value="{{ old('sub_title_one_en', $about_us->sub_title_one_en ?? '') }}"
                                        placeholder="{{ __('Enter Sub Title One in English') }}">
                                </div>

                                <!-- Sub Description One Arabic -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Description One (Arabic)') }}</label>
                                    <textarea name="sub_description_one_ar" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Sub Description One in Arabic') }}">{{ old('sub_description_one_ar', $about_us->sub_description_one_ar ?? '') }}</textarea>
                                </div>

                                <!-- Sub Description One English -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Description One (English)') }}</label>
                                    <textarea name="sub_description_one_en" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Sub Description One in English') }}">{{ old('sub_description_one_en', $about_us->sub_description_one_en ?? '') }}</textarea>
                                </div>

                                <!-- Sub Title Two Arabic -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Title Two (Arabic)') }}</label>
                                    <input type="text" name="sub_title_two_ar" class="form-control"
                                        value="{{ old('sub_title_two_ar', $about_us->sub_title_two_ar ?? '') }}"
                                        placeholder="{{ __('Enter Sub Title Two in Arabic') }}">
                                </div>

                                <!-- Sub Title Two English -->
                                <div class="col-md-6 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Title Two (English)') }}</label>
                                    <input type="text" name="sub_title_two_en" class="form-control"
                                        value="{{ old('sub_title_two_en', $about_us->sub_title_two_en ?? '') }}"
                                        placeholder="{{ __('Enter Sub Title Two in English') }}">
                                </div>

                                <!-- Sub Description Two Arabic -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Description Two (Arabic)') }}</label>
                                    <textarea name="sub_description_two_ar" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Sub Description Two in Arabic') }}">{{ old('sub_description_two_ar', $about_us->sub_description_two_ar ?? '') }}</textarea>
                                </div>

                                <!-- Sub Description Two English -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-semibold">{{ __('Sub Description Two (English)') }}</label>
                                    <textarea name="sub_description_two_en" class="form-control" rows="3"
                                        placeholder="{{ __('Enter Sub Description Two in English') }}">{{ old('sub_description_two_en', $about_us->sub_description_two_en ?? '') }}</textarea>
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
