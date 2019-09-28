@extends("front.master")

@section('title')
    Home
@endsection

@section('content')
    <!--content-->
    <div class="content-top ">
        <div class="container ">
            <div class="spec ">
                <h3>Special Offers</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>


            <div class="con-w3l">
                <div class="col-md-3 m-wthree">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of.png" class="img-responsive" alt="">
                            <div class="offer">
                                <p><span>Offer</span></p>
                            </div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Moong</a>(1 kg)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$2.00</label><em class="item_price">$1.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of.png">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 m-wthree">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of1.png" class="img-responsive" alt="">
                            <div class="offer">
                                <p><span>Offer</span></p>
                            </div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Sunflower Oil</a>(5 kg)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$10.00</label><em class="item_price">$9.00</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="2" data-name="Sunflower Oil" data-summary="summary 2" data-price="9.00" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of1.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 m-wthree">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal3" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of2.png" class="img-responsive" alt="">
                            <div class="offer">
                                <p><span>Offer</span></p>
                            </div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Kabuli Chana</a>(1 kg)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$3.00</label><em class="item_price">$2.00</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="3" data-name="Kabuli Chana" data-summary="summary 3" data-price="2.00" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of2.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 m-wthree">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal4" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of3.png" class="img-responsive" alt="">
                            <div class="offer">
                                <p><span>Offer</span></p>
                            </div>
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Soya Chunks</a>(1 kg)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="4" data-name="Soya Chunks" data-summary="summary 4" data-price="3.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of3.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!--content-->
    <div class="content-mid">
        <div class="container">

            <div class="col-md-4 m-w3ls">
                <div class="col-md1 ">
                    <a href="kitchen.html">
                        <img src="{{ asset("/") }}asset/front/images/co1.jpg" class="img-responsive img" alt="">
                        <div class="big-sa">
                            <h6>New Collections</h6>
                            <h3>Season<span>ing </span></h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 m-w3ls1">
                <div class="col-md ">
                    <a href="hold.html">
                        <img src="{{ asset("/") }}asset/front/images/co.jpg" class="img-responsive img" alt="">
                        <div class="big-sale">
                            <div class="big-sale1">
                                <h3>Big <span>Sale</span></h3>
                                <p>It is a long established fact that a reader </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 m-w3ls">
                <div class="col-md2 ">
                    <a href="kitchen.html">
                        <img src="{{ asset("/") }}asset/front/images/co2.jpg" class="img-responsive img1" alt="">
                        <div class="big-sale2">
                            <h3>Cooking <span>Oil</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </a>
                </div>
                <div class="col-md3 ">
                    <a href="hold.html">
                        <img src="{{ asset("/") }}asset/front/images/co3.jpg" class="img-responsive img1" alt="">
                        <div class="big-sale3">
                            <h3>Vegeta<span>bles</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--content-->

    <!--content-->
    <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Special Offers</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class=" con-w3l">
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of16.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Moisturiser</a>(500 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add add-2">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of16.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal18" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of17.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html"> Lady Finger</a>(250 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="4.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of17.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal19" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of18.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html"> Ribbon</a>(1 pc)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="3.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of18.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal20" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of19.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Grapes</a>(500 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="0.80" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of19.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal21" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of20.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Clips</a>(1 pack)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$7.00</label><em class="item_price">$6.00</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of20.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal22" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of21.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Conditioner</a>(250 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$5.00</label><em class="item_price">$4.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="4.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of21.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal23" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of22.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Cleaner</a>(250 kg)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$4.00</label><em class="item_price">$3.50</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="3.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of22.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="#" data-toggle="modal" data-target="#myModal24" class="offer-img">
                            <img src="{{ asset("/") }}asset/front/images/of23.png" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="single.html">Gel</a>(150 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p><label>$1.00</label><em class="item_price">$0.80</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="0.80" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of23.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection