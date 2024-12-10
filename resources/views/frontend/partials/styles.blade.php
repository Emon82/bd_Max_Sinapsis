<!-- plugin css -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/bootstrap-icons.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/owl.carousel.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/nice-select.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins/aos.css')}}" />

<!-- leaflet css -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

{{--Toastr Css--}}
<link rel="stylesheet" href="{{ asset('backend/libs/toastr/toastr.css') }}">

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/helper.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}" />

@stack('style')
