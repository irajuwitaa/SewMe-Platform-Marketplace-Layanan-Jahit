var KTSigninGeneral = (function () {
    var currentUrl = window.location.origin;
    var form, submitButton, validator;

    return {
        init: function () {
            form = document.querySelector("#kt_sign_in_form");
            submitButton = document.querySelector("#kt_sign_in_submit");
            validator = FormValidation.formValidation(form, {
                fields: {
                    email: {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: "Alamat email tidak valid",
                            },
                            notEmpty: {
                                message: "Email harus di isi!",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "Kata sandi harus di isi!",
                            },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                },
            });

            var formAction = form.getAttribute("action");
            var isUrlValid = (function (url) {
                try {
                    return new URL(url), true;
                } catch (e) {
                    return false;
                }
            })(formAction);

            if (!isUrlValid) {
                submitButton.addEventListener("click", function (event) {
                    event.preventDefault();
                    validator.validate().then(function (status) {
                        if (status === "Valid") {
                            var email = $('#email').val();
                            var password = $('#password').val();
                            var token = $('#token').val();
                            $.ajax({
                                url: `${currentUrl}/loginproses`,
                                type: "POST",
                                dataType: 'json',
                                data: {
                                    '_token': token,
                                    'email': email,
                                    'password': password,
                                },
                                success: (resp) => {
                                    if (resp.success) {
                                        handleSuccess(resp.redirect);
                                    } else {
                                        handleError(resp.message);
                                    }
                                },
                                error: (jqXHR) => {
                                    handleError(jqXHR.responseJSON.message);
                                }
                            });
                        } else {
                            handleError();
                        }
                    });
                });
            } else {
                submitButton.addEventListener("click", function (event) {
                    event.preventDefault();
                    validator.validate().then(function (status) {
                        if (status === "Valid") {
                            handleSubmit();
                        } else {
                            handleError();
                        }
                    });
                });
            }
        },
    };

    function handleSuccess(url) {
        submitButton.setAttribute("data-kt-indicator", "on");
        submitButton.disabled = true;
        setTimeout(function () {
            submitButton.removeAttribute("data-kt-indicator");
            submitButton.disabled = false;
            Swal.fire({
                text: "Anda telah berhasil login!",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1000,
                customClass: { confirmButton: "btn btn-primary" },
            });

            setTimeout(function () {
                form.querySelector('[name="email"]').value = "";
                form.querySelector('[name="password"]').value = "";
                var redirectUrl = url;
                if (redirectUrl) {
                    location.href = redirectUrl;
                }
            }, 1000);
        }, 1000);
    }

    function handleSubmit() {
        submitButton.setAttribute("data-kt-indicator", "on");
        submitButton.disabled = true;
        axios
            .post(form.getAttribute("action"), new FormData(form))
            .then(function (response) {
                if (response.data.success) {
                    form.reset();
                    Swal.fire({
                        text: "Anda telah berhasil login!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, kembali",
                        customClass: { confirmButton: "btn btn-primary" },
                    });
                    const redirectUrl = form.getAttribute("data-kt-redirect-url");
                    if (redirectUrl) {
                        location.href = redirectUrl;
                    }
                } else {
                    showError(response.data.message);
                }
            })
            .catch(function (error) {
                showError(
                    error.response.data.message ||
                    "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi."
                );
            })
            .finally(function () {
                submitButton.removeAttribute("data-kt-indicator");
                submitButton.disabled = false;
            });
    }

    function handleError(message) {
        Swal.fire({
            text: message || "Maaf, sepertinya ada beberapa kesalahan yang terdeteksi, silakan coba lagi.",
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok, kembali",
            customClass: { confirmButton: "btn btn-primary" },
        });
    }
})();

KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
