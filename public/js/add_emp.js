$(function () {

 var validator = $(".form-validate").validate({
        errorElement: 'span',
        errorClass: 'help-block',
        successClass: 'validation-valid-label',
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        // Different components require proper error label placement
        errorPlacement: function(error, element) {
                if(element.parent('.form-group').length) {
                    error.insertAfter(element.parent());
                }
                else {
                    error.insertAfter(element);
                }
        },
        validClass: "validation-valid-label",
        rules: {
            email: {
                required: true,
                //email: true,
                emailValidation: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
        },
        messages: {

            email: {
                required: "Please enter your e-mail address",
                emailValidation: 'Please enter a valid e-mail address',
            },
            password: {
                required: "Please enter a password",
                minlength: jQuery.validator.format("At least {0} characters required"),
            },
            password_confirmation: {
                required: "Please enter a confirm password",
                equalTo: "Please enter the same password as above",
            },
        },
        submitHandler: function(form) {
           $(form).find('button[type="submit"]').attr('disabled', 'disabled');
            form.submit();
        }
    });

 $.validator.addMethod("emailValidation", function (value, element) {
        return this.optional(element) || /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i.test(value);
    });
});