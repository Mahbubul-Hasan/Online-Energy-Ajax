@extends('admin.master')

@section('title')
    Oder
@endsection

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Oder</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Oder</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card mb-3">
      <div class="card-header pt-3">
          <div class="col-md-10">
              <input class="admin-search" type="text" placeholder="Search" name="search" />
              <div id="order-search" data-url="{{ url("/admin/orderSearch") }}"></div>
          </div>
      </div>
          
      <div class="card-body">

          <div class="table-responsive" id="showAllOrder">
            
            @include('admin.order.allOrder')
              
          </div>
      </div>
  </div>
  <div id="allOrder" data-url="{{ url("/admin/allOrder") }}"></div>
  <div id="orderPagination" data-url="{{ url("/admin/orderPagination") }}"></div>

<!--View order Modal -->

<div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" id="orderProducts">
            
        </div>
    </div>
</div>

<!--Edit Order Modal -->

<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="updateOrderForm" action="{{ url("/admin/orders") }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOrderModalLabel">Edit Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                            </div>
                            <input id="eOId" type="hidden" class="form-control" name="id">
                            <input id="eOUserId" type="hidden" class="form-control" name="user_id">
                            <input id="eOName" type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                        <p class="errorOName" style="color: red;"></p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
                            </div>
                            <input id="eOPhone" type="text" class="form-control" placeholder="Phone" name="phone">
                        </div>
                        <p class="errorOPhone" style="color: red;"></p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open-text"></i></span>
                            </div>
                            <input id="eOEmail" type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                        <p class="errorOEmail" style="color: red;"></p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                            </div>
                            <textarea id="eOAddress" class="form-control" placeholder="Address" name="address"></textarea>
                        </div>
                        <p class="errorOAddress" style="color: red;"></p>

                        <div class="form-group">
                            <label class="mr-3">Location:</label>
                            <input id="location-50" class="publication-status" type="radio" value="50" name="location">
                            <label class="mr-3">Inside Dhaka</label>

                            <input id="location-100" class="publication-status" type="radio" value="100" name="location">
                            <label class="mr-3">Outside Dhaka</label>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><strong> ৳ </strong></span>
                            </div>
                            <input id="eOTotalPrice" type="text" class="form-control" placeholder="Total Price" name="totalPrice">
                        </div>
                        <p class="errorOTotalPrice" style="color: red;"></p>

                        <div class="form-group">
                            <label class="mr-3">Status:</label>

                            <input id="status-Pending" class="publication-status" type="radio" value="Pending" name="status">
                            <label class="mr-3">Pending</label>

                            <input id="status-Processing" class="publication-status" type="radio" value="Processing" name="status">
                            <label class="mr-3">Processing</label>

                            <input id="status-On-The-Way" class="publication-status" type="radio" value="On-The-Way" name="status">
                            <label class="mr-3">On-The-Way</label>

                            <input id="status-Success" class="publication-status" type="radio" value="Success" name="status">
                            <label class="mr-3">Success</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Update Order</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section("extra-js")
    <script src="{{ asset("/") }}asset/admin/js/order/script.js"></script>
@endsection
