<x-app-layout title="Movie Cast - Movie & Tv Shows">
    <div class="container px-4 pt-16">
        <div class="popular-movies">
            <h1 class="uppercase tracking-wider text-purple-600 text-lg font-semibold">Popular Movies</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse ($popularMovies as $movie)
                    <div class="mt-8">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ "https://image.tmdb.org/t/p/w500/" . $movie['poster_path']
                            }}" alt="example" class="hover:opacity-75 w-64 md:w-96 transition case-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><svg class="fill-current text-amber-600 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                </span>
                                <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('d F, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm mt-2">
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-purple-600 text-lg font-semibold">Now Playings</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse ($nowPlayingMovies as $playingMovie)
                    <div class="mt-8">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src={{ "https://image.tmdb.org/t/p/w500/" . $playingMovie['poster_path']
                        }} alt="example" class="hover:opacity-75 transition case-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $playingMovie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><svg class="fill-current text-amber-600 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                </span>
                                <span class="ml-1">{{ $playingMovie['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($playingMovie['release_date'])->format('d F, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm mt-2">
                                @foreach ($playingMovie['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
