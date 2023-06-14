<?php

namespace App\Http\Requests\Dashboard\Video;

use App\Models\History_Video_Anime_Subtitle;
use App\Models\Video_Anime_Subtitle;
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
        $subtitle = Video_Anime_Subtitle::orderBy('id', 'DESC')->first('id')->id;
        $history = History_Video_Anime_Subtitle::orderBy('id', 'DESC')->first('id')->id;
        $this->merge(['id' => ($subtitle > $history) ? $subtitle+1 : $history+1]);
        return [
            'id' => 'required|unique:video_anime_subtitles',
            'origin' => 'required',
            'subtitle' => 'required',
            'video_anime_id' => 'required',
        ];
    }
}
