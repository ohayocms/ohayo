<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'game_id' => [
                'required',
                'exists:App\Models\Game,id'
            ],
            'name' => [
                'required',
                'max:255',
            ]
        ];
    }
}
