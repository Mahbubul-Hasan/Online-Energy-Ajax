@extends('admin.master')

@section('title')
    Product
@endsection

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card mb-3">
      <div class="card-header pt-3">

          <div class="col-md-10">
              
              <input class="admin-search" type="text" placeholder="Search" name="search" />
              <div id="category-search" data-url=""></div>
          </div>

          <div class="card-tools">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductModal">
                  Add Product
                  <i class="fas fa-plus-circle"></i>
              </button>
          </div>
      </div>
          
      <div class="card-body">

          <div class="table-responsive" id="showAllcategory">
            
            @include('admin.product.getAllProduct')
              
          </div>
      </div>
  </div>
  {{-- <div id="getAllcategory" data-url="{{ url("/admin/getAllcategory") }}"></div>
  <div id="getAllcategoryByPagination" data-url="{{ url("/admin/getAllcategoryByPagination") }}"></div> --}}


<!--Add Product Modal -->
<div id="addProductModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body"></div>
              <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Add Product</button>
          </div>
      </div>
    </div>
</div>

@endsection

@section("extra-js")
    <script src="{{ asset("/") }}asset/admin/js/product/script.js"></script>
@endsection
