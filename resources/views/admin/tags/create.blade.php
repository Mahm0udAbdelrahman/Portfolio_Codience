@extends('admin.layouts.app')
@section('title', __('Add Tag'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12">
                    <form method="post" action="{{ route('Admin.tags.store') }}"
                        class="p-4 rounded shadow-lg bg-white" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Add a Tag') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">

                                    {{-- Name Arabic --}}
                                    <div class="col-md-6">
                                        <label for="name_ar" class="form-label">{{ __('Name AR') }}</label>
                                        <input type="text" name="name_ar" id="name_ar" class="form-control"
                                            placeholder="{{ __('Enter the Arabic name') }}">
                                        @error('name_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Name English --}}
                                    <div class="col-md-6">
                                        <label for="name_en" class="form-label">{{ __('Name EN') }}</label>
                                        <input type="text" name="name_en" id="name_en" class="form-control"
                                            placeholder="{{ __('Enter the English name') }}">
                                        @error('name_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                    {{-- Status --}}
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">{{ __('Status') }}</label>
                                        <select class="form-select" name="status" id="status">
                                            <option value="" selected>{{ __('Choose status...') }}</option>
                                            <option value="inactive">{{ __('UnActive') }}</option>
                                            <option value="active">{{ __('Active') }}</option>
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
