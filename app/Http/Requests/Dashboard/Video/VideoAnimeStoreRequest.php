<?php

namespace App\Http\Requests\Dashboard\Video;

use App\Models\History_Video_Anime;
use App\Models\Video_Anime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VideoAnimeStoreRequest extends FormRequest
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
        $video = Video_Anime::orderBy('id', 'DESC')->first('id')->id;
        $history = History_Video_Anime::orderBy('id', 'DESC')->first('id')->id;
        $this->merge([
            'resolution' => $this->width."x".$this->height,
            'id' => ($video > $history) ? $video+1 : $history+1
        ]);
        return [
            'id' => 'required|unique:video_animes',
            'lenght_video' => 'required|max:10',
            'resolution' => 'required|max:11',
            'size' => 'required',
            'video_tracks' => '',
            'chapters' => 'required',
            'episode' => 'required',
            'audio_tracks' => '',
            'origin' => 'required|max:255',
            'type' => 'required',
            'cover' => '',
            'folder_anime_id' => 'required'
        ];
    }
}
