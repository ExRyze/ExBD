<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Anime\AnimeRelationGenreStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationLicensorStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationProducerStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationUpdateRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationStudioStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeRelationThemeStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Relation;
use App\Models\Anime_Relation_Genre;
use App\Models\Anime_Relation_Licensor;
use App\Models\Anime_Relation_Producer;
use App\Models\Anime_Relation_Studio;
use App\Models\Anime_Relation_Theme;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeRelationsMTM extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }

    /**
     * Store Anime Component
     */
    public function storeProducer(AnimeRelationProducerStoreRequest $request) : RedirectResponse
    {
        Anime_Relation_Producer::where('anime_id', $request->anime_id)->delete();

        if (isset($request->producer_id)) {
            $producers = $request->producer_id;
            foreach ($producers as $producer_id) {
                Anime_Relation_Producer::create(['anime_id' => $request->anime_id, 'producer_id' => $producer_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime Producer Added");
        }

        return back()->with('warning', "No Any Producer Selected");
    }
    
    public function storeLicensor(AnimeRelationLicensorStoreRequest $request) : RedirectResponse
    {
        Anime_Relation_Licensor::where('anime_id', $request->anime_id)->delete();

        if (isset($request->licensor_id)) {
            $licensors = $request->licensor_id;
            foreach ($licensors as $licensor_id) {
                Anime_Relation_Licensor::create(['anime_id' => $request->anime_id, 'licensor_id' => $licensor_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime Licensor Added");
        }

        return back()->with('warning', "No Any Licensor Selected");
    }
    
    public function storeStudio(AnimeRelationStudioStoreRequest $request) : RedirectResponse
    {
        Anime_Relation_Studio::where('anime_id', $request->anime_id)->delete();

        if (isset($request->studio_id)) {
            $studios = $request->studio_id;
            foreach ($studios as $studio_id) {
                Anime_Relation_Studio::create(['anime_id' => $request->anime_id, 'studio_id' => $studio_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime Studio Added");
        }

        return back()->with('warning', "No Any Studio Selected");
    }

    public function storeGenre(AnimeRelationGenreStoreRequest $request) : RedirectResponse
    {
        Anime_Relation_Genre::where('anime_id', $request->anime_id)->delete();

        if (isset($request->genre_id)) {
            $genres = $request->genre_id;
            foreach ($genres as $genre_id) {
                Anime_Relation_Genre::create(['anime_id' => $request->anime_id, 'genre_id' => $genre_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime Genre Added");
        }

        return back()->with('warning', "No Any Genre Selected");
    }
    
    public function storeTheme(AnimeRelationThemeStoreRequest $request) : RedirectResponse
    {
        Anime_Relation_Theme::where('anime_id', $request->anime_id)->delete();

        if (isset($request->theme_id)) {
            $themes = $request->theme_id;
            foreach ($themes as $theme_id) {
                Anime_Relation_Theme::create(['anime_id' => $request->anime_id, 'theme_id' => $theme_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime Theme Added");
        }

        return back()->with('warning', "No Any Theme Selected");
    }
    
    public function storeRelation(AnimeRelationStoreRequest $request) : RedirectResponse
    {
        $check_sequel = Anime::where('id', $request->relation_id)->first()->prequel;
        if($request->relation === "Sequel" && $check_sequel->isNotEmpty()) {
            if ($check_sequel[0]->anime_id === $request->anime_id) {
                return back()->with('warning', "Anime can't be a sequel and prequel at the same time!");
            }
        } else if (Anime_Relation::where([['relation', $request->relation], ['relation_id', $request->relation_id]])->first()) {
            return back()->with('warning', "Relation can't be duplicated!");
        }

        Anime_Relation::create($request->validated());

        return back()->with('success', 'New Data Relation Added');
    }

    /**
     * Update Anime Component
     */
    public function updateRelation(AnimeRelationUpdateRequest $request, Anime_Relation $anime_Relation) : RedirectResponse
    {
        if ($request->submit === 'update') {
            $anime_Relation->where('id', $request->id)->update($request->validated());
            
            return back()->with('success', "Data Anime Relation Updated Successfully");
        }

        $this->destroyRelation($anime_Relation, $request->id);

        return back()->with('success', "Data Anime Relation Deleted Successfully");
    }

    /**
     * Delete Anime Component
     */
    public function destroyRelation(Anime_Relation $anime_Relation, String $id)
    {
        $anime_Relation->where('id', $id)->delete();
    }
}
