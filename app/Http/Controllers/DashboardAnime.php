<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Http\Requests\Dashboard\AnimeStoreRequest;
use App\Http\Requests\Dashboard\AnimeUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class DashboardAnime extends Controller
{
    public $data = [
        'type' => ['TV', 'ONA', 'OVA', 'Special', 'Movie'],
        'status' => ['Not yet aired', 'Currently airing', 'Finished airing'],
        'source' => ['Manga', 'Web manga', 'Light novel', 'Original']
    ];

    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('dashboard.anime.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime::all()
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
     * Display the specified resource.
     */
    public function show(Anime $anime) 
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime, String $slug) : View
    {
        if ($anime->where('slug', $slug)->count() === 0) {
            return redirect('/dashboard/anime');
        } else {
            return view('dashboard.anime.edit', [
                'page' => $this->getUrl(URL::current()),
                'data' => $this->data,
                'anime' => $anime->where('slug', $slug)->first()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimeUpdateRequest $request, Anime $anime, String $id) : RedirectResponse
    {
        $anime->where('id', $id)->update($request->validated());

        return redirect('/dashboard/anime')->with('success', 'Data Anime Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Anime $anime, String $slug) : RedirectResponse
    {
        $anime->where('slug', $slug)->delete();

        return redirect('/dashboard/anime')->with('success', 'Data Anime Deleted Successfully');
    }
}
