<?php

namespace App\Http\Requests\Timeslot;

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
            'timeslot_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'service_id' => ['required', 'integer'],
            'comment' => ['nullable', 'string'],
        ];
    }
}