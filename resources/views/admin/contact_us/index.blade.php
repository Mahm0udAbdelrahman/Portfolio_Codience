@extends('admin.layouts.app')
@section('title',__('Categories'))

@section('content')
<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <div class="row mb-5">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="add d-flex justify-content-end p-2">

                        <a href="{{ route('Admin.categories.create') }}" class="btn btn-primary"> <i class="fas fa-add"></i> {{ __('Add categories') }}</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Subject') }}</th>
                                        <th>{{ __('Message') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data as $contact_us)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $contact_us->name }}</td>
                                        <td>{{ $contact_us->email }}</td>
                                        <td>{{ $contact_us->subject }}</td>
                                        <td>{{ $contact_us->message }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger w-25 delete-country-btn" data-id="{{ $contact_us->id }}">
                                                <i class="far fa-trash-alt"></i>
                                            </button>

                                            <a href="{{ route('Admin.contact_us.edit',$contact_us) }}" class="btn btn-info w-25"><i class="fas fa-edit"></i></a>

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
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.delete-country-btn').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');

                Swal.fire({
                    title: '{{ __("Are you sure?") }}',
                    text: "{{ __('Do you want to delete this item') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#DC143C',
                    cancelButtonColor: '#696969',
                    cancelButtonText: "{{ __('Cancel') }}",
                    confirmButtonText: '{{ __("Yes, delete it!") }}'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.createElement('form');
                        form.action = '{{ url("/admin/contact_us") }}/' + id;
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
