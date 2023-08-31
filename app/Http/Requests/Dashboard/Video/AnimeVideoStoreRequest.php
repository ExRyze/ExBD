<?php

namespace App\Http\Requests\Dashboard\Video;

use App\Models\Anime_History_Video;
use App\Models\Anime_Video;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AnimeVideoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow :: Admin
        if (Gate::allows('isAdmin')) {return true;}
        else {return false;}
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $video = Anime_Video::orderBy('id', 'DESC')->first('id')->id;
        $history = Anime_History_Video::orderBy('id', 'DESC')->first('id')->id;
        $this->merge([
            'resolution' => $this->width."x".$this->height,
            'id' => ($video > $history) ? $video+1 : $history+1
        ]);
        return [
            'id' => 'required|unique:anime_videos',
            'lenght_video' => 'required|max:10',
            'resolution' => 'required|max:11',
            'size' => 'required',
            'video_tracks' => '',
            'audio_tracks' => '',
            'chapters' => 'required',
            'episode' => 'required',
            'origin' => 'required|max:255',
            'type' => 'required',
            'format' => 'required',
            'folder_anime_id' => 'required'
        ];
    }
}
