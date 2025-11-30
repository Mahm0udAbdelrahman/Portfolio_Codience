@extends('admin.layouts.app')

@section('title', 'Visits')

@section('content')
<main class="main-wrapper">
        <div class="main-content">
            <div class="row mb-5">
                <div class="col-12 col-xl-12">
                    <div class="card">
<div class="container mt-5">

    <h1 class="mb-4">لوحة التحكم - زيارات الموقع</h1>

    <div class="mb-4">
        <h3>إجمالي الزيارات: {{ $totalVisits }}</h3>
    </div>

    <div class="row">

        <div class="col-md-6 mb-4">
            <h4>توزيع الزوار حسب الدولة</h4>
            <canvas id="countryChart"></canvas>
        </div>

        <div class="col-md-6 mb-4">
            <h4>توزيع الزوار حسب المتصفح</h4>
            <canvas id="browserChart"></canvas>
        </div>

    </div>

    <div class="mb-4">
        <h4>أكثر الصفحات زيارة</h4>
        <ul class="list-group">
            @foreach ($visitsByPage as $page)
                <li class="list-group-item">
                    <a href="{{ $page->page }}" target="_blank">{{ Str::limit($page->page, 50) }}</a>
                    <span class="badge bg-primary float-end">{{ $page->total }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // بيانات الدول
    const countries = @json($visitsByCountry->pluck('country'));
    const countryCounts = @json($visitsByCountry->pluck('total'));

    const ctxCountry = document.getElementById('countryChart').getContext('2d');
    const countryChart = new Chart(ctxCountry, {
        type: 'pie',
        data: {
            labels: countries,
            datasets: [{
                label: 'الزيارات حسب الدولة',
                data: countryCounts,
                backgroundColor: [
                    '#FF6384','#36A2EB','#FFCE56','#4BC0C0','#9966FF','#FF9F40','#66FF66','#FF6666','#6666FF','#FFCC66'
                ],
            }]
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
                label: 'الزيارات حسب المتصفح',
                data: browserCounts,
                backgroundColor: '#36A2EB',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>
@endsection
