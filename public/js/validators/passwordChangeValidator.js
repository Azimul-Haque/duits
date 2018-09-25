$(document).ready(function () {
    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight:function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight:function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');

    $("#password_change_field").validate({
        rules: {
            password:{
                rangelength: [6, 200],
            },
            password_confirmation:{
                required:true,
                equalTo: "#password"
            }
        },
        messages:{
            password_confirmation:{
                equalTo:"Password did not match",
            },
            password:{
                rangelength:"Please enter a password between 6-200 characters",
            }
        }
    });

});