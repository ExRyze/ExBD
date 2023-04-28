<?php

namespace App\Http\Controllers;

use App\Models\Anime_Studio;
use App\Http\Requests\Dashboard\AnimeStudioStoreRequest;
use App\Models\Anime;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeStudio extends Controller
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
    public function store(AnimeStudioStoreRequest $request) : RedirectResponse
    {
        Anime_Studio::where('anime_id', $request->anime_id)->delete();

        if (isset($request->studio_id)) {
            $studios = $request->studio_id;
            foreach ($studios as $studio_id) {
                Anime_Studio::create(['anime_id' => $request->anime_id, 'studio_id' => $studio_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime's Studio Added");
        }

        return back()->with('warning', "No Any Studio Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Studio $anime_Studio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Studio $anime_Studio)
    {
        //
    }
}
