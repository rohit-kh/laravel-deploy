var products = function () {

    function getProducts() {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/api/product?token='+accessCookie('JWT-TOKEN'),
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
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
    }

    return {
        init: function () {
            getProducts();
        }
    };
}();
