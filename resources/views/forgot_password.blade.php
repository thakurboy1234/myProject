@extends('user_layout')

@section('content')
<body class="auth_class">

	<div class="container login-container">
		<img class="triangleA" src="https://res.cloudinary.com/procraftstudio/image/upload/v1613965232/triangleA_lwqhnl.png" alt='Onestop triangle'>
	  <div class="row">
		<div class="col-md-6 welcome_auth">
			<div class="auth_welcome">
				Find more bootstrap 4 components & templates on <span><a href="https://mdbootstrap.com/">from MDBootstrap</a></span>
			</div>
		</div>         
		<div class="col-md-6 login-form">
			<div class="login_form_in">
				<div class="auth_branding">
					<a class="auth_branding_in" href="https://mdbootstrap.com/">
					  <i class="fab fa-mdb fa-2x auth_welcome"></i>
				  </a>
				</div>
			  <h1 class="auth_title text-left">Password Reset</h1>
			  <form>
				<div class="alert alert-success bg-soft-primary border-0" role="alert">
					Enter your email address and we'll send you an email with instructions to reset your password.
				</div>                    
				<div class="form-group">
				  <input type="email" class="form-control" name="email" placeholder="Email Address">
				</div>
				<div class="form-group">
				  <button type="button" class="btn btn-primary btn-lg btn-block">Reset Password</button>
				</div>
				<div class="form-group other_auth_links">
					<a class="" href="{{route('login')}}">Login</a>
					<a class="" href="{{route('register')}}">Register</a>
				</div>
			  </form>
			</div>
		</div>       
	  </div>
	</div>


</body>

@endsection