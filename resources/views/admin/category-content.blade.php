<div>
    <h2>Add Category</h2>
    <form action="{{ url('/add_category') }}" method="POST">
        @csrf
        <input class="text-dark" type="text" name="category" placeholder="Write input here">
        <input class="btn btn-primary" type="Submit" name="submit" value="Add Category">
    </form>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Category Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td><a onclick="return confirm('Are you sure you want to delete this category')" class="btn btn-danger" href="{{ url('delete_category', $category->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>