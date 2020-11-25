<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\ServerServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServerController extends Controller
{
    protected ServerServiceInterface $serverService;

    public function __construct(ServerServiceInterface $interface)
    {
        $this->serverService = $interface;
    }

    public function index()
    {
        return Inertia::render('Servers/Index', [
            'servers' => $this->serverService->getRepository()->getAll(),
            'mods' => $this->serverService->getRepository()->getAllAvailableMods(),
            'games' => $this->serverService->getRepository()->getAllAvailableGames(),
        ]);
    }

    public function filterServers(int $gameId, int $modId)
    {
        return Inertia::render('Servers/Index', [
            'servers' => $this->serverService->getRepository()->getByGameIdAndModId($gameId, $modId),
            'mods' => $this->serverService->getRepository()->getAllAvailableMods(),
            'games' => $this->serverService->getRepository()->getAllAvailableGames(),
        ]);
    }
}
