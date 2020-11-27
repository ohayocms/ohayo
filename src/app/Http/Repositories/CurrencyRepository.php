<?php

namespace App\Http\Repositories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAllConnectionsWithTables()
    {
        $connections = [];
        foreach (config('database.connections') as $key => $connection) {
            $connections[] = new Collection([
                'connection' => $key,
            ]);
        }
        return $connections;
    }
}
