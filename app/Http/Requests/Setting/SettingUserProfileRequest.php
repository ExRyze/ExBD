<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingUserProfileRequest extends FormRequest
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
        if (isset($this->file) === true) {$this->merge(['image' => $this->username.'.jpg']);}

        return [
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($this->id)],
            'email' => ['required', 'max:255', Rule::unique('users')->ignore($this->id)],
            'image' => '',
            'bio' => ''
        ];
    }
}
