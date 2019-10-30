
<!--Offer Products-->
@if (count($offer_products) > 0)
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
            @foreach ($offer_products as $offerProduct)

            <div class="col-md-3 m-wthree" style="margin-bottom: 30px">
                <div class="col-m">
                    <a href="{{ url("/product/modal", ["id" => $offerProduct->id]) }}" id="productModal" class="offer-img">
                        <img src="{{ $offerProduct->photo }}" class="img-responsive" alt="" style="width: 100%">
                        <div class="offer">
                            <p><span>Offer</span></p>
                        </div>
                    </a>
                    <div class="mid-1">
                        <div class="women" style="height: 60px;">
                            <b><a href="{{ route("single.product", ["id" => $offerProduct->id]) }}">{{ $offerProduct->name }}</a> (1 kg)</b>
                        </div>
                        <div class="mid-2">
                            <p><label>৳ {{ $offerProduct->price }}</label><strong class="item_price">৳ {{ $offerProduct->Offer_price }}</strong></p>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form id="addToCartForm" action="{{ url("/carts") }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id" value="{{ $offerProduct->id }}" style="width: 65px">
                                <input type="hidden" class="form-control" name="quantity" aria-describedby="sizing-addon2" value="1" style="width: 65px">
                            </div>
                            <div class="add">
                                <button type="submit" class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
        <a href="{{ route("offer.products") }}">
            <p style="text-align: center; margin-top: 10px"><strong>See ALL...</strong></p>
        </a>
    </div>
</div>
@endif


<!--Popular Products-->
@if (count($popular_products) > 0)
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Popular Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>


        <div class="con-w3l">
            @foreach ($popular_products as $popularProduct)

            <div class="col-md-3 m-wthree" style="margin-bottom: 30px">
                <div class="col-m">
                    <a href="{{ url("/product/modal", ["id" => $popularProduct->id]) }}" id="productModal" class="offer-img">
                        <img src="{{ $popularProduct->photo }}" class="img-responsive" alt="" style="width: 100%">
                    </a>
                    <div class="mid-1">
                        <div class="women" style="height: 60px;">
                            <b><a href="{{ route("single.product", ["id" => $popularProduct->id]) }}">{{ $popularProduct->name }}</a> (1 kg)</b>
                        </div>
                        <div class="mid-2">
                            @if ($popularProduct->Offer_price )
                            <p><del>৳ {{ $popularProduct->price }}</del><strong class="item_price">৳ {{ $popularProduct->Offer_price }}</strong></p>
                            @else
                            <p><strong>৳ {{ $popularProduct->price }}</strong></p>
                            @endif
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form id="addToCartForm" action="{{ url("/carts") }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id" value="{{ $popularProduct->id }}" style="width: 65px">
                                <input type="hidden" class="form-control" name="quantity" aria-describedby="sizing-addon2" value="1" style="width: 65px">
                            </div>
                            <div class="add">
                                <button type="submit" class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
        <a href="{{ route("popular.products") }}">
            <p style="text-align: center; margin-top: 10px"><strong>See ALL...</strong></p>
        </a>
    </div>
</div>
@endif


<!--content-->
@if (count($offer_products) > 0 || count($popular_products) > 0)
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
@endif
<!--content-->

<!--All Products-->
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>All Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>

        @if ($all_products->count() <= 0) 
        <div class="alert alert-warning">
            <strong>Sorry!!!</strong> No data found.
        </div>
        @else
    <div class="con-w3l">
        @foreach ($all_products as $product)

        <div class="col-md-3 m-wthree" style="margin-bottom: 30px">
            <div class="col-m">
                <a href="{{ url("/product/modal", ["id" => $product->id]) }}" id="productModal" class="offer-img">
                    <img src="{{ $product->photo }}" class="img-responsive" alt="" style="width: 100%">
                </a>
                <div class="mid-1">
                    <div class="women" style="height: 60px;">
                        <b><a href="{{ route("single.product", ["id" => $product->id]) }}">{{ $product->name }}</a> (1 kg)</b>
                    </div>
                    <div class="mid-2">
                        @if ($product->Offer_price )
                        <p><del>৳ {{ $product->price }}</del><strong class="item_price">৳ {{ $product->Offer_price }}</strong></p>
                        @else
                        <p><strong>৳ {{ $product->price }}</strong></p>
                        @endif
                        <div class="block">
                            <div class="starbox small ghosting"> </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <form id="addToCartForm" action="{{ url("/carts") }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="hidden" class="form-control" name="id" value="{{ $product->id }}" style="width: 65px">
                            <input type="hidden" class="form-control" name="quantity" aria-describedby="sizing-addon2" value="1" style="width: 65px">
                        </div>
                        <div class="add">
                            <button type="submit" class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @endforeach

        <div class="clearfix"></div>
    </div>
    @endif
</div>
</div>