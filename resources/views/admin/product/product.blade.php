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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">
                  Add Product
                  <i class="fas fa-plus-circle"></i>
              </button>
          </div>
      </div>
          
      <div class="card-body">

          <div class="table-responsive" id="showAllcategory">
            
            {{-- @include('admin.category.getAllcategory') --}}
              
          </div>
      </div>
  </div>
  {{-- <div id="getAllcategory" data-url="{{ url("/admin/getAllcategory") }}"></div>
  <div id="getAllcategoryByPagination" data-url="{{ url("/admin/getAllcategoryByPagination") }}"></div> --}}


<!--Add Category Modal -->


@endsection

@section("extra-js")
    <script src="{{ asset("/") }}asset/admin/js/product/script.js"></script>
@endsection
