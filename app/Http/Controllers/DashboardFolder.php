<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\FolderAnimeStoreRequest;
use App\Http\Requests\Dashboard\Folder\FolderAnimeApproveRequest;
use App\Models\Anime;
use App\Models\Folder_Anime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('dashboard.folder.anime', [
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

        return back()->with('success', 'New Folder Anime Added');
    }

    /**
     * Approve Folder
     */
    public function approveAnime(FolderAnimeApproveRequest $request) : RedirectResponse
    {
        Folder_Anime::where('id', $request->id)->update($request->validated());

        if ($request->submit === 'approve') {
            return back()->with('success', 'Folder Approved');
        } else {
            return back()->with('warning', 'Folder Refused');
        }
    }

    /**
     * Delete Folder
     */
    public function deleteAnime(Request $request) : RedirectResponse
    {
        Folder_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Folder Anime Deleted');
    }
}
