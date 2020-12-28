<?php
$v = strtotime(Date("Y-m-d H:i:s"));
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css?v='.$v) }}">
    <title>Products Details | OLX</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="#">OLX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto text-right">
            <li class="nav-item active">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/product/create')}}">Add product</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <span class="nav-link">{{$user["name"]}}</span>
            <a class="nav-link" href="{{URL::to('/user/logout')}}">Logout</a>
        </form>
    </div>
</nav>
<div class="container mt-3">

    <div class="row">
        <div class="col-md-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card item-details">
                <div class="card-body">
                    <h4 class="card-title item-price"><b>₹ <span>0</span></b></h4>
                    <p class="item-name"></p>
                    <p class="card-text text-secondary"></p>
                    <p class="text-secondary created-at"></p>
                </div>
            </div>
            <br>
            <div class="card item-seller-details">
                <div class="card-body">
                    <h4 class="card-title">Seller description</h4>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">Recent Comments</div>
                <div class="card-body">
                    <div class="item-comments"></div>
                    <form class="comment-form" id="comment-form" name="comment-form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Your comment</label>
                            <textarea type="comment" class="form-control" name="comment" id="comment" required
                                      maxlength="255"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Post Comment
                        </button>
                        <button type="button" class="btn btn-danger btn-reset">
                            Reset
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('assets/js/main.js?v='.$v) }}"></script>
<script src="{{ URL::asset('assets/js/product-details.js?v='.$v) }}"></script>
</body>
<script>
    const baseUrl = "{{URL::to('/')}}";
    const productId = "{{$productId}}";
    $(document).ready(function () {
        productsDetails.init();
    });
</script>

</html>
