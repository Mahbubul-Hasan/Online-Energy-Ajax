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
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add Product</button>
        </div>
      </div>
    </div>
</div>


<!--View Product Modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewProductModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                <b>Photo: </b>
                <img id="pPhoto" src="" width="80"/>
            </div>
            <div>
                <b>Name: </b>
                <span id="pName"></span>
            </div>
            <div>
                <b>Category: </b>
                <span id="pCategory"></span>
            </div>
            <div>
                <b>Code: </b>
                <span id="pCode"></span>
            </div>
            <div>
                <b>Price: </b>
                <span id="pPrice"></span>
            </div>
            <div>
                <b>Offer Price: </b>
                <span id="pOfferPrice"></span>
            </div>
            <div>
                <b>Short Description: </b>
                <span id="pSDescription"></span>
            </div>
            <div>
                <b>Long Description: </b>
                <span id="pLDescription"></span>
            </div>
            <div>
                <b>Popular: </b>
                <span id="pPopular"></span>
            </div>
            <div>
                <b>Active: </b>
                <span id="pActive"></span>
            </div>
            <div>
                <b>Date:</b>
                <span id="pDate"></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection

@section("extra-js")
    <script src="{{ asset("/") }}asset/admin/js/product/script.js"></script>
@endsection
