@extends('layouts.admin.master')
@section('title', 'Create Server')
@section('page', 'Servers')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Servers</li>
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
                <!--begin::Servers-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-server-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Server" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Add product-->
                            <a href="{{ route('admin.servers.create') }}" class="btn btn-primary">
                                Add Server</a>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_servers_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-check="true"
                                                data-check-target="#kt_servers_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-200px">Slug</th>
                                    <th class="text-end min-w-100px">Name</th>
                                    <th class="text-end min-w-100px">Category</th>
                                    <th class="text-end min-w-100px">Country</th>
                                    <th class="text-end min-w-70px">Limit</th>
                                    <th class="text-end min-w-100px">Total Users</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($servers as $item)
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value={{ $item->id }}
                                                    data-server-filter="product_id" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Slug=-->
                                        <td>
                                            <span class="text-gray-800 fw-bolder d-block fs-6">{{ $item->slug }}</span>
                                        </td>
                                        <!--end::Slug=-->
                                        <!--begin::Name=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $item->name }}</span>
                                        </td>
                                        <!--end::Name=-->
                                        <!--begin::Category=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $item->category->name }}</span>
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::Country=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $item->country->name }}</span>
                                        </td>
                                        <!--end::Country=-->
                                        <!--begin::Limit=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold ms-3">{{ $item->limit }}</span>
                                        </td>
                                        <!--end::Limit=-->
                                        <!--begin::Total Users=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold ms-3">{{ $item->total }}</span>
                                        </td>
                                        <!--end::Total Users=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <!--begin::Menu item-->
                                                <a href="{{ route('admin.servers.edit', $item->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit me-1"></i>
                                                    Edit
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <a href="javascript:;" data-server-filter="reset_row"
                                                    data-id="{{ $item->id }}" class="btn btn-sm btn-secondary">
                                                    <i class="fas fa-sync me-1"></i>
                                                    Reset
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-server-filter="delete_row" data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash me-1"></i>
                                                    Delete
                                                </a>
                                                <!--end::Menu item-->
                                            </div>

                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Servers-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@section('scripts')
    <script src=" {{ asset('js/admin/server.js') }}"></script>
    <script>
        "use strict";
        // Class definition
        const KTServerList = function() {
            const table = $('#kt_servers_table');
            const search = document.querySelector('[data-server-filter="search"]');
            // Private functions
            // init datatable
            const _initServerTable = function() {
                // begin first table
                table.DataTable({
                    columnDefs: [{
                        target: -1,
                        orderable: false,
                    }],
                });
                search.addEventListener('keyup', function(e) {
                    e.preventDefault();
                    table.DataTable().search(this.value).draw();
                });
            };

            const _initDeleteServer = function() {
                $(document).on('click', '[data-server-filter="delete_row"]', function() {
                    const id = $(this).data('id');
                    const url = '/admin/servers/' + id;
                    Swal.fire({
                        text: "Are you sure you want to delete this server?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function(t) {
                        if (t.isConfirmed) {
                            $.ajax({
                                url: url,
                                method: 'DELETE',
                                success: function(response) {
                                    if (response.status == 'success') {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'Ok'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: response.message,
                                            icon: 'error',
                                            confirmButtonText: 'Ok'
                                        });
                                    }
                                },
                                error: function(xhr) {
                                    var res = xhr.responseJSON;
                                    if ($.isEmptyObject(res) == false) {
                                        $.each(res.errors, function(key, value) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: value,
                                                icon: 'error',
                                                confirmButtonText: 'Ok'
                                            });
                                        });
                                    }
                                }
                            });
                        }
                    }));
                });
            }

            const _initResetServer = function() {
                $(document).on('click', '[data-server-filter="reset_row"]', function() {
                    const id = $(this).data('id');
                    const url = '/admin/servers/' + id + '/reset';
                    Swal.fire({
                        text: "Are you sure you want to reset this server?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, reset!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function(t) {
                        if (t.isConfirmed) {
                            $.ajax({
                                url: url,
                                method: 'PUT',
                                success: function(response) {
                                    if (response.status == 'success') {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'Ok'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Error!',
                                            text: response.message,
                                            icon: 'error',
                                            confirmButtonText: 'Ok'
                                        });
                                    }
                                },
                                error: function(xhr) {
                                    var res = xhr.responseJSON;
                                    if ($.isEmptyObject(res) == false) {
                                        $.each(res.errors, function(key, value) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: value,
                                                icon: 'error',
                                                confirmButtonText: 'Ok'
                                            });
                                        });
                                    }
                                }
                            });
                        }
                    }));
                });
            }

            return {
                // Public functions
                init: function() {
                    _initServerTable();
                    _initDeleteServer();
                    _initResetServer();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTServerList.init();
        });
    </script>
@endsection
