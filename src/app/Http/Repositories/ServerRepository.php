<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Models\Mod;
use App\Models\Server;
use Illuminate\Support\Collection;

class ServerRepository implements Interfaces\ServerRepositoryInterface
{

    public function getAll()
    {
        return Server::with('mod')->get();
    }

    public function getById(int $id)
    {
        return Server::findOrFail($id);
    }

    public function getAllAvailableMods()
    {
        return Mod::with('game')->get();
    }

    public function getByGameId(int $id)
    {
        return Server::all()->filter(function ($server, $key) use ($id) {
            if ($server->mod->game->id === $id) {
                return $server;
            }
            return null;
        })->all();
    }

    public function getByGameIdAndModId(int $gameId, int $modId)
    {
        return Server::all()->filter(function ($server, $key) use ($gameId, $modId) {
            if ($server->mod->game->id === $gameId && $server->mod->id === $modId) {
                return $server;
            }
            return null;
        })->all();
    }

    public function getAllAvailableGames()
    {
        return Game::with('mods')->get();
    }
}
