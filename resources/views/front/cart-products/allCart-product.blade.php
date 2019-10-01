<div class="table-responsive">
    @if (Cart::count() <= 0)
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
            @php( $sum = 0 )
            @foreach (Cart::content() as $product)               
            <tr>
                <td>
                    <img src="{{ $product->options->photo }}" width="80"/>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($price = $product->price, 2) }}</td>
                <td>
                    <input id="quantity" type="number" name="quantity" value="{{ $quantity = $product->qty }}" data-url="{{ url("/carts/update", ["id" => $product->rowId ]) }}" data-token="{{ csrf_token() }}">
                </td>
                <td>{{ number_format($totalPrice = $price * $quantity, 2) }}</td>
                <td>
                    <a id="cartRemove" href="{{ url("/carts", ["id" => $product->rowId ]) }}" data-token="{{ csrf_token() }}"><i class="fa fa-times" style="color: brown"></i></a>
                </td>
            </tr>
            @php( $sum = $sum + $totalPrice )
            @endforeach
            <hr/>
            <tr style="border: 1px solid darkgray;">
                <th colspan="3"></th>
                <th>Total</th>
                <td>{{ number_format( $sum, 2) }}</td>
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