<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('master/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('master/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('master/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('master/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{asset('master/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url({{asset('master/img/bg-login.jpg')}}) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="{{route('admin.dashboard')}}" method="post">

					   @csrf
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email"  type="text" placeholder="type email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							
						

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="{{asset('master/js/jquery-1.9.1.min.js')}}"></script>
	    <script src="{{asset('master/js/jquery-migrate-1.0.0.min.js')}}"></script>
	     <script src="{{asset('master/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	     <script src="{{asset('master/js/modernizr.js')}}"></script>
         <script src="{{asset('master/js/bootstrap.min.js')}}"></script>
	     <script src="{{asset('master/js/jquery.cookie.js')}}"></script>
        <script src="{{asset('master/js/excanvas.js')}}"></script>
	    <script src="{{asset('master/js/jquery.uniform.min.js')}}"></script>
		<script src="{{asset('master/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>


</html>
