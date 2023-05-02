<?php

namespace App\Http\Requests\Dashboard\Anime;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AnimeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Allow :: Admin && Staff
        if (Gate::allows('isAdmin')) {return true;}
        elseif (Gate::allows('isStaff')) {return true;}
        else {return false;}
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $this->merge(['slug' => strtolower(str_replace([' ', ':'], ['_', ''], $this->title)), 'user_id' => auth()->user()->id]);
        if (isset($this->file) === true) {$this->merge(['image' => 'Cover.jpg']);}

        return [
            'title' => ['required', Rule::unique('animes')->ignore($this->id)],
            'slug' => ['required', Rule::unique('animes')->ignore($this->id)],
            'episodes' => '',
            'duration' => '',
            'type' => '',
            'status' => '',
            'source' => '',
            'date_aired' => '',
            'date_finished' => '',
            'synopsis' => '',
            'image' => '',
            'user_id' => 'required'
        ];
    }
}
