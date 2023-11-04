@props(['category'])
<div>
    <a href="{{ route('item', $category->id) }}">{{ $category->title }}</a>

    @foreach ($category->children as $child)
        <div style="margin-left: 20px">
            <x-item :category="$child" />
        </div>
    @endforeach
</div>
