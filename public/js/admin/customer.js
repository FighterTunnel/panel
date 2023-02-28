"use strict";
// Class definition
const KTCustomerList = (function () {
    const search = document.querySelector('[data-kt-customer-filter="search"]');
    let datatable;
    // Private functions
    const _customerList = () => {
        datatable = $('#kt_customer_table').DataTable({
            info: !1,
            order: [],
            pageLength: 10,
            columnDefs: [{
                orderable: !1,
                targets: 0
            }, {
                orderable: !1,
                targets: 6
            }]
        });
        search.addEventListener('keyup', (e) => {
            datatable.search(e.target.value).draw();
        });
    }

    const _initServerModal = () => {
        // Init edit add balance modal
        $('#addBalanceModal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var id = button.data('bs-id');
            var name = button.data('bs-name');
            var modal = $(this);
            modal.find('#name').val(name);
            modal.find('#form_input').attr('action', '/admin/customers/' + id +
                '/updateBalance');
        });
        // on submit form add balance
        $('#form_input').on('submit', function (e) {
            e.preventDefault();
            const form = $(this);
            const btn = form.find('[data-kt-element="submit"]');
            const url = form.attr('action');
            const method = form.attr('method');
            const data = form.serialize();
            $.ajax({
                url: url,
                method: method,
                data: data,
                beforeSend: function () {
                    btn.attr("data-kt-indicator", "on");
                    btn.prop("disabled", true);
                },
                success: function (response) {
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
                error: function (xhr) {
                    var res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                        $.each(res.errors, function (key, value) {
                            Swal.fire({
                                title: 'Error!',
                                text: value,
                                icon: 'error',
                                confirmButtonText: 'Ok'
                            });
                        });
                    }
                }
            }).done(function () {
                btn.removeAttr("data-kt-indicator");
                btn.prop("disabled", false);
            });
        });
    }

    const _initUpdateStatus = () => {
        // on click lock
        $(document).on('click', '[data-kt-customer-filter="lock_row"]', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                text: "Are you sure want to lock this customer?",
                icon: 'warning',
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, lock!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (t) {
                if (t.isConfirmed) {
                    $.ajax({
                        url: '/admin/customers/' + id + '/deactivate',
                        method: 'PUT',
                        success: function (response) {
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
                        error: function (xhr) {
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function (key,
                                    value) {
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

        // on click unlock
        $(document).on('click', '[data-kt-customer-filter="unlock_row"]', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                text: "Are you sure want to unlock this customer?",
                icon: 'warning',
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, unlock!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (t) {
                if (t.isConfirmed) {
                    $.ajax({
                        url: '/admin/customers/' + id + '/activate',
                        method: 'PUT',
                        success: function (response) {
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
                        error: function (xhr) {
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function (key,
                                    value) {
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

    const _initDelete = () => {
        // on click delete
        $(document).on('click', '[data-kt-customer-filter="delete_row"]', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                text: "Are you sure want to delete this customer?",
                icon: 'warning',
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((function (t) {
                if (t.isConfirmed) {
                    $.ajax({
                        url: '/admin/customers/' + id,
                        method: 'DELETE',
                        success: function (response) {
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
                        error: function (xhr) {
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function (key,
                                    value) {
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
        // public functions
        init: function () {
            _customerList();
            _initServerModal();
            _initUpdateStatus();
            _initDelete();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded((function () {
    KTCustomerList.init()
}));
