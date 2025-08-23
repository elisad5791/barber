<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'salon' => ['required', 'integer', 'gt:0'],
            'service' => ['required', 'integer', 'gt:0'],
            'master' => ['required', 'integer', 'gt:0'],
            'content' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'content' => [
                'required' => 'Пустое сообщение',
                'min' => 'Минимальная длина сообщения 6 символов'
            ]
        ];
    }
}