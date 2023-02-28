@extends('layouts.admin.master')
@section('Title', 'Admin Site')
@section('content')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
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
        </header>
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4">
            <div class="card mb-4">
                <div class="card-header">Site Details</div>
                <div class="card-body">
                    <form id="form_site">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (site name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Site Name</label>
                                <input class="form-control" id="name" name="name" type="text"
                                    placeholder="Enter name">
                            </div>
                            <!-- Form Group (url)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="url">Site URL</label>
                                <input class="form-control" id="url" name="url" type="text"
                                    placeholder="Enter host">
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
                        </div>
                        <!-- Submit button-->
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#form_site').on('submit', function(e) {
                e.preventDefault();
                $.post('{{ route('admin.update_site') }}', $(this).serialize(), function(response) {
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
                            window.location.reload();
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
                });
            });
        });
    </script>
@endsection
@endsection
