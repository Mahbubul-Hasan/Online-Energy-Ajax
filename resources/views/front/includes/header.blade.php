<div class="header">

    <div class="container">

        <div class="logo">
            <h1><a href="{{ route("/") }}"><b>T<br>H<br>E</b>{{ config("app.name") }}<span>The Best Supermarket</span></a></h1>
        </div>
        <div class="head-t">
            <ul class="card">
                @guest
                <li><a href="login.html"><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                <li><a href="register.html"><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
                @endguest
                @auth
                <li><a href="about.html"><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
                <li><a href="shipping.html"><i class="fa fa-ship" aria-hidden="true"></i>Shipping</a></li>
                <li><a href="about.html"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
                @endauth
            </ul>
        </div>

        <div class="header-ri">
            <ul class="social-top">
                <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
            </ul>
        </div>


        <div class="nav-top">
            <nav class="navbar navbar-default">

                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav ">
                        <li id="main-manu-1" class=" "><a href="{{ route("/") }}" class="hyper "><span>Home</span></a></li>

                        <li id="main-manu-2" class="dropdown">
                            <a href="#" class="dropdown-toggle  hyper" data-toggle="dropdown"><span>Category<b class="caret"></b></span></a>
                            <ul class="dropdown-menu multi">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="multi-column-dropdown">
                                            @foreach ($categories_1 as $category)
                                            <li><a href="{{ route("category.products", ["id" => $category->id]) }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $category->name }}</a></li>                                            
                                            @endforeach

                                        </ul>

                                    </div>
                                    <div class="col-sm-6">

                                        <ul class="multi-column-dropdown">
                                            @foreach ($categories_2 as $category)
                                            <li><a href="{{ route("category.products", ["id" => $category->id]) }}"><i class="fa fa-angle-right" aria-hidden="true"></i>{{ $category->name }}</a></li>                                            
                                            @endforeach

                                        </ul>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>

                        <li id="main-manu-3"><a href="{{ route("offer.products") }}" class="hyper"><span>Offer</span></a></li>
                        <li id="main-manu-4"><a href="{{ route("popular.products") }}" class="hyper"><span>Popular</span></a></li>
                        <li id="main-manu-5"><a href="contact.html" class="hyper"><span>Contact Us</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="cart">

                <span id="cart-product" class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
            </div>
            @include('front.cart-products.cart-products')
            <div class="clearfix"></div>
        </div>

    </div>
</div>

<script>
    $(window).load(function() {

        $('#main-manu-1').addClass('active');

        for (let i = 1; i <= 5; i++){
            if (i == 1) {
                continue;
            }
            $('#main-manu-'+ i).removeClass('active');
        }
    });
</script>