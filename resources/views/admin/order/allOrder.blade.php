<style>
    #Pending {
        color: chocolate;
    }
    #Processing {
        color: blueviolet;
    }
    #On-The-Way {
        color: blue;
    }
    #Success {
        color: green;
    }
</style>


<div class="table-responsive">
    @if ($orders->count() == 0)
        <div class="alert alert-warning" role="alert">
            <b>Sorry!</b> No order fount.
        </div>
    @else
        
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>User Name</th>
            <th>Shipping Name</th>
            <th>Shipping Phone</th>
            <th>Shipping Email</th>
            <th>Shipping Address</th>
            <th>Delivery Location</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>User Name</th>
            <th>Shipping Name</th>
            <th>Shipping Phone</th>
            <th>Shipping Email</th>
            <th>Shipping Address</th>
            <th>Delivery Location</th>
            <th>Total Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </tfoot>
        <tbody>
            @php($i = 1)
            @foreach ($orders as $order)    
            <tr>
                <th>{{ $i++ }}</th>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>{{ $order->created_at->format('g:i A') }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->location == 50 ? "Inside Dhaka" : "Outside Dhaka" }}</td>
                <td>{{ number_format($order->totalPrice, 2) }}</td>
                <th id="{{ $order->status }}">{{ $order->status }}</th>
                <td>
                    <a id="view" href="{{url('/admin/orders', [$order->id])}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a id="edit" href="{{url('/admin/orders', [$order->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a id="delete" href="{{url('/admin/orders', [$order->id])}}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $orders->links() }} --}}

    @endif
</div>
