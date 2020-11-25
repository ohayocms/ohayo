<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGameRequest;
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
            'games' => Game::all(),
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
        return view('admin.games.edit');
    }

    public function update()
    {
        #
    }

    public function delete()
    {
        #
    }
}
