@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-wide customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('backend/') }}"
    data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />
{{--Favicon--}}
    @if (!empty($systemSetting->favicon))
        <link rel="icon" type="image/x-icon" href="{{ $systemSetting->favicon ?? ' ' }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/logo/logo.png') }}">
    @endif

    @include('auth.partials.styles')

    <!-- Helpers -->
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('backend/js/config.js') }}"></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
           @yield('content')
        </div>
    </div>
</div>

<!-- / Content -->

@include('auth.partials.scripts')

</body>
</html>
