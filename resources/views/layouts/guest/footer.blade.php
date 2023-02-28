<footer class="footer pt-10 pb-5 mt-auto bg-dark footer-dark">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-4">
                <div class="mb-3">
                    <img src="{{ asset('images/' . getSettings('site_logo')) }}" alt="logo" class="img-fluid"
                        width="200">
                </div>
                <div class="mb-3">Free VPN Multi Protocol Account</div>
                <div class="icon-list-social mb-5">
                    <a class="icon-list-social-link" href="javascript:;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="icon-list-social-link" href="javascript:;">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="icon-list-social-link" href="javascript:;">
                        <i class="fab fa-github"></i>
                    </a>
                    <a class="icon-list-social-link" href="javascript:;">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
                        <div class="text-uppercase-expanded text-xs mb-4">Services</div>
                        <ul class="list-unstyled mb-0">
                            <li>DNS</li>
                            <li>SSH</li>
                            <li>XRay</li>
                            <li>V2ray</li>
                            <li>Trojan</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-5 mb-lg-0">
                        <div class="text-uppercase-expanded text-xs mb-4">Statistics</div>
                        <ul class="list-unstyled mb-0">
                            <li>Total Account Created:</li>
                            <li>SSH:
                                {{ getTotalAccount('ssh') }}
                                <sup> today
                                    <span class="badge bg-success" title="today">
                                        {{ getCreatedAccountToday('ssh') }}+
                                    </span>
                                </sup>
                            </li>
                            <li>XRay:
                                {{ getTotalAccount('xray') }}
                                <sup> today
                                    <span class="badge bg-success" title="today">
                                        {{ getCreatedAccountToday('xray') }}+
                                    </span>
                                </sup>
                            </li>
                            <li>V2ray:
                                {{ getTotalAccount('v2ray') }}
                                <sup> today
                                    <span class="badge bg-success" title="today">
                                        {{ getCreatedAccountToday('v2ray') }}+
                                    </span>
                                </sup>
                            </li>
                            <li>Trojan:
                                {{ getTotalAccount('trojan') }}
                                <sup> today
                                    <span class="badge bg-success" title="today">
                                        {{ getCreatedAccountToday('trojan') }}+
                                    </span>
                                </sup>
                            </li>
                            <li>Your IP: {{ request()->ip() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5" />
        <div class="row align-items-center">
            <div class="col-md-4">Copyright &copy; {{ date('Y') }}
                {{ getSettings('site_name') }}.
                All rights reserved.</div>
            <div class="col-md-8 text-md-right">
                <div class="col-md-8 text-md-right">
                    @foreach ($pages as $page)
                        @if (!$loop->last)
                            <a href="{{ url('pages', $page->slug) }}">{{ $page->title }}</a>
                            &middot;
                        @else
                            <a href="{{ url('pages', $page->slug) }}">{{ $page->title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
