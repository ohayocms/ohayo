<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Models\Mod;
use App\Models\Server;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use xPaw\MinecraftPing;
use xPaw\SourceQuery\SourceQuery;

class ServerRepository implements Interfaces\ServerRepositoryInterface
{

    public function getAll()
    {
        return Server::with('mod')->get();
    }

    public function getById(int $id)
    {
        return Server::with('mod.game')->where('id', $id)->first();
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

    public function getMonitoringByServerId(int $serverId)
    {
        if ($collection = Cache::get('monitoring_cache_'.$serverId)) {
            return $collection;
        }

        $server = $this->getById($serverId);
        switch ($server->mod->game->type) {
            case Game::TYPE_MINECRAFT:
                $collection = $this->getMinecraftMonitoring($server);
                break;
            default:
                $collection = $this->getSourceMonitoring($server);
                break;
        }
        return $collection;
    }

    private function getMinecraftMonitoring(Server $server)
    {
        try {
            $query = new MinecraftPing(explode(':', $server->address)[0], explode(':', $server->address)[1]);
        } finally {
            $collection = new Collection([$query->Query()]);
            if($query) {
                $query->Close();
            }
            Cache::put('monitoring_cache_'.$server->id, $collection, 300);
            return $collection;
        }
    }

    private function getSourceMonitoring(Server $server)
    {
        try {
            $query = new SourceQuery();
            $query->Connect(explode(':', $server->address)[0], explode(':', $server->address)[1], 3, $server->type);
        } finally {
            $collection = new Collection([$query->GetInfo(), $query->GetPlayers(), $query->GetRules()]);
            $query->Disconnect();
            Cache::put('monitoring_cache_'.$server->id, $collection, 300);
            return $collection;
        }
    }
}
