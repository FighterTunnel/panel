@extends('layouts.guest.master')
@section('content')
    <header class="page-header-ui page-header-ui-dark bg-gradient-lime-to-green">
        <div class="page-header-ui-content pt-10">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="page-header-ui-title">{{ $page->title }} for: {{ getSettings('site_name') }}</h1>
                        <p class="lead">Last updated: Jan 2023.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="svg-border-waves text-white">
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

    <section class="bg-white py-10">
        <div class="container px-5">
            <h3>{{ $page->title }}</h3>
            {!! $page->content !!}
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
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                    <div class="mb-5">
                        <h2 class="mb-3">Check Server Status</h2>
                        <p class="small">
                            for improving the quality of our site, we would like to invite you to provide
                            criticism, suggestions, or anything related to server stability issues or
                            features you wish to add, or you may also request any features that you think
                            you may need so we may be able to improve our services to you. Each request will
                            be processed and selected based on availability and usability.
                        </p>
                        <p class="small">
                            The servers listed below are still not reached daily limit account. You can
                            check server status here and go to the servers page and create new Account
                        </p>
                        <p class="small">Keywords: check server status</p>
                    </div>
                </div>
                <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('guests/assets/img/faqs-2.svg') }}" />
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
