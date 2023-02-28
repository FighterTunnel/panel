@extends('layouts.guest.master')
@section('content')
    <header class="page-header-ui page-header-ui-dark bg-gradient-lime-to-green">
        <div class="page-header-ui-content mb-n5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center align-items-center">
                    <div class="col-lg-6 mb-5" data-aos="fade-up">
                        <h1 class="page-header-ui-title">Get fast premium SSH, Xray, V2ray and Trojan VPN account for free
                        </h1>
                        <p class="page-header-ui-text mb-5">Make Your Connection More Secure and Unblock All
                            Sites With Free Premium SSH, Xray, V2ray and Trojan and VPN Account</p>
                        <a class="btn btn-light btn-marketing rounded-pill" href="#">Our
                            Service
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="50">
                        <img class="img-fluid" src="{{ asset('guests/images/ilustration.svg') }}" width="450"
                            height="450" />
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

    <section class="bg-light py-5">
        <div class="container px-5">
            @foreach ($announcements as $announcement)
                <div class="col-lg-12 col-md-12 mb-5 alert alert-success px-2 py-0 text-center rounded-pill">
                    <div class="row gx-5 justify-content-center align-items-center">
                        <div class="col-lg-1 col-md-1">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="col-lg-11 col-md-11 text-left">
                            <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop()"
                                onmouseout="this.start()">
                                {!! $announcement->content !!}
                            </marquee>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-5 text-center">
                        <div class="text-xs text-uppercase-expanded text-primary mb-2">what's in here</div>
                        <p class="lead mb-0">We focus on free server providers for VPN services, these are
                            the services available here</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5 justify-content-center text-center">
                <div class="col-lg-auto col-12 mb-3">
                    <img src="{{ asset('guests/images/service/ssh.svg') }}" height="40px" alt="SSH Tunneling" />
                </div>
                <div class="col-lg-auto col-12 mb-3">
                    <img src="{{ asset('guests/images/service/openvpn.svg') }}" height="40px" alt="OpenVPN" />
                </div>
                <div class="col-lg-auto col-12 mb-3">
                    <img src="{{ asset('guests/images/service/v2ray.svg') }}" height="40px" alt="V2Ray" />
                </div>
                <div class="col-lg-auto col-12 mb-3">
                    <img src="{{ asset('guests/images/service/xray.svg') }}" height="40px" alt="Xray" />
                </div>
                <div class="col-lg-auto col-12 mb-3">
                    <img src="{{ asset('guests/images/service/trojan.svg') }}" height="40px" alt="Trojan" />
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container px-5">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-10">
                    <div class="text-center">
                        <div class="badge bg-success-soft text-success badge-marketing badge-pill mb-2">
                            Server time: <span id="qwe"></span> (GMT+7)
                        </div>
                        <div class="badge bg-success-soft text-success badge-marketing badge-pill mb-2">
                            Reset time:
                            @php
                                $resetTime = getResetTime();
                                if (count($resetTime) > 0) {
                                    if (count($resetTime) > 1) {
                                        foreach ($resetTime as $key => $value) {
                                            if ($key == 0) {
                                                echo $value;
                                            } elseif ($key == count($resetTime) - 1) {
                                                echo ' & ' . $value;
                                            } else {
                                                echo ', ' . $value;
                                            }
                                        }
                                    } else {
                                        echo $resetTime[0];
                                    }
                                } else {
                                    echo '00:00';
                                }
                            @endphp
                        </div>
                        <div class="badge bg-success-soft text-success badge-marketing badge-pill mb-2">
                            <div id="clockwelcome"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4">
                                <i data-feather="user-check"></i>
                            </div>
                            <h5>Personal accounts</h5>
                            <p class="card-text small">Create your SSH VPN accounts with a username and
                                password as you wish.</p>
                        </div>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-red-soft text-red mb-4"><i
                                    data-feather="bar-chart"></i>
                            </div>
                            <h5>Faster connection</h5>
                            <p class="card-text small">Our server SSH VPN makes your internet speed faster
                                with a very small PING so you will be comfortable surfing the internet.</p>
                        </div>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="150">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-yellow-soft text-yellow mb-4">
                                <i data-feather="unlock"></i>
                            </div>
                            <h5>Freedom access</h5>
                            <p class="card-text small">Access to all sites on the internet without being
                                blocked by your internet provider free access to YouTube, Facebook and
                                others.</p>
                        </div>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0" data-aos="fade-up">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-purple-soft text-purple mb-4">
                                <i data-feather="dollar-sign"></i>
                            </div>
                            <h5>Free server</h5>
                            <p class="card-text small">You are free to create SSH VPN accounts at any time
                                on this website for free.</p>
                        </div>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-blue-soft text-blue mb-4">
                                <i data-feather="wifi"></i>
                            </div>
                            <h5>WiFi connection</h5>
                            <p class="card-text small">When you use office, cafe, other public places, your
                                connection will remain safe by using our server SSH VPN.</p>
                        </div>
                    </span>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="150">
                    <span class="card text-center text-decoration-none lift h-100">
                        <div class="card-body py-3">
                            <div class="icon-stack icon-stack-lg bg-primary-soft text-primary mb-4">
                                <i data-feather="cloud-lightning"></i>
                            </div>
                            <h5>Online server</h5>
                            <p class="card-text small">Our SSH VPN server is online 24 hours and our VPS
                                server has unlimited bandwidth, making you comfortable using it every day.
                            </p>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-10">
        <div class="container px-5">
            <div id="wrapfabtest">
                <div class="adBanner"></div>
            </div>
            <div data-aos="fade-up" id="consider"></div>
            <div class="col-lg-12 col-md-12 mb-4 mt-4">
                {!! getBannerSettings('responsive_full') !!}
            </div>
            <div class="text-center mb-5">
                <h2>Our Services</h2>
                <p class="lead">Create Your Own Tunneling Account for free.</p>
            </div>
            <div class="row features mb-10">
                <div class="col-lg-12 col-md-12 mb-4 mt-4">
                    {!! getBannerSettings('responsive_full') !!}
                </div>
                @foreach ($categories as $category)
                    @if ($category->children->count() > 0)
                        @foreach ($category->children as $child)
                            <div class="col-lg-4 mb-5 mb-lg-5">
                                <div class="card pricing border-top border-top-lg border-teal">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <div class="icon-stack icon-stack-xl mb-2">
                                                <img src="{{ asset('images/categories/' . $category->icon) }}"
                                                    alt="{{ $child->name }}" width="50" height="50" />
                                            </div>
                                        </div>
                                        <div class="text-center mb-3">
                                            <h2>{{ $child->name }}</h2>
                                            <div class="badge bg-teal-soft text-teal mb-1">
                                                <b>Best for download</b>
                                            </div>
                                        </div>
                                        <ul class="fa-ul pricing-list small">
                                            @foreach ($child->features as $item)
                                                <li class="pricing-list-item">
                                                    <span class="fa-li"><i
                                                            class="far fa-check-circle text-teal"></i></span>
                                                    <span class="text-gray">{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="text-center">
                                            <div class="badge bg-teal-soft text-teal">
                                                <b>{{ $child->servers->count() }} servers</b>
                                            </div>
                                        </div>
                                        <a class="d-block btn btn-outline-teal btn-block mt-3"
                                            href="{{ route('server.index', $child->slug) }}">
                                            <svg class="svg-inline--fa fa-globe fa-w-16" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="globe" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z">
                                                </path>
                                            </svg><!-- <i class="fas fa-globe"></i> --> Select location
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif ($category->parent == null)
                        <div class="col-lg-4 mb-5 mb-lg-5">
                            <div class="card pricing border-top border-top-lg border-teal">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <div class="icon-stack icon-stack-xl mb-2">
                                            <img src="{{ asset('images/categories/' . $category->icon) }}"
                                                alt="{{ $category->name }}" width="50" height="50" />
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <h2>{{ $category->name }}</h2>
                                        <div class="badge bg-teal-soft text-teal mb-1">
                                            <b>Best for download</b>
                                        </div>
                                    </div>
                                    <ul class="fa-ul pricing-list small">
                                        @foreach ($category->features as $item)
                                            <li class="pricing-list-item">
                                                <span class="fa-li"><i class="far fa-check-circle text-teal"></i></span>
                                                <span class="text-gray">{{ $item }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="text-center">
                                        <div class="badge bg-teal-soft text-teal">
                                            <b>{{ $category->servers->count() }} servers</b>
                                        </div>
                                    </div>
                                    <a class="d-block btn btn-outline-teal btn-block mt-3"
                                        href="{{ route('server.index', $category->slug) }}">
                                        <svg class="svg-inline--fa fa-globe fa-w-16" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="globe" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z">
                                            </path>
                                        </svg><!-- <i class="fas fa-globe"></i> --> Select location
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="col-lg-12 col-md-12 mb-4 mt-4">
                    {!! getBannerSettings('responsive_full') !!}
                </div>
            </div>
        </div>
    </section>
    <section class="bg-dark py-10">
        <div class="container px-5">
            <div class="row gx-5 my-10">
                <div class="col-lg-6 mb-5" data-aos="fade-right" data-aos-delay="0">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-hdd"></i>
                        </div>
                        <div class="ms-4">
                            <h5 class="text-white">Powerful Server</h5>
                            <p class="text-white-50">Our server are perfect for tunneling access. Using the
                                newest technology with the simplest performance, NVMe SSDs are 6x faster
                                than regular SSDs and 30x faster than HDDs, and use Intel CPUs and AMD's
                                latest generation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5" data-aos="fade-left" data-aos-delay="0">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-check-circle"></i></div>
                        <div class="ms-4">
                            <h5 class="text-white">No Limit Speed</h5>
                            <p class="text-white-50">Supported with premium network speed up to 1Gbps which
                                provides comfort while browsing, streaming, downloading and playing online
                                games. there's no regulation when employing a tunneling account from us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5" data-aos="fade-right" data-aos-delay="50">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-lock"></i>
                        </div>
                        <div class="ms-4">
                            <h5 class="text-white">256-bit encryption</h5>
                            <p class="text-white-50">We using latest 256-bit encryption method for securely
                                protects you from hacker / eye attacks that take your data without you
                                knowing it. By employing a tunneling account from us, your data are going to
                                be kept confidential.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5" data-aos="fade-left" data-aos-delay="50">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-chart-line"></i></div>
                        <div class="ms-4">
                            <h5 class="text-white">Unlimited Data Transfer</h5>
                            <p class="text-white-50">Get access to all or any of our servers without a quota
                                limit and without a decrease in speed. you're liberal to download and stream
                                anyting you would like within the internet without worrying of quota running
                                out.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-users"></i></div>
                        <div class="ms-4">
                            <h5 class="text-white">Multi Logins Support</h5>
                            <p class="text-white-50">Use 1 account for various devices ranging from PC, Mac,
                                Android, IOS, Router et al. . 1 account can only be used for two devices
                                connected at an equivalent time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5" data-aos="fade-left" data-aos-delay="100">
                    <div class="d-flex h-100">
                        <div class="icon-stack flex-shrink-0 bg-teal text-white"><i class="fas fa-check-double"></i></div>
                        <div class="ms-4">
                            <h5 class="text-white">Bypass Restrictions</h5>
                            <p class="text-white-50">Access all sites on the web with none block from your
                                ISP. Get the liberty to surf by employing a tunneling account from us for
                                free of charge .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white py-10">
        <div class="container px-5">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up">
                    <a class="card text-center text-decoration-none h-100 lift" href="#!">
                        <div class="card-body py-5">
                            <div class="icon-stack icon-stack-xl bg-primary text-white mb-4">
                                <i data-feather="shield"></i>
                            </div>
                            <h5 class="text-primary">Privacy & Security</h5>
                            <p class="card-text text-gray-500">Get your identity hidden online, your
                                IP Address will be masked with our server IP. Also your connection
                                will be encrypted.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <a class="card text-center text-decoration-none h-100 lift" href="#!">
                        <div class="card-body py-5">
                            <div class="icon-stack icon-stack-xl bg-secondary text-white mb-4">
                                <i data-feather="unlock"></i>
                            </div>
                            <h5 class="text-secondary">Bypass Cencorship</h5>
                            <p class="card-text text-gray-500">Bypass your school, government or
                                your office internet cencorship. Unblock any site and enjoy Internet
                                Freedom.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="150">
                    <a class="card text-center text-decoration-none h-100 lift" href="#!">
                        <div class="card-body py-5">
                            <div class="icon-stack icon-stack-xl bg-yellow text-white mb-4">
                                <i data-feather="zap"></i>
                            </div>
                            <h5 class="text-yellow">Boost Internet Speed</h5>
                            <p class="card-text text-gray-500">Our service may boost your internet
                                speed and make your connection stable (stable PING) with. This
                                differ by country.</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="200">
                    <a class="card text-center text-decoration-none h-100 lift" href="#!">
                        <div class="card-body py-5">
                            <div class="icon-stack icon-stack-xl bg-orange text-white mb-4">
                                <i data-feather="activity"></i></i>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-orange">Stable Server</h5>
                                <p class="card-text text-gray-500">Faster Connections, full speed SSH
                                    Account with with best quality server up to 10 Gbit connection</p>
                            </div>
                        </div>
                    </a>
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
@section('script')
    <script>
        $(document).ready(function() {
            if ($("#wrapfabtest").height() > 0) {
                document.getElementById("consider").innerHTML = '';
            } else {
                document.getElementById("consider").innerHTML =
                    '<div class="col-lg-12 col-md-12 mb-5 alert alert-danger p-3"><strong>Hello, visitor!</strong> Please consider to disable your AdBlock or adding sshocean.com to your adblock whitelist. Our ads support the development and upkeep of the site.</div>';
            }
        });
    </script>
@endsection
