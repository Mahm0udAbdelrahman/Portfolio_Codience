@extends('admin.layouts.app')
@section('title', __('Solution'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="add d-flex justify-content-end p-2">

                            <a href="{{ route('Admin.solutions.create') }}" class="btn btn-primary"> <i
                                    class="fas fa-add"></i> {{ __('Add Solution') }}</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Logo') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Active') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $how_we_work)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td><img src="{{ asset('storage/solutions/' . $how_we_work->logo) }}"
                                                        alt="logo" style="max-width: 80px;"></td>

                                                <td>{{ $how_we_work->{'title_' . app()->getLocale()} }}</td>
                                                <td>{{ $how_we_work->{'description_' . app()->getLocale()} }}</td>
                                                <td>{{ $how_we_work->status }}</td>

                                                <td>

                                                    <button type="button" class="btn btn-danger w-25 delete-country-btn"
                                                        data-id="{{ $how_we_work->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    <a href="{{ route('Admin.solutions.edit', $how_we_work) }}"
                                                        class="btn btn-info w-25"><i class="fas fa-edit"></i></a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">{{ __('Nothing!') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div style="padding:5px;direction: ltr;">
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
            document.querySelectorAll('.delete-country-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let id = this.getAttribute('data-id');

                    Swal.fire({
                        title: '{{ __('Are you sure?') }}',
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
                            form.action = '{{ url('/admin/solutions') }}/' + id;
                            form.method = 'POST';
                            form.style.display = 'none';

                            let csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = '{{ csrf_token() }}';

                            let methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'DELETE';

                            form.appendChild(csrfInput);
                            form.appendChild(methodInput);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
