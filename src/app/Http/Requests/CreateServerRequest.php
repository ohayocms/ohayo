<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mod_id' => [
                'required',
                'exists:App\Models\Mod,id'
            ],
            'name' => [
                'required',
                'max:255',
            ],
            'address' => [
                'required',
                'max:255',
            ]
        ];
    }
}
