<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyecto web</title>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" class="h-12">
                </a>
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" class="border border-gray-200 py-2 px-4 w-1/2">
                </form>
            </div>

            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </header>

        <hr>
        <br>

        @yield('content')

        <p class="py-16">
            <img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
        </p>
    </div>
</body>
</html>
