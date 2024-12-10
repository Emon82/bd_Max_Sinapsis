
<script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/vendor/js/menu.js') }}"></script>


{{--Vendors JS--}}
<script src="{{ asset('backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>

{{--Main JS--}}
<script src="{{ asset('backend/js/main.js') }}"></script>

{{--Page JS--}}
<script src="{{ asset('backend/js/dashboards-analytics.js') }}"></script>


<script src="{{ asset('backend/js/dropify.min.js') }}"></script>
<script src="{{ asset('backend/js/ckeditor.js') }}"></script>



{{-- sweetalert --}}  
<script src="{{ asset('backend/cdn/js/sweetalert2@11.js') }}"></script>

{{--jquery--}}
<script src="{{ asset('backend/cdn/js/jquery.ajaxy.min.js') }}"></script>

{{-- toastr start --}}
<script src="{{ asset('backend/libs/toastr/toastr.js') }}"></script>
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('t-success'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };

        toastr.success("{{ session('t-success') }}");
        @endif

            @if (Session::has('t-error'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.error("{{ session('t-error') }}");
        @endif

            @if (Session::has('t-info'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.info("{{ session('t-info') }}");
        @endif

            @if (Session::has('t-warning'))
            toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        toastr.warning("{{ session('t-warning') }}");
        @endif
    });
</script>
{{-- toastr end --}}

{{-- dropify start --}}
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{{-- dropify end --}}

@stack('scripts')
