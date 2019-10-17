<!DOCTYPE html>
<html>

<head>
    <title>Login | Admin | {{ config("app.name") }}</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Elegant Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //custom-theme  -->
    <link rel="stylesheet" href="{{ asset('/') }}asset/login/admin/css/style.css">
    <!-- font-awesome icons -->
    <link href="{{ asset('/') }}asset/login/admin/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
</head>

<body>
    <div class="login-form w3_form">
        <!--  Title-->
        <div class="login-title w3_title">
            <h1>Admin login Form</h1>
        </div>
        <div class="login w3_login">
            <h2 class="login-header w3_header">Log in</h2>
            <div class="w3l_grid">

                @include('message.message')

                <form class="login-container" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <input type="email" placeholder="Email" Name="email" value="{{ old("email") }}" required="">
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    <input type="password" placeholder="Password" Name="password" required="">
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    <input type="submit" value="Submit">
                </form>

            </div>
        </div>

    </div>

    <div class="footer-w3l">
        <p class="agile"> &copy; {{ date("Y") }} Elegant Login Form . All Rights Reserved | Design by <a
                href="http://w3layouts.com">{{ config("app.name") }}</a></p>
    </div>
</body>

</html>