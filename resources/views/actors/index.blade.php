<x-app-layout title="Movie Cast - List Actors">
    <div class="container px-4 pt-16">
        <div class="popular-movies">
            <h1 class="uppercase tracking-wider text-purple-600 text-lg font-semibold">Popular Actors</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                    <div class="actor mt-8">
                        <a href="{{ route('actors.show', $actor['id']) }}">
                            @if ($actor['profile_path'])
                                <img src="{{ "https://image.tmdb.org/t/p/w235_and_h235_face/" . $actor['profile_path']
                            }}" alt="Profile Image" class="hover:opacity-75 transition ease-in-out duration-150">
                            @else
                                <img src="{{ "https://ui.avatars.com/api?size=235&name=" . $actor['name']
                            }}" alt="Profile Image" class="hover:opacity-75 transition ease-in-out duration-150">
                            @endif
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                                collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
                            )->implode(', ') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="page-load-status my-8">
            <div class="flex justify-center">
                <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
            </div>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>
    </div>
    @section('scripts')
        <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
        <script>
            let elem = document.querySelector('.grid');
            let infScroll = new InfiniteScroll( elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status'
            });
        </script>
    @endsection
</x-app-layout>
