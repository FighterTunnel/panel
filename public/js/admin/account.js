"use strict";
// Class definition
const KTAccountList = (function () {
    let datatable;
    const search = document.querySelector('[data-kt-account-filter="search"]');
    // if column length is 6, then add this line: orderable: !1, targets: 5
    // if column length is 7, then add this line: orderable: !1, targets: 6

    // Private functions
    const _accountList = () => {
        datatable = $('#kt_account_table').DataTable({
            info: !1,
            order: [],
            pageLength: 10,
            columnDefs: [{
                orderable: !1,
                targets: 4
            }],

        });
        search.addEventListener('keyup', (e) => {
            datatable.search(e.target.value).draw();
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
                        url: '/admin/accounts/' + id,
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
            _accountList();
            _initDelete();
        }
    };
})();

// On document ready
KTUtil.onDOMContentLoaded((function () {
    KTAccountList.init();
}));
