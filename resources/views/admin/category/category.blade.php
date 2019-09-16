@extends('admin.master')

@section('title')
    Category
@endsection

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="card mb-3">
      <div class="card-header pt-3">

          <h3 class="card-title">Category List</h3>

          <div class="card-tools">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCategoryModal">
                  Add Category
                  <i class="fas fa-plus-circle"></i>
              </button>
          </div>
      </div>
          
      <div class="card-body">

          <div class="table-responsive">

              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>Description</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>Description</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                  @php($i = 1)
                  @foreach($categories as $category)
                      <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $category->name }}</td>
                          <td>{{ substr($category->description, 0, 50) }}...</td>
                          <td>{{ $category->active == 1 ? "Active" : "Inactive" }}</td>
                          <td>
                              <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                              <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                              <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>

      </div>
  </div>


<!--Add Category Modal -->

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form id="addCategoryForm" action="{{ url("admin/categories") }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-signature"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Category Name" name="name">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                            </div>
                            <textarea class="form-control" placeholder="Description (Optional)" name="description"></textarea>
                        </div>

                        <div class="form-group">

                            <input type="radio" value="1" name="active">
                            <label class="mr-5">Active </label>

                            <input type="radio"  value="0" name="active">
                            <label>Inactive</label>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section("extra-js")
    <script src="{{ asset("/") }}asset/admin/js/categoty/script.js"></script>
@endsection
