<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\FolderAnimeApproveRequest;
use App\Http\Requests\Dashboard\Folder\FolderAnimeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeApproveRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeUpdateRequest;
use App\Models\Anime;
use App\Models\Anime_Folder;
use App\Models\Anime_History_Video;
use App\Models\Anime_Mistake;
use App\Models\Anime_Video;
use App\Models\Anime_Video_Mistake;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class DashboardAnimeVideo extends Controller
{
    protected $data = [
        'chapters' => ["True", "False", "Null"],
        'origins' => ["Adikanime", "Koenime", "Kusonime", "Oploverz", "Samehadaku", "Twitter Subs", "Unknown"],
        'types' => ["mkv", "mp4"],
    ];

    public function __construct(Request $request)
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);

        // $this->checkFolder($request->route('slug'));
    }

    // public function checkFolder(String $slug) : RedirectResponse
    // {
    //     if (Anime::where('slug', $slug)->count() === 0) {
    //         $slug = str_replace('_', ' ', $slug);
    //         return redirect('/dashboard/folder/anime')->with('warning', "Error 404: Folder '{$slug}' not found!");
    //     }
    // }

    /**
     * Index Folder
     */
    public function folder() : View
    {
        return view('dashboard.folder.anime', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime_Folder::orderBy('slug')->get(),
            'animes' => Anime::join('anime_folders', 'animes.id', '=', 'anime_folders.anime_id', 'left outer')->where('anime_folders.id', NULL)->orderBy('title')->get()
        ]);
    }

    /**
     * Store Folder
     */
    public function storeFolder(FolderAnimeStoreRequest $request) : RedirectResponse
    {
        Anime_Folder::create($request->validated());

        return back()->with('success', 'New Folder Anime Added');
    }

    /**
     * Approve Folder
     */
    public function approveFolder(FolderAnimeApproveRequest $request) : RedirectResponse
    {
        Anime_Folder::where('id', $request->id)->update($request->validated());

        if ($request->submit === 'approve') {
            return back()->with('success', 'Folder Approved');
        } else {
            return back()->with('warning', 'Folder Refused');
        }
    }

    /**
     * Delete Folder
     */
    public function deleteFolder(Request $request) : RedirectResponse
    {
        Anime_Folder::where('id', $request->id)->delete();

        return back()->with('success', 'Folder Anime Deleted');
    }

    /**
     * Index Video
     */
    public function video(String $slug) : View
    {
        return view('dashboard.video.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime::where('slug', $slug)->first()
        ]);
    }

    /**
     * Create Video
     */
    public function createVideo(String $slug) : View
    {
        $anime = Anime::where('slug', $slug)->first();
        $video = Anime_Video::where('folder_anime_id', $anime->folder->id)->latest()->first();
        if ($video->count()) {
            return view('dashboard.video.create-exist', [
                'page' => $this->getUrl(URL::current()),
                'anime' => $anime,
                'video' => $video,
                'data' => $this->data
            ]);
        } else {
            return view('dashboard.video.create', [
                'page' => $this->getUrl(URL::current()),
                'anime' => $anime,
                'data' => $this->data
            ]);
        }
    }

    /**
     * Store Video
     */
    public function storeVideo(VideoAnimeStoreRequest $request, String $slug) : RedirectResponse
    {
        $video = Anime_Video::where([
            ['episode', $request->episode],
            ['origin', 'like', $request->origin],
            ['resolution', 'like', '%'.$request->height],
            ['type', $request->type],
        ])->first();

        
        $history = Anime_History_Video::where([
            ['episode', $request->episode],
            ['origin', 'like', $request->origin],
            ['resolution', 'like', '%'.$request->height],
            ['type', $request->type],
        ])->first();

        if (!$video && !$history) {
            Anime_Video::create($request->validated());

            if ($request->chapters != 'True') {
                Anime_Video_Mistake::create([
                    'video_anime_id' => Anime_Video::orderBy('id', 'DESC')->first('id')->id, 
                    'mistake_id' => Anime_Mistake::where('mistake', '!Chapter')->first('id')->id
                ]);
            }
    
            return redirect('/dashboard/anime/video/'.$slug.'/create')->with('success', 'New Video Anime Added');
        } else if ($history && !$video) {
            return back()->with('danger', "Video data already exists in History");
        } else {
            return back()->with('danger', "Video data already exists in Folder");
        }
    }

    /**
     * Edit Video
     */
    public function editVideo(Anime_Video $video_Anime, String $slug, String $title) : View
    {
        $anime = Anime::where('slug', $slug)->first(['id', 'slug']);
        $video = substr($title, strlen($anime->folder->slug)+1);
        $video = explode('_', $video);

        $next = $video_Anime->where('episode', $video[1]+1)->orWhere('episode', $video[1]+0.5)->get();
        $prev = $video_Anime->where('episode', $video[1]-1)->orWhere('episode', $video[1]-0.5)->get();
        
        $video = Anime_Video::where([
            ['episode', $video[1]],
            ['origin', 'like', $video[3]],
            ['resolution', 'like', '%'.rtrim((explode('.', end($video)))[0], 'p')],
            ['type', (explode('.', end($video)))[1]],
            ['bd', ($video[4] != 'tv' || $video[4] != 'bd') ? (($video[4] === "tv" ? 0 : 1)) : (($video[5] === "tv" ? 0 : 1))]
        ])->first();

        // One Piece Ep 900 - Koenime TV 1080p

        return view('dashboard.video.edit', [
            'page' => $this->getUrl(URL::current()),
            'mistakes' => Anime_Mistake::orderBy('mistake')->get(),
            'table' => Anime::where('slug', $slug)->first(),
            'anime' => $anime,
            'video' => $video,
            'next' => $next,
            'prev' => $prev,
            'data' => $this->data
        ]);
    }

    /**
     * Update Video
     */
    public function updateVideo(VideoAnimeUpdateRequest $request, String $slug) : RedirectResponse
    {
        Anime_Video::where('id', $request->id)->update($request->validated());

        $mistake = Anime_Video_Mistake::where([
            ['video_anime_id', $request->id], 
            ['mistake_id', Anime_Mistake::where('mistake', '!Chapter')->first('id')->id]
        ])->first();

        if ($request->chapters != 'True' && !$mistake) {
            Anime_Video_Mistake::create([
                'video_anime_id' => $request->id, 
                'mistake_id' => Anime_Mistake::where('mistake', '!Chapter')->first('id')->id
            ]);
        } else if ($request->chapters === 'True') {
            Anime_Video_Mistake::where([
                ['video_anime_id', $request->id], 
                ['mistake_id', Anime_Mistake::where('mistake', '!Chapter')->first('id')->id]
            ])->delete();
        }

        $anime = Anime::where('slug', $slug)->first();

        $title = str_replace(' ', '_', strtolower($slug." Ep ".(strlen($request->episode) === 1 ? "0".$request->episode : $request->episode)." - ".$request->origin." ".(explode('x', $request->resolution)[1])."p.".$request->type));

        $title = str_replace(' ', '_', strtolower($slug." Ep ".(strlen($request->episode) === 1 ? "0".$request->episode : $request->episode)." - ".$request->origin." ".($anime->type === "TV" ? ($request->bd === 0 ? "TV" : "BD") : $anime->type." ".($request->bd === 0 ? "TV" : "BD"))." ".(explode('x', $request->resolution)[1])."p.".$request->type));

        return redirect("/dashboard/anime/video/$slug/edit/$title")->with('success', 'Video Anime Updated Successfully');
    }

    /**
     * Approve Video
     */
    public function approveVideo(VideoAnimeApproveRequest $request, String $slug) : RedirectResponse
    {
        // dd($request);
        Anime_Video::where('id', $request->id)->update($request->validated());

        if ($request->submit === 'approve') {
            return back()->with('success', 'Video Approved');
        } else if ($request->submit === 'refuse') {
            return back()->with('warning', 'Video Refused');
        }
    }

    /**
     * Delete Video
     */
    public function deleteVideo(Request $request, String $slug) : RedirectResponse
    {
        Anime_Video::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Deleted');
    }

    /**
     * Index All History
     */
    public function histories() : View
    {
        return view('dashboard.video.histories', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime_History_Video::orderBy('slug')->get(),
        ]);
    }

    /**
     * Index History
     */
    public function history(String $slug) : View
    {
        return view('dashboard.video.history', [
            'page' => $this->getUrl(URL::current()),
            'table' => Anime_History_Video::where('slug', str_replace(['_'], [' '], $slug))->orderBy('episode', 'desc')->get(),
            'slug' =>  $slug
        ]);
    }

    /**
     * Retrieve Video
     */
    public function retrieveHistory(Request $request, String $slug) : RedirectResponse
    {
        Anime_History_Video::where('id', $request->id)->touch();
        Anime_History_Video::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Retrieved');
    }

    /**
     * Delete History
     */
    public function deleteHistory(Request $request, String $slug) : RedirectResponse
    {
        Anime_History_Video::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Permanently Delete');
    }
}
