<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            {{ env('APP_NAME') }}
            @if(isset($breadcrums))
                {{ " | ".$breadcrums[0]['name'] }}
            @endif
        </title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('admin/media/logos/favicon.png') }}" />
		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
		<!-- Styles -->
		<link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--begin::Page Vendor Stylesheets(used by this page)-->
        <link href="{{ asset('admin/plugins/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/toastr/toastr.css') }}" rel="stylesheet"/>
        <link href="{{ asset('admin/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet" />
        <!--end::Page Vendor Stylesheets-->
		<!--Scripts-->
		<script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
        <!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('admin/plugins/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <script src="{{ asset('admin/plugins/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/popper.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/lightbox/js/lightbox.js') }}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->

		<script src="{{ asset('admin/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('admin/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('admin/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('admin/js/custom/modals/upgrade-plan.js') }}"></script>
		<!--end::Page Custom Javascript-->
    </head>
    <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">

        <!--begin::Toast-->
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <script type="text/javascript">
                    $(document).ready( function () {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
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
                        toastr["error"]("{{ $error }}");
                    });
                </script>
            @endforeach
        @endif

        @if(Session::has('success'))
            @php
                $SessionType = "success";
                $SessionMessage = Session::get('success');
            @endphp
        @elseif(Session::has('error'))
            @php
                $SessionType = "error";
                $SessionMessage = Session::get('error');
            @endphp
        @elseif(Session::has('info'))
            @php
                $SessionType = "info";
                $SessionMessage = Session::get('info');
            @endphp
        @elseif(Session::has('warning'))
            @php
                $SessionType = "warning";
                $SessionMessage = Session::get('warning');
            @endphp
        @endif

        @if(isset($SessionType) && isset($SessionMessage))
            <script type="text/javascript">
                $(document).ready( function () {
                        toastr.options = {
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                        }
                        toastr["{{ $SessionType }}"]("{{ $SessionMessage }}");
                    });
                
            </script>
        @endif
        <!--end::Toast-->

        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                
                @extends('layouts.left-side')

                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                    @extends('layouts.header')
                    
                    @yield('content')

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->
        <!-- @extends('layouts.right-side') -->

        @extends('layouts.modals')

        @extends('layouts.footer')
        
        <!--end::Main-->

        <script type="text/javascript">
            $(document).ready( function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('#datatable').DataTable();
                $('#datatable_modal').DataTable();
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                });
            });
        </script>
    </body>
</html>
