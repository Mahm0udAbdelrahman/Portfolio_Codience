@extends('admin.layouts.app')
@section('title', __('Customers'))

@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="add d-flex justify-content-end p-2">

                            <a href="{{ route('Admin.customers.create') }}" class="btn btn-primary"> <i class="fas fa-add"></i>
                                {{ __('Add customers') }}</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <form method="GET" action="{{ route('Admin.customers.index') }}" class="mb-4" id="filter-form">
                                    <div class="row g-3 justify-content-start text-start">
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-secondary">{{ __('Search') }}</label>
                                            <input type="text" name="search" id="search-input" value="{{ request('search') }}"
                                                class="form-control shadow-sm" placeholder="{{ __('Search by name or phone') }}" autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-secondary">{{ __('Interest Status') }}</label>
                                            <select name="status" id="status-filter" class="form-select shadow-sm">
                                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>{{ __('All Statuses') }}</option>
                                                <option value="interested" {{ request('status') == 'interested' ? 'selected' : '' }}>{{ __('Interested') }}</option>
                                                <option value="neutral" {{ request('status') == 'neutral' ? 'selected' : '' }}>{{ __('Neutral') }}</option>
                                                <option value="not_interested" {{ request('status') == 'not_interested' ? 'selected' : '' }}>{{ __('Not Interested') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <div id="customers-table-wrapper" style="position: relative;">
                                    <div id="loading-overlay" class="d-none justify-content-center align-items-center" style="position: absolute; top:0; left:0; right:0; bottom:0; background: rgba(255,255,255,0.7); z-index: 10; border-radius: 8px;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Name Project') }}</th>
                                            <th>{{ __('Price') }}</th>
                                            <th>{{ __('Paid') }}</th>
                                            <th>{{ __('Interest Status') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $customer)
                                            <tr class="
                                                @if($customer->status == 'interested') table-success
                                                @elseif($customer->status == 'not_interested') table-danger
                                                @elseif($customer->status == 'neutral') table-warning
                                                @endif
                                            ">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $customer->name }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>{{ $customer->name_project }}</td>
                                                <td>{{ $customer->price }}</td>
                                                <td>{{ $customer->paid }}</td>
                                                <td>
                                                    @if($customer->status == 'interested')
                                                        <span class="badge bg-success">{{ __('Interested') }}</span>
                                                    @elseif($customer->status == 'not_interested')
                                                        <span class="badge bg-danger">{{ __('Not Interested') }}</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">{{ __('Neutral') }}</span>
                                                    @endif
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-danger w-25 delete-country-btn"
                                                        data-id="{{ $customer->id }}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>

                                                    <a href="{{ route('Admin.customers.edit', $customer) }}"
                                                        class="btn btn-info w-25"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('Admin.customers.show', $customer) }}"
                                                        class="btn btn-success w-25"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">{{ __('Nothing!') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                    <div id="pagination-wrapper" style="padding:5px;direction: ltr;">
                                        {!! $data->withQueryString()->links('pagination::bootstrap-5') !!}
                                    </div>
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
            // Event delegation for delete buttons
            document.addEventListener('click', function(e) {
                let button = e.target.closest('.delete-country-btn');
                if (button) {
                    let id = button.getAttribute('data-id');

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
                            form.action = '{{ url('/admin/customers') }}/' + id;
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
                }
            });

            // AJAX search and filter functionality
            const filterForm = document.getElementById('filter-form');
            const searchInput = document.getElementById('search-input');
            const statusFilter = document.getElementById('status-filter');
            const tableWrapper = document.getElementById('customers-table-wrapper');

            let debounceTimer;

            function fetchCustomers(customUrl = null) {
                const loadingOverlay = document.getElementById('loading-overlay');
                if (loadingOverlay) {
                    loadingOverlay.classList.remove('d-none');
                    loadingOverlay.classList.add('d-flex');
                }
                if (tableWrapper) {
                    tableWrapper.style.opacity = '0.6';
                }

                let url;
                if (customUrl) {
                    url = customUrl;
                } else {
                    const formData = new FormData(filterForm);
                    const params = new URLSearchParams(formData);
                    // Remove empty params
                    for (const [key, value] of [...params.entries()]) {
                        if (!value) {
                            params.delete(key);
                        }
                    }
                    url = `${filterForm.action}?${params.toString()}`;
                }

                // Update browser URL
                window.history.pushState({}, '', url);

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTableWrapper = doc.getElementById('customers-table-wrapper');

                    if (newTableWrapper && tableWrapper) {
                        tableWrapper.innerHTML = newTableWrapper.innerHTML;
                    }

                    if (loadingOverlay) {
                        loadingOverlay.classList.add('d-none');
                        loadingOverlay.classList.remove('d-flex');
                    }
                    if (tableWrapper) {
                        tableWrapper.style.opacity = '1';
                    }
                })
                .catch(error => {
                    console.error('Error fetching customers:', error);
                    const lOverlay = document.getElementById('loading-overlay');
                    if (lOverlay) {
                        lOverlay.classList.add('d-none');
                        lOverlay.classList.remove('d-flex');
                    }
                    if (tableWrapper) {
                        tableWrapper.style.opacity = '1';
                    }
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => fetchCustomers(), 300);
                });
            }

            if (statusFilter) {
                statusFilter.addEventListener('change', function() {
                    fetchCustomers();
                });
            }

            // AJAX Pagination click handler
            document.addEventListener('click', function(e) {
                const pageLink = e.target.closest('#pagination-wrapper a');
                if (pageLink) {
                    e.preventDefault();
                    fetchCustomers(pageLink.href);
                    tableWrapper.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            });

            if (filterForm) {
                filterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    fetchCustomers();
                });
            }
        });
    </script>
@endpush
