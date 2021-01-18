<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz Panel | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login_form/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login_form/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login_form/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
	  
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login_form/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login_form/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset("assets/login_form/images/bg-01.jpg")}}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Type your Email" value="{{ old('email') }}">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                       
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Type your password"> 
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
					</div>
					  <br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div> 
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{asset('assets/login_form')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login_form')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login_form')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('assets/login_form')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
 
	<script src="{{asset('assets/login_form')}}/js/main.js"></script>

</body>
</html>