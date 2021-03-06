<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Models\Server;
use Illuminate\Support\Collection;

class GameRepository implements Interfaces\GameRepositoryInterface
{

    public function getAll()
    {
        return Game::all();
    }

    public function getById($id)
    {
        return Game::with('mods.servers')->where('id', $id)->first();
    }

    public function getAllWithServers()
    {
        return Game::with('mods.servers')->get();
    }
}
