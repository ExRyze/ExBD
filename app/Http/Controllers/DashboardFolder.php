<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\FolderAnimeStoreRequest;
use App\Http\Requests\Dashboard\Folder\FolderAnimeUpdateRequest;
use App\Models\Anime;
use App\Models\Folder_Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

class DashboardFolder extends Controller
{
    public function __construct()
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Index Folder
     */
    public function folderAnime() : View
    {
        return view('dashboard.video.anime.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Folder_Anime::orderBy('slug')->get(),
            'animes' => Anime::join('folder_animes', 'animes.id', '=', 'folder_animes.anime_id', 'left outer')->where('folder_animes.id', NULL)->orderBy('title')->get()
        ]);
    }

    /**
     * Store Folder
     */
    public function storeAnime(FolderAnimeStoreRequest $request) : RedirectResponse
    {
        Folder_Anime::create($request->validated());

        return redirect('/dashboard/video/anime')->with('success', 'New Folder Anime Added');
    }

    /**
     * Update Folder
     */
    public function updateAnime(FolderAnimeUpdateRequest $request) : RedirectResponse
    {
        Folder_Anime::where('id', $request->id)->update($request->validated());

        if ($request->submit === 'approve') {
            return redirect('/dashboard/video/anime')->with('success', 'Folder Approved');
        } else {
            return redirect('/dashboard/video/anime')->with('warning', 'Folder Refused');
        }
    }

    /**
     * Delete Folder
     */
    public function deleteAnime(String $id) : RedirectResponse
    {
        Folder_Anime::where('id', $id)->delete();

        return redirect('/dashboard/video/anime')->with('success', 'Folder Anime Deleted');
    }
}
