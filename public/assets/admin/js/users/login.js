
function validateAdminLoginForm() {
    $.validator.setDefaults({
        errorClass: 'form-text form-error text-danger-m2 d-inline-block',
        highlight: function (a) {
            $(a).closest(".form-control").addClass("brc-danger-tp2");
        },
        unhighlight: function (a) {
            $(a).closest(".form-control").removeClass("brc-danger-tp2");
        }
    });
    $("#admin_login_form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Please Enter Email",
                email: "Please Enter Valid Email"
            },
            password: {
                required: "Please Enter Password"
            },
        }
    });
}

$(document).ready(function () {
    validateAdminLoginForm();
});