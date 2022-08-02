<nav class="border-b border-gray-800">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
        <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="{{ route('movies.index') }}">
                    <div class="text-lg text-3xl uppercase font-semibold">
                        <h1>{{ config('app.name') }}</h1>
                    </div>
                </a>
            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Actors</a>
            </li>
        </ul>
        <div class="flex flex-col md:flex-row items-center">
            <livewire:search-dropdown />
            <div class="md:ml-4 mt-3 md:mt-0">
                <img src="https://i.pravatar.cc/150" alt="Avatar" class="rounded-full h-8 w-8">
            </div>
        </div>

    </div>
</nav>
