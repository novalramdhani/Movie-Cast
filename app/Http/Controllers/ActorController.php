<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    private $apiKey;

    public $page;

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

        dd($credits);

        return view('actors.show', [
            'getActor' => $getActor,
            'social' => $social,
            'credits' => $credits
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
}
