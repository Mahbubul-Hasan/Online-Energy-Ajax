<div class="table-responsive">
    @if (\Cart::isEmpty())
    <div class="alert alert-warning" role="alert">
        <b>Sorry!</b> Your cart is empty.
    </div>
    @else

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (\Cart::getContent() as $product)                
            {{-- @foreach ($carts as $product)                 --}}
            <tr>
                <td>
                    <img src="{{ $product->attributes->photo }}" width="80"/>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($price = $product->price, 2) }}</td>
                <td>
                    <input id="quantity" type="number" value="{{ $quantity = $product->quantity }}">
                </td>
                <td>{{ number_format($price * $quantity, 2) }}</td>
                <td>
                    <a id="cartRemove" href="{{ url("/carts", ["id" => $product->id]) }}" data-token="{{ csrf_token() }}"><i class="fa fa-times" style="color: brown"></i></a>
                </td>
            </tr>            
            @endforeach
            <hr/>
            <tr style="border: 1px solid darkgray;">
                <th colspan="3"></th>
                <th>Total</th>
                <td>{{ number_format($totalPrice = \Cart::getTotal(), 2) }}</td>
                <th>
                    <a id="cartRemoveAll" href="{{ url("/carts/removeAll") }}" data-token="{{ csrf_token() }}"><span class="btn btn-danger btn-xs">Remove All</span></a>
                </th>
            </tr>
            <tr>
                <td colspan="6">Delivery Applicable*</td>
            </tr>
        </tbody>
    </table>
    @endif
</div>

<style>
    #quantity{
        width: 50px;
        padding: 5px;
    }
    /* border: 1px solid darkgray; */
</style>