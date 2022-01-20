<x-app-layout title="Movie Cast - Tv Shows">
    <div class="container px-4 pt-16">
        <div class="popular-movies">
            <h1 class="uppercase tracking-wider text-purple-600 text-lg font-semibold">Popular Shows</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse ($populars as $popular)
                    <div class="mt-8">
                        <a href="{{ route('tv.show', $popular['id']) }}">
                            <img src="{{ "https://image.tmdb.org/t/p/w500/" . $popular['poster_path']
                            }}" alt="example" class="hover:opacity-75 w-64 md:w-96 transition case-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('tv.show', $popular['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $popular['name'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><svg class="fill-current text-amber-600 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                </span>
                                <span class="ml-1">{{ $popular['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($popular['first_air_date'])->format('d F, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm mt-2">
                                @foreach ($popular['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if (!$loop->last) @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-purple-600 text-lg font-semibold">Top Rated Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @forelse ($topRated as $rate)
                    <div class="mt-8">
                        <a href="{{ route('tv.show', $rate['id']) }}">
                            <img src={{ "https://image.tmdb.org/t/p/w500/" . $rate['poster_path']
                        }} alt="example" class="hover:opacity-75 transition case-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('tv.show', $rate['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $rate['name'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span><svg class="fill-current text-amber-600 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                                </span>
                                <span class="ml-1">{{ $rate['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($rate['first_air_date'])->format('d F, Y') }}</span>
                            </div>
                            <div class="text-gray-400 text-sm mt-2">
                                @foreach ($rate['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }}@if(!$loop->last) @endif
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
