@extends('admin.layouts.app')
@section('title', __('Edit Solution'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <form method="post" action="{{ route('Admin.solutions.update', $solution) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Edit Solution') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    {{-- Logo --}}
                                    <div class="col-md-6">
                                        <label for="logo" class="form-label">{{ __('Logo') }}</label>
                                        <input type="file" name="logo" id="logo" class="form-control">

                                        {{-- Show Old Logo --}}
                                        @if ($solution->logo)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/solutions/' . $solution->logo) }}"
                                                    alt="logo" width="80" height="80" class="rounded border">
                                            </div>
                                        @endif

                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Title Arabic --}}
                                    <div class="col-md-6">
                                        <label for="title_ar" class="form-label">{{ __('Title AR') }}</label>
                                        <input type="text" name="title_ar" id="title_ar" class="form-control"
                                            value="{{ $solution->title_ar }}" placeholder="{{ __('Enter Arabic title') }}">
                                        @error('title_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Title English --}}
                                    <div class="col-md-6">
                                        <label for="title_en" class="form-label">{{ __('Title EN') }}</label>
                                        <input type="text" name="title_en" id="title_en" class="form-control"
                                            value="{{ $solution->title_en }}" placeholder="{{ __('Enter English title') }}">
                                        @error('title_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Description Arabic --}}
                                    <div class="col-md-6">
                                        <label for="description_ar" class="form-label">{{ __('Description AR') }}</label>
                                        <textarea name="description_ar" id="description_ar" rows="3" class="form-control"
                                            placeholder="{{ __('Enter Arabic description') }}">{{ $solution->description_ar }}</textarea>
                                        @error('description_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Description English --}}
                                    <div class="col-md-6">
                                        <label for="description_en" class="form-label">{{ __('Description EN') }}</label>
                                        <textarea name="description_en" id="description_en" rows="3" class="form-control"
                                            placeholder="{{ __('Enter English description') }}">{{ $solution->description_en }}</textarea>
                                        @error('description_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">{{ __('Status') }}</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" disabled>{{ __('Choose status...') }}</option>
                                            <option value="inactive" @selected($solution->status == 'inactive')>{{ __('UnActive') }}</option>
                                            <option value="active" @selected($solution->status == 'active')>{{ __('Active') }}</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

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
