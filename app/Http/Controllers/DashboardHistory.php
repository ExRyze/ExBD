<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\FolderAnimeStoreRequest;
use App\Http\Requests\Dashboard\Folder\FolderAnimeApproveRequest;
use App\Models\Folder_Anime;
use App\Models\History_Video_Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DashboardHistory extends Controller
{
    public function __construct()
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * History Video All Folder
     */
    public function historiesAnime() : View
    {
        return view('dashboard.video.histories', [
            'page' => $this->getUrl(URL::current()),
            'table' => History_Video_Anime::orderBy('slug')->get(),
        ]);
    }

    /**
     * History Video Folder
     */
    public function historyAnime(String $slug) : View
    {
        return view('dashboard.video.history', [
            'page' => $this->getUrl(URL::current()),
            'table' => History_Video_Anime::where('slug', str_replace(['_'], [' '], $slug))->orderBy('episode', 'desc')->get(),
            'slug' =>  $slug
        ]);
    }

    /**
     * Retrive Video
     */
    public function retriveAnime(Request $request, String $slug) : RedirectResponse
    {
        History_Video_Anime::where('id', $request->id)->touch();
        History_Video_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Retrived');
    }

    /**
     * Delete Folder
     */
    public function deleteAnime(Request $request, String $slug) : RedirectResponse
    {
        History_Video_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Permanently Delete');
    }
}
