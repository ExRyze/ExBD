<?php

namespace App\Http\Controllers;

use App\Models\Anime_Theme;
use App\Http\Requests\Dashboard\AnimeThemeStoreRequest;
use App\Models\Anime;

class DashboardAnimeTheme extends Controller
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
    public function store(AnimeThemeStoreRequest $request)
    {
        Anime_Theme::where('anime_id', $request->anime_id)->delete();

        if (isset($request->theme_id)) {
            $themes = $request->theme_id;
            foreach ($themes as $theme_id) {
                Anime_Theme::create(['anime_id' => $request->anime_id, 'theme_id' => $theme_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime's Theme Added");
        }

        return back()->with('warning', "No Any Theme Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Theme $anime_Theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Theme $anime_Theme)
    {
        //
    }
}
