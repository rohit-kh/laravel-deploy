var signup = function () {

    function signupValidation() {
        $('#signup-form').validate();
        $('#signup-form').on('submit', function (e) {
            e.preventDefault();
            if(!$('#signup-form').valid()){
                return false;
            }
            $.ajax({
                type: 'POST',
                url: baseUrl + '/api/auth/register',
                data: $('#signup-form').serialize(),
                dataType: 'JSON',
                success: function (data) {
                    $('#signup-form')[0].reset();
                    swal({
                        title: 'Account created successfully.',
                        text: '',
                        icon: 'success',
                        buttons: {
                            className: 'OK'
                        },
                    }).then(function () {
                        window.location = 'signin';
                    });

                },
                error: function (event, jqxhr, settings) {
                    swal({
                        title: 'Something went wrong. Please try again.',
                        text: '',
                        icon: 'error',
                        buttons: {
                            className: 'OK'
                        },
                    });
                }
            });
        });
    }

    return {
        init: function () {
            signupValidation();
        }
    };
}();
