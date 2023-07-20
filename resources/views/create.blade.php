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
    <div class="flex flex-col items-center justify-center h-screen">
        <form action="{{ route('links.store') }}" method="POST" class="mt-20 p-10 rounded-xl backdrop-blur-3xl ">
            @csrf
            <div class="relative mb-6">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"
                        class="fill-blue-500 text-2xl md:text-5xl">
                        <path
                            d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                    </svg>
                </div>
                <input type="url" id="url_long" name="url_long" required
                    class="text-2xl md:text-5xl bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 md:pl-24 p-2 mr-24 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="https://steamcommunity.com/"
                    value="{{ old('url_long', isset($link) ? $link->url_long : '') }}">
            </div>

            <div class="relative mb-2">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 sm:pt-1 pointer-events-none">
                    <span class="text-lg md:text-4xl text-blue-500">{{ env('APP_URL') }}/</span>
                </div>
                <input type="text" id="url_short" name="url_short"
                    class="text-2xl md:text-5xl bg-gray-50 border border-gray-300 text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-[9.2rem] md:pl-[17rem] p-2 pt-1  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="short-link" maxlength="16"
                    value="{{ old('url_short', isset($link) ? $link->url_short : '') }}">
            </div>
            <div class="mb-6">
                <span class="text-md md:text-3xl text-white">*When left empty, a random string will be
                    generated</span>
            </div>

            @if (isset($link))
                <button data-clipboard-text="{{ route('links.show', $link->url_short) }}" type="button"
                    class="btn text-2xl md:text-4xl p-2 md:p-3 block w-full rounded-xl bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Copy</button>
            @else
                <button type="submit"
                    class="text-2xl md:text-4xl p-2 md:p-3 block w-full rounded-xl bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">Generate</button>
            @endif
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.8/dist/clipboard.min.js"></script>
    <script type="text/javascript">
        var Clipboard = new ClipboardJS('.btn');
    </script>

</body>

</html>
