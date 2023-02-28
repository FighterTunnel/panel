<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}" type="text/css" />
</head>

<body data-spy="scroll" data-target=".fixed-top">
    <main>
        {{-- <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg></div>
                                Site Setting
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header> --}}
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4">
            <div class="card mb-4">
                <div class="card-header">Site Details</div>
                <div class="card-body">
                    <form id="form_site" enctype="multipart/form-data" method="POST"
                        action="{{ route('do_install') }}">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (site name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="site_name">Site Name</label>
                                <input class="form-control" id="site_name" name="site_name" type="text"
                                    placeholder="Enter site name">
                            </div>
                            <!-- Form Group (url)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="site_url">Site Url</label>
                                <input class="form-control" id="site_url" name="site_url" type="text"
                                    placeholder="Enter site url">
                            </div>
                            <!--form group (logo)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="logo">Logo</label>
                                <input class="form-control" id="logo" name="logo" type="file"
                                    placeholder="Enter logo">
                            </div>
                            <!--form group (favicon)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="favicon">Favicon</label>
                                <input class="form-control" id="favicon" name="favicon" type="file"
                                    placeholder="Enter favicon">
                            </div>

                            <!--form group (username)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="username">Username</label>
                                <input class="form-control" id="username" name="username" type="text"
                                    placeholder="Enter username">
                            </div>

                            <!--form group (name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Enter name">
                            </div>

                            <!--form group (password)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password"
                                    placeholder="Enter password">
                            </div>

                            <!--form group (password_confirmation)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation"
                                    type="password" placeholder="Enter confirm password">
                            </div>
                        </div>
                        <!-- Submit button-->
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#form_site').on('submit', function(e) {
                e.preventDefault();
                $action = $(this).attr('action');
                $method = $(this).attr('method');
                $enctype = $(this).attr('enctype');
                $data = new FormData(this);
                $.ajax({
                    url: $action,
                    type: $method,
                    data: $data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 'success') {
                            Swal.fire({
                                text: response.message,
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, Mengerti!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function() {
                                location.href = response.redirect;
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
                    }
                });
            });
        });
    </script>
</body>

</html>
