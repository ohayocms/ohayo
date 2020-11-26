<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Models\StoreItemType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StoreItemTypeRepository implements Interfaces\StoreItemTypeRepositoryInterface
{

    public function getAll()
    {
        return StoreItemType::with('storeItemTypeVariables')->get();
    }

    public function getById(int $id)
    {
        return StoreItemType::with('storeItemTypeVariables')->where('id', $id)->first();
    }

    public function getAllGames()
    {
        return Game::all();
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
