
@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

<link rel="stylesheet" href="{{ asset('backend/vendor/fonts/boxicons.css') }}" />

{{--Core CSS--}}
<link rel="stylesheet" href="{{ asset('backend/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('backend/vendor/css/theme-default.css') }}"
      class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}" />

<link rel="icon" type="image/x-icon" href="{{ $systemSetting->favicon ?? ' ' }}" />



{{--Vendors CSS--}}
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/apex-charts/apex-charts.css') }}" />

<link rel="stylesheet" href="{{ asset('backend/vendor/libs/DataTable/css/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/DataTable/css/dataTable.custom.css') }}">

{{-- Bootstrap CDN Icon --}}
<link rel="stylesheet" href="{{ asset('backend/cdn/css/bootstrap-icons2.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('backend/js/select.dataTables.min.css') }}">

<link rel="stylesheet" href="{{ asset('backend/vendor/datatable/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/vendor/datatables.net-bs4/dataTables.bootstrap4.css') }}">



{{-- dropify --}}
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<link rel="stylesheet" href="{{ asset('backend/cdn/css/dataTables.dataTables.min.css') }}">

{{--Toastr Css--}}
<link rel="stylesheet" href="{{ asset('backend/libs/toastr/toastr.css') }}">



{{-- data table --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/DataTable/css/jquery.dataTables.min.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/DataTable/css/dataTable.custom.css') }}">

{{--Bootstrap icon--}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

{{--Fonts--}}
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />


{{-- dropify and ck-editor start --}}
<style>
    .ck-editor__editable[role="textbox"] {
        min-height: 150px;
    }

    .dropify-wrapper .dropify-render {
        display: unset !important;
    }
</style>
{{-- dropify and ck-editor end --}}

@stack('styles')
