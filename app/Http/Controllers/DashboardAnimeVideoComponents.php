<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\Video\AnimeVideoMistakeStoreRequest;
use App\Http\Requests\Dashboard\Video\AnimeVideoSubtitleStoreRequest;
use App\Http\Requests\Dashboard\Video\AnimeVideoSubtitleUpdateRequest;
use App\Models\Anime_Mistake;
use App\Models\Anime_Video;
use App\Models\Anime_Video_Mistake;
use App\Models\Anime_Video_Subtitle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardAnimeVideoComponents extends Controller
{
    public function __construct()
    {
        // Allow :: Admin
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Store Anime Component
     */
    public function storeAnimeSubtitle(AnimeVideoSubtitleStoreRequest $request) : RedirectResponse
    {
        Anime_Video_Subtitle::create($request->validated());

        $this->subtitleNull($request);

        return back()->with('success', "New Data Video Anime's Subtitle Added");
    }

    public function storeAnimeMistake(AnimeVideoMistakeStoreRequest $request) : RedirectResponse
    {
        Anime_Video_Mistake::where('video_anime_id', $request->video_anime_id)->delete();

        if (isset($request->mistake_id)) {
            $mistakes = $request->mistake_id;
            foreach ($mistakes as $mistake_id) {
                Anime_Video_Mistake::create(['video_anime_id' => $request->video_anime_id, 'mistake_id' => $mistake_id]);
            }
            Anime_Video::find($request->video_anime_id)->touch();
            return back()->with('success', "New Data Video Anime's Mistake Added");
        }

        return back()->with('warning', "No Any Mistake Selected");
    }

    /**
     * Update Anime Component
     */
    public function updateAnimeSubtitle(AnimeVideoSubtitleUpdateRequest $request) : RedirectResponse
    {
        // Check Another Subtitle if 'Null'
        $subtitle = Anime_Video_Subtitle::where([
            ['id', '!=', $request->id],
            ['video_anime_id', $request->video_anime_id],
            ['subtitle', 'Null']
        ])->first();

        // Check Mistake if 'Hardsub'
        $mistake = Anime_Video_Mistake::where([
            ['video_anime_id', $request->video_anime_id], 
            ['mistake_id', Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id]
        ])->first();

        if ($request->submit === 'update') {

            // Toggle Mistake
            if ($request->subtitle === 'Null' && !$mistake) {
                Anime_Video_Mistake::create([
                    'video_anime_id' => $request->video_anime_id, 
                    'mistake_id' => Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id
                ]);
            } else if ($request->subtitle != 'Null' && !$subtitle && $mistake) {
                Anime_Video_Mistake::where([
                    ['video_anime_id', $request->video_anime_id], 
                    ['mistake_id', Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id]
                ])->delete();
            }

            Anime_Video_Subtitle::where('id', $request->id)->update($request->validated());
            
            return back()->with('success', "Data Video Anime's Subtitle Updated Successfully");
        }

        // Toggle Mistake
        if ($subtitle && !$mistake) {
            Anime_Video_Mistake::create([
                'video_anime_id' => $request->video_anime_id, 
                'mistake_id' => Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id
            ]);
        } else if (!$subtitle && $mistake) {
            Anime_Video_Mistake::where([
                ['video_anime_id', $request->video_anime_id], 
                ['mistake_id', Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id]
            ])->delete();
        }

        $this->destroyAnimeSubtitle($request);

        return back()->with('success', "Data Video Anime's Subtitle Deleted Successfully");
    }

    /**
     * Delete Anime Component
     */
    public function destroyAnimeSubtitle(Request $request) : void
    {
        Anime_Video_Subtitle::where('id', $request->id)->delete();
    }

    /**
     * Static
     */
    public static function subtitleNull($request) {
        $mistake = Anime_Video_Mistake::where([
            ['video_anime_id', $request->video_anime_id], 
            ['mistake_id', Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id]
        ])->first();

        if ($request->subtitle === 'Null' && !$mistake) {
            Anime_Video_Mistake::create([
                'video_anime_id' => $request->video_anime_id, 
                'mistake_id' => Anime_Mistake::where('mistake', 'Hardsub')->first('id')->id
            ]);
        }
    }
}
