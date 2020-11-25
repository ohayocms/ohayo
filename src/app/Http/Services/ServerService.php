<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\ServerRepositoryInterface;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Models\Server;

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
        Server::create($request->all());
    }

    public function update(UpdateServerRequest $request, int $id)
    {
        $server = $this->serverRepository->getById($id);
        $server->update($request->all());
    }

    public function delete(int $id)
    {
        $server = $this->serverRepository->getById($id);
        $server->delete();
    }
}
