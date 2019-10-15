@extends("front.master")

@section('title')
Checkout
@endsection

@section('content')

<style>
.checkout-content{
    padding: 30px
}    
.mb-3 {
    margin-bottom: 30px
}

.mb-4 {
    margin-bottom: 40px;
}

.bill-title {
    margin-left: -18px;
    margin-bottom: 25px
}

@media only screen and (max-width: 768px) {
    .col-md-8 {
        margin-left: 15px
    }.col-md-4 {
        margin-top: 40px
    }
}
</style>
<div id="checkout-active" hidden>0</div>
<div class="container checkout-content">
    <div class="row">
        
        <div class="col-md-8 order-md-1">
            <h2 class="bill-title">Billing address</h2>
            <form class="needs-validation" action="{{ route('checkout') }}" method="POST" novalidate>
                <div class="row">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Davvy Jone" name="name">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" placeholder="015*********" name="phone">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="you@example.com" name="email">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="radio-inline"><input type="radio" name="location" value="50" checked>Inside Dahka (50tk)</label>
                        <label class="radio-inline"><input type="radio" name="location" value="100">Outside Dahka (100 tk)</label>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="1234 Main St" required style="resize: vertical"></textarea>
                        </div>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
        </div>

        <div class="col-md-4 order-md-2 mb-4">
            <h2 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Price List</span>
            </h2>
            <ul class="list-group mb-3">
                @php( $subtotal = 0 )
                @foreach ($cart_products as $product)
                @php($price = $product->price * $product->qty)
                    
                @php( $subtotal = $subtotal + $price )
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Subtotal: </strong>
                    <span> ৳ </span>
                    <span id="subtotal"> {{ number_format($subtotal, 2) }} </span>
                    {{-- <span id="subtotalW2" hidden></span> --}}
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Derivery Charge: </strong>
                    <span id="cart-count" hidden>{{ $cart_count }}</span>
                    <span> ৳ </span><span id="dCharge"> {{ number_format($dCharge = 50 * $cart_count, 2)}} </span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Price: </span>
                    <span> ৳ </span><strong id="tPrice">{{ number_format($subtotal + $dCharge, 2) }}</strong>
                </li>
            </ul>

            {{-- <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form> --}}
        </div>

    </div>
</div>

@endsection

@section('extra-js')
    
<script>
    $(window).load(function() {
        $("#checkout-active").text(1);
    });
</script>

@endsection