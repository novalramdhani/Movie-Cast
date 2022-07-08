<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    private string $apiKey;

    public int $page;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function index($page = 1)
    {
        abort_if($page > 500, 204);

        $popularActors = Http::get("https://api.themoviedb.org/3/person/popular?page={$page}&api_key={$this->apiKey}")
        ->json()['results'];

        return view('actors.index', [
            'popularActors' => $popularActors,
            'previous' => $this->previous(),
            'next' => $this->next()
        ]);
    }

    public function show($id)
    {
        $getActor = Http::get("https://api.themoviedb.org/3/person/{$id}?api_key={$this->apiKey}")
        ->json();

        $social = Http::get("https://api.themoviedb.org/3/person/{$id}/external_ids?api_key={$this->apiKey}")
                    ->json();

        $credits = Http::get("https://api.themoviedb.org/3/person/{$id}/combined_credits?api_key={$this->apiKey}")
        ->json();

        return view('actors.show', [
            'getActor' => $getActor,
            'social' => $social,
            'credits' => $this->credits($credits),
            'knowForMovies' => $this->knowForMovies($credits)
        ]);
    }

    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }

    public function knowForMovies($type)
    {
        $castTitles = collect($type)->get('crew');

        return collect($castTitles)->where('media_type', 'movie')->sortByDesc('popularity')->take(5)->map(function ($movie) {
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                                    ? 'https://image.tmdb.org/t/p/w185' . $movie['poster_path']
                                    : 'https://via.placeholder.com/185x278',
                'title' => isset($movie['title']) ? $movie['title'] : 'Untitled'
            ]);
        });
    }

    public function credits($type)
    {
        $castMovies = collect($type)->get('cast');

        return collect($castMovies)->map(function($movie) {
            if (isset($movie['release_date'])) {
                $releaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $releaseDate = $movie['first_air_date'];
            } else {
                $releaseDate = '';
            }

            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id']) : null,
            ])->only([
                'release_date', 'release_year', 'title', 'character', 'linkToPage',
            ]);
        })->sortByDesc('release_date');
    }
}
