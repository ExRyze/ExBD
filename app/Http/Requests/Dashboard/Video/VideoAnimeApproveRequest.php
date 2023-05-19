<?php

namespace App\Http\Requests\Dashboard\Video;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class VideoAnimeApproveRequest extends FormRequest
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
        if ($this->submit === 'approve') {
            $this->merge(['approved' => 1]);
        } else {
            $this->merge(['approved' => 0]);
        }
        
        return [
            'approved' => 'required',
        ];
    }
}
