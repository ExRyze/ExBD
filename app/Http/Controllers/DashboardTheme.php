<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Http\Requests\Dashboard\Component\ThemeStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Theme;

class DashboardTheme extends Controller
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
    public function store(ThemeStoreRequest $request)
    {
        Theme::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Theme::create(['anime_id' => $request->anime_id, 'theme_id' => Theme::where('theme', $request->theme)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Theme Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
