<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Anime\AnimeAliasStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeAliasUpdateRequest;
use App\Http\Requests\Dashboard\Component\AnimeGenreStoreRequest;
use App\Http\Requests\Dashboard\Component\AnimeLicensorStoreRequest;
use App\Http\Requests\Dashboard\Component\AnimeMistakeStoreRequest;
use App\Http\Requests\Dashboard\Component\AnimeProducerStoreRequest;
use App\Http\Requests\Dashboard\Component\AnimeStudioStoreRequest;
use App\Http\Requests\Dashboard\Component\AnimeThemeStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Alias;
use App\Models\Anime_Genre;
use App\Models\Anime_Licensor;
use App\Models\Anime_Mistake;
use App\Models\Anime_Producer;
use App\Models\Anime_Relation_Genre;
use App\Models\Anime_Relation_Licensor;
use App\Models\Anime_Relation_Producer;
use App\Models\Anime_Relation_Studio;
use App\Models\Anime_Relation_Theme;
use App\Models\Anime_Studio;
use App\Models\Anime_Theme;
use App\Models\Video_Anime;
use App\Models\Video_Anime_Mistake;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeComponents extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }

    /**
     * Store Component Anime
     */    
    public function storeAlias(AnimeAliasStoreRequest $request) : RedirectResponse
    {
        Anime_Alias::create($request->validated());
        Anime::find($request->anime_id)->touch();

        return back()->with('success', "New Data Anime Alias Added");
    }
    
    public function storeProducer(AnimeProducerStoreRequest $request) : RedirectResponse
    {
        Anime_Producer::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Relation_Producer::create(['anime_id' => $request->anime_id, 'producer_id' => Anime_Producer::where('producer', $request->producer)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Producer Added');
    }

    public function storeLicensor(AnimeLicensorStoreRequest $request) : RedirectResponse
    {
        Anime_Licensor::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Relation_Licensor::create(['anime_id' => $request->anime_id, 'licensor_id' => Anime_Licensor::where('licensor', $request->licensor)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Licensor Added');
    }

    
    public function storeStudio(AnimeStudioStoreRequest $request) : RedirectResponse
    {
        Anime_Studio::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Relation_Studio::create(['anime_id' => $request->anime_id, 'studio_id' => Anime_Studio::where('studio', $request->studio)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Studio Added');
    }
    
    public function storeGenre(AnimeGenreStoreRequest $request) : RedirectResponse
    {
        Anime_Genre::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Relation_Genre::create(['anime_id' => $request->anime_id, 'genre_id' => Anime_Genre::where('genre', $request->genre)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Genre Added');
    }
    
    public function storeTheme(AnimeThemeStoreRequest $request)
    {
        Anime_Theme::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Relation_Theme::create(['anime_id' => $request->anime_id, 'theme_id' => Anime_Theme::where('theme', $request->theme)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Theme Added');
    }
    
    public function storeMistake(AnimeMistakeStoreRequest $request)
    {
        Anime_Mistake::create($request->validated());

        if (isset($request->video_anime_id)) {
            Video_Anime_Mistake::create(['video_anime_id' => $request->video_anime_id, 'mistake_id' => Anime_Mistake::where('mistake', $request->mistake)->first('id')->id]);
            Video_Anime::find($request->video_anime_id)->touch();
        }

        return back()->with('success', 'New Data Mistake Added');
    }

    /**
     * Update Anime Component
     */
    public function updateAlias(AnimeAliasUpdateRequest $request, Anime_Alias $anime_Alias) : RedirectResponse
    {
        if ($request->submit === 'update') {
            $anime_Alias->where('id', $request->id)->update($request->validated());
            Anime::find($request->anime_id)->touch();
            
            return back()->with('success', "Data Anime Alias Updated Successfully");
        }

        $this->destroyAlias($anime_Alias, $request->id);
        Anime::find($request->anime_id)->touch();

        return back()->with('success', "Data Anime Alias Deleted Successfully");
    }

    /**
     * Delete Anime Component
     */
    public function destroyAlias(Anime_Alias $anime_Alias, String $id) : void
    {
        $anime_Alias->where('id', $id)->delete();
    }
}
