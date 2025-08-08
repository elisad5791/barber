<?php

namespace App\Http\Requests\Salon;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Название является обязательным',
            'description.required' => 'Описание является обязательным',
        ];
    }
}