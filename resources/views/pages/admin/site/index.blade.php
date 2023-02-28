@extends('layouts.admin.master')
@section('title', 'Edit Site')
@section('page', 'Servers')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Site</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Edit Site</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                            href="#kt_tab_pane_1">Site</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tab_pane_2">User</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tab_pane_3">DNS</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                            href="#kt_tab_pane_4">Tunneling</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tab_pane_5">Ads</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_tab_pane_6">SEO</a>
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_site_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_site') }}" method="PUT" enctype="multipart/form-data">
                                <!--begin::Aside column-->
                                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                                    <!--begin::Logo settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Logo</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input placeholder-->
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url({{ asset('admins/media/svg/files/blank-image.svg') }})
                                                }

                                                [data-theme="dark"] .image-input-placeholder {
                                                    background-image: url({{ asset('admins/media/svg/files/blank-image-dark.svg') }})
                                                }
                                            </style>
                                            <!--end::Image input placeholder-->
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing logo-->
                                                <div class="image-input-wrapper w-150px h-150px"
                                                    style="background-image: url({{ asset('images/' . $site->site_logo) }})">
                                                </div>
                                                <!--end::Preview existing logo-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change Logo">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--end::Icon-->
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="site_logo"
                                                        accept=".png, .jpg, .jpeg, .svg" />
                                                    <input type="hidden" name="logo_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the logo image. Only *.png, *.jpg and
                                                *.jpeg *.svg
                                                image files are accepted</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Logo settings-->
                                    <!--begin::Favicon settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Favicon</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input placeholder-->
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url({{ asset('admins/media/svg/files/blank-image.svg') }})
                                                }

                                                [data-theme="dark"] .image-input-placeholder {
                                                    background-image: url({{ asset('admins/media/svg/files/blank-image-dark.svg') }})
                                                }
                                            </style>
                                            <!--end::Image input placeholder-->
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing favicon-->
                                                <div class="image-input-wrapper w-150px h-150px"
                                                    style="background-image: url({{ asset('images/' . $site->site_favicon) }})">
                                                </div>
                                                <!--end::Preview existing favicon-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change Favicon">
                                                    <!--begin::Icon-->
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--end::Icon-->
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="site_favicon"
                                                        accept=".png, .jpg, .jpeg, .svg, .ico" />
                                                    <input type="hidden" name="favicon_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel Favicon">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove Favicon">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the favicon image. Only *.png, *.jpg and
                                                *.jpeg *.svg
                                                *.ico
                                                image files are accepted</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Favicon settings-->
                                </div>
                                <!--end::Aside column-->
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Site Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="site_name" class="form-control mb-2"
                                                    placeholder="Site Name" value="{{ $site->site_name }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A site name is required and recommended to
                                                    be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Site URL</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="site_url" class="form-control mb-2"
                                                    placeholder="Site URL" value="{{ $site->site_url }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A site url is required and recommended to be
                                                    unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_user_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_user') }}" method="PUT">
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="name" class="form-control mb-2"
                                                    placeholder="Name" value="{{ Auth::user()->name }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A name is required and recommended to be
                                                    unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Username</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="username" class="form-control mb-2"
                                                    placeholder="Username" value="{{ Auth::user()->username }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A username is required and recommended to be
                                                    unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Password</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password" class="form-control mb-2"
                                                    placeholder="Password" value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A password is required and recommended to be
                                                    unique.
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Password Confirmation</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password_confirmation"
                                                    class="form-control mb-2" placeholder="Password Confirmation"
                                                    value="" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A password confirmation is required and
                                                    recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_dns_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_dns') }}" method="PUT">
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Domain</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="domain" class="form-control mb-2"
                                                    placeholder="Enter your domain"
                                                    value="{{ getCloudflareSettings('domain') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A domain is required and recommended to be
                                                    unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="email" class="form-control mb-2"
                                                    placeholder="Enter your email"
                                                    value="{{ getCloudflareSettings('email') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">An email is required and recommended to be
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">API Key</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="api_key" class="form-control mb-2"
                                                    placeholder="Enter your API Key"
                                                    value="{{ getCloudflareSettings('api_key') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A API Key is required and recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_tunnel_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_tunnel') }}" method="PUT">
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Username</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="username" class="form-control mb-2"
                                                    placeholder="Username" value="{{ getTunnelSettings('username') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A username is used for username of the created
                                                    account.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Interval</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="interval" class="form-control mb-2"
                                                    placeholder="Interval" value="{{ getTunnelSettings('interval') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A interval is required to set the interval of
                                                    creating account.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Reset Time</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="reset_time" class="form-control mb-2"
                                                    placeholder="Reset Time"
                                                    value="{{ getTunnelSettings('reset_time') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A reset time is required to set the reset time of the created account.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Limit Connection</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="limit" class="form-control mb-2"
                                                    placeholder="Reset Time" value="{{ getTunnelSettings('limit') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A limit connection is required tu set the limit of connection.
                                                    Recommended to be 1. Set 0 to unlimited.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_ads_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_ads') }}" method="PUT">
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Ads Mobile</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="mobile" class="form-control mb-2" placeholder="Mobile">{{ getBannerSettings('mobile') }}</textarea>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A ads mobile is required and recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Ads Responsive</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="responsive_full" class="form-control mb-2" placeholder="Responsive Full">{{ getBannerSettings('responsive_full') }}</textarea>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A description is required and recommended to
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                        <div class="d-flex flex-column gap-7 gap-lg-10 py-5">
                            <!--begin::Form-->
                            <form id="edit_seo_form" class="form d-flex flex-column flex-lg-row"
                                action="{{ route('admin.update_seo') }}" method="PUT">
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Keywords</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="keywords" class="form-control mb-2"
                                                    placeholder="Keywords" value="{{ getSeoSettings('keywords') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A keywords is required and recommended to be
                                                    unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea name="description" class="form-control mb-2" placeholder="Description">{{ getSeoSettings('description') }}</textarea>
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">A description is required and recommended to
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Google Analytics</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="google_analytics" class="form-control mb-2"
                                                    placeholder="Google Analytics"
                                                    value="{{ getSeoSettings('google_analytics') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A google analytics is required and recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Google Site Verification</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="google_site_verification"
                                                    class="form-control mb-2" placeholder="Google Site Verification"
                                                    value="{{ getSeoSettings('google_site_verification') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A google analytics is required and recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Bing Site Verification</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="bing_site_verification"
                                                    class="form-control mb-2" placeholder="Bing Site Verification"
                                                    value="{{ getSeoSettings('bing_site_verification') }}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">
                                                    A google analytics is required and recommended to be unique.
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::General options-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Button-->
                                        <button type="submit" class="btn btn-primary" data-kt-element="submit">
                                            <span class="indicator-label">Save Changes</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tab pane-->
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script src="{{ asset('js/FormControls.js') }}"></script>
    <script>
        "use strict";
        // Class definition
        const KTSiteSetting = function() {
            // Base elements
            const formSiteEl = $('#edit_site_form');
            const formUserEl = $('#edit_user_form');
            const formDnsEl = $('#edit_dns_form');
            const formTunnelEl = $('#edit_tunnel_form');
            const formAdsEl = $('#edit_ads_form');
            const formSeoEl = $('#edit_seo_form');

            const _onSubmitForm = function() {
                // on submit form
                formSiteEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formSiteEl);
                });
                formUserEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formUserEl);
                });
                formDnsEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formDnsEl);
                });
                formTunnelEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formTunnelEl);
                });
                formAdsEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formAdsEl);
                });
                formSeoEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formSeoEl);
                });
            }

            return {
                // public functions
                _init: function() {
                    _onSubmitForm();
                },

            };
        }();
        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTSiteSetting._init();
        });
    </script>
@endsection
