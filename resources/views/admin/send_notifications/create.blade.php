@extends('admin.layouts.app')
@section('title', __('Send Notifications'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 col-md-10">
                    <div class="card border-0 shadow-lg rounded-3">
                        <div class="card-header bg-gradient text-white d-flex justify-content-between align-items-center"
                            style="background: linear-gradient(90deg, #007bff, #0056b3);">
                            <h5 class="mb-0">
                                <i class="bi bi-bell me-2"></i>{{ __('Add Send Notification') }}
                            </h5>
                        </div>

                        <form method="POST" action="{{ route('Admin.send_notifications.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="card-body p-4">
                                <div class="row g-4">

                                    {{-- Type --}}
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">{{ __('Recipient Type') }}</label>
                                        <select name="topic" class="form-select" required>
                                            <option value="">{{ __('Select Type') }}</option>
                                            <option value="patient">{{ __('Patient') }}</option>
                                            <option value="nursing">{{ __('Nursing') }}</option>
                                        </select>
                                        @error('topic')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="title_en" class="form-label fw-semibold">{{ __('Title (English)') }}</label>
                                        <input type="text" name="title_en" id="title_en" class="form-control"
                                            placeholder="{{ __('Enter English Title') }}">
                                        @error('title_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="title_ar" class="form-label fw-semibold">{{ __('Title (Arabic)') }}</label>
                                        <input type="text" name="title_ar" id="title_ar" class="form-control text-end"
                                            dir="rtl" placeholder="{{ __('Enter Arabic Title') }}">
                                        @error('title_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="body_en" class="form-label fw-semibold">{{ __('Body (English)') }}</label>
                                        <textarea name="body_en" id="body_en" class="form-control" rows="4" placeholder="{{ __('Enter English Message') }}"></textarea>
                                        @error('body_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="body_ar" class="form-label fw-semibold">{{ __('Body (Arabic)') }}</label>
                                        <textarea name="body_ar" id="body_ar" class="form-control text-end" dir="rtl" rows="4" placeholder="{{ __('Enter Arabic Message') }}"></textarea>
                                        @error('body_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer bg-light text-end rounded-bottom py-3">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="bi bi-send me-1"></i> {{ __('Send Notification') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
