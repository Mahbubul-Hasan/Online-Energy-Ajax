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
    .modal-header {
        padding-bottom: 20px;
    }
    .modal-title {
        text-align: center;
    }
    .modal-body {
        padding: 20px;
        border-top: 1px solid #e5e5e5;
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
                    <th scope="col">Total Price (TK)</th>
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
                    <td>{{ number_format($order->totalPrice, 2) }}</td>
                    <td><strong class="{{ $order->status }}">{{ $order->status }}</strong></td>

                    <td>
                        <a id="orderView" data-id="{{ $order->id }}" href="{{ url('/order/details', ["id" => $order->id]) }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#oderDetails">
                            More Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="oderDetails" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="orderProducts">
                @if ($orderProducts != null)
                    @include('front.orderHistory.orderProducts')
                @endif
            </div>
        </div>
    </div>
</div>

@endsection