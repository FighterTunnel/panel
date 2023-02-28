@extends('layouts.admin.master')
@section('title', 'Category')
@section('page', 'Category')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Categories</li>
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
                <!--begin::category-->
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
                                <input type="text" data-category-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search category" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Add Pulsa-->
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                Add Category</a>
                            <!--end::Add Pulsa-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_ecommerce_category_table .form-check-input"
                                                value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-250px">Category</th>
                                    <th class="min-w-250px">Slug</th>
                                    <th class="min-w-100px">Parent</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($categories as $item)
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value={{ $item->id }}
                                                    data-category-filter="category_id" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Category=-->
                                        <td>
                                            <div class="d-flex">
                                                <!--begin::Thumbnail-->
                                                <span class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image:url({{ asset('images/categories/' . $item->icon) }})">
                                                    </span>
                                                </span>
                                                <!--end::Thumbnail-->
                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <span class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                        data-category-filter="category_name">{{ $item->name }}</a>
                                                        <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Category=-->
                                        <!--begin::Slug=-->
                                        <td>
                                            <!--begin::Title-->
                                            <span class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                data-category-filter="category_slug">{{ $item->slug }}</a>
                                                <!--end::Title-->
                                        </td>
                                        <!--end::Slug=-->
                                        <!--begin::Parent=-->
                                        <td>
                                            <!--begin::Title-->
                                            <span class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                data-category-filter="category_parent">{{ $item->parent->name ?? '-' }}</a>
                                                <!--end::Title-->
                                        </td>
                                        <!--end::Parent=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <div class="btn-group" role="group">
                                                <!--begin::Menu item-->
                                                <a href="{{ route('admin.categories.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit me-1"></i>
                                                    Edit
                                                </a>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-kt-server-filter="delete_row" data-id="{{ $item->id }}">
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
                <!--end::category-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@section('scripts')
    <script>
        "use strict";
        var KTAppEcommercecategorys = function() {
            var t, e, n = () => {
                t.querySelectorAll('[data-category-filter="delete_row"]').forEach((t => {
                    t.addEventListener("click", (function(t) {
                        t.preventDefault();
                        const n = t.target.closest("tr"),
                            o = n.querySelector(
                                '[data-category-filter="category_provider"]')
                            .innerText,
                            i = n.querySelector(
                                '[data-category-filter="category_id"]');
                        Swal.fire({
                            text: "Are you sure you want to delete " + o + "?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then((function(t) {
                            if (t.value) {
                                var url =
                                    "{{ route('admin.categories.destroy', ':id') }}";
                                url = url.replace(':id', i.value);
                                $.ajax({
                                    url: url,
                                    type: "DELETE",
                                    data: {
                                        _token: "{{ csrf_token() }}"
                                    },
                                    success: function(response) {
                                        Swal.fire({
                                            text: "You have deleted " +
                                                o + "!.",
                                            icon: "success",
                                            buttonsStyling:
                                                !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary"
                                            }
                                        }).then((function() {
                                            e.row($(n))
                                                .remove()
                                                .draw()
                                        }))
                                    }
                                })
                            } else {
                                "cancel" === t.dismiss && Swal.fire({
                                    text: o + " was not deleted.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary"
                                    }
                                })
                            }
                        }))
                    }))
                }))
            };
            return {
                init: function() {
                    (t = document.querySelector("#kt_ecommerce_category_table")) && ((e = $(t).DataTable({
                            info: !1,
                            order: [],
                            pageLength: 10,
                            columnDefs: [{
                                orderable: !1,
                                targets: 0
                            }]
                        })).on("draw", (function() {
                            n()
                        })), document.querySelector('[data-category-filter="search"]')
                        .addEventListener("keyup", (function(t) {
                            e.search(t.target.value).draw()
                        })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommercecategorys.init()
        }));
    </script>
@endsection
@endsection
