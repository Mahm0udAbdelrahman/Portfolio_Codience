@extends('admin.layouts.app')
@section('title', __('Add Customer'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12">
                    <form method="post" action="{{ route('Admin.customers.store') }}"
                        class="p-4 rounded shadow-lg bg-white" enctype="multipart/form-data">
                        @csrf

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Add New Customer') }}</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('Enter customer name') }}">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('Enter email') }}">
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Phone') }}</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="{{ __('Enter phone') }}">
                                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Address') }}</label>
                                        <input type="text" name="address" class="form-control"
                                            placeholder="{{ __('Enter address') }}">
                                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Project Name') }}</label>
                                        <input type="text" name="name_project" class="form-control"
                                            placeholder="{{ __('Enter project name') }}">
                                        @error('name_project') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Price') }}</label>
                                        <input type="text" name="price" class="form-control"
                                            placeholder="{{ __('Enter price') }}">
                                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Paid') }}</label>
                                        <input type="text" name="paid" class="form-control"
                                            placeholder="{{ __('Enter paid amount') }}">
                                        @error('paid') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Description') }}</label>
                                        <textarea name="description" rows="4" class="form-control"
                                            placeholder="{{ __('Enter description') }}"></textarea>
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
