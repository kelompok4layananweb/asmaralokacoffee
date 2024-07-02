<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content='IE=edge' http-equiv=X-UA-Compatible>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MS Login Panel</title>
    <link rel="shortcut icon" type="image/png" href="#">

    <!-- Core Css -->
    <link rel="stylesheet" type="text/css" href="style/assets/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="style/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="style/assets/css/bootstrap.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="style/assets/css/style.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ########## START: Login Form ########## -->
    <section class="login-wrapper d-flex align-content-center justify-content-center p-3 flex-wrap">
        <a href="index.html" class="w-100 text-center mb-3 mb-lg-5"><img src="style/assets/image/logo.png"
                alt="MS Admin Panel" width="150" /></a>
        <div class="login-form bg-white p-3 p-lg-5 rounded">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-lg-flex pr-lg-2">
                    <img src="assets/image/login-mockup.svg" alt="">
                </div>
                <div class="col-12 col-lg-6 pl-lg-2">
                    <div class="pagetitle mb-4">
                        <h2>Component</h2>
                    </div>
                    <form method="post" action="{{ route('login.store') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label>Email Id</label>
                            <input type="text" id="email" name="email"
                                class="form-control @error('email') is Invalid @enderror border-light input-h-42"
                                placeholder="Email" required>
                        </div>
                        @error('email')
                        <small class="btn btn-d">{{ $message}}</small>
                        @enderror
                        <div class="form-group mb-4">
                            <label>Password</label>
                            <div class="input-group border border-light">
                                <input id="password-field" type="password" id="password" name="password"
                                    class="form-control @error('email') is Invalid @enderror input-h-42"
                                    placeholder="Password" aria-label="Password" required>
                                <div class="input-group-prepend">
                                    <span toggle="#password-field" class="input-group-text la la-eye"
                                        id="Password"></span>
                                </div>
                                @error('password')
                                <small class="btn btn-d">{{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <a href="forgot.html" class="text-primary btn-link">Forgot password?</a>
                            <button type="submit"
                                class="btn btn-primary waves-effect waves-primary btn-md w-50">Login</button>
                        </div>
                        <hr class="mb-4">
                        <a href="register.html"
                            class="btn btn-outline-primary waves-effect waves-primary w-100 btn-md">Create an
                            account</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ########## END: Login Form ########## -->
</body>

<script src="style/assets/scripts/jquery.min.js"></script>
<script src="style/assets/scripts/popper.min.js"></script>
<script src="style/assets/scripts/bootstrap-slider.min.js"></script>
<script src="style/assets/scripts/bootstrap.min.js"></script>
<script src="style/assets/scripts/bootstrap.bundle.min.js"></script>
<script src="style/assets/scripts/bootstrap-select.min.js"></script>
<script src="style/assets/scripts/bootstrap-tooltip-custom-class.js"></script>
<script src="style/assets/scripts/jquery.mCustomScrollbar.js"></script>
<script src="style/assets/scripts/datatables.min.js"></script>
<script src="style/assets/scripts/ripple.min.js"></script>
<script src="style/assets/scripts/custome.js"></script>

</html>