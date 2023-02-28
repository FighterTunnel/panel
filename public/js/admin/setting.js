"use strict";
// Class definition
const KTFormControls = function () {
    // Base elements
    const formEl = $('#kt_edit_setting_form');
    var descriptionEditor;
    var keywordsEditor;

    const _initEditor = function () {
        // init editor
        descriptionEditor = new Quill('#kt_edit_setting_description', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, !1]
                    }],
                    ["bold", "italic", "underline"],
                    ["image", "code-block"]
                ]
            },
            placeholder: "Type your text here...",
            theme: "snow",
            readOnly: false,
        });
        keywordsEditor = new Quill('#kt_edit_setting_keywords', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, !1]
                    }],
                    ["bold", "italic", "underline"],
                    ["image", "code-block"]
                ]
            },
            placeholder: "Type your text here...",
            theme: "snow",
            readOnly: false,
        });
    }
    const _initTextEditor = function () {
        $('input[name="site_description"]').val(descriptionEditor.root.firstChild.innerHTML);
        $('input[name="site_keywords"]').val(keywordsEditor.root.firstChild.innerHTML);
    }

    const getTextEditorContent = function () {
        descriptionEditor.on('text-change', function (delta, oldDelta, source) {
            $('input[name="site_description"]').val(descriptionEditor.root.firstChild.innerHTML);
        });
        keywordsEditor.on('text-change', function (delta, oldDelta, source) {
            $('input[name="site_keywords"]').val(keywordsEditor.root.firstChild.innerHTML);
        });
    }
    const _initImageInput = function () {
        // init image input
        const imageInputLogo = document.getElementById('kt_edit_setting_logo');
        const imageInputIcon = document.getElementById('kt_edit_setting_icon');
        const imageInputFavicon = document.getElementById('kt_edit_setting_favicon');
        new KTImageInput(imageInputLogo);
        new KTImageInput(imageInputIcon);
        new KTImageInput(imageInputFavicon);
    }

    return {
        // public functions
        _init: function () {
            _initEditor();
            _initTextEditor();
            getTextEditorContent();
            _initImageInput();
        },
        onSubmit: function () {
            const btn = formEl.find('[data-kt-element="submit"]');
            const action = formEl.attr('action');
            const method = formEl.attr('method');
            const enctype = formEl.attr('enctype');
            const data = new FormData(formEl[0]);
            data.append('_method', method);
            $.ajax({
                url: action,
                type: 'POST',
                data: data,
                dataType: 'json',
                enctype: enctype,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    btn.attr("data-kt-indicator", "on");
                    btn.prop("disabled", true);
                },
                success: function (response) {
                    if (response.status == 'error') {
                        Swal.fire({
                            text: response.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                        return;
                    } else {
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    }
                },
                error: function (error) {
                    Swal.fire({
                        text: "Something went wrong! Please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            }).done(function () {
                btn.attr("data-kt-indicator", "off");
                btn.prop("disabled", false);
            });
        },
    };
}();
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormControls._init();
});

// on submit form
$(document).on('submit', '#kt_edit_setting_form', function (e) {
    console.log('submit');
    e.preventDefault();
    KTFormControls.onSubmit();
});
