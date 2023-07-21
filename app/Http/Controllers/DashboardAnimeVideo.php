<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\FolderAnimeApproveRequest;
use App\Http\Requests\Dashboard\Folder\FolderAnimeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeApproveRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoAnimeUpdateRequest;
use App\Models\Anime;
use App\Models\Folder_Anime;
use App\Models\History_Video_Anime;
use App\Models\Mistake;
use App\Models\Video_Anime;
use App\Models\Video_Anime_Mistake;
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
            'table' => Folder_Anime::orderBy('slug')->get(),
            'animes' => Anime::join('folder_animes', 'animes.id', '=', 'folder_animes.anime_id', 'left outer')->where('folder_animes.id', NULL)->orderBy('title')->get()
        ]);
    }

    /**
     * Store Folder
     */
    public function storeFolder(FolderAnimeStoreRequest $request) : RedirectResponse
    {
        Folder_Anime::create($request->validated());

        return back()->with('success', 'New Folder Anime Added');
    }

    /**
     * Approve Folder
     */
    public function approveFolder(FolderAnimeApproveRequest $request) : RedirectResponse
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
    public function deleteFolder(Request $request) : RedirectResponse
    {
        Folder_Anime::where('id', $request->id)->delete();

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
        $video = Video_Anime::where('folder_anime_id', $anime->folder->id)->latest()->first();
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
        $video = Video_Anime::where([
            ['episode', $request->episode],
            ['origin', 'like', $request->origin],
            ['resolution', 'like', '%'.$request->height],
            ['type', $request->type],
        ])->first();

        
        $history = History_Video_Anime::where([
            ['episode', $request->episode],
            ['origin', 'like', $request->origin],
            ['resolution', 'like', '%'.$request->height],
            ['type', $request->type],
        ])->first();

        if (!$video && !$history) {
            Video_Anime::create($request->validated());

            if ($request->chapters != 'True') {
                Video_Anime_Mistake::create([
                    'video_anime_id' => Video_Anime::orderBy('id', 'DESC')->first('id')->id, 
                    'mistake_id' => Mistake::where('mistake', '!Chapter')->first('id')->id
                ]);
            }
    
            return redirect('/dashboard/anime/video/'.$slug)->with('success', 'New Video Anime Added');
        } else if ($history && !$video) {
            return back()->with('danger', "Video data already exists in History");
        } else {
            return back()->with('danger', "Video data already exists in Folder");
        }
    }

    /**
     * Edit Video
     */
    public function editVideo(Video_Anime $video_Anime, String $slug, String $title) : View
    {
        $anime = Anime::where('slug', $slug)->first(['id', 'slug']);
        $video = substr($title, strlen($anime->folder->slug)+1);
        $video = explode('_', $video);

        $next = $video_Anime->where('episode', $video[1]+1)->orWhere('episode', $video[1]+0.5)->get();
        $prev = $video_Anime->where('episode', $video[1]-1)->orWhere('episode', $video[1]-0.5)->get();
        
        $video = Video_Anime::where([
            ['episode', $video[1]],
            ['origin', 'like', $video[3]],
            ['resolution', 'like', '%'.rtrim((explode('.', end($video)))[0], 'p')],
            ['type', (explode('.', end($video)))[1]],
            ['bd', ($video[4] != 'tv' || $video[4] != 'bd') ? (($video[4] === "tv" ? 0 : 1)) : (($video[5] === "tv" ? 0 : 1))]
        ])->first();

        // One Piece Ep 900 - Koenime TV 1080p

        return view('dashboard.video.edit', [
            'page' => $this->getUrl(URL::current()),
            'mistakes' => Mistake::orderBy('mistake')->get(),
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
        Video_Anime::where('id', $request->id)->update($request->validated());

        $mistake = Video_Anime_Mistake::where([
            ['video_anime_id', $request->id], 
            ['mistake_id', Mistake::where('mistake', '!Chapter')->first('id')->id]
        ])->first();

        if ($request->chapters != 'True' && !$mistake) {
            Video_Anime_Mistake::create([
                'video_anime_id' => $request->id, 
                'mistake_id' => Mistake::where('mistake', '!Chapter')->first('id')->id
            ]);
        } else if ($request->chapters === 'True') {
            Video_Anime_Mistake::where([
                ['video_anime_id', $request->id], 
                ['mistake_id', Mistake::where('mistake', '!Chapter')->first('id')->id]
            ])->delete();
        }

        $title = str_replace(' ', '_', strtolower($slug." Ep ".(strlen($request->episode) === 1 ? "0".$request->episode : $request->episode)." - ".$request->origin." ".(explode('x', $request->resolution)[1])."p.".$request->type));

        return redirect("/dashboard/anime/video/$slug/edit/$title")->with('success', 'Video Anime Updated Successfully');
    }

    /**
     * Approve Video
     */
    public function approveVideo(VideoAnimeApproveRequest $request, String $slug) : RedirectResponse
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
    public function deleteVideo(Request $request, String $slug) : RedirectResponse
    {
        Video_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Deleted');
    }

    /**
     * Index All History
     */
    public function histories() : View
    {
        return view('dashboard.video.histories', [
            'page' => $this->getUrl(URL::current()),
            'table' => History_Video_Anime::orderBy('slug')->get(),
        ]);
    }

    /**
     * Index History
     */
    public function history(String $slug) : View
    {
        return view('dashboard.video.history', [
            'page' => $this->getUrl(URL::current()),
            'table' => History_Video_Anime::where('slug', str_replace(['_'], [' '], $slug))->orderBy('episode', 'desc')->get(),
            'slug' =>  $slug
        ]);
    }

    /**
     * Retrieve Video
     */
    public function retrieveHistory(Request $request, String $slug) : RedirectResponse
    {
        History_Video_Anime::where('id', $request->id)->touch();
        History_Video_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Retrieved');
    }

    /**
     * Delete History
     */
    public function deleteHistory(Request $request, String $slug) : RedirectResponse
    {
        History_Video_Anime::where('id', $request->id)->delete();

        return back()->with('success', 'Video Anime Has Been Permanently Delete');
    }
}
