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
            name: {
                required: true,
                alpha:true,
                minlength:2,
                maxlength:20
            },
            mobile_no: {
                required: true,
                digits:true,
                maxlength: 10,
            },
            area: {
                required: true,
            },
            native_place: {
                required: true,
            },
            location: {
                required: true,
            },
        },
        messages: {

            name: {
                required: "Please enter name",
                alpha: "The first name may only contain letters and spaces.",
                minlength: jQuery.validator.format("At least {0} number required"),
                maxlength: jQuery.validator.format("Maximum {0} number allowed")
            },
            mobile_no: {
                required: "Please enter a Mobile number",
                digits: "Please enter a numeric",
                maxlength: jQuery.validator.format("Maximum {0} number allowed")
            },
            area: {
                required: "Please enter a area",
            },
            native_place: {
                required: "Please enter a native place",
            },
            location: {
                required: "Please select a location",
            },
        },
        submitHandler: function(form) {
           $(form).find('button[type="submit"]').attr('disabled', 'disabled');
            form.submit();
        }
    });
 $.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z][\sa-zA-Z]*/);
    });
});