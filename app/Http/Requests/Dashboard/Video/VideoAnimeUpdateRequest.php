<?php

namespace App\Http\Requests\Dashboard\Video;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VideoAnimeUpdateRequest extends FormRequest
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
        $this->merge(['resolution' => $this->width."x".$this->height]);
        if ($this->cover === null) {$this->merge(['cover' => 0]);}
        return [
            'lenght_video' => 'required|max:10',
            'resolution' => 'required|max:11',
            'size' => 'required',
            'video_tracks' => '',
            'chapters' => 'required',
            'episode' => 'required',
            'audio_tracks' => '',
            'origin' => 'required|max:255',
            'type' => 'required',
            'cover' => ''
        ];
    }
}
