<h3>Category Page</h3>

<form id="categoryForm" action="store" method="post">
    @csrf
    <label for="addCategory">Category Name:</label>
    <input type="text" id="addCategory" name="name" required>

    <label for="parentCategory">Parent Category:</label>
    <select name="parent_id" id="parentCategory">
        <option value="">Root Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @if ($category->children->count() > 0)
                @include('partials.category_options', ['categories' => $category->children, 'prefix' => '--'])
            @endif
        @endforeach
    </select>

    <button type="submit">Add Category</button>
</form>

<h4>Categories</h4>
<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}
            @if ($category->children->count() > 0)
                <ul>
                    @include('partials.category_list', ['categories' => $category->children])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
