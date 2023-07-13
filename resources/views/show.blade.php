<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LINK SHORTENER</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-white">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="flex flex-col items-center justify-center h-screen">
        <a href="{{ route('links.create') }}" class="text-6xl  mb-10">Shorten new link</a>
        <table>
            <tr class="flex space-x-6">
                <th class="w-56">Old long link</th>
                <th class="w-56">New short link</th>
            </tr>
            @forelse ($links as $link)
                <tr class="flex space-x-6">
                    <td class="w-56">{{ $link->url_long }}</td>
                    <td class="w-56 text-center">{{ $link->url_short }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">{{ __('Sadly there are no links yet...') }}</td>
                </tr>
            @endforelse
        </table>
    </div>
</body>

</html>
