@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @if (!empty($systemSetting->favicon))
        <link rel="icon" type="image/x-icon" href="{{ $systemSetting->favicon ?? ' ' }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/favicon/banner--frame.png') }}">
    @endif

    @include('frontend.partials.styles')

</head>

<body>
<!-- ====================== navbar start hare ====================== -->
@include('frontend.partials.navbar')
<!-- ====================== navbar End hare ====================== -->

<!-- ====================== Main start hare ====================== -->
<main>

    @yield('content')

</main>
<!-- ====================== Main End hare ====================== -->

<!-- ====================== Footer start hare ====================== -->
@include('frontend.partials.footer')
<!-- ====================== Footer End hare ====================== -->



@include('frontend.partials.scripts')
</body>

</html>
