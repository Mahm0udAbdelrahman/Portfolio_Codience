@extends('admin.layouts.app')
@section('title', __('Edit Customer'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">

                    <form method="post" action="{{ route('Admin.customers.update', $customer) }}">
                        @csrf
                        @method('PUT')

                        <div class="card border-0">

                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Edit Customer') }}</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $customer->name }}"
                                            placeholder="{{ __('Enter customer name') }}">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $customer->email }}"
                                            placeholder="{{ __('Enter email') }}">
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $customer->phone }}"
                                            placeholder="{{ __('Enter phone') }}">
                                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Address') }}</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $customer->address }}"
                                            placeholder="{{ __('Enter address') }}">
                                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Project Name') }}</label>
                                        <input type="text" name="name_project" class="form-control"
                                            value="{{ $customer->name_project }}"
                                            placeholder="{{ __('Enter project name') }}">
                                        @error('name_project') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Price') }}</label>
                                        <input type="text" name="price" class="form-control"
                                            value="{{ $customer->price }}"
                                            placeholder="{{ __('Enter price') }}">
                                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Paid') }}</label>
                                        <input type="text" name="paid" class="form-control"
                                            value="{{ $customer->paid }}"
                                            placeholder="{{ __('Enter paid amount') }}">
                                        @error('paid') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" rows="4" class="form-control"
                                            placeholder="{{ __('Enter description') }}">{{ $customer->description }}</textarea>
                                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
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
