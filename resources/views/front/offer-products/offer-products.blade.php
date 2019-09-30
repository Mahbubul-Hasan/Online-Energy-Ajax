@extends("front.master")

@section('title')
Offer/Products
@endsection

@section('content')

<!--Offer Products-->

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

        @if ($offer_products->count() <= 0)

        <div class="alert alert-warning">
            <strong>Sorry!!!</strong> No data found.
        </div>
            
        @else

        <div class="con-w3l">
            @foreach ($offer_products as $offerProduct)

            <div class="col-md-3 m-wthree"  style="margin-bottom: 30px">
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
        <a href="#">
            <p style="text-align: center; margin-top: 10px; margin-bottom: 30px;"></p>
        </a>
        
        @endif
    </div>
</div>

<!--Popular Products-->
@if ($popular_products->count() > 0)
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
                        <div class="add">
                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of.png">Add to Cart</button>
                        </div>

                    </div>
                </div>
            </div>

            @endforeach

            <div class="clearfix"></div>
        </div>
        <a href="{{ route("popular.products") }}">
            <p style="text-align: center; margin-top: 10px; margin-bottom: 30px;"><strong>See ALL...</strong></p>
        </a>
    </div>
</div>
@endif

<!-- product -->
@include('front.includes.productmodal')

<script>
    $(window).load(function() {
        $('#main-manu-3').addClass('active');

        for (let i = 1; i <= 5; i++){
            if (i == 3) {
                continue;
            }
            $('#main-manu-'+ i).removeClass('active');
        }
    });
</script>
@endsection