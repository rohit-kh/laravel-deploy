var products = function () {

    // cache dom
    $main = $('body');
    $productList = $main.find('.product-list');


    function getProducts() {
        $.ajax({
            type: 'GET',
            url: baseUrl + '/api/product?token=' + getCookie('JWT-TOKEN'),
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                renderProductList(data);
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

    function renderProductList(data) {
        $productList.empty();
        data.forEach(function (object, index) {
            console.log(object, index);
            let imageUrl = baseUrl + '/public/product/images/' + object.images[0].name;
            $productList.append(
                '<a href="products/' + object.id + '">\n' +
                '<div class="col-md-3">\n' +
                '            <div class="card">\n' +
                '                <img class="card-img-bottom" src="' + imageUrl + '" alt="Card image" style="width:100%">\n' +
                '                <div class="card-body">\n' +
                '                    <h4 class="card-title">' + object.name + '</h4>\n' +
                '                    <p class="card-text">' + object.description + '</p>\n' +
                '                    <a href="#" class="btn btn-primary">See Profile</a>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>' +
                '        </a>'
            );
        })

    }

    return {
        init: function () {
            getProducts();
        }
    };
}();
