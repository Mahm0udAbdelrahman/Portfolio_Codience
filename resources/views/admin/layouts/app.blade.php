<!doctype html>
<html lang="ar" data-bs-theme="light_mode" dir="rtl">

<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codience | @yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('default/logo_n.jpeg') }}" type="image/png">
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
