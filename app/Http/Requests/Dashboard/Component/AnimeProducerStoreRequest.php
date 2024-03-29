<?php

namespace App\Http\Requests\Dashboard\Component;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class AnimeProducerStoreRequest extends FormRequest
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
        return [
            'producer' => 'required|unique:anime_producers|max:255'
        ];
    }
}
