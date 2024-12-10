
@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('backend/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>
    <meta name="description" content="" />

    @if (!empty($systemSetting->favicon))
        <link rel="icon" type="image/x-icon" href="{{ $systemSetting->favicon ?? ' ' }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/favicon/banner--frame.png') }}">
    @endif

    @include('backend.partials.styles')

    {{-- Helpers --}}
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('backend.partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('backend.partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('backend.partials.scripts')
</body>

</html>
