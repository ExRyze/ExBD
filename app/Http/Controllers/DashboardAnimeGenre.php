<?php

namespace App\Http\Controllers;

use App\Models\Anime_Genres;
use App\Http\Requests\Dashboard\AnimeGenreStoreRequest;
use App\Http\Requests\Dashboard\AnimeGenreUpdateRequest;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeGenre extends Controller
{
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
        Anime_Genres::where('anime_id', $request->anime_id)->delete();

        if (isset($request->genre_id)) {
            $genres = $request->genre_id;
            foreach ($genres as $genre_id) {
                Anime_Genres::create(['anime_id' => $request->anime_id, 'genre_id' => $genre_id]);
            }
            return back()->with('success', "New Data Anime's Genre Added");
        }

        return back()->with('warning', "No Any Genre Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Genres $anime_Genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime_Genres $anime_Genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimeGenreUpdateRequest $request, Anime_Genres $anime_Genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Genres $anime_Genre)
    {
        //
    }
}