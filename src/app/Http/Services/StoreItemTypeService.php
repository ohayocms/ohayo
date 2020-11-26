<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\StoreItemTypeRepositoryInterface;
use App\Http\Requests\CreateStoreItemTypeRequest;
use App\Http\Requests\UpdateStoreItemTypeRequest;

class StoreItemTypeService implements Interfaces\StoreItemTypeServiceInterface
{

    protected StoreItemTypeRepositoryInterface $storeItemTypeRepository;

    public function __construct(StoreItemTypeRepositoryInterface $repository)
    {
        $this->storeItemTypeRepository = $repository;
    }

    public function getRepository(): StoreItemTypeRepositoryInterface
    {
        return $this->storeItemTypeRepository;
    }

    public function save(CreateStoreItemTypeRequest $request)
    {
        // TODO: Implement save() method.
    }

    public function update(UpdateStoreItemTypeRequest $request, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
