<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! SEO::generate() !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('images/' . getSettings('site_favicon')) }}">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">

    <style>
        .adsbox {
            display: none;
        }

        .adsbox__inner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 999999;
        }

        .adsbox__content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }

        .adsbox__title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .adsbox__text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .adsbox--show {
            display: block;
        }
    </style>

    @include('layouts.guest.head')
</head>

<body>
    <div id="layoutDefault">
        <div id="layoutDefault_content">
            <main>
                @include('layouts.guest.navbar')

                @yield('content')
            </main>
        </div>
    </div>
    <div id="layoutDefault_footer">
        @include('layouts.guest.footer')
    </div>
    <script>
        // AdBlock Detector
        var adsbox = document.createElement('div');
        adsbox.className = 'adsbox';
        document.body.appendChild(adsbox);
        adsbox.innerHTML =
            '<div class="adsbox__inner"><div class="adsbox__content"><div class="adsbox__title">AdBlock Terdeteksi!</div><div class="adsbox__text">Sepertinya Anda menggunakan adblocker. Silahkan nonaktifkan adblocker untuk melanjutkan menggunakan website kami.</div><div class="adsbox__text">Jika Anda tidak menggunakan adblocker, silahkan refresh halaman.</div></div></div>';

        function adBlockFunction() {
            adsbox.classList.add('adsbox--show');
        }
    </script>
    @include('layouts.guest.script')
</body>

</html>
