@extends('admin.layouts.app')
@section('title', __('Projects'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div class="card">

                        <div class="add d-flex justify-content-end p-2">
                            <a href="{{ route('Admin.projects.create') }}" class="btn btn-primary">
                                <i class="fas fa-add"></i> {{ __('Add Project') }}
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('Images') }}</th>
                                            <th>{{ __('Links') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($data as $project)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>

                                                {{-- Title According to Locale --}}
                                                <td>{{ $project->{'title_' . app()->getLocale()} }}</td>

                                                {{-- Category --}}
                                                <td>
                                                    {{ $project->category?->{'name_' . app()->getLocale()} ?? '---' }}
                                                </td>

                                                {{-- Images Count --}}
                                                <td><span class="badge bg-info">{{ $project->images->count() }}</span></td>

                                                {{-- Links Count --}}
                                                <td><span class="badge bg-success">{{ $project->links->count() }}</span></td>

                                                <td class="d-flex justify-content-center gap-2">

                                                    {{-- DELETE --}}
                                                    <button type="button" class="btn btn-danger delete-btn"
                                                        data-id="{{ $project->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    {{-- EDIT --}}
                                                    <a href="{{ route('Admin.projects.edit', $project->id) }}"
                                                        class="btn btn-info"><i class="fas fa-edit"></i></a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">{{ __('Nothing!') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div style="padding:5px;direction:ltr;">
                                    {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end main wrapper-->
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');

                    Swal.fire({
                        question: '{{ __('Are you sure?') }}',
                        text: "{{ __('Do you want to delete this item') }}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#DC143C',
                        cancelButtonColor: '#696969',
                        cancelButtonText: "{{ __('Cancel') }}",
                        confirmButtonText: '{{ __('Yes, delete it!') }}'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let form = document.createElement('form');
                            form.action = '{{ url('/admin/projects') }}/' + id;
                            form.method = 'POST';
                            form.style.display = 'none';

                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;

                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
