<!DOCTYPE html>
<html>
<head>
<title>Registation</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

	<!-- Custom Theme files -->
	<link href="{{ asset('/') }}asset/login/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('/') }}asset/login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="w3layouts-main"> 
	<div class="bg-layer">
	<h1>Registation form</h1>
		<div class="header-main">
			<div class="main-icon">
				<span class="fa fa-eercast"></span>
			</div>
			<div class="header-left-bottom">

				@include('message.message')
				
				<form action="{{ route('registration') }}" method="POST">
                    @csrf
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="text" name="name" value="{{ old("name") }}" placeholder="Name" required/>
						{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="icon1">
						<span class="fa fa-envelope-o"></span>
						<input type="email" name="email" value="{{ old("email") }}" placeholder="Email" required/>
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="icon1">
						<span class="fa fa-phone"></span>
						<input type="text" name="phone" value="{{ old("phone") }}" placeholder="Phone" required/>
						{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" name="password" placeholder="Password" required/>
						{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
					</div>
					<div class="bottom">
						<button type="submit" name="register" class="btn">Register</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>	
<!-- //main -->

</body>
</html>