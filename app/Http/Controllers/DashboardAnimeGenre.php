<?php

namespace App\Http\Controllers;

use App\Models\Anime_Genre;
use App\Http\Requests\Dashboard\Anime\AnimeGenreStoreRequest;
use App\Models\Anime;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeGenre extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimeGenreStoreRequest $request) : RedirectResponse
    {
        Anime_Genre::where('anime_id', $request->anime_id)->delete();

        if (isset($request->genre_id)) {
            $genres = $request->genre_id;
            foreach ($genres as $genre_id) {
                Anime_Genre::create(['anime_id' => $request->anime_id, 'genre_id' => $genre_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime's Genre Added");
        }

        return back()->with('warning', "No Any Genre Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Genre $anime_Genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Genre $anime_Genre)
    {
        //
    }
}
