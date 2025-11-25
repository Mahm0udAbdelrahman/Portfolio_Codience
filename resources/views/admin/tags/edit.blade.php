@extends('admin.layouts.app')
@section('title', __('Edit Tag'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <form method="post" action="{{ route('Admin.tags.update', $tag) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Edit Tag') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">






                                    {{-- Name Arabic --}}
                                    <div class="col-md-6">
                                        <label for="name_ar" class="form-label">{{ __('Name AR') }}</label>
                                        <input type="text" name="name_ar" id="name_ar" class="form-control"
                                            value="{{ $tag->name_ar }}" placeholder="{{ __('Enter Arabic Name') }}">
                                        @error('name_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Name English --}}
                                    <div class="col-md-6">
                                        <label for="name_en" class="form-label">{{ __('Name EN') }}</label>
                                        <input type="text" name="name_en" id="name_en" class="form-control"
                                            value="{{ $tag->name_en }}" placeholder="{{ __('Enter English Name') }}">
                                        @error('name_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">{{ __('Status') }}</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" disabled>{{ __('Choose status...') }}</option>
                                            <option value="inactive" @selected($tag->status == 'inactive')>{{ __('UnActive') }}
                                            </option>
                                            <option value="active" @selected($tag->status == 'active')>{{ __('Active') }}
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
