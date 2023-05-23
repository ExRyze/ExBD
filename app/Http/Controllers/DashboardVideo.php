<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Video\VideoAnimeApproveRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeUpdateRequest;
use App\Models\Anime;
use App\Models\Mistake;
use App\Models\Video_Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

class DashboardVideo extends Controller
{
    public $data = [
        'chapters' => ["True", "False", "Null"],
        'origins' => ["Koenime", "Kusonime", "Oploverz"],
        'types' => ["mkv", "mp4"],
    ];

    public function __construct()
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Index Video
     */
    public function videoAnime(String $slug) : View
    {
        return view('dashboard.video.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime::where('slug', $slug)->first()
        ]);
    }

    /**
     * Create Video
     */
    public function createAnime(String $slug) : View
    {
        return view('dashboard.video.create', [
            'page' => $this->getUrl(URL::current()),
            'anime' => Anime::where('slug', $slug)->first(),
            'data' => $this->data
        ]);
    }

    /**
     * Store Video
     */
    public function storeAnime(VideoAnimeStoreRequest $request, String $slug) : RedirectResponse
    {
        Video_Anime::create($request->validated());

        return redirect('/dashboard/video/anime/'.$slug)->with('success', 'New Video Anime Added');
    }

    /**
     * Edit Video
     */
    public function editAnime(String $slug, String $id) : View
    {
        return view('dashboard.video.edit', [
            'page' => $this->getUrl(URL::current()),
            'mistakes' => Mistake::orderBy('mistake')->get(),
            'anime' => Anime::where('slug', $slug)->first(),
            'video' => Video_Anime::where('id', $id)->first(),
            'data' => $this->data
        ]);
    }

    /**
     * Update Video
     */
    public function updateAnime(VideoAnimeUpdateRequest $request, String $slug) : RedirectResponse
    {
        Video_Anime::where('id', $request->id)->update($request->validated());

        return back()->with('success', 'Video Anime Updated Successfully');
    }

    /**
     * Approve Video
     */
    public function approveAnime(VideoAnimeApproveRequest $request, String $slug) : RedirectResponse
    {
        // dd($request);
        Video_Anime::where('id', $request->id)->update($request->validated());

        if ($request->submit === 'approve') {
            return back()->with('success', 'Video Approved');
        } else if ($request->submit === 'refuse') {
            return back()->with('warning', 'Video Refused');
        }
    }

    /**
     * Delete Video
     */
    public function deleteAnime(String $slug, String $id) : RedirectResponse
    {
        Video_Anime::where('id', $id)->delete();

        return back()->with('success', 'Video Anime Deleted');
    }
}
