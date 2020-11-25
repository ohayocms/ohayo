<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\ModRepositoryInterface;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\UpdateModRequest;
use App\Models\Mod;

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
        Mod::create($request->all());
    }

    public function update(UpdateModRequest $request, int $id)
    {
        $mod = $this->getRepository()->getById($id);
        $mod->update($request->all());
    }

    public function delete(int $id)
    {
        $mod = $this->getRepository()->getById($id);
        $mod->delete();
    }
}
