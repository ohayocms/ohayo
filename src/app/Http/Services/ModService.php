<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\ModRepositoryInterface;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\UpdateModRequest;

class ModService implements Interfaces\ModServiceInterface
{

    protected ModRepositoryInterface $modRepository;

    public function __construct(ModRepositoryInterface $repository)
    {
        $this->modRepository = $repository;
    }

    public function getRepository(): ModRepositoryInterface
    {
        return $this->modRepository;
    }

    public function save(CreateModRequest $request)
    {
        // TODO: Implement save() method.
    }

    public function update(UpdateModRequest $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
