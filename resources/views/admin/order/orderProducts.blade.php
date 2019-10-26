<div class="modal-header">
    <h5 class="modal-title" id="viewOrderModalLabel"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<div class="modal-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Code</th>
                    <th scope="col">Unit Price (TK)</th>
                    <th scope="col">Qunatity</th>
                    <th scope="col">Total Price (TK)</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @php($subtotal = 0)
                @php($tQuantity = 0)
                @foreach ($orderProducts as $product)
                <tr>
                    <th scope="col">{{ $i++ }}</th>
                    <td scope="col">
                        <img src="{{ $product->product->photo }}" alt="" width="80">
                    </td>
                    <td scope="col">{{ $product->product->name }}</td>
                    <td scope="col">{{ $product->product->code }}</td>
                    <td scope="col">{{ number_format($price = $product->product->price, 2) }}</td>
                    <td scope="col">{{ $quantity = $product->quantity }}</td>
                    <td scope="col">{{ number_format($subtotalPrice = $price * $quantity, 2) }}</td>
                </tr>
                @php($subtotal = $subtotal + $subtotalPrice)
                @php($tQuantity = $tQuantity + $quantity)
                @endforeach
                <tr>
                    <td scope="col" colspan="5"></td>
                    <th scope="col">Sub Total (TK)</th>
                    <td scope="col" id="oSubtotal">{{ number_format($subtotal, 2) }}</td>
                </tr>

                <tr>
                    <td scope="col" colspan="5"></td>
                    <th scope="col">Delivery Charege (TK)</th>
                    <th scope="col" id="tQuantity" hidden>{{ $tQuantity }}</th>
                    <td scope="col" id="odCharege"></td>
                </tr>

                <tr>
                    <td scope="col" colspan="5"></td>
                    <th scope="col">Total (TK)</th>
                    <td scope="col" id="odTotal"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>