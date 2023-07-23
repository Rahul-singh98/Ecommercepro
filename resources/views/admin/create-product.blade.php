<div>
    <h2>Add Product</h2>

    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-label" >Product Title</label>
        <input class="form-control" type="text" name="title" placeholder="Product title" required>

        <label class="form-label" >Product Desciption</label>
        <input class="form-control" type="text" name="description" placeholder="Product description" required>

        <label class="form-label" >Product Price</label>
        <input class="form-control" type="number" name="price" placeholder="Product price" required>

        <label class="form-label" >Product Discount Price</label>
        <input class="form-control" type="number" name="discount_price" placeholder="Product discount_price">

        <label class="form-label" >Product Quantity</label>
        <input class="form-control" type="number" name="quantity" min="0" placeholder="Product quantity" required>

        <label class="form-label" >Product Category</label>
        <select class="form-control form-select" name="category" required>
            <option value="" selected>Add Category</option>
            @foreach($all_categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>


        <label class="form-label" >Product Image</label>
        <input class="form-control" type="file" name="image" required>

        <input class="btn btn-primary mt-2" type="submit" value="Add">
    </form>
</div>