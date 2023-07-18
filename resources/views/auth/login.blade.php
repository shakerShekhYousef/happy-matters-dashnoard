
<html>
<head>
<title>Happy Matters</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8" />
    {{-- <title>Login | Happy tenant - Admin Dashboard</title> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	</head>
	
	<br><br><br><br><br><br>
    <body data-topbar="colored">

        <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    
            <!-- Background -->
            <div class="account-pages"></div>
            <!-- Begin page -->
            <div class="wrapper-page">
<div class="container">
    <div class="row justify-content-center">
       <div class="login-box" style="width:30rem">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body ">
            <p class="text-muted text-center">Sign in to continue to Happy Matters</p>


            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <span id="exampleInputEmail1-error"
                              class="error invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <span id="exampleInputEmail1-error"
                              class="error invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        

           
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">Register a new membership</a>
              
    
            </div>
            </p>
        </div>
        <div class="text-center">
            <p class="text-muted">
                ©
                <script>document.write(new Date().getFullYear())</script> Happy Matters
            </p>
        </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

	</div>
</div>
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<body>
</html>