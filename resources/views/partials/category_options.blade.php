@foreach ($categories as $category)
    <option value="{{ $category->id }}">{{ $prefix }} {{ $category->name }}</option>
    @if ($category->children->count() > 0)
        @include('partials.category_options', ['categories' => $category->children, 'prefix' => $prefix . '--'])
    @endif
@endforeach
