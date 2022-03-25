<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/media/logos/favicon.png') }}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link href="{{ asset('admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--Scripts-->
    <script src="{{ asset('admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.bundle.js') }}"></script>
    <!--end::Page Custom Javascript-->
</head>

<body id="kt_body" class="bg-dark">
    {{-- <h1>Testing</h1> --}}
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
    <!--end::Main-->
</body>

</html>