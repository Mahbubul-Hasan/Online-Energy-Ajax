@extends("front.master")

@section('title')
Single/Products
@endsection

@section('content')

<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
                <div class="single-w3agile">

                    <div id="picture-frame">
                        <img src="{{ $product->photo }}" data-src="{{ $product->photo }}" alt="" class="img-responsive" />
                    </div>

                    <script src="{{ asset("/") }}asset/front/js/jquery.zoomtoo.js"></script>
                    <script>
                        $(function() {
                            $("#picture-frame").zoomToo({
                                magnify: 1
                            });
                        });
                    </script>

                </div>
            </div>
            <div class="col-md-7 single-top-left ">
                <div class="single-right">
                    <h3>{{ $product->name }}</h3>
                    <div class="pr-single">
                        @if ($product->Offer_price )
                        <p class="reduced "><del>৳ {{ $product->price }}</del><strong class="item_price"> ৳ {{ $product->Offer_price }}</strong></p>
                        @else
                        <p class="reduced "><strong>৳ {{ $product->price }}</strong></p>
                        @endif
                    </div>
                    <div class="block block-w3">
                        <div class="starbox small ghosting"> </div><br>
                    </div>
                    
                    <p class="in-pa"><b>Quick Overview:</b> {{ $product->short_description }} </p>
                    <p class="in-pa"><b>Full Details:</b> {{ $product->long_description }} </p>
                    
                    <div class="add add-3" style="margin-bottom: 30px">
                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<!--Offer Products-->
@if ($offer_products->count() > 0)
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
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of.png">Add to Cart</button>
                        </div>

                    </div>
                </div>
            </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
        <a href="{{ route("offer.products") }}">
            <p style="text-align: center; margin-top: 10px; margin-bottom: 30px;"><strong>See ALL...</strong></p>
        </a>
    </div>
</div>
@endif

<!-- product -->
@include('front.includes.productmodal')

@endsection