@extends('admin.layouts.app')
@section('title', __('Home'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">

 
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card rounded-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                                    <h5 class="mb-0">
                                        <i class="fa fa-user text-primary"></i> {{ __('Number of Users') }}
                                    </h5>
                                </div>
                                <h2 class="mt-4 fw-bold">{{ $user }}</h2>
                            </div>
                        </div>
                    </div>










            </div>
        </div>
    </main>
@endsection
