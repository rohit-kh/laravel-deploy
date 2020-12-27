var productsDetails = function () {

    // cache dom
    $main = $('body');
    $carouselInner = $main.find('.carousel-inner');
    $itemDetails = $main.find('.item-details');
    $itemComments = $main.find('.item-comments');


    function getProductDetails() {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/api/product/' + productId + '?token=' + getCookie('JWT-TOKEN'),
            dataType: 'JSON',
            success: function (data) {
                renderProductDetails(data);
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

    function formatNumberWithCommas(x) {
        x = x.toString();
        var lastThree = x.substring(x.length - 3);
        var otherNumbers = x.substring(0, x.length - 3);
        if (otherNumbers != '')
            lastThree = ',' + lastThree;
        return otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
    }

    function renderProductDetails(data) {
        $carouselInner.empty();
        $itemComments.empty();
        data.images.forEach(function (object, index) {
            let imageUrl = baseUrl + '/public/product/images/' + object.name;
            let activeClass = index == 0 ? 'active' : '';
            $carouselInner.append(
                '<div class="carousel-item ' + activeClass + '">\n' +
                '<img class="d-block w-100" src="' + imageUrl + '" alt="' + data.name + '">\n' +
                '</div>'
            );
        })
        data.comments.forEach(function (object, index) {
            var localTime = moment.utc(object.created_at).local().format('MMMM Do YYYY, h:mm:ss a');
            $itemComments.append(
                '<div class="row" style="padding: 10px">\n' +
                '<div class="col-sm-12 pt-1 pb-1" style="background-color:lavender;">\n' +
                '                            <p><span class="text-primary">' + object.user.name + '</span> &middot; <span>' + localTime + '</span></p>\n' +
                '                            <p>' + object.comment + '</p>\n' +
                '                        </div>' +
                '                        </div>'
            );
        })
        var localTime = moment.utc(data.created_at).local().format('MMMM Do YYYY, h:mm:ss a');

        $itemDetails.find('.item-name').text(data.name);
        $itemDetails.find('.card-text').text(data.description);
        $itemDetails.find('.created-at').text(localTime);
        $itemDetails.find('.item-price span').text(formatNumberWithCommas(data.price));
    }

    function commentValidation() {
        $("#comment-form").validate();
        $('#comment-form .btn-reset').click(function (e) {
            $('#comment-form')[0].reset();
        });

        $('#comment-form').on('submit', function (e) {
            e.preventDefault();
            if (!$("#comment-form").valid()) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: baseUrl + '/api/product/' + productId + '/comment?token=' + getCookie('JWT-TOKEN'),
                data: $('#comment-form').serialize(),
                dataType: 'JSON',
                success: function (data) {
                    getProductDetails();
                    $('#comment-form')[0].reset();
                    swal({
                        title: 'Comment posted successfully',
                        text: '',
                        icon: 'success',
                        buttons: {
                            className: 'OK'
                        },
                    });
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
            getProductDetails();
            commentValidation();
        }
    };
}();
