@extends('admin.layouts.app')
@section('title', __('Customer Details'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-8 offset-xl-2">

                    <div class="card border-0 shadow-lg">
                        <div class="card-header bg-primary text-white rounded-top">
                            <h5 class="mb-0">{{ __('Customer Details') }}</h5>
                        </div>

                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>{{ __('Name') }}:</strong>
                                    <p class="text-muted">{{ $customer->name }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{ __('Email') }}:</strong>
                                    <p class="text-muted">{{ $customer->email ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>{{ __('Phone') }}:</strong>
                                    <p class="text-muted">{{ $customer->phone ?? '-' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{ __('Address') }}:</strong>
                                    <p class="text-muted">{{ $customer->address ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>{{ __('Project Name') }}:</strong>
                                    <p class="text-muted">{{ $customer->name_project ?? '-' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{ __('Price') }}:</strong>
                                    <p class="text-muted">{{ $customer->price ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>{{ __('Paid') }}:</strong>
                                    <p class="text-muted">{{ $customer->paid ?? '-' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>{{ __('Created At') }}:</strong>
                                    <p class="text-muted">{{ $customer->created_at->format('Y-m-d H:i') }}</p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <strong>{{ __('Description') }}:</strong>
                                <p class="text-muted">{{ $customer->description ?? '-' }}</p>
                            </div>

                        </div>

                        <div class="card-footer bg-light rounded-bottom d-flex justify-content-between">

                            <a href="{{ route('Admin.customers.edit', $customer) }}" class="btn btn-warning">
                                {{ __('Edit') }}
                            </a>

                            <a href="{{ route('Admin.customers.index') }}" class="btn btn-secondary">
                                {{ __('Back') }}
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
