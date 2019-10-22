<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Oder Details For Order <strong id="orderID"></strong></h3>
    </div>
    <div class="modal-body" >
        <div class="table-responsive">
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
                                    <td scope="col">{{ number_format($price * $quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        </div>  
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>