@extends('layouts.guest.master')
@section('css')
    <link href="{{ asset('guests/flag-icon/css/flag-icon.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <header class="page-header-ui page-header-ui-dark bg-gradient-lime-to-green">
        <div class="page-header-ui-content mb-n5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center align-items-center">
                    <div class="col-lg-6 mb-5" data-aos="fade-up">
                        <h1 class="page-header-ui-title">Get fast premium {{ $category->name }} account for free</h1>
                        <p class="page-header-ui-text mb-5">Make Your Connection More Secure and Unblock All
                            Sites With Free Premium S{{ $category->name }} Account</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-waves text-light">
            <svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
                <defs>
                    <style>
                        .a {
                            fill: none;
                        }

                        .b {
                            clip-path: url(#a);
                        }

                        .d {
                            opacity: 0.5;
                            isolation: isolate;
                        }
                    </style>
                    <clippath id="a">
                        <rect class="a" width="1920" height="75"></rect>
                    </clippath>
                </defs>
                <title>wave</title>
                <g class="b">
                    <path class="c"
                        d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48">
                    </path>
                </g>
                <g class="b">
                    <path class="d"
                        d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10">
                    </path>
                </g>
                <g class="b">
                    <path class="d"
                        d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24">
                    </path>
                </g>
                <g class="b">
                    <path class="d"
                        d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150">
                    </path>
                </g>
            </svg>
        </div>
    </header>
    <section class="bg-white py-5">
        <div class="container px-5">
            <div class="row features text-center mb-10">
                <div class="col-lg-12 col-md-12 mb-4 mt-4"></div>
            </div>
            <div class="row gx-5 justify-content-center features mb-10">
                @foreach ($servers as $server)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card pricing border-top border-top-lg border-teal">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <div
                                        class="badge bg-teal-soft rounded-pill badge-marketing badge-sm text-teal text-wrap">
                                        {{ $category->name }}
                                    </div>
                                    <div class="pricing-price">
                                        {{ $server->slug }}
                                    </div>
                                </div>
                                <ul class="fa-ul pricing-list">
                                    <li class="pricing-list-item">
                                        <span class="fa-li"><svg class="svg-inline--fa fa-circle-check text-teal"
                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                data-icon="circle-check" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z">
                                                </path>
                                            </svg>
                                            <!-- <i class="far fa-check-circle text-teal"></i> Font Awesome fontawesome.com --></span>
                                        <span class="text-dark">Host: <b>{{ $server->host }}</b></span>
                                    </li>
                                    <li class="pricing-list-item">
                                        <span class="fa-li"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-teal"
                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                </path>
                                            </svg><!-- <i class="far fa-check-circle text-teal"></i> --></span><span
                                            class="text-dark">Location: <b><span
                                                    class="flag-icon flag-icon-{{ $country->code }}"></span>
                                                {{ $country->name }}</b></span>
                                    </li>
                                    @foreach (json_decode($server->ports) as $key => $value)
                                        <li class="pricing-list-item">
                                            <span class="fa-li"><svg
                                                    class="svg-inline--fa fa-check-circle fa-w-16 text-teal"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="check-circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                    </path>
                                                </svg><!-- <i class="far fa-check-circle text-teal"></i> --></span><span
                                                class="text-dark">{{ $key }}: <b>{{ $value }}</b></span>
                                        </li>
                                    @endforeach

                                    <li class="pricing-list-item">
                                        <span class="fa-li"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-teal"
                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                </path>
                                            </svg><!-- <i class="far fa-check-circle text-teal"></i> --></span><span
                                            class="text-dark">Valid: <b>{{ $server->type }} Days </b></span>
                                    </li>
                                    <li class="pricing-list-item">
                                        <span class="fa-li"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-teal"
                                                aria-hidden="true" focusable="false" data-prefix="far"
                                                data-icon="check-circle" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z">
                                                </path>
                                            </svg><!-- <i class="far fa-check-circle text-teal"></i> --></span>
                                        <span class="text-dark">Status:
                                            {!! getServerStatus($server) !!}
                                        </span>
                                    </li>
                                    <p class="card-text text-center">
                                        Acc Remaining: <span
                                            class="badge badge-pill badge-teal-soft text-teal badge-marketing">
                                            {{ $server->limit - $server->current }}
                                            Form {{ $server->limit }}</span>
                                    </p>
                                    <a class="d-block btn btn-outline-teal btn-block mt-3"
                                        href="{{ route('server.create', ['category' => $category->slug, 'country' => $server->country->code, 'slug' => $server->slug]) }}">
                                        CREATE <i class="fas fa-arrow-right"></i></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12 mb-4 mt-4">
                </div>
                <div class="d-flex justify-content-center">
                </div>
            </div>
            {!! $category->information !!}
        </div>
    </section>

    <section class="bg-white pt-5">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-lg-n20 mb-5 mb-lg-5 z-1">
                    <a class="card text-decoration-none lift" href="#!">
                        <div class="card-body py-5">
                            <div class="d-flex align-items-center">
                                <div class="icon-stack icon-stack-xl bg-gradient-lime-to-green text-white flex-shrink-0">
                                    <i data-feather="shield"></i>
                                </div>
                                <div class="ms-4">
                                    <h5 class="text-teal">Privacy & Security</h5>
                                    <p class="card-text text-gray-500">Get your identity hidden online, your
                                        IP Address will
                                        be masked with our server IP. Also your connection will be
                                        encrypted.</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-lg-n20 mb-5 mb-lg-5 z-1">
                    <a class="card text-decoration-none lift" href="#!">
                        <div class="card-body py-5">
                            <div class="d-flex align-items-center">
                                <div class="icon-stack icon-stack-xl bg-gradient-lime-to-green text-white flex-shrink-0">
                                    <i data-feather="unlock"></i>
                                </div>
                                <div class="ms-4">
                                    <h5 class="text-teal">Bypass Cencorship</h5>
                                    <p class="card-text text-gray-500">Bypass your school, government or
                                        your office
                                        internet cencorship. Unblock any site and enjoy Internet Freedom.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-lg-n10 mb-5 mb-lg-5 z-1">
                    <a class="card text-decoration-none lift" href="#!">
                        <div class="card-body py-5">
                            <div class="d-flex align-items-center">
                                <div class="icon-stack icon-stack-xl bg-gradient-lime-to-green text-white flex-shrink-0">
                                    <i data-feather="zap"></i>
                                </div>
                                <div class="ms-4">
                                    <h5 class="text-teal">Boost Internet Speed</h5>
                                    <p class="card-text text-gray-500">Our service may boost your internet
                                        speed and make
                                        your connection stable (stable PING) with. This differ by country.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-lg-n10 mb-5 mb-lg-5 z-1">
                    <a class="card text-decoration-none lift" href="#!">
                        <div class="card-body py-5">
                            <div class="d-flex align-items-center">
                                <div class="icon-stack icon-stack-xl bg-gradient-lime-to-green text-white flex-shrink-0">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="ms-4">
                                    <h5 class="text-teal">Stable Server</h5>
                                    <p class="card-text text-gray-500">Faster Connections, full speed SSH
                                        Account with with
                                        best quality server up to 10 Gbit connection</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-10">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                    <br />
                    <img class="img-fluid" src="{{ asset('guests/assets/img/faqs-2.svg') }}" />
                </div>
                <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                    <div class="mb-5">
                        {!! $category->description !!}
                    </div>
                </div>
            </div>
    </section>
    <section class="bg-light py-10">
        <div class="container px-5 mt-5">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mb-4 mt-4">
                    {!! getBannerSettings('responsive_full') !!}
                </div>
            </div>
        </div>
    </section>
@endsection
