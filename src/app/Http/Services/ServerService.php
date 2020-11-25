<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\ServerRepositoryInterface;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateServerRequest;

class ServerService implements Interfaces\ServerServiceInterface
{

    protected ServerRepositoryInterface $serverRepository;

    public function __construct(ServerRepositoryInterface $repository)
    {
        $this->serverRepository = $repository;
    }

    public function getRepository(): ServerRepositoryInterface
    {
        return $this->serverRepository;
    }

    public function save(CreateServerRequest $request)
    {
        // TODO: Implement save() method.
    }

    public function update(UpdateServerRequest $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
