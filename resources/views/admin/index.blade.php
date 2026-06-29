@extends('admin.layouts.app')
@section('title', __('Home'))

@section('content')
    <main class="main-wrapper">
        <div class="main-content">
            
            <!-- Custom CSS Styles -->
            <style>
                .welcome-banner {
                    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
                    color: #ffffff;
                    border-radius: 16px;
                    padding: 30px;
                    margin-bottom: 30px;
                    box-shadow: 0 10px 20px rgba(59, 130, 246, 0.15);
                    position: relative;
                    overflow: hidden;
                }
                .welcome-banner::after {
                    content: '';
                    position: absolute;
                    top: -50px;
                    right: -50px;
                    width: 150px;
                    height: 150px;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 50%;
                }
                .welcome-banner::before {
                    content: '';
                    position: absolute;
                    bottom: -30px;
                    left: 10%;
                    width: 80px;
                    height: 80px;
                    background: rgba(255, 255, 255, 0.05);
                    border-radius: 50%;
                }
                .stat-card {
                    border: none;
                    border-radius: 16px;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
                    overflow: hidden;
                    position: relative;
                }
                .stat-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
                }
                .stat-card-overlay {
                    position: absolute;
                    bottom: -10px;
                    right: -10px;
                    font-size: 5rem;
                    opacity: 0.06;
                    pointer-events: none;
                }
                .gradient-blue {
                    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                    color: white;
                }
                .gradient-green {
                    background: linear-gradient(135deg, #10b981 0%, #047857 100%);
                    color: white;
                }
                .gradient-purple {
                    background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
                    color: white;
                }
                .gradient-indigo {
                    background: linear-gradient(135deg, #6366f1 0%, #4338ca 100%);
                    color: white;
                }
                .gradient-warning {
                    background: linear-gradient(135deg, #f59e0b 0%, #b45309 100%);
                    color: white;
                }
                .gradient-danger {
                    background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%);
                    color: white;
                }
                .gradient-teal {
                    background: linear-gradient(135deg, #14b8a6 0%, #0f766e 100%);
                    color: white;
                }
                .gradient-dark {
                    background: linear-gradient(135deg, #4b5563 0%, #1f2937 100%);
                    color: white;
                }
                .dashboard-title {
                    font-size: 1.1rem;
                    font-weight: 600;
                    margin-bottom: 20px;
                    color: #4b5563;
                }
                .activity-card {
                    border: none;
                    border-radius: 16px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
                }
                .activity-table th {
                    font-weight: 600;
                    color: #4b5563;
                    border-bottom-width: 2px;
                }
                .activity-table td {
                    vertical-align: middle;
                }
            </style>

            <!-- Welcome Banner -->
            <div class="welcome-banner d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold mb-2">{{ __('أهلاً بك مجدداً في لوحة تحكم Codience! 👋') }}</h2>
                    <p class="mb-0 opacity-75">{{ __('إليك نظرة عامة سريعة على إحصائيات الموقع وبيانات العملاء.') }}</p>
                </div>
            </div>

            <!-- Primary Statistics Row -->
            <div class="row g-4 mb-4">
                
                <!-- Total Customers -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-blue h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('إجمالي العملاء') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-users fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $customers_count }}</h2>
                            <small class="opacity-75"><i class="fa fa-user-plus me-1"></i> {{ __('كل العملاء المسجلين') }}</small>
                            <i class="fa fa-users stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- Interested Customers -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-green h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('العملاء المهتمين') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-user-check fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $customers_interested }}</h2>
                            @if($customers_count > 0)
                                <small class="opacity-75"><i class="fa fa-chart-line me-1"></i> {{ round(($customers_interested / $customers_count) * 100) }}% {{ __('نسبة الاهتمام') }}</small>
                            @else
                                <small class="opacity-75"><i class="fa fa-chart-line me-1"></i> 0%</small>
                            @endif
                            <i class="fa fa-user-check stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Projects -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-purple h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('المشاريع') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-briefcase fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $projects_count }}</h2>
                            <small class="opacity-75"><i class="fa fa-folder-open me-1"></i> {{ __('المشاريع المعروضة بالموقع') }}</small>
                            <i class="fa fa-briefcase stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- Received Messages -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-indigo h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('الرسائل المستلمة') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-envelope fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $contact_us_count }}</h2>
                            <small class="opacity-75"><i class="fa fa-paper-plane me-1"></i> {{ __('رسائل تواصل معنا') }}</small>
                            <i class="fa fa-envelope stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Secondary / Breakdown Statistics Row -->
            <div class="row g-4 mb-5">
                
                <!-- Neutral Customers -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-warning h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('عملاء نص ونص') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-user-clock fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $customers_neutral }}</h2>
                            <small class="opacity-75"><i class="fa fa-clock me-1"></i> {{ __('عملاء لم يقرروا بعد') }}</small>
                            <i class="fa fa-user-clock stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- Not Interested Customers -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-danger h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('عملاء غير مهتمين') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-user-times fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $customers_not_interested }}</h2>
                            <small class="opacity-75"><i class="fa fa-times-circle me-1"></i> {{ __('عملاء غير مهتمين بالخدمات') }}</small>
                            <i class="fa fa-user-times stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- Site Visits -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-teal h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('زيارات الموقع') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-eye fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $visits_count }}</h2>
                            <small class="opacity-75"><i class="fa fa-line-chart me-1"></i> {{ __('إجمالي الزيارات المسجلة') }}</small>
                            <i class="fa fa-eye stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

                <!-- System Admins -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card stat-card gradient-dark h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase mb-0 opacity-75">{{ __('المدراء المسؤولين') }}</h6>
                                <span class="bg-white bg-opacity-25 rounded p-2"><i class="fa fa-user-shield fa-lg"></i></span>
                            </div>
                            <h2 class="fw-bold mb-1">{{ $users_count }}</h2>
                            <small class="opacity-75"><i class="fa fa-lock me-1"></i> {{ __('حسابات لوحة التحكم') }}</small>
                            <i class="fa fa-user-shield stat-card-overlay"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Recent Activity Tables Row -->
            <div class="row g-4">
                
                <!-- Recent Customers Column -->
                <div class="col-12 col-xl-6">
                    <div class="card activity-card h-100">
                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center p-4">
                            <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-users text-primary me-2"></i> {{ __('أحدث العملاء المضافين') }}</h5>
                            <a href="{{ route('Admin.customers.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">{{ __('عرض الكل') }}</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table activity-table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">{{ __('الاسم') }}</th>
                                            <th>{{ __('المشروع') }}</th>
                                            <th>{{ __('حالة الاهتمام') }}</th>
                                            <th class="pe-4 text-end">{{ __('الإجراء') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recent_customers as $customer)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                                            <i class="fa fa-user"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">{{ $customer->name }}</h6>
                                                            <small class="text-muted">{{ $customer->phone }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $customer->name_project ?? '-' }}</td>
                                                <td>
                                                    @if($customer->status == 'interested')
                                                        <span class="badge bg-success">{{ __('Interested') }}</span>
                                                    @elseif($customer->status == 'not_interested')
                                                        <span class="badge bg-danger">{{ __('Not Interested') }}</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">{{ __('Neutral') }}</span>
                                                    @endif
                                                </td>
                                                <td class="pe-4 text-end">
                                                    <a href="{{ route('Admin.customers.show', $customer) }}" class="btn btn-sm btn-light rounded-circle p-2"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-muted">{{ __('لا يوجد عملاء مضافين حالياً') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Contact Messages Column -->
                <div class="col-12 col-xl-6">
                    <div class="card activity-card h-100">
                        <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center p-4">
                            <h5 class="mb-0 fw-bold text-dark"><i class="fa fa-envelope text-primary me-2"></i> {{ __('أحدث الرسائل المستلمة') }}</h5>
                            <a href="{{ route('Admin.contact_us.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">{{ __('عرض الكل') }}</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table activity-table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="ps-4">{{ __('المرسل') }}</th>
                                            <th>{{ __('الموضوع') }}</th>
                                            <th>{{ __('التاريخ') }}</th>
                                            <th class="pe-4 text-end">{{ __('الإجراء') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recent_messages as $message)
                                            <tr>
                                                <td class="ps-4">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="bg-indigo bg-opacity-10 text-indigo rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                                            <i class="fa fa-envelope-open"></i>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-0 fw-bold">{{ $message->name }}</h6>
                                                            <small class="text-muted">{{ $message->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="text-truncate d-inline-block" style="max-width: 150px;">{{ $message->subject }}</span></td>
                                                <td>{{ $message->created_at ? $message->created_at->format('Y-m-d') : '-' }}</td>
                                                <td class="pe-4 text-end">
                                                    <a href="{{ route('Admin.contact_us.edit', $message->id) }}" class="btn btn-sm btn-light rounded-circle p-2"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4 text-muted">{{ __('لا يوجد رسائل مستلمة حالياً') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>
@endsection
