<?php

namespace App\Http\Repositories;

use App\Models\Currency;

class CurrencyRepository implements Interfaces\CurrencyRepositoryInterface
{
    public function getAll()
    {
        return Currency::all();
    }

    public function getById(int $id)
    {
        return Currency::findOrFail($id);
    }
}
