<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\GameRepositoryInterface;
use App\Http\Requests\CreateGameRequest;
use App\Http\Requests\UpdateGameRequest;

interface GameServiceInterface
{
    public function getRepository(): GameRepositoryInterface;

    public function save(CreateGameRequest $request);

    public function update(UpdateGameRequest $request, int $id);

    public function delete(int $id);
}
