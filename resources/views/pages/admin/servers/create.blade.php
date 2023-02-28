@extends('layouts.admin.master')
@section('title', 'Add Server')
@section('page', 'Servers')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Servers</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Add Servers</li>
        <!--end::Item-->
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <form id="add_server_form" class="form d-flex flex-column flex-lg-row"
                    data-kt-redirect="{{ route('admin.servers.index') }}" action="{{ route('admin.servers.store') }}"
                    method="POST">
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Server</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <input type="text" name="name" class="form-control" placeholder="Server name" />
                            </div>

                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Category</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select name="category_id" class="form-select" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option value="">Select an option</option>
                                    @foreach ($categories as $category)
                                        @if ($category->children->count() > 0)
                                            @foreach ($category->children as $child)
                                                <option value="{{ $child->id }}">{{ $child->name }}</option>
                                            @endforeach
                                        @elseif ($category->parent == null)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-5">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Hostname</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="host" class="form-control" placeholder="Hostname" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Hostname is the name of the server. It is used to
                                            identify the server in the system.
                                        </div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">IP Address</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="ip" class="form-control"
                                            placeholder="IP Address" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A IP Address is the IP address of the server. It is
                                            used to identify the server in the system.
                                        </div>
                                        <!--end::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Limit</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="limit" class="form-control" placeholder="Limit" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Limit is the limit of the server. It is used to
                                            identify the server in the system.
                                            <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="mb-5 fv-row fv-plugins-icon-container col-md-6">
                                            <!--begin::Label-->
                                            <label class="required form-label">Country</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="country_id" class="form-select" data-control="select2"
                                                data-placeholder="Select an option">
                                                <option value="">Select an option</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">
                                                        {{ $country->name . ' (' . $country->code . ')' }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">A Country is the country of the server. It is
                                                used to identify the server in the system.
                                                <!--end::Description-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="mb-5 fv-row fv-plugins-icon-container col-md-6">
                                            <!--begin::Label-->
                                            <label class="required form-label">Type</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="type" class="form-select" data-control="select2"
                                                data-hide-search="true" data-placeholder="Select an option">
                                                <option value="">Select an option</option>
                                                <option value="3">3 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="30">30 Days</option>
                                            </select>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">A Limit is the limit of the server. It is used to
                                                identify the server in the system.
                                                <!--end::Description-->
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--begin::Repeater-->
                                    <div id="ports_repeater">
                                        <div data-repeater-list="ports_repeater">
                                            <div data-repeater-item="">
                                                <div class="form-group row mb-5">
                                                    <div class="col-md-3">
                                                        <label class="form-label required">Ports Name</label>
                                                        <input type="text" class="form-control mb-2 mb-md-0"
                                                            placeholder="Ex: SSH(SSL)" name="ports_name">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label required">Ports Number</label>
                                                        <input type="text" class="form-control mb-2 mb-md-0"
                                                            placeholder="Enter port number" name="ports_number">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete=""
                                                            class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                                                            <i class="la la-trash-o fs-3"></i>Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="javascript:;" data-repeater-create="" class="btn btn-light-primary">
                                                <i class="la la-plus"></i>Add</a>
                                        </div>
                                    </div>
                                    <!--end::Repeater-->
                                    <div class="mb-5 fv-row fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required form-label">Openvpn Configuration File</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" name="config_file" class="form-control"
                                            placeholder="Openvpn Configuration File" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Openvpn Configuration File is the Openvpn
                                            Configuration File of the server. It is used to identify the server in the
                                            system.
                                            <!--end::Description-->
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('admin.servers.index') }}" id="kt_add_server_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_add_server_submit" class="btn btn-primary"
                                data-kt-element="submit">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/FormControls.js') }}"></script>
    <script>
        "use strict";
        // Class definition
        $('#ports_repeater').repeater({
            initEmpty: false,

            show: function() {
                $(this).slideDown();
            },

            hide: function(deleteElement) {
                var element = $(this);
                Swal.fire({
                    text: "Are you sure you would like to delete this element?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function(result) {
                    if (result.value) {
                        element.slideUp(deleteElement);
                    }
                });
            },
            isFirstItemUndeletable: true
        });

        const formEl = $('#add_server_form');
        formEl.on('submit', function(e) {
            e.preventDefault();
            KTFormControls.onSubmitForm(formEl);
        });
    </script>
@endsection
