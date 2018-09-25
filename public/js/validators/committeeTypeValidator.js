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

    $("#committee_form").validate({
        rules: {
            name:{
                required:true,
                maxlength: 1,
                remote:'/admin/check/committee',
            },
            description:{
                required:true,
                maxlength:1000,
            },
        },
        messages:{
            name:{
                remote:"This committee name already exist. Please try with another",
            },

        }
    });

});