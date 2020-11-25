<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Services\GameService;
use App\Http\Services\Interfaces\GameServiceInterface;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    protected GameServiceInterface $gameService;

    public function __construct(GameServiceInterface $interface)
    {
        $this->gameService = $interface;
    }

    public function index()
    {
        return view('admin.games.index', [
            'games' => $this->gameService->getRepository()->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(CreateGameRequest $request)
    {
        $this->gameService->save($request);
        return redirect()->route('admin.games.index');
    }

    public function edit(Request $request, int $id)
    {
        return view('admin.games.edit', [
            'game' => $this->gameService->getRepository()->getById($id),
        ]);
    }

    public function update(UpdateGameRequest $request, int $id)
    {
        $this->gameService->update($request, $id);
        return redirect()->route('admin.games.index');
    }

    public function delete(int $id)
    {
        $this->gameService->delete($id);
        return redirect()->route('admin.games.index');
    }
}
