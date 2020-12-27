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
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
    <title>Sign up | OLX</title>
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
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Link</a>--}}
{{--            </li>--}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="signin">Sign in</a>
        </form>
    </div>
</nav>
<div class="container mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">Create your account</div>
            <div class="card-body">
                <form class="signup-form" id="signup-form" name="signup-form" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Display name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" required aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required minlength="6" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create account</button>
                </form>
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
<script src="{{ URL::asset('assets/js/signup.js?v='.$v) }}"></script>
</body>
<script>
    const baseUrl = "{{URL::to('/')}}";
    $(document).ready(function () {
        signup.init();
    });
</script>

</html>
