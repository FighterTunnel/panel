@extends('layouts.admin.master')
@section('title', 'DNS Records')
@section('page', 'DNS Records')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">DNS Records</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">List DNS Records</li>
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
                <!--begin::dnss-->
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
                                <input type="text" data-kt-dns-filter="search"
                                    class="form-control form-control-solid w-250px ps-14" placeholder="Search dns" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dns_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_dns_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="text-end min-w-100px">No</th>
                                    <th class="text-end min-w-100px">Host</th>
                                    <th class="text-end min-w-100px">IP</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($dns as $item)
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value={{ $item->id }}
                                                    data-kt-dns-filter="dns_id" />
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->
                                        <!--begin::Username=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>
                                        <!--end::Username=-->
                                        <!--begin::Server=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $item->host }}</span>
                                        </td>
                                        <!--begin::Expired At=-->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $item->ip }}</span>
                                        </td>
                                        <!--end::Expired At=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <!--begin::Menu item-->
                                            <a href="javascript:;" data-kt-dns-filter="delete_row"
                                                data-id="{{ $item->id }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                            <!--end::Menu item-->
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
                <!--end::dns-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@section('scripts')
    <script src="{{ asset('js/admin/dns.js') }}"></script>
@endsection
@endsection
