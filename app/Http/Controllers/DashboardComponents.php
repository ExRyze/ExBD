<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Component\GenreStoreRequest;
use App\Http\Requests\Dashboard\Component\LicensorStoreRequest;
use App\Http\Requests\Dashboard\Component\MistakeStoreRequest;
use App\Http\Requests\Dashboard\Component\ProducerStoreRequest;
use App\Http\Requests\Dashboard\Component\StudioStoreRequest;
use App\Http\Requests\Dashboard\Component\ThemeStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Genre;
use App\Models\Anime_Licensor;
use App\Models\Anime_Producer;
use App\Models\Anime_Studio;
use App\Models\Anime_Theme;
use App\Models\Genre;
use App\Models\Licensor;
use App\Models\Mistake;
use App\Models\Producer;
use App\Models\Studio;
use App\Models\Theme;
use App\Models\Video_Anime;
use App\Models\Video_Anime_Mistake;
use Illuminate\Http\RedirectResponse;

class DashboardComponents extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }

    /**
     * Store Component
     */    
    public function storeProducer(ProducerStoreRequest $request) : RedirectResponse
    {
        Producer::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Producer::create(['anime_id' => $request->anime_id, 'producer_id' => Producer::where('producer', $request->producer)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Producer Added');
    }

    public function storeLicensor(LicensorStoreRequest $request) : RedirectResponse
    {
        Licensor::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Licensor::create(['anime_id' => $request->anime_id, 'licensor_id' => Licensor::where('licensor', $request->licensor)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Licensor Added');
    }

    
    public function storeStudio(StudioStoreRequest $request) : RedirectResponse
    {
        Studio::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Studio::create(['anime_id' => $request->anime_id, 'studio_id' => Studio::where('studio', $request->studio)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Studio Added');
    }
    
    public function storeGenre(GenreStoreRequest $request) : RedirectResponse
    {
        Genre::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Genre::create(['anime_id' => $request->anime_id, 'genre_id' => Genre::where('genre', $request->genre)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Genre Added');
    }
    
    public function storeTheme(ThemeStoreRequest $request)
    {
        Theme::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Theme::create(['anime_id' => $request->anime_id, 'theme_id' => Theme::where('theme', $request->theme)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Theme Added');
    }
    
    public function storeMistake(MistakeStoreRequest $request)
    {
        Mistake::create($request->validated());

        if (isset($request->video_anime_id)) {
            Video_Anime_Mistake::create(['video_anime_id' => $request->video_anime_id, 'mistake_id' => Mistake::where('mistake', $request->mistake)->first('id')->id]);
            Video_Anime::find($request->video_anime_id)->touch();
        }

        return back()->with('success', 'New Data Mistake Added');
    }
}
