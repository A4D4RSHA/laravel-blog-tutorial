@php
$categories = \App\Models\Category::withCount('posts')->get();
@endphp

<div class="card">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
        <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{ route('category', $category->id) }}">
                    {{ $category->name }}
                </a>

                ( {{ $category->posts_count }} )
            </li>
            @endforeach
        </ul>
    </div>
</div>