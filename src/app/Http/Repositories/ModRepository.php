<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Models\Mod;

class ModRepository implements Interfaces\ModRepositoryInterface
{

    public function getAll()
    {
        return Mod::with('game')->get();
    }

    public function getById(int $id)
    {
        return Mod::findOrFail($id);
    }

    public function getAllAvailableGames()
    {
        return Game::with('mods')->get();
    }
}
