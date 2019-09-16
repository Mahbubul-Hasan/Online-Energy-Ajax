<div class="table-responsive">

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
                    <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
