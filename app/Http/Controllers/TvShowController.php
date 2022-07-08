<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function index()
    {
        $popularTv = Http::get("https://api.themoviedb.org/3/tv/popular?api_key={$this->apiKey}")
        ->json()['results'];

        $topRatedTv = Http::get("https://api.themoviedb.org/3/tv/top_rated?api_key={$this->apiKey}")
                ->json()['results'];

        // dd($topRatedTv);

        $genresArray = Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key={$this->apiKey}")
                ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($key) {
            return [$key['id'] => $key['name']];
        });

        return view('tv.index', [
            'populars' => $popularTv,
            'topRated' => $topRatedTv,
            'genres' => $genres
        ]);
    }

    public function show($id)
    {
        $getTv = Http::get("https://api.themoviedb.org/3/tv/{$id}?api_key={$this->apiKey}&append_to_response=credits,videos,images")
        ->json();

        return view('tv.show', compact('getTv'));
    }
}
