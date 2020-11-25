<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\GameServiceInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    protected GameServiceInterface $gameService;

    public function __construct(GameServiceInterface $interface)
    {
        $this->gameService = $interface;
    }

    public function index()
    {
        return Inertia::render('Games/Index', [
            'games' => $this->gameService->getRepository()->getAllWithServers(),
        ]);
    }

    public function details(Request $request, int $id)
    {
        return Inertia::render('Games/Details', [
            'game' => $this->gameService->getRepository()->getById($id),
        ]);
    }
}
