<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\ServerRepositoryInterface;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateServerRequest;

interface ServerServiceInterface
{
    public function getRepository(): ServerRepositoryInterface;

    public function save(CreateServerRequest $request);

    public function update(UpdateServerRequest $request, int $id);

    public function delete(int $id);
}
