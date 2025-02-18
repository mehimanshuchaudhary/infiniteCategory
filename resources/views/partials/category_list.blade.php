@foreach ($categories as $category)
    <li>{{ $category->name }}
        @if ($category->children->count() > 0)
            <ul>
                @include('partials.category_list', ['categories' => $category->children])
            </ul>
        @endif
    </li>
@endforeach
