<?php


namespace App\Http\Services;


use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\UpdateGameRequest;
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

    public function getRepository(): GameRepositoryInterface
    {
        return $this->gameRepository;
    }

    public function save(CreateGameRequest $request)
    {
        $image = Storage::putFile('games', new File($request->file('image')), 'public');
        Game::create(array_merge($request->all(), ['image' => $image]));
    }

    public function update(UpdateGameRequest $request, int $id)
    {
        $game = $this->getRepository()->getById($id);
        $image = $game->image;
        if ($request->file('image')) {
            $image = Storage::putFile('games', new File($request->file('image')), 'public');
        }

        $game->update(array_merge($request->all(), [
            'image' => $image,
        ]));
    }

    public function delete(int $id)
    {
        $game = $this->getRepository()->getById($id);
        $game->delete();
    }
}
