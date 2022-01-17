<x-app-layout title="Detail Movie">
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="https://cdn.myanimelist.net/images/anime/1585/119093.jpg" alt="example" class="hover:opacity-75 w-64 md:w-96 transition case-in-out duration-150 mb-3" style="width: 24rem">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">Kage no Jitsuryokusha</h2>
                <div class="flex items-center text-gray-400 text-sm mt-3">
                    <span><svg class="fill-current text-amber-600 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    </span>
                    <span class="ml-1">100%</span>
                    <span class="mx-2">|</span>
                    <span>1 January 2022</span>
                    <span class="mx-2">|</span>
                    <span>Action, Fantasy, Romance, Harem</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam ipsa, molestiae reprehenderit voluptatibus distinctio laboriosam aperiam corrupti explicabo et excepturi eligendi voluptatem porro obcaecati deserunt repudiandae dolore veniam hic expedita!
                </p>

                <div class="mt-12">
                    <h2 class="text-white font-semibold">Feature Cast</h2>
                    <div class="flex mt-4">
                        <div>
                            <div>User 1</div>
                            <div class="text-sm text-gray-400">Role</div>
                        </div>
                        <div class="ml-8">
                            <div>User 1</div>
                            <div class="text-sm text-gray-400">Role</div>
                        </div>
                    </div>
                </div>
                <div class="mt-12">
                    <button class="flex items-center bg-purple-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-purple-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Movie Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                {{-- @foreach ($movie['cast'] as $cast) --}}
                    <div class="mt-8">
                        {{-- <a href="{{ route('actors.show', $cast['id']) }}"> --}}
                            <img src="" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            {{-- <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a> --}}
                            <div class="text-sm text-gray-400">
                                {{-- {{ $cast['character'] }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        {{-- <a href="{{ route('actors.show', $cast['id']) }}"> --}}
                            <img src="" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            {{-- <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a> --}}
                            <div class="text-sm text-gray-400">
                                {{-- {{ $cast['character'] }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        {{-- <a href="{{ route('actors.show', $cast['id']) }}"> --}}
                            <img src="" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            {{-- <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a> --}}
                            <div class="text-sm text-gray-400">
                                {{-- {{ $cast['character'] }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        {{-- <a href="{{ route('actors.show', $cast['id']) }}"> --}}
                            <img src="" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            {{-- <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a> --}}
                            <div class="text-sm text-gray-400">
                                {{-- {{ $cast['character'] }} --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        {{-- <a href="{{ route('actors.show', $cast['id']) }}"> --}}
                            <img src="" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            {{-- <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a> --}}
                            <div class="text-sm text-gray-400">
                                {{-- {{ $cast['character'] }} --}}
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
</x-app-layout>
