<link href="{{ asset('guests/css/styles.css') }}" rel="stylesheet">
<script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
</script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('css/toastr.css') }}" type="text/css" />
<meta name="google-site-verification" content="{{ getSeoSettings('google_site_verification') }}">
<meta name="msvalidate.01" content="{{ getSeoSettings('bing_site_verification') }}">
{!! getBannerSettings('mobile') !!}
@yield('css')
