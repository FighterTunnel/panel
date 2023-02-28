@extends('layouts.admin.master')
@section('title', 'Add Announcement')
@section('page', 'Announcement')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">Announcement</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">Add Announcement</li>
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
                <form id="add_announcement_form" class="form d-flex flex-column flex-lg-row"
                    data-kt-redirect="{{ route('admin.announcements.index') }}"
                    action="{{ route('admin.announcements.store') }}" method="POST">
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
                                    <label class="form-label">Content</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <div id="content" name="content" class="min-h-200px mb-2"></div>
                                    <input type="hidden" name="content" />
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">Set a content for the announcement.
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="{{ route('admin.announcements.index') }}" id="add_menu_cancel"
                                class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="add_announcement_submit" class="btn btn-primary"
                                data-kt-element="submit">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/FormControls.js') }}"></script>
    <script>
        "use strict";
        // Class definition
        const AnnouncementsForm = function() {
            const formEl = $('#add_announcement_form');
            const editorEl = $('#content');
            var editor;
            const _initEditor = function() {
                editor = new Quill(editorEl.get(0), {
                    placeholder: 'Content goes here...',
                    theme: 'snow'
                });
            }

            const _autoSave = function() {
                editor.on('text-change', function(delta, oldDelta, source) {
                    if (source == 'user') {
                        $('input[name="content"]').val(editor.root.innerHTML);
                    }
                });

            }

            const _onSubmitForm = function() {
                formEl.on('submit', function(e) {
                    e.preventDefault();
                    KTFormControls.onSubmitForm(formEl);
                });
            }

            return {
                // public functions
                init: function() {
                    _initEditor();
                    _autoSave();
                    _onSubmitForm();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            AnnouncementsForm.init();
        });
    </script>
@endsection
