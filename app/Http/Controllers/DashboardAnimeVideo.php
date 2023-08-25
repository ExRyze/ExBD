<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Folder\AnimeFolderApproveRequest;
use App\Http\Requests\Dashboard\Folder\AnimeFolderStoreRequest;
use App\Http\Requests\Dashboard\Video\AnimeVideoApproveRequest;
use App\Http\Requests\Dashboard\Video\AnimeVideoStoreRequest;
use App\Http\Requests\Dashboard\Video\AnimeVideoUpdateRequest;
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
        'origins' => ["Adikanime", "Anoboy", "Koenime", "Kusonime", "Oploverz", "Samehadaku", "Twitter Subs", "Unknown"],
        'types' => ["mkv", "mp4"],
        'formats' => ['BD', 'TV', 'WEB-DL']
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
    public function storeFolder(AnimeFolderStoreRequest $request) : RedirectResponse
    {
        Anime_Folder::create($request->validated());

        return back()->with('success', 'New Folder Anime Added');
    }

    /**
     * Approve Folder
     */
    public function approveFolder(AnimeFolderApproveRequest $request) : RedirectResponse
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
    public function storeVideo(AnimeVideoStoreRequest $request, String $slug) : RedirectResponse
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

        $res = rtrim((explode('.', end($video)))[0], 'p');
        switch (true) {
            case $res === "8k" :
              $resolution = "7680x4320";
              break;
            case $res === "4k" :
              $resolution = "3840x2160";
              break;
            case $res === "2k" :
              $resolution = "2560x1440";
              break;
            
            default:
              $resolution = "%x".$res;
              break;
        }
        
        $video = Anime_Video::where([
            ['episode', $video[1]],
            ['origin', 'like', $video[3]],
            ['resolution', 'like', $resolution],
            ['type', (explode('.', end($video)))[1]],
            ['format', $video[4]]
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
    public function updateVideo(AnimeVideoUpdateRequest $request, String $slug) : RedirectResponse
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

        $episode = (strlen($request->episode) === 1 ? "0".$request->episode : $request->episode);
        $bd = $request->format;
        $type = ($anime->type === "TV" ? $bd : $anime->type." ".$bd);
        $res = explode('x', $request->resolution);
        switch (true) {
          case $res[0] === "7680" && $res[1] === "4320" :
            $resolution = "8K";
            break;
          case $res[0] === "3840" && $res[1] === "2160" :
            $resolution = "4K";
            break;
          case $res[0] === "2560" && $res[1] === "1440" :
            $resolution = "2K";
            break;
          
          default:
            $resolution = $res[1]."p";
            break;
        }
        $title = $anime->folder->slug." Ep ".$episode." - ".$request->origin." ".$type." ".$resolution.".".$request->type;
        $path = str_replace(' ', '_', strtolower($title));

        return redirect("/dashboard/anime/video/$slug/edit/$path")->with('success', 'Video Anime Updated Successfully');
    }

    /**
     * Approve Video
     */
    public function approveVideo(AnimeVideoApproveRequest $request, String $slug) : RedirectResponse
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
