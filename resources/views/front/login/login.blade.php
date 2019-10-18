<!DOCTYPE html>
<html>

<head>
    <title>Login | {{ config("app.name") }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

    <!-- Custom Theme files -->
    <link href="{{ asset('/') }}asset/login/user/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/') }}asset/login/user/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->

    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //web font -->

</head>

<body>

    <!-- main -->
    <div class="w3layouts-main">
        <div class="bg-layer">
            <h1>Login form</h1>
            <div class="header-main">
                <div class="main-icon">
                    <span class="fa fa-eercast"></span>
                </div>
                <div class="header-left-bottom">

                    @include('message.message')

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="email" name="email" value="{{ old("email") }}" placeholder="Email" required="" />
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="icon1">
                            <span class="fa fa-lock"></span>
                            <input type="password" name="password" placeholder="Password" required="" />
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="bottom">
                            <button type="submit" name="submit" class="btn">Log In</button>
                        </div>
                    </form>
                    <div class="links">
                        <p><a href="#">Forgot Password?</a></p>
                        <p class="right"><a href="{{ route('registration') }}">Register</a></p>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="social">
                    <ul>
                        <li>or login using : </li>
                        <li><a href="{{ url('/login', ["socialite" => "facebook"]) }}" class="facebook"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="{{ url('/login', ["socialite" => "google"]) }}" class="google"><span class="fa fa-google-plus"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- //main -->

</body>

</html>