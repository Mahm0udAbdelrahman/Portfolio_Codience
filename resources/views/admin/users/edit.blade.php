@extends('admin.layouts.app')
@section('title', __('Edit User'))

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="row mb-5">
            <div class="col-12 col-xl-10 offset-xl-1">
                <form method="post" action="{{ route('Admin.users.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card border-0">
                        <div class="card-header bg-primary text-white rounded-top">
                            <h5 class="mb-0">{{ __('Edit User') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $user->full_name }}"
                                        placeholder="{{ __('Enter the user name') }}">
                                    @error('full_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                                        placeholder="{{ __('Enter the user email') }}">
                                         @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>



                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                                    <input type="number" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" class="form-control"
                                        placeholder="{{ __('Enter the user Phone Number') }}">
                                </div>
                                @error('phone_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <div class="col-md-6">
                                    <label for="whats_app" class="form-label">{{ __('Whats App') }}</label>
                                    <input type="text" name="whats_app" id="whats_app" value="{{ $user->whats_app }}" class="form-control"
                                        placeholder="{{ __('Enter the user name') }}">
                                    @error('whats_app')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="address_ar" class="form-label">{{ __('Address Ar') }}</label>
                                    <input type="text" name="address_ar" id="address_ar" value="{{ $user->address_ar }}" class="form-control"
                                        placeholder="{{ __('Enter the user name') }}">
                                    @error('address_ar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="address_en" class="form-label">{{ __('Address En') }}</label>
                                    <input type="text" name="address_en" id="address_en" value="{{ $user->address_en }}" class="form-control"
                                        placeholder="{{ __('Enter the user name') }}">
                                    @error('address_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!--<div class="col-md-6">-->
                                <!--    <label for="lat" class="form-label">{{ __('lat') }}</label>-->
                                <!--    <input type="number" name="lat" id="lat" value="{{ $user->lat }}" class="form-control"-->
                                <!--        placeholder="{{ __('Enter the user name') }}">-->
                                <!--    @error('lat')-->
                                <!--        <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->
                                <!--<div class="col-md-6">-->
                                <!--    <label for="lng" class="form-label">{{ __('lng') }}</label>-->
                                <!--    <input type="number" name="lng" id="lng" value="{{ $user->lng }}" class="form-control"-->
                                <!--        placeholder="{{ __('Enter the user name') }}">-->
                                <!--    @error('lng')-->
                                <!--        <small class="text-danger">{{ $message }}</small>-->
                                <!--    @enderror-->
                                <!--</div>-->

                                 <div class="col-md-6">
                                        <label for="location" class="form-label">{{ __('location') }}</label>
                                        <input type="text" name="location" id="location" value="{{ $user->location }}" class="form-control"
                                            placeholder="{{ __('Enter the user name') }}">
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                <div class="col-md-6">
                                    <label for="work_hours" class="form-label">{{ __('work_hours') }}</label>
                                    <input type="number" name="work_hours" value="{{ $user->work_hours }}" id="work_hours" class="form-control"
                                        placeholder="{{ __('Enter the user name') }}">
                                    @error('work_hours')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="experience_years"
                                        class="form-label">{{ __('experience_years') }}</label>
                                    <input type="number" name="experience_years" id="experience_years" value="{{ $user->experience_years }}"
                                        class="form-control" placeholder="{{ __('Enter the user name') }}">
                                    @error('experience_years')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="description_ar" class="form-label">{{ __('description_ar') }}</label>
                                    <textarea class="form-control" name="description_ar"  placeholder="{{ __('Enter the description ar') }}">{{ $user->description_ar }}</textarea>
                                    @error('description_ar')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="description_en" class="form-label">{{ __('description_en') }}</label>
                                    <textarea class="form-control" name="description_en" placeholder="{{ __('Enter the description en') }}">{{ $user->description_en }}</textarea>
                                    @error('description_en')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>




                                <div class="col-md-6">
                                    <label for="gender" class="form-label">{{ __('Gender') }}</label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="" selected>{{ __('Choose Gender...') }}</option>
                                        <option value="male" @selected($user->gender == "male")>{{ __('Male') }}</option>
                                        <option value="female"  @selected($user->gender == "female")>{{ __('Female') }}</option>
                                    </select>
                                    @error('gender')
                                                <small class="text-danger">{{ $message }}</small>

                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="is_active" class="form-label">{{ __('is_active') }}</label>
                                    <select class="form-select" name="is_active" id="is_active">
                                        <option value="" selected>{{ __('Choose is_active...') }}</option>
                                        <option value="0" @selected($user->is_active == "0")>{{ __('UnActive') }}</option>
                                        <option value="1" @selected($user->is_active == "1")>{{ __('Active') }}</option>
                                    </select>
                                    @error('is_active')
                                                <small class="text-danger">{{ $message }}</small>

                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="is_house" class="form-label">{{ __('Is House') }}</label>
                                    <select class="form-select" name="is_house" id="is_house">
                                        <option value="" selected>{{ __('Choose Is House') }}</option>
                                        <option value="0" @selected($user->is_house == "0") >{{ __('No') }}</option>
                                        <option value="1" @selected($user->is_house == "1") >{{ __('Yes') }}</option>
                                    </select>
                                    @error('is_house')
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
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->roles->contains('id', $role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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
