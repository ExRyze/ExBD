<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Http\Requests\Dashboard\Anime\AnimeStoreRequest;
use App\Http\Requests\Dashboard\Anime\AnimeUpdateRequest;
use App\Models\Genre;
use App\Models\Licensor;
use App\Models\Producer;
use App\Models\Studio;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class DashboardAnime extends Controller
{
    public $data = [
        'types' => ['TV', 'ONA', 'OVA', 'Special', 'Movie'],
        'statuses' => ['Not yet aired', 'Currently airing', 'Finished airing'],
        'sources' => ['Manga', 'Web manga', 'Light novel', 'Original'],
        'origins' => ['Synonyms', 'Japanese', 'English']
    ];
    
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('dashboard.anime.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime::orderBy('title')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('dashboard.anime.create', [
            'page' => $this->getUrl(URL::current()),
            'data' => $this->data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimeStoreRequest $request) : RedirectResponse
    {
        Anime::create($request->validated());

        return redirect('/dashboard/anime')->with('success', 'New Data Anime Added');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime, String $slug)
    {
        if ($anime->where('slug', $slug)->count() === 0) {
            $slug = str_replace('_', ' ', $slug);
            return redirect('/dashboard/anime')->with('warning', "Error 404: Anime '{$slug}' not found!");
        } else {
            return view('dashboard.anime.edit', [
                'page' => $this->getUrl(URL::current()),
                'data' => $this->data,
                'anime' => $anime->where('slug', $slug)->first(),
                'genres' => Genre::orderBy('genre')->get(),
                'themes' => Theme::orderBy('theme')->get(),
                'producers' => Producer::orderBy('producer')->get(),
                'licensors' => Licensor::orderBy('licensor')->get(),
                'studios' => Studio::orderBy('studio')->get(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimeUpdateRequest $request) : RedirectResponse
    {
        if ($request->file('file') != null) {
            $request->file('file')->storeAs('public/images/animes/'.$request->slug.'/Cover.jpg');
        }

        Anime::where('id', $request->id)->update($request->validated());

        return back()->with('success', 'Data Anime Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) : RedirectResponse
    {
        Anime::where('id', $request->id)->delete();

        return redirect('/dashboard/anime')->with('success', 'Data Anime Deleted Successfully');
    }
}
