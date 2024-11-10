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
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/fonts/boxicons.css') }}" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('public/admin/assets/css/demo.css') }}" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />


        <!-- DataTable CSS -->

        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/css/pages/page-auth.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

        <style>
            .colored-toast.swal2-icon-success {
                background-color: #a5dc86 !important;
            }

            .colored-toast.swal2-icon-error {
                background-color: #f27474 !important;
            }

            .colored-toast.swal2-icon-warning {
                background-color: #f8bb86 !important;
            }

            .colored-toast.swal2-icon-info {
                background-color: #3fc3ee !important;
            }

            .colored-toast.swal2-icon-question {
                background-color: #87adbd !important;
            }

            .colored-toast .swal2-title {
                color: white;
            }

            .colored-toast .swal2-close {
                color: white;
            }

            .colored-toast .swal2-html-container {
                color: white;
            }
        </style>

        <!-- Helpers -->
        <script src="{{ asset('public/admin/assets/vendor/js/helpers.js') }}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js') }} in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('public/admin/assets/js/config.js') }}"></script>
        <script src="{{ asset('public/assets/js/sweetalert2@11.js') }}"></script>

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <div id="app">
            <div>
                @yield('content')
            </div>
        </div>
        <!-- Core JS -->

        <script src="{{ asset('public/assets/js/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/dataTables.js') }}"></script>
        <script src="{{ asset('public/assets/js/dataTables.bootstrap5.js') }}"></script>
        <!-- build:js assets/vendor/js/core.js') }} -->
        <script src="{{ asset('public/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('public/admin/assets/vendor/libs/popper/popper.js') }}"></script>
        <script src="{{ asset('public/admin/assets/vendor/js/bootstrap.js') }}"></script>
        <script src="{{ asset('public/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('public/admin/assets/vendor/js/menu.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('public/admin/assets/js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function(){
                toastr.options = {
                    "progressBar": true,
                    "positionClass": "toast-top-right"
                }
            });

            window.addEventListener('success', event => {
                toastr.success(event.detail.message);
            });

            window.addEventListener('warning', event => {
                toastr.warning(event.detail.message);
            });

            window.addEventListener('error', event => {
                toastr.error(event.detail.message);
            });
        </script>
        @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-top-right"
            }
            toastr.success("{{ Session::get('message') }}");
        </script>
        @endif

        @stack('scripts')

        @livewireScripts
        @include('sweetalert::alert')
    </body>
</html>
