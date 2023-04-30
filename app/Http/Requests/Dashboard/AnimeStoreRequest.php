<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AnimeStoreRequest extends FormRequest
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
            'synopsis' => '',
            'user_id' => 'required'
        ];
    }
}
