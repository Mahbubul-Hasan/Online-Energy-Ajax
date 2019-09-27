@extends('admin.master')

@section('title')
    Product
@endsection
@section('extra-css')
{{-- <link rel="stylesheet" href="{{ asset("/") }}asset/admin/ckeditor/samples/css/samples.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset("/") }}asset/admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css"> --}}

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

          <div class="table-responsive" id="showAllProduct">
            
            @include('admin.product.getAllProduct')
              
          </div>
      </div>
</div>
<div id="getAllProduct" data-url="{{ url("/admin/getAllProduct") }}"></div>
<div id="getAllProductByPagination" data-url="{{ url("/admin/getAllProductByPagination") }}"></div>


<!--Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="addProductForm" action="{{ url("admin/products") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
    
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fab fa-acquisitions-incorporated"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Product Name" name="name">
                      </div>
                      <p class="errorName" style="display: none; color: red;"></p>
                      
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="category_id">
                          <option value="" selected>Choose Category Name...</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <p class="errorCategoryName" style="display: none; color: red;"></p>
    
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-code"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Product Code" name="code">
                      </div>
                      <p class="errorProductCode" style="display: none; color: red;"></p>
    
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                          <span class="input-group-text">0.00</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Product Price" name="price">
                      </div>                  
                      <p class="errorProductPrice" style="display: none; color: red;"></p>
    
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">$</span>
                          <span class="input-group-text">0.00</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Product Offer Price (Optional)" name="Offer_price">
                      </div>
                      <p class="errorProductOfferPrice" style="display: none; color: red;"></p>
    
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-text-width"></i></span>
                          </div>
                          <textarea class="form-control" placeholder="Short Description" name="short_description"></textarea>
                      </div>
                      <p class="errorProductShortDescription" style="display: none; color: red;"></p>
    
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                          </div>
                          <textarea class="form-control" placeholder="Long Description" rows="5" name="long_description"></textarea>
                      </div>
                      <p class="errorProductLongDescription" style="display: none; color: red;"></p>
    
                      <div class="form-group">
                          <label class="mr-3">Popular: </label>
                          <input type="radio" value="1" name="popular">
                          <label class="mr-5" style="font-weight: normal;">Popular </label>
    
                          <input type="radio"  value="0" name="popular" checked>
                          <label style="font-weight: normal;">Unpopular</label>
                      </div>
    
                      <div class="form-group">
                          <label class="mr-3">Active: </label>
                          <input type="radio" value="1" name="active" checked>
                          <label class="mr-5" style="font-weight: normal;">Active </label>
    
                          <input type="radio"  value="0" name="active">
                          <label style="font-weight: normal;">Inactive</label>
                      </div>
    
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-camera"></i></span>
                        </div>
                        <div class="">
                          <input class="photo" type="file" name="photo" accept="image/*">
                          <img class="photoView" src="" width="80"/>
                        </div>
                      </div>
                      <p class="errorProductPhoto" style="display: none; color: red;"></p>
    
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Product</button>
                  </div>
              </div>
            </form>
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


<!--Edit Product Modal -->

<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
          <form id="updateProductForm" action="{{ url("admin/products") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fab fa-acquisitions-incorporated"></i></span>
                        </div>
                        <input id="valueId" type="hidden" class="form-control" name="id">
                        <input id="valueName" type="text" class="form-control" placeholder="Product Name" name="name">
                    </div>
                    <p class="errorName" style="display: none; color: red;"></p>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select class="custom-select" id="selectCategory" name="category_id">
                        <option value="" selected>Choose Category Name...</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <p class="errorCategoryName" style="display: none; color: red;"></p>
  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-code"></i></span>
                        </div>
                        <input id="valueProductCode" type="text" class="form-control" placeholder="Product Code" name="code">
                    </div>
                    <p class="errorProductCode" style="display: none; color: red;"></p>
  
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                      </div>
                      <input id="valueProductPrice" type="text" class="form-control" placeholder="Product Price" name="price">
                    </div>                  
                    <p class="errorProductPrice" style="display: none; color: red;"></p>
  
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                      </div>
                      <input id="valueProductOfferPrice" type="text" class="form-control" placeholder="Product Offer Price (Optional)" name="Offer_price">
                    </div>
                    <p class="errorProductOfferPrice" style="display: none; color: red;"></p>
  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-text-width"></i></span>
                        </div>
                        <textarea id="valueProductShortDescription" class="form-control" placeholder="Short Description" name="short_description"></textarea>
                    </div>
                    <p class="errorProductShortDescription" style="display: none; color: red;"></p>
  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-text-height"></i></span>
                        </div>
                        <textarea id="valueProductLongDescription" class="form-control" placeholder="Long Description" rows="5" name="long_description"></textarea>
                    </div>
                    <p class="errorProductLongDescription" style="display: none; color: red;"></p>
  
                    <div class="form-group">
                        <label class="mr-3">Popular: </label>
                        <input id="popular-1" type="radio" value="1" name="popular">
                        <label class="mr-5" style="font-weight: normal;">Popular </label>
  
                        <input id="popular-0" type="radio"  value="0" name="popular">
                        <label style="font-weight: normal;">Unpopular</label>
                    </div>
  
                    <div class="form-group">
                        <label class="mr-3">Active: </label>
                        <input id="active-1" type="radio" value="1" name="active">
                        <label class="mr-5" style="font-weight: normal;">Active </label>
  
                        <input id="active-0" type="radio"  value="0" name="active">
                        <label style="font-weight: normal;">Inactive</label>
                    </div>
  
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-camera"></i></span>
                      </div>
                      <div class="">
                        <input class="photo" type="file" name="photo" accept="image/*">
                        <img class="photoView" src="" width="80"/>
                      </div>
                    </div>
                    <p class="errorProductPhoto" style="display: none; color: red;"></p>
  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-secondary">Update Product</button>
                </div>
            </div>
          </form>
      </div>
  </div>
</div>

@endsection

@section("extra-js")
  <script src="{{ asset("/") }}asset/admin/js/product/script.js"></script>

  {{-- <script src="{{ asset("/") }}asset/admin/ckeditor/ckeditor.js"></script>
  <script src="{{ asset("/") }}asset/admin/ckeditor/samples/js/sample.js"></script>

  <script>
      initSample();
  </script> --}}
@endsection
