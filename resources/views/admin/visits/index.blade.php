@extends('admin.layouts.app')

@section('title', 'Visits')

@section('content')
<main class="main-wrapper">
    <div class="main-content">
        <!-- Breadcrumb & Page Header -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3 text-dark fw-bold fs-5">{{ __('لوحة التحكم') }}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="fa fa-home text-secondary"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('زيارات الموقع') }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Title Block -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="mb-0 fw-bold text-dark"><i class="fa fa-chart-line text-primary me-2"></i>{{ __('إحصائيات زيارات الموقع') }}</h3>
        </div>

        <!-- Metric Cards Row -->
        <div class="row g-3 mb-4">
            <!-- Card 1: Total Visits -->
            <div class="col-12 col-md-4">
                <div class="card rounded-4 border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-1 text-secondary fw-semibold fs-6">{{ __('إجمالي الزيارات') }}</p>
                                <h2 class="mb-0 fw-bold text-dark">{{ number_format($totalVisits) }}</h2>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-light-primary text-primary p-3">
                                <i class="fa fa-eye fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2: Top Country -->
            <div class="col-12 col-md-4">
                <div class="card rounded-4 border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-1 text-secondary fw-semibold fs-6">{{ __('أكثر الدول زيارة') }}</p>
                                <h2 class="mb-0 fw-bold text-dark fs-4 text-truncate" style="max-width: 180px;">{{ $visitsByCountry->first()?->country ?? __('غير معروف') }}</h2>
                                <span class="text-success small fw-semibold"><i class="fa fa-arrow-up"></i> {{ $visitsByCountry->first()?->total ?? 0 }} {{ __('زيارة') }}</span>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-light-success text-success p-3">
                                <i class="fa fa-globe fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Top Browser -->
            <div class="col-12 col-md-4">
                <div class="card rounded-4 border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <p class="mb-1 text-secondary fw-semibold fs-6">{{ __('أكثر المتصفحات استخداماً') }}</p>
                                <h2 class="mb-0 fw-bold text-dark fs-4 text-truncate" style="max-width: 180px;">{{ $visitsByBrowser->first()?->browser ?? __('غير معروف') }}</h2>
                                <span class="text-info small fw-semibold"><i class="fa fa-laptop"></i> {{ $visitsByBrowser->first()?->total ?? 0 }} {{ __('زيارة') }}</span>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-light-info text-info p-3">
                                <i class="fa fa-chrome fs-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row g-4 mb-4">
            <!-- Chart 1: Countries -->
            <div class="col-12 col-lg-6">
                <div class="card rounded-4 border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                            <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ __('توزيع الزوار حسب الدولة') }}</h5>
                        </div>
                        <div class="chart-container" style="position: relative; height: 320px;">
                            <canvas id="countryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart 2: Browsers -->
            <div class="col-12 col-lg-6">
                <div class="card rounded-4 border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                            <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-window-maximize text-success me-2"></i>{{ __('توزيع الزوار حسب المتصفح') }}</h5>
                        </div>
                        <div class="chart-container" style="position: relative; height: 320px;">
                            <canvas id="browserChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Visited Pages Table Card -->
        <div class="card rounded-4 border-0 shadow-sm mb-5">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                    <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-file-alt text-danger me-2"></i>{{ __('أكثر الصفحات زيارة') }}</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0 text-center">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 80px;">#</th>
                                <th class="text-start">{{ __('مسار الصفحة') }}</th>
                                <th style="width: 250px;">{{ __('الرابط الكامل') }}</th>
                                <th style="width: 150px;">{{ __('عدد الزيارات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($visitsByPage as $page)
                                @php
                                    $urlParts = parse_url($page->page);
                                    $displayPath = ($urlParts['path'] ?? '/') . (isset($urlParts['query']) ? '?' . $urlParts['query'] : '');
                                @endphp
                                <tr>
                                    <td><span class="badge bg-light-secondary text-secondary rounded-circle px-2 py-2 fs-6 fw-bold" style="width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">{{ $loop->iteration }}</span></td>
                                    <td class="text-start fw-semibold text-primary">
                                        <code>{{ $displayPath }}</code>
                                    </td>
                                    <td>
                                        <a href="{{ $page->page }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fa fa-external-link-alt me-1"></i> {{ __('زيارة الرابط') }}</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-light-success text-success rounded-pill px-3 py-2 fs-6"><i class="fa fa-fire me-1 text-danger"></i> {{ $page->total }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted">{{ __('لا توجد زيارات مسجلة') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Styling for Widgets Icons and colors -->
<style>
    .bg-light-primary {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }
    .bg-light-success {
        background-color: rgba(25, 135, 84, 0.1) !important;
    }
    .bg-light-info {
        background-color: rgba(13, 202, 240, 0.1) !important;
    }
    .bg-light-secondary {
        background-color: rgba(108, 117, 125, 0.1) !important;
    }
    .widgets-icons-2 {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    code {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 0.9em;
        background-color: rgba(13, 110, 253, 0.05);
        padding: 4px 8px;
        border-radius: 4px;
        word-break: break-all;
    }
</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // بيانات الدول
        const countries = @json($visitsByCountry->pluck('country'));
        const countryCounts = @json($visitsByCountry->pluck('total'));

        const ctxCountry = document.getElementById('countryChart').getContext('2d');
        const countryChart = new Chart(ctxCountry, {
            type: 'doughnut',
            data: {
                labels: countries,
                datasets: [{
                    data: countryCounts,
                    backgroundColor: [
                        '#0d6efd', '#198754', '#ffc107', '#0dcaf0', '#6f42c1', '#fd7e14', '#20c997', '#dc3545', '#adb5bd', '#6c757d'
                    ],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: {
                                size: 12
                            },
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // بيانات المتصفحات
        const browsers = @json($visitsByBrowser->pluck('browser'));
        const browserCounts = @json($visitsByBrowser->pluck('total'));

        const ctxBrowser = document.getElementById('browserChart').getContext('2d');
        const browserChart = new Chart(ctxBrowser, {
            type: 'bar',
            data: {
                labels: browsers,
                datasets: [{
                    label: '{{ __('عدد الزيارات') }}',
                    data: browserCounts,
                    backgroundColor: 'rgba(25, 135, 84, 0.85)',
                    borderColor: '#198754',
                    borderWidth: 1,
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            precision: 0
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
