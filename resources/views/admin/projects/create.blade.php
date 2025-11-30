@extends('admin.layouts.app')
@section('title', __('Add Project'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-10 offset-xl-1">
                    <form method="post" action="{{ route('Admin.projects.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card border-0">
                            <div class="card-header bg-primary text-white rounded-top">
                                <h5 class="mb-0">{{ __('Add New Project') }}</h5>
                            </div>

                            <div class="card-body">
                                <div class="row g-3">


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Category') }}</label>
                                        <select name="category_id" class="form-select">
                                            <option disabled selected>{{ __('Choose Category') }}</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->{'name_' . app()->getLocale()} }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Title AR') }}</label>
                                        <input type="text" name="title_ar" class="form-control">
                                        @error('title_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Title EN') }}</label>
                                        <input type="text" name="title_en" class="form-control">
                                        @error('title_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Description AR') }}</label>
                                        <textarea name="description_ar" rows="2" class="form-control"></textarea>
                                        @error('description_ar')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Description EN') }}</label>
                                        <textarea name="description_en" rows="2" class="form-control"></textarea>
                                        @error('description_en')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Project Overview AR') }}</label>
                                        <textarea name="project_overview_ar" rows="3" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Project Overview EN') }}</label>
                                        <textarea name="project_overview_en" rows="3" class="form-control"></textarea>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Challenge AR') }}</label>
                                        <textarea name="challenga_ar" rows="3" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Challenge EN') }}</label>
                                        <textarea name="challenga_en" rows="3" class="form-control"></textarea>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Solution AR') }}</label>
                                        <textarea name="solution_ar" rows="3" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('Solution EN') }}</label>
                                        <textarea name="solution_en" rows="3" class="form-control"></textarea>
                                    </div>


                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Tags') }}</label>
                                        <select name="tag_id[]" class="form-select" multiple>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <label class="form-label">{{ __('Project Images') }}</label>
                                        <input type="file" name="images[]" class="form-control" multiple>
                                        @error('images')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                    <div class="card mt-3">
                                        <div class="card-header bg-secondary text-white">
                                            <h6 class="mb-0">{{ __('Project Links') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="links-wrapper">
                                                @if (old('links_dynamic'))
                                                    @foreach (old('links_dynamic') as $link)
                                                        <div class="row g-2 mb-2 link-item">
                                                            <div class="col-md-12">
                                                                <input type="url" name="links_dynamic[]"
                                                                    class="form-control"
                                                                    placeholder="{{ __('Enter Link URL') }}"
                                                                    value="{{ $link }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row g-2 mb-2 link-item">
                                                        <div class="col-md-12">
                                                            <input type="url" name="links_dynamic[]"
                                                                class="form-control"
                                                                placeholder="{{ __('Enter Link URL') }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <button type="button" class="btn btn-success mt-2" id="add-link-btn">
                                                + {{ __('Add Link') }}
                                            </button>
                                        </div>
                                    </div>


                                    <div class="card mt-3">
                                        <div class="card-header bg-secondary text-white">
                                            <h6 class="mb-0">{{ __('Key Features') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="features-wrapper">
                                                @if (isset($project))
                                                    @foreach ($project->features as $feature)
                                                        <div class="row g-2 mb-2 feature-item">
                                                            <div class="col-md-6">
                                                                <input type="text" name="features_en[]"
                                                                    class="form-control"
                                                                    placeholder="{{ __('Feature Name English') }}"
                                                                    value="{{ $feature->name_en }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="features_ar[]"
                                                                    class="form-control"
                                                                    placeholder="{{ __('Feature Name Arabic') }}"
                                                                    value="{{ $feature->name_ar }}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <div class="row g-2 mb-2 feature-item">
                                                    <div class="col-md-6">
                                                        <input type="text" name="features_en[]" class="form-control"
                                                            placeholder="{{ __('Feature Name English') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" name="features_ar[]" class="form-control"
                                                            placeholder="{{ __('Feature Name Arabic') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-success mt-2" id="add-feature-btn">
                                                + {{ __('Add Feature') }}
                                            </button>
                                        </div>
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
    <script>
        document.getElementById('add-feature-btn').addEventListener('click', function() {
            let wrapper = document.getElementById('features-wrapper');
            let element = document.querySelector('.feature-item').cloneNode(true);
            element.querySelectorAll('input').forEach(input => input.value = "");
            wrapper.appendChild(element);
        });

        document.getElementById('add-link-btn').addEventListener('click', function() {
            let wrapper = document.getElementById('links-wrapper');
            let element = document.querySelector('.link-item').cloneNode(true);
            element.querySelector('input').value = "";
            wrapper.appendChild(element);
        });
    </script>
@endsection
