<?php

namespace App\Http\Requests\Dashboard\Video;

use App\Models\Anime_History_Video_Subtitle;
use App\Models\Anime_Video_Subtitle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VideoSubtitleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow :: Admin && Staff
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
        $subtitle = Anime_Video_Subtitle::orderBy('id', 'DESC')->first('id')->id;
        $history = Anime_History_Video_Subtitle::orderBy('id', 'DESC')->first('id')->id;
        $this->merge(['id' => ($subtitle > $history) ? $subtitle+1 : $history+1]);
        return [
            'id' => 'required|unique:anime_video_subtitles',
            'origin' => 'required',
            'subtitle' => 'required',
            'video_anime_id' => 'required',
        ];
    }
}
