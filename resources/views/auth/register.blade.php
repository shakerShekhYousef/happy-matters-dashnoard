
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
	
	<br><br><br><br>
    <body data-topbar="colored">

        <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    
            <!-- Background -->
            <div class="account-pages"></div>
            <!-- Begin page -->
            <div class="wrapper-page">
<div class="container">
    <div class="row justify-content-center">
		<body class="hold-transition register-page">
			<div class="register-box" style="width:25rem">
				
			
				<div class="card">
					<div class="card-body register-card-body">
						<p class="login-box-msg">Register a new membership</p>
			
						<form action="{{route('register')}}" method="post">
							@csrf
							<div class="input-group mb-3">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
								 name="name" value="{{ old('name') }}" required autocomplete="email" autofocus  placeholder="Enter Your Name">
									@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-user"></span>
									</div>
								</div>
							
							</div>
							<div class="input-group mb-3">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
								name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">
									@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-envelope"></span>
									</div>
								</div>
								
							</div>
							<div class="input-group mb-3">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
								name="password" required autocomplete="current-password"  placeholder="Enter Password">
		   
		   @error('password')
			   <span class="invalid-feedback" role="alert">
				   <strong>{{ $message }}</strong>
			   </span>
		   @enderror
		   								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							
							</div>
							<div class="input-group mb-3">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
								required autocomplete="new-password" placeholder="Confirm Password">
			
			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fas fa-lock"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-8">
									<div class="icheck-primary">
										<input type="checkbox" id="agreeTerms" name="terms" value="agree">
										<label for="agreeTerms">
											I agree to the <a href="#">terms</a>
										</label>
									</div>
								</div>
								<!-- /.col -->
								<div class="col-4">
									<button type="submit" class="btn btn-primary btn-block">Register</button>
								</div>
								<!-- /.col -->
							</div>
						</form>
			
		
			
						<a href="{{route('login')}}" class="text-center">I already have a membership</a>
					</div>
					<!-- /.form-box -->
				</div><!-- /.card -->
				<div class="text-center">
					<p class="text-muted">
						©
						<script>document.write(new Date().getFullYear())</script> Happy Matters
					</p>
				</div>
			</div>
			<!-- /.register-box -->
        
	</div>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<body>
</html>