<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'server_id' => ['required', 'exists:App\Models\Server,id',],
            'store_item_type_id' => ['required', 'exists:App\Models\StoreItemType,id',],
            'name' => ['required', 'max:255',],
            'description' => ['required',],
            'image' => ['file', 'image',],
            'priceCurrency' => ['array']
        ];
    }
}
