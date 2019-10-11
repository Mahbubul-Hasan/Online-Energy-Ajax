@extends("front.master")

@section('title')
Checkout
@endsection

@section('content')

<style>
.mb-3{
  margin-bottom: 30px
}
.mb-4{
  margin-bottom: 40px;
}
.bill-title{
  margin-left: -18px;
  margin-bottom: 25px
}
@media only screen and (max-width: 768px) {
  .col-md-8 {
    margin-left: 15px
  }
}
</style>

<div class="container" style="padding-top: 30px; padding-bottom: 30px">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h2 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted" >Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h2>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
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
        <div class="col-md-8 order-md-1">
            <h2 class="bill-title">Billing address</h2>
            <form class="needs-validation" novalidate>
                <div class="row">
                  <div class="mb-3">
                    <label for="email">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Davvy Jone">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="015*********">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection