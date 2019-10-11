<!-- Cart -->
<div class="modal fade" id="ViewCartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-info">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cart</h4>
      </div>
      <div class="modal-body modal-spa" id="cartProducts">
        <div id="cartProductUrl" data-url="{{ url("/carts") }}"></div>

        @include('front.cart-products.allCart-product')
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button id="checkout" type="button" href="{{ url("/checkoutView") }}" class="btn btn-success">Check Out</button>
      </div>
    </div>
  </div>
</div>

<style>
  .modal-header{
    padding-bottom: 0px;
  }
  .modal-spa {
    padding-bottom: 0px;
    padding-top: 0px;
  }

  .modal-spa table th {
    text-align: center;
  }
</style>