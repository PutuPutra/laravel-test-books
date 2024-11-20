<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel App')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    <nav class="bg-gradient-to-r from-blue-600 via-blue-500 to-blue-700 shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-4 md:px-0">
            <div>
                <a href="{{ route('authors.index') }}"
                    class="text-lg font-semibold hover:text-yellow-300 transition
                @if (Request::is('/*')) text-yellow-300 @else text-white @endif">
                    {{ __('messages.authors') }}
                </a>
                <a href="{{ route('books.index') }}"
                    class="ml-6 text-lg font-semibold hover:text-yellow-300 transition
                @if (Request::is('books*')) text-yellow-300 @else text-white @endif">
                    {{ __('messages.books') }}
                </a>
            </div>
            <div>
                <a href="{{ route('change.language', 'en') }}"
                    class="text-sm font-semibold px-4 py-2 bg-white text-blue-600 rounded hover:bg-blue-100 transition
               @if (App::getLocale() === 'en') bg-yellow-300 text-black @endif">
                    EN
                </a>
                <a href="{{ route('change.language', 'id') }}"
                    class="ml-2 text-sm font-semibold px-4 py-2 bg-white text-blue-600 rounded hover:bg-blue-100 transition
               @if (App::getLocale() === 'id') bg-yellow-300 text-black @endif">
                    ID
                </a>
            </div>
        </div>
    </nav>
    <main class="flex-grow container mx-auto mt-6 px-6">
        @yield('content')
    </main>
    <script src="../../js/delete.js"></script>
    <script src="../../js/alert.js"></script>
</body>

</html>
