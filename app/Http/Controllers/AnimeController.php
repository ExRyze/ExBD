<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Http\Requests\AnimeRequest;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('staff.anime.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime::all()
        ]);
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
    public function store(AnimeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimeRequest $request, Anime $anime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        //
    }
}
