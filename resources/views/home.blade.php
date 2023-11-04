<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        ul {
            list-style-type: none;
            /* Remove list bullets */
            padding: 0;
            margin: 0;
        }

        li {
            padding-left: 16px;
        }

        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        a:active {
            text-decoration: underline;
        }
    </style>
    <title>Document</title>
</head>

<body>
    {{-- using toTree() recursive in Category Model --}}
    {{-- <ul>
        @foreach ($categories as $category)
            <li>
                <a
                    href="{{ route('item', [$category['id']]) }}">{{ str_repeat('- ', $category['depth']) . $category['title'] }}</a>
            </li>
        @endforeach
    </ul> --}}

    {{-- using toHtml() recursive in Category Model --}}
    {{-- {!! $categories !!} --}}

    {{-- using Laravel Ajacency List --}}
    @foreach ($categories as $category)
        <x-item :category=$category />
    @endforeach

</body>

</html>
