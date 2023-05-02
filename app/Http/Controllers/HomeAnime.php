<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class HomeAnime extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() : View
    {
        return view('home.anime.index', [
            'page' => $this->getUrl(URL::current()),
            'animes' => Anime::orderBy('date_aired', 'DESC')->take(10)->get()
        ]);
    }

    public function details($slug) : View
    {
        return view('home.anime.details', [
            'page' => $this->getUrl(URL::current()),
            'anime' => Anime::where('slug', $slug)->first()
        ]);
    }
}
