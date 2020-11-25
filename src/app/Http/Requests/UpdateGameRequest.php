<?php

namespace App\Http\Requests;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGameRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255',],
            'image' => ['file', 'image',],
            'type' => [
                'integer',
                Rule::in([Game::TYPE_SOURCE, Game::TYPE_MINECRAFT])
            ],
        ];
    }
}
