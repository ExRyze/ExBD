<?php

namespace App\Http\Requests\Dashboard\Folder;

use App\Models\Anime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class FolderAnimeStoreRequest extends FormRequest
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
        $this->merge(['anime' => Anime::where('title', $this->anime)->first()]);
        $this->merge([
            'slug' => str_replace([':', '?'], ['', ''], $this->anime->title),
            'approved' => false,
            'anime_id' => $this->anime->id,
            'user_id' => auth()->user()->id
        ]);
        return [
            'slug' => 'required|unique:anime_folders',
            'approved' => 'required',
            'anime_id' => 'required',
            'user_id' => 'required'
        ];
    }
}
