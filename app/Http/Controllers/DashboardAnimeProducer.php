<?php

namespace App\Http\Controllers;

use App\Models\Anime_Producer;
use App\Http\Requests\Dashboard\AnimeProducerStoreRequest;
use App\Models\Anime;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeProducer extends Controller
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
    public function store(AnimeProducerStoreRequest $request) : RedirectResponse
    {
        Anime_Producer::where('anime_id', $request->anime_id)->delete();

        if (isset($request->producer_id)) {
            $producers = $request->producer_id;
            foreach ($producers as $producer_id) {
                Anime_Producer::create(['anime_id' => $request->anime_id, 'producer_id' => $producer_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime's Producer Added");
        }

        return back()->with('warning', "No Any Producer Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Producer $anime_Producer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Producer $anime_Producer)
    {
        //
    }
}
