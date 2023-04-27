<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\AnimeAliasStoreRequest;
use App\Http\Requests\Dashboard\AnimeAliasUpdateRequest;
use App\Models\Anime_Alias;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeAlias extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimeAliasStoreRequest $request) : RedirectResponse
    {
        Anime_Alias::create($request->validated());

        return back()->with('success', "New Data Anime's Alias Added");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimeAliasUpdateRequest $request, Anime_Alias $anime_Alias, String $id) : RedirectResponse
    {
        if ($request->submit === 'update') {
            $anime_Alias->where('id', $id)->update($request->validated());
            
            return back()->with('success', "Data Anime's Alias Updated Successfully");
        }

        $this->destroy($anime_Alias, $id);

        return back()->with('success', "Data Anime's Alias Deleted Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Alias $anime_Alias, String $id) : void
    {
        $anime_Alias->where('id', $id)->delete();
    }
}
