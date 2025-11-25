@extends('admin.layouts.app')
@section('title', __('Add User'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12">
                    <form method="post" action="{{ route('Admin.users.store') }}" class="p-4 rounded shadow-lg bg-white" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Add User') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="full_name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="full_name" id="full_name" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('full_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="{{ __('Enter the user email') }}">
                                    </div>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                        <input type="number" name="phone_number" id="phone_number" class="form-control"
                                            placeholder="{{ __('Enter the user Phone Number') }}">
                                    </div>
                                    @error('phone_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <div class="col-md-6">
                                        <label for="whats_app" class="form-label">{{ __('Whats App') }}</label>
                                        <input type="text" name="whats_app" id="whats_app" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('whats_app')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address_ar" class="form-label">{{ __('Address Ar') }}</label>
                                        <input type="text" name="address_ar" id="address_ar" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('address_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="address_en" class="form-label">{{ __('Address En') }}</label>
                                        <input type="text" name="address_en" id="address_en" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('address_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-6">
                                        <label for="lat" class="form-label">{{ __('lat') }}</label>
                                        <input type="number" name="lat" id="lat" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('lat')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lng" class="form-label">{{ __('lng') }}</label>
                                        <input type="numeric" name="lng" id="lng" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('lng')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-6">
                                        <label for="location" class="form-label">{{ __('location') }}</label>
                                        <input type="text" name="location" id="location" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="work_hours" class="form-label">{{ __('work_hours') }}</label>
                                        <input type="numeric" name="work_hours" id="work_hours" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('work_hours')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label for="experience_years"
                                            class="form-label">{{ __('experience_years') }}</label>
                                        <input type="number" name="experience_years" id="experience_years"
                                            class="form-control" placeholder="{{ __('Enter the user name') }}">
                                        @error('experience_years')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="description_ar" class="form-label">{{ __('description_ar') }}</label>
                                        <textarea class="form-control" name="description_ar" placeholder="{{ __('Enter the description ar') }}"></textarea>
                                        @error('description_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="description_en" class="form-label">{{ __('description_en') }}</label>
                                        <textarea class="form-control" name="description_en" placeholder="{{ __('Enter the description en') }}"></textarea>
                                        @error('description_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>




                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="" selected>{{ __('Choose Gender...') }}</option>
                                            <option value="male">{{ __('Male') }}</option>
                                            <option value="female">{{ __('Female') }}</option>
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="is_active" class="form-label">{{ __('is_active') }}</label>
                                        <select class="form-select" name="is_active" id="is_active">
                                            <option value="" selected>{{ __('Choose is_active...') }}</option>
                                            <option value="0">{{ __('UnActive') }}</option>
                                            <option value="1">{{ __('Active') }}</option>
                                        </select>
                                        @error('is_active')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="is_uenifed" class="form-label">{{ __('is_uenifed') }}</label>
                                        <select class="form-select" name="is_uenifed" id="is_uenifed">
                                            <option value="" selected>{{ __('Choose is_uenifed...') }}</option>
                                            <option value="0">{{ __('No') }}</option>
                                            <option value="1">{{ __('Yes') }}</option>
                                        </select>
                                        @error('is_uenifed')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>





                                    <div class="col-md-6">
                                        <label for="image" class="form-label">{{ __('Image') }}</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            placeholder="{{ __('Enter the user image') }}">
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror




                                    <div class="col-md-6">
                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="{{ __('Enter the user password') }}">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror



                                    <div class="col-md-6">
                                        <label for="role_id" class="form-label">{{ __('Role') }}</label>
                                        <select class="form-select" name="role_id" id="role_id">
                                            <option value="" selected>{{ __('Choose the user role') }}</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role_id')
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
    <!--end main wrapper-->
@endsection
