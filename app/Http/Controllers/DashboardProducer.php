<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use App\Http\Requests\Dashboard\Component\ProducerStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Producer;
use Illuminate\Http\RedirectResponse;

class DashboardProducer extends Controller
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
    public function store(ProducerStoreRequest $request) : RedirectResponse
    {
        Producer::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Producer::create(['anime_id' => $request->anime_id, 'producer_id' => Producer::where('producer', $request->producer)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Producer Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producer $producer)
    {
        //
    }
}
