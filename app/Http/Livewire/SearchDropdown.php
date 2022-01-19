<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';

    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
    }

    public function render()
    {
        $searchResults = [];

        if (Str::length($this->search) >= 2) {
            $searchResults = Http::get("https://api.themoviedb.org/3/search/movie?query={$this->search}&api_key={$this->apiKey}")
            ->json()['results'];
        }

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7)
        ]);
    }
}
