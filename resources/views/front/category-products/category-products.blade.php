@extends("front.master")

@section('title')
Category/Products
@endsection

@section('content')
<!--All Products-->
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>{{ $category->name }}</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>

        @if ($category_products->count() <= 0) 
        <div class="alert alert-warning">
            <strong>Sorry!!!</strong> No data found.
        </div>
        @else
    <div class="con-w3l">
        @foreach ($category_products as $product)

        <div class="col-md-3 m-wthree" style="margin-bottom: 30px">
            <div class="col-m">
                <a href="{{ url("/product/modal", ["id" => $product->id]) }}" id="productModal" class="offer-img">
                    <img src="{{ $product->photo }}" class="img-responsive" alt="" style="width: 100%">
                </a>
                <div class="mid-1">
                    <div class="women" style="height: 60px;">
                        <b><a href="single.html">{{ $product->name }}</a> (1 kg)</b>
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
                    <div class="add">
                        <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="{{ asset("/") }}asset/front/images/of.png">Add to Cart</button>
                    </div>

                </div>
            </div>
        </div>

        @endforeach

        <div class="clearfix"></div>
    </div>
    @endif
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
                            <b><a href="single.html">{{ $offerProduct->name }}</a> (1 kg)</b>
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

<script>
    $(window).load(function() {

        $('#main-manu-2').addClass('active');

        for (let i = 1; i <= 5; i++){
            if (i == 2) {
                continue;
            }
            $('#main-manu-'+ i).removeClass('active');
        }
    });
</script>
@endsection