@props(['category'])

<div>
    {{ $category->title }}
    ({{ $category->depth }})
    @foreach ($category->children as $child)
        <div style="margin-left: 20px">
            <x-category-item :category="$child" />
        </div>
    @endforeach
</div>


{{-- build su dung recursion trong model -> tao ra generate html -> {!! $categories !!} --}}
