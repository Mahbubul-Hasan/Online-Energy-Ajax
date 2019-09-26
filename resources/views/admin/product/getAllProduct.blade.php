<div class="table-responsive">
  @if ($products->count() == 0)
      <div class="alert alert-warning" role="alert">
          <b>Sorry!</b> No Data fount.
      </div>
  @else
      
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr>
          <th>#</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Category</th>
          <th>Code</th>
          <th>Price</th>
          <th>Offer Price	</th>
          <th>Short Description</th>
          <th>Long Description</th>
          <th>Popular</th>
          <th>Active</th>
          <th>Date</th>
          <th>Action</th>
      </tr>
      </thead>
      <tfoot>
      <tr>
        <th>#</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Category</th>
        <th>Code</th>
        <th>Price</th>
        <th>Offer Price	</th>
        <th>Short Description</th>
        <th>Long Description</th>
        <th>Popular</th>
        <th>Active</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
      </tfoot>
      <tbody>
      @php($i = 1)
      @foreach($products as $product)
          <tr>
              <td>{{ $i++ }}</td>
              <td>
                <img src="{{ asset($product->photo) }}" width="80"/>
              </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->code }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->Offer_price }}</td>
              <td>{{ substr($product->short_description	, 0, 50) }}...</td>
              <td>{!! substr($product->long_description	, 0, 50) !!}...</td>
              <td>{{ $product->popular == 1 ? "Popular" : "Unpopular" }}</td>
              <td>{{ $product->active == 1 ? "Active" : "Inactive" }}</td>
              <td>{{ $product->created_at->format("d-m-Y & h:i:a") }}</td>
              <td>
                  <a id="view" href="{{url('/admin/products', [$product->id])}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                  <a id="edit" href="{{url('/admin/products', [$product->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                  <a id="delete" href="{{url('/admin/products', [$product->id])}}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
              </td>
          </tr>
      @endforeach
      </tbody>
  </table>
  {{ $products->links() }}

  @endif
</div>
