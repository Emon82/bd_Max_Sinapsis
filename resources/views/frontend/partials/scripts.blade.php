<!-- ==== All Js cdn Links ==== -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<!-- ==== All Js Links ==== -->
<script src="{{asset('frontend/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
{{-- <script src="{{asset('frontend/js/indexMap.js')}}"></script> --}}

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

@stack('script')
