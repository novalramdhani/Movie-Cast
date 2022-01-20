<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function index()
    {
        $popularMovies = Http::get("https://api.themoviedb.org/3/movie/popular?api_key={$this->apiKey}")
                                ->json()['results'];

        $nowPlayingMovies = Http::get("https://api.themoviedb.org/3/movie/now_playing?api_key={$this->apiKey}")
                                ->json()['results'];

        $genresMovies = Http::get("https://api.themoviedb.org/3//genre/movie/list?api_key={$this->apiKey}")
                                ->json()['genres'];

        $genres = collect($genresMovies)->mapWithKeys(function ($key) {
            return [$key['id'] => $key['name']];
        });

        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies
        ]);
    }

    public function show($id)
    {
        $getMovie = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key={$this->apiKey}&append_to_response=credits,videos,images")
        ->json();

        return view('movies.show', compact('getMovie'));
    }
}
