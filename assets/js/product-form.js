var productForm = function () {

    function productValidation() {
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop one or multiple file(s) here or click',
            }
        });
        $('#product-form').validate();
        $('#product-form').on('submit', function (e) {
            e.preventDefault();
            if (!$('#product-form').valid()) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: baseUrl + '/api/product?token=' + getCookie('JWT-TOKEN'),
                data: new FormData($('#product-form')[0]),
                async: false,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                dataType: 'JSON',
                success: function (data) {
                    $('#product-form')[0].reset();
                    $(".dropify-clear").trigger("click");
                    swal({
                        title: 'Product added successfully.',
                        text: '',
                        icon: 'success',
                        buttons: {
                            className: 'OK'
                        },
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


        $('#product-form .btn-reset').click(function (e) {
            $('#product-form')[0].reset();
            $(".dropify-clear").trigger("click");
        });
    }

    return {
        init: function () {
            productValidation();
        }
    };
}();
