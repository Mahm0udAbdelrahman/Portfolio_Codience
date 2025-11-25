@extends('admin.layouts.app')
@section('title', __('Add FQA'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12">
                    <form method="post" action="{{ route('Admin.fqas.store') }}"
                        class="p-4 rounded shadow-lg bg-white" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Add a FQA') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">



                                    {{-- Question Arabic --}}
                                    <div class="col-md-6">
                                        <label for="question_ar" class="form-label">{{ __('Question AR') }}</label>
                                        <input type="text" name="question_ar" id="question_ar" class="form-control"
                                            placeholder="{{ __('Enter the Arabic Question') }}">
                                        @error('question_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Question English --}}
                                    <div class="col-md-6">
                                        <label for="question_en" class="form-label">{{ __('Question EN') }}</label>
                                        <input type="text" name="question_en" id="question_en" class="form-control"
                                            placeholder="{{ __('Enter the English Question') }}">
                                        @error('question_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Answer Arabic --}}
                                    <div class="col-md-6">
                                        <label for="answer_ar" class="form-label">{{ __('Answer AR') }}</label>
                                        <textarea name="answer_ar" id="answer_ar" rows="3" class="form-control"
                                            placeholder="{{ __('Enter Arabic Answer') }}"></textarea>
                                        @error('answer_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Answer English --}}
                                    <div class="col-md-6">
                                        <label for="answer_en" class="form-label">{{ __('Answer EN') }}</label>
                                        <textarea name="answer_en" id="answer_en" rows="3" class="form-control"
                                            placeholder="{{ __('Enter English Answer') }}"></textarea>
                                        @error('answer_en')
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
