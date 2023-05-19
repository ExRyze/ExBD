<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Video\VideoMistakeStoreRequest;
use App\Http\Requests\Dashboard\Video\VideoSubtitleStoreRequest;
use App\Models\Video_Anime;
use App\Models\Video_Anime_Mistake;
use App\Models\Video_Anime_Subtitle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardVideoComponents extends Controller
{
    public function __construct()
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Store Anime Component
     */
    public function storeAnimeSubtitle(VideoSubtitleStoreRequest $request) : RedirectResponse
    {
        Video_Anime_Subtitle::create($request->validated());

        return back()->with('success', "New Data Video Anime's Subtitle Added");
    }

    public function storeAnimeMistake(VideoMistakeStoreRequest $request) : RedirectResponse
    {
        Video_Anime_Mistake::where('video_anime_id', $request->video_anime_id)->delete();

        if (isset($request->mistake_id)) {
            $mistakes = $request->mistake_id;
            foreach ($mistakes as $mistake_id) {
                Video_Anime_Mistake::create(['video_anime_id' => $request->video_anime_id, 'mistake_id' => $mistake_id]);
            }
            Video_Anime::find($request->video_anime_id)->touch();
            return back()->with('success', "New Data Video Anime's Mistake Added");
        }

        return back()->with('warning', "No Any Mistake Selected");
    }

    /**
     * Delete Anime Component
     */
    public function destroyAnimeSubtitle(Request $request) : RedirectResponse
    {
        Video_Anime_Subtitle::where('id', $request->id)->delete();

        return back()->with('success', "Data Video Anime's Subtitle Deleted Successfully");
    }
}
