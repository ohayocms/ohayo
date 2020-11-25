<?php


namespace App\Http\Services;


use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Requests\CreateGameRequest;
use App\Models\Game;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class GameService implements Interfaces\GameServiceInterface
{

    protected GameRepositoryInterface $gameRepository;

    public function __construct(GameRepositoryInterface $repository)
    {
        $this->gameRepository = $repository;
    }

    public function getRepository()
    {
        return $this->gameRepository;
    }

    public function save(CreateGameRequest $request)
    {
        $image = Storage::putFile('games', new File($request->file('image')), 'public');
        Game::create(array_merge($request->all(), ['image' => $image]));
    }
}
