<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <div class="text-lg text-3xl uppercase font-semibold">
                            <h1>Lara Movie</h1>
                        </div>
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a href="" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>
            <div class="flex items-center">
                <div class="relative mt-3 md:ml-0">
                    <input type="text" class="bg-gray-800 rounded-full x-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search Movie...">
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
                    </div>
                </div>
                <div class="md:ml-4 mt-3 md:ml-0">
                    <img src="https://i.pravatar.cc/150" alt="Avatar" class="rounded-full h-8 w-8">
                </div>
            </div>

        </div>
    </nav>
    <main id="movie-app">
        {{ $slot }}
    </main>
    <footer class="border border-t border-gray-800">
        <div class="container justify-between mx-auto text-sm px-4 py-6">
            &copy; <a href="" class="text-purple-600 underline">Noval Ramdhani</a> {{ date('Y') }}. Powered by <a href="https://www.themoviedb.org/documentation/api" class="underline hover:text-gray-300">TMDb API</a>
        </div>
    </footer>
</body>
</html>
