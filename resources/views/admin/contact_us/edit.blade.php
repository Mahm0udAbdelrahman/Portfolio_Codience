@extends('admin.layouts.app')
@section('title', __('Edit Contact Us'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <form method="post" action="{{ route('Admin.contact_us.update', $contact_us) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Edit Contact Us') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $contact_us->name }}" placeholder="{{ __('Enter the name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ $contact_us->email }}" placeholder="{{ __('Enter the Email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="subject" class="form-label">{{ __('Subject') }}</label>
                                        <input type="text" name="subject" id="subject" class="form-control"
                                            value="{{ $contact_us->subject }}" placeholder="{{ __('Enter the Subject') }}">
                                    </div>
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror



                                    <div class="col-md-6">
                                        <label for="message" class="form-label">{{ __('message') }}</label>
                                        <input type="text" name="message" id="message" class="form-control"
                                            value="{{ $contact_us->message }}" placeholder="{{ __('Enter the message') }}">
                                    </div>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror




                                </div>
                            </div>
                            <div class="card-footer text-end bg-light rounded-bottom">
                                <button type="submit" class="btn btn-primary px-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
