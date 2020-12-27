<?php
$v = strtotime(Date("Y-m-d H:i:s"));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/css/main.css')); ?>">
    <title>Hello, world!</title>
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
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="#">Sign in</a>
            <a href="#">
                <button class="btn btn-outline-success my-2 my-sm-0" type="button">Sign up</button>
            </a>
        </form>
    </div>
</nav>
<div class="container mt-3">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-header">Sign in to OLX</div>
            <div class="card-body">
                <form class="signin-form" id="signin-form" name="signin-form" method="post">
                    <?php echo csrf_field(); ?>
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
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </form>
            </div>
        </div>
        <p class="login-callout mt-3">
            New to GitHub?
            <a data-ga-click="Sign in, switch to sign up"
               data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;sign in switch to sign up&quot;,&quot;repository_id&quot;:null,&quot;auth_type&quot;:&quot;SIGN_UP&quot;,&quot;originating_url&quot;:&quot;https://github.com/login&quot;,&quot;user_id&quot;:null}}"
               data-hydro-click-hmac="72d062e79bb6ab076a3b88b32943286ea51894183bd812a5038d00013946f239"
               href="/join?source=login">Create an account</a>.
        </p>
    </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->





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
<script src="<?php echo e(URL::asset('assets/js/signin.js?v='.$v)); ?>"></script>
</body>
<script>
    const baseUrl = "<?php echo e(URL::to('/')); ?>";
    $(document).ready(function () {
        signin.init();
    });
</script>

</html>
<?php /**PATH /opt/lampp/htdocs/laravel-deploy/resources/views/home.blade.php ENDPATH**/ ?>