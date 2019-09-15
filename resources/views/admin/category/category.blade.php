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
              <button class="btn btn-success">
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
                      <th>Slug</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>#</th>
                      <th>name</th>
                      <th>Slug</th>
                      <th>Publication Status</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                      <tr>
                          <td>#</td>
                          <td>name</td>
                          <td>Slug</th>
                          <td>publication status</td>
                          <td>Action</td>
                      </tr>
                  </tbody>
              </table>
          </div>

      </div>
  </div>
</div>
@endsection