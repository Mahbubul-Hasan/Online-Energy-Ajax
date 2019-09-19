<div class="table-responsive">
    @if ($categories->count() == 0)
        <div class="alert alert-warning" role="alert">
            <b>Sorry!</b> No Data fount.
        </div>
    @else
        
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Description</th>
            <th>Active</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Description</th>
            <th>Active</th>
            <th>Date</th>
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
                <td>{{ $category->active == 1 ? "Yes" : "No" }}</td>
                <td>{{ $category->created_at->format("d-m-Y & h:i:a") }}</td>
                <td>
                    <a id="view" href="{{url('/admin/categories', [$category->id])}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                    <a id="edit" href="{{url('/admin/categories', [$category->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a id="delete" href="{{url('/admin/categories', [$category->id])}}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}

    @endif
</div>
