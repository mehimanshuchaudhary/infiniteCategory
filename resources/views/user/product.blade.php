<h3>Add Product</h3>
<form action="{{ route('product.store') }}" method="post">
    @csrf
    <label for="productName">Product Name:</label>
    <input type="text" id="productName" name="name" required>

    <label for="productPrice">Price:</label>
    <input type="number" id="productPrice" name="price" required>

    <label for="productCategory">Category:</label>
    <select name="category_id[]" id="productCategory" multiple required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @if ($category->children->count() > 0)
                @foreach ($category->children as $child)
                    <option value="{{ $child->id }}">-- {{ $child->name }}</option>
                @endforeach
            @endif
        @endforeach
    </select>

    <button type="submit">Add Product</button>
</form>

<h4>Product List</h4>
<ul>
    @foreach ($products as $product)
        <li>
            {{ $product->name }} - ₹{{ $product->price }}
            ({{ $product->categories->pluck('name')->implode(', ') }})
        </li>
    @endforeach
</ul>
