<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\CreateGameRequest;

interface GameServiceInterface
{
    public function getRepository();

    public function save(CreateGameRequest $request);
}
