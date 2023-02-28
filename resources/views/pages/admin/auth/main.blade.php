<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description"
        content="{{ config('app.name') }} is a free premium SSL / TLS SSH tunneling provider and free V2RAY and Trojan premium VPN accounts with full speed servers that make it easy for you to surf the internet without limits">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="keywords"
        content="{{ config('app.name') }}, {{ config('app.name') }}, {{ config('app.url') }}, Web SSH, Website SSH, Free VPN Account, SSH SSL VIP, SSH VIP 30 Days, SSH SSL/TLS, Free SSH Account, Fast SSH, Free V2ray Account, Full Speed SSH, Fast SSH VPN, SSH Stunnel, SSH SSL, SSH Indonesia ,herbalserver.me, herbalserver, SSH Server Singapore, Free SSH Server, Fast SSH Account, SSH 7 Days, SSH 3 Days, Free Internet, Best SSH VPN, Best SSH Account, SSH VIP, SSH Tunneling, Fast VPN Account, Dropbear, OpenSSH, Free Shadowsocks Account, SSH 30 Days, Free Wireguard Account, Wireguard VPN, Virtual Private Servers, SSH Lifetime, SSH SGDO, SSH Gaming, SSH Gratis, Unlimited SSH, Virtual Private Network, Tembak Paket Data, Tembak Xl, Tembak Telkomsel, Tembak Axis, Internet Gratis">
    <meta property="og:site_name" content="{{ config('app.url') }} FREE SSH VPN ACCOUNT" />
    <meta property="og:site" content="{{ config('app.url') }}" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description"
        content="{{ config('app.name') }} is a free premium SSL / TLS SSH tunneling provider and free V2RAY and Trojan premium VPN accounts with full speed servers that make it easy for you to surf the internet without limits" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <title>{{ config('app.name') }} | Free SSH, V2RAY & TROJAN For Premium Server | Admin Login</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" type="text/css" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4 mt-10">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Masuk Ke Halaman Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form id="form_login">
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="username">{{ __('Username') }}</label>
                                            <input class="form-control" id="username" name="username" type="text"
                                                placeholder="{{ __('Username') }}">
                                        </div>

                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="password">{{ __('Password') }}</label>
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="{{ __('Password') }}">
                                        </div>

                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button id="tombol_login" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Your Website 2022</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#form_login').on('submit', function(e) {
            e.preventDefault();
            $.post('{{ route('admin.do_login') }}', $(this).serialize(), function(response) {
                if (response.alert == 'success') {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, Mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        window.location.href = '{{ route('admin.dashboard') }}';
                    });
                } else {
                    Swal.fire({
                        text: response.message,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, Mengerti!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            }, 'json');
        });
    </script>
</body>

</html>
