var signin = function () {

    function signinValidation() {
        $("#signin-form").validate();
        $('#signin-form').on('submit', function (e) {
            e.preventDefault();
            if(!$("#signin-form").valid()){
                return false;
            }
            $.ajax({
                type: 'POST',
                url: baseUrl + '/api/auth/login',
                data: $('#signin-form').serialize(),
                dataType: 'JSON',
                success: function (data) {
                    setCookie('JWT-TOKEN', data.token, 1);
                    setTimeout(function (){
                        window.location = 'product';
                    },500);
                },
                error: function (event, jqxhr, settings) {
                    swal({
                        title: 'Invalid credentials.',
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
            signinValidation();
        }
    };
}();
