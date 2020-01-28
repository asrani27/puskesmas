<!DOCTYPE html>
<html>
<head>
	<title>E-Puskesmas</title>
		<meta charset="utf-8">
		<link href="/templatelogin/css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>E-Puskesmas</h1>
					<div class="head">
						<img src="/templatelogin/images/user.png" alt=""/>
					</div>
				<form method="POST" action="{{route('login')}}">
					@csrf
						<input type="text" name="username" class="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<button type="submit" class="form-control btn btn-sm btn-success"> Login</button>
					</div>	
					{{-- <p><a href="#">Forgot Password ?</a></p> --}}
				</form>
			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
   					<div class="copy-right">
						{{-- <p>Template by <a href="http://w3layouts.com">w3layouts</a></p>  --}}
					</div>
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->
		 @include('sweetalert::alert')		 		
</body>
</html>