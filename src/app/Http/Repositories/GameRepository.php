<?php

namespace App\Http\Repositories;

use App\Models\Game;

class GameRepository implements Interfaces\GameRepositoryInterface
{

    public function getAll()
    {
        return Game::all();
    }

    public function getById($id)
    {
        return Game::findOrFail($id);
    }
}
