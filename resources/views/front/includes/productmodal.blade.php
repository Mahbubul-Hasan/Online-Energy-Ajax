<!-- product -->
<div class="modal fade" id="ViewProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="col-md-5 span-2">
                    <div class="item">
                        <img id="viewImage" src="{{ asset("/") }}asset/front/images/of.png" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-7 span-1 ">
                    <h3 id="viewName">Moong(1 kg)</h3>

                    <div class="price_single">
                        <span id="viewPrice" class="reducedfrom "></span>

                        <div class="clearfix"></div>
                    </div>
                    <h4 class="quick">Quick Overview:</h4>
                    <p class="quick_desc" id="viewOverview"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
                    <form id="addToCartForm" action="{{ url("/carts") }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2">Quantity</span>
                            <input id="viewId" type="hidden" class="form-control" name="id" style="width: 65px">
                            <input id="viewQuantity" type="number" class="form-control" name="quantity" aria-describedby="sizing-addon2" value="1" style="width: 65px">
                        </div>
                        <div class="add-to" style="margin-bottom: 30px">
                            <button type="submit" class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>