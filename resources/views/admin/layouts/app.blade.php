<!doctype html>
<html lang="ar" data-bs-theme="light_mode" dir="rtl">

<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codience | @yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('logo/logo.png') }}" type="image/png">
    <!-- loader-->
    <link href="{{ asset('dash-assets/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('dash-assets/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('dash-assets/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash-assets/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash-assets/assets/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dash-assets/assets/plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('dash-assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('dash-assets/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- toastr -->
    <link href="{{ asset('layout/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('dash-assets/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    @if(App::getLocale() == 'ar')
    <link href="{{ asset('dash-assets/sass/main.css') }}" rel="stylesheet">

    <link href="{{ asset('dash-assets/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('dash-assets/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('dash-assets/sass/responsive.css') }}" rel="stylesheet">
    @endif
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    @if(App::getLocale() == 'en'|| App::getLocale() == 'ru')
    <link href="{{ asset('dash-assets/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('dash-assets/assets/css/responsive.css') }}" rel="stylesheet">
    @endif
    @stack('css')

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('mazad');
        channel.bind('my-event', function(data) {
            // console.log(data);
            $(".notificationsIcon").load(" .notificationsIcon > *");
            $('#notificationsModal').load(" #notificationsModal > *");
        });
    </script>
    @if(App::getLocale() == 'ar')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    @endif

    <!-- Global CSS Overrides for Premium Cards and Tables -->
    <style>
        /* Card Styling Override */
        .card {
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05) !important;
            margin-bottom: 24px;
        }
        .card-header {
            background-color: transparent !important;
            border-bottom: 1px solid #f1f5f9 !important;
            padding: 20px 24px !important;
        }

        /* Table Wrapper Style */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }

        /* Table Styling Overrides */
        table.table {
            border-collapse: separate;
            border-spacing: 0;
            border: none !important;
            margin-bottom: 0;
            width: 100% !important;
        }
        table.table thead th {
            background-color: #f8fafc !important;
            color: #475569 !important;
            font-weight: 600 !important;
            text-transform: uppercase;
            font-size: 0.82rem;
            letter-spacing: 0.5px;
            padding: 16px 20px !important;
            border-bottom: 1px solid #e2e8f0 !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            text-align: center;
        }
        table.table tbody tr {
            transition: all 0.2s ease;
            background-color: #ffffff;
        }
        table.table tbody tr:hover {
            background-color: rgba(59, 130, 246, 0.04) !important;
        }
        table.table tbody td {
            padding: 16px 20px !important;
            color: #334155 !important;
            font-size: 0.88rem;
            border-bottom: 1px solid #f1f5f9 !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            vertical-align: middle;
            text-align: center;
        }

        /* Stripe Background */
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-accent-bg: rgba(248, 250, 252, 0.4) !important;
            box-shadow: none !important;
        }

        /* Action Buttons Styling */
        .table td .btn {
            border-radius: 8px !important;
            font-size: 0.85rem !important;
            transition: all 0.2s ease !important;
            border: none !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 34px !important;
            width: 34px !important;
            padding: 0 !important;
            margin: 0 4px !important;
            box-shadow: none !important;
        }
        .table td .btn-danger {
            background-color: #fee2e2 !important;
            color: #ef4444 !important;
        }
        .table td .btn-danger:hover {
            background-color: #ef4444 !important;
            color: #ffffff !important;
        }
        .table td .btn-info, .table td .btn-primary {
            background-color: #e0f2fe !important;
            color: #0284c7 !important;
        }
        .table td .btn-info:hover, .table td .btn-primary:hover {
            background-color: #0284c7 !important;
            color: #ffffff !important;
        }
        .table td .btn-success {
            background-color: #dcfce7 !important;
            color: #22c55e !important;
        }
        .table td .btn-success:hover {
            background-color: #22c55e !important;
            color: #ffffff !important;
        }

        /* Form Inputs & Selects Style */
        .form-control, .form-select {
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 10px 16px !important;
            font-size: 0.9rem !important;
            transition: all 0.2s ease !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15) !important;
        }
    </style>
</head>

<body dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <!--start header-->
    @include('admin.layouts.header')
    <!--end top header-->

    <!--start sidebar-->
    @include('admin.layouts.sidebar')
<!--end sidebar-->

    @yield('content')


    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->

    <!--bootstrap js-->
    <script src="{{ asset('dash-assets/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('dash-assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('dash-assets/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- toastr -->
    <script src="{{ asset('layout/plugins/toastr/toastr.min.js') }}"></script>


    @stack('scripts')


    @if (\Session::has('message'))
        <script type="text/javascript">
            $(function() {
                toastr["{{ \Session::get('message')['type'] }}"]('{!! \Session::get('message')['text'] !!}',
                    "{{ ucfirst(\Session::get('message')['type']) }}!");
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            });
        </script>
        <?php echo \Session::forget('message'); ?>
    @endif

    @if ($errors->any())
        <script type="text/javascript">
            $(function() {
                toastr["error"]('{{ $errors->first() }}', "Error!");
            });
        </script>
    @endif
</body>

</html>
