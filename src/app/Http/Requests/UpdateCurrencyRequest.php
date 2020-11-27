<?php

namespace App\Http\Requests;

use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCurrencyRequest extends FormRequest
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
            'sign' => ['required', 'max:255',],
            'connection' => ['required', 'max:255',],
            'table' => ['required', 'max:255',],
            'field' => ['required', 'max:255',],
            'user_identity_field' => ['required', 'max:255',],
            'user_identity_type' => [
                'required', Rule::in([
                    Currency::IDENTITY_TYPE_ID,
                    Currency::IDENTITY_TYPE_NAME,
                    Currency::IDENTITY_TYPE_EMAIL,
                    Currency::IDENTITY_TYPE_STEAM_ID,
                    Currency::IDENTITY_TYPE_STEAM_ID_64,
                ])
            ],
        ];
    }
}
