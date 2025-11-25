@extends('admin.layouts.app')
@section('title', __('Edit Category'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <form method="post" action="{{ route('Admin.categories.update', $category) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Edit Category') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label for="name" class="form-label">{{ __('Name Ar') }}</label>
                                        <input type="file" name="logo" id="logo" class="form-control"
                                            value="{{ $category->logo }}" placeholder="{{ __('Enter the Logo') }}">
                                        @error('logo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">{{ __('Name Ar') }}</label>
                                        <input type="text" name="name_ar" id="name_ar" class="form-control"
                                            value="{{ $category->name_ar }}"
                                            placeholder="{{ __('Enter the category name') }}">
                                        @error('name_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">{{ __('Name En') }}</label>
                                        <input type="text" name="name_en" id="name_en" class="form-control"
                                            value="{{ $category->name_en }}"
                                            placeholder="{{ __('Enter the category email') }}">
                                    </div>
                                    @error('name_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    <div class="col-md-6">
                                        <label for="status" class="form-label">{{ __('status') }}</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" selected>{{ __('Choose status...') }}</option>
                                            <option value="inactive" @selected($category->status == 'inactive')>{{ __('UnActive') }}
                                            </option>
                                            <option value="active" @selected($category->status == 'active')>{{ __('Active') }}
                                            </option>
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
