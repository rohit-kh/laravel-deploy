var signin = function (options) {
    var signinValidation   =   function(){
        let $signinForm = $('#sign-form');
        var form            = $signinForm;
        var errorHandler2   = $('.errorHandler', form);
        var successHandler2 = $('.successHandler', form);
        $.validator.addMethod("isEmail",function(value,element){
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(value);
        },"Please enter a valid email.");
        form.validate({
            errorElement: "span", // contain the error msg in a small tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                error.insertAfter($(element).closest('.input-with-icon-left').children().last());
            },
            ignore: "",
            rules: {
                email: {
                    required: true,
                    isEmail : true
                },
                password: {
                    required: true,
                },

            },
            messages: {
                password : "Please enter a correct password.",
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                successHandler2.hide();
                errorHandler2.show();
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.input-with-icon-left').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.input-with-icon-left').removeClass('has-error');
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                $(element).closest('.input-with-icon-left').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (form) {
                successHandler2.show();
                errorHandler2.hide();
                console.log('valid');
                $.ajax({
                    type: "POST",
                    url: "../api/auth/login",
                    data: $signinForm.serialize(),
                    dataType: "JSON",
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        });
    }

    return {
        init: function () {
            signinValidation();
        }
    };
}();
