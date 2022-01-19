<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=86c8a3be2a4d1c76b27dd84ae53b2ca4')
                                ->json()['results'];

        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=86c8a3be2a4d1c76b27dd84ae53b2ca4')
                                ->json()['results'];

        $genresMovies = Http::get('https://api.themoviedb.org/3//genre/movie/list?api_key=86c8a3be2a4d1c76b27dd84ae53b2ca4')
                                ->json()['genres'];

        $genres = collect($genresMovies)->mapWithKeys(function ($key) {
            return [$key['id'] => $key['name']];
        });

        return view('index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies
        ]);
    }

    public function show($id)
    {
        $getMovie = Http::get("https://api.themoviedb.org/3/movie/{$id}?api_key=86c8a3be2a4d1c76b27dd84ae53b2ca4&append_to_response=credits,videos,images")
        ->json();

        return view('show', compact('getMovie'));
    }
}
