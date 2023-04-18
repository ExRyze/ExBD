<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AnimeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $this->merge(['slug' => Str::slug($this->title, '_')]);
        return [
            'title' => 'required|unique:animes',
            'slug' => 'required|unique:animes',
            'episodes' => '',
            'duration' => '',
            'type' => '',
            'status' => '',
            'source' => '',
            'date_aired' => '',
            'date_finished' => '',
            'description' => ''
        ];
    }
}
