$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
("use strict");
// Class definition
const KTFormControls = (function (form) {
    //on submit form
    return {
        // public functions
        onSubmitForm: function (form) {
            const btn = form.find('[data-kt-element="submit"]');
            const action = form.attr("action");
            const method = form.attr("method");
            const enctype = form.attr("enctype");
            const data = new FormData(form[0]);
            data.append("_method", method);
            $.ajax({
                url: action,
                type: "POST",
                data: data,
                dataType: "json",
                enctype: enctype,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    btn.attr("data-kt-indicator", "on");
                    btn.prop("disabled", true);
                },
                success: function (response) {
                    if (response.status == "error") {
                        Swal.fire({
                            text: response.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        btn.removeAttr("data-kt-indicator");
                        btn.prop("disabled", false);
                    } else {
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                if (response.redirect) {
                                    window.location.href = response.redirect;
                                } else {
                                    window.location.reload();
                                }
                            }
                        });
                    }
                },
                error: function (response) {
                    Swal.fire({
                        text: response.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    });
                    btn.removeAttr("data-kt-indicator");
                    btn.prop("disabled", false);
                },
            }).done(function () {
                btn.removeAttr("data-kt-indicator");
                btn.prop("disabled", false);
            });
        },
    };
})();
