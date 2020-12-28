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
    <link rel="stylesheet" href="{{ env('APP_URL').'/assets/css/dropify.min.css?v='.$v }}">
    <link rel="stylesheet" href="{{ env('APP_URL').'/assets/css/main.css?v='.$v }}">
    <title>Add Product | OLX</title>
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
            <li class="nav-item">

                <a class="nav-link" href="{{env('APP_URL').'/products'}}">Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Add product</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <span class="nav-link">{{$user["name"]}}</span>
            <a class="nav-link" href="{{env('APP_URL').'/user/logout'}}">Logout</a>
        </form>
    </div>
</nav>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12 offset-md-12">
            <div class="card">
                <div class="card-header">Add product details</div>
                <div class="card-body">
                    <form class="product-form" id="product-form" name="product-form"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Product name <span class="required-label">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Product price <span class="required-label">*</span></label>
                                    <input type="number" class="form-control" name="price" min="1" required id="price">
                                </div>
                                <div class="form-group">
                                    <label for="description">Product description <span class="required-label">*</span></label>
                                    <textarea type="text" class="form-control" rows="4" name="description" id="description" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Upload product image(s) <span class="required-label">*</span></label>
                                    <input type="file" class="form-control image dropify" name="image[]"
                                           data-allowed-file-extensions="jpeg jpg png" data-height="100" data-max-file-size="1M"
                                           required id="image1" multiple>
                                </div>
                                <div class="form-group image-list">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                Add product
                            </button>
                            <button type="button" class="btn btn-danger btn-reset">
                                Reset
                            </button>
                        </div>
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
<script src="{{env('APP_URL').'/assets/js/main.js?v='.$v}}"></script>
<script src="{{env('APP_URL').'/assets/js/dropify.min.js?v='.$v}}"></script>
<script src="{{env('APP_URL').'/assets/js/product-form.js?v='.$v}}"></script>
</body>
<script>
    const baseUrl = "{{env('APP_URL')}}";
    $(document).ready(function () {
        productForm.init();
    });
</script>

</html>
