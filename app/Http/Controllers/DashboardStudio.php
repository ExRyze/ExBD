<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Http\Requests\Dashboard\StudioStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Studio;
use Illuminate\Http\RedirectResponse;

class DashboardStudio extends Controller
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
    public function store(StudioStoreRequest $request) : RedirectResponse
    {
        Studio::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Studio::create(['anime_id' => $request->anime_id, 'studio_id' => Studio::where('studio', $request->studio)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Studio Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Studio $studio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Studio $studio)
    {
        //
    }
}
