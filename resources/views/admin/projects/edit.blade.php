@extends('admin.layouts.app')

@section('title', __('Edit Project'))

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Edit Project') }}</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('Admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')

                            {{-- Category --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Category') }}</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected':'' }}>
                                            {{ $category->name_en }} - {{ $category->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Titles --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Title (AR)') }}</label>
                                    <input type="text" class="form-control" name="title_ar" value="{{ $project->title_ar }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Title (EN)') }}</label>
                                    <input type="text" class="form-control" name="title_en" value="{{ $project->title_en }}">
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Description (AR)') }}</label>
                                    <textarea class="form-control" name="description_ar" rows="4">{{ $project->description_ar }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Description (EN)') }}</label>
                                    <textarea class="form-control" name="description_en" rows="4">{{ $project->description_en }}</textarea>
                                </div>
                            </div>

                            {{-- Overview --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Overview (AR)') }}</label>
                                    <textarea class="form-control" name="project_overview_ar" rows="4">{{ $project->project_overview_ar }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Overview (EN)') }}</label>
                                    <textarea class="form-control" name="project_overview_en" rows="4">{{ $project->project_overview_en }}</textarea>
                                </div>
                            </div>

                            {{-- Challenge --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Challenge (AR)') }}</label>
                                    <textarea class="form-control" name="challenga_ar" rows="4">{{ $project->challenga_ar }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Challenge (EN)') }}</label>
                                    <textarea class="form-control" name="challenga_en" rows="4">{{ $project->challenga_en }}</textarea>
                                </div>
                            </div>

                            {{-- Solution --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Solution (AR)') }}</label>
                                    <textarea class="form-control" name="solution_ar" rows="4">{{ $project->solution_ar }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">{{ __('Solution (EN)') }}</label>
                                    <textarea class="form-control" name="solution_en" rows="4">{{ $project->solution_en }}</textarea>
                                </div>
                            </div>

                            {{-- Tags --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Tags') }}</label>
                                <select name="tags[]" class="form-control" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $project->tags->pluck('tag_id')->toArray()) ? 'selected':'' }}>
                                            {{ $tag->name_en }} - {{ $tag->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Project Links --}}
                           {{-- Project Links (dynamic like Features) --}}
<div class="card mt-3">
    <div class="card-header bg-secondary text-white">
        <h6 class="mb-0">{{ __('Project Links') }}</h6>
    </div>
    <div class="card-body">
        <div id="links-wrapper">
            @if(isset($project) && $project->links->count())
                @foreach($project->links as $link)
                <div class="row g-2 mb-2 link-item">
                    <div class="col-md-12">
                        <input type="url" name="links[]" class="form-control" placeholder="{{ __('Enter Link URL') }}" value="{{ $link->link }}">
                    </div>
                </div>
                @endforeach
            @else
                <div class="row g-2 mb-2 link-item">
                    <div class="col-md-12">
                        <input type="url" name="links[]" class="form-control" placeholder="{{ __('Enter Link URL') }}">
                    </div>
                </div>
            @endif
        </div>

        <button type="button" class="btn btn-success mt-2" id="add-link-btn">
            + {{ __('Add Link') }}
        </button>
    </div>
</div>


                            {{-- Images --}}
                            <div class="mb-3">
                                <label class="form-label">{{ __('Images') }}</label>
                                <input type="file" name="images[]" multiple class="form-control">

                                <div class="row mt-3">
                                    @foreach($project->images as $image)
                                        <div class="col-md-2 text-center">
                                            <img src="{{ asset('storage/projects/'.$image->image) }}" class="img-fluid mb-2 rounded">
                                            {{--  <a href="{{ route('Admin.projects.deleteImage', $image->id) }}" class="btn btn-danger btn-sm">Delete</a>  --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="card mt-3">
    <div class="card-header bg-secondary text-white">
        <h6 class="mb-0">{{ __('Key Features') }}</h6>
    </div>
    <div class="card-body">
        <div id="features-wrapper">
            @if(isset($project))
                @foreach($project->features as $feature)
                    <div class="row g-2 mb-2 feature-item">
                        <div class="col-md-6">
                            <input type="text" name="features_en[]" class="form-control"
                                   placeholder="{{ __('Feature Name English') }}"
                                   value="{{ $feature->name_en }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="features_ar[]" class="form-control"
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


                            <button class="btn btn-primary w-100">{{ __('Update') }}</button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    function addLink() {
        let html = `<input type="url" name="links[]" class="form-control mb-2">`;
        document.getElementById('linkArea').insertAdjacentHTML('beforeend', html);
    }


</script>
<script>
document.getElementById('add-feature-btn').addEventListener('click', function () {
    let wrapper = document.getElementById('features-wrapper');
    let element = document.querySelector('.feature-item').cloneNode(true);
    element.querySelectorAll('input').forEach(input => input.value = "");
    wrapper.appendChild(element);
});

document.getElementById('add-link-btn').addEventListener('click', function () {
    let wrapper = document.getElementById('links-wrapper');
    let element = document.querySelector('.link-item').cloneNode(true);
    element.querySelector('input').value = "";
    wrapper.appendChild(element);
});
</script>
@endsection
