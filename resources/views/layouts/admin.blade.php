<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('public/admin/assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/admin/assets/') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        td { font-size: 13px; }
        .colored-toast.swal2-icon-success { background-color: #a5dc86 !important; }
        .colored-toast.swal2-icon-error { background-color: #f27474 !important; }
        .colored-toast.swal2-icon-warning { background-color: #f8bb86 !important; }
        .colored-toast.swal2-icon-info { background-color: #3fc3ee !important; }
        .colored-toast.swal2-icon-question { background-color: #87adbd !important; }
        .colored-toast .swal2-title { color: white; }
        .colored-toast .swal2-close { color: white; }
        .colored-toast .swal2-html-container { color: white; }
    </style>

    <!-- Helpers -->
    <script src="{{ asset('public/admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/config.js') }}"></script>
    <script src="{{ asset('public/assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart.js') }}"></script>
    @livewireStyles
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('layouts.admin.sidebar')
            <div class="layout-page">
                @include('layouts.admin.navbar')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                </div>
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/dataTables.js') }}"></script>
    <script src="{{ asset('public/assets/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('public/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('public/admin/assets/js/ui-toasts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Idle Timeout Script -->
    <script>
        $(document).ready(function() {
            var idleTime = 0;
            var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

            $(this).mousemove(function(e) { idleTime = 0; });
            $(this).keypress(function(e) { idleTime = 0; });

            function timerIncrement() {
                idleTime++;
                if (idleTime > 119) { // 120 minutes
                    Swal.fire({
                        icon: 'warning',
                        title: 'Session Timeout',
                        text: 'You have been idle for more than 120 minutes. Please refresh the page or log in again.',
                        showConfirmButton: true,
                        confirmButtonText: 'Ok'
                    });
                    clearInterval(idleInterval); // Stop the timer
                }
            }
        });

        toastr.options = { "progressBar": true, "positionClass": "toast-top-right" };

        window.addEventListener('success', event => { toastr.success(event.detail.message); });
        window.addEventListener('warning', event => { toastr.warning(event.detail.message); });
        window.addEventListener('error', event => { toastr.error(event.detail.message); });

        @if (Session::has('message'))
        toastr.success("{{ Session::get('message') }}");
        @endif
    </script>

    @stack('scripts')
    @livewireScripts
    @yield('script')
</body>
</html>
