<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\Dashboard\GenreStoreRequest;
use App\Models\Anime_Genres;
use Illuminate\Http\RedirectResponse;

class DashboardGenre extends Controller
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
    public function store(GenreStoreRequest $request) : RedirectResponse
    {
        Genre::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Genres::create(['anime_id' => $request->anime_id, 'genre_id' => Genre::where('genre', $request->genre)->first()->id]);
        }

        return back()->with('success', 'New Data Genre Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}