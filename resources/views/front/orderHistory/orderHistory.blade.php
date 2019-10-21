@extends("front.master")

@section('title')
Order Histroy
@endsection

@section('content')

<style>
    table {
        font-size: large;
    }
    tr {
        border: 1px solid #dddddd;
    }
    h2 {
        text-align: center;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .Pending {
        color: chocolate;
    }
    .Processing {
        color: blueviolet;
    }
    .On-The-Way {
        color: blue;
    }
    .Success {
        color: green;
    }
</style>

<div class="container" style="margin-top: 30px">
    <h2>Order Histroy</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                @foreach ($orders as $order)    
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>{{ $order->created_at->format('g:i A') }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>৳ {{ number_format($order->totalPrice, 2) }}</td>
                    <td><strong class="{{ $order->status }}">{{ $order->status }}</strong></td>
                    
                    <td>
                        <a id="view" href="" class="btn btn-info btn-sm"> More Details </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection